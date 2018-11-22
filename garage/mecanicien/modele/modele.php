<?php 

function getConnect(){
	require_once('connect.php');
	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$connexion->query('SET NAMES UTF8');
	return $connexion;
}

function getMecanicien() {
	$connexion=getConnect();
	$requete="select * from employee where idCategorie = 3 order by nomEmployee" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$mecaniciens=$resultat->fetchall();
	$resultat->closeCursor();
	return $mecaniciens;
}

function getInterventionsMec($idMec) {
	$connexion=getConnect();
	$requete="select * from `intervention` where `idEmployee` = ".$idMec." order by `date`" ;
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	$commandesMec=$resultat->fetchall();
	$resultat->closeCursor();
	return $commandesMec;
}

function getLesDonnesIntervention($idIntervention) {
	$connexion=getConnect();
	$requete="SELECT * FROM client NATURAL JOIN intervention  NATURAL JOIN type_intervention NATURAL JOIN employee WHERE idIntervention = '$idIntervention'"; 
	//"select * from `employee`, `intervention`,`client`, `type_intervention`, `type_element_intervention`,`element` where `idIntervention` = ".$idIntervention;
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

function ajouterFormation($id,$date,$heure) {
	$connexion=getConnect();
	$requete="INSERT INTO formation VALUES(0, '$id', '$date', '$heure')";
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
	return true;
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