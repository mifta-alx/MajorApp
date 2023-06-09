<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Criteria as Criterias;

class Criteria extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $criteria_id, $criteria_name, $criteria_code, $weight;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'criteria_name' => 'required|unique:criterias',
        'criteria_code' => 'required|unique:criterias',
        'weight' => 'required|numeric|between:0,100',
    ];
    protected $messages = [
        'criteria_name.unique' => 'Nama kriteria sudah terdaftar',
        'criteria_name.required' => 'Nama kriteria tidak boleh kosong',
        'criteria_code.unique' => 'Label kriteria sudah terdaftar',
        'criteria_code.required' => 'Label kriteria tidak boleh kosong',
        'weight.required' => 'Bobot tidak boleh kosong',
        'weight.numeric' => 'Bobot harus berisi angka',
        'weight.between' => 'Bobot harus berisi nilai antara 0 sampai 100',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Criterias::create($validated);
        session()->flash('success', 'Criteria created successfully!');
        return redirect()->to('/criterias');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $criteria_id)
    {
        $criteria = Criterias::find($criteria_id);
        if ($criteria) {
            $this->criteria_id = $criteria->criteria_id;
            $this->criteria_name = $criteria->criteria_name;
            $this->criteria_code = $criteria->criteria_code;
            $this->weight = $criteria->weight;
        } else {
            return redirect()->to('/criterias');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'criteria_name' => 'required',
            'criteria_code' => 'required',
            'weight' => 'required|numeric|between:0,100',
        ];

        if ('criteria_name' == $this->criteria_name) {
            $rules['criteria_name'] = 'required|unique:criterias';
            $rules['criteria_code'] = 'required|unique:criterias';
        }
        $validated = $this->validate($rules, [
            'criteria_name.unique' => 'Nama kriteria sudah terdaftar',
            'criteria_name.required' => 'Nama kriteria tidak boleh kosong',
            'criteria_code.unique' => 'Label kriteria sudah terdaftar',
            'criteria_code.required' => 'Label kriteria tidak boleh kosong',
            'weight.required' => 'Bobot tidak boleh kosong',
            'weight.numeric' => 'Bobot harus berisi angka',
            'weight.between' => 'Bobot harus berisi nilai antara 0 sampai 100',
        ]);
        Criterias::where('criteria_id', $this->criteria_id)->update([
            'criteria_name' => $validated['criteria_name'],
            'criteria_code' => $validated['criteria_code'],
            'weight' => $validated['weight'],
        ]);
        session()->flash('success', 'Criteria updated successfully!');
        return redirect()->to('/criterias');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $criteria_id)
    {
        $this->criteria_id = $criteria_id;
    }
    public function destroy()
    {
        $criteria = Criterias::find($this->criteria_id)->delete();
        session()->flash('success', 'Criteria deleted successfully!');
        return redirect()->to('/criterias');
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
        $this->criteria_id = '';
        $this->criteria_name = '';
        $this->criteria_code = '';
        $this->weight = '';
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
        return view('livewire.criterias.criteria', [
            'criterias' =>  Criterias::where('criteria_name', 'like', '%' . $this->search . '%')
                ->paginate($this->paginate),
            'count' => Criterias::all()->count(),
            'titles' => 'criterias',
            'title' => 'criteria'
        ]);
    }
}
