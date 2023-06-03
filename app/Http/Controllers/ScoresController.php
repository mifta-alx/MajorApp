<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Student;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class ScoresController extends Controller
{
    public function index()
    {
        return view('pages.admin.scores.index');
    }
    public function exportPdf()
    {
        $scores = Score::with(['student', 'criteria'])
            ->orderBy('nisn')
            ->get()
            ->groupBy('nisn');
        $scoresArray = $scores->map(function ($item) {
            $scores = $item->map(function ($score) {
                $sub_score = Subcriteria::where('criteria_id', $score->criteria_id)
                    ->where('subcriteria_start', '<=', $score->score)
                    ->where('subcriteria_end', '>=', $score->score)
                    ->value('subcriteria_score');
                return [
                    'criteria_id' => $score->criteria_id,
                    'score' => $score->score,
                    'sub_score' => $sub_score,
                ];
            });
            return [
                'nisn' => $item->first()->nisn,
                'nama' => $item->first()->student->student_name,
                'scores' => $scores,
            ];
        });

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
        $currentTime = Carbon::now('Asia/jakarta');
        $currentTime->toDateTimeString();
        $pdf = PDF::loadView('livewire.scores.pdf', [
            'scores' => $scoresArray,
            'data_max' => $nilaiMax,
            'criterias' => Criteria::get(['criteria_name', 'criteria_id']),
            'title' => 'Score Report',
            'date' => $currentTime
        ]);
        $pdf->setPaper('A4', 'landscape');
        // return $pdf->download('ReportScore_'. $currentTime .'.pdf');
        return $pdf->stream('ReportScore_'. $currentTime .'.pdf');
    }
}
