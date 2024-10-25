<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Agent - Fast Money</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
         .monlogo img{
            width: 300px;

        }
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1000px;
            
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .table th, .table td {
            vertical-align: middle;
            font-size: 0.95rem;
        }

        .table th {
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .rounded {
            border-radius: 10px;
        }

        .bg-secondary {
            background-color: #6c757d !important;
        }

        .btn {
            border-radius: 50px;
        }
        .btn-info {
            background-color: #17a2b8;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-info:hover {
            background-color: #138496;
            box-shadow: 0 5px 10px rgba(23, 162, 184, 0.4);
        }

        .text-end {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* Hover effect on table rows */
        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<div class="monlogo">
                <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
            </div>
<div class="container">
    <h1 class="text-center mb-5">DÉTAILS DU CLIENT</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    @if($client->photo)
                        <img src="{{ Storage::url($client->photo) }}" 
                             alt="Photo de {{ $client->nom }}" 
                             class="img-fluid rounded" 
                             style="max-width: 200px;">
                    @else
                        <div class="bg-secondary text-white rounded d-flex align-items-center justify-content-center" 
                             style="width: 200px; height: 200px; margin: 0 auto;">
                            {{ strtoupper(substr($client->nom, 0, 1)) }}
                        </div>
                    @endif
                </div>

                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nom :</th>
                            <td>{{ $client->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td>{{ $client->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Numéro :</th>
                            <td>{{ $client->telephone }}</td>
                        </tr>
                        <tr>
                            <th>Date de Naissance :</th>
                            <td>{{ $client->date_naissance }}</td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td>{{ $client->adresse }}</td>
                        </tr>
                        <tr>
                            <th>CNI :</th>
                            <td>{{ $client->cni }}</td>
                        </tr>
                    </table>

                    <div class="text-end mt-4">
                        <a href="{{ route('clients.index') }}" 
                           class="btn btn-info me-2">RETOUR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
