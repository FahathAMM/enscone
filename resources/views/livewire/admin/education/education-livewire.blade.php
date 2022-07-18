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
        <div class="card" id="newedu">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Create New Education</h4>
                </div>
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Name</label>
                                <input wire:model.defer="name" type="text" class="form-control" placeholder="Name">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Institute</label>
                                <input wire:model.defer="institute" type="text" class="form-control"
                                    placeholder="institute">
                                @error('institute')
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

                            <div class="form-group col-md-6">
                                <label for="">end</label>
                                <input wire:model.defer="end" type="date" class="form-control" placeholder="end">
                                @error('end')
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
                                        <th>Institute</th>
                                        <th style="width:9%;">Start</th>
                                        <th style="width:9%;">End</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($educations as $key => $education)
                                        <tr>
                                            <td>{{ $key + $educations->firstItem() }}</td>
                                            <td>{{ $education->name }}</td>
                                            <td>{{ $education->institute }}</td>
                                            <td>{{ $education->start }}</td>
                                            <td>{{ $education->end }}</td>
                                            <td>
                                                <p title="{{ $education->description }}">
                                                    {{ Str::limit($education->description, 40, '...') }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="button-group">
                                                    <div class="btn-group">
                                                        <button wire:click="edit('{{ $education->id }}')"
                                                            type="button" class="btn btn-primary">Edit</button>
                                                        <button
                                                            wire:click="deleteConfirmation('{{ $education->id }}')"
                                                            type="button" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $educations->links() }}
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
