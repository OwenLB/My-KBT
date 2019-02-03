<?php
session_start(); //on commencence une session

$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connection à la BDD

if(isset($_GET['id']) AND $_GET['id'] > 0) //si l'id transmise par la page connexion existe et qu'elle est > à 0 (simple sécurité)
{
	$getid = intval($_GET['id']); //on stock l'id
	$requser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?'); //on sélectionne toute les données où l'id est = a l'id transmise
	$requser->execute(array($getid));
	$userinfo = $requser->fetch(); //fetch = "va chercher"




?>



<html>
	<head>
		<meta charset="utf-8"/>
		<title>MY KBT</title>
			<link rel="stylesheet" type="text/css" href="style.css" media="all"/> 
	</head>
	<body>
	
		<div id="banner1">
			<p>MY KBT</p>

		</div>
			
		<div id="menu">
			<ul>
				<li><a href="home.php">ACCUEIL</a><li>
				<li><a href="eleves.php">ELEVES</a><li>
				<li><a href="connexion.php">CONNEXION</a><li>
				<li><a href="minichat.php">CHAT</a><li>
			</ul>
		</div>
		
		
		<div id="banner2">
			<p>MON PROFIL</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">	
				</br>
				<div id="avatar">
					<?php
					if(!empty($userinfo['avatar'])) //si la variable de l'avatar existe
					{
					?>
						  <img height="160" width="160" src="Utilisateurs/avatars/<?php echo $userinfo['avatar'] ?>"> <!-- on l'affiche -->
					<?php	
					}
					?>
				</div>
				</br>
				<div id="information">
					Prenom : <?php  echo $userinfo ['Prenom']; ?> </br></br></br> <!-- simple affichage de variable -->
					Nom : <?php  echo $userinfo ['Nom']; ?> </br></br></br>
					Age : <?php  echo $userinfo ['Age']; ?> </br></br></br>
					Passion : <?php  echo $userinfo ['Passion']; ?> </br></br></br>
					Fillière : <?php  echo $userinfo ['Filliere']; ?> </br></br></br>
					Etudes supérieures : <?php  echo $userinfo ['sup']; ?> </br></br></br>
					Situation actuelle : <?php  echo $userinfo ['actu']; ?> </br></br></br>
					Localisation : <?php  echo $userinfo ['Localisation']; ?> </br></br></br>
					Contact : <?php  echo $userinfo ['contact']; ?> </br></br></br>
						</br>

					<?php
					if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
					{
					?>
						<a href="editionprofil.php">Editer mon profil</a> </br>
						<a href="deconnexion.php">Se déconnecter</a>
					<?php 
					}
					?>

				</div>
			</div>
		</div>
							</br> </br>
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
	</body>
</html>


<?php
}
else
{

header("Location: home.php");

}
?>