<?php


use App\Http\Controller\inscription_clientController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/register2', [ClientController::class, 'create'])->name('register2');
Route::post('/register2', [ClientController::class, 'store'])->name('register2.store');


Route::get('/', function () {
    return view('bienvenue');
});


Route::get('/inscription_client', function () {
    return view('inscription_client');
});

Route::get('/dashboard_distributeur', function () {
    return view('dashboard_distributeur');
});

Route::get('/dashboard_client', function () {
    return view('dashboard_client');
});

Route::get('/dashboard_agent', function () {
    return view('dashboard_agent');
});

Route::get('/list_client', function () {
    return view('list_client');
});

Route::get('/form', function () {
    return view('formulaireTransactions');
})->name('transaction.form');

Route::get('/crediter_distributeur', function () {
    return view('crediter_distributeur');
})->name('crediter_distributeur');

Route::get('/creerclient', function () {
    return view('form_create_client');
})->name('client.form');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('clients', ClientController::class);
Route::post('/clients/{id}/bloquer', [ClientController::class, 'bloquer'])->name('clients.bloquer');




Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes protégées pour chaque rôle
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', function () {
        return view('dashboard_agent');
    })->name('agent.dashboard');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('dashboard_client');
    })->name('client.dashboard');
});

Route::middleware(['auth', 'role:distributeur'])->group(function () {
    Route::get('/distributeur/dashboard', function () {
        return view('dashboard_distributeur');
    })->name('distributeur.dashboard');
});


require __DIR__.'/auth.php';
