@extends('layouts.app')

@section('content')
    {{-- @push('styles') --}}

    <style>
        li {
            font-size: 14px;
            margin-left: 10px;
            list-style-type: disc
        }
    </style>


    <link rel="stylesheet" type="text/css"
        href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/bootstrap.min.css">
    </link>

    {{-- <link rel="stylesheet" type="text/css" href="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/css/prettify.css">
    </link> --}}
    <link rel="stylesheet" type="text/css"
        href="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.css">
    </link>
    {{-- @endpush --}}

    <div class="contaisner">
        <div class="row">
            {{ request('start_date') }}

            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="card-title">Terms & Conditions</h4>
                    </div>
                    <div class="card-body" style="margin-left: 112px;">
                        <form class="image-upload" method="POST"
                            action="{{ route('terms.update', ['term' => $term->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Author Name</label>
                                <input type="text" name="group" value="{{ $term->group }}" class="form-control"
                                    style="width: 1030px" />
                            </div>
                            <div class="form-group">
                                <textarea name="desc" class="textarea" style="width: 1030px; height: 1000px">{!! $term->desc !!}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        {{-- <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script> --}}

        <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/wysihtml5-0.3.0.js"></script>
        <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/jquery-1.7.2.min.js"></script>
        <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/prettify.js"></script>
        <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//lib/js/bootstrap.min.js"></script>
        <script src="https://jhollingworth.github.io/bootstrap-wysihtml5//src/bootstrap-wysihtml5.js"></script>

        <script>
            $(document).ready(function() {
                // $('.textarea').wysihtml5();

                $('.textarea').wysihtml5({
                    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
                    "emphasis": true, //Italics, bold, etc. Default true
                    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
                    "html": false, //Button which allows you to edit the generated HTML. Default false
                    "link": false, //Button to insert a link. Default true
                    "image": false, //Button to insert an image. Default true,
                    "color": true //Button to change color of font
                });
            });
        </script>
    @endpush
@endsection
