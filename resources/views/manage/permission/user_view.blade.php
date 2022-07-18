@extends('layouts.app')

@section('content')

    @include('include.breadcrumb', [
    'previousPage' => [ 0=>["permission.index", "User Permission List"], ],
    'currentPage' => ["User List"]
    ])

    <div class="row m-b-30">
        <div class="col-lg-12">
            <div class="card border-primary">
                <div class="card-header">Permission</div>
                <div class="card-body">
                    <h5 class="card-title">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create_role"
                            data-whatever="@getbootstrap">Create New {{ $role }}
                        </button>
                    </h5>
                    <div class="table-responsive">
                        <table class="table   table-striped verticle-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><span class=" px-2">{{ $user->email }}</span></td>
                                        <td class="permission-table-width">
                                            <span>
                                                <a data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit" class="btn btn-danger"><i
                                                        class="fa fa-trash color-muted m-r-5"> Delete</i>
                                                </a>
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Currently No Any Users</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"><small>Last updateed 3 min ago</small>
                </div>
            </div>
        </div>
    </div>


    @if (Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="create_role" tabindex="-1" data-backdrop="static" aria-labelledby="create_role"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('role.create') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">
                                Users
                            </label>
                            <select name="" id="" class="form-control @error('role') border-danger @enderror" name="role"
                                required>
                                @foreach ($allUsers as $singleUser)
                                    <option value="{{ $singleUser->id }}">{{ $singleUser->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>




    @push('scripts')

        @error('role')
            <script>
                $('document').ready(function() {
                    $('.modal').modal({
                        show: true
                    });

                })
            </script>
        @enderror

    @endpush



@endsection
