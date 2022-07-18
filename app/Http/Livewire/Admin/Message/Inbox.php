<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Inbox extends Component
{
    public function render()
    {
        $user   = User::find(Auth::user()->id);
        return view('livewire.admin.message.inbox', [
            'messages' => $user->messages,
        ])->extends('layouts.app');
    }
}
