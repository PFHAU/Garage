<?php
	require_once('vue/vueAgent.php');
	require_once('modele/modele.php');
	
function ctlCMclient(){
	CMclient();//vue
}
function ctlAcceuil(){
	afficherAcceuil();//vue
}
function ctlAfficherCreer(){
	afficherCreer();//vue
	
}
function ctlCreation($prenom,$nom,$adresse,$numTel,$mail,$max){
	creerC($prenom,$nom,$adresse,$numTel,$mail,$max);//modele
	afficherAcceuil();
}
function ctlAfficherSC(){
	afficherSC();
}
function ctlAfficherM(){
	AfficherM();//vue
}
function ctlMC($id,$prenom,$nom,$adresse,$numTel,$mail,$max){
	modifierClient($id,$prenom,$nom,$adresse,$numTel,$mail,$max);//modele
}
function ctlSAV(){
	afficherSAV();//vue
}
function ctlRN($nom){
	if(!empty($nom)){
	$client=chercherNomClient($nom);//model
	afficherClient($client);
	}else{
		throw new Exception("champ est vide");
	}
}
function ctlId($id){
	if(!empty($id)){
	$client=chercherId($id);//model
	afficherClientid($client);//vue
	//afficher les intervention.	
}else{
	throw new Exeption("champ est vude");
}
}
function ctlIdSAV($id){
		if(!empty($id)){
	$client=chercherId($id);//model
	$intervention=chercherInterventionClient($id);//model
	afficherIntervention($intervention);//afficher les intervention.	//vue
}else{
	throw new Exeption("champ est vude");
}
}
function ctlCash($idclient){
	cash($idclient);//model
	afficherAcceuil();//vue

}
function ctlPrendreIntervention(){
	afficherPrendreIntervention();//vue
}
function ctlDifferer($idclient){
	differer($idclient);//modele
	afficherAcceuil();//vue
}
function ctlPrendreInterventionValider($date,$heure,$idClient,$idEmployer,$idTypeIntervention){
	PrendreInterventionValider($date,$heure,$idClient,$idEmployer,$idTypeIntervention);//modele
}	
function ctlAfficherRDV($courantMec,$couranteSemaine,$idIntervention)
	{
		$mecaniciens				   = getMecanicien();
		$interventionsMec   	       = getInterventionsMec($courantMec);
		$formationsMec	       	       = getFormationsMec($courantMec);
		$LesDonnesIntervention         = [];
		$LesDonnesElementsIntervention = [];
		if($idIntervention != null) 
		{
			$LesDonnesIntervention = getLesDonnesIntervention($idIntervention);
			if(count($LesDonnesIntervention)>0) 
			{
				$LesDonnesElementsIntervention = getLesDonnesElement($LesDonnesIntervention[0]['idTypeIntervention']);
			}
			
		}
		afficherRDV($courantMec,$couranteSemaine,$mecaniciens,$interventionsMec,$formationsMec,$LesDonnesIntervention,$LesDonnesElementsIntervention);
	}

function ctlErreur($msg){
	afficherErreur($msg);
}
