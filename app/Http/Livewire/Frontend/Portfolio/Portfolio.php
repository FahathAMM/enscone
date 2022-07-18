<?php

namespace App\Http\Livewire\Frontend\Portfolio;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Portfolio extends Component
{

    public $username;
    public $user;
    public $userid;

    // protected $listeners = ['login-form' => 'authForm'];

    public function mount($username, $userid)
    {
        $this->username = $username;
        $this->userid   = $userid;

        $this->user = User::where('id', $userid)->firstOrFail();
    }

    public function updateDevice()
    {

        // $agent = new Agent;

        // Device::updateOrCreate([
        //     'user_id'           => $this->userid,
        //     'client_id'         => isset(Auth::user()->id) ? Auth::user()->id : null,
        //     'device_type'       => $agent->deviceType(),
        //     'browser'           => $agent->browser(),
        //     'platform'          => $agent->platform(),
        //     'platform_version'  => $agent->version($agent->platform()),
        //     'latest_ip_address' => request()->ip(),
        // ]);

    }

    // public function authForm()
    // {
    //     if (!isset(Auth::user()->id)) {
    //         $this->emit('open-login-form');
    //     }
    // }
    public function render()
    {
        $this->updateDevice();

        return view('livewire.frontend.portfolio.portfolio')
            ->extends('frontend.layouts.app');
    }
}
