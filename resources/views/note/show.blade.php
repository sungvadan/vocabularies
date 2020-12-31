@extends('layouts.markdown')

@section('content')
    <div class="container">
        <h1>{{ $note->title }}</h1>
        <div id="js-preview"></div>
        <textarea id="body" class="d-none">{!! $note->body !!}</textarea>
    </div>
@endsection

@section('javascript-section')
    <script type="application/javascript" src="{{asset('js/markdown.js')}}"></script>

    <script type="application/javascript">
        document.getElementById('js-preview').innerHTML =  marked(document.getElementById('body').value);
    </script>
@endsection


