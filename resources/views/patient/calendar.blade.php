@extends('layouts.app')
@section('content')
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
        <h1>Please select your schedule</h1>
    </div>

    <div class="container">
        <div id="calendar" class="border"></div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        const schedules = {!! json_encode($schedules) !!}
    </script>
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
