@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('doctors.index') }}">Doctors</a></li>
    <li class="breadcrumb-item"><a href="{{ route('doctors.show', $doctor) }}">{{ $doctor->user->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create meeting</li>
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('meetings.store', $doctor) }}">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $schedule->patient_id }}">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                                    name="subject" required autocomplete="subject" autofocus
                                    value="{{ old('subject') ?? $schedule->name . ' and ' . $schedule->doctor->user->name . ' meeting.' }}">
                                @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="room">Room</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror"
                                    name="room" required autocomplete="room" autofocus
                                    value="{{ old('room') ?? Str::random(20) }}" readonly>
                                @error('room')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input id="password" type="text"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autofocus value="{{ old('password') ?? Str::random(20) }}" readonly>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="schedule">Schedule</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                                </div>
                                <input id="schedule" type="datetime-local"
                                    class="form-control @error('schedule') is-invalid @enderror" name="schedule" required
                                    autofocus />
                                @error('schedule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                            Create
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
