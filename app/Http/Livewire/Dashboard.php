<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Result;
use App\Models\School;
use App\Models\Score;
use App\Models\Criteria;
use App\Models\Major;
use App\Models\Subcriteria;
use App\Models\Ranking;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public $recentStudent;
    public $byGender, $nilaiMax;
    public $count_result, $count_criteria, $count_school, $count_student, $count_major;
    public function mount()
    {
        $all_student = Student::latest()->get()->groupBy('gender');
        foreach ($all_student as $key => $student) {
            $gender['label'][] = $key;
            $gender['data'][] = $student->count();
        }
        $this->byGender = json_encode($gender);

        $this->count_result = Result::all()->count();
        $this->count_criteria = Criteria::all()->count();
        $this->count_school = School::all()->count();
        $this->count_student = Student::all()->count();
        $this->count_major = Major::all()->count();

        $scores = Score::with('criteria')->latest()->get()->groupBy('criteria_id');

        foreach ($scores as $key => $score) {
            $maxScore['label'][] = $score->first()->criteria->first()->criteria_name;
            $maxScore['data'][] = $score->max('score');
        }
        $this->nilaiMax = json_encode($maxScore ?? []);
    }
    public function render()
    {
        $students = Student::with(['school'])->latest('created_at')->take(5)->get();
        foreach ($students as $student) {
            $data[$student->nisn] = [
                'student_name' => $student->student_name,
                'school_name' => $student->school->school_name,
                'date' => $student->created_at->format('D, d M'),
                'time' => $student->created_at->format('h:i A'),
            ];
        }

        $this->recentStudent = $data;
        return view('livewire.dashboard', [
            'recentStudents' => $this->recentStudent,
            'count_major' => Major::all()->count(),
            'rankings' => Ranking::with(['student', 'school', 'result'])->latest()->take(5)->get(),
        ]);
    }
}
