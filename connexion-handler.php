<?php
//  Connexion handler est appelé à chaque fois que le header est appelé 
// hors on ne peut pas faire session_start() plusieurs fois

// On vérifie donc que la session n'a jamais été start avant de la start

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$servername = 'localhost';
$username = 'root';
$password = '';
$bdd = 'membres';
$sql = "SELECT * FROM `patient` WHERE email = :email AND password = :password"; // paramètres nommés pour contrer les injections SQL

            // On essaie de se connecter en base
try{
    $FormIsComplete = isset($_POST['email']) AND isset($_POST['password']);
    $conn = new PDO("mysql:host=$servername;dbname=$bdd", $username, $password);
            // On veut définir le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>     
    <script>console.log('Connexion réussie');</script>
    <?php
        if($FormIsComplete){
            // On select * pour récupérer toutes les info et ensuite mettre le nom et prénom dans la variable global $_SESSION
            $sth = $conn->prepare($sql); // demander la correspondance identifiant et mot de passe											
            $sth->bindParam(':email' , $_POST['email']);        
            $sth->bindParam(':password' , $_POST['password']);
            $sth->execute();
            $resultat = $sth->fetch(PDO::FETCH_ASSOC);
            // cas avec succès
            if(isset($resultat['id'])){
                // On passe par un token unique sur id d'un utilisateur					
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['role'] = 'utilisateur';

            // C'est ici qu'on indique qu'on est connecté ainsi que le nom prénom
                $_SESSION['privileges'] = "connecte";
                $_SESSION['prenom'] = $resultat['prenom'];
                $_SESSION['nom'] = $resultat['nom'];
                ?>     
                <script>console.log('Bienvenue vous êtes en ligne !');</script>
                <?php            
                header("Location: index.php");
            } else
            {	
            // Si la connexion est un echec on retire le privilege connecte
                $_SESSION['privileges'] = "";
                ?>     
                <script>console.log('Réessayez de vous connecter');</script>
                <?php    																
                header("Location: connexion.php");
            }
        } else 
        {
            ?>
            <!-- Petit feedback si problème de transmission email/password -->
            <script>console.log('aucun formulaire email/password transmis');</script>
            <?php
        }
}	
catch(PDOException $e){
    ?>
             <!-- un petit feedback pour nous -->
        <script>console.error('erreur de connexion database');</script>
    <?php

    error_log($e->getMessage());

            // Peut-être rediriger vers une page spécial ici (d'erreur d'accès à la base de donnée)
}