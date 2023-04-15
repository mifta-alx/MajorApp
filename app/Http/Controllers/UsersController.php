<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        return view('pages.admin.users.index', [
            'user' => User::all(),
        ]);
    }
    public function create()
    {
        return view('pages/admin/users/create', [
            'role' => Role::all()
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'username' => ['required', 'min:3', 'max:20', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5',
            'role_id' => 'required'
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'username.required' => 'Username Tidak Boleh Kosong',
            'username.min' => 'Username minimal 3 huruf',
            'username.max' => 'Username maximal 20 huruf',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.email' => 'Format Email Salah',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password minimal 5 huruf',
            'role_id.required' => 'Role Tidak Boleh Kosong',

        ]);
        $uuid = Str::uuid();
        $validated['uuid'] = $uuid;
        $validated['password'] = bcrypt($_ENV['PASSWORD_SALT'] . $validated['password'] . $_ENV['PASSWORD_SALT']);
        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
    public function edit(User $user)
    {
        return view('pages/admin/users/edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        // $rules = [
        //     'role_name' => 'required',
        // ];

        // if ($request->role_name != $role->role_name){
        //     $rules['role_name'] = 'required|unique:roles';
        // }
        // $validated = $request->validate($rules, [
        //     'role_name.unique' => 'Nama Role Sudah Terdaftar',
        //     'role_name.required' => 'Nama Role Tidak Boleh Kosong',
        // ]);
        Role::where('uuid', $user->uuid)
            ->update($request);
        return redirect()->route('users.index')->with('success', 'User edited successfully!');
    }
    public function destroy(User $user)
    {
        // User::destroy('uuid', $user->uuid);
        User::where('uuid', $user->uuid)->delete();
        return redirect()->route('users.index')->with('success', 'User has been deleted!');
    }
}
