<?php

namespace App\Http\Controllers;

use App\Mail\RandomNote;
use App\Models\Note;
use App\Services\RandomNoteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('note.index', [
            'notes' => Note::where('user_id', $user->id)->get()
        ]);
    }


    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $payload = $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'body' => ['required', 'min:5']
        ]);

        $payload['user_id'] = $user->id;

        Note::create($payload);

        return redirect(route('note.index'));
    }

    public function show(Note $note)
    {
        $this->authorize('view', $note);

        return view('note.show', ['note' => $note]);
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('note.edit', ['note' => $note]);
    }


    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $payload = $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'body' => ['required', 'min:5']
        ]);
        $note->update($payload);

        return redirect(route('note.index'));
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return redirect(route('note.index'));
    }

    public function random(RandomNoteService $randomNoteService)
    {
        $user = Auth::user();
        $parsedown = new \Parsedown();

        return view('note.random', [
            'randoms' => $parsedown->parse($randomNoteService->getRandomNoteForUser($user))
        ]);
    }
}
