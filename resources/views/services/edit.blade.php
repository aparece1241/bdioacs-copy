@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection


@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="service">Service/Package</label>

                            <input id="service" type="text" class="form-control @error('service') is-invalid @enderror"
                                name="service" required autocomplete="name" autofocus value="{{ old('service') }}" placeholder="Service/Package">
                            @error('service')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="service_type">Service Type</label>

                            <select id="service_type" type="text" class="form-control @error('service_type') is-invalid @enderror"
                                name="service_type" required autocomplete="name" autofocus value="{{ old('service_type') }}">
                                <option value="">Service Type</option>
                                <option value="Other Administrative Service">Other Administrative Service</option>
                                <option value="Auxiliary Service">Auxiliary Service</option>
                            </select>
                            @error('service_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Department">Department</label>

                            <select id="department" type="text" class="form-control @error('department') is-invalid @enderror"
                                name="department" required autocomplete="name" autofocus value="{{ old('department') }}">
                                <option value="">Department</option>
                                <option value="Medical Supplies">Medical Supplies</option>
                                <option value="Laboratory">Laboratory</option>
                            </select>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Fee">Fee</label>

                            <input id="fee" type="int" step="0.01" class="form-control @error('fee') is-invalid @enderror"
                                name="fee" required autocomplete="name" autofocus value="{{ old('fee') }}" placeholder="Fee">
                            @error('fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Professional Fee Minimum">Professional Fee Minimum</label>

                            <input id="professional_fee_min" type="int" step="0.01" class="form-control @error('professional_fee_min') is-invalid @enderror"
                                name="professional_fee_min" required autocomplete="name" autofocus value="{{ old('professional_fee_min') }}" placeholder="Professional Fee Minimum">
                            @error('professional_fee_min')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Professional Fee Maximum">Professional Fee Maximum</label>

                            <input id="professional_fee_max" type="int" step="0.01" class="form-control @error('professional_fee_max') is-invalid @enderror"
                                name="professional_fee_max" required autocomplete="name" autofocus value="{{ old('professional_fee_max') }}" placeholder="Professional Fee Maximum">
                            @error('professional_fee_max')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
