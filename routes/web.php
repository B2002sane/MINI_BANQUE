<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DistributeurController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\Auth\UserConnexionController;

Route::get('/login', [UserConnexionController::class, 'create'])->name('login');
Route::post('/login', [UserConnexionController::class, 'store']);
Route::post('/logout', [UserConnexionController::class, 'destroy'])->name('logout');

Route::post('/password/check', [LoginController::class, 'checkPassword'])->name('password.check');
Route::view('dashboardAgent', 'dashboardAgent')->name('dashboardAgent');
Route::view('listAgent', 'listAgent')->name('listAgent');
Route :: resource('distributeurs',DistributeurController::class);

require __DIR__.'/auth.php';

