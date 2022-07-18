<?php

namespace App\Http\Livewire\Admin\Experiences;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ExperiencesLivewire extends Component
{

    use WithPagination;

    public $name;
    public $aboutId = null;
    public $model;
    public $description;
    public $end;
    public $start;
    public $position;
    public $present;
    public $updateId;
    public $isEditable;

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function mount(Experience $model)
    {
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->name        = '';
        $this->position    = '';
        $this->end         = '';
        $this->start       = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate(
            [
                'name'        => 'required',
                'position'    => 'required',
                'start'       => 'required|date',
                'end'         => 'required_without:present|date|nullable',
                'present'     => 'required_without:end',
                'description' => 'required',
            ],
        );

        $this->model->create([
            'user_id'     => Auth::user()->id,
            'name'        => $this->name,
            'position'    => $this->position,
            'start'       => $this->start,
            'end'         => $this->end != '' ? $this->end : $this->present,
            'description' => $this->description,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Experience Created Successfully.');
    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = Experience::findOrFail($this->aboutId);
        $about->delete();
        session()->flash('success', 'Experience Deleted Successfully.');
    }

    public function edit($id)
    {
        $this->updateId   = $id;
        $this->isEditable = true;

        $education      = Experience::findOrFail($id);
        $this->name     = $education->name;
        $this->position = $education->position;
        $this->start    = $education->start;

        if ($education->end == 'present') {
            $this->present = $education->end;
            $this->end     = '';
        } else {
            $this->present = '';
            $this->end     = $education->end;
        }
        $this->description = $education->description;

        $this->emit('scrollUp');
    }

    public function update($id)
    {
        // dd($this->end);
        $experience = Experience::findOrFail($id);

        $experience->name        = $this->name;
        $experience->position    = $this->position;
        $experience->start       = $this->start;
        $experience->end         = $this->end != '' ? $this->end : $this->present;
        $experience->description = $this->description;

        $experience->save();

        $this->isEditable = false;
        $this->resetInputFields();

        session()->flash('success', "$this->name Edit Successfully.");

    }

    public function render()
    {
        $user        = User::find(Auth::user()->id);
        $experiences = $user->experiences()->orderBy('start', 'DESC');

        return view('livewire.admin.experiences.experiences-livewire', [
            'title'                 => config('app.name') .'|'. 'Experiences',
            'experiences' => $experiences->paginate(10),
        ]
        )->extends('layouts.app');
    }

}
