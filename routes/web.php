<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\Auth\PasswordCheckController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/password-check', [PasswordCheckController::class, 'check'])->name('password.check');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route ::get('/utilisateurs',[UtilisateurController::class,'loadAllUtilisateurs'] );
Route ::get('/add/utilisateur',[UtilisateurController::class,'loadAddUtilisateurForm'] );
Route ::post('/add/utilisateur',[UtilisateurController::class,'AddUtilisateur'])->name('AddUtilisateur');
Route::get('/edit/{id}',[UtilisateurController::class,'loadEditForm']);
Route::delete('/delete/{id}', [UtilisateurController::class, 'deleteUtilisateur'])->name('delete');
Route ::post('/edit/utilisateur',[UtilisateurController::class,'EditUtilisateur'])->name('EditUtilisateur');
Route::post('/crediter', [CompteController::class, 'crediterDistributeur'])->name('crediter');
Route::get('/crediter', function () {
    return view('crediter');
})->name('crediter');
Route::get('/client', function () {
    return view('auth.client');
})->name('client');

Route::get('/distributeur', function () {
    return view('auth.distributeur');
})->name('distributeur');

Route::get('/agent', function () {
    return view('auth.agent');
})->name('agent');

require __DIR__.'/auth.php';
