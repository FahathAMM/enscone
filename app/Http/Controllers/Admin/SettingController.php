<?php

namespace App\Http\Controllers\admin;

use App\Models\Term;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\quotation\Quotation;

class SettingController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.terms.index', [
            'terms' => Term::all(),
        ]);
    }


    public function generateQuotation($id)
    {

        // $gg =  Quotation::findOrFail($id);

        // return  $gg->term;

        return  view('manage.quoatation.invoice', [
            'quotation' => Quotation::findOrFail($id),

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $items = Term::create($request->all());
            return  redirect(route('terms.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        $term = Term::find($id);
        return view('manage.terms.edit', ['term' => $term]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $TermUpdate = Term::find($id);
           $TermUpdate->update($request->all());

        return redirect(route('terms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
