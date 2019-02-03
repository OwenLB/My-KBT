<?php
		$bdd = new PDO("mysql:host=localhost;dbname=kbt_social", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 1 ");
		$resultat = $requete->fetch();
			echo $resultat['Prenom']
?>