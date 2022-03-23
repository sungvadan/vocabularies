<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
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


@section('javascript-section')
    <script type="application/javascript" src="{{asset('js/axios.js')}}"></script>
    <script>
        let markdown = ''
        let convert = async () => {
            let currentMarkdown = document.querySelector('#body').value
            if (currentMarkdown !== markdown) {
                markdown = currentMarkdown
                const response = await axios.post('/markdown-to-html', { markdown })
                document.querySelector('#html').innerHTML = response.data
            }
        }

        let init = () => {
            setInterval(convert, 1000)
        }

        function enableTab(id) {
            var el = document.getElementById(id);
            el.onkeydown = function(e) {
                if (e.code === 'Tab') { // tab was pressed

                    // get caret position/selection
                    var val = this.value,
                        start = this.selectionStart,
                        end = this.selectionEnd;

                    // set textarea value to: text before caret + tab + text after caret
                    this.value = val.substring(0, start) + '\t' + val.substring(end);

                    // put caret at right position again
                    this.selectionStart = this.selectionEnd = start + 1;

                    // prevent the focus lose
                    return false;

                }
            };
        }


        init()
        enableTab('body')
    </script>
@stop

@yield('javascript-section')
</body>
</html>
