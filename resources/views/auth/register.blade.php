<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BDIOACS | Register</title>
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

                <div class="card mt-5 px-5 pt-5 pb-3" style="min-width: 360px;width:450px">
                    <div class="card-header bg-transparent text-center h4 pb-3 "> <b>Create your Account</b> </div>

                    <div class="card-body px-0 pt-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="ex: John Doe" required autocomplete="name" autofocus
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="contact_number" type="text"
                                        class="form-control  @error('contact_number') is-invalid @enderror"
                                        name="contact_number" placeholder="ex: John Doe" required
                                        autocomplete="contact_number" autofocus value="{{ old('contact_number') }}">
                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="address" type="text"
                                        class="form-control  @error('address') is-invalid @enderror" name="address"
                                        placeholder="ex: San Juan City" required autocomplete="address" autofocus
                                        value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="blood_type">Blood Type</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-close"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="blood_type" type="text"
                                        class="form-control  @error('blood_type') is-invalid @enderror"
                                        name="blood_type" placeholder="ex: A" required autocomplete="blood_type"
                                        autofocus value="{{ old('blood_type') }}">
                                    @error('blood_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
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
                                    <input id="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror" name="password"
                                        placeholder="*********" required autocomplete="current-password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password_confirmation">Confirm Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-lock"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="password_confirmation" type="password" class="form-control"
                                        name="password_confirmation" placeholder="*********" required
                                        autocomplete="current-password" value="{{ old('password_confirmation') }}">

                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                Sign Up
                            </button>
                        </form>

                    </div>
                    <div class="text-center">

                        <p>Already have an account ? <a href="/">Signin Instead</a> </p>
                    </div>
                    <div
                        class="card-footer d-flex justify-content-between align-items-baseline px-0 bg-transparent pt-4">
                        <p>By clicking
                            <em>Sign Up</em> you agree to our
                            <a href="#">terms of service</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
