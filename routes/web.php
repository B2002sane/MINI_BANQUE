<?php


use App\Http\Controllers\DistributeurController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\historiqueTransactionsController;
use App\Http\Controllers\InscriptionClientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ClientController;
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});*/


Route::resource('register', InscriptionClientController::class);


Route::get('/', function () {
    return view('bienvenue');
});


Route::get('/inscription_client', function () {
    return view('inscription_client');
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




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/





//******************************************************************** */


Route::post('/retrait', [TransactionController::class, 'retrait'])->name('retrait.submit');

Route::post('/depot', [TransactionController::class, 'depot'])->name('depot.submit');

Route::post('/tranfert', [TransactionController::class, 'transfert'])->name('transfert.submit');

Route::resource('transactions', historiqueTransactionsController::class);





/********************************************************************* */



Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);
Route::post('/logout', [loginController::class, 'logout'])->name('logout');


// Redirections des tableaux de bord selon les rôles
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', function () {
        return view('dashboard_agent'); // Vue à créer pour le tableau de bord agent
    })->name('agent.dashboard');

    Route::resource('clients', ClientController::class);
    Route::post('/clients/{id}/bloquer', [ClientController::class, 'bloquer'])->name('clients.bloquer');
    Route::post('/clients/{id}/debloquer', [ClientController::class, 'debloquer'])->name('clients.debloquer');

    

});    

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('dashboard_client'); // Vue à créer pour le tableau de bord client
    })->name('client.dashboard');

    Route::get('/transfert', function (){
        return view('transfert');
    })->name('transfert');

});


Route::middleware(['auth', 'role:distributeur'])->group(function () {    
    Route::get('/distributeur/dashboard', function () {
        return view('dashboard_distributeur'); // Vue à créer pour le tableau de bord distributeur
    })->name('distributeur.dashboard');

    Route::get('/retrait', function (){
        return view('retrait');
    });
    
    Route::get('/depot', function (){
        return view('depot');
    });
});




/********************************************************************************************* */



Route ::get('/utilisateurs',[DistributeurController::class,'loadAllUtilisateurs'])->name('loadAllUtilisateurs');
Route ::get('/add/utilisateur',[DistributeurController::class,'loadAddUtilisateurForm'] )->name('loadAddUtilisateurForm');
Route ::post('/add/utilisateur',[DistributeurController::class,'AddUtilisateur'])->name('AddUtilisateur');
Route::get('/edit/{id}',[DistributeurController::class,'loadEditForm']);
Route::delete('/delete/{id}', [DistributeurController::class, 'deleteUtilisateur'])->name('delete');
Route ::post('/edit/utilisateur',[DistributeurController::class,'EditUtilisateur'])->name('EditUtilisateur');
/*Route::post('/crediter', [CompteController::class, 'crediterDistributeur'])->name('crediter');
Route::get('/crediter', function () {
    return view('crediter');
})->name('crediter');*/




//require __DIR__.'/auth.php';
