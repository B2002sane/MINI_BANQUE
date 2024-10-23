<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    bonjour
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f2f2f2;
          margin: 0;
          padding: 0;
        }
        .container {
          max-width: 600px;
          margin: 20px auto;
          background-color: white;
          padding: 20px;
          border-radius: 5px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
          margin-bottom: 20px;
        }
        label {
          display: block;
          font-weight: bold;
          margin-bottom: 5px;
        }
        input[type="text"], input[type="tel"], input[type="number"] {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }
        .photo {
          text-align: center;
          margin-bottom: 20px;
        }
        .photo img {
          max-width: 100px;
          border-radius: 50%;
        }
        .buttons {
          text-align: right;
        }
        .buttons button {
          padding: 10px 20px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        .buttons button.annuler {
          background-color: #dc3545;
          margin-left: 10px;
        }
      </style>
   
    <form method="POST" action="{{ route('register') }}" >
        @csrf


    
          <div class="container">
            <h1>CRÉATION DE COMPTE</h1>
            <div class="form-group">
              <label for="prenom">Prénom</label>
              <input type="text" id="prenom" name="prenom" value="">
            </div>
            <div class="form-group">
              <label for="nom">Nom</label>
              <input type="text" id="nom" name="nom" value="">
            </div>
            <div class="form-group">
              <label for="date-naissance">Date de Naissance</label>
              <input type="text" id="date-naissance" name="date-naissance" value="">
            </div>
            <div class="form-group">
              <label for="telephone">Numéro de Téléphone</label>
              <input type="tel" id="telephone" name="telephone" value="">
            </div>
            <div class="form-group">
              <label for="adresse">Adresse</label>
              <input type="text" id="adresse" name="adresse" value="">
            </div>
            <div class="form-group">
              <label for="cni">Numero CNI</label>
              <input type="number" id="cni" name="cni" value="">
            </div>
            <div class="photo">
              <img src="image.png" alt="Photo de profil">
            </div>
            <div class="buttons">
              <button class="valider">Valider</button>
              <button class="annuler">Annuler</button>
            </div>
          </div>
        </body>
        </html>
        
        <!-- Photo -->
        <div class="mt-4">
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" accept="image/*" />
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mots de Passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmer mot de Passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('vous avez dejas un compte') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</body>
</html>