@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item "><a href="{{ route('doctors.index') }}">Doctors</a></li>
    <li class="breadcrumb-item active" aria-current="page">Book schedule</li>
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="container">
                <div class="card px-5 pb-3">
                    <div class="card-body px-0 pt-4">
                        <form method="POST" action="{{ route('doctors.schedules.store', $doctor) }}">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ Auth::user()->patient->id }}">
                            <div class="form-group">
                                <label for="name">Fullname</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="ex: John Doe" required autocomplete="name" autofocus
                                        value="{{ old('name') ?? Auth::user()->name  }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option value="0">Male</option>
                                        <option value="1">Female</option>
                                    </select>
                                    @error('gender')
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
                                        autocomplete="contact_number" autofocus value="{{ old('contact_number') ?? Auth::user()->contact_number }}">
                                    @error('contact_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date Of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="dob" type="date" format="dd-mm-yyyy"
                                        class="form-control  @error('dob') is-invalid @enderror" name="dob" required
                                        autocomplete="dob" autofocus value="{{ old('dob') }}">
                                    @error('dob')
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
                                        value="{{ old('address') ?? Auth::user()->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="schedule_date">Schedule Date</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="schedule_date" type="date" format="dd-mm-yyyy"
                                        class="form-control  @error('schedule_date') is-invalid @enderror"
                                        name="schedule_date" required autocomplete="schedule_date" autofocus
                                        value="{{ old('schedule_date') }}">
                                    @error('schedule_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="schedule_time">Schedule Time</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-clock"
                                                aria-hidden="true"></i></span>
                                    </div>
                                    <input id="schedule_time" type="time"
                                        class="form-control  @error('schedule_time') is-invalid @enderror"
                                        name="schedule_time" required autocomplete="schedule_time" autofocus
                                        value="{{ old('schedule_time') }}">
                                    @error('schedule_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reason">Reason of Appointment (please specified) </label>

                                <textarea id="reason" type="time"
                                    class="form-control  @error('reason') is-invalid @enderror" name="reason" required
                                    autocomplete="reason" autofocus>{{ old('reason') }}</textarea>
                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
