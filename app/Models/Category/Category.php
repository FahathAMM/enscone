<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'path'
    ];


    // public static function test()
    // {
    //     dd('test');
    // }


    public function scopeSearch($query, $q)
    {
        $query->when(
            $q ?? false,
            fn ($query, $q) =>
            $query->where(
                fn ($query) =>
                $query
                    ->where('name', 'Like', '%' . $q . '%')
            )
        );
    }
}

//? public function scopeFilter($query, array $filters)

//? {
//?     $query->when($filters['search'] ?? false, function ($query, $search) {
// ?        $query
//?             ->where('title', 'Like', '%' . $search . '%')
//?             ->where('body', 'Like', '%' . $search . '%');
// ?    });
//? }
//?=============================================================
