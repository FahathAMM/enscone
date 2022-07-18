<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'price',
        'total',
        'lpo_no',
        'vat',
        'grand_total',
        'customer_name',
        'remark'
    ];
}
