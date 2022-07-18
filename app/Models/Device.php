<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'device_type',
        'browser',
        'client_id',
        'platform',
        'platform_version',
        'latest_ip_address',
    ];
}
