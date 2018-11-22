<?php
	require_once('controleur/controleur.php');
	
	try{
	if(isset($_POST['boutonCreationLoginMdp'])){
		ctlafficherFormInterfaces();
	}
	if(isset($_POST['boutonConnexion'])){
		ctlafficherMenu();
	}
	if(isset($_POST['boutonValiderCreationLoginMdp'])){
		$nom1=$_POST['nom1'];
		$prenom1=$_POST['prenom1'];
		$login1=$_POST['login1'];
		$mdp1=$_POST['mdp1'];
		$categorie=$_POST['idCategorie'];
		ctlValiderCreationLoginMdp('$nom1','$prenom1','$login1','$mdp1','$categorie');
	}
	if(isset($_POST['boutonModificationLoginMdp'])){
		ctlafficherFormLog();
	}
	if(isset($_POST['boutonModifierLoginMdp'])){
		$login2=$_POST['login2'];
		$mdp1=$_POST['mdp2'];
		ctlLog('$login2','$mdp2');
	}
	if(isset($_POST['boutonModifierLoginMdp2'])){
		$login21=$_POST['login21'];
		$mdp21=$_POST['mdp21'];
		ctlModLog('$login21','$mdp21');
	}
	if(isset($_POST['boutonSuppressionLoginMdp'])){
		ctlafficherSupprLog();
	}
	if(isset($_POST['boutonSuppressionLoginMdp2'])){
		$login3=$_POST['login3'];
		$mdp3=$_POST['mdp3'];
		ctlsupprLog('$login3','$mdp3');
	}
	
	if(isset($_POST['boutonCreationIntervention'])){
		ctlFormCreatInt();
	}
	if(isset($_POST['boutonCreationIntervention2'])){
		$nomInt1=$_POST['nomInt1'];
		$nomPrix1=$_POST['nomPrix1'];
		ctlCreatInt('$nomInt1','$nomPrix1');
	}
	if(isset($_POST['boutonModificationIntervention'])){
		ctlFormModInt();
	}
	if(isset($_POST['boutonModifierIntervention'])){
		$nomInt2=$_POST('nomInt2');
		ctlInt('$nomInt2');
	}
	if(isset($_POST['boutonModifierIntervention1'])){
		$nomInt3=$_POST('nomInt3');
		$prixInt3=$_POST('prixInt3');
		ctlModInt('$nomInt3','$prixInt3');
	}
	if(isset($_POST['boutonSuppressionIntervention'])){
		ctlafficherSupprInt();
	}
	if(isset($_POST['boutonSupprimerIntervention'])){
		$nomInt4=$_POST('nomInt4');
		ctlsupprInt('$nomInt4');
	}
	if(isset($_POST['boutonCreationElements'])){
		ctlafficherCreatElem();
	}
	if(isset($_POST['boutonCreationElement'])){
		$nomEle1=$_POST('nomEle1');
		$nomTypInt1=$_POST('nomTypInt1');
		ctlCreatElem('$nomEle1','$nomTypInt1');
	}
	
	else{
		ctlafficherMenu();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}catch(Exception $e){
		$msg=$e->getMessage();
		ctlErreur($msg);
	}
	