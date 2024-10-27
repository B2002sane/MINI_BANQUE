<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Compte - Fast Money</title>
    <link rel="stylesheet" href="{{ asset('css/style_register2.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
            height: auto; /* Maintient le ratio d'aspect */
        }
        .formu {
            border: solid 1px;
            padding: 15px;
            padding-top: 25px;
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* Adaptation responsive */
            gap: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #FAFAFA;
        }
        .buttons {
            display: flex;
            flex-direction: column; /* Empile les boutons pour les petits écrans */
            align-items: center; /* Centre les boutons */
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%; /* Prend toute la largeur sur les petits écrans */
            margin: 5px 0; /* Espacement entre les boutons */
        }
        .btn-primary {
            background-color: #046DB5;
            color: white;
        }
        .btn-danger {
            background-color: #B50407;
            color: white;
        }
        .lien {
            text-decoration: none;
            color: white;
        }
        .footer-text {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center; /* Centre le texte du footer */
        }
        .text-red-500 {
            color: red;
            font-size: 0.8rem;
            margin-top: 0.2rem;
        }
        .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
        </div>
        <h1 class="form-title">Modification de Compte Distributeur</h1>
       
        <form id="registrationForm" action="{{ route('EditUtilisateur') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="utilisateur_id" value="{{$utilisateur->id}}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <div class="formu">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" name="prenom" value="{{$utilisateur->prenom}}" required>
                        <span class="text-red-500" id="prenomError"></span>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" value="{{$utilisateur->Adresse}}" required>
                        <span class="text-red-500" id="adresseError"></span>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="{{$utilisateur->nom}}" required>
                        <span class="text-red-500" id="nomError"></span>
                    </div>
                    <div class="form-group">
                        <label for="cni">Numero CNI</label>
                        <input type="text" id="cni" name="cni" value="{{$utilisateur->cni}}" required>
                        <span class="text-red-500" id="cniError"></span>
                    </div>
                    <div class="form-group">
                        <label for="date_naissance">Date de Naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" value="{{$utilisateur->date_naissance}}" min="1960-01-01" max="2006-01-01">
                        <span class="text-red-500" id="dateError"></span>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" id="photo" name="photo" accept="image/*">
                        <span class="text-red-500" id="photoError"></span>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Numero de Telephone</label>
                        <input type="number" id="telephone" name="telephone" value="{{$utilisateur->telephone}}" required>
                        <span class="text-red-500" id="telephoneError"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mots de Passe</label>
                        <input type="password" id="password" name="password" value="{{$utilisateur->password}}" required>
                        <span class="text-red-500" id="passwordError"></span>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" id="submitBtn" class="btn btn-primary">Enregistrer</button>
                    <button type="button" class="btn btn-danger">
                        <a class="lien" href="{{ route('loadAllUtilisateurs')  }}">Annuler</a>
                    </button>
                </div>
            </div>
        </form>
        <p class="footer-text">Avec FAST MONEY sa khalis yaye borom</p>
    </div>
    <script>
        const form = document.getElementById('registrationForm');

        form.addEventListener('input', function (event) {
            const target = event.target;
            const errorElement = document.getElementById(target.id + 'Error');
            let errorMessage = '';

            if (target.id === 'prenom' || target.id === 'nom') {
                if (!/^[a-zA-ZÀ-ÿ '-]+$/.test(target.value)) {
                    errorMessage = 'Le champ doit contenir uniquement des lettres.';
                }
            }

            if (target.id === 'cni') {
                if (target.value.length !== 13) {
                    errorMessage = 'Le numéro CNI doit comporter exactement 13 chiffres.';
                }
            }

            if (target.id === 'telephone') {
                if (!/^(77|78|76|75|70)\d{7}$/.test(target.value)) {
                    errorMessage = 'Le numéro de téléphone doit commencer par 75, 76, 77, 78 ou 70 et être suivi de 7 chiffres.';
                }
            }

            errorElement.textContent = errorMessage;

            // Vérifie s'il y a des messages d'erreur
            const errors = document.querySelectorAll('.text-red-500');
            const hasErrors = Array.from(errors).some(error => error.textContent !== '');

            // Active ou désactive le bouton en fonction des erreurs
            submitBtn.disabled = hasErrors;
            submitBtn.classList.toggle('disabled', hasErrors); 
        });

        // Faire disparaître le message après 10 secondes
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 10000);
    </script>
</body>
</html>