<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingsController extends Controller
{
    public function index()
    {
        return view('pages.admin.rankings.index');
    }
}