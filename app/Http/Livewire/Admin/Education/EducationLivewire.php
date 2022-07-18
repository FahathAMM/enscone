<?php

namespace App\Http\Livewire\Admin\Education;

use App\Models\Education;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class EducationLivewire extends Component
{

    use WithPagination;

    public $name;
    public $aboutId = null;
    public $model;
    public $description;
    public $end;
    public $start;
    public $institute;
    public $updateId;
    public $isEditable = false;

    protected $listeners       = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    public function mount(Education $model)
    {
        $this->model = $model;
    }

    public function resetInputFields()
    {
        $this->name        = '';
        $this->institute   = '';
        $this->end         = '';
        $this->start       = '';
        $this->description = '';
        $this->isEditable  = false;
    }

    public function store()
    {
        $this->validate(
            [
                'name'        => 'required',
                'institute'   => 'required',
                'start'       => 'required|date',
                'end'         => 'required|date',
                'description' => 'required',
            ],
        );

        Education::create([
            'user_id'     => Auth::user()->id,
            'name'        => $this->name,
            'institute'   => $this->institute,
            'start'       => $this->start,
            'end'         => $this->end,
            'description' => $this->description,
        ]);

        $this->resetInputFields();
        session()->flash('success', 'Eduction Created Successfully.');
    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = Education::findOrFail($this->aboutId);
        $about->delete();
        session()->flash('success', 'Eduction Deleted Successfully.');

    }

    public function edit($id)
    {
        $this->updateId   = $id;
        $this->isEditable = true;

        $education         = Education::findOrFail($id);
        $this->name        = $education->name;
        $this->institute   = $education->institute;
        $this->start       = $education->start;
        $this->end         = $education->end;
        $this->description = $education->description;

        $this->emit('scrollUp');
    }

    public function update($id)
    {
        $education = Education::findOrFail($id);

        $education->name        = $this->name;
        $education->institute   = $this->institute;
        $education->start       = $this->start;
        $education->end         = $this->end;
        $education->description = $this->description;

        $education->save();

        $this->isEditable = false;
        $this->resetInputFields();

        session()->flash('success', "$this->name Edit Successfully.");

    }

    public function render()
    {
        $user       = User::find(Auth::user()->id);
        $educations = $user->educations()->orderBy('start', 'DESC');

        return view('livewire.admin.education.education-livewire', [
            'title'                 => config('app.name') .'|'. 'Education',
            'educations' => $educations->paginate(10),
        ]
        )->extends('layouts.app');
    }

}
