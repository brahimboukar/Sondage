document.addEventListener('DOMContentLoaded', function () {
    var snackbar = document.getElementById("snackbar");
    if (snackbar.innerText.trim() !== "") {
        snackbar.className = "show";
        setTimeout(function () {
            snackbar.className = snackbar.className.replace("show", "");
        }, 3000);
    }
});
