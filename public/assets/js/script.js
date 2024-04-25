const theSelect = document.getElementById("theSelect");
const fonctionDetails = document.getElementById("fonctionDetails");


theSelect.addEventListener("change", function(event){
    if(event.target.value == "1" || event.target.value == "2"){
        fonctionDetails.style.display = "block";
    }
    else{
        fonctionDetails.style.display = "none";
    }
});