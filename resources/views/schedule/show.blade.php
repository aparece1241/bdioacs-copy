@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('users.profile', Auth::user()) }}">Schedules</a></li>
    <li class="breadcrumb-item active" aria-current="page">Details</li>
@endsection
@section('bread_crum_action')
@if ($schedule->type == 'online')
    @role('Doctor')
    <a class="btn btn-primary" href="{{ route('meetings.create', [(!Auth::user()->doctor?Auth::user()->secretary->doctor:Auth::user()->doctor), $schedule]) }}">Start meeting <i
            data-feather="video"></i></a>
    @endrole
    @role('Secretary')
    <a class="btn btn-primary" href="{{ route('meetings.create', [(!Auth::user()->doctor?Auth::user()->secretary->doctor:Auth::user()->doctor), $schedule]) }}">Start meeting <i
            data-feather="video"></i></a>
    @endrole
@endif
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card px-5 pb-3">
                <div class="card-body px-0 pt-4">
                    <div class="form-group">
                        <label for="name">Patient Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control" readonly value="{{ $schedule->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                            <select class="form-control" disabled>
                                <option value="0" @if ($schedule->gender === 0) selected @endif>Male</option>
                                <option value="1" @if ($schedule->gender === 1) selected @endif>Female</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            </div>
                            <input id="contact_number" type="text" class="form-control" readonly
                                value="{{ $schedule->contact_number }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <input id="dob" type="date" class="form-control" readonly value="{{ $schedule->dob }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-home" aria-hidden="true"></i></span>
                            </div>
                            <input id="address" type="text" class="form-control" readonly
                                value="{{ $schedule->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="schedule_date">Schedule Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            </div>
                            <input id="schedule_date" type="date" class="form-control" readonly
                                value="{{ $schedule->schedule_date->format('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schedule_time">Schedule Time</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-clock" aria-hidden="true"></i></span>
                            </div>
                            <input id="schedule_time" type="time" class="form-control" readonly
                                value="{{ $schedule->schedule_time->format('h:m') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reason">Reason of Appointment</label>
                        <textarea id="reason" type="time" class="form-control"
                            readonly>{{ $schedule->reason }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
