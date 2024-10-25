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
          
    <h1 class="text-center mb-4">MODIFIER UN CLIENT</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">NOM</label>
                            <input type="text" 
                                   class="form-control @error('nom') is-invalid @enderror" 
                                   id="nom" 
                                   name="nom" 
                                   value="{{ old('nom', $client->nom) }}" 
                                   required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prenom">PRENOM</label>
                            <input type="text" 
                                   class="form-control @error('prenom') is-invalid @enderror" 
                                   id="prenom" 
                                   name="prenom" 
                                   value="{{ old('prenom', $client->prenom) }}" 
                                   required>
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telephone">NUMERO</label>
                            <input type="text" 
                                   class="form-control @error('telephone') is-invalid @enderror" 
                                   id="telephone" 
                                   name="telephone" 
                                   value="{{ old('telephone', $client->telephone) }}" 
                                   required>
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_naissance">DATE NAISSANCE</label>
                            <input type="text" 
                                   class="form-control @error('date_naissance') is-invalid @enderror" 
                                   id="date_naissance" 
                                   name="date_naissance" 
                                   value="{{ old('date_naissance', $client->date_naissance) }}" 
                                   required>
                            @error('date_naissance')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="adresse">ADRESSE</label>
                            <input type="text" 
                                   class="form-control @error('adresse') is-invalid @enderror" 
                                   id="adresse" 
                                   name="adresse" 
                                   value="{{ old('adresse', $client->adresse) }}" 
                                   required>
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cni">CNI</label>
                            <input type="text" 
                                   class="form-control @error('cni') is-invalid @enderror" 
                                   id="cni" 
                                   name="cni" 
                                   value="{{ old('cni', $client->cni) }}" 
                                   required>
                            @error('cni')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="photo">PHOTO</label>
                            <input type="text" 
                                   class="form-control @error('photo') is-invalid @enderror" 
                                   id="photo" 
                                   name="photo" 
                                   value="{{ old('photo', $client->photo) }}" 
                                   required>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
              

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5">METTRE À JOUR</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-danger px-5 ms-3">ANNULER</a>
                </div>
            </form>
        </div>
    </div>


<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
