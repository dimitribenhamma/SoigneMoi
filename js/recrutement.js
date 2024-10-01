function displayIntitule() {    

 
  const postes = document.getElementById("postes");
  const isElementVisible = postes.style.visibility === "visible";

  if (isElementVisible) {    
    postes.style.visibility = "hidden";    
    postes.style.height = "0";       

  } else {
    postes.style.visibility = "visible";   
    postes.style.height = "auto";
  }
}


