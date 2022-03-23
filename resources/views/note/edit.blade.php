@extends('layouts.markdown')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('note.update', ['note' => $note]) }}">
        @method('PUT')
        @csrf
        <div class="flex items-center mb-2">
            <div class="w-1/4">
                <label class="block text-gray-500 font-bold text-right mb-1 pr-4" for="title">
                    Title
                </label>
            </div>
            <div class="w-2/4 pr-2">
                <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-purple-500" id="title" name="title" type="text" value="{{ $note->title }}">
            </div>
            <div class="w-1/4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-x-2 h-screen">
            <div class="border">
                <textarea class="w-full h-full p-2" name="body" id="body">{!! $note->body !!}</textarea>
            </div>
            <div class="border">
                <div id="html" class="prose p-2"></div>
            </div>
        </div>
    </form>

@endsection
