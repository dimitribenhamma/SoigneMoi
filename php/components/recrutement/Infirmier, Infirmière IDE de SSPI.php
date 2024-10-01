	<!-- Web service	 
	 Les fichiers de base de données SQL :  'membres.sql' -->
	 
	 <!-- Le git est disponible à : https://github.com/dimitribenhamma/SoigneMoi -->

	 <!-- parties sql issue de base de données -->
     <?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
} ?>

	 <!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hôpital à Lille : Soigne Moi</title>
	<link href="../../../css/style.css" rel="stylesheet">
	<script src="../../../js/recrutement.js" async></script>
  </head>
  <body> 
	<?php	  
		// On inclu les paramètres dynamiques 'metiers.php' dans le modèle de 'recrutement.php'		
		include_once '../../../php/components/header.php';		
	?>
<?php echo 'Page de recrutement : Infirmier, Infirmière IDE de SSPI' ?>
<?php
		include_once '../../../php/components\pied.php';
	?>

	<?php
		include_once '../../../php/components/footer.php';
	?>
 </body>
</html>