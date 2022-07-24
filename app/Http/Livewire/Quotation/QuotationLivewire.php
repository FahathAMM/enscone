<?php

namespace App\Http\Livewire\Quotation;

use App\Models\quotation\Quotation;
use App\Models\Term;
use Livewire\Component;

class QuotationLivewire extends Component
{

    public $desc;

    public $termsconditions;

    public $client;
    public $quote_ref;
    public $contact_person;
    public $date;
    public $address;
    public $project;




    public function getTerms()
    {
        $termsconditions = Term::where('id', $this->termsconditions)->first();
        $this->desc = $termsconditions->desc;
    }

    public function save()
    {

        $store =   Quotation::create([
            'client' => $this->client,
            'contact_person' => $this->contact_person,
            'address' => $this->address,
            'project' => $this->project,
            'dated' => $this->date,
            'quote_ref' => $this->quote_ref,
            'payment_term' => $this->termsconditions,
            'term_id' => $this->termsconditions,
            // 'work_id' => $this->name,
        ]);

        return redirect(route('generate.quotation', ['quotation' => $store->id]));
    }

    public function render()
    {
        return view('livewire.quotation.quotation-livewire', [
            'terms' => Term::all(),
        ])->extends('frontend.layouts.bill');
    }
}
