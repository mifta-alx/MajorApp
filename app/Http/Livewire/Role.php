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
        'role_name.unique' => 'Nama Role Sudah Terdaftar',
        'role_name.required' => 'Nama Role Tidak Boleh Kosong',
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
        $this->reset();
        $this->emit('closeModal', 'CreateModal');
        $this->emit('hideToast');
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
            'role_name.unique' => 'Nama Role Sudah Terdaftar',
            'role_name.required' => 'Nama Role Tidak Boleh Kosong',
        ]);
        Roles::where('role_id', $this->role_id)->update([
            'role_name' => $validated['role_name'],
        ]);
        session()->flash('success', 'Role updated successfully!');
        $this->reset();
        $this->emit('closeModal', 'EditModal');
        $this->emit('hideToast');
    }
    public function delete(int $role_id)
    {
        $this->role_id = $role_id;
    }
    public function destroy()
    {
        $criteria = Roles::find($this->role_id)->delete();
        session()->flash('success', 'Roles deleted successfully!');
        $this->reset();
        $this->emit('closeModal', 'DeleteModal');
        $this->emit('hideToast');
    }
    public function closeModal()
    {
        $this->reset();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.roles.role', [
            'roles' =>  Roles::where('role_name', 'like', '%'.$this->search.'%')->paginate($this->paginate),
        ]);
    }
}
