<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MessageLivewire extends Component
{

    public function mount(User $model)
    {
        $this->model = $model;
    }

    public function render()
    {

        $user     = User::find(Auth::user()->id);
        $messages = $user->messages();

        $messages = $user->messages()->where('isRead', 0);

        return view('livewire.admin.message.message-livewire', [
            'title'                 => config('app.name') .'|'. 'Message',
            'messages' => $messages->latest()->take(5)->get(),
         ]);
    }
}
