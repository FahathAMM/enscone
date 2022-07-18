<?php

namespace App\Http\Livewire\Admin\Service;

use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ServicesLivewire extends Component
{
    use WithPagination;

    public $name;
    public $aboutId = null;
    public $model;
    public $description;
    public $isEditable;

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function mount(Service $model)
    {
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->name        = '';
        $this->description = '';

    }

    public function store()
    {
        $this->validate(
            [
                'name'        => 'required',
                'description' => 'required',

            ],
        );

        Service::create([
            'user_id'     => Auth::user()->id,
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Service Created Successfully.');
    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = Service::findOrFail($this->aboutId);
        $about->delete();
        session()->flash('success', 'Service Deleted Successfully.');

    }

    public function edit($id)
    {
        $this->updateId   = $id;
        $this->isEditable = true;

        $education         = Service::findOrFail($id);
        $this->name        = $education->name;
        $this->description = $education->description;

        $this->emit('scrollUp');
    }

    public function update($id)
    {
        $experience              = Service::findOrFail($id);
        $experience->name        = $this->name;
        $experience->description = $this->description;

        $experience->save();

        $this->isEditable = false;
        $this->resetInputFields();

        session()->flash('success', "$this->name Edit Successfully.");

    }

    public function render()
    {
        $user     = User::find(Auth::user()->id);
        $Services = $user->services();

        return view('livewire.admin.service.services-livewire', [
            'title'    => config('app.name') . '|' . 'Services',
            'Services' => $Services->paginate(10),
        ]
        )->extends('layouts.app');
    }

}
