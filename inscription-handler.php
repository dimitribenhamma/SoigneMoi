<?php 
		session_start();
	
	// identifie les connexions meme Proxy !
	function getIP(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip = $_SERVER['HTTP_CLIENT_IP'];}
			elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
			else{$ip = $_SERVER['REMOTE_ADDR'];}
			return $ip;}
		
	$subscriptionTries = 0;
	$closure = Closure::fromCallable('getIP');

	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$bdd = 'membres';

		try{	
			$FormIsComplete = isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['code_postal']) && isset($_POST['email']) && isset($_POST['password']);		
			$sql = "SELECT id from `patient` WHERE email = :email";
			$sql_insert = "INSERT INTO `ip` (ip) VALUES (".getIP().");" ;

			$conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
			
			// On veut definir le mode d'erreur de PDO sur Exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			?>     

			<?php
				if($FormIsComplete){											
						
			// on veut limiter à 3 tentatives pour une seule ip : pour cela on l'enregistre lors de la première inscription du patient
					if($subscriptionTries == 3){
						$subscriptionTries = 0;
			// interdit l'ip pendant un certain temps donne
						sleep(10); 
						$dbco->query($sql_insert); // enregistre l'ip blacklistée				
						echo "connexion.php";
					} else {
						$sth = $conn->prepare($sql);	// paramètres nommés pour contrer les injections SQL								
						$sth->bindParam(':email' , $_POST['email']);        
			// $sth->bindParam(':password' , $_POST['password']);
			// Tester les utilisateurs correspondants
						$sth->execute();
						$resultat = $sth->fetch(PDO::FETCH_ASSOC);
						if(!isset($resultat['id'])){
			// Utilisateur non dans la base de donnée , 
			// avec syntaxe sur les colonnes exacte comme Values 
			// mais pas en base de donnée nécéssairement
							$st = $conn->prepare("INSERT INTO patient 
								(
									civilite, 
									nom, 
									prenom, 
									code_postal, 
									email, 
									password,
									date,
									ip
								) 
									VALUES 
								(
									:civilite, 
									:nom, 
									:prenom, 
									:code_postal, 
									:email, 
									:password,
									:date,
									:ip
								)"
							); 
							$st->bindParam('civilite' , $_POST['civilite']);
							$st->bindParam('nom' , $_POST['nom']);
							$st->bindParam('prenom' , $_POST['prenom']);
							$st->bindParam('code_postal' , $_POST['code_postal']);
							$st->bindParam('email' , $_POST['email']);
							$st->bindParam('password' , $_POST['password']);
							$st->bindParam('date' , $_POST['date']);
							$st->bindParam('ip', getIP());

							$params = [
								"civilite" => $_POST["civilite"],
								"nom" => $_POST["nom"],
								"prenom" => $_POST["prenom"],						
							];

							$st->execute();

							
			//On connect l'utilisateur fraichement inscrit
							$_SESSION['role'] = 'utilisateur';
							$_SESSION['privileges'] = "connecte";

							$_SESSION['civilite'] = $params['civilite'];
							$_SESSION['prenom'] = $params['prenom'];
							$_SESSION['nom'] = $params['nom'];
							header("Location:index.php");										
							
							?>
							<script>console.log('Inscription et Connexion réussie');</script>
							<?php
						}
			// Utilisateur déjà dans la base de donnée
						else {
							?>     
							<script>console.log('Utilisateur pas dans la base de donnée !');</script>
							<?php
							$subscriptionTries++;?>
							<script>console.log('Réessayez de vous inscrire !');</script>
							<?php
							header("Location:inscription.php");}
						}									
				}
		}
			
		catch (Throwable $e){
			// lancera l'exception
			echo "TOTO";
			var_dump($e);
			error_log($e->getMessage());
			// header("Location:login.php");
		}												
?>