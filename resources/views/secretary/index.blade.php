@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Secretaries</li>
@endsection
@section('bread_crum_action')
    @role('Admin')
        <a class="btn btn-primary" href="{{ route('secretaries.create') }}">Add new <i data-feather="plus"></i></a>
    @endrole
@endsection
@section('content')
    <section class="section">
        <div class="section-body">
            {{-- TABLE/LISTED DATA DISPLAY --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Assined to</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Created date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($secretaries as $secretary)
                                            <tr>
                                                <td>{{ $secretary->user->name }}</td>
                                                <td>{{ ($secretary->doctor) ? 'Mr.'.$secretary->doctor->user->name : 'Not assigned yet' }}</td>
                                                <td>{{ $secretary->user->email }}</td>
                                                <td>{{ $secretary->user->contact_number }}</td>
                                                <td>{{ $secretary->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @role('Admin')
                                                        <a href="{{ route('secretaries.edit', $secretary) }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                        <form class="d-inline"
                                                            action="{{ route('secretaries.destroy', $secretary) }}" method="post">
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
            {{-- CARD DATA DISPALY --}}
            {{-- <div class="row col-12">
               @foreach ($secretaries as $secretary)
                    <div class="col col-lg-4 col-md-4 col-sm-12  col-xs-12">
                        <div class="card author-box">
                            <div class="card-body">
                                <div class="author-box-center">
                                    <img alt="image" src="{{ $secretary->user->profile ?? asset('images/user-profile.png') }}"
                                        class="rounded-circle author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name pt-3">
                                        <a href="{{ route('secretaries.show', $secretary) }}">{{ $secretary->user->name }}</a>
                                    </div>
                                </div>
                                <div class="author-box-description text-center">
                                    <p>Contact # : {{ $secretary->user->contact_number }} </p>
                                    <p>Email: {{ $secretary->user->email }}</p>
                                </div>
                                @role('Admin')
                                    <div class="mb-2 mt-3">
                                        <a href="{{ route('secretaries.edit', $secretary) }}"
                                            class="btn btn-block btn-primary">Update</a>
                                    </div>
                                @endrole
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
        </div>
    </section>
@endsection
