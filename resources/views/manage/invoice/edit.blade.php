@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            <div class="col-8">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title ">order</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Message</h4>
                                <p>{{ session()->get('status') }}</p>
                                <p class="mb-0"></p>
                            </div>
                        @endif

                             <form action="{{ route('invoice.update', ['id' => $order->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">Customer Name</label>
                                    <input type="text" name="customer_name" value="{{ $order->customer_name }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="text" name="total" value="{{ $order->total }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">LPO No</label>
                                    <input type="text" name="lpo_no" value="{{ $order->lpo_no }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">VAT</label>
                                    <input type="text" name="vat" value="{{ $order->vat }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Grand Total</label>
                                    <input type="text" name="grand_total" value="{{ $order->grand_total }}"
                                        class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Remark</label>
                                    <textarea rows="10" name="remark"
                                        class="form-control form-control-sm" >
                                        {{ $order->remark }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                 </div>
                            </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
