<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\MindNoteController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);

Auth::routes();

Route::get('/home', [VocabularyController::class, 'index'])->name('home');

Route::get('/vocabulary', [VocabularyController::class, 'index'])->name('vocabulary.index');
Route::get('/vocabulary/create', [VocabularyController::class, 'create'])->name('vocabulary.create');
Route::post('/vocabulary', [VocabularyController::class, 'store'])->name('vocabulary.store');
Route::get('/vocabulary/{vocabulary}/edit', [VocabularyController::class, 'edit'])->name('vocabulary.edit');
Route::put('/vocabulary/{vocabulary}', [VocabularyController::class, 'update'])->name('vocabulary.update');
Route::get('/vocabulary/random', [VocabularyController::class, 'random'])->name('vocabulary.random');
Route::delete('/vocabulary/{vocabulary}', [VocabularyController::class, 'destroy'])->name('vocabulary.delete');

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/random', [NoteController::class, 'random'])->name('note.random');
Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.delete');
Route::get('/note/{note}/learnable', [NoteController::class, 'learnable'])->name('note.learnable');


Route::controller(MindNoteController::class)->name('mind_note.')->group(function() {
    Route::get('/mind-note', 'index')->name('index');
    Route::get('/mind-note/create', 'create')->name('create');
    Route::post('/mind-note', 'store')->name('store');
    Route::get('/mind-note/{mindNote}', 'show')->name('show');
    Route::get('/mind-note/{mindNote}/edit', 'edit')->name('edit');
    Route::put('/mind-note{mindNote}',  'update')->name('update');
    Route::delete('/mind-note/{mindNote}',  'destroy')->name('delete');
    Route::get('/mind-note/{mindNote}/learnable', 'learnable')->name('learnable');
});

Route::get('/image/{path}', [ImageController::class, 'index'])->name('image');

Route::post('/markdown-to-html', function () {
    $markdown = request('markdown');
    return Str::of($markdown)->markdown();
});
