<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Score as Scores;
use App\Models\Student as Students;
use App\Models\Alternative as Alternatives;
use App\Models\Criteria as Criterias;
use Illuminate\Validation\Rule;

class Score extends Component
{
    use WithPagination;

    public $score_id, $nisn, $alternative_id, $criteria_id, $score;
    public $paginate = 5;
    public $search = '';

    public function rules()
    {
        return [
            'nisn' => [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['alternative_id', $this->alternative_id],
                        ['criteria_id', $this->criteria_id],
                    ]);
                })
            ],
            'alternative_id' => [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['criteria_id', $this->criteria_id],
                        ['nisn', $this->nisn],
                    ]);
                })
            ],
            'criteria_id' => [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['alternative_id', $this->alternative_id],
                        ['nisn', $this->nisn],
                    ]);
                })
            ],
            'score' => 'required|numeric|between:0,100',
        ];
    }
    protected $messages = [
        'nisn.required' => 'Siswa tidak boleh kosong',
        'nisn.unique' => 'Siswa ini sudah digunakan untuk alternatif dan kriteria yang dipilih',
        'alternative_id.required' => 'Alternative tidak boleh kosong',
        'alternative_id.unique' => 'Alternatif ini sudah digunakan untuk siswa dan kriteria yang dipilih',
        'criteria_id.required' => 'Kriteria tidak boleh kosong',
        'criteria_id.unique' => 'Kriteria ini sudah digunakan untuk siswa dan alternatif yang dipilih',
        'score.required' => 'Nilai tidak boleh kosong',
        'score.numeric' => 'Nilai harus berisi angka',
        'score.between' => 'Nilai harus berisi nilai antara 0 sampai 100',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Scores::create($validated);
        session()->flash('success', 'Score created successfully!');
        return redirect()->to('/scores');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $score_id)
    {
        $score = Scores::find($score_id);
        if ($score) {
            $this->score_id = $score->score_id;
            $this->criteria_id = $score->criteria_id;
            $this->alternative_id = $score->alternative_id;
            $this->nisn = $score->nisn;
            $this->score = $score->score;
        } else {
            return redirect()->to('/scores');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'nisn' => 'required',
            'alternative_id' => 'required',
            'criteria_id' => 'required',
            'score' => 'required|numeric|between:0,100',
        ];

        if ('nisn' == $this->nisn) {
            $rules['nisn'] = [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['alternative_id', $this->alternative_id],
                        ['criteria_id', $this->criteria_id],
                    ]);
                })
            ];
            $rules['alternative_id'] = [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['criteria_id', $this->criteria_id],
                        ['nisn', $this->nisn],
                    ]);
                })
            ];
            $rules['criteria_id'] = [
                'required',
                Rule::unique('scores')->where(function ($query) {
                    return $query->where([
                        ['alternative_id', $this->alternative_id],
                        ['nisn', $this->nisn],
                    ]);
                })
            ];
        }
        $validated = $this->validate($rules, [
            'nisn.required' => 'Siswa tidak boleh kosong',
            'nisn.unique' => 'Siswa ini sudah digunakan untuk alternatif dan kriteria yang dipilih',
            'alternative_id.required' => 'Alternative tidak boleh kosong',
            'alternative_id.unique' => 'Alternatif ini sudah digunakan untuk siswa dan kriteria yang dipilih',
            'criteria_id.required' => 'Kriteria tidak boleh kosong',
            'criteria_id.unique' => 'Kriteria ini sudah digunakan untuk siswa dan alternatif yang dipilih',
            'score.required' => 'Nilai tidak boleh kosong',
            'score.numeric' => 'Nilai harus berisi angka',
            'score.between' => 'Nilai harus berisi nilai antara 0 sampai 100',
        ]);
        Scores::where('score_id', $this->score_id)->update([
            'nisn' => $validated['nisn'],
            'alternative_id' => $validated['alternative_id'],
            'criteria_id' => $validated['criteria_id'],
            'score' => $validated['score'],
        ]);
        session()->flash('success', 'Score updated successfully!');
        return redirect()->to('/scores');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $score_id)
    {
        $this->score_id = $score_id;
    }
    public function destroy()
    {
        $score = Scores::find($this->score_id)->delete();
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
        $this->alternative_id = '';
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
    public function render()
    {
        return view('livewire.scores.score', [
            'scores' =>  Scores::where('student_name', 'like', '%' . $this->search . '%')
                ->orWhere('alternative_name', 'like', '%' . $this->search . '%')
                ->orWhere('criteria_label', 'like', '%' . $this->search . '%')
                ->join('students', 'scores.nisn', '=', 'students.nisn')
                ->join('criterias', 'scores.criteria_id', '=', 'criterias.criteria_id')
                ->join('alternatives', 'scores.alternative_id', '=', 'alternatives.alternative_id')
                ->paginate($this->paginate, ['scores.*', 'students.student_name', 'criterias.criteria_label', 'alternatives.alternative_name']),
            'students' => Students::all(),
            'alternatives' => Alternatives::all(),
            'criterias' => Criterias::all(),
            'count' => Scores::all()->count(),
            'titles' => 'scores',
            'title' => 'score'
        ]);
    }
}
