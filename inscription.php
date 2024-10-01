<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S'inscrire | Soigne Moi</title>
	<link href="css/style.css" rel="stylesheet">
  </head>
  <body>  
  <?php	  
		include_once 'php/components/header.php';		
	?>
<section>

<!-- la largeur du formulaire est responsive (de 35%) --> 
<div class="formulaire" style="width:35%">
		<form method="POST" action="inscription-handler.php">																																																														
			<h2 class="titre">Inscription</h2>

			<div class="grille"> <!-- disposition en grille -->
				<!-- grille divisée en 2 -->
				<!-- input avec une largeur à 250% mais padding 40px et grille -->
				<div><label for="name" style="display:block">Civilite</label></div>
				<div><select name="civilite" id="input">
						<option value="">Choisir une option</option>
						<option name="Mr" value="Monsieur">Monsieur</option>
						<option name="Mme" value="Madame">Madame</option>
					 </select>
				</div>
				<div><label for="name" style="display:block">Nom</label></div>
				<div><input type="text" name="nom" placeholder="Nom" required /></div>
				<div><label for="surname" style="display:block">Prénom</label></div>
				<div><input type="text" name="prenom" placeholder="Prénom" required /></div>
				<div><label for="postal" style="display:block">Code postal</label></div>
				<div><input type="text" name="code_postal" minlenght="4" maxlenght="10" placeholder="Code postal" required /></div>
				<div><label for="email" style="display:block">E-mail</label></div>
				<div><input type="email" name="email" minlenght="4" maxlenght="30" placeholder="E-mail" required /></div>
				<div><label for="password" style="display:block">Mot de passe</label></div>
				<div><input type="password" name="password" placeholder="Mot de passe" minlenght="4" maxlenght="15" required /></div>
				<div><label for="date" style="display:block">Date de naissance</label></div>
				<!-- Type date (calendrier) -->
				<div><input type="date" name="date" placeholder="jj / mm / aaaa" required /></div>
				
			</div>
			
			<button type="submit" style="background-color:yellow;font-weight:bold;padding:10px;font-weight:bold;font-size:16px">Valider</button>						
		</form>					
</div>	
</section>	
	<?php
		include_once 'php/components/pied.php';
		include_once 'php/components/footer.php';
	?>
  </body>
</html>