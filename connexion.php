<?php // URL écrite en PHP
	include_once 'connexion-handler.php';
?>
<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Se connecter | Soigne Moi</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>	
	<?php	  
			include_once 'php/components/header.php';		
	?>
	<!-- la largeur du formulaire est responsive (de 35%) --> 

<div class="formulaire" style="width:35%">
		<form method="POST" action="connexion-handler.php">																																																														
			<h2 class="titre">Connexion</h2>

			<div class="grille"> <!-- disposition en grille -->
				<!-- grille divisée en 2 -->
				<!-- input avec une largeur à 250% mais padding 40px et grille -->
				<div><label for="identifiant" style="display:block">Identifiant</label></div>
				<div><input class="input" type="email" name="email" placeholder="Adresse e-mail" autofocus="true" minlenght="6" maxlenght="15" required /></div>
				<div><label for="password" style="display:block">Mot de passe</label></div>
				<div><input class="input" type="password" name="password" placeholder="Mot de passe" minlenght="6" maxlenght="15" required /></div>
			</div>
			
				<button type="submit" style="background-color:yellow;font-weight:bold;padding:10px;font-weight:bold;font-size:16px">Valider</button>						
		</form>	
</div>
	<?php
		include_once 'php/components/pied.php';
		include_once 'php/components/footer.php';
	?>
</body>
</html>