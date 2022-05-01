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
            <!-- NEW -->
            <div class="col col-lg-4 col-md-4 col-sm-12  col-xs-12">
                <div class="form-group">
                <label for="filter">Filter Doctor</label>
                <select onchange="filter()" class="form-control form-control-sm mb-3 w-75" name="specialized" id="specialized">
                    <option value="">All</option>
                    @foreach ($selectDropdown as $specialize)
                        @if($specialize == $specialized)
                            <option value="{{$specialize}}" selected>
                                {{ ucfirst($specialize) }}
                            </option>
                        @else
                            <option value="{{$specialize}}">
                                {{ ucfirst($specialize) }}
                            </option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
            <!-- NEW END-->
            {{-- TABLE OR LISTED DATA DISPLAY --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialization</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Created date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->user->name }}</td>
                                                <td>{{ $doctor->specialized }}</td>
                                                <td>{{ $doctor->user->email }}</td>
                                                <td>{{ $doctor->user->contact_number }}</td>
                                                <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @role('Admin')
                                                        <a href="{{ route('doctors.edit', $doctor) }}"
                                                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                                        <form class="d-inline"
                                                            action="{{ route('doctors.destroy', $doctor) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    @endrole
                                                    @role('Patient')
                                                        <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-sm btn-info"><i
                                                            class="fa fa-eye"></i></a>
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
            {{-- CARD DATA DISPLAY --}}
            {{-- <div class="row col-12">
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
                                    <div class="author-box-job">{{ ucfirst($doctor->specialized) }}</div>
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
            </div> --}}
        </div>
        </div>
    </section>
@endsection

<script>
    function filter() {
        let val = document.getElementById('specialized').value;

        if (!val) {
            window.location.href = `${location.origin}/doctors`
            return;
        }

        let uri = `${location.origin}/doctors?specialized=${val}`
        window.location.href = uri;
    }
</script>
