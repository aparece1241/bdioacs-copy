@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item "><a href="{{ route('doctors.index') }}">Doctors</a></li>
    <li class="breadcrumb-item active" aria-current="page">Profile</li>
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-3 text-center">
                        <img width="150px" height="150px" class="rounded-circle"
                            src="{{ $doctor->user->profile ?? asset('images/user-profile.png') }}" alt="Profile">
                    </div>
                    <div class="col-md-9">
                        <h5>{{ $doctor->user->name }}</h5>
                        <p class="mb-0"><strong>Specialized In:</strong> {{ $doctor->specialized }}</p>
                        <p class="mt-0"><strong>Address:</strong> {{ $doctor->user->address }}</p>
                        @role('Patient')
                            <a href="{{ route('doctors.schedules.create', $doctor) }}?is-physical=0" class="btn btn-primary">Online Schedule</a>
                            <a href="{{ route('doctors.schedules.create', $doctor) }}?is-physical=1" class="btn btn-primary">Physical Schedule</a>
                        @endrole
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header pt-4">
                                <h6>Schedules</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                        </tr>
                                        <tbody>
                                            @foreach ($week as $key => $day)
                                                <tr>
                                                    <td>{{ $day->format('M d, Y (D)') }}</td>
                                                    <td>{{ $doctor->schedule ? ($doctor->schedule[$key] == ""? 'Not Set' : ucfirst($doctor->schedule[$key])) : 'Not Set' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="body">
                                <div id="plist" class="people-list">
                                    <div class="chat-search pt-3 pb-2">
                                        <h6>Feedbacks</h6>
                                    </div>
                                    <div class="m-b-20">
                                        <div id="chat-scroll" >
                                            <ul class="chat-list list-unstyled m-b-0" >
                                                @foreach ($doctor->feedbacks as $feedback)
                                                    <li>
                                                        <div class="clearfix active">
                                                            <img src="{{ $feedback->user->profile ?? asset('images/user-profile.png') }}"
                                                                alt="avatar">
                                                            <div class="about">
                                                                <div class="name">{{ $feedback->user->name }}
                                                                </div>
                                                                <div class="status">
                                                                    <i
                                                                        class="material-icons offline">fiber_manual_record</i>
                                                                    created at
                                                                    {{ $feedback->created_at->diffForHumans() }}
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <p class="mt-2">{{ $feedback->content }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('doctors.feedback.store', $doctor) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <label for="content" class="font-weight-bold">Add Feedback</label>
                                    <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
                                    <div class="text-right mt-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
