@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Schedules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="meetings-tab" data-toggle="tab" href="#meetings" role="tab"
                                aria-controls="meetings" aria-selected="false">Meetings</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active pt-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h4>Basic information</h4>
                            <form method="POST" action="{{ route('users.update', Auth::user()) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="ex: John Doe" required autocomplete="name" autofocus
                                            value="{{ old('name') ?? $user->name }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profile">Profile</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                            name="profile" accept="image/*" value="{{ old('profile') }}">
                                        @error('profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-phone"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="contact_number" type="text"
                                            class="form-control  @error('contact_number') is-invalid @enderror"
                                            name="contact_number" placeholder="ex: John Doe" required
                                            autocomplete="contact_number" autofocus
                                            value="{{ old('contact_number') ?? $user->contact_number }}">
                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-home"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="address" type="text"
                                            class="form-control  @error('address') is-invalid @enderror" name="address"
                                            placeholder="ex: San Juan City" required autocomplete="address" autofocus
                                            value="{{ old('address') ?? $user->address }}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @role('Patient')
                                    <div class="form-group">
                                        <label for="blood_type">Blood Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="git-branch"></i></span>
                                            </div>
                                            <input id="blood_type" type="text"
                                                class="form-control  @error('blood_type') is-invalid @enderror"
                                                name="blood_type" placeholder="ex: A" required autocomplete="blood_type"
                                                autofocus value="{{ old('blood_type') ?? $user->patient->blood_type }}">
                                            @error('blood_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endrole
                                @role('Doctor')
                                    <div class="form-group">
                                        <label for="specialized">Specialized</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i data-feather="git-merge"></i></span>
                                            </div>
                                            <input id="specialized" type="text"
                                                class="form-control  @error('specialized') is-invalid @enderror"
                                                name="specialized" placeholder="ex: A" required autocomplete="specialized"
                                                autofocus value="{{ old('specialized') ?? $user->doctor->specialized }}">
                                            @error('specialized')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endrole
                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-envelope"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="email" type="email"
                                            class="form-control  @error('email') is-invalid @enderror" name="email"
                                            placeholder="example@domain.com" value="{{ old('email') ?? $user->email }}"
                                            required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                    Update
                                </button>
                            </form>
                            <h4 class="mt-4">Change password</h4>
                            <form action="{{ route('users.update-password', Auth::user()) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group ">
                                    <label for="password">Current</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control  @error('password') is-invalid @enderror" name="password"
                                            placeholder="*********" autocomplete="password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="new_password">New</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="new_password" type="password"
                                            class="form-control  @error('new_password') is-invalid @enderror"
                                            name="new_password" placeholder="*********" autocomplete="new_password"
                                            value="{{ old('new_password') }}">
                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                        <input id="new_password_confirmation" type="password" class="form-control"
                                            name="new_password_confirmation" placeholder="*********"
                                            autocomplete="current-password"
                                            value="{{ old('new_password_confirmation') }}">
                                        @error('new_password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary darken-3 rounded  btn-block mt-4">
                                    Change
                                </button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive">
                                <table class="table table-striped" style="width:100%;">
                                    <thead>
                                        <tr style="width: 100%">
                                            <th class="text-center">#ID</th>
                                            @role('Patient')
                                                <th>Doctor</th>
                                            @else
                                                <th>Patient</th>
                                            @endrole
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            @role('Doctor')
                                                <th>Actions</th>
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $schedule)
                                            <tr>
                                                <td> {{ $schedule->id }} </td>
                                                @role('Patient')
                                                    <td> {{ $schedule->doctor->user->name }} </td>
                                                @else
                                                    <td> {{ $schedule->patient->user->name }} </td>
                                                @endrole
                                                <td> {{ $schedule->schedule_date->format('d D M, Y') }} </td>
                                                <td> {{ $schedule->schedule_time->format('h:m A') }}</td>
                                                <td>
                                                    <div
                                                        class="badge badge-{{ \App\Utils\ScheduleUtil::getStatusColor($schedule->status) }} badge-shadow">
                                                        {{ $schedule->status }}
                                                    </div>
                                                </td>
                                                @role('Doctor')
                                                    <td class="d-flex align-items-center">
                                                        <form action="#">
                                                            <a href="{{ route('schedules.show', $schedule) }}"
                                                                class="btn btn-sm btn-primary mr-2">Detail</a>
                                                        </form>
                                                        @if ($schedule->status === \App\Models\Schedule::PENDING)
                                                            <form action="{{ route('schedules.accept', $schedule) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-success mr-2">Accept</button>
                                                            </form>
                                                            <form action="{{ route('schedules.decline', $schedule) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger">Decline</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                @endrole
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="meetings" role="tabpanel" aria-labelledby="meetings-tab">
                            <div class="row">
                                @foreach ($meetings as $meeting)
                                    <div class="col-md-4">
                                        <div class="card card-primary">
                                            <div class="card-header text-title">
                                                {{ $meeting->subject }}
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Schedule: </strong>
                                                    {{ $meeting->schedule->format('d D M, Y h:m A') }}</p>
                                                <p><strong>Room:</strong> {{ $meeting->room }}</p>
                                                <p><strong>Password:</strong> {{ $meeting->password }}</p>
                                                <a href="{{ route('meetings.show', $meeting) }}"
                                                    class="btn btn-primary btn-block">Join</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
