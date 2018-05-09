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
			</ul>
		</div>
		
		
		<div id="banner2">
			<p>PAGE DE PROFIL</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">	
				</br>
				<div id="avatar">
				</div>
				</br>
				<div id="information">
					<?php
						$bdd = new PDO("mysql:host=localhost;dbname=kbt_social", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						$requete = $bdd->query("SELECT * FROM utilisateur WHERE id= '1' ")
						$resultat = $requete->fetch();

					?>

				Prenom : <?php  echo $resultat['Prenom'] ?>
				Nom : 
				Age :
				Passion :
				Fillière :
				Etudes supérieurs : 
				Situation actuelle :
				Localisation :
				Contact : 





				</div>
			</div>
		</div>
	</br> </br>
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
		
	</body>
</html>