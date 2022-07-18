<?php

namespace App\Http\Livewire\Admin\Message;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MessageCounts extends Component
{

    public function render()
    {

        $user = User::find(Auth::user()->id);
        // $messages = $user->messages();
        // $messages = $user->messages()->where('isRead', 0);

        $messages = DB::table('messages')->where('user_id', $user->id)->where('isRead', 0);

        return view('livewire.admin.message.message-counts', [
            'countUnreadMessage' => $messages->count(),
        ]);
    }
}
