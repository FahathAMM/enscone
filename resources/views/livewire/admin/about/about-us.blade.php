<div>
    @section('title')
        {{ $title }}
    @endsection
    <style>
        input[type="text"] {
            height: 0px;
        }

        .file-upload-button {
            display: inline-block;
            background-color: indigo;
            color: white;
            padding: 2px 12px 2px 9px;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin: -2px 8px 0px 8px;
        }

        input[type="text"] {
            height: 0px;
        }

        .point {
            cursor: pointer;
        }

        .load-spinner {
            position: absolute;
            top: 450px;
            right: 167px;
            left: 800px;
            z-index: 1500;
            width: 100px;
            height: 100px;
        }

    </style>

    <x-alert />

    <div wire:loading class="spinner-border load-spinner text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Create New About</h4>
                </div>
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input wire:model="attribute.0" type="text" class="form-control"
                                    placeholder="EX:-LANGUAGE">
                                @error('attribute.0')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <input wire:model="value.0" type="text" class="form-control"
                                    placeholder="EX:-TAMIL,ENGLISH,SINHALA">
                                @error('value.0')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-1">
                                <button wire:click.prevent="add({{ $i }})" type="button"
                                    class="btn form-control btn-success" style="height:0px">
                                    <i class="fa fa-plus-square"></i>
                                </button>
                            </div>
                        </div>
                        @foreach ($inputs as $key => $value)
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input wire:model="attribute.{{ $value }}" type="text" class="form-control"
                                        placeholder="Attributes">
                                    @error('attribute.' . $key)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <input wire:model="value.{{ $value }}" type="text" class="form-control"
                                        placeholder="Values">
                                    @error('value.' . $key)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-1">
                                    <button wire:click.prevent="remove({{ $key }})" type="button"
                                        class="btn form-control btn-success" style="height:0px">
                                        <i class="fa fa-minus-square"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <div style="text-align: center">
                            <button wire:click.prevent="store()" type="button" class="btn form-control btn-danger"
                                style="width:40%">
                                <i class=""></i> Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <div class="card" style="width: 200px;height: 200px;">

                                    @if (Auth::user()->google_id)
                                        <img src='{{ Auth::user()->avatar }}' style="width: 200px;height: 200px;"
                                            class="img-thumbnail" alt="...">
                                    @else
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}"
                                                style="width: 200px;height: 200px;" class="img-thumbnail" alt="...">
                                        @elseif($user->avatar)
                                            <img src='{{ asset("storage/$user->avatar") }}'
                                                style="width: 200px;height: 200px;" class="img-thumbnail" alt="...">
                                        @else
                                            <img src='{{ asset('storage/avatar/blank.jpg') }}'
                                                style="width: 200px;height: 200px;" class="img-thumbnail" alt="...">
                                        @endif
                                        <div wire:loading wire:target="image" wire:key="image"
                                            class=" text-primary py-2 text-center">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden"></span>
                                            </div>
                                        </div>
                                        <input type="file" wire:model="image" id="upload" hidden />
                                        @if ($image == '')
                                            <label class="file-upload-button" for="upload">Change Image</label>
                                        @elseif($imageStatus == 'done')
                                            <label wire:click="changeStatus" class="file-upload-button" for="upload">
                                                Change Image
                                            </label>
                                        @else
                                            <button wire:click="uploadImage" class="file-upload-button">
                                                Click to Save
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-4 mt-5">
                                @error('image')
                                    <label class="text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Attribues</th>
                                        <th>Values</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user->abouts as $key => $about )
                                        @if ($isEditable == $about->id)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    <input wire:model.defer="editKeys" type="text"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input wire:model.defer="editValue" type="text"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <div class="button-group">
                                                        <div class="btn-group">
                                                            <button wire:click="update('{{ $about->id }}')"
                                                                type="button" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $about->keys }}</td>
                                                <td>{{ $about->value }}</td>
                                                <td>
                                                    <div class="button-group">
                                                        <div class="btn-group">
                                                            <button wire:click="edit('{{ $about->id }}')"
                                                                type="button" class="btn btn-primary">Edit</button>
                                                            <button
                                                                wire:click="deleteConfirmation('{{ $about->id }}')"
                                                                type="button" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>







</div>
