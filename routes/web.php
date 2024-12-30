<?php

use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\ForumAddController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IndexController;
use App\Models\Discussions;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/forum',[ForumController::class, 'index']);
Route::get('/forum/add',[ForumAddController::class, 'index']);
Route::post('/forum/add',[ForumAddController::class, 'store']);
Route::get('/discussion/{id}',[DiscussionsController::class, 'index']);
Route::post('/discussion/{id}',[DiscussionsController::class, 'store']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
