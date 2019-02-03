<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connection à la BDD

if(isset($_POST['formconnexion'])) //si le bouton du formulaire de connexion a été appuié
{
	$Identifiantconnect = htmlspecialchars($_POST['Identifiantconnect']); //sécurise le site afin d'éviter les insertions de SQL
	$mdpconnect = sha1($_POST['mdpconnect']); //on hash les mdp pour plus de sécurité
	if(!empty($Identifiantconnect) AND !empty($mdpconnect)) //si les 2 champs ont été remplie
	{
		$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE Identifiant = ? AND mdp = ?" );  //si les identifiants sont présent dans la BDD
		$requser->execute(array($Identifiantconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch(); //fetch = "va chercher"
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['Prenom'] = $userinfo['Prenom'];	
			$_SESSION['Nom'] = $userinfo['Nom'];
			$_SESSION['Age'] = $userinfo['Age'];
			$_SESSION['Passion'] = $userinfo['Passion'];
			$_SESSION['Filliere'] = $userinfo['Filliere'];
			$_SESSION['sup'] = $userinfo['sup'];
			$_SESSION['actu'] = $userinfo['actu'];
			$_SESSION['Location'] = $userinfo['Localisation'];
			$_SESSION['contact'] = $userinfo['contact'];

			header("Location: Monprofil.php?id=".$_SESSION['id']); //on le redirige vers sa page de profil via sont URL (semblable à la méthode GET)
		}
		else
		{
			$erreur ="Mauvais identifiant ou mot de passe !";
		}

	}
	else
	{
		$erreur = "Tous les champs doivent être complétés !";
	}

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
			<p>CONNEXION</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">	
					</br> 
				<div id="identification">
					<P>

						<div id="titre_formulaire">		
							Entrez vos identifiants
						</div>

						<form method='post' action=''>
										</br>
							<table>
								<tr>
									<td>
										<label for="Identifiant">	Quel est votre Identifiant ?</label>
									</td>
									<td>
					       				<input type="text" name="Identifiantconnect" id="email" placeholder="Identifiant" />
					       			</td>
					       		</tr>
					       			</br></br></br></br></br>
					       		<tr>
					       			<td>
					        			<label for="mot_de_passe">	Quel est votre mot de passe ?</label>
					        		</td>
					        		<td>
					        			<input type="password" name="mdpconnect" id="mot_de_passe" />
					        		</td>
					        	</tr>
					        	<tr>
					        		<td align=center>
					      				<input type="submit" name=formconnexion value= "Se connecter" />
					      			</td>
					      		</tr>
					      	</table>
					    </form>

<?php 
	if(isset($erreur)) //si $erreur existe 
	{
		echo '<font color="red">' .$erreur. '</font>'; //on l'affiche
	}
?>	
										</br></br></br></br></br></br></br></br>

					<table align='center'>
							<tr>	
								<td>					
						<font color="white" > Pas encore de compte ? Inscrivez vous ici : </font>
								</td>
							</tr>
						</table>						
					
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