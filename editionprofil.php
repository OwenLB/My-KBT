<?php
session_start(); //on commence une session

$bdd = new PDO("mysql:host=localhost;dbname=kbt_social;charset=utf8", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //connection à la BDD

if(isset($_SESSION['id'])) //si la variable de session contenant l'id (obligatoire pour avoir accès à la modification du profil) existe
{
	
	$requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?"); //on sélectionne tous les identifiant
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch(); //fetch = "va chercher"

	if(isset ($_POST['newIdentifiant']) AND !empty($_POST['newIdentifiant']) AND $_POST['newIdentifiant'] != $user['Identifiant']) //si $newIdentifiant existe ET $newIdentifiant non nul et $newIdentifiant différent de l'ancien
	{

		$newIdentifiant = htmlspecialchars($_POST['newIdentifiant']); //sécurise la variable + éviter des injection dez SQL
		$insertIdentifiant = $bdd->prepare("UPDATE utilisateurs SET Identifiant = ? Where id = ?");
		$insertIdentifiant->execute(array($newIdentifiant, $_SESSION['id'])); //on entre le nouvel identifiant dans la BDD
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 

						//idem pour tous les suivants excepté pour l'avatar 

	if(isset ($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset ($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
	{

		$mdp1 = sha1($_POST['newmdp1']);
		$mdp2 = sha1($_POST['newmdp2']);

		if($mdp1 == $mdp2)
		{
			$insertmdp = $bdd->prepare("UPDATE utilisateurs SET mdp = ? WHERE id  = ?");
			$insertmdp->execute(array($mdp1, $_SESSION['id']));
			header ('Location: Monprofil.php?id='.$_SESSION['id']);
		}
		else
		{
			$msg = "Vos deux mdp ne correspondent pas !";
		}

	} 

	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) //$_FILES = recupération d'un fichier / on vérifie si le fichier a été importer et qu'il porte un nom
	{
		$tailleMax = 2097152; //la taille max est de 2MO
		$extensionsValide = array('jpg', 'jpeg', 'gif', 'png'); //les extensions valide sont : jpg , jpeg, gif et png 

		if($_FILES['avatar']['size'] <= $tailleMax) //on vérifie que la taille de l'image est < à la taille maximum
		{
			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //strtolower(les caractères en minuscule) / substr(on ignore un caractère de la chaine(ici le point ".")) / strrchr(récupérer l'extension du fichier)
				if(in_array($extensionUpload, $extensionsValide)) //on vérifie que l'extension est valide
				{
					$chemin = "Utilisateurs/avatars/".$_SESSION['id'].".".$extensionUpload; //on affecte le chemin à la variable $chemin
					$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin); //on déplace le fichier
					if($resultat)
					{
						$updateavatar = $bdd->prepare('UPDATE utilisateurs SET avatar = :avatar WHERE id = :id'); //WHERE id = :id pour ne pas remplace tous les avatar
						$updateavatar->execute(array('avatar' => $_SESSION['id'].".".$extensionUpload, 'id' => $_SESSION['id'] )); //on insère l'avatar dans la BDD
						header ('Location: Monprofil.php?id='.$_SESSION['id']); //redirection vers la page de profil de l'utilisateur
						
					}
					else
					{
						$msg = "Erreur durant l'importation de votre avatar";
					}
				} 
				else
				{
					$msg = "Votre avatar doit être au format jpg, jpeg, gif ou png";
				}
		}
		else
		{
			$msg ="Votre avatar ne doit pas dépasser 2Mo";
		}
	}



	if(isset ($_POST['newPrenom']) AND !empty($_POST['newPrenom']) AND $_POST['newPrenom'] != $user['Prenom'])
	{

		$newPrenom = htmlspecialchars($_POST['newPrenom']); //sécurise la variable + éviter des injection dez SQL
		$insertPrenom = $bdd->prepare("UPDATE utilisateurs SET Prenom = ? Where id = ?");
		$insertPrenom->execute(array($newPrenom, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newNom']) AND !empty($_POST['newNom']) AND $_POST['newNom'] != $user['Nom'])
	{

		$newNom = htmlspecialchars($_POST['newNom']); //sécurise la variable + éviter des injection dez SQL
		$insertNom = $bdd->prepare("UPDATE utilisateurs SET Nom = ? Where id = ?");
		$insertNom->execute(array($newNom, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newAge']) AND !empty($_POST['newAge']) AND $_POST['newAge'] != $user['Age'])
	{

		$newAge = htmlspecialchars($_POST['newAge']); //sécurise la variable + éviter des injection dez SQL
		$insertAge = $bdd->prepare("UPDATE utilisateurs SET Age = ? Where id = ?");
		$insertAge->execute(array($newAge, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newPassion']) AND !empty($_POST['newPassion']) AND $_POST['newPassion'] != $user['Passion'])
	{

		$newPassion = htmlspecialchars($_POST['newPassion']); //sécurise la variable + éviter des injection dez SQL
		$insertPassion = $bdd->prepare("UPDATE utilisateurs SET Passion = ? Where id = ?");
		$insertPassion->execute(array($newPassion, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newFilliere']) AND !empty($_POST['newFilliere']) AND $_POST['newFilliere'] != $user['Filliere'])
	{

		$newFilliere = htmlspecialchars($_POST['newFilliere']); //sécurise la variable + éviter des injection dez SQL
		$insertFilliere = $bdd->prepare("UPDATE utilisateurs SET Filliere = ? Where id = ?");
		$insertFilliere->execute(array($newFilliere, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newsup']) AND !empty($_POST['newsup']) AND $_POST['newsup'] != $user['sup'])
	{

		$newsup = htmlspecialchars($_POST['newsup']); //sécurise la variable + éviter des injection dez SQL
		$insertsup = $bdd->prepare("UPDATE utilisateurs SET sup = ? Where id = ?");
		$insertsup->execute(array($newsup, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newactu']) AND !empty($_POST['newactu']) AND $_POST['newactu'] != $user['actu'])
	{

		$newactu = htmlspecialchars($_POST['newactu']); //sécurise la variable + éviter des injection dez SQL
		$insertactu = $bdd->prepare("UPDATE utilisateurs SET actu = ? Where id = ?");
		$insertactu->execute(array($newactu, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	} 



	if(isset ($_POST['newLocalisation']) AND !empty($_POST['newLocalisation']) AND $_POST['newLocalisation'] != $user['Localisation'])
	{

		$newLocalisation = htmlspecialchars($_POST['newLocalisation']); //sécurise la variable + éviter des injection dez SQL
		$insertLocalisation = $bdd->prepare("UPDATE utilisateurs SET Localisation = ? Where id = ?");
		$insertLocalisation->execute(array($newLocalisation, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
	}



	if(isset ($_POST['newcontact']) AND !empty($_POST['newcontact']) AND $_POST['newcontact'] != $user['contact'])
	{

		$newcontact = htmlspecialchars($_POST['newcontact']); //sécurise la variable + éviter des injection dez SQL
		$insertcontact = $bdd->prepare("UPDATE utilisateurs SET contact = ? Where id = ?");
		$insertcontact->execute(array($newcontact, $_SESSION['id']));
		header ('Location: Monprofil.php?id='.$_SESSION['id']);
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
			<p>Edition de mon profil</p>
		</div>
	<!------------------------------CORPS----------------------------------->
		<div id="article">		<!-- contenu de la page -->
			<div style="text-align:justify">	
				</br>
				<div id="avatar">
					<?php
					if(!empty($user['avatar']))
					{
					?>
						<img height="160" width="160" src="Utilisateurs/avatars/<?php echo $user['avatar'] ?>">
					<?php	
					}
					?>
				</div>
				</br>
				<div id="information">
					<form method='POST' action='' enctype="multipart/form-data"> <!-- entype=encode nécessaire à l'importation d'un fichier de type image -->

						<table>
							<tr>
								<td align="right">								
									<label>Identifiant: </label>
								</td>
								<td>
									<input type="text" name="newIdentifiant" placeholder="Jean974" value="<?php echo $user['Identifiant'] ?>" /><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Mot de passe: </label> 
								</td>
								<td>
									<input type="password" name="newmdp1" placeholder="Nom de votre chien..." /><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Confirmation - Mot de passe: </label> 
								</td>
								<td>
									<input type="password" name="newmdp2" placeholder="Nom de votre chien..." /><br/>
								</td>
							</tr>
						</table>
													<p align="center"> ----------Informations----------  </p>

						<table>
							<tr>
								<td align="right">
									<label>Prénom : </label>
								</td>
								<td> 
									<input type="text" name="newPrenom" placeholder="Jean" value="<?php echo $user['Prenom'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Nom : </label> 
								</td>
								<td>
									<input type="text" name="newNom" placeholder="Aboubakar" value="<?php echo $user['Nom'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Âge : </label>
								</td>
								<td>
									<input type="number" name="newAge" placeholder="24" value="<?php echo $user['Age'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Passion : </label>
								</td>
								<td>
									<input type="text" name="newPassion" placeholder="Informatique" value="<?php echo $user['Passion'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right"> 
									<label>Fillière suivie au lycée : </label> 
								</td>
								<td>
									<input type="text" name="newFilliere" placeholder="Scientifique" value="<?php echo $user['Filliere'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Etudes supérieures : </label>
								</td>
								<td> 
									<input type="text" name="newsup" placeholder="DUT Informatique" value="<?php echo $user['sup'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Situation actuelle : </label>
								</td>
								<td>
									<input type="text" name="newactu" placeholder="Ingénieur" value="<?php echo $user['actu'] ?>"/><br/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Localisation : </label>
								</td>
								<td>
									<input type="text" name="newLocalisation" placeholder="Rennes" value="<?php echo $user['Localisation'] ?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Contact : </label>
								</td>
								<td>
									<input type="text" name="newcontact" placeholder="e-mail : ... / Facebook : ..." value="<?php echo $user['contact'] ?>"/>
								</td>
							</tr>
							<tr>
								<td align="right">
									<label>Avatar: </label> 
								</td>
								<td>
									<input type="file" name="avatar" /><br/>
								</td>
							</tr>
						</table>
									</br>

						<div id="inscriptionLien">
							<p class="bouton">
								<input type="submit" value="Valider " class="bouton_inscription" id="submit"/>
							</p>
						</div>
					</form>
<?php 
if(isset($msg))
{
	echo $msg;
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

header("Location: connexion.php");

}
?>