<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Money - Dépôt</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .main-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }
        .deposit-form {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: 500px;
            position: relative;
            bottom: 150px;
        }
        .form-control {
            height: 50px;
            font-size: 16px;
            padding: 10px 15px;
        }
        .btn-valider {
            background-color: #0066b2;
            color: white;
            padding: 8px 30px;
            min-width: 120px;
        }
        .btn-annuler {
            background-color: #dc3545;
            color: white;
            padding: 8px 30px;
            min-width: 120px;
        }
        .retour-btn {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #212529;
            padding: 5px 15px;
            border-radius: 4px;
            text-decoration: none;
            float: right;
            position: relative;
            z-index: 1;
        }
        .footer-text {
            color: #6c757d;
            font-size: 14px;
            margin-top: -130px;
            position: relative;
            z-index: 1;
        }
        .logo-container {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        .monlogo {
            position: relative;
            bottom:100px;
            right: 70px;
            display: flex;
            justify-content: flex-start;
        }
        .monlogo img {
            width: 100%;
            max-width: 300px;
            height: auto;
            position: relative;
            z-index: 2;
        }
        
        /* Media Queries pour la responsivité */
        @media (max-width: 768px) {
            .deposit-form {
                bottom: 100px;
                height: auto;
                min-height: 450px;
                padding: 20px;
            }
            .monlogo img {
                max-width: 200px;
                bottom: 0;
                right: 0;
            }
            .footer-text {
                margin-top: -80px;
            }
            .form-control {
                height: 45px;
            }
        }
        
        @media (max-width: 576px) {
            .main-container {
                padding: 10px;
                margin: 20px auto;
            }
            .deposit-form {
                bottom: 50px;
                padding: 15px;
            }
            .monlogo img {
                max-width: 150px;
            }
            .btn-valider, .btn-annuler {
                min-width: 100px;
                padding: 8px 20px;
            }
            .footer-text {
                margin-top: -40px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div class="monlogo">
            <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo">
            </div>
            <a href="#" class="retour-btn">RETOUR</a>
        </div>
        
        <div class="deposit-form">
            <h2 class="text-center mb-4">FAIRE UN DEPOT D'ARGENT</h2>
            
            <form>
                <div class="mb-4">
                    <label for="beneficiaire" class="form-label">NUMERO BENEFICIAIRE</label>
                    <input type="text" class="form-control" id="beneficiaire">
                </div>
                
                <div class="mb-4">
                    <label for="montant" class="form-label">MONTANT</label>
                    <input type="number" class="form-control" id="montant">
                </div>
                
                <div class="d-flex justify-content-center gap-3 mt-5">
                    <button type="submit" class="btn btn-valider">VALIDER</button>
                    <button type="button" class="btn btn-annuler">ANNULER</button>
                </div>
            </form>
        </div>
        
        <p class="text-center footer-text">
            Avec FAST MONEY ka khaliss yaye borome
        </p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>