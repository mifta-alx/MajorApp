<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    public function index(){
        return view('pages.admin.students.index',[
            'siswa' => Student::all()
        ]);
    }
    // public function register(){
    //     return view('pages/users/siswa/bio');
    // }
    public function create(){
        return view('pages.admin.students.create');
    }
    public function store(Request $request){
        Student::create($request->post());
        return redirect()->route('pages.users.students.index');
    }
    
}
