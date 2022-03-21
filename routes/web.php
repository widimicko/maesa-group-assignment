<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::prefix('dashboard')
    ->middleware('auth')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'showProfile'])->name('profile');
        Route::post('/profile', [DashboardController::class, 'updateProfile']);
        Route::post('/change-password', [DashboardController::class, 'updatePassword'])->name('password.change');

        Route::resource('/employees', EmployeeController::class)->except('show');
        Route::resource('/products', ProductController::class);
        Route::resource('/users', UserController::class)->except('show');
});


require __DIR__.'/auth.php';
