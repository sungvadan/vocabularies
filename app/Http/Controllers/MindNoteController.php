<?php

namespace App\Http\Controllers;

use App\Models\MindNote;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class MindNoteController extends Controller
{
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
            'file' => ['required', 'mimes:jpg,jpeg,bmp,png,gif,pdf', 'max:4068']
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

        return view('mind_note.show', ['mindNote' => $mindNote]);
    }

    public function destroy(MindNote $mindNote)
    {
        $this->authorize('delete', $mindNote);
        $mindNote->delete();

        return redirect(route('mind_note.index'));
    }

    private function uploadFile(UploadedFile $file): string
    {
        $fileName = time().'_'. $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        return '/storage/' . $filePath;
    }
}