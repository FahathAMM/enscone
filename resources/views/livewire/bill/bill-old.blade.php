<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        body {
            background-color: #ffe8d2;
            font-family: 'Montserrat', sans-serif
        }

        .card {
            border: none
        }

        .logo {
            background-color: #eeeeeea8
        }

        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }



        .content {
            display: flex;
            align-content: center;
            justify-content: center;
        }

        .text_shadows {
            text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary),
                9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary);
            font-family: bungee, sans-serif;
            font-weight: 400;
            text-transform: uppercase;
            /* font-size: calc(2rem + 5vw); */
            font-size: 68px;
            text-align: center;
            margin: 0;
            color: var(--color-primary);
            //color: transparent;
            //background-color: white;
            //background-clip: text;
            animation: shadows 1.2s ease-in infinite, move 1.2s ease-in infinite;
            letter-spacing: 0.4rem;
        }

        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 55px;
            height: 55px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }


        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes shadows {
            0% {
                text-shadow: none;
            }

            10% {
                text-shadow: 3px 3px 0 var(--color-secondary);
            }

            20% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary);
            }

            30% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary);
            }

            40% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary),
                    12px 12px 0 var(--color-quinary);
            }

            50% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary),
                    12px 12px 0 var(--color-quinary);
            }

            60% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary),
                    12px 12px 0 var(--color-quinary);
            }

            70% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary);
            }

            80% {
                text-shadow: 3px 3px 0 var(--color-secondary),
                    6px 6px 0 var(--color-tertiary);
            }

            90% {
                text-shadow: 3px 3px 0 var(--color-secondary);
            }

            100% {
                text-shadow: none;
            }
        }

        @keyframes move {
            0% {
                transform: translate(0px, 0px);
            }

            40% {
                transform: translate(-12px, -12px);
            }

            50% {
                transform: translate(-12px, -12px);
            }

            60% {
                transform: translate(-12px, -12px);
            }

            100% {
                transform: translate(0px, 0px);
            }
        }
    </style>

    <style>
        body,
        html {
            height: 100%;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
            background-image: url("photographer.jpg");

            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 250px;
            text-align: center;
        }
    </style>




    <section class="mt-3">
        <div class="bg-text" wire:loading wire:target="addToBill">
            <div class="lds-dual-ring"></div>
        </div>
        <div class="container-fluid">
            {{-- <h4 class="text-center" style="color:green"> ENSCONE </h4>
            <h6 class="text-center"> Technical & Cleaning Service L.L.C</h6> --}}
            <div class="row">
                <div class="col-md-5  mt-3 ">
                    <div class="card">
                        <div class="card-body">
                            <table class="table " style="background-color:white;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Service</th>
                                        <th style="width: 31%">Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td style="width:60%">
                                            <select wire:change="getPrice" wire:model="serviceId" class="form-control"
                                                style="
                                            height: 32px;
                                        ">
                                                <option value="">select service..</option>
                                                @foreach ($services as $service)
                                                    <option value={{ $service->id }} class="custom-select">
                                                        {{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('serviceId')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                        </td>
                                        <td style="width:1%">
                                            <input type="number" wire:model="newQty" wire:click='changeQty' value="1"
                                                class="form-control">
                                            @error('newQty')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror

                                        </td>
                                        <td>
                                            <h5 class="mt-1" id="price">{{ $total }} </h5>
                                        </td>
                                        <td><button wire:click='addToBill' id="add" class="btn btn-success">Add</button>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div role="alert" id="errorMsg" class="mt-5">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white"> Customer Name : {{ $customerName }} </h3>
                                <h3 class="card-title text-white"> Customer City : {{ $city }} </h3>
                                <h3 class="card-title text-white"> Customer Name : {{ $address }} </h3>
                                <div class="d-inline-block">

                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                        <div class="card gradient-2">
                            <a href="{{ route('user.dashboard') }}" class="card-body">
                                <h3 class="card-title text-white">Click Here For Dashboard </h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7  mt-3">
                    <div class="card">
                        <div class="invoice p-5">
                            <img src="{{ asset('images/elogo.png') }}" width="50">
                            <h5>ENSCONE</h5>
                            <select wire:change="getCustomer" wire:model="customerId" class="form-control" style="
                            height: 32px;">
                                <option value="">select customer</option>
                                @foreach ($customers as $customer)
                                    <option value={{ $customer->id }} class="custom-select">
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customerId')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <input type="text" placeholder="LPO No." class="form-control w-50" wire:model="lpo_no">
                            @error('lpo_no')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                            <span class="font-weight-bold d-block mt-4">
                                Hello, {{ $customerName }}
                            </span>
                            <span>You order has been confirmed !</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Order
                                                        Date</span> <span>{{ now('d') }}</span> </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Order
                                                        No</span> <span>MT12332345</span> </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span
                                                        class="d-block text-muted">Payment</span>
                                                    <span><img
                                                            src="https://img.icons8.com/color/48/000000/mastercard.png"
                                                            width="20" /></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="py-2"> <span class="d-block text-muted">Billing
                                                        Address</span> <span>{{ $address }}</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product border-bottom table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th> No.</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Vat @ 5%</th>
                                            <th>Price</th>
                                            <th class="text-right">Total</th>
                                            <th class="">Cancel </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalAmount = 0;
                                            $totalVat = 0;
                                        @endphp
                                        @forelse ($bills as $key =>  $bill)
                                            @php
                                                $totalAmount += $bill->amount;
                                                $totalVat += $bill->vat;
                                            @endphp
                                            <tr>
                                                <td>{{ ++$key }} </td>
                                                <td width="20%"> {{ $bill->name }} </td>
                                                <td width="20%"> {{ $bill->qty }} </td>
                                                <td width="20%"> {{ $bill->vat }} </td>
                                                <td width="20%"> {{ $bill->amount }} </td>
                                                <td width="20%">
                                                    <div class="text-right"> <span
                                                            class="font-weight-bold">{{ $bill->amount }}</span>
                                                    </div>
                                                </td>
                                                <td><button class="btn "
                                                        wire:click="remove('{{ $bill->id }}')"><i
                                                            class="fa fa-ban text-danger text-right "></i></button></td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div>
                                Total : $85858
                            </div> --}}
                            <div class="row d-flex justify-content-end">
                                <div class="col-md-7"
                                    style=" border-style: solid;border-width: 1px; font-size: 48px; margin-bottom:2%">

                                    <div class="content">
                                        <h2 style="margin: 12% 75px 22px 81px;color: red;" class="text_shadows">Rs
                                            {{ $totalAmount }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <table class="table table-borderless">
                                        <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span
                                                            class="text-muted">SubTotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>AED {{ $totalAmount }} </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="text-left"> <span
                                                            class="text-muted">VatTotal</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span>AED {{ $totalVat }} </span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span
                                                            class="font-weight-bold">Total</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span
                                                            class="font-weight-bold">AED {{ $totalAmount + $totalVat }}
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span class="font-weight-bold ">Paid
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="font-weight-bold">
                                                            <input type="number" readonly class="form-control"
                                                                wire:change="checkBalance" wire:model="paid">
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left"> <span
                                                            class="font-weight-bold">Balance</span> </div>
                                                </td>
                                                <td>
                                                    <div class="text-right"> <span class="font-weight-bold">
                                                            <input type="number" wire:model="balance" readonly
                                                                class="form-control" name="" id="">
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <p>
                                <button wire:click="order('{{ $totalAmount }}')" class="btn btn-primary gradient-2"
                                    style="width: 48%;padding: 5%;font-size: 32px;font-weight: 400;">
                                    <div wire:loading wire:target="order">
                                        <div class="lds-dual-ring" style="
                                    display: inline-block;
                                       width: 75px;
                                       height: 37px;
                                       margin: 0px 13px 7px 9px
                                  "></div>
                                    </div>
                                    <i class="fa fa-money"></i>
                                    Bill
                                </button>
                                {{-- wire:loading --}}
                                <button wire:click="clear()" class="btn btn-primary gradient-1"
                                    style="width: 48%;padding: 5%;font-size: 32px;font-weight: 400;">
                                    <div wire:loading wire:target="clear">
                                        <div class="lds-dual-ring" style="
                                    display: inline-block;
                                       width: 75px;
                                       height: 37px;
                                       margin: 0px 13px 7px 9px
                                  "></div>
                                    </div>
                                    <i class="	fa fa-trash-o"></i>
                                    Clear
                                </button>
                                @error('customerId')
                                    <span class="error text-danger">{{ $message }} select customer name</span>
                                @enderror <br>
                                @error('lpo_no')
                                    <span class="error text-danger">{{ $message }} Enter LPO No</span>
                                @enderror

                            </p>
                            <p class="font-weight-bold mb-0">Thanks for shopping with us !</p> <span>Nike Team</span>
                        </div>

                    </div>
                </div>
            </div>
    </section>





</div>
