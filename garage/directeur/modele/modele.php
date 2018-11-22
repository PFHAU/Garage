<?php
function getConnect(){
	require_once('connect.php');
	$connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$connexion->query('SET NAMES UTF8');
	return $connexion;
}
function validerCreationLoginMdp($nom1,$prenom1,$login1,$mdp1,$categorie){
	$connexion=getConnect();
	$requete="insert into employee values (0, '$categorie', '$prenom1', '$nom1', '$login1', '$mdp1')" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function verifLog($login,$mdp){
	$connexion=getConnect();
	$requete="select nomEmployee from employee where login='$login' and password='$mdp'";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	$nomEmployee=$resultat->fetchall();
	$resultat->closeCursor();
	return $nomEmployee;
}
function modifLog($login, $mdp){
	$connexion=getConnect();
	$nom=verifLog('$login','$mdp');
	$requete="update employee set login='$login', password='$mdp' where nomEmployee='$nom->nomEmployee'" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function supprLog($login,$mdp){
	$connexion=getConnect();
	$requete="delete from employee where login='$login', password='$mdp'" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}

function creatInt($nom,$prix){
	$connexion=getConnect();
	$requete="insert into type_intervention (nomTypeIntervention, prix) values ('$nom','$prix')" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function verifInt($nom){
	$connexion=getConnect();
	$requete="select idTypeIntervention from type_intervention where nomTypeIntervention='$nom'";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_ASSOC);
	$num=$resultat->fetchall();
	$resultat->closeCursor();
	return $num;
}
function modInt($nom,$prix){
	$connexion=getConnect();
	$requete="update type_intervention set prix='$prix' where nomTypeIntervention='$nom'" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function supprInt($nom){
	$connexion=getConnect();
	$requete="delete from type_intervention where nom='$nom'" ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}
function creatElem($nomEle, $nomTypInt){
	$connexion=getConnect();
	$requete="insert into element (nomElem) values ('$nomEle'); insert into type_element_intervention (idTypeIntervention,idElement) values ($(select idTypeIntervention from type_intervention where nomTypeIntervention=$nomTypInt),$(select idTypeIntervention from type_intervention where nomTypeIntervention=$nomTypInt )) " ;
	$resultat=$connexion->query($requete);
	$resultat->closeCursor();
}