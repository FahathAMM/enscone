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

        .load-spinner {
            position: absolute;
            top: 300px;
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
                    <h4 class="card-title">Create New Skills</h4>
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
                            <div class="form-group col-md-5">
                                <label for="">Category</label>
                                <select wire:model.defer="category" type="text" class="form-control"
                                    placeholder="Category">
                                    <option value="">Choose...</option>
                                    <option value="Desktop Application">Desktop Application</option>
                                    <option value="Web Application">Web Application</option>
                                    <option value="Database System">Database System</option>
                                    <option value="Another Skills">Another Skills</option>
                                </select>
                                @error('category')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <div class="form-group">
                                    <label for="formControlRange">Level</label>
                                    <input wire:model="level" type="range" class="form-control-range"
                                        id="formControlRange">
                                    @error('level')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-1 mt-4">
                                <div class="form-group">
                                    <label class="label gradient-{{ rand(1, 5) }} btn-rounded">
                                        {{ $level ?? 0 }}%
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="">Description</label>
                                <input wire:model.defer="description" type="text" class="form-control"
                                    placeholder="description">
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
                        <div class="table-responsive py-2">
                            <table class="table table-striped table-bordered">
                                <div>
                                    <a wire:click="type('')" class="label point gradient-4">All</a>
                                    <a wire:click="type('Desktop Application')" class="label point gradient-1">Desktop
                                        Application</a>
                                    <a wire:click="type('Web Application')" class="label point gradient-2">Web
                                        Application</a>
                                    <a wire:click="type('Database System')" class="label point gradient-3">Database
                                        System</a>
                                    <a wire:click="type('Another Skills')" class="label point gradient-4">Another
                                        Skills</a>
                                </div>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Level</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($skills as $key => $skill)

                                        @if ($isEditable == $skill->id)
                                            <tr>
                                                <td>{{ $key + $skills->firstItem() }}</td>
                                                <td>
                                                    <input wire:model.defer="editName" type="text"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <input wire:model.defer="editCategory" type="text"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <input wire:model="editLevel" type="range"
                                                            class="form-control-range" id="formControlRange"
                                                            style="width: 60%;">
                                                        <div class="col-md-1">
                                                            <label
                                                                class="label gradient-{{ rand(1, 5) }} btn-rounded">
                                                                {{ $editLevel }}%
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input wire:model.defer="editDescription" type="text"
                                                        class="form-control">
                                                </td>
                                                <td>
                                                    <div class="button-group">
                                                        <div class="btn-group">
                                                            <button wire:click="update('{{ $skill->id }}')"
                                                                type="button" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $key + $skills->firstItem() }}</td>
                                                <td>{{ $skill->name }}</td>
                                                <td>{{ $skill->category }}</td>

                                                <td style="width: 25%">
                                                    <div class="row">
                                                        <div class="col-md-8" style="padding-top: 7px;">
                                                            <div class="progress" style="height: 10px">
                                                                <div class="progress-bar gradient-{{ rand(1, 5) }}"
                                                                    style="width:{{ $skill->level }}%;"
                                                                    role="progressbar">
                                                                    <span class="sr-only"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <label
                                                                class="label gradient-{{ rand(1, 5) }} btn-rounded">
                                                                {{ $skill->level }}%
                                                            </label>
                                                        </div>

                                                    </div>
                                                </td>

                                                <td>{{ $skill->description }}</td>
                                                <td>
                                                    <div class="button-group">
                                                        <div class="btn-group">
                                                            <button wire:click="edit('{{ $skill->id }}')"
                                                                type="button" class="btn btn-primary">
                                                                Edit
                                                            </button>
                                                            <button
                                                                wire:click="deleteConfirmation('{{ $skill->id }}')"
                                                                type="button" class="btn btn-danger">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $skills->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





</div>
