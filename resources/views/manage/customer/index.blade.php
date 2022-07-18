@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            <div class="col-4">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title ">Customer</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Message</h4>
                                <p>{{ session()->get('status') }}</p>
                                <p class="mb-0"></p>
                            </div>
                        @endif

                        @if (request()->e == 'edit')
                            <form action="{{ route('customers.update', ['customer' => $customer->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $customer->name }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Post Box Number</label>
                                    <input type="text" name="post_box_number" value="{{ $customer->post_box_number }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" value="{{ $customer->address }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" value="{{ $customer->city }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">ATTN</label>
                                    <input type="text" name="attn" value="{{ $customer->attn }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">TRN</label>
                                    <input type="text" name="trn" value="{{ $customer->trn }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('customers.index') }}" class="btn btn-success">Clear</a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Post Box Number</label>
                                    <input type="text" name="post_box_number" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">ATTN</label>
                                    <input type="text" name="attn" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">TRN</label>
                                    <input type="text" name="trn" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title">List</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="{{ route('customers.index') }}" method="GET">
                                <div class="form-group d-flex  w-75">
                                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search"
                                        class="form-control mx-1 form-control-sm" style="height: 12px;">

                                    <button type="submit" class="btn btn-primary" style="height: 36px;">Search</button>
                                    <a href="{{ route('customers.index') }}" type="submit" class="btn btn-primary ml-1"
                                        style="height: 36px;">Clear</a>
                                </div>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Post</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>ATTN</th>
                                    <th>TRN</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($customers as $key => $customer)
                                    <tr>
                                        <td scope="row">{{ $key + $customers->firstItem() }}</td>
                                        <td scope="row">{{ $customer->name }}</td>
                                        <td scope="row">{{ $customer->post_box_number }}</td>
                                        <td scope="row">{{ $customer->address }}</td>
                                        <td scope="row">{{ $customer->city }}</td>
                                        <td scope="row">{{ $customer->attn }}</td>
                                        <td scope="row">{{ $customer->trn }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="customers?e=edit&id={{ $customer->id }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
