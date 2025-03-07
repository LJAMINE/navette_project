<?php


use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagsController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckPermission;
use App\Http\Middleware\EnsureUserHasRole;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');


Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/announce/{announce}', [AnnounceController::class, 'show'])->name('announce.show')->middleware(Authenticate::class);


Route::get('/dashboard', [AnnounceController::class, 'index'])
    ->name('dashboard.index')
    ->middleware(Authenticate::class);



// Routes for creating, editing, and deleting :societe

// Route::middleware([Authenticate::class, EnsureUserHasRole::class . ':1'])
//     ->group(function () {

Route::get('/form', [AnnounceController::class, 'create'])->name('form')->middleware(CheckPermission::class);;
Route::post('/store/announce', [AnnounceController::class, 'store']);
Route::delete('/announce/{announce}', [AnnounceController::class, 'destroy'])->name('announce.destroy')->middleware(CheckPermission::class);;
Route::get('/announce/{announce}/edit', [AnnounceController::class, 'edit'])->name('announce.edit')->middleware(CheckPermission::class);;
Route::put('/announce/{announce}', [AnnounceController::class, 'update'])->name('announce.update')->middleware(CheckPermission::class);;
Route::get('/stats', [AnnounceController::class, 'stats'])->name('stats')->middleware(CheckPermission::class);;
// });




//clients---------------------------

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/panier', [ReservationController::class, 'panier'])->name('panier');

// ------------------------------------------


// admin----------------------------------



Route::get('/tags', [TagsController::class, 'index'])->name('dashboard.tags.index');
Route::get('/create', [TagsController::class, 'create']);
Route::post('/store', [TagsController::class, 'store']);
Route::delete('/tag/{tag}', [TagsController::class, 'destroy'])->name('tag.destroy');

Route::get('/tag/{tag}/edit', [TagsController::class, 'edit'])->name('tag.edit');
Route::post('/tag/{tag}/update', [TagsController::class, 'update'])->name('tag.update');


Route::get('/Roles', [RoleController::class, 'index'])->name('dashboard.Roles.index');

Route::get('/create', [RoleController::class, 'create']);
Route::post('/store', [RoleController::class, 'store']);
