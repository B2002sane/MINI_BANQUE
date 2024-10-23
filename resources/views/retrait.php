<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrait d'Argent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f5f5f5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form {
            border: 2px solid #0d6efd; /* Bordure bleue */
            border-radius: 10px; /* Bords arrondis */
            padding: 20px; /* Espacement interne */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            width: 800px;
            margin: 50px auto; /* Centrage vertical et horizontal */
        }
        
        .container {
            max-width: 1000px;
            background-color: white;
            padding: 80px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        .header-logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header-logo img {
            max-height: 50px;
        }
        #inputs{
            display: flex;
            width: 100%;
            gap: 20px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        } 
        .btn {
            border-radius: 10px;
            flex: 1;
        }
        footer {
            text-align: left;
            margin-bottom: 0;
            font-size: 0.9em;
            color: #777;
        }
        .mb-4 {
            display: grid;
            grid-template-rows: repeat(2, auto); /* Deux lignes */
            gap: 15px; /* Espacement entre les lignes */
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-logo">
            <img src="fast.png" alt="Fast Money Logo">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="User Profile">
                <span class="ms-2">Ronald Richards</span>
            </div>
        </div>

        <h4 class="form-title">FAIRE UN RETRAIT D'ARGENT</h4>

        <form>
            <div id="inputs">
            <div class="mb-4">
                <label for="telephone" class="form-label">NUMERO DU CLIENT</label>
                <input type="tel" id="telephone" class="form-control" placeholder="7XXXXXXXX" required>
            </div>

            <div class="mb-4">
                <label for="montant" class="form-label">MONTANT</label>
                <input type="number" id="montant" class="form-control" placeholder="" required>
            </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">VALIDER</button>
                <button type="reset" class="btn btn-danger">ANNULER</button>
            </div>
        </form>

        <footer>
            Avec FAST MONEY sa khaliss yay borome
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+Kq84bgp+hAc8l+Y5rZqx6v5P9CK9" crossorigin="anonymous"></script>
</body>
</html>
