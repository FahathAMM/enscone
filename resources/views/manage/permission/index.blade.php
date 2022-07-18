@extends('layouts.app')

@section('content')

    @include('include.breadcrumb', [
    'currentPage' => ["User Permission List"]
    ])


    <div class="row m-b-30">
        <div class="col-lg-12">
            <div class="card border-primary">
                <div class="card-header">Permission</div>
                <div class="card-body">
                    <h5 class="card-title">
                        {{-- @can('read') --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_role"
                            data-whatever="@getbootstrap">Create Role
                        </button>
                        {{-- @endcan --}}
                    </h5>
                    <div class="table-responsive">
                        <livewire:permission.permissions />
                    </div>
                </div>
                <div class="card-footer"><small>Last updateed 3 min ago</small>
                </div>
            </div>
        </div>
    </div>
@endsection
