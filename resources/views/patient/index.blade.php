@extends('layouts.app')
<section class="section">
    <div id="app"
        style="min-height:100vh; background-image: url({{ asset('images/login_bg.jpg') }}); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="patient-navbar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="/"> <img alt="image" src="http://localhost:8000/images/logo.jpg" class="patient-header-logo">
                        <span class="patient-logo-name">BDIOACS</span>
                    </a>
                </div>
            </aside>
        </div>
        <div class="patient-content">
            <div>
                <div id="carousel">
                    <div class="carousel-item">1</div>
                    <div class="carousel-item">2</div>
                    <div class="carousel-item">3</div>
                    <div class="carousel-item">4</div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
