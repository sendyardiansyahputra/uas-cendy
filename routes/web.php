<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\User\RentalController;
use App\Http\Controllers\Admin\RentalController as AdminRental;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/user/items', function () {
        $items = \App\Models\Item::with('category')->get();
        return view('user.items', compact('items'));
    })->name('user.items');

    Route::post('/rent', [RentalController::class, 'store'])->name('rent.store');

    Route::get('/user/rentals', function () {
        $rentals = \App\Models\Rental::where('user_id', auth()->id())
            ->with('item')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.rentals', compact('rentals'));
    })->name('user.rentals');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/category', [CategoryController::class, 'index'])
        ->name('admin.category');

    Route::post('/category', [CategoryController::class, 'store']);
    Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

    Route::get('/items', [ItemController::class, 'index'])
        ->name('admin.items');

    Route::post('/items', [ItemController::class, 'store']);
    Route::delete('/items/{id}', [ItemController::class, 'destroy']);

    Route::get('/rentals', [AdminRental::class, 'index'])
        ->name('admin.rentals');

    Route::post('/rentals/{id}/approve', [AdminRental::class, 'approve']);
    Route::post('/rentals/{id}/reject', [AdminRental::class, 'reject']);
});
