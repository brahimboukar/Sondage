const theSelect = document.getElementById("theSelect");
const fonctionDetails = document.getElementById("fonctionDetails");
// const password = document.getElementById("password");
// const age = document.getElementById("age");
const add = document.getElementById("add");

theSelect.addEventListener("change", function(event){
    if(event.target.value == "1" || event.target.value == "2"){
        fonctionDetails.style.display = "block";
        // password.style.position = "relative";
        // password.style.bottom = "300px";
        // age.style.position = "relative";
        // age.style.bottom = "380px";
        // add.style.bottom = "360px";
    }
    else{
        fonctionDetails.style.display = "none";
        // password.style.position = "relative";
        // password.style.bottom = "230px";
        // age.style.position = "relative";
        // age.style.bottom = "310px";
        // add.style.bottom = "300px";
    }
});