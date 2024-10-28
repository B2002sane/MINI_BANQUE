<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrait d'Argent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/crediter_distributeur.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="header-logo">
            <img src="{{ asset('images/fast_money.png') }}" alt="Fast Money Logo" class="img-fluid">
            <div class="d-flex align-items-center">
                <img src="https://via.placeholder.com/50" class="rounded-circle" alt="User Profile">
                <span class="ms-2">Ronald Richards</span>
            </div>
        </div>

        <h5 class="form-title">CREDITER UN DISTRIBUTEUR</h5>

        <form id="realTimeForm" class="needs-validation" method="POST" action="{{ route('crediter_distributeur') }}" novalidate>
        @csrf  <!-- Protection CSRF obligatoire -->

            <div id="inputs">
            <div class="mb-4">
                <label for="telephone" class="form-label"><b>NUMERO DU DISTRIBUTEUR</b></label>
                <input type="tel" id="telephone" name="telephone" class="form-control" pattern="[0-9]{9}" placeholder="7XXXXXXXX" required>
                <div class="invalid-feedback">
                    Le numéro doit contenir exactement 9 chiffres.
                </div>
                <div class="valid-feedback">
                    Numéro valide !
                </div>
                @error('telephone')
                {{ $message }}
                @enderror
            </div>

            <div class="mb-4">
                <label for="montant" class="form-label">MONTANT</label>
                <input type="number" id="montant" class="form-control" name="montant" min="500" placeholder="saisir le montant" required>
                <div class="invalid-feedback">
                    Montant minimal 50.000 francs
                </div>
                <div class="valid-feedback">
                    Montant valide !

                </div>
                @error('montant')
                {{ $message }}
                @enderror
            </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">VALIDER</button>
                <a href="/dashboard_agent" class="btn btn-danger ms-3">ANNULER</a>
            </div>
        </form>

        <footer>
            Avec FAST MONEY sa khaliss yay borome
        </footer>
    </div>
    <script src=" {{ asset('js/crediter_distributeur.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Compte crédité avec succès !',
                text: 'le Distributeur peut consulter son compte',
                confirmButtonText: 'Retour à l\'accueil',
                confirmButtonColor: '#3085d6',
            }).then((result) => {
            if (result.isConfirmed) {
                // Rediriger vers une autre vue quand le bouton est cliqué
                window.location.href = "{{ route('agent.dashboard') }}"; // Remplacez 'nom.de.la.route' par le nom de la route de votre vue
            }
        });
        @endif
    });
</script>


</body>
</html>