@extends('layouts.app')

@section('content')
    <div class="contaisner">
        <div class="row">
            <div class="col-12 col-md-4">
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
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control form-control-sm">
                                    <option value="">select..</option>
                                    @forelse (App\helpers\get_categories() as  $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="product_image" class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card text-left">
                    <div class="card-header bg-primary">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="form-group d-flex  w-100">
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
                                    <select name="categoryBy" class="form-control form-control-sm" style="height: 12px;">
                                        <option value="">Category</option>
                                        @forelse (App\helpers\get_categories() as  $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @empty
                                        @endforelse
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
                                    <a href="{{ route('products.index') }}" type="submit" class="btn btn-primary ml-1"
                                        style="height: 36px;">Clear</a>
                                </div>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key => $product)
                                    <tr>
                                        <td scope="row">{{ $key + $products->firstItem() }}</td>
                                        <td scope="row">{{ $product->name }}</td>
                                        <td scope="row">{{ $product->category->name }}</td>
                                        <td>{!! App\helpers\Media::viewImage($product->img, '100px', '100px') !!}</td>
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
