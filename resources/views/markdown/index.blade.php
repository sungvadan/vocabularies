<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/markdown.css')}}">
    <title>Markdown</title>
</head>
<body>
    <div class="container">
        <h1>PHP</h1>
        <button id="js-btn-preview">Preview</button>
        <button id="js-btn-editor" class="hidden">Edit</button>
        <div id="js-editor"></div>
        <div id="js-preview" class="hidden"></div>
    </div>

    <script type="application/javascript" src="{{asset('js/markdown.js')}}"></script>
    <script type="application/javascript">
        var content = "## An h2 header\n" +
            "\n" +
            "Paragraphs are separated by a blank line.\n" +
            "\n" +
            "2nd paragraph. *Italic*, **bold**, and `monospace`. Itemized lists\n" +
            "look like:\n" +
            "\n" +
            "* this one\n" +
            "* that one\n" +
            "* the other one\n" +
            "\n" +
            "> Block quotes are\n" +
            "> written like so.\n" +
            ">\n" +
            "> They can span multiple paragraphs,\n" +
            "> if you like.\n" +
            "\n" +
            "Use 3 dashes for an em-dash. Use 2 dashes for ranges (ex., \"it's all\n" +
            "in chapters 12--14\"). Three dots ... will be converted to an ellipsis.\n" +
            "Unicode is supported. ☺\n" +
            "\n" +
            "And here is a bit of code\n" +
            "\n" +
            "```php\n" +
            "<?php\n"+
"$myvar = 'Here is my code';\n"+
"echo $myvar;\n"+
"?>\n" +
            "```\n" +
            "\n" +
            "### An h3 header\n" +
            "\n" +
            "Paragraphs are separated by a blank line.\n" +
            "\n" +
            "2nd paragraph. *Italic*, **bold**, and `monospace`. Itemized lists\n" +
            "look like:\n" +
            "\n" +
            "* this one\n" +
            "* that one\n" +
            "* the other one\n" +
            "\n" +
            "> Block quotes are\n" +
            "> written like so.\n" +
            ">\n" +
            "> They can span multiple paragraphs,\n" +
            "> if you like.\n" +
            "\n" +
            "Use 3 dashes for an em-dash. Use 2 dashes for ranges (ex., \"it's all\n" +
            "in chapters 12--14\"). Three dots ... will be converted to an ellipsis.\n" +
            "Unicode is supported. ☺"

        let editor = CodeMirror(document.getElementById('js-editor'), {
            value: content,
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

