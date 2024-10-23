<?php

namespace App\Http\Controllers;

use App\Models\Distributeur;
use Illuminate\Http\Request;

class DistributeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('distributeurs.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('distributeurs.create'); 
    
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
    public function show(Distributeur $distributeur)
    {
        return view ('distributeurs.show'); 
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Distributeur $distributeur)
    {
        return view ('distributeurs.edit'); 
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Distributeur $distributeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Distributeur $distributeur)
    {
        //
    }
}
