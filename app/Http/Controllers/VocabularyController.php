<?php

namespace App\Http\Controllers;

use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VocabularyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $vocabularies = DB::table('vocabularies')
            ->where('user_id', '=', $user->id)
            ->paginate(10);

        return view('vocabulary.index', [
            'vocabularies' => $vocabularies
        ]);
    }

    public function create()
    {
        return view('vocabulary.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $payload = $request->validate([
            'word' => ['required', 'max:255', 'min:2'],
            'definition' => ['required', 'min:2']
        ]);

        $payload['user_id'] = $user->id;

        Vocabulary::create($payload);

        return redirect(route('vocabulary.index'));
    }

    public function edit(Vocabulary $vocabulary)
    {
        $this->authorize('update', $vocabulary);
        return view('vocabulary.edit', ['vocabulary' => $vocabulary]);
    }

    public function update(Request $request, Vocabulary $vocabulary)
    {
        $this->authorize('update', $vocabulary);

        $payload = $request->validate([
            'word' => ['required', 'max:255', 'min:2'],
            'definition' => ['required', 'min:2']
        ]);
        $vocabulary->update($payload);
        return redirect(route('vocabulary.index'));
    }

    public function random()
    {
        $vocabulary = DB::table('vocabularies')
            ->orderByRaw('rand()')
            ->limit(1)
            ->first();
        return view('vocabulary.random', [
            'vocabulary' => $vocabulary
        ]);
    }
}
