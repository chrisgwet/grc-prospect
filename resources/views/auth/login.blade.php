<!DOCTYPE html>
<html lang="en">

<head>
    <title>GRC - Authentification</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.jpg') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-55">
                        GRC - Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-16 @error('email') alert-validate @enderror"
                        @error('email') data-validate={{ $message }} @enderror>
                        <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Mot de passe requis">
                        <input class="input100" type="password" name="password" placeholder="Mot de passe">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                    </div>

                    <div class="contact100-form-checkbox m-l-4">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn p-t-25">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    {{--                <div class="text-center w-full p-t-42 p-b-22">--}}
                    {{--						<span class="txt1">--}}
                    {{--							Or login with--}}
                    {{--						</span>--}}
                    {{--                </div>--}}

                    {{--                <a href="#" class="btn-face m-b-10">--}}
                    {{--                    <i class="fa fa-facebook-official"></i>--}}
                    {{--                    Facebook--}}
                    {{--                </a>--}}

                    {{--                <a href="#" class="btn-google m-b-10">--}}
                    {{--                    <img src="{{ asset('auth/images/icons/icon-google.png') }}"
                    alt="GOOGLE">--}}
                    {{--                    Google--}}
                    {{--                </a>--}}

                    @if (Route::has('password.request'))
                    <div class="text-center w-full">
                        <span class="txt1">
                            Mot de passe oublié?
                        </span>

                        <a class="txt1 bo1 hov1" href="{{ route('password.request') }}">
                            Cliquez ici!
                        </a>
                    </div>
                    @endif

                    <div class="text-center w-full p-t-115">
                        <span class="txt1">
                            Pas encore membre?
                        </span>

                        <a class="txt1 bo1 hov1" href="{{ route('register') }}">
                            Creer un compte ici!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/js/main.js') }}"></script>

</body>

</html>