$(document).ready(function() {
    function toggleFonctionDetails() {
        var isChecked1 = $('.fcd-show[value="1"]').is(':checked');
        var isChecked2 = $('.fcd-show[value="2"]').is(':checked');
        
        // If both checkboxes are deselected, disable the entire Fonction Détailer section
        if (!isChecked1 && !isChecked2) {
            $('#fonctionDetails').find('input, select, textarea').prop('disabled', true); // Disable all form elements inside the div
            $('#fonctionDetails').css('opacity', '0.5'); // Optionally, reduce opacity to indicate it's disabled
        } else {
            $('#fonctionDetails').find('input, select, textarea').prop('disabled', false); // Enable all form elements inside the div
            $('#fonctionDetails').css('opacity', '1'); // Reset opacity
        }
    }

    // Initial check on page load
    toggleFonctionDetails();

    // Listen for changes on the checkboxes
    $('.fcd-show').on('change', function() {
        toggleFonctionDetails();
    });
});