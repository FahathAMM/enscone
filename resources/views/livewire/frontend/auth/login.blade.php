<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: red;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .gr {
        ackground: #fccb90;
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    .modal h3 {
        color: black !important;
    }

    .btnreg {
        position: absolute;
        top: 21px;
        z-index: 1500;
        right: 31px;
        pointer: cursor;
        cursor: pointer;
    }

    .btnad {
        position: absolute;
        top: 21px;
        z-index: 1500;
        right: 90px;
        pointer: cursor;
        cursor: pointer;
    }

</style>

@if (Auth::check())
    <a href="/logout-user" class="btnreg">
        Logout
    </a>
    <a href="{{ route('user.dashboard') }}" class="btnad">
        Dashboard
    </a>
@else
    <p id="btnregId" class="btnreg">
        Login
    </p>
@endif



<!-- The Modal -->

@if (Auth::check())
    <div  class="modal" style="z-index: 1500">
    @else
        <div id="myModal" class="modal" style="z-index: 1500">
@endif
<!-- Modal content -->
<div class="modal-content" style="width: 35%; padding: 3%;">
    <span   class="close">&times;</span>
    <h3>Have You Good Day</h3>
    <p>If Your the first time visit to our site you able to register</p>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="mb-5">Sign in</h3>
                    <div class="form-outline mb-4">
                        <input id="email" type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label class="form-label" for="typeEmailX-2">Email</label><br>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input id="password" type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">
                        <label class="form-label" for="typePasswordX-2">Password</label><br>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg btn-block">
                        Register
                    </a>
                    <hr class="my-4">
                    <a href="{{ route('google.login') }}" class="btn btn-lg btn-block btn-danger" type="submit"><i
                            class="fab fa-google me-2"></i> Sign
                        in with google</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
    <script>
        // $(document).ready(function() {
        //     $("#myModal").slideDown(2000);
        // });
        // //made by csandreas1 for Stackoverflow
        // $('.close').click(function() {
        //     $("#myModal").slideUp(1000);
        // });
        // $('.btnreg').click(function() {
        //     $("#myModal").slideDown(1000);
        // });
    </script>
@endpush
