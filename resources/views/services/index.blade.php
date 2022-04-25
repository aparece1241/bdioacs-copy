@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Services</li>
@endsection
@section('bread_crum_action')
    @role('Admin')
        <a class="btn btn-primary" href="{{ route('services.create') }}">Add new <i data-feather="plus"></i></a>
    @endrole
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row col-12">
               @foreach ($services as $service)
                    <div class="col col-lg-4 col-md-4 col-sm-12  col-xs-12">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img alt="image" src="{{ asset('images/service.png') }}"
                                        class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name pt-3">
                                        <a href="{{ route('services.show', $service) }}">{{ $service->service }}</a>
                                    </div>
                                </div>
                                <div class="author-box-description text-center">
                                    <p>Service Type: {{ $service->service_type }} </p>
                                    <p>Department: {{ $service->department }}</p>
                                </div>
                                <div class="author-box-description text-center">
                                    <p>Fee: <b>₱ {{ $service->fee }} </b> </p>
                                    <p>Minimum Professional Fee: <b>₱ {{ $service->professional_fee_min }}</b></p>
                                    <p>Maximum Professional Fee: <b>₱ {{ $service->professional_fee_max }}</b></p>
                                </div>
                                @role('Admin')
                                    <div class="mb-2 mt-3">
                                        <a href="{{ route('services.edit', $service) }}"
                                            class="btn btn-block btn-primary">Update</a>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
