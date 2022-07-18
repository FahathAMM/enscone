<div>

    @include('livewire.permission.modal')

    {{-- <x-alert /> --}}

    @if (session()->has('success'))
        {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> {{ session('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> --}}
    @endif

    <div class="d-flex justify-content-end">
        <form wire:submit.prevent="filter" class="form-inline">
            <div class="form-group mx-sm-1 mb-2">
                <input class="form-control p-0 form-control-sm rounded-sm" type="text" wire:model.defer="query"
                    style="height: 8px !important">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
    <table class="table table-striped verticle-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Roles</th>
                <th scope="col">status</th>
                <th scope="col ">Users List</th>
                <th scope="col">Permissions</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>


            @forelse ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td><span class="badge badge-success px-2">admin</span></td>
                    </td>
                    <td class="permission-table-width">
                        <span>
                            <a href="{{ route('view.users', ['role' => $role->id]) }}" data-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Edit" class="btn btn-primary">
                                <i class="fa fa-user color-muted m-r-5"> View Users</i>
                            </a>
                        </span>
                    </td>
                    <td class="permission-table-width">
                        <span>
                            <a href="{{ route('permission.view', ['userId' => $role->id]) }}" data-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Edit" class="btn btn-success"><i
                                    class="fa fa-key color-muted m-r-5"> set
                                    permission</i>
                            </a>
                        </span>
                    </td>
                    <td class="permission-table-width">
                        <span>
                            {{-- <a wire:click="deleteRole({{ $role->id }})" data-toggle="tooltip" data-placement="top"
                                title="" data-original-title="Edit" class="btn btn-danger"><i
                                    class="fa fa-trash color-muted m-r-5"> Delete</i>
                            </a> --}}
                            {{-- <button type="button" wire:click="deleteConfirm({{ $role->id }})" class="btn btn-danger"
                                data-toggle="modal" data-target="#exampleModal">Delete</button> --}}

                                {{-- <button wire:click="deleteConfirm({{  $role->id }})" type="button">delete</button> --}}
                                {{-- <button type="button" id="g" type="button">delete</button> --}}

                        </span>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $roles->links() }}
    </div>

</div>




{{-- <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click="deleteRole()" class="btn btn-danger close-modal"
                    data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div> --}}
