<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Result;
use App\Models\School;
use App\Models\Scores;
use App\Models\Criteria;
use App\Models\Subcriteria;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    public function render()
    {
        $student = Student::join('schools', 'students.npsn', '=', 'schools.npsn')->latest()->take(5)
            ->get(['students.*', 'schools.school_name']);
        $all_gender = Student::all()->count();
        $male = Student::where('gender', '=', "Laki-laki")->count();
        $female = Student::where('gender', '=', "Perempuan")->count();
        $percent_male = ($male/$all_gender)*100;
        $percent_female = ($female/$all_gender)*100;
        return view('livewire.dashboard', [
            'students' => $student,
            'count_result' => Result::all()->count(),
            'count_criteria' => Criteria::all()->count(),
            'count_subcriteria' => Subcriteria::get()->groupBy('criteria_id')->count(),
            'count_school' => School::all()->count(),
            'count_student' => Student::all()->count(),
            'percentage_male' => $percent_male,
            'percentage_female' => $percent_female,
        ]);
    }
}
