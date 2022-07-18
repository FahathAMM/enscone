<?php

namespace App\Http\Controllers\admin;

use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use App\Models\bill\Bill;
use Illuminate\Http\Request;
use App\Models\service\services;
use App\Models\customer\Customer;
use LaravelDaily\Invoices\Invoice;
use App\Http\Controllers\Controller;
use LaravelDaily\Invoices\Classes\Buyer;
use App\Models\service\ServicesRepository;
use LaravelDaily\Invoices\Classes\InvoiceItem;
// use LaravelDaily\Invoices\Invoice;


class ServicesController extends Controller
{

    public $repo;
    public $model;

    public function __construct(ServicesRepository $repo, services $model)
    {
        $this->repo = $repo;
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->q);
        $service = '';
        if ($request->has('id')) {
            $service =  $this->model->find($request->id);
        }
        $items = $this->repo->search($request->q, 10);
        return view('manage.service.index', [
            'services' => $items,
            'service' => $service,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        // $dompdf = new Dompdf();
        // $dompdf->loadHtml(view('manage.service.test'));

        // // $dompdf->loadView('hello world');

        // $dompdf->render();

        // $dompdf->stream('demo.pdf', ['Attachment' => false]);




        try {
            $items = $this->repo->createWithAlertMessage($request->all(), ['status', 'Stored was successful']);
            return  redirect(route('services.index'));
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
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, services $service)
    {
        try {
            $service->update($request->all());
            return  redirect(route('services.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $service)
    {
         try {
            $service->delete();
            return  redirect(route('services.index'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
