<?php

namespace App\Http\Livewire\Frontend\Resume;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Resume extends Component
{

    public $user;

    public $inputs = [];
    public $i = 1;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.resume.resume', [
            'user' => $this->user->with('educations', 'experiences')->find($this->user->id)])
            ->extends('frontend.layouts.app');
    }

 
}
