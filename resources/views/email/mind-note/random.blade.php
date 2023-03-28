<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mind Note</title>
</head>
<body>
<h1>{{ $mindNote->title }}</h1>

@if (!$isPdf)
    <img src="{{ $message->embed(public_path('storage/'.$mindNote->path)) }}">
@endif
</body>
</html>
