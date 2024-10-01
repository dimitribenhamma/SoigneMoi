	<!-- Web service	 
	 Les fichiers de base de données SQL :  'membres.sql' -->
	 
	 <!-- Le git est disponible à : https://github.com/dimitribenhamma/SoigneMoi -->

	 <!-- parties sql issue de base de données -->

	 <!DOCTYPE html> 
<html lang="fr">
  <head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hôpital à Lille : Soigne Moi</title>
	<link href="css/style.css" rel="stylesheet">
	<script src="js/recrutement.js" async></script>
  </head>
  <body> 
	<?php	  
		// On inclu les paramètres dynamiques 'metiers.php' dans le modèle de 'recrutement.php'		
		include_once 'data/metiers.php'; 
		include_once 'php/components/header.php';		
	?>
	
	<section style="margin-top:100px">
		<div style="background-color:blue;margin-left:10%;margin-right:10%;padding-top:20px;padding-bottom:20px">
			<span class="titre" style="margin-left:10%;color:white">Ma Recherche</span>			
			<div style="margin-top:30px;margin-bottom:60px;margin-left:10%">								
					<form method="POST">
						<label for="keywords"><input type="text"name="keywords" placeholder="Par mot-clés"></input>
						<label for="category" style="margin-left:10px"><input type="text"name="category" placeholder="Par catégorie"></input>						
						<label for="category" style="margin-left:20px;color:white">CDI<input type="checkbox" value="cdi" style="margin-left:15px"></input>
						<label for="category" style="margin-left:20px;color:white">CDD<input type="checkbox" value="cdd" style="margin-left:15px"></input>
						<label for="category" style="margin-left:20px;color:white">Stage<input type="checkbox" value="stage" style="margin-left:15px"></input>
						<input type="submit" style="margin-left:30px" value="rechercher"></input>
					</form>
			</div>
		</div>
	</section>
	
	<section style="margin-top:50px">
	
		<!-- Card Metiers dynamiques + Hide ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->		
			<?php	
																	
					foreach ($metiers as $metier){	
						if(($metier != NULL) && isset($metier)){	?>
							
						<div id="intitule" onclick="displayIntitule()"><strong><?= $metier['intitule']. '<br/>' ?></strong></div>									
						<div id="postes"> <?php {
							
							if(isset($metier['postes'])){							
							foreach ($metier as $subcle => $subval){
								if($subval == $metier['postes']){									 
								foreach ($subval as $subsubcle => $subsubval){ ?>
		<a href=php/components/recrutement/ . <?php $obj = htmlspecialchars(json_encode($metier["postes"][$subsubcle],ENT_NOQUOTES)) ; echo $obj[0] . '.php'?>
		'>
		<?php echo $metier["postes"][$subsubcle] ; ?>
	</a>
<br/><?php } }}																															
										 						
									}
		}}	?> </div><br/> <?php
	}
			?>
					
								
</section>

	<?php
		include_once 'php/components/pied.php';
	?>

	<?php
		include_once 'php/components/footer.php';
	?>
 </body>
</html>