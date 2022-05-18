@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/patient.css') }}">
@endpush
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
        {{-- <div id="carousel-w">
            <div class="carousel-item" data-id="1" style='display:block'><img src="{{ asset('images/doctor1.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="2"><img src="{{ asset('images/doctor2.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="3"><img src="{{ asset('images/doctor3.jfif') }}" alt=""></div>
            <div class="carousel-item" data-id="4"><img src="{{ asset('images/doctor4.avif') }}" alt=""></div>
        </div> --}}
        <div id="background">
            <img src="{{ asset('images/bg-1.jpeg') }}" alt="background image">
        </div>
        <div class="row" id="patient-info-choice">
            <div class="col-md-6 patient-landing-info d-flex align-items-center justify-content-center">
                <div class="container text-start" id="left-pane">
                    <h2 style="font-size: 2.5em">Balais Bdioacs Infirmary Online Appointment and Consultation</h2>
                    <h5 style="font-weight: 100; ">Trusted to give medical advices</h5>
                    <h5 style="font-weight: 100;">Advance medical technologies</h5>
                    <div id="carousel">
                        <div class="carousel-item" data-id="1" style='display:block'><img src="{{ asset('images/doctor1.jfif') }}" alt=""></div>
                        <div class="carousel-item" data-id="2"><img src="{{ asset('images/doctor2.jfif') }}" alt=""></div>
                        <div class="carousel-item" data-id="3"><img src="{{ asset('images/doctor3.jfif') }}" alt=""></div>
                        <div class="carousel-item" data-id="4"><img src="{{ asset('images/doctor4.avif') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 patient-landing-info d-flex align-items-center justify-content-center">
                <div class="container text-center" id="right-pane">
                    <h4>Start your appointment now!</h4>
                    <br>
                    <br>
                    <a href="{{ route('patient-calendar').'?type=online' }}" class="btn btn-primary w-75 mt-1">Online Appointment</a>
                    <a href="{{ route('patient-calendar').'?type=physical' }}" class="btn btn-primary w-75 mt-1">Physical Appointment</a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="container" id="services">
            <h3 class="text-center">Services</h3>
            <br>
            <br>
            <div class="row text-center">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card w-75">
                        <div class="text-center pt-4">
                            <h5>Online Consultation</h5>
                        </div>
                        <div class="card-body text-justify">
                            <hr>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos mollitia voluptate fuga laborum quis ipsa, voluptatum quae, aut sed sunt nulla obcaecati molestiae, atque alias dolor nesciunt praesentium maiores illo.</p>
                            <div class="container text-center">
                                <a href="" class="btn btn-primary">Appointment now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="card w-75">
                        <div class="text-center pt-4">
                            <h5>Physical Consultation</h5>
                        </div>
                        <div class="card-body text-justify">
                            <hr>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos mollitia voluptate fuga laborum quis ipsa, voluptatum quae, aut sed sunt nulla obcaecati molestiae, atque alias dolor nesciunt praesentium maiores illo.</p>
                            <div class="container text-center">
                                <a href="" class="btn btn-primary">Appointment now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container p-5">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium officiis numquam nulla nihil, quaerat id fugit ducimus reiciendis aut at dolore, quia ad nobis! Iure delectus praesentium commodi tempore eum!</li>
                            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium officiis numquam nulla nihil, quaerat id fugit ducimus reiciendis aut at dolore, quia ad nobis! Iure delectus praesentium commodi tempore eum!</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium officiis numquam nulla nihil, quaerat id fugit ducimus reiciendis aut at dolore, quia ad nobis! Iure delectus praesentium commodi tempore eum!</li>
                            <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium officiis numquam nulla nihil, quaerat id fugit ducimus reiciendis aut at dolore, quia ad nobis! Iure delectus praesentium commodi tempore eum!</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/lib/carousel.js') }}"></script>
    <script src="{{ asset('assets/js/page/patient.js') }}"></script>
@endpush
