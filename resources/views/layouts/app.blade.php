@include('include.head')

<body id="body-id">

    @stack('styles')

    <div id="main-wrapper">

        @include('include/sidebar')

        @include('include/header')

        <div class="content-body">
            <div class="container-fluid mt-3">
                @yield('content')
            </div>
        </div>
        @include('include/footer')
    </div>

    @include('include/foot')

    @stack('scripts')

</body>

<script>
    $('.modal').click(function() {
        $('#body-id').css('width', '100%')
    });

    window.livewire.on('hideModal', () => {
        $("[data-dismiss=modal]").trigger({
            type: "click"
        });
    })

    window.addEventListener('show-delete-modal', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                livewire.emit('deleteConfirmed')
            }
        })
    })

    $('#messageId').click(function() {
        livewire.emit('newMessages')
    });
</script>




</html>
