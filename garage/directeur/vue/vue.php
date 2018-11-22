<?php

	function afficherMenu(){
		require_once('vue/gabarit.php');
	}
	
	function afficherFormInterfaces(){
		$contenu='';
		$contenu.='<form method="post" name="laCreationInterface" action="directeur.php" id="interface1">
			<fieldset>
				<legend>Creation</legend>
				<p>
					<label>Nom employee : </label>
					<input type="text" name="nom1"/>
				</p>
				<p>
					<label>Prenom employee : </label>
					<input type="text" name="prenom1"/>
				</p>
				<p>
					<label>Login : </label>
					<input type="text" name="login1"/>
				</p>
				<p>
					<label>Mot de passe : </label>
					<input type="text" name="mdp1"/>
				</p>
				<p>
					<label>Categorie : </label>
					<label> 1. </label>
					<label> 2. </label>
					<input type="number" min="1" max="3" step="1" name="idCategorie" value="1"/>
					<label> 3. </label>
				</p>
				<input type="submit" value="Valider" name="boutonValiderCreationLoginMdp" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherFormLog(){
		$contenu='';
		$contenu.='<form method="post" name="laModificationInterface" action="directeur.php" id="interface2">
			<fieldset>
				<legend>Entrez votre login et mot de passe</legend>
				<p>
					<label>Login : </label>
					<input type="text" name="login2"/>
				</p>
				<p>
					<label>Mot de passe : </label>
					<input type="text" name="mdp2"/>
				</p>
				<input type="submit" value="Valider" name="boutonModifierLoginMdp" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherFormLog2(){
		$contenu='';
		$contenu.='<form method="post" name="laModificationInterface2" action="directeur.php" id="interface2.1">
			<fieldset>
				<legend>Entrez votre nouveau login et mot de passe</legend>
				<p>
					<label>Login : </label>
					<input type="text" name="login21"/>
				</p>
				<p>
					<label>Mot de passe : </label>
					<input type="text" name="mdp21"/>
				</p>
				<input type="submit" value="Valider" name="boutonModifierLoginMdp2" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherSupprLog(){
		$contenu='';
		$contenu.='<form method="post" name="laSuppressionInterface" action="directeur.php" id="interface3">
			<fieldset>
				<legend>Entrez le login et le mot de passe</legend>
				<p>
					<label>Login : </label>
					<input type="text" name="login3"/>
				</p>
				<p>
					<label>Mot de passe : </label>
					<input type="text" name="mdp3"/>
				</p>
				<input type="submit" value="Suppression" name="boutonSuppressionLoginMdp2" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	
	function afficherFormCreatInt(){
		$contenu='';
		$contenu.='<form method="post" name="laCreationIntervention" action="directeur.php" id="intervention1">
			<fieldset>
				<legend>Creation d un type d intervention</legend>
				<p>
					<label>Nom type intervention : </label>
					<input type="text" name="nomInt1"/>
				</p>
				<p>
					<label>Prix intervention : </label>
					<input type="number" min="0" max="2000" step="1" value="100" name="prixInt1"/>
				</p>
				<input type="submit" value="Valider" name="boutonCreationIntervention2" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherFormModInt(){
		$contenu='';
		$contenu.='<form method="post" name="laModificationIntervention" action="directeur.php" id="intervention2">
			<fieldset>
				<legend>Modification d un type d intervention</legend>
				<p>
					<label>Nom type intervention : </label>
					<input type="text" name="nomInt2"/>
				</p>
				<input type="submit" value="Valider" name="boutonModifierIntervention" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherFormModInt2($nom){
		$contenu='';
		$contenu.='<form method="post" name="laModificationIntervention1" action="directeur.php" id="intervention3">
			<fieldset>
				<legend>Modification d un type d intervention</legend>
				<p>
					<label>Nom type intervention : </label>
					<input type="text" name="nomInt3" value="$nom" readonly />
				</p>
				<p>
					<label>Prix intervention : </label>
					<input type="number" min="0" max="2000" step="1" value="100" name="prixInt3"/>
				</p>
				<input type="submit" value="Valider" name="boutonModifierIntervention1" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	function afficherSupprInt(){
		$contenu='';
		$contenu.='<form method="post" name="laSuppressionIntervention" action="directeur.php" id="intervention4">
			<fieldset>
				<legend>Suppression type intervention</legend>
				<p>
					<label>Nom type intervention : </label>
					<input type="text" name="nomInt4"/>
				</p>
				<input type="submit" value="Suppression" name="boutonSupprimerIntervention" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}
	
	
	function afficherCreatElem(){
		$contenu='';
		$contenu.='<form method="post" name="laCreationElement" action="directeur.php" id="element1">
			<fieldset>
				<legend>Creation element</legend>
				<p>
					<label>Nom element : </label>
					<input type="text" name="nomEle1"/>
				</p>
				<p>
					<label>Nom type intervention : </label>
					<input type="text" name="nomTypInt1"/>
				</p>
				<input type="submit" value="Valider" name="boutonCreationElement" />
			</fieldset>
		</form>';
		require_once('vue/gabarit.php');
	}