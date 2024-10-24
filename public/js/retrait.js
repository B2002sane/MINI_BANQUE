 // Fonction de validation pour le numéro de téléphone
 function validatePhone(input) {
    const regex = /^(70|75|76|77|78)[0-9]{7}$/;  // Commence par 70, 75, 76, 77, ou 78
    if (input.value === "") {
        input.classList.add('is-invalid');  // Champ vide : erreur
        input.nextElementSibling.textContent = "Le champ téléphone est obligatoire.";
    } else if (!regex.test(input.value)) {
        input.classList.add('is-invalid');  // Format incorrect
        input.nextElementSibling.textContent = "Numéro invalide. Format attendu : 9 chiffres commençant par 70, 75, 76, 77 ou 78.";
    } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
}

// Fonction de validation pour le montant
function validateMontant(input) {
    if (input.value === '') {
        input.classList.add('is-invalid');  // Champ vide : erreur
        input.nextElementSibling.textContent = "Le champ montant est obligatoire.";
    } else if (input.value < 500) {
        input.classList.add('is-invalid');  // Montant trop petit
        input.nextElementSibling.textContent = "Vous ne pouvez retirer moins de 500";
    } else {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }
}

// Sélection du formulaire et des champs
const form = document.getElementById('realTimeForm');
const telephoneInput = document.getElementById('telephone');
const passwordInput = document.getElementById('montant');

// Ajout d'événements de validation à chaque saisie
telephoneInput.addEventListener('input', () => validatePhone(telephoneInput));
passwordInput.addEventListener('input', () => validateMontant(passwordInput));

// Empêcher l'envoi du formulaire si des champs sont invalides
form.addEventListener('submit', (event) => {
    validatePhone(telephoneInput);
    validateMontant(montantInput);

    if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add('was-validated');
});