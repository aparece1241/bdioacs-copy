@extends('layouts.app')
<section class="section">
    {{-- style="min-height:100vh; background-image: url({{ asset('images/login_bg.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center center;" --}}
    <div id="app">
        <div class="patient-navbar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/"> <img alt="image" src="{{ asset('images/logo.jpg') }}" class="patient-header-logo">
                        <span class="patient-logo-name">BDIOACS</span>
                    </a>
                </div>
            </aside>
        </div>
        <div class="patient-subheader">
            <h1>BALAIS BDIOACS INFIRMARY ONLINE APPOINTMENT AND CONSULTATION</h1>
        </div>
        <div class="patient-content">
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
                    <a href="http://" class="btn btn-primary mt-5 px-4 p">Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{ asset('assets/js/lib/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
