<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/markdown.css')}}">
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <title>Note</title>
</head>
<body>
<div id="app">
    <x-header />
    <main class="py-4">
        @yield('content')
    </main>
</div>
@yield('javascript-section')
</body>
</html>
