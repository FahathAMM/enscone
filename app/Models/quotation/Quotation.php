<?php

namespace App\Models\quotation;

use App\Models\Term;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'contact_person',
        'address',
        'project',
        'dated',
        'quote_ref',
        'payment_term',
        'term_id',
        'work_id',
    ];

    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
