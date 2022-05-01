@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row ">
                @hasanyrole('Admin')
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"><a href="{{ route('secretaries.index') }}">Secretaries</a></h5>
                                            <h2 class="mb-3 font-18">{{ $totalSecretary }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="{{ asset('images/schedules.png')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
                @hasanyrole('Admin|Doctor|Secretary')
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"><a href="{{ route('patients.index') }}">Patients</a> </h5>
                                            <h2 class="mb-3 font-18">{{ $patients->count() }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="{{ asset('images/patients.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endhasanyrole
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"><a href="{{ route('doctors.index') }}">Doctors</a></h5>
                                            <h2 class="mb-3 font-18">{{ $totalDoctors }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="{{ asset('images/doctors.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-statistic-4">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"><a href="{{ route('diseases.index') }}">Diseases</a></h5>
                                            <h2 class="mb-3 font-18">{{ $totalDiseases }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                        <div class="banner-img">
                                            <img src="{{ asset('images/disease.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @role('Admin')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4>Recent Patients</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover"  style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Blood Type</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Created date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->user->name }}</td>
                                                <td>{{ $patient->blood_type }}</td>
                                                <td>{{ $patient->user->email }}</td>
                                                <td>{{ $patient->user->contact_number }}</td>
                                                <td>{{ $patient->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endrole
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                        <p>Recent Schedule\s: </p>
                                        <table class="table table-striped" id="save-stage" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        #ID
                                                    </th>
                                                    <th>Doctor</th>
                                                    <th>Patient</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($schedules as $schedule)
                                                    <tr>
                                                        <td> {{ $schedule->id }} </td>
                                                        <td> {{ $schedule->doctor->user->name }}</td>
                                                        <td> {{ $schedule->name }} </td>
                                                        <td> {{ $schedule->schedule_date->format('d D M, Y') }} </td>
                                                        <td> {{ $schedule->schedule_time->format('h:m A') }}</td>
                                                        <td>
                                                            <div
                                                                class="badge badge-{{ \App\Utils\ScheduleUtil::getStatusColor($schedule->status) }} badge-shadow">
                                                                {{ $schedule->status }}
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Data</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection
