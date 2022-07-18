<?php

namespace App\Http\Livewire\Frontend\Service;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Service extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.frontend.service.service')
            ->extends('frontend.layouts.app');
    }
}
