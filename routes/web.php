<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Route;

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
Route ::get('/utilisateurs',[UtilisateurController::class,'loadAllUtilisateurs'] );
Route ::get('/add/utilisateur',[UtilisateurController::class,'loadAddUtilisateurForm'] );
Route ::post('/add/utilisateur',[UtilisateurController::class,'AddUtilisateur'])->name('AddUtilisateur');
Route::get('/edit/{id}',[UtilisateurController::class,'loadEditForm']);
Route::get('/delete/{id}',[UtilisateurController::class,'deleteUtilisateur']);
Route::delete('/delete/{id}', [UtilisateurController::class, 'deleteUtilisateur'])->name('deleteUtilisateur');
Route ::post('/edit/utilisateur',[UtilisateurController::class,'EditUtilisateur'])->name('EditUtilisateur');
require __DIR__.'/auth.php';
