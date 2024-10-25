<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style_dasbord_client.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

   
</head>
<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('image/logo1.png') }}" alt="Fast Money Logo" class="logo">
        </div>
        <button class="logout-btn">Déconnexion  <i class="bi bi-arrow-bar-right"></i></button>
    </div>

    <div class="main-content">

        <div class="user-profile">
            <span class="user-name">Ronald Richards</span>
            <img src="{{ asset('image/avatar.png') }}" alt="Profile" class="profile-pic">
        </div>

        <div class="balance-section">
            <div class="balance-label">VOTRE SOLDE</div>
            <div class="balance-display">
                <input type="text"  id="balance"  value="100.000" class="balance-input" readonly>
                <span id="toggle-eye" class="eye-icon" onclick="toggleBalance()">
                    <i class="bi bi-eye-slash-fill" id="eye-icon" style="cursor: pointer; color: black;"></i>
                </span>
            </div>
        </div>
          
        <img src="/api/placeholder/200/200" alt="QR Code" class="qr-code">

        <div class="features">
            <div class="feature">
                <img src="{{ asset('image/historique.png') }}" alt="Historique" class="feature-icon">
                <h3 class="feature-title">HISTORIQUE</h3>
            </div>
            <div class="feature">
                <img src="{{ asset('image/scanne.png') }}" alt="Scanner" class="feature-icon">
                <h3 class="feature-title">SCANNER</h3>
            </div>
            <div class="feature">
                <img src="{{ asset('image/transfere.png') }}" alt="Transfert" class="feature-icon">
                <h3 class="feature-title">TRANSFERT</h3>
            </div>
        </div>
        </div>


   
       <footer>
           <p> Avec FAST MONEY sa khaliss yaye borome</p>
       
        </footer>
   

    <script>
        function toggleBalance() {
            var balanceInput = document.getElementById('balance');
            var eyeIcon = document.getElementById('eye-icon');
            
            if (balanceInput.type === "password") {
                balanceInput.type = "text";
                eyeIcon.classList.remove('bi-eye-slash-fill');
                eyeIcon.classList.add('bi-eye'); // Change l'icône pour indiquer que le montant est visible
            } else {
                balanceInput.type = "password";
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash-fill'); // Change l'icône pour indiquer que le montant est masqué
            }
        }
        </script>
</body>
</html>