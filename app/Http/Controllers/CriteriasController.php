<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriasController extends Controller
{
    public function index()
    {
        return view('pages.admin.criterias.index');
    }
}
