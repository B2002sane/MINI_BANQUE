<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .monlogo img{
            width: 300px;
            margin:none;
        }
        .text-end{
            position:relative;
            bottom:200px;
            right:200px;

        }
    </style>
</head>
<body>

        <div class="monlogo">
                <img src="{{ asset('images/image_fast_money.png') }}" alt="Fast Money Logo">
                <div class="text-end mt-4">
                        <a href="/dashboard_agent" class="btn btn-info me-2">RETOUR</a>
                </div>
            <div class="search">
			
		</div>
		
            </div>
            <div class="qr-container mt-3">
            <div class="qr-code">
                <div id="qrcode"></div>
            </div>
        </div>

<div class="container "> <!-- Conteneur ajouté ici -->
<label for="chercher">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"/></svg>
				<input type="text" id="chercher">
			</label>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    <h1 class="text-center m-5">LISTE DES CLIENTS</h1>
    <div class="table-responsive">
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro</th>
                    <th>Adresse</th>
                    <th>Date Naissance</th>
                    <th>CNI</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="liste_client" >
                @foreach($clients as $client)
                    <tr>
                        <td>
                            @if($client->photo)
                                <img src="{{ Storage::url($client->photo) }}" 
                                     alt="Photo de {{ $client->nom }}" 
                                     width="50" height="50" 
                                     class="rounded-circle">
                            @else
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px;">
                                    {{ strtoupper(substr($client->nom, 0, 1)) }}
                                </div>
                            @endif
                        </td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->prenom }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->adresse }}</td>
                        <td>{{ $client->date_naissance }}</td>
                        <td>{{ $client->cni }}</td>
                    

                        <td>
                            <div class="btn-group">
                                <a href="{{ route('clients.show', $client) }}" 
                                   class="btn btn-info m-2">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                   </svg>
                                </a>
                                <a href="{{ route('clients.edit', $client) }}" 
                                   class="btn btn-warning m-2">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('clients.destroy', $client) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger m-2"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                            </svg>
                                    </button>
                                </form>

                                <form action="{{ route('clients.bloquer', $client->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" 
                                            class="btn btn-danger m-2"
                                            onclick="return confirm('Êtes-vous sûr de vouloir bloquer ce client ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m0 5.996V14H3s-1 0-1-1 1-4 6-4q.845.002 1.544.107a4.5 4.5 0 0 0-.803.918A11 11 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664zM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                                            </svg>
                                    </button>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $clients->links() }}
</div> <!-- Fin du conteneur -->
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


      
        // Générer le code QR
                var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "{{ $client->telephone }}",
            width: 256,
            height: 256
        });
        
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
