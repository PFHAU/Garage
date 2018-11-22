<?php
	function vueMecanicien($courantMec,$couranteSemaine,$mecaniciens,$interventionsMec,$formationsMec,$LesDonnesIntervention,$LesDonnesElementsIntervention)
	{
		$listeMec = '';
		$listeSem = '';
		$JOUR    = '';
		$HEURE    = '';
		
		// Afficher la liste de mécaniciens
		foreach($mecaniciens as $value) 
		{
			$listeMec .='<option value="'.$value->idEmployee.'"';
			//Pour sauvegarder le mecanicien choisie
			if( $value->idEmployee== $courantMec) { $listeMec .='selected'; }
			$listeMec .='>'.$value->nomEmployee.'</option>';
		}
		
		// Nombre de jours en mois courant
		$nbJours = date("t");
		
		// Nombre de semaine en mois courant (l'arrondissage à large)
		$nbSemaines = ceil($nbJours / 7);
		
		
		// Afficher la liste de semaines
		for($i=1;$i<=$nbSemaines;$i++) 
		{
			$listeSem .='<option value="'.$i.'"';
			//Pour sauvegarder la semaine choisie
				if($i == $couranteSemaine) { $listeSem .='selected'; }
			$listeSem .='>'.$i.'</option>';
		}
		
		$FORM ='<form method="GET">
					<p class="new"><label class="labelMec">Nom mecanicien</label><select name="mecanicien">'.$listeMec.'</select></p>
					<p class="new"><label class="labelMec">Semaine</label><select name="semaine">'.$listeSem.'</select></p>
					<p class="new"><input type="submit" value="Valider" title="valider"/>
									<input type="submit" name="link" value="Prendre formation" title="formation" /></p>
				</form>';
		// CREATION DU PLANING
		
		// Nombre de jours en mois courant
		$joursDeMois = date('t');

		// Compteur pour les jours du mois courant
		$compteurJours = 1;

		// 1. La première semaine
		$num = 0;
		for($i = 0; $i < 7; $i++) 
		{
			// Calculer le numéro du jour de la semaine pour le premier jour du mois courant
			$jourSemaine = date('w',mktime(0, 0, 0, date('m'), $compteurJours, date('Y')));
		
			// Ordonner les jour de la semaine au format: 0 - dimanche, ..., 6 - samedi car les index du tableu commencent par 0
			$jourSemaine = $jourSemaine - 1;
			
			if($jourSemaine == -1) 
			{
				$jourSemaine = 6;
			}
			
			if($jourSemaine == $i) 
			{
				// Si les jours de la semaine se correspondent on rempli le tableu $semaine par les jour du mois 
				$semaine[$num][$i] = $compteurJours;
				$compteurJours++;
			} else
			{
				$semaine[$num][$i] = "";
			}
		}
		
		// 2. Les semaines suivantes du mois
		while(true) 
		{
			$num++;
			for($i = 0; $i < 7; $i++) 
			{
				$semaine[$num][$i] = $compteurJours;
				$compteurJours++;
				// Si on a atteint le bout du mois - on sort de la boucle
				if($compteurJours > $joursDeMois) break;
			}
			// Si on a atteint le bout du mois - on sort de la boucle
			if($compteurJours > $joursDeMois) break;
		}
		
		// 3. Afficher le contenu du tableu $semaine au format un calendrier 
		$i = $couranteSemaine-1;// Car les index du tableu commencent par 0
		for($j = 0; $j < 7; $j++) 
		{
			if(!empty($semaine[$i][$j])) 
			{
				//Si on le jour courant on change la couleur 
				if($semaine[$i][$j] == date('j')) 
				{
					$JOUR .="<th style='background-color: blue; color: white;'>".$semaine[$i][$j].'/'.date('m')."</th>";
				} else 
				{
					// Si on a samedi ou dimanche on change la couleur
					if($j == 5 || $j == 6) {
						$JOUR .="<th><font color=red>".$semaine[$i][$j].'/'.date('m')."</font></th>";
					} else {
						$JOUR .="<th>".$semaine[$i][$j].'/'.date('m')."</th>";
					}
				}
			} 
			else 
			{
				//Si on a plus de jours on rempli la table par les espaces 
				$JOUR .="<th>&nbsp;</th>";
			}
		}
		
		// La liste d'interventions pour un mécanicien précis
		$horaire = array();	
		foreach($interventionsMec as $value) 
		{
			$horaire[$value['date']][$value['heure']] = $value;
		}

		
		// La liste de formations pour un mécanicien précis
		$horaireF = array();	
		foreach($formationsMec as $value) 
		{
			$horaireF[$value['date']][$value['heure']] = $value;
		}
		
		//On rempli l'emploi de temps
		for($i=9;$i<=17;$i++) 
		{
			if($i != 13) 
			{ 
				$HEURE .='<tr>';
					$HEURE .='<td>'.$i.':00</td>';
					for($j=1;$j<=count($semaine[$couranteSemaine-1]);$j++) 
					{
						//Si on a une intervention on le met de manière de la référence pour après avoir l'information d'intervention
						if(isset($horaire[date('Y').'-'.date('m').'-'.str_pad($semaine[($couranteSemaine-1)][$j-1], 2, '0', STR_PAD_LEFT)][str_pad($i, 2, '0', STR_PAD_LEFT).':00:00'])) 
						{
							$HEURE .='<td><a href="mecanicien.php?mecanicien='.$courantMec.'&semaine='.$couranteSemaine.'&idIntervention='
									.$horaire[date('Y').'-'.date('m').'-'.str_pad($semaine[($couranteSemaine-1)][$j-1], 2, '0', STR_PAD_LEFT)][str_pad($i, 2, '0', STR_PAD_LEFT).
									':00:00']['idIntervention'].' " style="background-color:yellow; display: block; text-align:center; text-decoration:none;">I</td>';
						} 
						else 
						{		
							//Si on a une formation on la met
							if(isset($horaireF[date('Y').'-'.date('m').'-'.str_pad($semaine[($couranteSemaine-1)][$j-1], 2, '0', STR_PAD_LEFT)][str_pad($i, 2, '0', STR_PAD_LEFT).':00:00'])) 
							{
								$HEURE .='<td style="text-align: center; background-color: cyan;">F</td>';
							}
							else 
							{
								$HEURE .='<td style="background-color: #eee;"></td>';
							}
						}
					}
				$HEURE .='</tr>';
			}
		}
		
		$TABLE ='<table>
					<tr>
						<th rowspan="2">time</th>
						<th>Lundi</th>
						<th>Mardi</th>
						<th>Mercredi</th>
						<th>Jeudi</th>
						<th>Vendredi</th>
						<th>Samedi</th>
						<th>Dimanche</th>
					</tr>
					<tr>
						'.$JOUR.'
					</tr>'
					.$HEURE.'
				</table>';
		
		$DONNEE = '';
		
		if(count($LesDonnesIntervention) > 0) 
		{
			$DONNEE = '<table>
							<tr><th colspan="2">Les donnes d\'intervention</th></tr>
							<tr>
								<td>Information du client </td>
								<td>'.$LesDonnesIntervention[0]['prenomClient'].' '.$LesDonnesIntervention[0]['nomClient'].', '
								.$LesDonnesIntervention[0]['clientAdress'].', montant max: '.$LesDonnesIntervention[0]['montantMax'].'<br/>'
								     .$LesDonnesIntervention[0]['telClient'].'; '.$LesDonnesIntervention[0]['emailClient'].'</td>
							</tr>
							<tr>
								<td>Nom de l\'intervention </td><td>'.$LesDonnesIntervention[0]['nomTypeIntervention'].'</td>
							</tr>
							<tr>
								<td>Prix de l\'intervention </td><td>'.$LesDonnesIntervention[0]['prix'].'</td>
							</tr>
							<tr>
								<td>Elements</td>
								<td>';if(count($LesDonnesElementsIntervention) > 0) 
									  {
										foreach($LesDonnesElementsIntervention as $value) 
										{
											$DONNEE .=$value['nomElement'].'<br/>';
										}
									  } 
									  else 
									  {
										$DONNEE .='Pas des eléments';
									  }
								      $DONNEE .='</td>
							</tr>
							<tr>
								<td>Mécanicien</td><td>'.$LesDonnesIntervention[0]['nomEmployee'].'</td>
							</tr>
						</table>';
						
		}
		
		require_once('vue/gabarit_mecanicien.php');
	}
	
	function vueFormation($mecaniciens,$mecanicien,$date,$time,$status) 
	{	
		$heureDebout 	= 9;
		$heureBout 		= 17;
		$listeMec       = '';
		$listeHeure     = '';
		// Afficher la liste de mécaniciens
		
		foreach($mecaniciens as $value) {
			$listeMec .='<option value="'.$value->idEmployee.'"';
			//Pour sauvegarder le mecanicien choisie
			if( $value->idEmployee== $mecanicien) { $listeMec .='selected'; }
			$listeMec .='>'.$value->nomEmployee.'</option>';
			//$listeMec .='<option value="'.$value['idEmployee'].'"';
			//	if($value['idEmployee'] == $mecanicien) { $listeMec .='selected'; }
			//$listeMec .= '>'.$value['nomEmployee'].'</option>';
		}
		
		//Afficher la iste des heures
		for($i=$heureDebout; $i<=$heureBout; $i++) 
		{
			$listeHeure .='<option value="'.$i.'"';
			if($i == $time) { $listeHeure .='selected'; }
			$listeHeure .='>'.$i.':00</option>';
		}
		
		$FORM = '<form method="POST">
					<h3>Prendre une formation</h3>
					<p class="new"><label class="labelMec">Nom mécanicien</label><select name="mecanicien">'.$listeMec.'</select></p>
					<p class="new"><label class="labelMec">Date</label><input type="date" title="Choisir la date" name="date" value="'.$date.'"/></p>
					<p class="new"><label class="labelMec">Heure</label><select title="Choisir l\'heure" name="time">'.$listeHeure.'</select></p>
					<div><input type="submit" name="button"  value="Valider" title="valider"/>
						<input type="submit" name="link" value="Revenir" title="revenir à mécanicien" />
					</div>
				</form>';
		
		switch ($status) 
		{
			case 0:
				$STATUS = '';
				break;
			case 1:
				$STATUS = '<div class="badBox">Paramètres mauvais</div>';
				break;
			case 2:
				$STATUS = '<div class="badBox">Echec</div>';
				break;
			case 3:
				$STATUS = '<div class="goodBox">SUCCES</div>';
				break;
			case 4:
				$STATUS = '<div class="badBox">Pause déjeuner. Choisisez l\'autre heure</div>';
				break;
		}
		
		require_once('vue/gabarit_formation.php');
	}
	