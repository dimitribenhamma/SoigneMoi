<?php	  	
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
		include_once 'connexion-handler.php';
	} ?>

<?php
	$userIsConnected = isset($_SESSION['privileges']) && $_SESSION['privileges'] === "connecte";
?>

<header>
	<nav style="height:40px;width:100%;background-color:blue;">
			<a href="index.php"><img style="margin-top:-5px" src="img/web/images/logo_SoigneMoi.png" width="50px" height="50px" /></a>	
			<span style="color:white">Soigne Moi</span></a>
			<span style="color:white;text-align:center;margin:auto;position:relative;left:30%">L'hôpital vous accueil de 7h30 à 16h</span>
			
			<?php
				if (!$userIsConnected) { ?>
					<a class="bandeau" href="inscription.php">Inscription</a>
					<a class="bandeau" href="connexion.php">Connexion</a>
				<?php } 
			?>

			<?php
				if ($userIsConnected) { ?>
				<!--
					En PHP les template string se font de la manière suivante : 
					"je suis $prenom et j'ai $age ans"
					Cependant lorsqu'il s'agit de tableau la syntaxe change et devient :
					"je suis {$_SESSION['prenom']} et j'ai {$_SESSION['age']} ans"
				-->
				<a class="bandeau" href="deconnexion.php">
					<img src="img\web\icone\deconnexion.png"  />
				</a>
				<span class="bandeau" style="color:white" href="profil.php">
					Bienvenue <?php echo "{$_SESSION['prenom']} {$_SESSION['nom']}" ?>
				</span>
				
				<?php } 
			?>

	</nav>				
		<div><img src="img/web/images/banniere.jpg" width="100%" height="300px" /></div>
</header>