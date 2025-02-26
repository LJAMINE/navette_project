<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');

});
Route::post('/login', [SessionController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AnnounceController::class, 'index'])->name('dashboard.index');
});

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::post('/logout', [SessionController::class, 'destroy']);


Route::get('/form', [AnnounceController::class, 'create']);
Route::post('/store', [AnnounceController::class, 'store']);
Route::delete('/announce/{announce}', [AnnounceController::class, 'destroy'])->name('announce.destroy');
Route::get('/announce/{announce}/edit', [AnnounceController::class, 'edit'])->name('announce.edit');
Route::put('/announce/{announce}', [AnnounceController::class, 'update'])->name('announce.update');




