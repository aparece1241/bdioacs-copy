<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDIOACS | Login</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg')}}">
</head>

<body>
    <div id="app"
        style="min-height:100vh; background-image: url({{ asset('images/login_bg.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-strong">
            <div class="container h-100  d-flex justify-content-center  align-items-center" style="min-height:100vh;">

                <div class="card px-5 pt-5 pb-3" style="min-width: 360px;width:450px">
                    <div class="card-header bg-transparent text-center h4 pb-3 "> <b>Login to your Account</b> </div>

                    <div class="card-body px-0 pt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="example@domain.com" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="*********" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>
                            <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                Login
                            </button>
                        </form>
                    </div>
                    {{-- <div class="text-center">
                        <!-- Social register -->
                        <p>or sign in with:</p>

                        <a type="button" class="btn-floating btn-fb btn-sm">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="http://dits-corp-dev.herokuapp.com/accounts/auth/google"
                            class="btn-floating btn-tw btn-sm">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="http://dits-corp-dev.herokuapp.com/accounts/auth/linkedin"
                            class="btn-floating btn-li btn-sm">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="http://dits-corp-dev.herokuapp.com/accounts/auth/github"
                            class="btn-floating btn-git btn-sm">
                            <i class="fab fa-github"></i>
                        </a>
                    </div> --}}
                    <div
                        class="card-footer d-flex justify-content-between align-items-baseline px-0 bg-transparent pt-4">
                        <a href="{{ route('register') }}" class="btn btn-sm rounded btn-primary m-0">Create
                            Account</a>
                        <a href="http://dits-corp-dev.herokuapp.com/accounts/password/reset">Forgot Password</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
