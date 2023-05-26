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
        return [
            'nisn' => ['required'],
            'score.*' => 'required|numeric',
        ];
    }
    protected $messages = [
        'nisn.required' => 'Siswa tidak boleh kosong',
        'nisn.unique' => 'Siswa ini sudah digunakan untuk alternatif dan kriteria yang dipilih',
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
        $scoreData = [];
        $normalizedData = [];
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
        $validated = $this->validate();
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
        $scores = Scores::with(['student', 'criteria'])
            ->whereHas('student', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nisn')
            ->get()
            ->groupBy('nisn');
        $scoresArray = $scores->map(function ($item) {
            $scores = $item->map(function ($score) {
                $sub_score = Subcriterias::where('criteria_id', $score->criteria_id)
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
                $maxValue = $nilaiMax[$index + 1];
                $dividedScore = $score / $maxValue;
                return $dividedScore;
            });
            $normalizedData[$key] = $dividedData;
        }
        $currentPage = request()->input('page', 1); // Mendapatkan nomor halaman saat ini dari URL

        // Buat objek Paginator menggunakan $searchResults
        $paginatedResults = new \Illuminate\Pagination\LengthAwarePaginator(
            $scoresArray->forPage($currentPage, $this->paginate),
            $scoresArray->count(),
            $this->paginate,
            $currentPage,
            ['path' => request()->url()]
        );
        return view('livewire.scores.score', [
            'scores' => $scoresArray,
            'data_max' => $nilaiMax,
            'students' => Students::all(),
            'criterias' => Criterias::get(['criteria_name', 'criteria_id']),
            'count' => $scores->count(),
            'titles' => 'scores',
            'title' => 'score'
        ]);
    }
}
