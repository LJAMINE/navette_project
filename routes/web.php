<?php


use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EnsureUserHasRole;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/announce/{announce}', [AnnounceController::class, 'show'])->name('announce.show')->middleware(Authenticate::class);


Route::get('/dashboard', [AnnounceController::class, 'index'])
    ->name('dashboard.index')
    ->middleware(Authenticate::class);



// Routes for creating, editing, and deleting :societe
Route::middleware([Authenticate::class, EnsureUserHasRole::class . ':1'])
    ->group(function () {
        Route::get('/form', [AnnounceController::class, 'create']);
        Route::post('/store', [AnnounceController::class, 'store']);
        Route::delete('/announce/{announce}', [AnnounceController::class, 'destroy'])->name('announce.destroy');
        Route::get('/announce/{announce}/edit', [AnnounceController::class, 'edit'])->name('announce.edit');
        Route::put('/announce/{announce}', [AnnounceController::class, 'update'])->name('announce.update');
        Route::get('/stats',[AnnounceController::class,'stats']);
    });




    //clients
    
    Route::post('/reservations',[ReservationController::class,'store'])->name('reservations.store');
    Route::get('/panier',[ReservationController::class,'panier']);