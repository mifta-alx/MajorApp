<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class ResultsController extends Controller
{
    public function index()
    {
        return view('pages.admin.results.index');
    }
    public function exportPdf()
    {
        $scores = Score::with(['student', 'criteria'])
            ->orderBy('nisn')
            ->get()
            ->groupBy('nisn');
        $result = Score::orderBy('nisn')->get()->groupBy('criteria_id');
        $nilaiMax = $result->map(function ($item) {
            $res = $item->map(function ($ress) {
                $sub_score = Subcriteria::where('criteria_id', $ress->criteria_id)
                    ->where('subcriteria_start', '<=', $ress->score)
                    ->where('subcriteria_end', '>=', $ress->score)
                    ->value('subcriteria_score');
                return $sub_score;
            })->toArray();
            return max($res);
        });
        $normalize = $scores->map(function ($item) {
            $scores = $item->map(function ($score) {
                $sub_score = Subcriteria::where('criteria_id', $score->criteria_id)
                    ->where('subcriteria_start', '<=', $score->score)
                    ->where('subcriteria_end', '>=', $score->score)
                    ->value('subcriteria_score');
                return $sub_score;
            });
            return $scores;
        });
        $normalizedData = [];
        $dividedData = [];
        foreach ($normalize as $key => $item) {
            $dividedscoreArray = $item->map(function ($score, $index) use ($nilaiMax) {
                $bobot = Criteria::where('criteria_id', $index + 1)->value('weight');
                $maxValue = $nilaiMax[$index + 1];
                $dividedScore = $score / $maxValue;
                $total = $dividedScore * $bobot;
                return $total;
            })->toArray();
            $dividedData[$key] = $dividedscoreArray;
            $normalizedData[$key] = array_sum($dividedscoreArray);
        }
        $getResult = Result::with('student')->get();
        $results = $getResult->map(function ($result) use ($dividedData) {
            $normalized_value = $dividedData[$result->nisn];
            $result->normalized_value = $normalized_value;
            return $result;
        });
        $currentTime = Carbon::now('Asia/jakarta');
        $currentTime->toDateTimeString();
        $pdf = PDF::loadView('livewire.results.pdf', [
            'results'  => $results,
            'title' => 'Result Report',
            'criterias' => Criteria::get(['criteria_name', 'criteria_id']),
            'date' => $currentTime
        ]);
        $pdf->setPaper('A4', 'landscape');
        // return $pdf->download('ReportResult_'. $currentTime .'.pdf');
        return $pdf->stream('ReportResult_'. $currentTime .'.pdf');
    }
}
