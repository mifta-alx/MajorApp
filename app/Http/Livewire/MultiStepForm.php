<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\School;
use Illuminate\Support\Str;

class MultiStepForm extends Component
{
    public $nisn, $student_name, $birth_place, $birth_date, $gender, $email, $phone;
    //birth_date
    public $day, $month, $year;
    //
    public $npsn, $school_name, $address, $city_regency, $province;

    public $totalSteps = 2;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }
    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }
    public function validateData()
    {
     if ($this->currentStep == 1) {
        $this->validate([
            'nisn' => 'required|numeric',
            'student_name' => 'required|min:3|unique:students',
            'birth_place' => 'required',
            'day' => 'required|numeric|digits:2',
            'month' => 'required',
            'year' => 'required|numeric|digits:4',
            'gender' => 'required',
            'email' => 'required|email:dns|unique:students',
            'phone' => 'required|numeric|min:11'
        ],[
            'nisn.required'=>'NISN tidak boleh kosong',
            'nisn.numeric'=>'NISN harus berisi angka',
            'student_name.required' => 'Nama siswa tidak boleh kosong',
            'student_name.min' => 'Nama siswa minimal 3 karakter',
            'student_name.unique' => 'Nama siswa sudah terdafter',
            'birth_place.required' => 'Tempat Lahir tidak boleh kosong',
            'day.required' => 'Hari tidak boleh kosong',
            'day.numeric' => 'Hari harus berisi angka',
            'day.digits' => 'Hari harus berisi 2 digit',
            'month.required' => 'Bulan tidak boleh kosong',
            'year.required' => 'Tahun tidak boleh kosong',
            'year.numeric' => 'Tahun harus berisi angka',
            'year.digits' => 'Tahun harus berisi 4 digit',
            'gender.required' => 'Jenis kelamin tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak sesuai',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon tidak boleh kosong',
            'phone.numeric' => 'Nomor telepon harus angka',
            'phone.min' => 'Nomor telepon minimal 11 karakter',
        ]);
     }elseif ($this->currentStep == 2) {
        $this->validate([
            'npsn' => 'required',
        ]);
     }elseif ($this->currentStep == 3) {
        // $this->validate([
            
        // ],[
            
        // ]);
     }
    }
    public function save(){
        $this->resetErrorBag();
        $uuid = Str::uuid();   
        $student = [
            'nisn' => $this->nisn,
            'uuid' => $uuid,
            'student_name' => $this->student_name,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->day.' '.$this->month.' '.$this->year,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'npsn' => $this->npsn,
        ];
        $school = [
            'npsn' => $this->npsn,
            'school_name' => $this->school_name,
            'address' => $this->address,
            'city_regency' => $this->city_regency,
            'province' => $this->province
        ];
        Student::create($student);
        School::create($school);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
}
