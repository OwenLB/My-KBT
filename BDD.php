	<?php


		$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

			if(isset($_POST['Identifiant']) AND isset($_POST['mdp']) AND  isset($_POST['Prenom']) AND  isset($_POST['Nom']) AND  isset($_POST['Age']) AND  isset($_POST['Passion']) AND  isset($_POST['Filliere']) AND  isset($_POST['sup']) AND  isset($_POST['actu']) AND  isset($_POST['Localisation']) AND  isset($_POST['contact']))
{
	$requete = $bdd->prepare("INSERT INTO utilisateurs(Identifiant, mdp, Prenom, Nom, Age, Passion, Filliere, sup, actu, Localisation, contact) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$requete->execute(array($_POST['Identifiant'], $_POST['mdp'], $_POST['Prenom'], $_POST['Nom'], $_POST['Age'], $_POST['Passion'], $_POST['Filliere'], $_POST['sup'], $_POST['actu'], $_POST['Localisation'], $_POST['contact']));
	

		header('Location: eleves.php');
	
	}
?>