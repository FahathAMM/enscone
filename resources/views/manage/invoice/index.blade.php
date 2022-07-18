@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            {{ request('start_date') }}

            <div class="col-12 col-md-12">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title">Invoice List</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('invoice') }}" method="GET">
                            <div class="form-group d-flex  w-75">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search"
                                    class="form-control mx-1 form-control-sm w-50" style="height: 12px;">
                                <input type="date" name="start_date" value="{{ request('start_date') }}"
                                    placeholder="Start Date" class="form-control mx-1 form-control-sm" style="height: 12px;">

                                <input type="date" name="end_date" value="{{ request('end_date') }}"
                                    placeholder="Start Date" class="form-control mx-1 form-control-sm"
                                    style="height: 12px;">

                                <button type="submit" class="btn btn-primary" style="height: 36px;">Search</button>
                                <a href="{{ route('invoice') }}" type="submit" class="btn btn-primary ml-1"
                                    style="height: 36px;">Clear</a>
                            </div>
                        </form>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bill No</th>
                                    <th>Customer Name</th>
                                    <th>LPO No</th>
                                    <th>Sub Total</th>
                                    <th>Vat</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $key => $order)
                                    <tr>
                                        <td scope="row">{{ $key + $orders->firstItem() }}</td>
                                        <td scope="row">ETS{{ $order->id }}</td>
                                        <td scope="row">{{ $order->customer_name }}</td>
                                        <td scope="row">{{ $order->lpo_no }}</td>
                                        <td scope="row">{{ $order->total }}</td>
                                        <td scope="row">{{ $order->vat }}</td>
                                        <!-- <td scope="row">{{ $order->grand_total }}</td> -->

                                        <td scope="row">{{   round($order->grand_total, 2) }}</td>


                                        <td>{{ $order->created_at->toDateString() }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('generate.invoice', ['orderNumber' => $order->id]) }}"
                                                    class="btn btn-primary">View</a>
                                                <a href="{{ route('invoice.edit', ['id' => $order->id]) }}"
                                                    class="btn btn-primary">Edit</a>
                                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
