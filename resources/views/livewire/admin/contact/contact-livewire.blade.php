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

    </style>

    <x-alert />

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">Create New Contacts</h4>
                </div>
                <div class="basic-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input wire:model="attribute.0" type="text" class="form-control"
                                    placeholder="EX:-Linkedin">
                                @error('attribute.0')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <input wire:model="value.0" type="text" class="form-control"
                                    placeholder="EX:- https://www.linkedin.com/in/fahath-mohamed-3ab47416b/">
                                @error('value.0')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <select wire:model="icon.0" type="text" class="form-control" placeholder="EX:- Icon">
                                    <option value="">Choose Icon...</option>
                                    <option value="fa fa-facebook">Facebook</option>
                                    <option value="fa fa-envelope">Email</option>
                                    <option value="fa fa-linkedin-square">Linkedin</option>
                                    <option value="fa fa-instagram">Instagram </option>
                                    <option value="fa fa-whatsapp">Whatsapp</option>
                                    <option value="fa fa-fw fa-mobile">Mobile</option>
                                    <option value="fa fa-github">Github</option>
                                    <option value="fa fa-twitter-square">Twitter</option>
                                    <option value="fa fa-globe">Website</option>
                                    <option value="fa fa-skype">Skype</option>
                                </select>
                                @error('icon.0')
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
                                <div class="form-group col-md-3">
                                    <input wire:model="attribute.{{ $value }}" type="text" class="form-control"
                                        placeholder="Social Media">
                                    @error('attribute.' . $key)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <input wire:model="value.{{ $value }}" type="text" class="form-control"
                                        placeholder="Links">
                                    @error('value.' . $key)
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <select wire:model="value.{{ $value }}" type="text" class="form-control"
                                        placeholder="Icon">
                                        <option value="">Choose Icon...</option>
                                        <option value="fa fa-facebook">Facebook</option>
                                        <option value="fa fa-envelope">Email</option>
                                        <option value="fa fa-linkedin-square">Linkedin</option>
                                        <option value="fa fa-instagram">Instagram </option>
                                        <option value="fa fa-whatsapp">Whatsapp</option>
                                        <option value="fa fa-fw fa-mobile">Mobile</option>
                                        <option value="fa fa-github">Github</option>
                                        <option value="fa fa-twitter-square">Twitter</option>
                                        <option value="fa fa-globe">Website</option>
                                        <option value="fa fa-skype">Skype</option>
                                    </select>
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

                                    @forelse ($user->contacts as $key => $contact )
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            @if ($isEditable == $contact->id)
                                                <td>
                                                    <input wire:model="editattribute" type="text" class="form-control"
                                                        value="{{ $contact->name }}" id="">
                                                </td>
                                                <td>
                                                    <input wire:model="editValue" type="text" class="form-control"
                                                        value="{{ $contact->value }}" name="" id="">
                                                </td>
                                                <td>
                                                    <select wire:model="editIcon" type="text" class="form-control"
                                                        placeholder="Icon">
                                                        <option value="">{{ $contact->icon }}.</option>
                                                        <option value="fa fa-facebook">Facebook</option>
                                                        <option value="fa fa-envelope">Email</option>
                                                        <option value="fa fa-linkedin-square">Linkedin</option>
                                                        <option value="fa fa-instagram">Instagram </option>
                                                        <option value="fa fa-whatsapp">Whatsapp</option>
                                                        <option value="fa fa-fw fa-mobile">Mobile</option>
                                                        <option value="fa fa-github">Github</option>
                                                        <option value="fa fa-twitter-square">Twitter</option>
                                                        <option value="fa fa-globe">Website</option>
                                                        <option value="fa fa-skype">Skype</option>
                                                    </select>
                                                </td>
                                            @else
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->value }}</td>
                                            @endif

                                            <td>
                                                <div class="button-group">
                                                    <div class="btn-group">
                                                        @if ($isEditable == $contact->id)
                                                            <button wire:click="update('{{ $contact->id }}')"
                                                                type="button" class="btn btn-success">
                                                                Save
                                                            </button>
                                                        @else
                                                            <button wire:click="edit('{{ $contact->id }}')"
                                                                type="button" class="btn btn-primary">
                                                                Edit
                                                            </button>
                                                        @endif

                                                        <button wire:click="deleteConfirmation('{{ $contact->id }}')"
                                                            type="button" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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




    {{-- linkedin	https://www.linkedin.com/in/fahath-mohamed-3ab47416b/
    2	github	https://github.com/FahathAMM/
    3	facebook	Fahad Amm
    4	mail	fahathammex90@gmail.com
    5	phone	0752388923 --}}





</div>
