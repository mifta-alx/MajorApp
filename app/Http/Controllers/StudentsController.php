<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class StudentsController extends Controller
{
    public function index(){
        return view('pages.admin.students.index');
    }
    public function exportPdf()
    {
        $students = Student::with('school')->get();
        $currentTime = Carbon::now('Asia/jakarta');
        $currentTime->toDateTimeString();
        $pdf = PDF::loadView('livewire.students.pdf', [
            'students'  => $students,
            'title' => 'Student Report',
            'date' => $currentTime
        ]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('ReportStudent_'. $currentTime .'.pdf');
    }
}
