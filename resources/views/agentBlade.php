<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/agent.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>

    <div class="container">
        <!-- Barre latérale -->
        <div class="sidebar">
            <div class="logo">
                <img src="images/logo.png" alt="Fast Money Logo">
            </div>
            <div class="logout">
                <button class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    Déconnexion
                </button>
            </div>
        </div>

        <!-- Section principale -->
        <div class="main">
            <div class="header">
                <h1>Dashboard Agent</h1>
                <div class="user-info">
                    <img src="images/user.png" alt="User Image" class="user-image">
                    <span>Ronald Richards</span>
                </div>
            </div>

            <!-- Grille des actions -->
            <div class="grid-container">
                <div class="grid-item">
                    <i class="fas fa-user-plus"></i>
                    <p>COMPTE CLIENT</p>
                </div>
                <div class="grid-item">
                    <i class="fas fa-user-friends"></i>
                    <p>COMPTE DISTRIBUTEUR</p>
                </div>
                <div class="grid-item">
                    <i class="fas fa-money-check-alt"></i>
                    <p>CREDITER DISTRIBUTEUR</p>
                </div>
                <div class="grid-item">
                    <i class="fas fa-history"></i>
                    <p>HISTORIQUE</p>
                </div>
                <div class="grid-item">
                    <i class="fas fa-times-circle"></i>
                    <p>ANNULER TRANSFERT</p>
                </div>
                <div class="grid-item">
                    <i class="fas fa-clipboard-list"></i>
                    <p>LISTER CLIENTS</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
