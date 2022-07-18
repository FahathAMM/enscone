@extends('layouts.app')

@section('content')

    @include('include.breadcrumb', [
    'currentPage' => ["User Roles"]
    ])


    <div class="row m-b-30">
        <div class="col-lg-12">
            <div class="card border-primary">
                <div class="card-header">Permission</div>
                <div class="card-body">
                    <h5 class="card-title">

                    </h5>
                    <div class="table-responsive">
                        <div>

                            @if (session()->has('success'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Role!</strong> {{ session('success') }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="d-flex justify-content-end">
                                <form wire:submit.prevent="filter" class="form-inline">
                                    <div class="form-group mx-sm-1 mb-2">
                                        <input class="form-control p-0 form-control-sm rounded-sm" type="text"
                                            wire:model.defer="query" style="height: 8px !important">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </form>
                            </div>
                            <table class="table table-striped verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">name</th>
                                        <th scope="col">status</th>
                                        <th scope="col ">select role </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $index => $user)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @forelse ( $user->roles as $role)
                                                    <span class="badge badge-success px-2">
                                                        {{ $role->name }}
                                                        <a href="{{ route('remove.role', ['user' => $user->id, 'role' => $role->id]) }}"
                                                            class=" fa fa-close"></a>
                                                    </span>
                                                @empty
                                                    <span class="badge badge-success px-2">
                                                        User
                                                    </span>
                                                @endforelse
                                            <td>
                                                <span>
                                                    <form action="{{ route('assign.role', ['user' => $user->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="container px-4">
                                                            <div class="row gx-5">
                                                                <div class="col">
                                                                    <select name="role" class="form-control" id="">
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->name }}">
                                                                                {{ $role->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col mt-2">
                                                                    <button class="btn btn-sm btn-success">submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"><small>Last updateed 3 min ago</small>
                </div>
            </div>
        </div>
    </div>
@endsection
