<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Criteria as Criterias;

class Criteria extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $criteria_id, $criteria_name, $criteria_label, $weight;

    protected $rules = [
        'criteria_name' => 'required|unique:criterias',
        'criteria_label' => 'required|unique:criterias',
        'weight' => 'required',
    ];
    protected $messages = [
        'criteria_name.unique' => 'Nama Kriteria Sudah Terdaftar',
        'criteria_name.required' => 'Nama Kriteria Tidak Boleh Kosong',
        'criteria_label.unique' => 'Label Kriteria Sudah Terdaftar',
        'criteria_label.required' => 'Label Kriteria Tidak Boleh Kosong',
        'weight.required' => 'Bobot Tidak Boleh Kosong',
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
        $this->reset();
        $this->emit('closeModal', 'CreateModal');
        $this->emit('hideToast');
    }
    public function edit(int $criteria_id)
    {
        $criteria = Criterias::find($criteria_id);
        if ($criteria) {
            $this->criteria_id = $criteria->criteria_id;
            $this->criteria_name = $criteria->criteria_name;
            $this->criteria_label = $criteria->criteria_label;
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
            'criteria_label' => 'required',
            'weight' => 'required',
        ];

        if ('criteria_name' == $this->criteria_name) {
            $rules['criteria_name'] = 'required|unique:criterias';
            $rules['criteria_label'] = 'required|unique:criterias';
            $rules['weight'] = 'required';
        }
        $validated = $this->validate($rules, [
            'criteria_name.unique' => 'Nama Kriteria Sudah Terdaftar',
            'criteria_name.required' => 'Nama Kriteria Tidak Boleh Kosong',
            'criteria_label.unique' => 'Label Kriteria Sudah Terdaftar',
            'criteria_label.required' => 'Label Kriteria Tidak Boleh Kosong',
        ]);
        Criterias::where('criteria_id', $this->criteria_id)->update([
            'criteria_name' => $validated['criteria_name'],
            'criteria_label' => $validated['criteria_label'],
            'weight' => $validated['weight'],
        ]);
        session()->flash('success', 'Criteria updated successfully!');
        $this->reset();
        $this->emit('closeModal', 'EditModal');
        $this->emit('hideToast');
    }
    public function delete(int $criteria_id)
    {
        $this->criteria_id = $criteria_id;
    }
    public function destroy(){
        $criteria = Criterias::find($this->criteria_id)->delete();
        session()->flash('success', 'Criteria deleted successfully!');
        $this->reset();
        $this->emit('closeModal', 'DeleteModal');
        $this->emit('hideToast');
    }
    public function closeModal()
    {
        $this->reset();
    }
    public function render()
    {
        $criterias = Criterias::all();
        return view('livewire.criteria', [
            'criterias' => $criterias,
        ]);
    }
}
