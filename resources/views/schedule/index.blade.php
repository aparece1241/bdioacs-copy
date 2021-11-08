@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Schedules</li>
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
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
                                        @foreach ($schedules as $schedule)
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
                                                {{-- <td class="d-flex flex-row">
                                                    <a href="{{ route('schedules.show', $schedule) }}"
                                                        class="btn btn-sm btn-primary mr-2">Detail</a>
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

                                                </td> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
