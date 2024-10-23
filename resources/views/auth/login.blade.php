<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money - Connexion</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .is-valid {
            border-color: #28a745; /* Vert */
        }
        .is-invalid {
            border-color: #dc3545; /* Rouge */
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

                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="phone-number">Numéro de téléphone</label>
                        <div class="input-group">
                            <input type="tel" id="phone-number" name="phone" placeholder="Saisir votre numéro" required autofocus>
                            <span class="input-group-icon">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <small id="phone-error" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Saisir votre mot de passe" required>
                            <span class="input-group-icon password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <small id="password-error" class="text-danger"></small>
                    </div>
                    <button type="submit">SE CONNECTER</button>
                    <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a><br><br>
                    <h5>Je n’ai pas encore de compte <a href="{{ route('register') }}">Créer un compte ?</a></h5>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
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
