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
                <div id="slider">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                    <div>4</div>
                </div>
            </div>
            <div></div>
        </div>
    </div>
</section>
@push('scripts')
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
