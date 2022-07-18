<div>
    @section('title')
    {{ $title }}
@endsection
    <style>
        input[type="text"] {
            height: 0px;
        }

    </style>

    <x-alert />
    <div class="col-lg-12" id="newexp">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Create New Education</h4>
                </div>
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Company</label>
                                <input wire:model.defer="name" type="text" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">position</label>
                                <input wire:model.defer="position" type="text" class="form-control"
                                    placeholder="position">
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="formControlRange">Start</label>
                                    <input wire:model="start" type="date" class="form-control" id="formControlRange">
                                    @error('start')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-5">
                                <label for="">end</label>
                                <input wire:model.defer="end" type="date" class="form-control"
                                    placeholder="description">
                                @error('end')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-1">
                                <label for="">Present</label>
                                {{-- <input wire:model.defer="end" type="checkbox" class="form-check-input mt-5 checkbox-example" > --}}

                                @if ($present)
                                    <label class="container">
                                        <input type="checkbox" wire:model.defer="present" value="present"
                                            type="checkbox" class="form-check-input mt-5" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                @else
                                    <label class="container">
                                        <input type="checkbox" wire:model.defer="present" value="present"
                                            type="checkbox" class="form-check-input mt-5">
                                        <span class="checkmark"></span>
                                    </label>
                                @endif

                                @error('present')
                                    <div class="text-danger" style="z-index:150000;position:absolute">{{ $message }}
                                    </div>
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
                                        <th>Company</th>
                                        <th>start</th>
                                        <th style="width:9%;">Start</th>
                                        <th style="width:9%;">End</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($experiences as $key => $experience)
                                        <tr>
                                            <td>{{ $key + $experiences->firstItem() }}</td>
                                            <td>{{ $experience->name }}</td>
                                            <td>{{ $experience->position }}</td>
                                            <td>{{ $experience->start }}</td>
                                            <td>{{ $experience->end }}</td>
                                            <td>
                                                <p title="{{ $experience->description }}">
                                                    {{ Str::limit($experience->description, 40, '...') }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="button-group">
                                                    <div class="btn-group">
                                                        <button wire:click="edit('{{ $experience->id }}')"
                                                            type="button" class="btn btn-primary">
                                                            Edit
                                                        </button>
                                                        <button
                                                            wire:click="deleteConfirmation('{{ $experience->id }}')"
                                                            type="button" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $experiences->links() }}
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


</div>
