<?php

namespace App\Http\Livewire\Permission;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Permissions extends Component
{
    use WithPagination;

    public $name;
    public $query              = '';
    protected $paginationTheme = 'bootstrap';
    public $deleteId           = '';

    protected $listeners = ['swal' => 'openconfirm'];

    public function render()
    {
        $roles = Role::query();

        if ($this->query) {
            $roles = $this->filter();
        }

        $roles = $roles->latest()->paginate(5);

        return view('livewire.permission.permissions', [
            'roles' => $roles,
        ]);
    }

    public function createRole()
    {
         
        $this->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $this->name]);

        session()->flash('success', 'Role Created Successfully.');

        $this->resetInputFields();

        $this->emit('hideModal');



     }

    // public function deleteId($id)
    // {
    //     $this->deleteId = $id;
    // }

    // public function deleteRole()
    // {
    //     dd($this->deleteId);
    //     Role::find($this->deleteId)->delete();
    // }

    public function deleteConfirm($id)
    {
        // $this->emit('swal', 'are u sure?', 'warning');
        $this->deleteId = $id;
        $this->emit('swal');
    }

    public function openconfirm()
    {
        $this->emit('g');
    }

    public function delete($id)
    {
        dd('dd');
        Role::first()->delete();
        // Role::find($this->deleteId)->delete();
    }

    public function resetInputFields()
    {
        $this->name = "";
    }

    public function filter()
    {
        return Role::where('name', 'LIKE', '%' . $this->query . '%');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
