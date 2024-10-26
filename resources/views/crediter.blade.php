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
            margin-top: 100px; /* Augmentation de la marge supérieure */
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
            padding: 40px;
            width: 90%; /* Rendre le formulaire responsive */
            max-width: 600px; /* Limite la largeur maximale */
            margin-top: 20px;
            background-color: #ffffff; /* Changement de couleur pour le fond du formulaire */
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
        footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            color: #555;
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
        <img src="path_to_logo.png" alt="Fast Money Logo" width="120">
        <div>
            <img src="path_to_profile_image.jpg" alt="Profile Image" class="rounded-circle" width="60">
            <p>Ronald Richards</p>
        </div>
    </div>
    
    <div class="form-container">
        <h2 class="form-title">CRÉDITER UN DISTRIBUTEUR</h2>
        <form action="{{ route('crediter') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="distributor-number" class="form-label">Numéro du Distributeur</label>
                <input type="text" id="distributor-number" name="distributor_number" class="form-control" placeholder="7XXXXXXX" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Montant</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-validate">VALIDER</button>
                <button type="button" class="btn btn-cancel">ANNULER</button>
            </div>
        </form>
    </div>
</div>

<footer>
    Avec FAST MONEY sa khaliss yaye borome
</footer>

</body>
</html>