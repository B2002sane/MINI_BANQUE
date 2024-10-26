
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créditer un Distributeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Ajout d'un fond pour une meilleure visibilité */
        }
        .container {
            margin-top: 150px; /* Augmentation de la marge supérieure pour abaisser le formulaire */
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }
        .form-container {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 40px; /* Ajustement du padding */
            width: 90%; /* Rendre le formulaire responsive */
            max-width: 800px; /* Largeur maximale */
            min-height: 400px; /* Augmentation de la hauteur minimale */
            margin-top: 20px;
            background-color: #ffffff; /* Changement de couleur pour le fond du formulaire */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Ajout d'une ombre pour le style */
            display: flex;
            flex-direction: column; /* Organiser les éléments verticalement */
            justify-content: space-between; /* Espacement entre les éléments */
        }
        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .btn {
            width: 120px;
            font-weight: bold;
        }
        .btn-validate {
            background-color: #007bff;
            color: white;
        }
        .btn-cancel {
            background-color: #dc3545;
            color: white;
        }
        .error-message {
            color: red;
            display: none; /* Masquer par défaut */
        }
        footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #555;
        }
        .input-container {
            flex: 1; /* Permet de prendre tout l'espace disponible */
            display: flex;
            align-items: center; /* Centre verticalement les inputs */
            justify-content: center; /* Centre horizontalement les inputs */
        }
        .button-container {
            margin-top: 30px; /* Espacement entre les champs et les boutons */
        }
    </style>
</head>
<body>

<div class="container">
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="logo">
        <img src="image.png" alt="Fast Money Logo" width="120">
        <div>
            <img src="path_to_profile_image.jpg" alt="Profile Image" class="rounded-circle" width="60">
            <p>Ronald Richards</p>
        </div>
    </div>
    
    <div class="form-container">
        <h2 class="form-title">CRÉDITER UN DISTRIBUTEUR</h2>
        <div class="input-container">
            <form action="{{ route('crediter') }}" method="POST" style="width: 100%;">
                @csrf
                <div class="row mb-4">
                    <div class="col">
                        <label for="distributor-number" class="form-label">Numéro du Distributeur</label>
                        <input type="text" id="distributor-number" name="distributor_number" class="form-control" placeholder="7XXXXXXX" required>
                    </div>
                    <div class="col">
                        <label for="amount" class="form-label">Montant</label>
                        <input type="number" id="amount" name="amount" class="form-control" required oninput="validateAmount()">
                        <div id="error-message" class="error-message">Montant invalide</div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="button-container d-flex justify-content-between" style="margin-top: auto;">
            <button type="submit" class="btn btn-validate">VALIDER</button>
            <button type="button" class="btn btn-cancel" onclick="window.history.back();">ANNULER</button>
        </div>
    </div>
</div>

<footer>
    Avec FAST MONEY sa khaliss yaye borome
</footer>

<script>
    function validateAmount() {
        const amountInput = document.getElementById('amount');
        const errorMessage = document.getElementById('error-message');
        
        if (amountInput.value < 0) {
            errorMessage.style.display = 'block'; // Affiche le message d'erreur
        } else {
            errorMessage.style.display = 'none'; // Masque le message d'erreur
        }
    }
</script>

</body>
</html>