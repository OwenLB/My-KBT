<?php

$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connection à la BDD
if(isset($_POST['forminscription']))
{
	if(!empty($_POST['Identifiant']) AND !empty($_POST['mdp']) AND  !empty($_POST['Prenom']) AND  !empty($_POST['Nom']) AND  !empty($_POST['Age']) AND  !empty($_POST['Passion']) AND  !empty($_POST['Filliere']) AND  !empty($_POST['sup']) AND  !empty($_POST['actu']) AND  !empty($_POST['Localisation']) AND  !empty($_POST['contact'])) // vérification que tous les champs ont été rempli
		{
			$Identifiant = htmlspecialchars($_POST['Identifiant']); //sécurise le site afin d'éviter les insertions de SQL
			$mdp = sha1($_POST['mdp']); //on hash les mdp pour plus de sécurité
			$mdp2 = sha1($_POST['mdp2']);

			$Identifiantlenght = strlen($Identifiant); //on récupère la longueur de l'identifiant

			if($Identifiantlenght <=255) //on vérifie qu'il est < a 255
			{
				$reqIdentifiant = $bdd->prepare("SELECT * FROM utilisateurs WHERE Identifiant = ?"); //on sélectionne tous les identifiant
				$reqIdentifiant->execute(array($Identifiant));	
				$Identifiantexist = $reqIdentifiant->rowCount(); //on compte le nombre de fois où l'identifiant est dans la base de données (pas plus de 1 fois normalement) 

				if($Identifiantexist == 0) //si = l'identifiant n'est pas dans la base de données
				{

					if($mdp == $mdp2) //on vérifie si les 2mdp sont identiques
					{
						$requete = $bdd->prepare("INSERT INTO utilisateurs(Identifiant, mdp, Prenom, Nom, Age, Passion, Filliere, sup, actu, Localisation, contact) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
						$requete->execute(array($Identifiant, $mdp, $_POST['Prenom'], $_POST['Nom'], $_POST['Age'], $_POST['Passion'], $_POST['Filliere'], $_POST['sup'], $_POST['actu'], $_POST['Localisation'], $_POST['contact'])); //récupération des valeurs du formulaire
		

						header('Location: home.php'); //redirection vers la page des élèves

				}
				else
				{
					$erreur = "Vos mots de passe de correspondent pas !";
				}

			}
			else
			{
				$erreur = "Cet identifiant est déjà utilisé !";
			}
		}
		else
		{
			$erreur = "Votre Identifiant de doit pas dépasser 255 caractères !";
		}

			
	
	}
	else
	{
		$erreur= "Tous les champs doivent êtres complétés !";
	}
}
else
{
	
}
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
							<form method='POST' action=''>

								<table>
									<tr>
										<td align="right">								
											<label>Identifiant: </label>
										</td>
										<td>
											<input type="text" name="Identifiant" placeholder="Jean974" /><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Mot de passe: </label> 
										</td>
										<td>
											<input type="password" name="mdp" placeholder="Nom de votre chien..."/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Confirmation du mot de passe: </label>
										</td>
										<td>
											<input type="password" name="mdp2" placeholder="= premier mot de passe"/><br/>
										</td>
									</tr>
									<tr>
										<td>
											</br><font color="white"> Informations : </font>
										</td>						
									<tr>
										<td align="right">
											</br><label>Prénom : </label>
										</td>
										<td> 
											</br><input type="text" name="Prenom" placeholder="Jean"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Nom : </label> 
										</td>
										<td>
											<input type="text" name="Nom" placeholder="Aboubakar"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Âge : </label>
										</td>
										<td>
											<input type="number" name="Age" placeholder="24"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Passion : </label>
										</td>
										<td>
											<input type="text" name="Passion" placeholder="Informatique"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right"> 
											<label>Fillière suivie au lycée : </label> 
										</td>
										<td>
											<input type="text" name="Filliere" placeholder="Scientifique"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Etudes supérieurs : </label>
										</td>
										<td> 
											<input type="text" name="sup" placeholder="DUT Informatique"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Situation actuelle : </label>
										</td>
										<td>
											<input type="text" name="actu" placeholder="Ingénieur"/><br/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Localisation : </label>
										</td>
										<td>
											<input type="text" name="Localisation" placeholder="Rennes"/>
										</td>
									</tr>
									<tr>
										<td align="right">
											<label>Contact : </label>
										</td>
										<td>
											<input type="text" name="contact" placeholder="e-mail : ... / Facebook : ..."/>
									
										</td>
									</tr>					
								</table>
											</br>

								<div id="inscriptionLien">
									<p class="bouton">
										<input type="submit" name="forminscription"value="Je m'inscris" class="bouton_inscription" id="submit"/>
									</p>
								</div>
							</form>

							<?php 
							if(isset($erreur)) //si $erreur existe 
							{
								echo '<font color="red">' .$erreur. '</font>'; //on l'affiche
							}
							?>

						</div>
					</p>	
				</div>
			</div>	
		</div>

			</br> </br> </br> </br>

			
		<div id="footer">
			<p>ND.Kerbertrand | Tous droits réservés</p>		<!-- bas de page -->
		</div>
	</body>
</html>