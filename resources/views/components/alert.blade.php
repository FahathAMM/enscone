<div>

    @if (session()->has('success'))
        <script>
            Swal.fire(
                'Message!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif


    @if (session()->has('error'))
        <script>
            Swal.fire(
                'Message!',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif

</div>


{{-- @if (Session::has('success-s'))
    <div class="alert alert-success">
        <p>{{ Session::get('success-s') }}</p>
    </div>
@endif --}}
