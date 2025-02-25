<?php

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


// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return view($user->role === 'client' ? 'dashboard.client' : 'dashboard.societe');
    })->name('dashboard');
});


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::post('/logout', [SessionController::class, 'destroy']);


