<?php

namespace App\Http\Livewire\Frontend\Portfolio;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeThemes extends Component
{

    public function render()
    {
        return view('livewire.frontend.portfolio.change-themes')
            ->extends('frontend.layouts.app');
    }

    public function mount()
    {
        
    }

    public function changeTheme($color)
    {
        $user = Auth::user();
        User::where('id', $user->id)->update([
            'color' => $color,
        ]);

        $this->alertSuccess($color);
    }

    public function alertSuccess($color)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "$color Change Successfully!"]);
    }



}
