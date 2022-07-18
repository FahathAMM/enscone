<?php

namespace App\Http\Livewire\Bill;

use Dompdf\Dompdf;
use Livewire\Component;
use Barryvdh\DomPDF\PDF;
use App\Models\bill\Bill;
use App\Models\order\Order;
use App\Models\service\services;
use App\Models\customer\Customer;
use App\Models\order\OrderDetails;

class BillLivewire extends Component
{

    public $amount;
    public $name;
    public $service_qty;
    public $newQty = 1;
    public $total = '';
    public $serviceId;
    public $customerId;
    public $customerName;
    public $customerNewId;
    public $city;
    public $address;
    public $paid;
    public $balance;
    public $lpo_no;
    public $remark;


    protected $rules = [
        'customerId' => 'required|',
        'lpo_no' => 'required|',
        // 'serviceId' => 'required|',
        // 'newQty' => 'required|',
    ];

    public function changeQty()
    {
        $this->total = $this->amount * $this->newQty;
    }

    public function checkBalance()
    {
        $this->balance = ((int)$this->paid - (int)$this->total);
        dd($this->balance);
    }

    public function getPrice()
    {
        $service = Services::where('id', $this->serviceId)->first();
        $this->name = $service->name;
        $this->amount = $service->amount;
        $this->total = $service->amount;
    }
    public function remove($id)
    {
        Bill::where('id', $id)->delete();
    }

    public function getCustomer()
    {
        $customer = Customer::where('id', $this->customerId)->first();
        $this->customerNewId = $customer->id;
        $this->customerName = $customer->name;
        $this->city = $customer->city;
        $this->address = $customer->address;
    }


    public function addToBill()
    {

        $this->validate([
            'serviceId' => 'required ',
            'newQty' => 'required',
        ]);

        // $sumAmount = Bill::sum('amount');

        $singleVat = ((int)$this->total / (int)100) * (int)5;
        $store =   Bill::create([
            'name' => $this->name,
            'qty' =>  $this->newQty,
            'vat' => $singleVat,
            'amount' => $this->total,
        ]);

        $this->resetInput();
    }

    public function resetInput()
    {
        $this->newQty = 1;
        $this->total = '';
        $this->serviceId = '';
        // $this->customerId = '';
    }

    public function order($totalAmount)
    {
        $this->validate();

        $sumVat = Bill::sum('vat');
        $sumTot = Bill::sum('amount');

        // $grand_total = ((int)$sumVat + (int)$totalAmount);
         $grand_total = ($sumVat + $sumTot);
        // dd($grand_total);





        // $number = 1234.56;

        // $nombre_format_francais = number_format($number, 2, ',', ' ');

        // dd(number_format($grand_total,2));



        // dd($grand_total + .6);
        // $grand_total = ($sumVat + $totalAmount);

        $Order =   Order::create([
            'customer_id' => $this->customerNewId,
            'price' => $this->total,
            'customer_name' => $this->customerName,
            'lpo_no' => $this->lpo_no,
            'total' =>  $totalAmount,
            'vat' => $sumVat,
            'grand_total' => $grand_total,
            // 'grand_total' =>  number_format($grand_total,2),

            'remark' => $this->remark,

        ]);

        $orderDetails = Bill::get();

        foreach ($orderDetails as $orderDetail) {
            OrderDetails::create([
                'order_id' => $Order->id,
                'service_id' => $orderDetail->name,
                'service_name' => $orderDetail->name,
                'qty' =>  $orderDetail->qty,
                'vat' =>  $orderDetail->vat,
                'price' =>  $orderDetail->amount,
            ]);
        }
        // dd(number_format($grand_total,2));
        return redirect(route('generate.invoice', ['orderNumber' => $Order->id]));
    }

    public function clear()
    {
        Bill::truncate();
    }

    public function render()
    {
        // dd('dd');
        return view('livewire.bill.bill-livewire', [
            'services' => services::all(),
            'bills' => Bill::all(),
            'customers' => Customer::all(),
        ])
            ->extends('frontend.layouts.bill');
    }
}
