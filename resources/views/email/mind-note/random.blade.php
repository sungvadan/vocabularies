<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mind Note</title>
</head>
<body>
<h1>{{ $mindNote->title }}</h1>

<img src="{{ $message->embed(public_path($mindNote->path)) }}">
</body>
</html>
