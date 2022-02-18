@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3 float-left">

        </div>
        <div class="mb-3 float-left">
            <a href="{{ route('mind_note.create') }}" class="btn btn-primary">Add Mind Note</a>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mind note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mindNotes as $mindNote)
                    <tr>
                        <td>
                            <form method="POST" action="{{ route('mind_note.delete', ['mindNote' =>$mindNote])}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link btn-delete" style="color:red;"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{ route('mind_note.show', ['mindNote' => $mindNote]) }}">{{ $mindNote->title }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
