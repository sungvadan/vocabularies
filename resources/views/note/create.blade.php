<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/markdown.css')}}">
    <title>Note</title>
</head>
<body>
<div class="container">
    <a href="{{ route('note.index') }}">Back</a>
    <button id="js-btn-preview">Preview</button>
    <button id="js-btn-editor" class="hidden">Edit</button>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('note.store') }}">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title">
        <div id="js-editor"></div>
        <div id="js-preview" class="hidden"></div>
        <textarea name="body" id="body" class="hidden"></textarea>
        <button type="submit">Submit</button>
    </form>
</div>

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
        document.getElementById('js-btn-preview').classList.add('hidden')
        document.getElementById('js-editor').classList.add('hidden')
        document.getElementById('js-preview').classList.remove('hidden')
        document.getElementById('js-btn-editor').classList.remove('hidden')
    })
    document.getElementById('js-btn-editor').addEventListener('click', function () {
        document.getElementById('js-btn-preview').classList.remove('hidden')
        document.getElementById('js-editor').classList.remove('hidden')
        document.getElementById('js-preview').classList.add('hidden')
        document.getElementById('js-btn-editor').classList.add('hidden')
    })
</script>
</body>
</html>

