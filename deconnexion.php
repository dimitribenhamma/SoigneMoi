<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['id'] = null;
    $_SESSION['role'] = null;
    $_SESSION['privileges'] = null;
    $_SESSION['prenom'] = null;
    $_SESSION['nom'] = null;

    header("Location:index.php");
?>
