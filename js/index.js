

function hide() {
// visibility n'y change rien il faut appeler display
  const effectifsDivEl = document.getElementById("#intitule");
  effectifsDivEl.innerHTML = "";

  if (getComputedStyle(effectifsDivEl).display != "none") {
      effectifsDivEl.style.display = "none";
  }
  else {
      effectifsDivEl.style.display = "block";
}
}

foreach($metiers as $key=>$value){?>	
	<div id ="#intitule" onclick='metier()'>																													
					<?php  echo $metiers[$key]['intitule']; ?></div>						
					
					<div id="hide" style="visibility: hidden; height:0">
									<?php foreach($value['postes'] as $key=>$value)
									{
										
										if(($value != NULL) && isset($value)) 
										echo $value; ?> <br/> 								
									<?php 
										} ?></div><br/>
					<?php }?>

