@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3 float-left">
            <a href="{{ route('vocabulary.random') }}" class="btn btn-primary">Learn</a>
        </div>
        <div class="mb-3 float-right">
            <a href="{{ route('vocabulary.create') }}" class="btn btn-primary">Add word</a>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Word</th>
                    <th scope="col">Definition</th>
                    <th scope="col">Language</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vocabularies as $vocabulary)
                    <tr>
                        <td class="d-flex">
                            <a class="btn btn-link" href="{{route('vocabulary.edit', ['vocabulary' => $vocabulary->id])}}"><i class="far fa-edit"></i></a>
                            <form method="POST" action="{{ route('vocabulary.delete', ['vocabulary' => $vocabulary->id])}}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link btn-delete" style="color:red;"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                        <td>{{ $vocabulary->word }}</td>
                        <td>{!! nl2br(e($vocabulary->definition)) !!}</td>
                        <td>{{ $vocabulary->language->language }}</td>
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
            const test = confirm("Do you really want to delete this word")
            if (test) {
                this.parentNode.submit()
            }
        })
    })
@endsection
