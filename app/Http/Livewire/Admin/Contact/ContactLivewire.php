<?php

namespace App\Http\Livewire\Admin\Contact;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactLivewire extends Component
{

    public $inputs    = [];
    public $i         = 1;
    public $attribute = [];
    public $value     = [];
    public $icon      = [];
    public $aboutId   = null;
    public $model;
    public $isEditable = false;

    public $editattribute;
    public $editValue;
    public $editIcon;

    protected $listeners = ['deleteConfirmed' => 'delete'];

    public function mount(Contact $model)
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
                'icon.0'      => 'required',
            ],
            [
                'attribute.0.required' => 'attribute field is required',
                'value.0.required'     => 'value field is required',
                'icon.0.required'      => 'icon field is required',
            ]
        );

        foreach ($this->inputs as $input) {
            $this->validate(
                [
                    'attribute.0'      => 'required',
                    "attribute.$input" => 'required',
                    'value.0'          => 'required',
                    'icon.0'           => 'required',
                    "value.$input"     => 'required',
                    'attribute.*'      => 'required',
                    'value.*'          => 'required',
                ],
                [
                    'attribute.0.required' => 'attribute field is required',
                    'value.0.required'     => 'value field is required',
                    'attribute.*.required' => 'attribute field is required',
                    'value.*.required'     => 'value field is required',
                    'icon.*.required'      => 'icon field is required',
                ]
            );
        }

        if (Contact::count() < 10) {
            foreach ($this->attribute as $key => $value) {
                Contact::create([
                    'user_id' => Auth::user()->id,
                    'name'    => $this->attribute[$key],
                    'value'   => $this->value[$key],
                    'icon'    => $this->icon[$key],
                ]);
            }
        } else {
            session()->flash('error', 'oops Only Add Five Attributes.');
        }
        $this->resetInputFields();

        session()->flash('success', 'Contact Added Successfully.');

    }

    public function deleteConfirmation($id)
    {
        $this->aboutId = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function delete()
    {
        $about = Contact::findOrFail($this->aboutId);
        $about->delete();
    }

    public function add($i)
    {
        $i = $i + 1;

        $this->i = $i;

        if (count($this->inputs) <= 7) {
            array_push($this->inputs, $i);
        } else {
            session()->flash('error', 'oops Only Add Five Attributes.');
        }
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        $this->i--;
    }

    public function edit($id)
    {
        $this->isEditable = $id;

        $contact = Contact::find($id);

        $this->editattribute = $contact->name;
        $this->editValue     = $contact->value;
        $this->editIcon     = $contact->icon;

    }

    public function update($id)
    {
        $contact = Contact::find($id);

        $contact->name  = $this->editattribute;
        $contact->value = $this->editValue;
        $contact->icon  = $this->editIcon;
        $contact->save();

        $this->isEditable = false;
        session()->flash('success', "$this->editattribute Edit Successfully.");

    }

    public function render()
    {

        // $this->user = Auth::user();

        // $this->user = User::where('id', Auth::user()->id)->first();
        // $this->user = $this->user->fresh();
        return view('livewire.admin.contact.contact-livewire', [
            'title' => config('app.name') . '|' . 'Contact',
            'user'  => User::where('id', Auth::user()->id)->first()->fresh(),
        ])
            ->extends('layouts.app');
    }
}
