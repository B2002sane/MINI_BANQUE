<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashbord_client', function () {
    return view('auth.dashbord_client');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/register2', [ClientController::class, 'create'])->name('register2');
Route::post('/register2', [ClientController::class, 'store'])->name('register2.store');
require __DIR__.'/auth.php';
