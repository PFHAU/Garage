<?php
	
	if (isset($_POST['entrer']))
	{
		$login = $_POST['login'];
		$pswd  = $_POST['mdp'];
		chercherEmployee ($login, $pswd);
	}
	function getConnect(){
		require_once('mecanicien/modele/connect.php');
		$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$connexion->query('SET NAMES UTF8');
		return $connexion;
	} 
	function chercherEmployee($login, $pswd) 
	{
		$connexion=getConnect();
		$requete="SELECT idCategorie FROM employee WHERE login = '$login' AND password = '$pswd'" ;
		$resultat=$connexion->query($requete);
		$resultat->setFetchMode(PDO::FETCH_OBJ);
		$authentification=$resultat->fetchall();
		$resultat->closeCursor();
		return $authentification;
	}
	
	$erreur ='';
	if(!empty($login) && !empty($pswd))
	{	
		$authentification = chercherEmployee($login, $pswd);
		if ($authentification)
		{
			foreach($authentification as $value) 
			{
				if ($value->idCategorie == 3)
				{
					echo '<meta http-equiv="refresh" content="0; url=http:mecanicien/mecanicien.php ">';
				}
				else if ($value->idCategorie == 2)
				{
					echo '<meta http-equiv="refresh" content="0; url=http:agent/controleurFrontalAgent.php ">';
				}
				else echo '<meta http-equiv="refresh" content="0; url=http:directeur/directeur.php ">';
			}
		}
		else $erreur = '<div class="badBox">Login ou mot de passe mauvais</div>';
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Acceuil</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="style/style.css">	  
    </head>
	<body>	
		<header><img src="image/logo.jpg" alt="logo" id="logo"></header>
		
		<div class="content">
			<div class="acceuil">
			<form action="" method="POST">
			<fieldset>
				<h3>Authentinification</h3>
				<p><label for="login">Login</label><input type="text" name="login" id="login" class="input"></p>
				<p><label for="mdp">Mot de passe</label><input type="password" name="mdp" id="mdp" class="input"></p>
				<p><input type="submit" value="Entrer" class="button" name="entrer"><input type="reset" value="Effacer" class="button" name="effacer"></p>
				<?php echo $erreur;?> 
				</fieldset>
			</form>
			
		<footer></footer>
	</body>
</html>
