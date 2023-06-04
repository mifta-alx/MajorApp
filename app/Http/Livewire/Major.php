<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Criteria as Criterias;
use App\Models\Major as Majors;

class Major extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $paginate = 5;
    public $search = '';
    public $criteria_search;
    public $selectedCriteria = [];
    public $dropdown = 0;
    public $major, $major_id;

    protected $rules = [
        'selectedCriteria' => 'required|array',
        'major' => 'required|unique:majors',
    ];
    protected $messages = [
        'selectedCriteria.required' => 'Kriteria tidak boleh kosong',
        'major.unique' => 'Nama jurusan sudah terdaftar',
        'major.required' => 'Nama jurusan tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        $major = Majors::create([
            'major' => $validated['major'],
            'criteria_id' => json_encode($validated['selectedCriteria']),
        ]);
        session()->flash('success', 'Major created successfully!');
        return redirect()->to('/majors');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $major_id)
    {
        $major = Majors::where('major_id', $major_id)->get();
        if ($major) {
            $this->major_id = $major->first()->major_id;
            $this->major = $major->first()->major;
            foreach ($major as $value) {
                foreach (json_decode($value->criteria_id) as $criteria) {
                    $this->selectedCriteria[] = $criteria;
                }
            }
        } else {
            return redirect()->to('/majors');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'selectedCriteria' => 'required|array',
            'major' => 'required',
        ];

        if ('major' == $this->major) {
            $rules['major'] = 'required|unique:majors';
        }
        $validated = $this->validate($rules, [
            'selectedCriteria.required' => 'Kriteria tidak boleh kosong',
            'major.unique' => 'Nama jurusan sudah terdaftar',
            'major.required' => 'Nama jurusan tidak boleh kosong',
        ]);
        Majors::where('major_id', $this->major_id)->update([
            'major' => $validated['major'],
            'criteria_id' => $validated['selectedCriteria'],
        ]);
        session()->flash('success', 'Major updated successfully!');
        return redirect()->to('/majors');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $major_id)
    {
        $this->major_id = $major_id;
    }
    public function destroy()
    {
        $major = Majors::find($this->major_id)->delete();
        session()->flash('success', 'Major deleted successfully!');
        return redirect()->to('/majors');
        $this->reset();
        $this->resetInput();
    }
    public function openDropdown()
    {
        $this->dropdown = 1;
    }
    public function closeDropdown()
    {
        $this->dropdown = 0;
    }
    public function clearSelectedCriteria()
    {
        $this->dropdown = 0;
        $this->selectedCriteria = [];
    }
    public function removeItem($criteriaId)
    {
        $weight = Criterias::where('criteria_id', $criteriaId)->value('weight');
        $this->selectedCriteria = array_diff($this->selectedCriteria, [$criteriaId]);
        if($this->dropdown = 1){
            $this->dropdown = 0;
        }
    }

    public function updateSelectedCriteria($criteriaId)
    {
        $weight = Criterias::where('criteria_id', $criteriaId)->value('weight');
        if (in_array($criteriaId, $this->selectedCriteria)) {
            $this->selectedCriteria = array_diff($this->selectedCriteria, [$criteriaId]);
        } else {
            $this->selectedCriteria[] = $criteriaId;
        }
        $this->criteria_search = '';
        $this->dropdown = 0;
    }
    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInput();
        $this->dropdown = 0;
        $this->selectedCriteria = [];
    }
    public function resetInput()
    {
        $this->major = '';
        $this->major_id = '';
        $this->selectedCriteria = [];
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
        return view('livewire.majors.major', [
            'majors' => Majors::where('major', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'count' => Majors::all()->count(),
            'criterias' => Criterias::where('criteria_name', 'like', '%' . $this->criteria_search . '%')->get(),
            'all_criterias' => Criterias::get(),
            'criteria_all' => Criterias::all(),
            'titles' => 'majors',
            'title' => 'major',
            'dropdown' => $this->dropdown,
            'selectedCriteria' => $this->selectedCriteria
        ]);
    }
}
