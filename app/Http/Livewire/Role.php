<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role as Roles;

class Role extends Component
{
    use WithPagination;

    public $role_id, $role_name;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'role_name' => 'required|unique:roles',
    ];
    protected $messages = [
        'role_name.unique' => 'Nama role sudah terdaftar',
        'role_name.required' => 'Nama role tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Roles::create($validated);
        session()->flash('success', 'Role created successfully!');
        return redirect()->to('/roles');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $role_id)
    {
        $role = Roles::find($role_id);
        if ($role) {
            $this->role_id = $role->role_id;
            $this->role_name = $role->role_name;
        } else {
            return redirect()->to('/roles');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'role_name' => 'required',
        ];

        if ('role_name' == $this->role_name) {
            $rules['role_name'] = 'required|unique:roles';
        }
        $validated = $this->validate($rules, [
            'role_name.unique' => 'Nama role sudah terdaftar',
            'role_name.required' => 'Nama role tidak boleh kosong',
        ]);
        Roles::where('role_id', $this->role_id)->update([
            'role_name' => $validated['role_name'],
        ]);
        session()->flash('success', 'Role updated successfully!');
        return redirect()->to('/roles');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $role_id)
    {
        $this->role_id = $role_id;
    }
    public function destroy()
    {
        $role = Roles::find($this->role_id)->delete();
        session()->flash('success', 'Roles deleted successfully!');
        return redirect()->to('/roles');
        $this->reset();
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->role_id = '';
        $this->role_name = '';
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
        return view('livewire.roles.role', [
            'roles' =>  Roles::where('role_name', 'like', '%' . $this->search . '%')->paginate($this->paginate),
            'count' => Roles::all()->count(),
            'titles' => 'roles',
            'title' => 'role'
        ]);
    }
}
