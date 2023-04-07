@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                {{$vocabulary->word}}
            </div>
            <div class="card-body">
                <p id="js-loading-result">Result in <span>5</span></p>
                <p class="d-none" id="js-definition">
                    {{$vocabulary->definition}}
                    <br/>
                    <br/>
                    <br/>
                    @if ($vocabulary->image_path)
                        <img class="w-50" src="{{ asset('storage/'.$vocabulary->image_path) }}">
                    @endif
                </p>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" id="js-show">Show</button>
                <a href="{{ route('vocabulary.random') }}" class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    let countdown = 5
    const timerInterval = setInterval(() => {
        if (countdown > 0) {
            countdown--
        }
        document.querySelector('#js-loading-result span').innerHTML = countdown
    }, 1000)

    document.getElementById('js-show').addEventListener('click', () => {
        show()
    })

    setTimeout( show, 5000)

    function show() {
        clearInterval(timerInterval)
        document.querySelector('#js-loading-result').innerHTML = ''
        document.getElementById('js-definition').classList.remove('d-none')
    }

    document.addEventListener('keydown', (e) => {
        switch (e.code) {
            case 'Space' :
                show();
                break;
            case 'ArrowRight' :
                window.location.href = "{{ route('vocabulary.random') }}"
                break;
        }
    })



@endsection
