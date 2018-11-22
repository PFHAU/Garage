<?php
require_once('controleur/controleurAgent.php');

try{


	if(isset($_POST['CMClient'])){
		
		ctlCMclient();
		
	}else if(isset($_POST['rechercherNom'])){
			echo "testsucces";
			$nom=$_POST['RClient'];
			ctlRN($nom);//ensuite pour l'affichage faire comme dans l'exo.

	}else if(isset($_POST['creer'])){
		
			ctlAfficherCreer();

	}if(isset($_POST['validerCreer'])){
			$prenom=$_POST['prenom'];
			$nom=$_POST['nom'];
			$adresse=$_POST['adresse'];
			$numTel=$_POST['numTel'];
			$mail=$_POST['mail'];
			$max=$_POST['max'];
			ctlCreation($prenom,$nom,$adresse,$numTel,$mail,$max);
			

	}else if (isset($_POST['modifClient'])){
			$id=$_POST['id'];
			$prenom=$_POST['prenom'];
			$nom=$_POST['nom'];
			$adresse=$_POST['adresse'];
			$numTel=$_POST['numTel'];
			$mail=$_POST['mail'];
			$max=$_POST['max'];
		ctlMC($id,$prenom,$nom,$adresse,$numTel,$mail,$max);
	
	}else if(isset($_POST['synthese'])){
		ctlAfficherSC();
	}else if(isset($_POST['syntheseClient'])){
			$id=$_POST['RClientId'];
 			ctlId($id);

	}else if(isset($_POST['SAV'])){
		
		ctlSAV();
		
	}if(isset($_POST['validerRId'])){
			
			$RIdClient=$_POST['RIdClient'];
			ctlIdSAV($RIdClient);

	}else if(isset($_POST['cash'])){
		$idclient=$_POST['idClient'];
		ctlCash($idclient);

	 
	}else if(isset($_POST['differer'])){
		$idclient=$_POST['idClient'];
		ctlDifferer($idclient);
	 
	}else if(isset($_POST['rembourser'])){
		ctlRembourser();
	}else if (isset($_POST['PI'])){
		ctlPrendreIntervention();
	}else if (isset($_POST['prendereInterventionValider'])){
		$date=$_POST['date'];
		$heure=$_POST['heure'];
		$idClient=$_POST['idClient'];
		$idEmployer=$_POST['idEmployer'];
		$idTypeIntervention=$_POST['idTypeIntervention'];
		ctlprendreInterventionValider($date,$heure,$idClient,$idEmployer,$idTypeIntervention);
	}	
	else if(isset($_POST['RDV']))
	{
		$courantMec					=	isset($_POST['mecanicien'])		?	$_POST['mecanicien']			:	1;
		$couranteSemaine			=	isset($_POST['semaine'])			?	$_POST['semaine']			:	1;
		$idIntervention				=	isset($_POST['idIntervention'])	?	$_POST['idIntervention']		:	null;
		
		ctlAfficherRDV($courantMec,$couranteSemaine,$idIntervention);
	
	}else{
		ctlAcceuil();
	}
	}catch(Exception $e){
		echo $e;
		/*$msg = $e.getMessage();
		ctlErreur($msg);*/
	}