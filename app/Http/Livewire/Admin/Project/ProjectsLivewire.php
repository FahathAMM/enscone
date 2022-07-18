<?php

namespace App\Http\Livewire\Admin\Project;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsLivewire extends Component
{

    use WithPagination;

    public $name;
    public $aboutId = null;
    public $model;
    public $description;
    public $type;
    public $link;
    public $isEditable;

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function mount(Project $model)
    {
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->name        = '';
        $this->description = '';
        $this->type        = '';
        $this->link        = '';

    }

    public function store()
    {
        $this->validate(
            [
                'name'        => 'required',
                'description' => 'required',
                'type'        => 'required',
                'link'        => 'url|nullable',
            ],
        );

        Project::create([
            'user_id'     => Auth::user()->id,
            'type'        => $this->type,
            'link'        => $this->link,
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
        $about = Project::findOrFail($this->aboutId);
        $about->delete();
        session()->flash('success', 'Service Deleted Successfully.');

    }

    public function edit($id)
    {
        $this->updateId   = $id;
        $this->isEditable = true;

        $education         = Project::findOrFail($id);
        $this->type        = $education->type;
        $this->link        = $education->link;
        $this->name        = $education->name;
        $this->description = $education->description;

        $this->emit('scrollUp');
    }

    public function update($id)
    {
        $experience = Project::findOrFail($id);

        $experience->type        = $this->type;
        $experience->link        = $this->link;
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
        $Projects = $user->Projects();

        return view('livewire.admin.project.projects-livewire', [
            'title'    => config('app.name') . '|' . 'Project',
            'projects' => $Projects->paginate(10),
        ]
        )->extends('layouts.app');
    }

}
