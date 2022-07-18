<?php

namespace App\Http\Livewire\Admin\Skills;

use App\Models\skill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SkillsLivewire extends Component
{
    use WithPagination;

    public $level = 0;
    public $category;
    public $description;
    public $name;
    public $aboutId = null;
    public $model;
    public $type;

    public $isEditable = false;

    public $editName;
    public $editCategory;
    public $editLevel;
    public $editDescription;

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function mount(skill $model)
    {
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->name        = '';
        $this->category    = '';
        $this->level       = 0;
        $this->description = '';
    }

    public function store()
    {
        $this->validate(
            [
                'name'        => 'required',
                'category'    => 'required',
                'level'       => 'integer|min:5',
                'description' => 'required',
            ],
        );

        skill::create([
            'user_id'     => Auth::user()->id,
            'name'        => $this->name,
            'category'    => $this->category,
            'description' => $this->description,
            'level'       => $this->level,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Skill Created Successfully.');
    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = skill::findOrFail($this->aboutId);
        $about->delete();
        session()->flash('success', 'Skill Deleted Successfully.');

    }

    public function type($type)
    {
        $this->resetPage();
        return $this->type = $type;
    }

    public function edit($id)
    {
        $this->isEditable = $id;

        $skills                = skill::find($id);
        $this->editName        = $skills->name;
        $this->editCategory    = $skills->category;
        $this->editLevel       = $skills->level;
        $this->editDescription = $skills->description;

    }

    public function update($id)
    {
        $skills = skill::find($id);

        $skills->name        = $this->editName;
        $skills->category    = $this->editCategory;
        $skills->level       = $this->editLevel;
        $skills->description = $this->editDescription;
        $skills->save();

        $this->isEditable = false;
        session()->flash('success', "$this->editName Edit Successfully.");

    }

    public function render()
    {

        $user   = User::find(Auth::user()->id);
        $skills = $user->skills();

        if ($this->type) {
            $skills = $user->skills()->where('category', $this->type);
        }

        return view('livewire.admin.skills.skills-livewire', [
            'title'  => config('app.name') . '|' . 'Skills',
            'skills' => $skills->paginate(10),
        ]
        )->extends('layouts.app');
    }
}
