
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Compte - Fast Money</title>
    <link rel="stylesheet" href="{{ asset('css/style_register2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

   
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="logo">
            <img src="{{ asset('image/logo.png') }}" alt="Fast Money Logo">
        </div>
        <h1 class="form-title">CREATION DE COMPTE</h1>
       
        <form  id="registrationForm" action="{{ route('register2.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                    <input type="text" id="prenom" name="prenom" value="" required >
                    <span class="text-red-500" id="prenomError"></span>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value=""  required>
                    <span class="text-red-500" id="adresseError"></span>
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="" required>
                    <span class="text-red-500" id="nomError"></span>
                </div>
                <div class="form-group">
                    <label for="cni">Numero CNI</label>
                    <input type="text" id="cni" name="cni" value="" required>
                    <span class="text-red-500" id="cniError"></span>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" value=""  min="1960-01-01" max="2006-01-01" >
                    <span class="text-red-500" id="dateError"></span>
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*">
                    <span class="text-red-500" id="photoError"></span>
                </div>
                <div class="form-group">
                    <label for="telephone">Numero de Telephone</label>
                    <input type="number" id="telephone" name="telephone" value="" required>
                    <span class="text-red-500" id="telephoneError"></span>
                </div>
                <div class="form-group">
                    <label for="password">Mots de Passe</label>
                    <input type="password" id="password" name="password" value="" required>
                    <span id="togglePassword" class="eye-icon" onclick="togglePassword()">
                        <i class="bi bi-eye-slash-fill" style="cursor: pointer;"></i>
                    </span>
                    <span class="text-red-500" id="passwordError"></span>
                </div>

                
                
            </div>
            <div class="buttons">
                <button type="submit"  id="submitBtn" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                <button type="button" class="btn btn-danger"><a class="lien" href="{{ route('login') }}">
                    {{ __('se connecter') }}
                </a></button>
            </div>
        </form>
    </div>
        <p class="footer-text">Avec FAST MONEY sa khalis yaye borom</p>
    </div>
    <script>        // Validation du prénom (lettres uniquement)
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
            errorMessage = 'Le numéro de téléphone doit commencer par  75, 76 ,77, 78 ou 70 et être suivi de 7 chiffres.';
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

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('togglePassword').querySelector('i');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('bi-eye-slash-fill');
        toggleIcon.classList.add('bi-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('bi-eye');
        toggleIcon.classList.add('bi-eye-slash-fill');
    }
}

    </script>
</body>
</html>