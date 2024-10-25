<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fast Money</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Google Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Custom CSS -->
        <style>
            
        </style>
    </head>
    <body>
        <div class="nav-buttons">
                    <a href="{{ route('login') }}" class="btn-connect">SE CONNECTER</a>
                    
                     <a href="/inscription_client" class="btn-connect btn-register">CRÉER UN COMPTE</a>
        </div>

        <div class="main-content">
            <div class="content-wrapper">
                <div class="text-content">
                    <h1 class="main-heading">
                        FAST MONEY <br>
                        Déposez et retirez gratuitement.<br>
                        Transférez de l'argent pour 2%.
                    </h1>
                    
                    <p class="sub-text">
                        Créer vite votre compte pour bénéficier de nos services.<br>
                        Un système de sécurité aux standards internationaux. <br>
                        Envoyez de l'argent à n'importe qui simplement avec son 
                        numéro de téléphone, et il peut le récupérer instantanément auprès de n'importe quel distributeur Fast Money.
                    </p>

                    <div class="stats-container">
                        <div class="stat-item">
                            +20000 Utilisateurs
                        </div>
                        <div class="stat-item">
                            +1M transactions
                        </div>
                    </div>
                </div>
                
                <div class="logo-container">
                    <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
                </div>
            </div>

            <p class="footer-text">
                AVEC FAST MONEY SA KHALISS YAYE BOROME<br>
                GUAW NA WAURE TÉ NOPALE
            </p>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>