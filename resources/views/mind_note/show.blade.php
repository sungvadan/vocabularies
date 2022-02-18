@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $mindNote->title }}</h1>
        <img class="w-100" src="{{ asset($mindNote->path) }}">
    </div>
@endsection
