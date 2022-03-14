<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VocabularyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $vocabularies = Vocabulary::where('user_id', $user->id)->get();

        return view('vocabulary.index', [
            'vocabularies' => $vocabularies
        ]);
    }

    public function create()
    {
        $languages = Language::all();
        return view('vocabulary.create', ['languages' => $languages]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $payload = $request->validate([
            'word' => ['required', 'max:255', 'min:2'],
            'definition' => ['required', 'min:2'],
            'language_id' => ['required']
        ]);

        $payload['user_id'] = $user->id;

        Vocabulary::create($payload);

        return redirect(route('vocabulary.index'));
    }

    public function edit(Vocabulary $vocabulary)
    {
        $languages = Language::all();
        $this->authorize('update', $vocabulary);

        return view('vocabulary.edit', ['vocabulary' => $vocabulary, 'languages' => $languages]);
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
        $user = Auth::user();
        $vocabulary = Vocabulary::where('user_id', $user->id)->orderByRaw('rand()')->limit(1)->firstOrFail();

        return view('vocabulary.random', [
            'vocabulary' => $vocabulary
        ]);
    }

    public function destroy(Vocabulary $vocabulary)
    {
        $this->authorize('delete', $vocabulary);
        $vocabulary->delete();

        return redirect(route('vocabulary.index'));
    }
}
