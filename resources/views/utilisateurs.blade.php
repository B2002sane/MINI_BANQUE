<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Distributeurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #26B7F0;
            color: white;
            padding: 20px;
            min-width: 250px; /* Largeur minimale */
            height: 100vh;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .table-header {
            background-color: #007bff;
            color: white;
        }
        .main-content {
            flex-grow: 1; /* Prend tout l'espace restant */
            padding: 20px; /* Ajoute un peu de marge */
        }
        .table-container {
            margin-top: 30px; /* Espace supplémentaire au-dessus du tableau */
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                width: 100%; /* Prend toute la largeur sur mobile */
                height: auto; /* Hauteur automatique */
            }
            .main-content {
                padding: 10px; /* Réduire le padding sur mobile */
            }
        }
    </style>
</head>
<body>
    <div class="d-flex flex-wrap flex-md-nowrap">
        <div class="sidebar">
            <h4>Fast Money</h4>
            <a href="/add/utilisateur" class="btn btn-success btn-sm">Ajouter un Distributeur</a>
        </div>

        <div class="main-content">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Liste des Distributeurs</h3>
                </div>

                <div class="card-body table-container">
                    <table class="table table-sm table-striped table-bordered">
                        <thead class="table-header">
                            <tr>
                                <th>S/N</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th>Date de naissance</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($all_utilisateurs) > 0) 
                                @foreach ($all_utilisateurs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->prenom }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->date_naissance }}</td>
                                        <td>
                                            <a href="/edit/{{ $item->id }}" class="btn btn-primary btn-sm">Modifier</a>
                                            <a href="#" class="btn btn-danger btn-sm" data-url="{{ route('delete', ['id' => $item->id]) }}" onclick="deleteUser(this)">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">Aucun utilisateur trouvé!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const csrfToken = '{{ csrf_token() }}';
        function deleteUser(element) {
            const url = element.getAttribute('data-url');
            if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => {
                    return response.json().then(data => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Erreur lors de la suppression : ' + data.error);
                        }
                    });
                })
                .catch(error => console.error('Erreur:', error));
            }
        }
    </script>
</body>
</html>