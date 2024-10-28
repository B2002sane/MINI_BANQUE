<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .monlogo img{
            width: 300px;
        }
        .text-end{
            position:relative;
            bottom:200px;
            right:200px;
        }
        
    </style>
</head>
<body>
           @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="monlogo">
                <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
                <div class="text-end "> 
              <!-- Bouton avec JavaScript pour revenir en arrière -->
              <button onclick="window.history.back();" class="btn btn-secondary">Retour</button>
       
            </div>
            
            <div class="search">
            <div class="container "> <!-- Conteneur ajouté ici -->
            <label for="chercher">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input type="text" id="chercher">
			</label>
           
    <h1 class="text-center m-3">HISTORIQUE DES TRANSACTIONS</h1>
    <div class="table-responsive">
        <table class="table table-striped" >
            <thead>
                <tr>
                  
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Frais</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="liste_client" >
                @foreach($transactions as $transaction)
                    <tr>
                        
                        <td>{{ $transaction->type}}</td>
                        <td>{{ $transaction->montant }}</td>
                        <td>{{ $transaction->frais }}</td>
                        <td>{{ $transaction-> created_at  }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> 
<script>
    $(document).ready(function() {
        $("#chercher").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#liste_client tr").filter(function() {
                var nom = $(this).find("td:eq(1)").text().toLowerCase(); // Nom
                var prenom = $(this).find("td:eq(2)").text().toLowerCase(); // Prénom
                var adresse = $(this).find("td:eq(4)").text().toLowerCase(); // Adresse
                var matchFound = nom.indexOf(value) > -1 || prenom.indexOf(value) > -1 || adresse.indexOf(value) > -1;
                $(this).toggle(matchFound);
            });
        });
    }); 
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
