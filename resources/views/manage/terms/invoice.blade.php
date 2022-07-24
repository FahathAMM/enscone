<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <style>
        @media print {
            /* styles here */

            .print-body {
                background-color: red;
                width: 100% !important;
                font-size: 12px !important;
            }


            .print-inv-back {
                border-style: solid !important;
                border-width: 1px !important;
                /* margin-bottom: 2% border-color: #0000ff; */
            }

            .print-vat-width {
                width: 80px !important;

            }

            .print-qty-width {
                width: 80px !important;

            }

            .print-inv-back-parent {
                /* background-color: green !important; */
                margin: -1% !important;
            }

            footer {
                position: fixed;
                bottom: 0;
            }

            .fandh {
                position: fixed;
                top: 0;
                width: 100%;
                right: 0;
                left: 0;
                bottom: 0;
                padding: 0px 00px;
            }

            .vv {
                width: 100%;
            }
        }

        .fandh {
            font-size: 9px;
            color: #f00;
            text-align: center;
            width: 100%;
        }

        footer {
            font-size: 14px;
            /* color: #f00; */
            /* text-align: center; */
        }

        .desk-body {
            background-color: antiquewhite;
            width: 100%;
            margin-top: 2%;
        }

        .inv-back {
            border-style: solid;
            border-width: 1px;
            margin-bottom: 2% border-color: #0000ff;
        }

        .inv-back-parent {
            background-color: white;
            margin: 0px 300px;
            /* padding: 0%; */
            /* margin: -1% */
        }

        .inv-back-child {
            background-color: white
        }

        .customer-details-area {
            border-style: solid;
            border-width: 1px;
            margin-bottom: 2% border-color: #0000ff;
        }

        .order-bill-area {
            border-style: solid;
            border-width: 1px;
            margin-bottom: 2% border-color: #0000ff;
        }

        .sl-no {
            /* width:5px */
        }

        .decription {
            width: 500px
        }

        .total-amount-text {
            width: 115px;
            font-size: 12px;
        }
    </style>

</head>


{{-- <body class="container p-5 print-body"> --}}

<body class="desk-body print-body">
    <div class="p-4 inv-back-parent print-inv-back-parent">
        <div class="p-4 inv-back-child">
            <div class="fandh">
                <img class="vv" style="display: block;width:100%" src="{{ asset('inv/inv.jpg') }}" alt="">

            </div><br><br><br><br><br>
            <h6 class="fw-bold text-center  ">TAX INVOICE</h6>
            <div class="inv-back print-inv-back">
                <section>
                    <div class="row px-2">
                        <p class="py-0 my-0">To:</p>
                        {{-- <div class="col-md-7 col-12"> --}}
                        <div class="col-7">
                            <div class=" p-2 customer-details-area">
                                <table>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold"> Name</td>
                                        <td>{{ $customer->name }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold">Post Box No</td>
                                        <td>{{ $customer->post_box_number }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold">Address</td>
                                        <td>{{ $customer->address }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold">ATTN</td>
                                        <td>{{ $customer->attn }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold">TRN</td>
                                        <td>{{ $customer->trn }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-md-5"> --}}
                        <div class="col-5">
                            <div class=" p-2 order-bill-area">
                                {{-- date('d-m-Y', strtotime($user->from_date)); --}}
                                {{-- Bill Date : {{ $order->created_at->toDateString() }} --}}
                                Bill Date : {{ date('d-m-Y', strtotime($order->created_at)) }}
                            </div>
                            <div class=" p-2 order-bill-area">
                                LPO No : {{ $order->lpo_no }}
                            </div>
                            <div class=" p-2 order-bill-area">
                                Bill No : ETS{{ $order->id }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <table class="table  table-bordered border-dark">
                <tr>
                    <th scope="col" class="sl-no">SL.NO</th>
                    <th scope="col " class="decription">DESCRIPTION</th>
                    <th scope="col" class="print-qty-width">QTY</th>
                    <th scope="col" class="print-vat-width">VAT @ 5%</th>
                    <th scope="col">AMOUNT</th>
                </tr>
                @forelse ($orderDetails  as $key=> $orderDetail)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $orderDetail->service_name }}</td>
                        <td>{{ $orderDetail->qty }}</td>
                        <td>{{ $orderDetail->vat }}</td>

                        <td class="fw-bold">{{ $orderDetail->price }}</td>
                    </tr>
                @empty
                @endforelse
                <tr>
                    <td colspan="2" rowspan="2">
                        <b>Remark</b> <br>
                        {{ $order->remark }}
                    </td>
                    <td class="fw-bold">Sub Total</td>
                    <td colspan="2" class="text-end">{{ $order->total }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Vat</td>
                    <td colspan="2" class="text-end"> {{ $order->vat }}</td>
                </tr>
                <tr>
                    <th class="fw-bold total-amount-text">TOTAL AMOUNT (IN WORDS) AED</th>
                    <td class="fw-bold" colspan="1">
                        <p style="text-transform: capitalize">{{ $amountLatter }} Fils</p>
                    </td>
                    <td class="fw-bold">Total</td>
                    @if ($isFloat)
                        @if ($countAfterpoint == 1)
                            <td class="fw-bold text-end" colspan="2">AED {{ $order->grand_total }}0 </td>
                        @else
                            <td class="fw-bold text-end" colspan="2">AED {{ $order->grand_total }} </td>
                        @endif
                    @else
                        <td class="fw-bold text-end" colspan="2">AED {{ $order->grand_total }}.00 </td>
                    @endif
                </tr>
            </table>
            <section>
                {{-- <div class="row" style="margin-top: 20%">
                     <div class="col-6">
                        <div class=" p-2">
                            <br>
                            <p>Receiver Sign
                                ..................................................................................................................
                            </p><br>
                            <p>Receiver Name
                                ..................................................................................................................
                            </p>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class=" p-2">
                            For <br>
                            <p class="fw-bold">
                                ENSCONE TECHNICAL & CLEANING SERVICES LLC <br>
                                RANK BANK - ACC/NO : 0033475101061 <br>
                                IBAN :- AE 780400000033475101061 <br>
                                TRN NO - 100219016100003
                            </p>
                        </div>
                    </div>
                </div> --}}
            </section>
            <div class="row print-footer">
                <div class="col-6">
                    <div class=" p-2">
                        <br>
                        <p>Receiver Sign
                            ..................................................................................................................
                        </p><br>
                        <p>Receiver Name
                            ..................................................................................................................
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class=" p-2">
                        For <br>
                        <p class="fw-bold">
                            ENSCONE TECHNICAL & CLEANING SERVICES LLC <br>
                            RAK BANK - ACC/NO : 0033475101061 <br>
                            IBAN :- AE 780400000033475101061 <br>
                            TRN NO - 100219016100003
                        </p>
                    </div>
                </div>
            </div>
            <footer>

                <tr>
                    <img src="{{ asset('inv/foot.jpg') }}" alt="" style="width:100%">
                </tr>
            </footer>
        </div>


        <button class="btn btn-print btn-success">Print Invoice</button>
        {{-- <button class="btn vv btn-success">Print Invoice</button> --}}

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>

        <script>
            $('.btn-print').click(function() {
                $('.btn-print').hide();
                $('.fandh').show();
                window.print();
            })
        </script>

</body>

</html>
