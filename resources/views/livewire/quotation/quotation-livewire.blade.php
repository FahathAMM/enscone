<div>
    <style>
        li {
            font-size: 14px;
            margin-left: 50px;
            list-style-type: disc
        }
    </style>

    <section class="mt-3">
        <div class="ml-3">
            <button class="btn btn-success" wire:click="save">Submit</button>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-5  mt-3 ">
                    <div class="card">
                        <div class="card-body">
                            <table class="table " style="background-color:white;">
                                <tbody>
                                    <tr>
                                        <td style="width:60%">
                                            <label for="">Select group of term &</label>
                                            <select wire:change="getTerms" wire:model="termsconditions"
                                                class="form-control" style=" height: 32px;">
                                                <option value="">select Terms..</option>
                                                @foreach ($terms as $term)
                                                    <option value={{ $term->id }} class="custom-select">
                                                        {{ $term->group }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('serviceId')
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2">
                            <hr>
                            {!! $desc !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-7  mt-3 ">
                    <div class="card">
                        <div class="card-body">
                            <table class="table " style="background-color:white;">
                                <tbody>
                                    <tr>
                                        <td>Client</td>
                                        <td><input wire:model.defer="client" type="text" class="form-control"></td>
                                        <td>Quote Ref</td>
                                        <td><input wire:model.defer="quote_ref" type="text" class="form-control">
                                        </td>

                                    </tr>
                                    <td>Contact Person</td>
                                    <td><input wire:model.defer="contact_person"type="text" class="form-control">
                                    </td>
                                    <td>Date</td>
                                    <td><input wire:model.defer="date" type="date" class="form-control"></td>

                                    </tr>
                                    <td>Address</td>
                                    <td colspan="4">
                                        <input wire:model.defer="address" type="text" class="form-control">
                                    </td>

                                    </tr>
                                    <td>Project</td>
                                    <td colspan="4">
                                        <input wire:model.defer="project" type="text" class="form-control">
                                    </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



    </section>


</div>
