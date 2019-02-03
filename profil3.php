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
			<p>PAGE DE PROFIL</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">

					<?php
						$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
						$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 3 ");
						$resultat = $requete->fetch();
					?>
				<!-- contenu de la page -->
			<div style="text-align:justify">	
				</br>
				<div id="avatar">
					<?php
					if(!empty($resultat['avatar']))
					{
					?>
						  <img height="160" width="160" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>">
					<?php	
					}
					?>
				</div>
				</br>
				<div id="information">
					

					Prenom : <?php  echo $resultat['Prenom'] ?> </br></br></br>
					Nom : <?php  echo $resultat['Nom'] ?> </br></br></br>
					Age : <?php  echo $resultat['Age'] ?> </br></br></br>
					Passion : <?php  echo $resultat['Passion'] ?> </br></br></br>
					Fillière : <?php  echo $resultat['Filliere'] ?> </br></br></br>
					Etudes supérieurs : <?php  echo $resultat['sup'] ?> </br></br></br>
					Situation actuelle : <?php  echo $resultat['actu'] ?> </br></br></br>
					Localisation : <?php  echo $resultat['Localisation'] ?> </br></br></br>
					Contact : <?php  echo $resultat['contact'] ?> </br></br></br>





				</div>
			</div>
		</div>
	</br> </br>
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
		
	</body>
</html>