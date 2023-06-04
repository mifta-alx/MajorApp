<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Score as Scores;
use App\Models\Criteria as Criterias;
use App\Models\Subcriteria as Subcriterias;
use App\Models\Result as Results;
use App\Models\Major as Majors;
use Livewire\WithPagination;

class Result extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $paginate = 5;
    public $search = '';
    public function render()
    {
        //mendapatkan data score dari database dan diberikan search dan pagination
        $scores = Scores::with(['student', 'criteria'])
            ->whereHas('student', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->paginate * Criterias::all()->count());
        //siapkan array groupedScores
        $groupedScores = [];
        //memasukkan data scores ke dalam array groupedScores
        foreach ($scores as $score) {
            $groupedScores[$score->nisn][] = $score;
        }
        //mendapatkan data scores dengan melakukan grouping data by criteria_id
        $scores_by_criteria = Scores::orderBy('nisn')->get()->groupBy('criteria_id');
        //melakukan proses pencarian nilai max dari setiap criteria
        $max_score = $scores_by_criteria->map(function ($item) {
            $score_by_criteria = $item->map(function ($data) {
                $alternative_score = Subcriterias::where('criteria_id', $data->criteria_id) //cek range score berdasarkan dari subcriteria
                    ->where('subcriteria_start', '<=', $data->score)
                    ->where('subcriteria_end', '>=', $data->score)
                    ->value('subcriteria_score');
                return $alternative_score;
            })->toArray();
            return max($score_by_criteria); //dicari max nya dari nilai subcriteria
        });
        $totalSumDivided = [];
        $dividedData = [];
        //mendapatkan data dari majors
        $majors = Majors::all()->toArray();
        //mendapatkan data scores dengan melakukan grouping data by nisn dan criteria_id
        $scores_by_criteria_nisn = Scores::orderBy('nisn')->get()->groupBy('nisn', 'criteria_id');
        //mendapatkan nilai subcriteria dengan group data by nisn
        $sub_score = collect($scores_by_criteria_nisn)->map(function ($item) {
            $score_by_criteria_nisn = collect($item)->map(function ($score) {
                $alternative_score = Subcriterias::where('criteria_id', $score->criteria_id)
                    ->where('subcriteria_start', '<=', $score->score)
                    ->where('subcriteria_end', '>=', $score->score)
                    ->value('subcriteria_score');
                return $alternative_score;
            });
            return $score_by_criteria_nisn->values();
        });
        foreach ($sub_score as $nisn => $item) {
            //perhitungan angka score
            $dividedscoreArray = $item->mapWithKeys(function ($score, $index) use ($max_score) {
                $criteria_id = $index + 1;
                $weight = Criterias::where('criteria_id', $criteria_id)->value('weight'); //mendapatkan bobot
                $maxValue = $max_score[$criteria_id]; //mendapatkan score max
                $total = $maxValue != 0 ? ($score / $maxValue) * ($weight / 100) : 0; //perhitungan score normalisasi
                return [$criteria_id => $total];
            })->toArray();
            $dividedData[$nisn] = $dividedscoreArray;
            $totalSumDivided[$nisn] = array_sum($dividedscoreArray); //menjumlahkan score normalisasi dan menjadikan score saw
        }
        $major = [];
        //memecah data score dari hasil pembagian jadi data dengan memiliki key nisn
        foreach ($dividedData as $nisn => $values) {
            $majorResults = [];
            //mencari score hasil pembagian berdasarkan criteria
            foreach ($majors as $criteria) {
                //memecah data dari majors dengan bentuk json ke bentuk array
                $criteriaId = json_decode($criteria['criteria_id'], true);
                //cek apakah ada data kriteria dari array
                $intersect = array_intersect($criteriaId, array_keys($values));
                if (!empty($intersect)) {
                    $total = 0;
                    //memecah data array intersect menjadi id yang digunakan untuk mencari nilai dengan criteria yang ada di majors
                    foreach ($intersect as $id) {
                        //data dengan id criteria yang ada di intersect dijumlah dan dimasukkan kedala variable total
                        $total += $values[$id];
                    }
                    //melakukan rekonstruksi array dengan memasukkan total ke setiap major
                    $majorResults[] = [
                        'major' => $criteria['major'],
                        'total' => $total
                    ];
                }
            }
            //memasukkan hasil ke dalam array dengan key nisn
            $major[$nisn] = $majorResults;
        }
        $finalMajor = [];
        foreach ($major as $nisn => $majorResults) {
            $maxTotal = 0;
            $maxMajor = '';
            //membandingkan score dari yang paling besar dan ambil major nya
            foreach ($majorResults as $result) {
                if ($result['total'] > $maxTotal) {
                    $maxTotal = $result['total'];
                    $maxMajor = $result['major'];
                }
            }

            if (!empty($maxMajor)) {
                $finalMajor[$nisn] = $maxMajor;
            }
        }
        $final_result = [];
        //memecah data hasil perhitungan saw dan memasukkannya ke array
        foreach ($totalSumDivided as $nisn => $totalSum) {
            if (isset($finalMajor[$nisn])) {
                $final_result[$nisn] = [
                    'saw_result' => $totalSum,
                    'recomendation_result' => $finalMajor[$nisn]
                ];
            }
        }
        //menyimpan final_result ke db dengan memecah data menjadi array yang sesuai struktur database
        foreach ($final_result as $nisn => $result) {
            Results::updateOrCreate(
                [
                    'nisn' => $nisn,
                ],
                [
                    'saw_result' => $result["saw_result"],
                    'recomendation_result' => $result["recomendation_result"]
                ]
            );
        }
        //mendapatkan data results
        $getResult = Results::with('student')
            ->whereHas('student', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->paginate);
        $data = [];
        foreach ($getResult as $result) {
            $nisn = $result->student->nisn;
            // cek apakah nisn ada dalam $dividedData
            if (isset($dividedData[$nisn])) {
                // dapatkan data dari $dividedData
                $dividedDataItem = $dividedData[$nisn];
                // cek apakah NISN ada dalam $finalMajor
                if (isset($finalMajor[$nisn])) {
                    // menggabungkan data menjadi array baru
                    $data[$nisn] = [
                        'student_name' => $result->student->student_name,
                        'dividedData' => $dividedDataItem,
                        'saw_result' => $result->saw_result,
                        'recomendation_result' => $result->recomendation_result,
                    ];
                }
            }
        }
        return view('livewire.results.result', [
            'results' => $data,
            'results_all' => $getResult,
            'criterias' => Criterias::get(['criteria_name', 'criteria_id']),
            'titles' => 'Results',
            'title' => 'Result',
            'count' => Results::all()->count(),
        ]);
    }
}
