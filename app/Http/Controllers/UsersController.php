<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        return view('pages.admin.users.index', [
            'user' => User::all()
        ]);
    }
    public function create(){
        return view('pages/admin/users/create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'username' => ['required','min:3', 'max:20', 'unique:users' ],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'role' => 'required'
        ]);
        $validated['password'] = bcrypt($_ENV['PASSWORD_SALT'].$validated['password'].$_ENV['PASSWORD_SALT']);
        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    public function edit(User $user) {
        return view('pages/admin/users/edit',[
            'user' => $user,
        ]);
    }
    public function destroy(User $user) {
        User::destroy($user->id);
        return redirect()->route('users.index')->with('success', 'User has been deleted!');

    }
}
