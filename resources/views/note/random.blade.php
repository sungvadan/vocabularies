@extends('layouts.markdown')

@section('content')
    <textarea class="hidden" id="body">{!! $randoms !!}</textarea>
    <div class="grid grid-cols-1 gap-x-2 h-screen">
        <div class="border">
            <div id="html" class="prose p-2"></div>
        </div>
    </div>
@endsection
