document.addEventListener("DOMContentLoaded", function() {
    var snackbar = document.getElementById("snackbar");
    
    if (snackbar) {
        // Add the "show" class to display the snackbar
        snackbar.className = "snackbar show";
    }
});

function hideSnackbar() {
    var snackbar = document.getElementById("snackbar");
    if (snackbar) {
        // Remove the "show" class to hide the snackbar
        snackbar.className = snackbar.className.replace("show", "");
    }
}