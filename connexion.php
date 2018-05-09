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
			<p>CONNEXION</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">	
				</br> </br>
				<div id="identification">
					<P>

						<div id="titre_formulaire">		
							Entrez vos identifiants
						</div>
						<form method='post' action='traitement.php'>

										</br></br></br>
								 <label for="email">	Quel est votre e-mail ? </label>
					       <input type="email" name="email" id="email" placeholder="dupond.jean@gmail.com" /></br></br></br></br></br>

					        	<label for="mot_de_passe">	Quel est votre mot de passe ?</label>
					       <input type="password" name="mot_de_passe" id="mot_de_passe" /></br>

					    </form>
					</br></br></br></br></br></br></br></br>



					<div id="inscriptionLien">
						<ul>
							<li><a href="inscription.php">S'inscrire</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
	</br> </br>
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
		
	</body>
</html>