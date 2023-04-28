<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\School as Schools;

class School extends Component
{
    use WithPagination;
    public $npsn, $school_name, $address, $city_regency, $province;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'npsn' => 'required|unique:schools',
        'school_name' => 'required|unique:schools',
        'address' => 'required',
        'city_regency' => 'required',
        'province' => 'required',
    ];
    protected $messages = [
        'npsn.required' => 'NPSN tidak boleh kosong',
        'npsn.unique' => 'NPSN sudah terdaftar',
        'school_name.required' => 'Nama sekolah tidak boleh kosong',
        'school_name.unique' => 'Nama sekolah sudah terdaftar',
        'address.required' => 'Alamat tidak boleh kosong',
        'city_regency.required' => 'Kota/Kabupaten tidak boleh kosong',
        'province.required' => 'Provinsi tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Schools::create($validated);
        session()->flash('success', 'School created successfully!');
        return redirect()->to('/schhols');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $npsn)
    {
        $school = Schools::find($npsn);
        if ($school) {
            $this->npsn = $school->npsn;
            $this->school_name = $school->school_name;
            $this->address = $school->address;
            $this->city_regency = $school->city_regency;
            $this->province = $school->province;
        } else {
            return redirect()->to('/schools');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'npsn' => 'required',
            'school_name' => 'required',
            'address' => 'required',
            'city_regency' => 'required',
            'province' => 'required',
        ];

        if ('school_name' == $this->school_name) {
            $rules['npsn'] = 'required|unique:schools';
            $rules['school_name'] = 'required|unique:schools';
            $rules['address'] = 'required';
            $rules['city_regency'] = 'required';
            $rules['province'] = 'required';
        }
        $validated = $this->validate($rules, [
            'npsn.required' => 'NPSN tidak boleh kosong',
            'npsn.unique' => 'NPSN sudah terdaftar',
            'school_name.required' => 'Nama sekolah tidak boleh kosong',
            'school_name.unique' => 'Nama sekolah sudah terdaftar',
            'address.required' => 'Alamat tidak boleh kosong',
            'city_regency.required' => 'Kota/Kabupaten tidak boleh kosong',
            'province.required' => 'Provinsi tidak boleh kosong',
        ]);
        Schools::where('npsn', $this->npsn)->update([
            'npsn' => $validated['npsn'],
            'school_name' => $validated['school_name'],
            'address' => $validated['address'],
            'city_regency' => $validated['city_regency'],
            'province' => $validated['province'],
        ]);
        session()->flash('success', 'School updated successfully!');
        return redirect()->to('/schhols');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $npsn)
    {
        $this->npsn = $npsn;
    }
    public function destroy()
    {
        $school = Schools::find($this->npsn)->delete();
        session()->flash('success', 'School deleted successfully!');
        return redirect()->to('/schhols');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->npsn = '';
        $this->school_name = '';
        $this->address = '';
        $this->city_regency = '';
        $this->province = '';
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
        return view('livewire.schools.school', [
            'schools' =>  Schools::where('school_name', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'count' => Schools::all()->count(),
            'titles' => 'schools',
            'title' => 'school'
        ]);
    }
}
