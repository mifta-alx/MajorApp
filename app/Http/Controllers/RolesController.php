<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.roles.index',[
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|unique:roles',
        ],[
            'role_name.unique' => 'Nama Role Sudah Terdaftar',
            'role_name.required' => 'Nama Role Tidak Boleh Kosong',
        ]);
        Role::create($validated);
        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('pages/admin/roles/edit',[
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $rules = [
            'role_name' => 'required',
        ];

        if ($request->role_name != $role->role_name){
            $rules['role_name'] = 'required|unique:roles';
        }
        $validated = $request->validate($rules, [
            'role_name.unique' => 'Nama Role Sudah Terdaftar',
            'role_name.required' => 'Nama Role Tidak Boleh Kosong',
        ]);
        Role::where('role_id', $role->role_id)
            ->update($validated);
        return redirect()->route('roles.index')->with('success', 'Role edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->role_id);
        // $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role has been deleted!');
    }
}
