<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Outlet;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('outlet', OutletController::class);
    Route::resource('product', ProductController::class);
    Route::resource('event', EventController::class);
    Route::get('outlet/{id}/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('outlet/{id}/event/create', [EventController::class, 'create'])->name('event.create');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('user', UserController::class);
    });
});

require __DIR__.'/auth.php';
