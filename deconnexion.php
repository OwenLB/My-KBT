<?php
session_start(); //on commencence une nouvelle session (créer un variable de session)
$_SESSION = array(); //dans cette variable de session on entre un tableau vide
session_destroy(); // on détruit la session
header("Location: connexion.php"); //on redirige l'utilisateur vers la page de de connexion
?>