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
                position:absolute;
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

            </div><br><br><br><br><br><br>
            <h6 class="fw-bolsd">TRN- 100219016100003 </h6>

            <div class="inv-back print-inv-back">
                <section>
                    <div class="row px-2">

                        <div class="col-12">
                            <div class=" p-2 ">
                                <table class="table table-sm table-bordered">
                                    <tr>
                                        <td style="width: 150px" class="fw-bold"> Name</td>
                                        <td>{{ $quotation->client }}</td>
                                        <td style="width: 150px" class="fw-bold"> Quote Ref</td>
                                        <td>{{ $quotation->quote_ref }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold"> Contact person</td>
                                        <td>{{ $quotation->contact_person }}</td>
                                        <td style="width: 150px" class="fw-bold"> date</td>
                                        <td>{{ $quotation->dated }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold"> address</td>
                                        <td colspan="4">{{ $quotation->address }}</td>

                                    </tr>
                                    <tr>
                                        <td style="width: 150px" class="fw-bold"> Project</td>
                                        <td colspan="4">{{ $quotation->project }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <br>
            <p>
                Sub: Quotation for Roof waterproofing
                With reference to the above mention subject. Regarding Membrane Waterproof Work,
                we are pleased to offer the best price for this project and detailed are given below.

            </p>

            <table class="table  table-bordered border-dark">
                <tr>
                    <th scope="col" class="sl-no">SL.NO</th>
                    <th scope="col " class="decription">DESCRIPTION</th>
                    <th scope="col" class="print-qty-width">QTY</th>
                    <th scope="col" class="print-vat-width">VAT @ 5%</th>
                    <th scope="col">AMOUNT</th>
                </tr>

                <tr>
                    <th scope="row"> ++$key </th>
                    <td>
                        Option No.1
                        Scope Of work :
                         Preparation of surface on the roof floor for new waterproofing work
                         Supply and installation of 1 layer mineral face membrane
                         Supply and installation of aluminium flashing
                         Supply and apply of sealant
                        (Warranty 5 Years after the completion of the work)
                    </td>
                    <td>10</td>
                    <td> 4 </td>
                    <td class="fw-bold">40 </td>
                </tr>

                <tr>
                    <th scope="row"> ++$key </th>
                    <td>
                        Option No.1
                        Scope Of work :
                         Preparation of surface on the roof floor for new waterproofing work
                         Supply and installation of 1 layer mineral face membrane
                         Supply and installation of aluminium flashing
                         Supply and apply of sealant
                        (Warranty 5 Years after the completion of the work)
                    </td>
                    <td>10</td>
                    <td> 4 </td>
                    <td class="fw-bold">40 </td>
                </tr>

                <tr>
                    <th scope="row"> ++$key </th>
                    <td>
                        Option No.1
                        Scope Of work :
                         Preparation of surface on the roof floor for new waterproofing work
                         Supply and installation of 1 layer mineral face membrane
                         Supply and installation of aluminium flashing
                         Supply and apply of sealant
                        (Warranty 5 Years after the completion of the work)
                    </td>
                    <td>10</td>
                    <td> 4 </td>
                    <td class="fw-bold">40 </td>
                </tr>

            </table>
            <section>

            </section>

            <section>
                {!! $quotation->term->desc !!}
            </section>

            <footer>

                <tr>
                    <img src="{{ asset('inv/foot.jpg') }}" alt="" style="width:100%">
                </tr>
            </footer>
        </div>


        <button class="btn btn-print btn-success">Print Invoice</button>

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
