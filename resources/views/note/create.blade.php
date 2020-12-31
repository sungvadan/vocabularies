@extends('layouts.markdown')

@section('content')
<div class="container">
    <button id="js-btn-preview" class="btn btn-outline-primary"><i class="far fa-eye"></i></button>
    <button id="js-btn-editor" class="btn btn-outline-primary d-none"><i class="far fa-edit"></i></button>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div id="js-editor"></div>
        <div id="js-preview" class="d-none"></div>
        <textarea name="body" id="body" class="d-none">{!! old('body') !!}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('javascript-section')
    <script type="application/javascript" src="{{asset('js/markdown.js')}}"></script>

    <script type="application/javascript">
        let editor = CodeMirror(document.getElementById('js-editor'), {
            value: document.getElementById('body').value,
            mode: 'markdown',
            theme: 'neo',
            lineWrapping: true,
            viewportMargin: Infinity,
            cursorBlinkRate: 0
        })
        editor.setSize('100%', '100%')
        document.getElementById('js-preview').innerHTML =  marked(editor.getValue());
        editor.on('change', function () {
            document.getElementById('js-preview').innerHTML =  marked(editor.getValue());
            document.getElementById('body').value = editor.getValue();
        })
        document.getElementById('js-btn-preview').addEventListener('click', function () {
            document.getElementById('js-btn-preview').classList.add('d-none')
            document.getElementById('js-editor').classList.add('d-none')
            document.getElementById('js-preview').classList.remove('d-none')
            document.getElementById('js-btn-editor').classList.remove('d-none')
        })
        document.getElementById('js-btn-editor').addEventListener('click', function () {
            document.getElementById('js-btn-preview').classList.remove('d-none')
            document.getElementById('js-editor').classList.remove('d-none')
            document.getElementById('js-preview').classList.add('d-none')
            document.getElementById('js-btn-editor').classList.add('d-none')
        })
    </script>
@endsection
