<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Service;
use App\Models\Education;
use App\Models\Experience;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'google_id',
    ];

    // public $guard_name = 'api';

    public function guardName()
    {
        return 'web';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function skills()
    {
        return $this->hasMany(skill::class);
    }

    public function abouts()
    {
        return $this->hasMany(About::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
