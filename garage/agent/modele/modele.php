<?php 

function getConnect(){
	require_once('connect.php');
	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$connexion->query('SET NAMES UTF8');
	return $connexion;
}
function creerC($prenom,$nom,$adresse,$numTel,$mail,$max){
	$connexion=getConnect();
	$requete="INSERT INTO client VALUES(0, '$prenom', '$nom', '$adresse', '$numTel', '$mail', '$max')";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function chercherNomClient($nom){
	$connexion=getConnect();
	$requete="select * from client where nomClient='$nom' order by idClient";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$nomClient=$resultat->fetchall();
	$resultat->closeCursor();
	return $nomClient;
}
function chercherId($id){
	$connexion=getConnect();
	$requete="select * from client where idClient='$id' order by idClient";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$idClient=$resultat->fetchall();
	$resultat->closeCursor();
	return $idClient;
}
function modifierClient($id,$prenom,$nom,$adresse,$tel,$email,$max){
	$connexion=getConnect();
	$requete="UPDATE client SET prenomClient='$prenom', nomClient='$nom', clientAdress='$adresse', telClient='$tel', emailClient='$email', montantMax='$max' WHERE idClient='$id'";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
	
}
function chercherInterventionClient($id){
	$connexion=getConnect();
	$requete="select * from intervention where idClient='$id' order by idIntervention";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$intervention=$resultat->fetchall();
	$resultat->closeCursor();
	return $intervention;
}
function PrendreInterventionValider($date,$heure,$idClient,$idEmployer,$idTypeIntervention){
	$connexion=getConnect();
	$requete="INSERT INTO intervention VALUES(0, 'enattentedepayement', 0, '$date', '$heure', '$idEmployer', '$idClient', '$idTypeIntervention')";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function cash($idclient){
	$connexion=getConnect();
	$requete="UPDATE intervention SET etatPayement='payée' WHERE idClient='$idclient' AND etatPayement='enattentedepayement'";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function differer($idclient){
	$connexion=getConnect();
	$requete1='select "client"."montantMax"-"intervention"."idTypeIntervention" FROM "client" NATURAL JOIN "intervention" WHERE idClient="$idclient"';
	if ($requete1>0){
		$requete2="UPDATE client Set montantMax='$requete1' WHERE idClient='$idClient'";
		$resultat=$connexion->query($requete2);
	$resultat->closeCursor();
	}
	$requete="UPDATE intervention SET etatPayement='endifféré' WHERE idClient='$idclient' AND etatPayement='enattentedepayement'";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function getMecanicien() {
	$connexion=getConnect();
	$requete="select * from employee where idCategorie = 3 order by nomEmployee" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	$mecaniciens=$resultat->fetchall();
	$resultat->closeCursor();
	return $mecaniciens;
}
function getInterventionsMec($idMec) {
		$connexion=getConnect();
		$requete="select * from `intervention` where `idEmployee` = ".$idMec." order by `date`" ;
		$resultat=$connexion->query($requete);
		$resultat->setFetchMode(PDO::FETCH_ASSOC);
		$interventionsMec=$resultat->fetchall();
		$resultat->closeCursor();
		return $interventionsMec;
	}

	
function getLesDonnesIntervention($idIntervention) {
		$connexion=getConnect();
		$requete="select * from `intervention`,`client`, `type_intervention` where `idIntervention` = ".$idIntervention;
		$resultat=$connexion->query($requete);
		$resultat->setFetchMode(PDO::FETCH_ASSOC);
		$LesDonnesCommande=$resultat->fetchall();
		$resultat->closeCursor();
		return $LesDonnesCommande;
	}

function getLesDonnesElement($id) {
		$connexion=getConnect();
		$requete="select `nomElement` from `type_element_intervention`, `element` where `idTypeIntervention` = ".$id.' group by `nomElement`';
		$resultat=$connexion->query($requete);
		$resultat->setFetchMode(PDO::FETCH_ASSOC);
		$LesDonnesElement=$resultat->fetchall();
		$resultat->closeCursor();
		return $LesDonnesElement;
	}

function getFormationsMec($idMec) {
	$connexion=getConnect();
	$requete="select * from `formation` where `idEmployee` = ".$idMec." order by `date`" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	$formationsMec=$resultat->fetchall();
	$resultat->closeCursor();
	return $formationsMec;
}