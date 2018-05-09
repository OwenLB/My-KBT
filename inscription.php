
								


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
			<p>INSCRIPTION</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">
		

				</br> </br>
				<div id="inscription">
					<p>
						<div id="titre_formulaire">		
							<p>Formulaire d'inscription</p>
						</div>

				<div id='formulaire_inscription'>					
					<form method='POST' action='BDD.php'>
								
				
					<label>Identifiant: <input type="text" name="Identifiant" placeholder="Jean974" /></label><br/>
					<label>Mot de passe: <input type="password" name="mdp" placeholder="Nom de votre chien..."/></label><br/>
					<label>Confirmation du mot de passe: <input type="password" name="mdp" placeholder="= premier mot de passe"/></label><br/>
			
					<P align="center"> ----------Informations----------  </P>

					<label>Prénom : <input type="text" name="Prenom" placeholder="Informatique"/></label><br/>
					<label>Nom : <input type="text" name="Nom" placeholder="Informatique"/></label><br/>
					<label>Âge : <input type="number" name="Age" placeholder="24"/></label><br/>
					<label>Passion : <input type="text" name="Passion" placeholder="Informatique"/></label><br/>
					<label>Fillière suivie au lycée : <input type="text" name="Filliere" placeholder="Scientifique"/></label><br/>
					<label>Etudes supérieurs : <input type="text" name="sup" placeholder="DUT Informatique"/></label><br/>
					<label>Situation actuelle : <input type="text" name="actu" placeholder="Ingénieur"/></label><br/>
					<label>Localisation : <input type="text" name="Localisation" placeholder="Rennes"/></label><br/>
					<label>Contact : <input type="text" name="contact" placeholder="e-mail : ... / Facebook : ..."/></label><br/>
					<br/><br/>

					<div id="inscriptionLien">
						<p class="bouton">
							<input type="submit" value="Enregistrer" class="bouton_inscription" id="submit"/>

						</p>
					</div>
				
					</form>
					</p>	
				
			</div>
		</div>


	</br> </br>
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
		
	</body>
</html>