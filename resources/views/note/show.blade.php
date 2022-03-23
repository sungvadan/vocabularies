@extends('layouts.markdown')

@section('content')
    <div class="flex items-center mb-2">
        <div class="w-1/4">
            <label class="block text-gray-500 font-bold text-right mb-1 pr-4" for="title">
                Title
            </label>
        </div>
        <div class="w-2/4 pr-2">
            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:border-purple-500" id="title" name="title" type="text" disabled value="{{ $note->title }}">
        </div>
    </div>

    <textarea class="hidden" id="body">{!! $note->body !!}</textarea>
    <div class="grid grid-cols-1 gap-x-2 h-screen">
        <div class="border">
            <div id="html" class="prose p-2"></div>
        </div>
    </div>
@endsection
