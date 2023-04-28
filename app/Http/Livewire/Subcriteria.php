<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Criteria as Criterias;
use App\Models\Subcriteria as SubCriterias;

class Subcriteria extends Component
{
    use WithPagination;
    public $subcriteria_id, $criteria_id, $subcriteria_start, $subcriteria_end, $subcriteria_score;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'criteria_id' => 'required',
        'subcriteria_start' => 'required|numeric|between:0,100',
        'subcriteria_end' => 'required|numeric|between:0,100',
        'subcriteria_score' => 'required|numeric|between:1,5',
    ];
    protected $messages = [
        'criteria_id.required' => 'Id kriteria tidak boleh kosong',
        'subcriteria_start.required' => 'Nilai awal subkriteria tidak boleh kosong',
        'subcriteria_start.numeric' => 'Nilai awal subkriteria harus berisi angka',
        'subcriteria_start.between' => 'Nilai awal subkriteria harus berisi nilai antara 0 sampai 100',
        'subcriteria_end.required' => 'Nilai akhir subkriteria tidak boleh kosong',
        'subcriteria_end.numeric' => 'Nilai akhir subkriteria harus berisi angka',
        'subcriteria_end.between' => 'Nilai akhir subkriteria harus berisi nilai antara 0 sampai 100',
        'subcriteria_score.required' => 'Nilai subkriteria tidak boleh kosong',
        'subcriteria_score.numeric' => 'Nilai subkriteria harus berisi angka',
        'subcriteria_score.between' => 'Nilai subkriteria harus berisi nilai antara 1 sampai 5',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Subcriterias::create($validated);
        return redirect()->to('/subcriterias');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $subcriteria_id)
    {
        $subcriteria = Subcriterias::find($subcriteria_id);
        if ($subcriteria) {
            $this->subcriteria_id = $subcriteria->subcriteria_id;
            $this->criteria_id = $subcriteria->criteria_id;
            $this->subcriteria_start = $subcriteria->subcriteria_start;
            $this->subcriteria_end = $subcriteria->subcriteria_end;
            $this->subcriteria_score = $subcriteria->subcriteria_score;
        } else {
            return redirect()->to('/subcriterias');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'criteria_id' => 'required',
            'subcriteria_start' => 'required|numeric|between:0,100',
            'subcriteria_end' => 'required',
            'subcriteria_score' => 'required',
        ];

        if ('subcriteria_start' == $this->subcriteria_start) {
            $rules['criteria_id'] = 'required';
            $rules['subcriteria_start'] = 'required|numeric|between:0,100';
            $rules['subcriteria_end'] = 'required|numeric|between:0,100';
            $rules['subcriteria_score'] = 'required|numeric|between:1,5';
        }
        $validated = $this->validate($rules, [
            'criteria_id.required' => 'Id Kriteria tidak boleh kosong',
            'subcriteria_start.required' => 'Nilai awal subkriteria tidak boleh kosong',
            'subcriteria_start.numeric' => 'Nilai awal subkriteria harus berisi angka',
            'subcriteria_start.between' => 'Nilai awal subkriteria harus berisi nilai antara 0 sampai 100',
            'subcriteria_end.required' => 'Nilai akhir subkriteria tidak boleh kosong',
            'subcriteria_end.numeric' => 'Nilai akhir subkriteria harus berisi angka',
            'subcriteria_end.between' => 'Nilai akhir subkriteria harus berisi nilai antara 0 sampai 100',
            'subcriteria_score.required' => 'Nilai subkriteria tidak boleh kosong',
            'subcriteria_score.numeric' => 'Nilai subkriteria harus berisi angka',
            'subcriteria_score.between' => 'Nilai subkriteria harus berisi nilai antara 1 sampai 5',
        ]);
        Subcriterias::where('subcriteria_id', $this->subcriteria_id)->update([
            'criteria_id' => $validated['criteria_id'],
            'subcriteria_start' => $validated['subcriteria_start'],
            'subcriteria_end' => $validated['subcriteria_end'],
            'subcriteria_score' => $validated['subcriteria_score'],
        ]);
        session()->flash('success', 'Subcriteria updated successfully!');
        return redirect()->to('/subcriterias');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $subcriteria_id)
    {
        $this->subcriteria_id = $subcriteria_id;
    }
    public function destroy()
    {
        $subcriteria = Subcriterias::find($this->subcriteria_id)->delete();
        session()->flash('success', 'Subcriteria deleted successfully!');
        return redirect()->to('/subcriterias');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->subcriteria_id = '';
        $this->criteria_id = '';
        $this->subcriteria_start = '';
        $this->subcriteria_end = '';
        $this->subcriteria_score = '';
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
        return view('livewire.subcriterias.subcriteria', [
            'subcriterias' =>  Subcriterias::where('criteria_name', 'like', '%' . $this->search . '%')
                ->join('criterias', 'subcriterias.criteria_id', '=', 'criterias.criteria_id')
                ->paginate($this->paginate, ['subcriterias.*', 'criterias.criteria_label']),
            'count' => SubCriterias::all()->count(),
            'titles' => 'subcriterias',
            'title' => 'subcriteria',
            'criterias' => Criterias::all(),
        ]);
    }
}
