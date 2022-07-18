<?php

namespace App\Http\Livewire\Frontend\Message;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class MessagesLivewire extends Component
{

    public $name;
    public $message;
    public $title;
    public $email;
    public $user;
    public $username;
    public $userid;
    public function mount(Message $model, $username, $userid)
    {
        $this->model    = $model;
        $this->username = $username;
        $this->userid   = $userid;
    }

    private function resetInputFields()
    {
        $this->name    = '';
        $this->message = '';
        $this->title   = '';
        $this->email   = '';
    }

    public function store()
    {
        $this->validate(
            [
                'name'    => 'required',
                'message' => 'required',
                'title'   => 'required',
                'email'   => 'required|email',
            ],
        );

        Message::create([
            'user_id' => $this->userid ,
            'name'    => $this->name,
            'message' => $this->message,
            'title'   => $this->title,
            'email'   => $this->email,
        ]);

        $messageToUser = [
            'message' => 'thank you for message soon will contact to you',
            'type'    => 1,
        ];

        $messageToAdmin = [
            'message'  => 'you have one message from ',
            'userMail' => $this->email,
            'type'     => 2,
        ];

        Notification::route('mail', [
            $this->email => $this->name,
        ])->notify(new MessageNotification($messageToUser));

        $this->user = User::where('id', $this->userid)->firstOrFail();

        Notification::send($this->user, new MessageNotification($messageToAdmin));

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Message Successfully Sended"]);

        $this->resetInputFields();

    }

    public function render()
    {
        return view('livewire.frontend.message.messages-livewire');
    }
}
