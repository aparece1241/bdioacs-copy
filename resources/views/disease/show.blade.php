@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item " aria-current="page"><a href="{{ route('diseases.index') }}">Diseases</a> </li>
    <li class="breadcrumb-item active" aria-current="page">{{ $disease->title }}</li>
@endsection
@section('bread_crum_action')
    @hasanyrole(['Admin|Doctor'])
        <a class="btn btn-primary" href="{{ route('diseases.edit', $disease) }}">Edit <i data-feather="edit-2"
                data-size="1px"></i>
        </a>
    @endhasanyrole
@endsection


@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header pt-3 d-block">
                    <h3>{{ $disease->title }}</h3>
                    <img src="{{ $disease->image }}" alt="Disease image" width="100%">
                </div>
                <div class="card-body">

                    {!! $disease->content !!}
                </div>
            </div>

        </div>
    </section>
@endsection
