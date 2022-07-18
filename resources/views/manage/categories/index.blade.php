@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            <div class="col-4">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title ">Title</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Message</h4>
                                <p>{{ session()->get('status') }}</p>
                                <p class="mb-0"></p>
                            </div>
                        @endif
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="category_image" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="{{ route('categories.index') }}" method="GET">
                                <div class="form-group d-flex  w-75">
                                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search"
                                        class="form-control mx-1 form-control-sm" style="height: 12px;">
                                    <select name="orderMethod" placeholder="Search"
                                        class="form-control mx-1 form-control-sm" style="height: 12px;">
                                        <option value="{{ request('orderMethod') }}">
                                            {{ request('orderMethod') != null ? request('orderMethod') : 'choose' }}
                                        </option>
                                        <option value="asc">ASC</option>
                                        <option value="desc">DESC</option>
                                    </select>
                                    <select name="orderby" placeholder="Search" class="form-control mx-1 form-control-sm"
                                        style="height: 12px;">
                                        <option value="{{ request('orderby') }}">
                                            {{ request('orderby') != null ? request('orderby') : 'choose' }}
                                        </option>
                                        <option value="id">ID</option>
                                        <option value="name">Name</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary" style="height: 36px;">Save</button>
                                    <a href="{{ route('categories.index') }}" type="submit" class="btn btn-primary ml-1"
                                        style="height: 36px;">Clear</a>
                                </div>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $key => $category)
                                    <tr>
                                        <td scope="row">{{ $key + $categories->firstItem() }}</td>
                                        <td scope="row">{{ $category->name }}</td>
                                        <td>{!! App\helpers\Media::viewImage($category->img, '100px', '100px') !!}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
