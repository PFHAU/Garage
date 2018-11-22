<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Directeur</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="vue/style/style.css"> 
	</head>
	<body>
		<header>
			<img src="vue/image/logo.jpg" alt="logo" id="logo">
		</header>
		<form method="POST" name="pageAcceuil" action="directeur.php" id="Form">
			<input type="submit" value="Home" name="boutonConnexion" />
		</form>
		<form method="POST" name="lesInterfaces" action="directeur.php" id="Form1">
			<fieldset>
				<legend>Les Interfaces</legend>
				<input type="submit" value="Créer" name="boutonCreationLoginMdp" />
				<input type="submit" value="Modifier" name="boutonModificationLoginMdp" />
				<input type="submit" value="Supprimer" name="boutonSuppressionLoginMdp" />
			</fieldset>
		</form>
		
		
		<form method="POST" name="lesInterventions" action="directeur.php" id="Form2">
			<fieldset>
				<legend>Les Interventions</legend>
				<input type="submit" value="Créer" name="boutonCreationIntervention" />
				<input type="submit" value="Modifier" name="boutonModificationIntervention" />
				<input type="submit" value="Supprimer" name="boutonSuppressionIntervention" />
			</fieldset>
		</form>
		
		<form method="POST" name="lesElements" action="directeur.php" id="Form3">
			<fieldset>
				<legend>Les Elements</legend>
				<input type="submit" value="Créer" name="boutonCreationElements" />
				<input type="submit" value="Modifier" name="boutonModificationElements" />
				<input type="submit" value="Supprimer" name="boutonSuppressionElements" />
			</fieldset>
		</form>
		
		
		<?php echo $contenu; ?>
	</body>
</html>
