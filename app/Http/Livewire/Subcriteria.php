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
        'criteria_id.required' => 'Id Kriteria Tidak Boleh Kosong',
        'subcriteria_start.required' => 'Nilai Awal Subkriteria Tidak Boleh Kosong',
        'subcriteria_start.numeric' => 'Nilai Awal Subkriteria harus berisi angka',
        'subcriteria_start.between' => 'Nilai Awal Subkriteria harus berisi nilai antara 0 sampai 100',
        'subcriteria_end.required' => 'Nilai Akhir Subkriteria Tidak Boleh Kosong',
        'subcriteria_end.numeric' => 'Nilai Akhir Subkriteria harus berisi angka',
        'subcriteria_end.between' => 'Nilai Akhir Subkriteria harus berisi nilai antara 0 sampai 100',
        'subcriteria_score.required' => 'Nilai Subkriteria Tidak Boleh Kosong',
        'subcriteria_score.numeric' => 'Nilai Subkriteria harus berisi angka',
        'subcriteria_score.between' => 'Nilai Subkriteria harus berisi nilai antara 1 sampai 5',
    ];
    public function mount(){
        
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Subcriterias::create($validated);
        session()->flash('success', 'Subriteria created successfully!');
        $this->reset();
        $this->emit('closeModal', 'CreateModal');
        $this->emit('hideToast');
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
            'subcriteria_start' => 'required',
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
            'criteria_id.required' => 'Id Kriteria Tidak Boleh Kosong',
            'subcriteria_start.required' => 'Nilai Awal Subkriteria Tidak Boleh Kosong',
            'subcriteria_start.numeric' => 'Nilai Awal Subkriteria harus berisi angka',
            'subcriteria_start.between' => 'Nilai Awal Subkriteria harus berisi nilai antara 0 sampai 100',
            'subcriteria_end.required' => 'Nilai Akhir Subkriteria Tidak Boleh Kosong',
            'subcriteria_end.numeric' => 'Nilai Akhir Subkriteria harus berisi angka',
            'subcriteria_end.between' => 'Nilai Akhir Subkriteria harus berisi nilai antara 0 sampai 100',
            'subcriteria_score.required' => 'Nilai Subkriteria Tidak Boleh Kosong',
            'subcriteria_score.numeric' => 'Nilai Subkriteria harus berisi angka',
            'subcriteria_score.between' => 'Nilai Subkriteria harus berisi nilai antara 1 sampai 5',
        ]);
        Subcriterias::where('subcriteria_id', $this->subcriteria_id)->update([
            'criteria_id' => $validated['criteria_id'],
            'subcriteria_start' => $validated['subcriteria_start'],
            'subcriteria_end' => $validated['subcriteria_end'],
            'subcriteria_score' => $validated['subcriteria_score'],
        ]);
        session()->flash('success', 'Subcriteria updated successfully!');
        $this->reset();
        $this->emit('closeModal', 'EditModal');
        $this->emit('hideToast');
    }
    public function delete(int $subcriteria_id)
    {
        $this->subcriteria_id = $subcriteria_id;
    }
    public function destroy()
    {
        $subcriteria = Subcriterias::find($this->subcriteria_id)->delete();
        session()->flash('success', 'Subcriteria deleted successfully!');
        $this->reset();
        $this->emit('closeModal', 'DeleteModal');
        $this->emit('hideToast');
    }
    public function closeModal()
    {
        $this->reset();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.subcriterias.subcriteria', [
            'subcriterias' =>  Subcriterias::where('criteria_id', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'criterias' => Criterias::all(),
        ]);
    }
}
