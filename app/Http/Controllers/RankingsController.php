<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class RankingsController extends Controller
{
    public function index()
    {
        return view('pages.admin.rankings.index');
    }
    public function exportPdf()
    {
        $rankings = Ranking::with(['student', 'school', 'result'])->get();
        $currentTime = Carbon::now('Asia/jakarta');
        $currentTime->toDateTimeString();
        $pdf = PDF::loadView('livewire.rankings.pdf', [
            'rankings'  => $rankings,
            'title' => 'Ranking Report',
            'date' => $currentTime
        ]);
        $pdf->setPaper('A4', 'landscape');
        // return $pdf->download('ReportStudent_'. $currentTime .'.pdf');
        return $pdf->stream('ReportRanking_'. $currentTime .'.pdf');
    }
}