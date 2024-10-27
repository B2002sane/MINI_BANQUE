<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
        p{
            font-size:40px;
        }
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
            transition: width 0.3s ease;
        }

        .main-content {
            flex: 1;
            margin-left: 300px;
            padding: 20px;
            background-color: #f8f9fa;
            transition: margin-left 0.3s ease;
        }

        .action-button {
            background-color: #f8f9fa;
            border: none;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .action-button:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
        }
        
        .icon-circle {
            width: 60px;
            height: 60px;
            background-color: #e1f5fe;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
        }
        
        .icon-circle i {
            color: #03a9f4;
            font-size: 24px;
        }
        
        .main-card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            min-height: 700px;
            position: relative;
            top: 50px;
           
        }

        .monlogo {
            width: 100%;
            padding: 15px;
            text-align: center;
            margin-top: 20px;
        }

        .monlogo img {
            width: 80%;
            max-width: 200px;
            height: auto;
            object-fit: contain;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .deconnexion-btn {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px;
        }

        .deconnexion-btn button {
            background: none;
            border: none;
            color: red;
            font-size: 14px;
            width: 100%;
            transition: all 0.3s ease;
        }
        .action-button {
    background-color: #f8f9fa;
    border: none;
    border-radius: 10px;
    padding: 20px;
    transition: all 0.3s ease;
    height: 100%;
    display: block;
    text-decoration: none;
    color: inherit;
}

.action-button:hover {
    background-color: #e9ecef;
    transform: translateY(-2px);
    text-decoration: none;
    color: inherit;
}
.balance-input {
            font-size: 24px;
            border: none;
            background: transparent;
            text-align: center;
            width: 200px;
            letter-spacing: 2px;
        }
        .balance-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
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

        /* Responsive Designs */
        @media (max-width: 1200px) {
            .main-card {
                margin: 1rem;
                min-height: 600px;
            }
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
            }
            .monlogo img {
                width: 70%;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            .main-content {
                margin-left: 80px;
            }
            .monlogo img {
                width: 90%;
                max-width: 60px;
            }
            .deconnexion-btn {
                padding: 5px;
            }
            .deconnexion-btn button div {
                font-size: 10px;
            }
            .main-card {
                top: 20px;
                padding: 1rem;
            }
            .icon-circle {
                width: 50px;
                height: 50px;
            }
            .icon-circle i {
                font-size: 20px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 60px;
            }
            .main-content {
                margin-left: 60px;
                padding: 10px;
            }
            .main-card {
                margin: 0.5rem;
                min-height: 500px;
            }
            .monlogo img {
                width: 40px;
            }
            .action-button {
                padding: 10px;
            }
            .icon-circle {
                width: 40px;
                height: 40px;
            }
            .icon-circle i {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Le reste du HTML reste identique -->
</body>
</html>
</head>
<body>
    <div class="page-container">
        <!-- Bande bleue latérale -->
        <div class="sidebar">
            <!-- Logo en haut -->
            <div class="p-2 monlogo">
            <img src="{{ asset('images/image_fast_money.png') }}" alt="Fast Money Logo">
            </div>
            <!-- Bouton déconnexion en bas -->
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                Déconnexion <i class="bi bi-arrow-bar-right"></i>
            </button>
        </form>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <div class="main-card">
                <!-- Balance -->
                <div class="text-center mb-5">
                    <p class="text-muted mb-2">VOTRE SOLDE</p>
                    <h2 class="display-6 fw-bold">
                        <div class="balance-display">
                    <input type="text" id="balance" value="••••••••••••••" class="balance-input" readonly>
                        <span id="toggle-eye" class="eye-icon" onclick="toggleBalance()">
                            <i class="bi bi-eye-slash-fill" id="eye-icon" style="cursor: pointer; color: black;"></i>
                        </span>
                        </div>
                    </h2>
                </div>     

                <!-- Actions Grid -->
                <div class="row g-4 mb-4">
                <div class="col-6 col-md-4">
                    <a href="/depot" class="action-button w-100 text-decoration-none">
                        <div class="icon-circle">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <div class="text-center fw-bold">DEPOT</div>
                    </a>
                </div>
                <div class="col-6 col-md-4">
                    <a href="/retrait" class="action-button w-100 text-decoration-none">
                        <div class="icon-circle">
                                <i class="fas fa-arrow-down"></i>
                                </div>
                        <div class="text-center fw-bold">RETRAIT</div>
                    </a>
                </div>
                      
                    <div class="col-6 col-md-4">
                        <button class="action-button w-100">
                        <a href="{{ route('transactions.index') }}">
                            <div class="icon-circle">
                                <i class="fas fa-history"></i>
                            </div>
                            <div class="text-center fw-bold">HISTORIQUE</div>
    
                        </a> 
                        </button>
                    </div>
                    <div class="col-6 col-md-4">
                        <button class="action-button w-100">
                            <div class="icon-circle">
                                <i class="fas fa-qrcode"></i>
                            </div>
                            <div class="text-center fw-bold">SCANNER</div>
                        </button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center text-muted small">
                    Avec FAST MONEY sa khaliss yaye borome
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        let isBalanceHidden = true;
        const realBalance = "{{ Auth::user()->compte->solde  }}";

        function toggleBalance() {
            const balanceInput = document.getElementById('balance');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (isBalanceHidden) {
                balanceInput.value = realBalance;
                eyeIcon.classList.remove('bi-eye-slash-fill');
                eyeIcon.classList.add('bi-eye');
            } else {
                balanceInput.value = "••••••••••••••";
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash-fill');
            }
            isBalanceHidden = !isBalanceHidden;
        }

    </script>
</body>
</html>