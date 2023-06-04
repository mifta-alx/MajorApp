<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Score as Scores;
use App\Models\Student as Students;
use App\Models\Criteria as Criterias;
use App\Models\Subcriteria as Subcriterias;
use App\Models\Result as Results;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Score extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $score_id, $nisn, $criteria_id, $score, $uuid;
    public $score_by_criteria;
    public $paginate = 5;
    public $search = '';
    public $totalSteps = 2;
    public $currentStep = 1;

    public function rules()
    {
        $criteriaCount = Criterias::count();
        return [
            'nisn' => ['required', Rule::unique('scores')->ignore($this->score_id)->where(function ($query) use ($criteriaCount) {
                $query->whereExists(function ($subQuery) use ($criteriaCount) {
                    $subQuery->selectRaw('nisn')
                        ->from('scores')
                        ->groupBy('nisn')
                        ->havingRaw('COUNT(DISTINCT criteria_id) = ?', [$criteriaCount]);
                });
            })],
            'score.*' => 'required|numeric',
        ];
    }
    protected $messages = [
        'nisn.required' => 'Siswa tidak boleh kosong',
        'nisn.unique' => 'Siswa ini sudah memiliki score',
        'score.*.required' => 'Nilai tidak boleh kosong',
        'score.*.numeric' => 'Nilai harus berisi angka',
        'score.*.between' => 'Nilai harus berisi nilai antara 0 sampai 100',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        foreach ($validated['score'] as $key => $value) {
            $data = [
                'nisn' => $validated['nisn'],
                'criteria_id' => $key,
                'score' => $this->score[$key]
            ];
            Scores::create($data);
        }
        session()->flash('success', 'Score created successfully!');
        return redirect()->to('/scores');
        $this->reset();
        $this->resetInput();
    }
    public function edit(string $nisn)
    {
        $score = Scores::where('nisn', $nisn)->get();
        if ($score) {
            $this->score = [];
            $this->nisn = $score->first()->nisn;
            foreach ($score as $value) {
                $this->score[$value->criteria_id] = strval($value->score);
            }
        } else {
            return redirect()->to('/scores');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $criteriaCount = Criterias::count();
        $rules = [
            'nisn' => ['required', Rule::unique('scores')->ignore($this->score_id)->where(function ($query) use ($criteriaCount) {
                $query->whereExists(function ($subQuery) use ($criteriaCount) {
                    $subQuery->selectRaw('nisn')
                        ->from('scores')
                        ->groupBy('nisn')
                        ->havingRaw('COUNT(DISTINCT criteria_id) = ?', [$criteriaCount]);
                });
            })],
            'score.*' => 'required|numeric',
        ];

        if ('nisn' != $this->nisn) {
            $rules['nisn'] = 'required';
        }
        $validated = $this->validate($rules, [
            'nisn.required' => 'Siswa tidak boleh kosong',
            'nisn.unique' => 'Siswa ini sudah memiliki score',
            'score.*.required' => 'Nilai tidak boleh kosong',
            'score.*.numeric' => 'Nilai harus berisi angka',
            'score.*.between' => 'Nilai harus berisi nilai antara 0 sampai 100',
        ]);
        // $validated = $this->validate();
        foreach ($validated['score'] as $key => $value) {
            $data = [
                'nisn' => $validated['nisn'],
                'criteria_id' => $key,
                'score' => $this->score[$key]
            ];
            Scores::where('nisn', $this->nisn)->where('criteria_id', $key)->update($data);
        }
        session()->flash('success', 'Score updated successfully!');
        return redirect()->to('/scores');
        $this->reset();
        $this->resetInput();
    }
    public function delete(string $nisn)
    {
        $this->nisn = $nisn;
    }
    public function destroy()
    {
        $score = Scores::where('nisn', $this->nisn)->delete();
        session()->flash('success', 'Score deleted successfully!');
        return redirect()->to('/scores');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->score_id = '';
        $this->criteria_id = '';
        $this->nisn = '';
        $this->score = '';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function clearSearch()
    {
        $this->search = '';
    }
    public function changeStep(int $step)
    {
        $this->currentStep = $step;
    }
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
            $groupedScores[$score->nisn][] = $score; //hasilnya adalah semua data nilai dari semua alternatif dan dipisah berdasarkan nisn
        }
        //melakukan proses cek nilai ke subcriteria 
        $scoresArray = collect($groupedScores)->map(function ($item) {
            $scores = collect($item)->map(function ($score) {
                $alternative_score = Subcriterias::where('criteria_id', $score->criteria_id)
                    ->where('subcriteria_start', '<=', $score->score)
                    ->where('subcriteria_end', '>=', $score->score)
                    ->value('subcriteria_score');
                return [
                    'criteria_id' => $score->criteria_id,
                    'score' => $score->score,
                    'alternative_score' => $alternative_score ?? 0,
                ];
            });
            return [
                'nisn' => collect($item)->first()->nisn,
                'nama' => collect($item)->first()->student->student_name,
                'scores' => $scores,
            ];
        });
        //mendapatkan data scores dengan melakukan grouping data by criteria_id
        $scores_by_criteria = Scores::orderBy('nisn')->get()->groupBy('criteria_id');
        //melakukan proses pencarian nilai max dari setiap criteria untuk ditampilkan
        $max_score = $scores_by_criteria->map(function ($item) {
            $score_by_criteria = $item->map(function ($data) {
                $alternative_score = Subcriterias::where('criteria_id', $data->criteria_id)
                    ->where('subcriteria_start', '<=', $data->score)
                    ->where('subcriteria_end', '>=', $data->score)
                    ->value('subcriteria_score');
                return $alternative_score ?? 0;
            })->toArray();
            return max($score_by_criteria);
        });
        $countdata = Scores::all()->count() / Criterias::all()->count();
        return view('livewire.scores.score', [
            'scores' => $scoresArray,
            'scores_all' => $scores,
            'max_scores' => $max_score,
            'students' => Students::all(),
            'criterias' => Criterias::get(['criteria_name', 'criteria_id']),
            'count' => $countdata,
            'titles' => 'scores',
            'title' => 'score'
        ]);
    }
}
