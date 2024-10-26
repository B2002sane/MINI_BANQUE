<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money - Connexion</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

/* Global styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Grid layout */
.grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
    width: 90%; /* Utiliser une largeur relative */
    height: auto; /* Permettre à la hauteur de s'ajuster */
}

/* Left side (image) */
.left-side {
    background-color: #42bae1;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 2rem; /* Utiliser des unités relatives */
}

.left-side img {
    max-width: 100%; /* Assurer que l'image est responsive */
    height: auto; /* Conserver les proportions */
}

/* Right side (connection form) */
.right-side {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5rem; /* Utiliser des unités relatives */
}

.connection-form {
    width: 100%;
    max-width: 400px;
    padding: 2rem; /* Utiliser des unités relatives */
}

.connection-form h1 {
    font-size: 2rem; /* Utiliser des unités relatives */
    margin-bottom: 1rem;
}

.connection-form p {
    font-size: 1rem; /* Utiliser des unités relatives */
    margin-bottom: 2rem;
}

.connection-form .form-group {
    margin-bottom: 1.5rem; /* Utiliser des unités relatives */
}

.connection-form label {
    display: block;
    font-weight: bold;
    font-size: 1rem; /* Utiliser des unités relatives */
    margin-bottom: 0.5rem; /* Utiliser des unités relatives */
}

.connection-form .input-group {
    position: relative;
}

.connection-form input {
    width: 100%;
    padding: 1rem 2.5rem 1rem 1rem; /* Ajuster padding */
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1rem; /* Utiliser des unités relatives */
}

.connection-form .input-group-icon {
    position: absolute;
    top: 50%;
    right: 1rem; /* Utiliser des unités relatives */
    transform: translateY(-50%);
    color: #888;
}

.connection-form button {
    background-color: #046DB5;
    color: #fff;
    border: none;
    padding: 1rem 2rem; /* Ajuster padding */
    border-radius: 6px;
    font-size: 1rem; /* Utiliser des unités relatives */
    cursor: pointer;
    width: 100%;
    margin-top: 1.5rem; /* Utiliser des unités relatives */
}

.connection-form button:hover {
    background-color: #0056b3;
}

.connection-form .forgot-password {
    display: block;
    margin-top: 0.5rem; /* Utiliser des unités relatives */
    color: #007bff;
    text-decoration: none;
    font-size: 0.875rem; /* Utiliser des unités relatives */
    text-align: right;
}

/* Alert styles */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 1rem;
    border-radius: 5px;
    margin-bottom: 1rem;
}

/* Media Queries */
@media (max-width: 768px) {
    .grid-container {
        grid-template-columns: 1fr; /* Passer à une seule colonne sur les petits écrans */
        height: auto; /* Permettre à la hauteur de s'ajuster */
    }

    .right-side {
        padding: 2rem; /* Réduire le padding */
    }
}
        
</style>
</head>
<body>
<div class="grid-container">
        <div class="left-side">
            <img src="{{ asset('images/logo.png') }}" alt="Fast Money">
        </div>
        <div class="right-side">
            <div class="connection-form">
                <h1>CONNEXION</h1><br>
                <p>Veuillez saisir votre numéro et votre mot de passe</p>

                <!-- Affichage des erreurs de validation -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulaire de connexion adapté -->
                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="telephone">Numéro de Téléphone</label>
                        <div class="input-group">
                            <input id="telephone" type="text" name="telephone" placeholder="Saisir votre numéro" required autofocus value="{{ old('telephone') }}">
                            <span class="input-group-icon">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <small id="phone-error" class="text-danger"></small>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="input-group">
                            <input id="password" type="password" name="password" placeholder="Saisir votre mot de passe" required>
                            <span class="input-group-icon password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <small id="password-error" class="text-danger"></small>
                    </div>

                    <button type="submit">Se connecter</button>
                    <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a><br><br>
                    <h5>Je n’ai pas encore de compte <a href="{{ route('register') }}">Créer un compte ?</a></h5>
                </form>
            </div>
        </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

         togglePassword.addEventListener('click', function () {
        // Change le type du champ de mot de passe
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Change l'icône
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});
        document.getElementById('login-form').addEventListener('input', function() {
            const phoneInput = document.getElementById('phone-number');
            const passwordInput = document.getElementById('password');
            const phoneError = document.getElementById('phone-error');
            const passwordError = document.getElementById('password-error');

            // Validation du numéro de téléphone
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                phoneInput.classList.remove('is-valid');
                phoneInput.classList.add('is-invalid');
                phoneError.textContent = 'Le numéro de téléphone doit contenir exactement 10 chiffres.';
            } else {
                phoneInput.classList.remove('is-invalid');
                phoneInput.classList.add('is-valid');
                phoneError.textContent = '';
            }

            // Vérification du mot de passe
            if (passwordInput.value.length < 6) {
                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');
                passwordError.textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
            } else {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
                passwordError.textContent = '';

                // Vérification AJAX pour le mot de passe
                // Remplacez l'URL par celle de votre route de vérification de mot de passe
                fetch('{{ route("password.check") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        phone: phoneInput.value,
                        password: passwordInput.value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.valid) {
                        passwordInput.classList.remove('is-valid');
                        passwordInput.classList.add('is-invalid');
                        passwordError.textContent = 'Le mot de passe est incorrect.';
                    } else {
                        passwordInput.classList.add('is-valid');
                        passwordError.textContent = '';
                    }
                })
                .catch(error => console.error('Erreur:', error));
            }
        });
    </script>
</body>
</html>