<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alternative as Alternatives;

class Alternative extends Component
{
    use WithPagination;

    public $alternative_id, $alternative_name;
    public $paginate = 5;
    public $search = '';

    protected $rules = [
        'alternative_name' => 'required|unique:alternatives',
    ];
    protected $messages = [
        'alternative_name.unique' => 'Nama alternatif sudah terdaftar',
        'alternative_name.required' => 'Nama alternatif tidak boleh kosong',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function store()
    {
        $this->resetErrorBag();
        $validated = $this->validate();
        Alternatives::create($validated);
        session()->flash('success', 'Alternative created successfully!');
        return redirect()->to('/alternatives');
        $this->reset();
        $this->resetInput();
    }
    public function edit(int $alternative_id)
    {
        $alternative = Alternatives::find($alternative_id);
        if ($alternative) {
            $this->alternative_id = $alternative->alternative_id;
            $this->alternative_name = $alternative->alternative_name;
        } else {
            return redirect()->to('/alternatives');
        }
    }
    public function update()
    {
        $this->resetErrorBag();
        $rules = [
            'alternative_name' => 'required',
        ];

        if ('alternative_name' == $this->alternative_name) {
            $rules['alternative_name'] = 'required|unique:alternatives';
        }
        $validated = $this->validate($rules, [
            'alternative_name.unique' => 'Nama alternatif sudah terdaftar',
            'alternative_name.required' => 'Nama alternatif tidak boleh kosong',
        ]);
        Alternatives::where('alternative_id', $this->alternative_id)->update([
            'alternative_name' => $validated['alternative_name'],
        ]);
        session()->flash('success', 'Alternative updated successfully!');
        return redirect()->to('/alternatives');
        $this->reset();
        $this->resetInput();
    }
    public function delete(int $alternative_id)
    {
        $this->alternative_id = $alternative_id;
    }
    public function destroy()
    {
        $alternative = Alternatives::find($this->alternative_id)->delete();
        session()->flash('success', 'Alternative deleted successfully!');
        return redirect()->to('/alternatives');
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
        $this->alternative_id = '';
        $this->alternative_name = '';
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
        return view('livewire.alternatives.alternative', [
            'alternatives' =>  Alternatives::where('alternative_name', 'like', '%' . $this->search . '%')
                ->orWhere('alternative_id', 'like', '%' . $this->search . '%')
                ->paginate($this->paginate),
            'count' => Alternatives::all()->count(),
            'titles' => 'alternatives',
            'title' => 'alternative'
        ]);
    }
}
