<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Score as Scores;
use App\Models\Criteria as Criterias;
use App\Models\Subcriteria as Subcriterias;
use App\Models\Result as Results;
use Livewire\WithPagination;

class Result extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $paginate = 5;
    public $search = '';
    public function render()
    {
        $scores = Scores::with(['student', 'criteria'])
            ->whereHas('student', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nisn')
            ->get()
            ->groupBy('nisn');
        $result = Scores::orderBy('nisn')->get()->groupBy('criteria_id');
        $nilaiMax = $result->map(function ($item) {
            $res = $item->map(function ($ress) {
                $sub_score = Subcriterias::where('criteria_id', $ress->criteria_id)
                    ->where('subcriteria_start', '<=', $ress->score)
                    ->where('subcriteria_end', '>=', $ress->score)
                    ->value('subcriteria_score');
                return $sub_score;
            })->toArray();
            return max($res);
        });
        $normalize = $scores->map(function ($item) {
            $scores = $item->map(function ($score) {
                $sub_score = Subcriterias::where('criteria_id', $score->criteria_id)
                    ->where('subcriteria_start', '<=', $score->score)
                    ->where('subcriteria_end', '>=', $score->score)
                    ->value('subcriteria_score');
                return $sub_score;
            });
            return $scores;
        });
        $normalizedData = [];
        foreach ($normalize as $key => $item) {
            $dividedData = $item->map(function ($score, $index) use ($nilaiMax) {
                $bobot = Criterias::where('criteria_id', $index + 1)->value('weight');
                $maxValue = $nilaiMax[$index + 1];
                $dividedScore = $score / $maxValue;
                $total = $dividedScore * $bobot;
                return $total;
            })->toArray();
            $normalizedData[$key] = array_sum($dividedData);
        }
        foreach ($normalizedData as $key => $data) {
            Results::updateOrCreate(
                [
                    'nisn' => $key,
                ],
                [
                    'saw_result' => $data,
                    'recomendation_result' => 'IPA'
                ]
            );
        }
        $getResult = Results::with('student')->get();
        $results = $getResult->map(function ($result) use ($normalize) {
            $normalized_value = $normalize->get($result->nisn);

            $result->normalized_value = $normalized_value;

            return $result;
        });
        $searchResults = $results->filter(function ($result) {
            $studentName = $result->student->student_name;

            // Cek apakah $studentName mengandung teks pencarian
            return stripos($studentName, $this->search) !== false;
        });

        $perPage = $this->paginate; // Jumlah item per halaman
        $currentPage = request()->input('page', 1); // Mendapatkan nomor halaman saat ini dari URL

        // Buat objek Paginator menggunakan $searchResults
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $searchResults->forPage($currentPage, $perPage),
            $searchResults->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('livewire.results.result', [
            'results' => $paginatedResults,
            'criterias' => Criterias::get(['criteria_name', 'criteria_id']),
            'titles' => 'Results',
            'title' => 'Result',
            'count' => Results::all()->count(),
        ]);
    }
}
