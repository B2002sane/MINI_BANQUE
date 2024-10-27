<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        .page-container {
            min-height: 100vh;
            display: flex;
        }
        
        .sidebar {
            width: 300px;
            background-color: #42BAE1;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 1000;
        }
        
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }
        
        .main-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin: 3rem auto;
            min-height: 700px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        
        .action-button {
            background-color: white;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        
        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .icon-circle {
            width: 60px;
            height: 60px;
            background-color: #f0f9ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .icon-circle i {
            color: #42BAE1;
            font-size: 24px;
        }
        
        .monlogo {
            padding: 20px;
            text-align: center;
        }
        
        .monlogo img {
            width: 80%;
            max-width: 180px;
        }
        
        .deconnexion-btn {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
        }
        
        .deconnexion-btn button {
            background: none;
            border: none;
            color: #dc3545;
            padding: 10px;
            width: 100%;
        }
        
        .h3 {
            font-size: 30px;
            margin: 30px;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
            .action-button {
                padding: 15px;
            }
            .icon-circle {
                width: 40px;
                height: 40px;
            }
        }
        .logout-btn {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 16px;
            margin-top: 600px;
            margin-left:60px;
        }
    </style>
</head>
<body>
    <div class="page-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="monlogo">
                <img src="{{ asset('images/image_fast_money.png') }}" alt="Fast Money Logo">
            </div>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                Déconnexion <i class="bi bi-arrow-bar-right"></i>
            </button>
        </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="main-card">
                <div class="header">
                    <h1 class="h3">Dashboard Agent</h1>
                </div>

                <div class="container">
                    <div class="row g-4">
                        <!-- Compte Client -->
                        <div class="col-md-4">
                            <a href="{{ route('clients.create') }}" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <div class="fw-bold">COMPTE CLIENT</div>
                            </a>
                        </div>

                        <!-- Compte Distributeur -->
                        <div class="col-md-4">
                            <a href="#" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="fw-bold">COMPTE DISTRIBUTEUR</div>
                            </a>
                        </div>

                        <!-- Crediter Distributeur -->
                        <div class="col-md-4">
                            <a href="/crediter_distributeur" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="fw-bold">CREDITER DISTRIBUTEUR</div>
                            </a>
                        </div>

                        <!-- Historique -->
                        <div class="col-md-4">
                            <a href="#" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="fw-bold">HISTORIQUE</div>
                            </a>
                        </div>

                        <!-- Annuler Transfert -->
                        <div class="col-md-4">
                            <a href="#" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="fw-bold">ANNULER TRANSFERT</div>
                            </a>
                        </div>

                        <!-- Lister Clients -->
                        <div class="col-md-4">
                            <a href="/clients" class="action-button">
                                <div class="icon-circle">
                                    <i class="fas fa-list"></i>
                                </div>
                                <div class="fw-bold">LISTER CLIENTS</div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="text-center text-muted mt-4">
                    Avec FAST MONEY sa khaliss yaye borome
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>