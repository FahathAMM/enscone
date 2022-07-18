<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <livewire:styles />

    @include('frontend.include.head', ['status' => 'complete'])

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}"> --}}

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="dark">

    <main class="site-wrapper">
        <div class="pt-table">
            <div class="pt-tablecell m-5 page-about relative">
                @yield('content')
                <nav class="page-nav clear">
                    <div class="container">
                        <div class="flex flex-middle space-between">
                            <span class="prev-page">
                                <a href="welcome.html" class="link"></a></span>
                            <span class="copyright text-center hidden-xs">
                                Copyright &copy; {{ now()->year }} Fahath, All Rights
                                Reserved.
                            </span>
                            <span class="next-page">
                                <a href="services.html" class="link"></a></span>
                        </div>
                    </div>
                    <!-- /.page-nav -->
                </nav>
                <!-- /.container -->
            </div> <!-- /.pt-tablecell -->
        </div> <!-- /.pt-table -->
    </main> <!-- /.site-wrapper -->

    <livewire:scripts />

    @include('frontend.include.foot')




    @stack('scripts')


</body>

</html>
