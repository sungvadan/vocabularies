@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('vocabulary.update', ['vocabulary' => $vocabulary->id]) }}">
            @csrf

            @method('PUT')
            <div class="mb-3">
                <label for="word" class="form-label">Word</label>
                <input id="word" name="word" class="form-control @error('word') is-invalid @enderror" value="{{ old('word') ?? $vocabulary->word }}">
                @error('word')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="definition">Definition</label>
                <textarea name="definition" id="definition" rows="10" class="form-control @error('definition') is-invalid @enderror">{{ old('definition') ?? $vocabulary->definition }}</textarea>
                @error('definition')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
