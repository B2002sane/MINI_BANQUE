<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent</title>

    <!-- Lien vers le fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="sidebar">
        <img src="/path-to-your-logo.png" alt="Fast Money Logo" class="logo">
        <a href="#" class="logout-btn">
            <button class="btn btn-danger">Déconnexion</button>
        </a>
    </div>
    <div class="dashboard-content">
        <div class="header">
            <h2>Dashboard Agent</h2>
            <div class="user-info">
                <img src="/path-to-user-profile-picture.png" alt="User Picture" class="profile-pic">
                <p>Ronald Richards</p>
            </div>
        </div>
        
        <div class="actions">
            <div class="action">
                <img src="/path-to-client-icon.png" alt="Compte Client">
                <p>Compte Client</p>
            </div>
            <div class="action">
                <img src="/path-to-distributor-icon.png" alt="Compte Distributeur">
                <p>Compte Distributeur</p>
            </div>
            <div class="action">
                <img src="/path-to-credit-icon.png" alt="Créditer Distributeur">
                <p>Créditer Distributeur</p>
            </div>
            <div class="action">
                <img src="/path-to-history-icon.png" alt="Historique">
                <p>Historique</p>
            </div>
            <div class="action">
                <img src="/path-to-cancel-icon.png" alt="Annuler Transfert">
                <p>Annuler Transfert</p>
            </div>
            <div class="action">
                <img src="/path-to-list-icon.png" alt="Lister Clients">
                <p>Lister Clients</p>
            </div>
        </div>
    </div>
@endsection

    </div>
</body>
</html>
