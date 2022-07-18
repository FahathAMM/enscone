@extends('layouts.app')

@section('content')

    <style>
        input[type=checkbox] {
            -moz-appearance: none;
            -webkit-appearance: none;
            -o-appearance: none;
            outline: none;
            content: none;
        }

        input[type=checkbox]:after {
            font-family: "FontAwesome";
            content: "\f00c";
            font-size: 15px;
            color: transparent !important;
            display: block;
            width: 15px;
            height: 15px;
            border: 1px solid black;
            margin-right: 7px;
        }

        input[type=checkbox]:checked:after {
            color: blue !important;
        }

    </style>


    @include('include.breadcrumb', [
    'previousPage' => [ 0=>["permission.index", "User Permission List"], ],
    'currentPage' => ["User Permission List"]
    ])

    <div class="row m-b-30">
        <div class="col-lg-12">
            <div class="card border-primary bg-white">
                <div class="card-header bg-light">Set Permission</div>
                <div class="card-body ">
                    <form action="{{ route('role.set', ['role' => $role->id]) }}" method="POST"
                        class="permissionBorder p-3">
                        @csrf
                        @foreach ($permissions as $permission)
                            <div class="form-check m-3">
                                <input class="form-check-input permissionBox" name="permission[]"
                                    value="{{ $permission->id }}" type="checkbox" id="{{ $permission->name }}"
                                    @if (count($role->permissions->where('id', $permission->id)))
                                checked
                        @endif
                        >
                        <label class="form-check-label" for="{{ $permission->name }}" style="font-size:17px">
                            {{ Str::upper(str_replace('_', ' ', $permission->name)) }} Permissions
                        </label>
                </div>
                @endforeach
                <div class="form-check mt-5 pl-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>



@endsection
