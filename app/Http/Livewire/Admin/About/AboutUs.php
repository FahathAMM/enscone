<?php

namespace App\Http\Livewire\Admin\About;

use App\Models\About;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class AboutUs extends Component
{

    use WithFileUploads;

    public $inputs = [];
    public $i      = 1;
    // public $user;
    public $attribute = [];
    public $value     = [];
    public $aboutId   = null;
    public $model;
    public $image;
    public $imageStatus;
    public $isEditable;

    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function mount(About $model)
    {
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->attribute = '';
        $this->value     = '';
    }

    public function store()
    {
        $this->validate(
            [
                'attribute.0' => 'required',
                'value.0'     => 'required',
            ],
            [
                'attribute.0.required' => 'attribute field is required',
                'value.0.required'     => 'value field is required',
            ]
        );

        foreach ($this->inputs as $input) {
            $this->validate(
                [
                    'attribute.0'      => 'required',
                    "attribute.$input" => 'required',
                    'value.0'          => 'required',
                    "value.$input"     => 'required',
                    'attribute.*'      => 'required',
                    'value.*'          => 'required',
                ],
                [
                    'attribute.0.required' => 'attribute field is required',
                    'value.0.required'     => 'value field is required',
                    'attribute.*.required' => 'attribute field is required',
                    'value.*.required'     => 'value field is required',
                ]
            );
        }

        if (About::count() < 5) {
            foreach ($this->attribute as $key => $value) {
                About::create([
                    'user_id' => Auth::user()->id,
                    'keys'    => $this->attribute[$key],
                    'value'   => $this->value[$key],
                ]);
            }
        } else {
            session()->flash('error', 'oops Only Add Five Attributes.');
        }
        $this->resetInputFields();

        session()->flash('success', 'About Added Successfully.');
    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = About::findOrFail($this->aboutId);
        $about->delete();
    }

    public function add($i)
    {
        $i = $i + 1;

        $this->i = $i;

        if (count($this->inputs) <= 3) {
            array_push($this->inputs, $i);
        } else {
            session()->flash('error', 'oops Only Add Five Attributes.');
        }
    }

    public function uploadImage()
    {

        $user = Auth::user();

        $this->validate([
            'image' => 'image',
        ]);

        if (File::exists('storage/' . $user->avatar)) {
            File::delete('storage/' . $user->avatar);
        }

        $user         = User::find($user->id);
        $path         = $this->image->storeAs('avatar', $user->name . "." . $this->image->extension(), 'public');
        $user->avatar = $path;
        $user->save();
        $this->imageStatus = 'done';

        session()->flash('success', 'Image Successfully.');
    }

    public function changeStatus()
    {
        $this->imageStatus = '';
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->i--;
    }

    public function edit($id)
    {
        $this->isEditable = $id;

        $about           = About::find($id);
        $this->editKeys  = $about->keys;
        $this->editValue = $about->value;
    }

    public function update($id)
    {
        $skills = About::find($id);

        $skills->keys  = $this->editKeys;
        $skills->value = $this->editValue;

        $skills->save();

        $this->isEditable = false;
        session()->flash('success', "$this->editKeys Edit Successfully.");
    }

    public function render()
    {
        // $this->user = Auth::user();
        // $this->user = User::where('id', Auth::user()->id)->first();
        // $this->user = $this->user->fresh();
        return view('livewire.admin.about.about-us', [
            'title'                 => config('app.name') . '|' . 'About',
            'user' => User::where('id', Auth::user()->id)->first()->fresh(),
        ])->extends('layouts.app');
    }
}
