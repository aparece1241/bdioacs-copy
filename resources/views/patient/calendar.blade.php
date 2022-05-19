@if (!isset(request()->type))
    <script>window.location = "/";</script>
@endif
@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
{{-- @dd(session()->all()) --}}
<div id="app">
    {{-- <div class="patient-navbar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="/login" class="float-right btn btn-primary mr-5">Login</a>
                <a href="/"> <img alt="image" src="{{ asset('images/logo.jpg') }}" class="patient-header-logo">
                    <span class="patient-logo-name">BDIOACS</span>
                </a>
            </div>
        </aside>
    </div> --}}
    <div class="patient-subheader text-center">
        <h1 class="my-5">Please select your schedule</h1>
    </div>
    {{-- @dd($errors->all()) --}}
    <div class="container">
        <div id="calendar" class="border"></div>
    </div>
    <br>
    <br>
    <br>
    <div class="container mt-5" style="margin-top: 28rem !important;display: @if(!empty($errors->all())) block @else none @endif;" id="schedule-form">
        <h5 class="text-center">Please enter info needed</h5>
        <section class="section">
            <div class="section-body">
                <div class="container">
                    <div class="card px-5 pb-3">
                        <div class="card-body px-0 pt-4">
                            <form method="POST" action="{{ route('schedules.store') }}">
                                @csrf
                                {{-- <input type="hidden" name="patient_id" value="{{ Auth::user()->patient->id }}"> --}}
                                <div class="form-group">
                                    <label for="name">Fullname</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"
                                                    aria-hidden="true"></i></span>
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
                                            autocomplete="contact_number" autofocus value="{{ old('contact_number') }}">
                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Email</label>
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
                                <div class="form-group">
                                    <label for="blood_type">Blood Type</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-medkit"
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
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" id="schedule_time" name="schedule_time" value="">
                                <input type="hidden" id="schedule_date" name="schedule_date" value="">
                                {{-- <div class="form-group">
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
                                </div> --}}
                                @if(request()->type == 'offline')
                                    <div class="form-group">
                                        <label for="temperature">Temperature(&#8451;)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-thermometer-empty"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <input id="temperature" type="number" step=".01"
                                                class="form-control  @error('temperature') is-invalid @enderror"
                                                name="temperature" required autocomplete="temperature" autofocus
                                                value="{{ old('temperature') }}">
                                            @error('temperature')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="height">Height(cm)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-male"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <input id="height" type="number" step=".01"
                                                class="form-control  @error('height') is-invalid @enderror"
                                                name="height" required autocomplete="height" autofocus
                                                value="{{ old('height') }}">
                                            @error('height')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Weight(kg)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-balance-scale"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                            <input id="weight" type="number" step=".01"
                                                class="form-control  @error('weight') is-invalid @enderror"
                                                name="weight" required autocomplete="weight" autofocus
                                                value="{{ old('weight') }}">
                                            @error('weight')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif

                                <input type="hidden" name="type" value="{{ request()->type == 'offline' ? 'physical' : 'online' }}">

                                <div class="form-group">
                                    <label for="reason">Reason of Appointment (please specified) </label>

                                    <select name="reason" id="" class="form-control @error('reason') is-invalid @enderror" autocomplete="reason">
                                        @foreach (["Check-up", "Prescription", "Test Result", "Cough", "Immunisation",
                                                   "Throath symptom/complain", "Back complaint", "Administrative procedure",
                                                   "Blood Test", "Rash"] as $reason)
                                                   @if (old('reason') == $reason)
                                                        <option value="{{$reason}}" selected>{{$reason}}</option>
                                                    @else
                                                        <option value="{{$reason}}">{{$reason}}</option>
                                                    @endif
                                        @endforeach
                                    </select>
                                    @error('reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        const schedules = {!! json_encode($schedules) !!}
    </script>
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
