<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="grid-container">
        <div class="left-side">
            <img src="{{ asset('images/image_fast_money.png') }}" alt="Fast Money">
        </div>
        <div class="right-side">
            <div class="connection-form">
                <h1>CONNEXION</h1><br>
                <p>Veuillez saisir votre numéro et votre mot de passe</p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="phone-number">Numéro de téléphone</label>
                        <div class="input-group">
                            <input type="tel" id="phone-number" name="telephone" placeholder="Saisir votre numéro" required autofocus>
                            <span class="input-group-icon">
                                <i class="fas fa-phone"></i>
                            </span>
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <small id="password-error" class="text-danger"></small>
                    </div>
                    <button type="submit">SE CONNECTER</button>

                    <h5>Je n’ai pas encore de compte <br> <a href="/">Créer un compte ?</a> </h5>
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
            const phoneRegex = /^[0-9]{9}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                phoneInput.classList.remove('is-valid');
                phoneInput.classList.add('is-invalid');
                phoneError.textContent = 'Le numéro de téléphone doit contenir exactement 9 chiffres.';
            } else {
                phoneInput.classList.remove('is-invalid');
                phoneInput.classList.add('is-valid');
                phoneError.textContent = '';
            }

            // Vérification du mot de passe
            if (passwordInput.value.length < 8) {
                passwordInput.classList.remove('is-valid');
                passwordInput.classList.add('is-invalid');
                passwordError.textContent = 'Le mot de passe doit contenir au moins 8 caractères.';
            } else {
                passwordInput.classList.remove('is-invalid');
                passwordInput.classList.add('is-valid');
                passwordError.textContent = '';

              
            }
        });
    </script>
</body>
</html>