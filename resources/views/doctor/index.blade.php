@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Doctors</li>
@endsection
@section('bread_crum_action')
    @role('Admin')
        <a class="btn btn-primary" href="{{ route('doctors.create') }}">Add new <i data-feather="plus"></i></a>
    @endrole
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row col-12">
                @foreach ($doctors as $doctor)
                    <div class="col col-lg-4 col-md-4 col-sm-12  col-xs-12">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img alt="image" src="{{ $doctor->user->profile ?? asset('images/user-profile.png') }}"
                                        class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name pt-3">
                                        <a href="{{ route('doctors.show', $doctor) }}">{{ $doctor->user->name }}</a>
                                    </div>
                                    <div class="author-box-job">{{ $doctor->specialized }}</div>
                                </div>

                                <div class="author-box-description text-center">
                                    <p>Contact # : {{ $doctor->user->contact_number }} </p>
                                    <p>Email: {{ $doctor->user->email }}</p>
                                </div>
                                @role('Admin')
                                    <div class="mb-2 mt-3">
                                        <a href="{{ route('doctors.edit', $doctor) }}"
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
