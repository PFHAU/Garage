<?php

	require_once('controleur/controleur.php');
	{
		if(isset($_GET['link'])) 
		{
			header('Location: formation.php');
		}
		else 
		{
			$courantMec					=	isset($_GET['mecanicien'])		?	$_GET['mecanicien']			:	1;
			$couranteSemaine			=	isset($_GET['semaine'])			?	$_GET['semaine']			:	1;
			$idIntervention				=	isset($_GET['idIntervention'])	?	$_GET['idIntervention']		:	null;
			
		
			controleurMecanicien($courantMec,$couranteSemaine,$idIntervention);
		}
		
		
	}
