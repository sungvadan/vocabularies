<?php

namespace App\Http\Controllers;

use App\Models\MindNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MindNoteController extends Controller
{
    use UploadFileTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        return view('mind_note.index', [
           'mindNotes' => MindNote::where('user_id', $user->id)->get()
        ]);
    }

    public function create()
    {
        return view('mind_note.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'file' => ['required', 'mimes:jpg,jpeg,bmp,png,gif,pdf,svg', 'max:4068']
        ]);

        $mindNote = new MindNote;
        $mindNote->user_id = $user->id;
        $mindNote->title = $request->title;
        $mindNote->path = $this->uploadFile($request->file);

        $mindNote->save();
        return redirect(route('mind_note.index'));
    }

    public function show(MindNote $mindNote)
    {
        $this->authorize('view', $mindNote);

        return view('mind_note.show', [
            'mindNote' => $mindNote,
            'isPdf' => stripos(Storage::disk('public')->mimeType($mindNote->path), 'pdf')
        ]);
    }

    public function destroy(MindNote $mindNote)
    {
        $this->authorize('delete', $mindNote);
        $mindNote->delete();

        return redirect(route('mind_note.index'));
    }

    public function edit(MindNote $mindNote)
    {
        $this->authorize('update', $mindNote);
        return view('mind_note.edit', ['mindNote' => $mindNote]);
    }

    public function update(Request $request, MindNote $mindNote)
    {
        $this->authorize('update', $mindNote);

        $request->validate([
            'title' => ['required', 'max:255', 'min:2'],
            'file' => ['mimes:jpg,jpeg,bmp,png,gif,pdf', 'max:4068']
        ]);

        $mindNote->title = $request->title;
        if ($request->file()) {
            $mindNote->path = $this->uploadFile($request->file);
        }

        $mindNote->update();

        return redirect(route('mind_note.index'));
    }

    public function learnable(MindNote $mindNote)
    {
        $this->authorize('update', $mindNote);
        $mindNote->learnable = !$mindNote->learnable;
        $mindNote->save();

        return redirect(route('mind_note.index'));
    }
}
