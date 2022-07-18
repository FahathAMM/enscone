<div>
    @section('title')
        {{ $title }}
    @endsection
    <style>
        input[type="text"] {
            height: 0px;
        }

        .point {
            cursor: pointer;
        }

    </style>

    <x-alert />
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Create New Services</h4>
                </div>
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Services</label>
                                <input wire:model.defer="name" type="text" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label for="formControlRange">Description</label>
                                    <textarea wire:model="description" class="form-control"
                                        id="formControlRange"></textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div style="text-align: center">
                            @if ($isEditable)
                                <button wire:click.prevent="update('{{ $updateId }}')" type="button"
                                    class="btn form-control btn-success" style="width:40%">
                                    <i class="">
                                    </i> Update
                                </button>
                                <button wire:click.prevent="resetInputFields" type="button"
                                    class="btn form-control btn-warning" style="width:40%">
                                    <i class="">
                                    </i> Clear
                                </button>
                            @else
                                <button wire:click.prevent="store()" type="button" class="btn form-control btn-success"
                                    style="width:40%">
                                    <i class="">
                                    </i> Save
                                </button>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive py-2">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Services as $key => $Service)
                                        <tr>
                                            <td>{{ $key + $Services->firstItem() }}</td>
                                            <td>{{ $Service->name }}</td>
                                            <td>
                                                <p title="{{ $Service->description }}">
                                                    {{ Str::limit($Service->description, 40, '...') }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="button-group">
                                                    <div class="btn-group">
                                                        <button wire:click="edit('{{ $Service->id }}')" type="button"
                                                            type="button" class="btn btn-primary">Edit</button>
                                                        <button wire:click="deleteConfirmation('{{ $Service->id }}')"
                                                            type="button" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $Services->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.livewire.on('scrollUp', () => {
            $('html, body').animate({
                scrollTop: $("#main-wrapper").offset().top
            }, 1000);
        })
    </script>
@endpush
