<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money - Connection</title>
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="phone-number">Numéro de téléphone</label>
                        <div class="input-group">
                            <input type="tel" id="phone-number" name="phone" placeholder="Saisir votre numéro" required autofocus>
                            <span class="input-group-icon">
                                <i class="fas fa-phone"></i>
                            </span>    @vite(['resources/css/style.css', 'resources/js/app.js'])

                        </div>
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" placeholder="Saisir votre mot de passe" required>
                            <span class="input-group-icon password-toggle">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit">SE CONNECTER</button>
                    <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a><br><br>
                    <h5>Je n’ai pas encore de compte <a href="{{ route('register') }}">Créer un compte ?</a></h5>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>