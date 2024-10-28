<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Client - Fast Money</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        label {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            color: #495057;
        }

        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            border-radius: 50px;
            padding: 0.6rem 2rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .text-center {
            margin-top: 30px;
        }

        .invalid-feedback {
            font-size: 0.85rem;
            color: #e3342f;
        }
        .monlogo img{
            width: 200px;
            margin:none;
        }
    </style>
</head>
<body>
    <div class="monlogo">
        <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
    </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mb-4">Créer un nouveau client</h3>
                <form id="clientForm" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" name="role" value="client">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="nom" 
                                       name="nom" 
                                       value="{{ old('nom') }}" 
                                       required>
                                <div class="invalid-feedback">Le nom doit contenir au moins 3 caractères.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="prenom" 
                                       name="prenom" 
                                       value="{{ old('prenom') }}" 
                                       required>
                                <div class="invalid-feedback">Le prénom doit contenir au moins 3 caractères.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Numéro</label>
                                <input type="tel" 
                                       class="form-control" 
                                       id="telephone" 
                                       name="telephone" 
                                       value="{{ old('telephone') }}" 
                                       required>
                                <div class="invalid-feedback">Le numéro doit contenir exactement 9 chiffres.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_naissance">Date de Naissance</label>
                                <input type="date" 
                                       class="form-control" 
                                       id="date_naissance" 
                                       name="date_naissance" 
                                       value="{{ old('date_naissance') }}" 
                                       required>
                                <div class="invalid-feedback">Vous devez avoir au moins 18 ans.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="adresse" 
                                       name="adresse" 
                                       value="{{ old('adresse') }}" 
                                       required>
                                <div class="invalid-feedback">L'adresse doit contenir au moins 3 caractères.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cni">CNI</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="cni" 
                                       name="cni" 
                                       value="{{ old('cni') }}" 
                                       required>
                                <div class="invalid-feedback">Le numéro CNI est requis et doit être unique.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" 
                                       class="form-control" 
                                       id="photo" 
                                       name="photo" 
                                       accept="image/*">
                                <div class="invalid-feedback">Une photo est requise.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Mot de Passe</label>
                                <input type="password" 
                                       class="form-control" 
                                       id="password" 
                                       name="password" 
                                       required>
                                <div class="invalid-feedback">Le mot de passe doit contenir au moins 8 caractères.</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Valider</button>
                        <a href="{{ route('agent.dashboard') }}" class="btn btn-danger ms-3">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('clientForm');
            const inputs = form.querySelectorAll('input[required]');
            const submitBtn = document.getElementById('submitBtn');

            // Garder une trace des champs qui ont été touchés
            const touchedFields = new Set();

            // Fonction pour valider un champ
            function validateField(input, shouldValidate = false) {
                // Ne valider que si le champ a été touché ou si shouldValidate est true
                if (!touchedFields.has(input.id) && !shouldValidate) {
                    return true;
                }

                let isValid = true;
                const value = input.value.trim();

                switch(input.id) {
                    case 'nom':
                    case 'prenom':
                        isValid = value.length >= 3;
                        break;

                    case 'telephone':
                        isValid = /^[0-9]{9}$/.test(value);
                        break;

                    case 'date_naissance':
                        if (value) {
                            const date = new Date(value);
                            const age = Math.floor((new Date() - date) / (365.25 * 24 * 60 * 60 * 1000));
                            isValid = age >= 18;
                        } else {
                            isValid = false;
                        }
                        break;

                    case 'adresse':
                        isValid = value.length >= 3;
                        break;

                    case 'cni':
                        isValid = value.length > 14;
                        break;

                    case 'photo':
                        isValid = input.files.length > 0;
                        break;

                    case 'password':
                        isValid = value.length >= 8;
                        break;
                }

                if (touchedFields.has(input.id) || shouldValidate) {
                    if (isValid) {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    } else {
                        input.classList.remove('is-valid');
                        input.classList.add('is-invalid');
                    }
                }

                return isValid;
            }

            // Valider tous les champs
            function validateForm() {
                let isFormValid = true;
                inputs.forEach(input => {
                    // Lors de la validation du formulaire, on force la validation de tous les champs
                    if (!validateField(input, true)) {
                        isFormValid = false;
                    }
                });
                return isFormValid;
            }

            // Écouter les changements sur chaque champ
            inputs.forEach(input => {
                // Marquer le champ comme touché lors du focus
                input.addEventListener('focus', function() {
                    touchedFields.add(this.id);
                });

                // Valider lors de la saisie
                input.addEventListener('input', function() {
                    validateField(this);
                });

                // Valider lors de la perte de focus
                input.addEventListener('blur', function() {
                    touchedFields.add(this.id);
                    validateField(this);
                });
            });

            // Validation à la soumission du formulaire
            form.addEventListener('submit', function(e) {
                // Marquer tous les champs comme touchés
                inputs.forEach(input => touchedFields.add(input.id));
                
                if (!validateForm()) {
                    e.preventDefault();
                    // Scroll vers le premier champ invalide
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });
    </script>
</body>
</html>