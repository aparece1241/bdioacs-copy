@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Schedules</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #ID
                                            </th>
                                            <th>Doctor</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schedules as $schedule)
                                            <tr>
                                                <td> {{ $schedule->id }} </td>
                                                <td> {{ $schedule->doctor->user->name }} </td>
                                                <td> {{ $schedule->schedule_date->format('d D M, Y') }} </td>
                                                <td> {{ $schedule->schedule_time->format('h:m A') }}</td>
                                                <td>
                                                    <div
                                                        class="badge badge-{{ \App\Utils\ScheduleUtil::getStatusColor($schedule->status) }} badge-shadow">
                                                        {{ $schedule->status }}
                                                    </div>
                                                </td>
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
