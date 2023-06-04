<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student as Students;
use App\Models\School as Schools;
use Illuminate\Support\Str;

class Student extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $months = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    public $nisn, $student_name, $birth_place, $birth_date, $gender, $email, $phone, $npsn;
    public $uuid;
    //birth_date
    public $day, $month, $year;
    //
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'nisn' => 'required|numeric|digits:10|unique:students',
        'student_name' => 'required|min:3|unique:students',
        'birth_place' => 'required',
        'day' => 'required|numeric|digits:2',
        'month' => 'required',
        'year' => 'required|numeric|digits:4',
        'gender' => 'required',
        'email' => 'required|email:dns|unique:students',
        'phone' => 'required|numeric|min:11',
        'npsn' => 'required'
    ];
    protected $messages = [
        'nisn.required' => 'NISN tidak boleh kosong',
        'nisn.numeric' => 'NISN harus berisi angka',
        'nisn.digits' => 'NISN harus berisi 10 digit',
        'nisn.unique' => 'NISN sudah terdafter',
        'student_name.required' => 'Nama siswa tidak boleh kosong',
        'student_name.min' => 'Nama siswa minimal 3 karakter',
        'student_name.unique' => 'Nama siswa sudah terdafter',
        'birth_place.required' => 'Tempat lahir tidak boleh kosong',
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
        'npsn.required' => 'Asal sekolah tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $uuid = Str::uuid();
        $validated = $this->validate();
        $student = [
            'uuid' => $uuid,
            'nisn' => $validated['nisn'],
            'student_name' => $validated['student_name'],
            'birth_place' => $validated['birth_place'],
            'birth_date' => $validated['day'] . ' ' . $validated['month'] . ' ' . $validated['year'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'npsn' => $validated['npsn'],
        ];
        if (Students::create($student)) {
            session()->flash('success', 'Student created successfully!');
        } else {
            session()->flash('danger', 'Student created failed!');
        }
        return redirect()->to('/students');
        $this->reset();
        $this->resetInput();
    }
    public function edit(string $uuid)
    {
        $student = Students::find($uuid);
        if ($student) {
            $this->uuid = $uuid;
            $birth_dates = explode(' ', $student->birth_date);
            $this->nisn = $student->nisn;
            $this->student_name = $student->student_name;
            $this->birth_place = $student->birth_place;
            $this->day = $birth_dates[0];
            $this->month = $birth_dates[1];
            $this->year = $birth_dates[2];
            $this->gender = $student->gender;
            $this->email = $student->email;
            $this->phone = $student->phone;
            $this->npsn = $student->npsn;
        } else {
            return redirect()->to('/students');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'nisn' => 'required|numeric|digits:10',
            'student_name' => 'required|min:3',
            'birth_place' => 'required',
            'day' => 'required|numeric|digits:2',
            'month' => 'required',
            'year' => 'required|numeric|digits:4',
            'gender' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required|numeric|min:11',
            'npsn' => 'required'
        ];

        if ('nisn' == $this->nisn) {
            $rules['nisn'] = 'required|numeric|digits:10|unique:students';
            $rules['student_name'] = 'required|min:3|unique:students';
            $rules['email'] = 'required|email:dns|unique:students';
        }
        $validated = $this->validate($rules, [
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.numeric' => 'NISN harus berisi angka',
            'nisn.digits' => 'NISN harus berisi 10 digit',
            'nisn.unique' => 'NISN sudah terdafter',
            'student_name.required' => 'Nama siswa tidak boleh kosong',
            'student_name.min' => 'Nama siswa minimal 3 karakter',
            'student_name.unique' => 'Nama siswa sudah terdafter',
            'birth_place.required' => 'Tempat lahir tidak boleh kosong',
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
            'npsn.required' => 'Asal sekolah tidak boleh kosong',
        ]);
        Students::where('uuid', $this->uuid)->update([
            'nisn' => $validated['nisn'],
            'student_name' => $validated['student_name'],
            'birth_place' => $validated['birth_place'],
            'birth_date' => $validated['day'] . ' ' . $validated['month'] . ' ' . $validated['year'],
            'gender' => $validated['gender'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'npsn' => $validated['npsn'],
        ]);
        session()->flash('success', 'Student updated successfully!');
        return redirect()->to('/students');
        $this->reset();
        $this->resetInput();
    }
    public function delete(string $uuid)
    {
        $this->uuid = $uuid;
    }
    public function destroy()
    {
        $student = Students::find($this->uuid)->delete();
        session()->flash('success', 'Student deleted successfully!');
        return redirect()->to('/students');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->nisn = '';
        $this->student_name = '';
        $this->birth_place = '';
        $this->day = '';
        $this->month = '';
        $this->year = '';
        $this->gender = '';
        $this->email = '';
        $this->phone = '';
        $this->npsn = '';
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
        return view('livewire.students.student', [
            'students' =>  Students::with('school')
            ->whereHas('school', function ($query) {
                $query->where('student_name', 'like', '%' . $this->search . '%')
                    ->orWhere('nisn', 'like', '%' . $this->search . '%');
            })
            ->latest('nisn')->paginate($this->paginate),
            'months' => $this->months,
            'schools' => Schools::all(),
            'count' => Students::all()->count(),
            'titles' => 'students',
            'title' => 'student'
        ]);
    }
}
