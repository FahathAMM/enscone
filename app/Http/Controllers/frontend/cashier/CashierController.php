<?php

namespace App\Http\Controllers\frontend\cashier;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CashierController extends Controller
{
    // protected $model;

    // public function __construct($model)
    // {
    //     $this->model = $model;
    // }

    public function index()
    {
        $data['orders'] = DB::table('orders')->get();
        return view('frontend.cashier.index', $data);
    }

    public function getPrice(Request $request)
    {
        // $getPrice = $_GET['id'];
        $price  = DB::table('orders')->where('id', $request->id)->get();
        // return Response::json($price);
        return Response()->json($price);
    }
    //
}
