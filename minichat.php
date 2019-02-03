<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8"/>
         <title>MY KBT</title>
        <link rel="stylesheet" type="text/css" href="style.css" media="all"/> 
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
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
            <p>Mini-Chat</p>
        </div>
    
    <form action="minichat_post.php" method="post">
        <p>
            <table align='center'>
                <tr>
                    <td>
        <label for="pseudo">Pseudo</label> : 
                    </td>
                    <td>
        <input type="text" name="pseudo" id="pseudo" /><br />
                    </td>
                </tr>
                <tr>
                    <td>
        <label for="message">Message</label> : 
                    </td>
                    <td> 
        <input type="text" name="message" id="message" /><br />
                    </td>
                </tr>
            </table>
        <input type="submit" value="Envoyer" />
  </p>
    </form>

<?php
// Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=kbt_social;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
  echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
        <div id="footer">
            <p>
             ND.Kerbertrand | Tous droits reserves</p>        <!-- bas de page -->
        </div>

    </body>
</html>