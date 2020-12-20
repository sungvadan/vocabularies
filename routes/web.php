<?php

use App\Http\Controllers\VocabularyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [VocabularyController::class, 'index'])->name('home');

Route::get('/vocabulary', [VocabularyController::class, 'index'])->name('vocabulary.index');
Route::get('/vocabulary/create', [VocabularyController::class, 'create'])->name('vocabulary.create');
Route::post('/vocabulary', [VocabularyController::class, 'store'])->name('vocabulary.store');
Route::get('/vocabulary/{vocabulary}/edit', [VocabularyController::class, 'edit'])->name('vocabulary.edit');
Route::put('/vocabulary/{vocabulary}', [VocabularyController::class, 'update'])->name('vocabulary.update');
Route::get('/vocabulary/random', [VocabularyController::class, 'random'])->name('vocabulary.random');
