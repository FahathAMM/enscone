<?php

namespace App\Http\Controllers\admin;

use Dompdf\Dompdf;
use NumberFormatter;
use App\Models\order\Order;
use Illuminate\Http\Request;
use App\Models\customer\Customer;
use App\Models\order\OrderDetails;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{


    public function edit($id)
    {
        $order = Order::find($id);
        return view('manage.invoice.edit', ['order' => $order]);
    }

    public function generateInvoice($id)
    {



        // $str = "1.24";
        // return strlen(substr(strrchr($str, "."), 1));





         $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
            $orderDetails = OrderDetails::where('order_id', $order->id)->get();

              $order->grand_total;
                // $gg = number_format($order->grand_total,2);

           $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
             $amountLatter = $f->format($order->grand_total);





          $isFloat = str_contains($amountLatter,'point');

             $countAfterpoint = strlen(substr(strrchr($order->grand_total, "."), 1));

        //  return  $amountLatter = $amountLatter . ' ' . 'Zero';

        if(!$isFloat){
            $amountLatter = $amountLatter . ' ' . ' Point Zero ';
        }


        if($countAfterpoint==1){
            $amountLatter = $amountLatter . ' ' . 'Zero';
        }



        // return view('manage.invoice.invoice', ['order' => $order, 'customer' => $customer, 'orderDetails' => $orderDetails,'amountLatter'=>$amountLatter]);
       return  view('manage.invoice.invoice', [
        'isFloat'=>$isFloat,
        'order' => $order,
        'customer' => $customer,
        'orderDetails'  => $orderDetails,
        'amountLatter'=>$amountLatter,

        'countAfterpoint'=>$countAfterpoint
    ]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // start_date
        // end_date



        $orders = Order::query();
        if ($request->has('q')) {
            $orders =  $orders->where('lpo_no', $request->q)
                ->orWhere('id', $request->q)
                ->orWhere('customer_name', 'LIKE', '%' . $request->q . '%');
        }

        if ($request->has('start_date') and $request->has('end_date')) {
            $orders =  $orders->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }


        $orders = $orders->paginate(20);
        return view('manage.invoice.index', ['orders' => $orders]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderUpdate = Order::find($id);
        $orderUpdate->update($request->all());

        return redirect(route('invoice'));
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
