@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('diseases.index') }}">Diseases</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
@endsection


@section('content')
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('doctors.diseases.store', $doctor) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>

                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" required autocomplete="name" autofocus value="{{ old('title') }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                accept="image/*" value="{{ old('image') }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote-simple @error('content') is-invalid @enderror" name="content">
                                {{ old('content') }}
                            </textarea>
                            @error('content')
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
