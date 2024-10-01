	<!-- Web service	 
	 Le fichier de base de données SQL :  'membres.sql' -->
	 
	 <!-- Le git est disponible à : https://github.com/dimitribenhamma/SoigneMoi -->

	 <!-- parties sql issue de base de données -->
 
<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();		
	}
	$userIsConnected = isset($_SESSION['privileges']) && $_SESSION['privileges'] === "connecte";
?>

<!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hôpital à Lille : Soigne Moi</title>
	<link href="css/style.css" rel="stylesheet">
	<script src="js/index.js" async></script>
  </head>
  <body> 
	<?php	  
		include_once 'php/components/header.php';
		// Avant de faire un test sur une propriété (ici privilege) d'un tableau (ici $_SESSION)
		// doit checker que la clé existe bien dans ce tableau
		//On utilise pour cela isset() 
		if(!$userIsConnected){
			include_once 'connexion-handler.php';		
		}
	?>
   <section>
	<!-- partie centrale de index.php -->
	 <?php
	 if (!$userIsConnected) 
	 { 
	 ?>
		<div class="identification">
			<table>
				<span class="center titre">Vous n'êtes pas connecté</span>			
				<div style="margin-top:30px;margin-bottom:60px">								
					<button class="connexion"><a href="connexion.php">Connexion</a></button>
					<button class="inscription"><a href="inscription.php">Inscription</a></button>
				</div>
			</table>
		</div>
	<?php } ?>
	<?php if ($userIsConnected) 
		{ 
	?>
			<div style="background-color:blue;margin-left:10%;margin-right:10%;padding-top:20px;padding-bottom:20px">
				<span class="titre" style="margin-left:10%;color:white">Ma Recherche</span>			
				<div style="margin-top:30px;margin-bottom:60px;margin-left:10%">								
						<form method="POST">
							<input type="text"name="discipline" placeholder="Discipline ..."></input>
							<input type="text"name="medecin" placeholder="Médecin ..."></input>	
							<input type="text"name="date-entree" placeholder="Date d'entrée ..."></input>	
							<input type="text"name="motif" placeholder="Motif ..."></input>						
							<input type="submit" style="margin-left:30px" value="rechercher"></input>
						</form>
				</div>
			</div>
	<?php 
		} 
	?>

		<div class="grille-index">
				<div>La vie à l'hôpital</a></div>
				<div>Vos démarches en ligne</div>
				<div>Un hôpital à votre écoute</div>
				<div><button class="bouton"><a href="la-vie-a-l-hopital.php">voir plus</a></button></div>
				<div><button class="bouton"><a href="vos-demarches-en-ligne.php">consulter</a></button></div>
				<div><button class="bouton"><a href="un-hopital-a-votre-ecoute.php">se renseigner</a></button></div>			
				<div>Nos services</div>
				<div>Prise en charge des patients</div>
				<div>Règlement</div>
				<div><button class="bouton"><a href="nos-services.php">voir plus</a></button></div>
				<div><button class="bouton"><a href="prise-en-charge-des-patients.php">consulter</a></button></div>
				<div><button class="bouton"><a href="reglement.php">se renseigner</a></button></div>
		</div>
	</section>
	<section style="margin-bottom:100px">
			<p class="presentation-index">
			Soigne Moi est un hôpital de la région Lilloise principalement qui est fort de plus de 200 experts dans les domaines tels que la réanimation, la chirurgie, la cancérologie, la rééducation, la natalité, la neurologie <img src="img/web/icone/loupe.png" /> ...</p>
			
			<p class="presentation-index">Un doute <img src="img/web/icone/emoticone_loupe.jpg" /> ? Une question sur la procédure d'admission ou de suivi en ligne ? N'hésitez pas à nous contacter, notre équipe se fera un plaisir de vous rensiegner et de vous accompagner dans votre démarche</p>
	</section>
	
	<?php
		include_once 'php/components/pied.php';
		include_once 'php/components/footer.php';
	?>
 </body>
</html>