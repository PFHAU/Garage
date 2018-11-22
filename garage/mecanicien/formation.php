<?php
	require_once('controleur/controleur.php');
	

	if(isset($_POST['link'])) {
		header('Location: mecanicien.php');
	} else {
		$mecanicien		=	isset($_POST['mecanicien'])		?	$_POST['mecanicien']	:	null;
		$date			=	isset($_POST['date'])			?	$_POST['date']			:	null;
		$time			=	isset($_POST['time'])			?	$_POST['time']			:	null;
		$button			=	isset($_POST['button'])			?	$_POST['button']		:	null;
		$contenu        =   "";
		controleurFormation($mecanicien,$date,$time,$button, $contenu);
	}
