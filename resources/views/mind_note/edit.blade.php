@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('mind_note.update', ['mindNote' => $mindNote]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $mindNote->title }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file">Mind Note</label>
                <input type="file" class="form-control-file @error('file') is-invalid @enderror" id="file" name="file">
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
