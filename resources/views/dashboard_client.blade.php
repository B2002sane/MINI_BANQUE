<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #ffffff;
        }

        .sidebar {
            width: 280px;
            background-color: #00BCD4;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .logo-container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 150px;
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
            margin-top: auto;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .balance-section {
            text-align: center;
            margin-bottom: 40px;
            width: 100%;
            max-width: 500px;
        }

        .balance-label {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
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

        .balance-input {
            font-size: 24px;
            border: none;
            background: transparent;
            text-align: center;
            width: 200px;
            letter-spacing: 2px;
        }

        .qr-container {
            margin: 40px 0;
            text-align: center;
        }

        #qrcode {
            display: inline-block;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .features {
            display: flex;
            gap: 60px;
            margin-top: 40px;
            justify-content: center;
            width: 100%;
        }

        .feature {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .feature i{
            font-size: 100px;
            color: #00BCD4;
            margin:0px 100px 0px 100px;
        }

        .feature svg {
            font-size: 100px;
            color: #00BCD4;
            margin:0px 100px 20px 100px;
            position:relative;
            top:10px;
        }

        .feature-title {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: white;
            width: 80%;
            position: fixed;
            bottom: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 10px;
            }

            .features {
                gap: 30px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/image_fast_money.png') }}" alt="Fast Money Logo" class="logo">
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">
                Déconnexion <i class="bi bi-arrow-bar-right"></i>
            </button>
        </form>
    </div>

    <div class="main-content">
        <div class="balance-section">
            <div class="balance-label">VOTRE SOLDE</div>
            <div class="balance-display">
                <input type="text" id="balance" value="••••••••••••••" class="balance-input" readonly>
                <span id="toggle-eye" class="eye-icon" onclick="toggleBalance()">
                    <i class="bi bi-eye-slash-fill" id="eye-icon" style="cursor: pointer; color: black;"></i>
                </span>
            </div>
        </div>

        <div class="qr-container">
            <div id="qrcode"></div>
        </div>

        <div class="features">
        <div class="feature" >
                <i class="bi bi-clock-history"></i>
                <h3 class="feature-title">HISTORIQUE</h3>
            </div>
            <div class="feature" >
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"   fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z"/>
                <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z"/>
                <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z"/>
                <path d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z"/>
                <path d="M12 9h2V8h-2z"/>
            </svg>
                <h3 class="feature-title">SCANNER</h3>
            </div>
            <div class="feature">
                <a href="/transfert" class="action-button">
                <i class="bi bi-arrow-left-right"></i>
                <h3 class="feature-title">TRANSFERT</h3>
            </div>
        </div>

        
    </div>

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

        document.addEventListener("DOMContentLoaded", function() {
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "{{ Auth::user()->telephone ?? '' }}",
                width: 256,
                height: 256
            });
        });

            // Appel initial
        generateQRCode();

        // Change le QR code toutes les 15 secondes
        setInterval(function() {
            document.getElementById("qrcode").innerHTML = ""; // Efface l'ancien QR code
            generateQRCode(); // Génère un nouveau QR code
        }, 15000); // 15000 ms = 15 secondes

        document.addEventListener("DOMContentLoaded", function() {
            generateQRCode(); // Générer un QR code lorsque le contenu est chargé
        });
    </script>
</body>
</html>