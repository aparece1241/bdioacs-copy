@extends('layouts.app')
@section('content')
<section class="section">
    {{-- style="min-height:100vh; background-image: url({{ asset('images/login_bg.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center center;" --}}
        <div class="patient-navbar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/login" class="float-right btn btn-primary mr-5">Login</a>
                    <a href="/"> <img alt="image" src="{{ asset('images/logo.jpg') }}" class="patient-header-logo">
                        <span class="patient-logo-name">BDIOACS</span>
                    </a>
                </div>
            </aside>
        </div>
        <div id="carousel">
            <div class="carousel-item" data-id="1" style='display:block'><img src="{{ asset('images/doctor1.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="2"><img src="{{ asset('images/doctor2.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="3"><img src="{{ asset('images/doctor3.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="4"><img src="{{ asset('images/doctor4.avif') }}" alt=""></div>
        </div>
        <div class="row" id="patient-info-choice">
            <div class="col-md-6 patient-landing-info d-flex align-items-center justify-content-center">
                <div class="container text-start" id="left-pane">
                    <h2 style="font-size: 2.5em">Balais Bdioacs Infirmary Online Appointment and Consultation</h2>
                    <h5 style="font-weight: 100; ">Trusted to give medical advices</h5>
                    <h5 style="font-weight: 100;">Advance medical technologies</h5>
                </div>
            </div>
            <div class="col-md-6 patient-landing-info d-flex align-items-center justify-content-center">
                <div class="container text-center" id="right-pane">
                    <h4>Start your appointment now!</h4>
                    <br>
                    <br>
                    <a href="#" class="btn btn-primary w-75 mt-1">Online Appointment</a>
                    <a href="#" class="btn btn-primary w-75 mt-1">Physical Appointment</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container" id="services">
            <h3 class="text-center"><bold>Services</bold></h3>
            <br>
            <br>
            <div class="row text-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card w-75">
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card w-75">
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                        <div class="card-body">Test</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            Test
        </div>
        {{-- <div class="patient-content">
            <div class="patient-left-divide">
                <div id="carousel">
                    <div class="carousel-item" data-id="1" style='display:block'><img src="{{ asset('images/doctor1.jfif') }}" alt=""></div>
                    <div class="carousel-item" data-id="2"><img src="{{ asset('images/doctor2.jfif') }}" alt=""></div>
                    <div class="carousel-item" data-id="3"><img src="{{ asset('images/doctor3.jfif') }}" alt=""></div>
                    <div class="carousel-item" data-id="4"><img src="{{ asset('images/doctor4.avif') }}" alt=""></div>
                </div>
            </div>
            <div class="patient-right-divide">
                <div class="container text-center">
                    <div class="text-left">
                        <h2 class="card-text">Start your appointment now!</h2>
                    </div>
                    <a href="{{ route('patient-calendar') }}" class="btn btn-primary mt-5 px-4 p">Appointment</a>
                </div>
            </div>
        </div> --}}
</section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/lib/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
