<?php
	require_once('modele/modele.php');
	require_once('vue/vue.php');
	
	function controleurMecanicien($courantMec,$couranteSemaine,$idIntervention)
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
		vueMecanicien($courantMec,$couranteSemaine,$mecaniciens,$interventionsMec,$formationsMec,$LesDonnesIntervention,$LesDonnesElementsIntervention);
	}
	
	function controleurFormation($mecanicien,$date,$time,$button) 
	{
		if($button != null) 
		{
			if($mecanicien != null AND $date != null AND $time != null) 
			{
				if($time != 13)
				{
					echo $time;
					$insert_status = ajouterFormation($mecanicien,$date,$time.':00:00');
					if($insert_status) 
					{
						$status = 3;
					} 
					else 
					{
						$status = 2;
					}
				}
				else $status = 4;
			} 
			else 
			{
				$status = 1;
			}
		} 
		else 
		{
			$status = 0;
		}
		$mecaniciens = getMecanicien();
		vueFormation($mecaniciens,$mecanicien,$date,$time,$status);
	}
	