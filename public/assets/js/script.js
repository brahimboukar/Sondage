const theSelect = document.getElementById("theSelect");
const fonctionDetails = document.getElementById("fonctionDetails");
// const password = document.getElementById("password");
// const age = document.getElementById("age");
//const add = document.getElementById("add");

theSelect.addEventListener("change", function(event){
    if(event.target.value == "1" || event.target.value == "2"){
        fonctionDetails.style.display = "block";
        
    }
    else{
        fonctionDetails.style.display = "none";
        
    }
});