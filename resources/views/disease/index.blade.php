@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item active" aria-current="page">Diseases</li>
@endsection
@section('bread_crum_action')
    @role('Doctor')
        <a class="btn btn-primary" href="{{ route('doctors.diseases.create', Auth::user()->doctor) }}">Add new <i
                data-feather="plus"></i>
        </a>
    @endrole
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                @foreach ($diseases as $disease)
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ $disease->image }}">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-title">
                                    <h2><a href="{{ route('diseases.show', $disease) }}">{{ $disease->title }}</a></h2>
                                </div>
                                <div class="article-user">
                                    <img alt="image" src="{{ $disease->doctor->user->profile ?? asset('images/user-profile.png') }}">
                                    <div class="article-user-details">
                                        <div class="user-detail-name">
                                            <a
                                                href="{{ route('doctors.show', $disease->doctor) }}">{{ $disease->doctor->user->name }}</a>
                                        </div>
                                        <div class="text-job">{{ $disease->doctor->specialized }}</div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
