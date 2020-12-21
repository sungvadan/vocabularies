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
                </tr>
            </thead>
            <tbody>
                @foreach($vocabularies as $vocabulary)
                    <tr>
                        <td>
                            <a href="{{route('vocabulary.edit', ['vocabulary' => $vocabulary->id])}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                        </td>
                        <td>{{ $vocabulary->word }}</td>
                        <td>{!! nl2br(e($vocabulary->definition)) !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vocabularies->onEachSide(2)->links() }}

    </div>
@endsection
