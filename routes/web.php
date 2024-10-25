<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

Route::post('/retrait', [TransactionController::class, 'retrait'])->name('retrait.submit');

Route::post('/depot', [TransactionController::class, 'depot'])->name('depot.submit');

Route::post('/tranfert', [TransactionController::class, 'transfert'])->name('transfert.submit');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/distributeur', function () {
    return view('dashboard_distributeur');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/retrait', function (){
    return view('retrait');
});

Route::get('/depot', function (){
    return view('depot');
});

Route::get('/transfert', function (){
    return view('transfert');
})->name('transfert');

require __DIR__.'/auth.php';
