<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\todoController;
use App\Http\Controllers\SearchController;

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
    return redirect()->route('login');
});

//Alle Actions, deren Route hier definiert sind, können nur nach erdolgreichem Login/Registration ausgeführt werden
Route::middleware('auth')->group(function () {
    Route::get('/search', [todoController::class, 'search'])->name('search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [todoController::class, 'index'])->name('dashboard');
    Route::get('/create-todo', [todoController::class, 'create']);
    Route::post('/upload', [todoController::class, 'upload']);
    Route::get('/{id}/edit', [todoController::class, 'edit']);
    Route::put('/update', [todoController::class, 'update']);
    Route::delete('/{todo:id}', [todoController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
