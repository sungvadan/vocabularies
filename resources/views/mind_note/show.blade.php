@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $mindNote->title }}</h1>
        @if ($isPdf)
            <iframe height="1140" width="1140" src="{{ asset('storage/'.$mindNote->path) }}"></iframe>
        @else
            <img class="w-100" src="{{ asset('storage/'.$mindNote->path) }}">
        @endif 
    </div>
@endsection
