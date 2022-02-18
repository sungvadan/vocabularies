@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('mind_note.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file">Mind Note</label>
                <input type="file" class="form-control-file" id="file" name="file">
                @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
