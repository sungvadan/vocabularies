@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3 float-left">
            <a href="#" class="btn btn-primary">Learn</a>
        </div>
        <div class="mb-3 float-right">
            <a href="{{ route('note.create') }}" class="btn btn-primary">Add note</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td class="d-flex">
                            <a class="btn btn-link" href="{{route('note.edit', ['note' => $note])}}"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('note.delete', ['note' => $note])}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link btn-delete" style="color:red;"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td><a href="{{ route('note.show', ['note' => $note]) }}">{{ $note->title }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('javascript')
    document.querySelectorAll('.btn-delete').forEach(function (btnDelete) {
        btnDelete.addEventListener('click', function (evt) {
            evt.preventDefault()
            const test = confirm("Do you really want to delete this note")
            if (test) {
                this.parentNode.submit()
            }
        })
    })
@endsection
