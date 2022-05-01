@extends('layouts.app')
@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Patients</li>
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Blood Type</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Created date</th>
                                            <th>Actions</th>
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
                                                <td>
                                                    @role('Admin')
                                                        <a href="{{ route('patients.edit', $patient) }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                        <form class="d-inline"
                                                            action="{{ route('patients.destroy', $patient) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endrole
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
