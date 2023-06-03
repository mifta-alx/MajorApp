<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class SchoolsController extends Controller
{
    public function index()
    {
        return view('pages.admin.schools.index');
    }
    public function exportPdf()
    {
        $schools = School::all();
        $currentTime = Carbon::now('Asia/jakarta');
        $currentTime->toDateTimeString();
        $pdf = PDF::loadView('livewire.schools.pdf', [
            'schools'  => $schools,
            'title' => 'Schools Report',
            'date' => $currentTime
        ]);
        $pdf->setPaper('A4', 'landscape');
        // return $pdf->download('ReportSchool_'. $currentTime .'.pdf');
        return $pdf->stream('ReportSchool_'. $currentTime .'.pdf');
    }
}
