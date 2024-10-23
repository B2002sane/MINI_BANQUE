<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        h1 {
            font-size: 2rem;
            color: #333;
        }

        /* Layout */
        .flex {
            display: flex;
            flex-wrap: wrap; /* Ajout pour le wrapping */
        }

        /* Sidebar */
        .sidebar {
            background-color: #00A1E0; /* Couleur de fond bleue */
            width: 250px;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar .logo img {
            width: 80%;
            margin-bottom: 30px;
        }

        .sidebar .logout {
            margin-top: auto;
            margin-bottom: 20px;
        }

        .sidebar .logout-btn {
            background-color: #E63946; /* Couleur rouge déconnexion */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .sidebar .logout-btn i {
            margin-right: 10px;
        }

        .sidebar .logout-btn:hover {
            background-color: #d62839;
        }

        /* Main Content */
        .main {
            margin-left: 250px; /* Décalage pour laisser la place à la sidebar */
            padding: 30px;
            background-color: #f4f4f9;
            flex: 1;
            height: 100vh;
            min-width: 0; /* Pour éviter le débordement */
        }

        .main .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .main .header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        .main .header .user-info {
            display: flex;
            align-items: center;
        }

        .main .header .user-info .user-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Dashboard Grid */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Adaptation dynamique des colonnes */
            gap: 30px;
        }

        .grid-item {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.3s;
            height: 200px; /* Taille des blocs */
            text-align: center;
            text-decoration: none; /* Supprime le soulignement des liens */
            color: inherit; /* Prend la couleur du texte parent */
        }

        .grid-item i {
            font-size: 3rem;
            color: #00A1E0;
            margin-bottom: 15px;
        }

        .grid-item p {
            font-size: 1.1rem;
            color: #333;
            font-weight: bold;
        }

        /* Hover Effects */
        .grid-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .grid-item {
                height: auto; /* Laissez la hauteur s'ajuster */
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 100%; /* Sidebar en pleine largeur */
                height: auto; /* Laissez la hauteur s'ajuster */
                position: relative; /* Position relative pour ne pas être fixe */
            }

            .main {
                margin-left: 0; /* Retirer le décalage */
            }

            .grid-container {
                grid-template-columns: repeat(2, 1fr); /* 2 colonnes sur petits écrans */
            }
        }
    </style>
</head>
<body>
    <div class="flex">
        <!-- Sidebar intégrée -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logoMoney.png') }}" alt="Fast Money Logo">
            </div>
            <div class="logout">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Déconnexion
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="main">
            <div class="header">
                <h1>Dashboard Agent</h1>
                <div class="user-info">
                    <img class="user-image" src="{{ asset('images/user.png') }}" alt="Agent Image">
                    <span>Ronald Richards</span>
                </div>
            </div>

            <!-- Grid Items -->
            <div class="grid-container">
                <a href="" class="grid-item">
                    <i class="fas fa-user-plus"></i>
                    <p>Compte Client</p>
                </a>
                <a href="{{ route('listAgent') }}" class="grid-item">
                    <i class="fas fa-users"></i>
                    <p>Compte Distributeur</p>
                </a>
                <a href="" class="grid-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <p>Créditer Distributeur</p>
                </a>
                <a href="" class="grid-item">
                    <i class="fas fa-history"></i>
                    <p>Historique</p>
                </a>
                <a href="" class="grid-item">
                    <i class="fas fa-times-circle"></i>
                    <p>Annuler Transfert</p>
                </a>
                <a href="" class="grid-item">
                    <i class="fas fa-list"></i>
                    <p>Lister Clients</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Inclure FontAwesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
