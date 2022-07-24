<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\Artisan;

class SettingLivewire extends Component
{
    use WithFileUploads;

    public $old_password;
    public $new_password;
    public $errorMessage;

    public $name;
    public $email;
    public $mobile;
    public $avatar;
    public $address;
    public $about_me;
    public $width = 2;

    public $isedit = 'ff';

    public function changePassword()
    {
        $user = Auth::user();

        if ($this->old_password == '' || $this->new_password == '') {
            return $this->errorMessage = "Enter the New/Old Password";
        }

        if (Hash::check($this->old_password, $user->password)) {
            $user->password     = $this->new_password;
            $this->errorMessage = "Password change successfully";
        } else {
            $this->errorMessage = "This Not match with old Password";
        }
    }

    public function mount()
    {
        $this->getValues();
    }

    public function changePersonal()
    {

        $user = Auth::user();

        $this->validate([
            'avatar'   => 'image|nullable',
            'name'     => 'required',
            'email'    => 'required|unique:users,email,' . $user->id,
            'mobile'   => 'required',
            'about_me' => 'required',
            'address'  => 'required',
        ]);

        if ($this->avatar) {
            if (File::exists('storage/' . $user->avatar)) {
                File::delete('storage/' . $user->avatar);
            }
            $user         = User::find($user->id);
            $path         = $this->avatar->storeAs('avatar', $user->name . "." . $this->avatar->extension(), 'public');
            $user->avatar = $path;
        }

        $user->name     = $this->name;
        $user->email    = $this->email;
        $user->mobile   = $this->mobile;
        $user->address  = $this->address;
        $user->about_me = $this->about_me;

        $user->save();
        $this->avatar = null;
        $this->width  = 3;
        session()->flash('success', 'About Added Successfully.');
    }

    public function databaseBackup()
    {
        Artisan::call('config:clear');
        Artisan::call('backup:run --only-db');
        dd(Artisan::output());
    }

    public function getValues()
    {
        $user = Auth::user();
        $user = User::find($user->id);

        $this->name     = $user->name;
        $this->email    = $user->email;
        $this->mobile   = $user->mobile;
        $this->address  = $user->address;
        $this->about_me = $user->about_me;
    }

    public function render()
    {
        if ($this->avatar) {
            $this->width = 100;
        }

        // $this->getValues();
        $numberOfProfileViewed = DB::table('devices')->where('user_id', Auth::user()->id)->distinct('latest_ip_address')->count();
        return view('livewire.admin.settings.setting-livewire', [
            'user'                  => User::where('id', Auth::user()->id)->first(),
            'numberOfProfileViewed' => $numberOfProfileViewed,
            'title'                 => config('app.name') . '|' . 'Profile',
        ])
            ->extends('layouts.app');
    }
}
