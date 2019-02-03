<html>
	<head>
		<meta charset="utf-8"/>
		<title>MY KBT</title>
			<link rel="stylesheet" type="text/css" href="style.css" media="all"/> 
	</head>
	<body>
<!-------------------HAUT DE PAGE------------------------------------>	
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
			<p>ELEVES</p>
		</div>
<!------------------------------CORPS----------------------------------->
	<div id="article">		<!-- contenu de la page -->
		<div style="text-align:justify">
			<p> 
				</br> </br>
					<div id="Block">

						<!-- Fiches des Eleves-->
						<div class ="fiches">
							<?php
								$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // connexion a la BDD
								$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 1 "); // sélection tous les champs où l'id est = à 1
								$resultat = $requete->fetch(); //fetch = va chercher
							?>
							<div id="fichesNom">
								<p> <?php  echo $resultat['Prenom'] ?> <?php  echo $resultat['Nom'] ?> </p> <!-- affichage simple de variable -->
							</div>
							
							<div id="fichesAvatar">
							 <?php
							if(!empty($resultat['avatar'])) // si la variable de l'avatar n'est pas vide
							{
							?>
								  <img height="100" width="100" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>"> <!-- on affiche l'image grâce a son chemin -->
							<?php	
							}
							?>
							</div>

							<div id="fichesInfo">
								<div id="fichesInfoTitle">
									<p> Infos </p>
								</div>
								</br>
									<p>âge: <?php  echo $resultat['Age'] ?></p> <!-- il ne reste plus qu'a afficher les valeurs appelées -->						
									<p>classe: <?php  echo $resultat['Filliere'] ?></p>						    
									<p>passion: <?php  echo $resultat['Passion'] ?></p>								
								</br>
							</div>
														
							<div id="fichesLien">
								<ul>
									<a href="profil1.php">Afficher le profil</a>		
								</ul>
							</div>
						</div>	

						<!-- Nouvelle fiche des Eleves-->

						<div class ="fiches">
							<?php
								$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 2 ");
								$resultat = $requete->fetch();
							?>
							<div id="fichesNom">
								<p> <?php  echo $resultat['Prenom'] ?> <?php  echo $resultat['Nom'] ?> </p>
							</div>
							
							<div id="fichesAvatar">
								<?php
							if(!empty($resultat['avatar']))
							{
							?>
								  <img height="100" width="100" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>">
							<?php	
							}
							?>
							</div>

							<div id="fichesInfo">
								<div id="fichesInfoTitle">
									<p> Infos </p>
								</div>
								</br>
									<p>âge: <?php  echo $resultat['Age'] ?></p>								
									<p>classe: <?php  echo $resultat['Filliere'] ?></p>						    
									<p>passion: <?php  echo $resultat['Passion'] ?></p>								
								</br>
							</div>
							
							<div id="fichesLien">
								<ul>
									<a href="profil2.php">Afficher le profil</a>		
								</ul>
							</div>
						</div>

						<!-- Nouvelle fiche des Eleves-->

						<div class ="fiches">
							<?php
								$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 3 ");
								$resultat = $requete->fetch();
							?>
							<div id="fichesNom">
								<p> <?php  echo $resultat['Prenom'] ?> <?php  echo $resultat['Nom'] ?> </p>
							</div>
							
							<div id="fichesAvatar">
								<?php
								if(!empty($resultat['avatar']))
								{
								?>
									  <img height="100" width="100" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>">
								<?php	
								}
								?>
							</div>

							<div id="fichesInfo">
								<div id="fichesInfoTitle">
									<p> Infos </p>
								</div>
								</br>
									<p>âge: <?php  echo $resultat['Age'] ?></p>								
									<p>classe: <?php  echo $resultat['Filliere'] ?></p>						    
									<p>passion: <?php  echo $resultat['Passion'] ?></p>									
								</br>
							</div>
							<div id="fichesLien">
								<ul>
									<a href="profil3.php">Afficher le profil</a>		
								</ul>
							</div>
						</div>

						<!-- Nouvelle fiche des Eleves-->

						<div class ="fiches">
							<?php
								$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 4 ");
								$resultat = $requete->fetch();
							?>
							<div id="fichesNom">
								<p> <?php  echo $resultat['Prenom'] ?> <?php  echo $resultat['Nom'] ?> </p>
							</div>
							
							<div id="fichesAvatar">
								<?php
							if(!empty($resultat['avatar']))
							{
							?>
								  <img height="100" width="100" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>">
							<?php	
							}
							?>
							</div>

							<div id="fichesInfo">
								<div id="fichesInfoTitle">
									<p> Infos </p>
								</div>
								</br>
									<p>âge: <?php  echo $resultat['Age'] ?></p>								
									<p>classe: <?php  echo $resultat['Filliere'] ?></p>						    
									<p>passion: <?php  echo $resultat['Passion'] ?></p>								
								</br>
							</div>
							<div id="fichesLien">
								<ul>
									<a href="profil4.php">Afficher le profil</a>		
								</ul>
							</div>
						</div>

						<!-- Nouvelle fiche des Eleves-->

						<div class ="fiches">
							<?php
								$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
								$requete = $bdd->query("SELECT * FROM utilisateurs WHERE id= 5 ");
								$resultat = $requete->fetch();
							?>
							<div id="fichesNom">
								<p> <?php  echo $resultat['Prenom'] ?> <?php  echo $resultat['Nom'] ?> </p>
							</div>
							
							<div id="fichesAvatar">
								<?php
								if(!empty($resultat['avatar']))
								{
								?>
									  <img height="100" width="100" src="Utilisateurs/avatars/<?php echo $resultat['avatar'] ?>">
								<?php	
								}
								?>
							</div>

							<div id="fichesInfo">
								<div id="fichesInfoTitle">
									<p> Infos </p>
								</div>
								</br>
									<p>âge: <?php  echo $resultat['Age'] ?></p>								
									<p>classe: <?php  echo $resultat['Filliere'] ?></p>						    
									<p>passion: <?php  echo $resultat['Passion'] ?></p>								
								</br>
							</div>
							<div id="fichesLien">
								<ul>
									<a href="profil5.php">Afficher le profil</a>		
								</ul>
							</div>
						</div>
						

				</br></br>		<!-- sauts de ligne pour bloquer le footer en bas de la page -->
			</p>
		</div>
	</div>
	<div id="footer">
		<p>ND.Kerbertrand | Tous droits réservés</p>
	</div>
		
	</body>
</html>