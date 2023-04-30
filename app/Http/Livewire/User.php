<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use App\Models\User as Users;
use App\Models\Role as Roles;

class User extends Component
{
    use WithPagination;

    public $user_id, $nama, $username, $email, $password, $role_id, $uuid;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'nama' => 'required',
        'username' => 'required|min:3|max:20|unique:users',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|string',
        'role_id' => 'required'
    ];
    protected $messages = [
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
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        $uuid = Str::uuid();
        $validated['uuid'] = $uuid;
        $validated['password'] = bcrypt($_ENV['PASSWORD_SALT'] . $validated['password'] . $_ENV['PASSWORD_SALT']);
        Users::create($validated);
        session()->flash('success', 'User created successfully!');
        return redirect()->to('/users');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $user_id)
    {
        $user = Users::find($user_id);
        if ($user) {
            $this->user_id = $user->user_id;
            $this->nama = $user->nama;
            $this->username = $user->username;
            $this->email = $user->email;
            $this->password = $user->password;
            $this->role_id = $user->role_id;
        } else {
            return redirect()->to('/users');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'nama' => 'required',
            'username' => 'required|min:3|max:20',
            'email' => 'required|email:dns',
            'role_id' => 'required'
        ];

        if ('nama' == $this->nama) {
            $rules['username'] = 'required|min:3|max:20|unique:users';
            $rules['email'] = 'required|email:dns|unique:users';
        }
        $validated = $this->validate($rules, [
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
        Users::where('user_id', $this->user_id)->update([
            'nama' => $validated['nama'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
        ]);
        session()->flash('success', 'User updated successfully!');
        return redirect()->to('/users');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $user_id)
    {
        $this->user_id = $user_id;
    }
    public function destroy()
    {
        $user = Users::find($this->user_id)->delete();
        session()->flash('success', 'User deleted successfully!');
        return redirect()->to('/users');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetErrorBag();
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->user_id = '';
        $this->uuid = '';
        $this->nama = '';
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->role_id = '';
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function clearSearch()
    {
        $this->search = '';
    }
    public function render()
    {
        return view('livewire.users.user', [
            'users' =>  Users::where('nama', 'like', '%' . $this->search . '%')
                ->join('roles', 'users.role_id', '=', 'roles.role_id')
                ->paginate($this->paginate, ['users.*', 'roles.role_name']),
            'count' => Users::all()->count(),
            'roles' => Roles::all(),
            'titles' => 'users',
            'title' => 'user',
        ]);
    }
}
