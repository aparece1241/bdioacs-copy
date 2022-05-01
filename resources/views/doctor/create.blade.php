@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item "><a href="{{ route('doctors.index') }}">Doctors</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection
@section('content')
    <div class="container">
        <div class="card px-5 pb-3">
            <div class="card-body px-0 pt-4">
                <form method="POST" action="{{ route('doctors.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="ex: John Doe" required autocomplete="name" autofocus
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
                                <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            </div>
                            <input id="contact_number" type="text"
                                class="form-control  @error('contact_number') is-invalid @enderror" name="contact_number"
                                placeholder="ex: 09xxxxxxxxx" required autocomplete="contact_number" autofocus
                                value="{{ old('contact_number') }}">
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
                                value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="specialized">Specialized</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-close" aria-hidden="true"></i></span>
                            </div>
                            <select id="specialized" type="text"
                                class="form-control  @error('specialized') is-invalid @enderror" name="specialized"
                                placeholder="ex: Surgery" required autocomplete="specialized" autofocus
                                value="{{ old('specialized') }}">
                                @foreach (["Emergency Medicine", "Anesthesiologist", "Surgeon", "Orthodologist"] as $specialized)
                                    @if (old('specialized') == $specialized)
                                        <option value="{{$specialized}}" selected>{{$specialized}}</option>
                                    @else
                                        <option value="{{$specialized}}">{{$specialized}}</option>
                                @endforeach
                            </select>
                            @error('specialized')
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
                                name="email" placeholder="example@domain.com" value="{{ old('email') }}" required
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
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
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
                                <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                            </div>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation" placeholder="*********" required
                                autocomplete="current-password" value="{{ old('password_confirmation') }}">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                        Create
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
