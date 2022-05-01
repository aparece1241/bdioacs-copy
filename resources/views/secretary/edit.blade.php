@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item "><a href="{{ route('secretaries.index') }}">Secretaries</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section('content')
    <div class="container">
        <div class="card px-5 pb-3">
            <div class="card-body px-0 pt-4">
                <h4>Basic information</h4>
                <form method="POST" action="{{ route('secretaries.update', $secretary) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="email">Assign to</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Not yet assigned" required autocomplete="name" autofocus
                                value="{{ ($secretary->doctor) ? $secretary->doctor->user->name : 'Not yet assigned' }}" readonly>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="ex: John Doe" required autocomplete="name" autofocus
                                value="{{ $secretary->user->name }}">
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
                                <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            </div>
                            <input id="contact_number" type="text"
                                class="form-control  @error('contact_number') is-invalid @enderror" name="contact_number"
                                placeholder="ex: John Doe" required autocomplete="contact_number" autofocus
                                value="{{ $secretary->user->contact_number }}">
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
                                <span class="input-group-text"><i class="fa fa-home" aria-hidden="true"></i></span>
                            </div>
                            <input id="address" type="text" class="form-control  @error('address') is-invalid @enderror"
                                name="address" placeholder="ex: San Juan City" required autocomplete="address" autofocus
                                value="{{ $secretary->user->address }}">
                            @error('address')
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
                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror"
                                name="email" placeholder="example@domain.com" value="{{ $secretary->user->email }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                        Update
                    </button>
                </form>
                <h4 class="mt-4">Change password</h4>
                <form action="{{ route('users.update-password', Auth::user()) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="password">Current</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                            <input id="password" type="password"
                                class="form-control  @error('password') is-invalid @enderror" name="password"
                                placeholder="*********" autocomplete="password" value="{{ old('password') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="new_password">New</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                            <input id="new_password" type="password"
                                class="form-control  @error('new_password') is-invalid @enderror" name="new_password"
                                placeholder="*********" autocomplete="new_password" value="{{ old('new_password') }}">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                            <input id="new_password_confirmation" type="password" class="form-control"
                                name="new_password_confirmation" placeholder="*********" autocomplete="current-password"
                                value="{{ old('new_password_confirmation') }}">
                            @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                        Change
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
