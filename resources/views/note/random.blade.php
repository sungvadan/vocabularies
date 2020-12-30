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
        <div id="js-preview"></div>
        <textarea id="body" class="hidden">{!! $randoms !!}</textarea>
</div>

<script type="application/javascript" src="{{asset('js/markdown.js')}}"></script>
<script type="application/javascript">
    document.getElementById('js-preview').innerHTML =  marked(document.getElementById('body').value);
</script>
</body>
</html>

