@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            <div class="col-4">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title ">Services</h4>
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
                            <form action="{{ route('services.update', ['service' => $service->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $service->name }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="amount" value="{{ $service->amount }}"
                                        class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('services.index') }}" class="btn btn-success">Clear</a>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control form-control-sm" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="amount" class="form-control form-control-sm" required>
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
                            <form action="{{ route('services.index') }}" method="GET">
                                <div class="form-group d-flex  w-75">
                                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search"
                                        class="form-control mx-1 form-control-sm" style="height: 12px;">

                                    <button type="submit" class="btn btn-primary" style="height: 36px;">Search</button>
                                    <a href="{{ route('services.index') }}" type="submit" class="btn btn-primary ml-1"
                                        style="height: 36px;">Clear</a>
                                </div>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $key => $service)
                                    <tr>
                                        <td scope="row">{{ $key + $services->firstItem() }}</td>
                                        <td scope="row">{{ $service->name }}</td>
                                        <td scope="row">{{ $service->amount }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="services?e=edit&id={{ $service->id }}"
                                                    class="btn btn-primary">Edit</a>
                                                <form method="POST"
                                                    action="{{ route('services.destroy', ['service' => $service->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
