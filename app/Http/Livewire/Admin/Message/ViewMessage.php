<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewMessage extends Component
{
    public $message;
    public $messages;
    public function mount($message)
    {
        $this->message = $message;

    }

    public function render()
    {

        $this->messages = Message::find($this->message);
        $user           = User::find(Auth::user()->id);
        $this->markRead($this->messages);

        return view('livewire.admin.message.view-message', [
            'messages' => $this->messages,
            'title'    => config('app.name') . '|' . 'View Message',
            'user'     => $user,
            'type'     => 1,
        ])->extends('layouts.app');
    }

    public function markRead($messages)
    {
        $Message = Message::find($messages->id);

        $Message->isRead = 1;
        $Message->save();
    }

    public function delete($id)
    {
        Message::destroy($id);
        $this->message = Message::where('isRead', 0)->first()->id;
    }
}
