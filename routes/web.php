<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\TrashedNotesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/notes', NoteController::class)->middleware(['auth']);
Route::get('/trashed', [TrashedNotesController::class, 'index'])
        ->middleware('auth')->name('trashed.index');

Route::get('/trashed/{note}', [TrashedNotesController::class, 'show'])
        ->withTrashed()
        ->middleware('auth')->name('trashed.show');
require __DIR__.'/auth.php';
// Route::get('/notes',);
// Route::get('/notes'/'{note}',);
// Route::get('/notes/create', );
// Route::post('/notes', );