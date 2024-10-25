<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
           <div class="card-header" >
            Laravel 11 CRUD system
            <a href="/add/utilisateur" class ="btn btn-success btn-sm float-end">Add New</a>
           </div>
           
           <div class="card-body">
            
            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <th>S/N</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th>telephone</th>
                    <th>Date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                   @if (count($all_utilisateurs) > 0) 
                    @foreach ($all_utilisateurs  as $item)
                    <tr>
                        <td>{{$item->iteration}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->prenom}}</td>
                        <td>{{$item->telephone}}</td>
                        <td>{{$item->date_naissance}}</td>
                        <td><a href ="/edit/{{$item->id}}"class ="btn btn-primary btn-sm">Modifier</a></td>
                        <td><a href ="/delete/{{$item->id}}"class ="btn btn-danger btn-sm">Supprimer</a></td>
                        
                    </tr>
                    
                    @endforeach
                   
                   @else
                   <tr>
                        <td> aucun utilsateur trouvé!</td>
                    </tr>
                   @endif
                    
                </tbody>
            </table>

           </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>