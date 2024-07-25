$(document).ready(function() {
    // Fonction pour valider un numéro de téléphone français qui commence par +33
    function validatePhoneNumber(number) {
        // Expression régulière pour un numéro de téléphone français commençant par +33
        var phoneRegex = /^\+33[1-9](?:[\s.-]?[0-9]{2}){4}$/;
        return phoneRegex.test(number);
    }

    // Écouter les changements dans le champ téléphone
    $('#telephone').on('input', function() {
        var phoneNumber = $(this).val();
        if (validatePhoneNumber(phoneNumber)) {
            $('#phoneError').hide();
        } else {
            $('#phoneError').show();
        }
    });
});
