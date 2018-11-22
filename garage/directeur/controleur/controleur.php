<?php
	require_once('modele/modele.php');
	require_once('vue/vue.php');
	
	function ctlErreur($msg){
		$contenu=$msg;
		require_once('vue/gabarit.php');
	}
	function ctlafficherFormInterfaces(){
		afficherFormInterfaces(); 
	}
	function ctlafficherFormLog(){
		afficherFormLog();
	}
	function ctlafficherSupprLog(){
		afficherSupprLog();
	}
	function ctlFormCreatInt(){
		afficherFormCreatInt();
	}
	function ctlFormModInt(){
		afficherFormModInt();
	}
	function ctlafficherMenu(){
		afficherMenu();   
	}
	function ctlafficherSupprInt(){
		afficherSupprInt();
	}
	function ctlafficherCreatElem(){
		afficherCreatElem();
	}
	function ctlValiderCreationLoginMdp($nom,$prenom,$login,$mdp,$categorie){
		if($nom!="" && $prenom!="" && $login!="" && $mdp!=""){
			validerCreationLoginMdp('$nom','$prenom','$login','$mdp','$categorie');
			echo "Créé avec succes";
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
		
	}
	function ctlLog($login,$mdp){
		if($login!= "" || $mdp!= ""){
			if(verifLog('$login','$mdp')!=""){
				afficherFormLog2();
			}else{
				ctlErreur("Erreur, login et/ou mot de passe erronee");
			}
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	function ctlModLog($login,$mdp){
		if($login!= "" || $mdp!= ""){
			modifLog('$login','$mdp');
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	function ctlSupprLog($login,$mdp){
		if($login!= "" || $mdp!= ""){
			if(verifLog($login,$mdp)!=""){
				supprLog();
			}else{
				ctlErreur("Erreur, login et/ou mot de passe erronee");
			}
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	function ctlCreatInt($nom,$prix){
		if($nom!="" || $prix!=""){
			creatInt($nom,$prix);
			echo "Crée avec succes";
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	function ctlInt($nom){
		if($nom!=""){
			if(verifInt($nom)!=""){
				afficherFormModInt2($nom);
			}else{
				ctlErreur("Erreur, type intervention inexistante");
			}
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	function ctlModInt($nom,$prix){
		modInt($nom,$prix);
	}
	function ctlsupprInt($nom){
		if(verifInt($nom)!=""){
			supprInt($nom);
		}else{
			ctlErreur("Erreur, type intervention inexistante");
		}
	}
	function ctlCreatElem($nomEle,$nomTypInt){
		if($nomEle!="" || $nomTypInt!=""){
			if(verifInt($nomEle)!=""){
				creatElem($nomEle, $nomTypInt);
			}else{
				ctlErreur("Erreur, type intervention inexistante");
			}
		}else{
			ctlErreur("Erreur, vous avez pas entree tous les donnees");
		}
	}
	