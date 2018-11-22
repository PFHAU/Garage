<!DOCTYPE html>
<html lang="fr">
    <head>
      <title>Agent</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="vue/styles/stylePFO.css">	  
    </head>
	<body>
	<header><img src="vue/images/logo.jpg" alt="logo" id="logo"></header>
	<nav>
	<form method="post" action="controleurFrontalAgent.php">
		<ul>
			<li><input type="submit" value="Creer|Modifier" name="CMClient"></li>
			<li><input type="submit" value="Synthese Client" name="synthese"></li>
			<li><input type="submit" value="Service Après Vente" name="SAV"></li>
			<li><input type ="submit" value="Contact" name="RDV"></li>
		</ul>
		
		
			
		<?php require_once('controleur/controleurAgent.php'); ?>
		</form>
	</nav>
	
	<div class="content">
		
		<div class="shedule">
			<?php echo $contenu;?>
		</div>
	</div>
	
	<footer></footer>
	</body>
</html>