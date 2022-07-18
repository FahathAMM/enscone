<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Messages extends Component
{
    // public $user;
    // public $messages;

    public $gg;
    protected $listeners = ['newMessages' => 'loadMessages'];

    public function loadMessages()
    {
        $user = User::find(Auth::user()->id);
        return $user->messages()->select('id', 'name', 'created_at', 'message')->where('isRead', 0);
    }

    public function render()
    {
        // $user     = User::find(Auth::user()->id);
        // $messages = $user->messages();

        // $messages = $user->messages()->select('id', 'name', 'created_at', 'message')->where('isRead', 0);

        $messages = $this->loadMessages();

        return view('livewire.admin.message.messages', [
            'messages' => $messages->latest()->take(5)->get(),
        ]);
    }
}
