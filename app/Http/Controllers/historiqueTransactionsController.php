<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;


class historiqueTransactionsController extends Controller
{
    
    public function index()

    {
        // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Sélectionner les transactions où `id_users` correspond à l'ID de l'utilisateur connecté
    $transactions = Transaction::where('id_users', $user->id)
    ->orWhere('expediteur', $user->id)
    ->get();

    // Retourner les transactions dans une vue 
    return view('historiqueTransactions', compact('transactions'));

    }











    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
