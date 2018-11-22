<?php
	
	
function CMclient(){
		$contenu='';
		$contenu='<form method="post" action="controleurFrontalAgent.php"><p><input type="text" name="RClient" id="RClient" value="" class="inputCMclient"/><input type="submit" value="Rechercher" name="rechercherNom"/></p>';
		$contenu.='<input type="submit" value="Creer" name="creer">';
		
		/*$contenu.='<a href="pagedecreation">Creer</a>'; 
		$contenu.='<input type="submit" value="Creer" name="creer">';
		$contenu.='<fieldset><h3>Créer</h3><p><label for="id">Id:</label><input type="text" name="id" id="id"></p>';
		$contenu.='<p><label for="prenom">Prenom:</label><input type="text" name="prenom" id="prenom"></p>';
		$contenu.='<p><label for="nom">Nom:</label><input type="text" name="nom" id="nom"></p>';
		$contenu.='<p><label for="adresse">Adresse:</label><input type="text" name="adresse" id="adresse"></p>';
		$contenu.='<p><label for="numTel">Telephone:</label><input type="text" name="numTel" id="numTel"></p>';
		$contenu.='<p><label for="mail">Mail:</label><input type="text" name="mail" id="mail"></p>';
		$contenu.='<p><label for="max">Montent Max:</label><input type="text" name="max" id="max"></p>';
		$contenu.='<input type="submit" value="Valider" name="validerCreer"></fieldset>';*/
		require_once('vue/agent.php');
			
}

function afficherSC(){
	$contenu='';
	$contenu='<form method="post" action="controleurFrontalAgent.php"><p><input type="text" name="RClientId" id="RClient" value="" class="inputCMclient"/></p>';
	$contenu.='<input type="submit" value="Synthese Client" name="syntheseClient">';
	require_once('vue/agent.php');
}
function afficherAcceuil(){
	$contenu='';	
	require_once('vue/agent.php');
}
function afficherCreer(){
	$contenu='';
	$contenu.='<form method="post" action="controleurFrontalAgent.php"><fieldset><h3>Créer</h3>';
		$contenu.='<p><label for="prenom">Prenom:</label><input type="text" name="prenom" id="prenom"></p>';
		$contenu.='<p><label for="nom">Nom:</label><input type="text" name="nom" id="nom"></p>';
		$contenu.='<p><label for="adresse">Adresse:</label><input type="text" name="adresse" id="adresse"></p>';
		$contenu.='<p><label for="numTel">Telephone:</label><input type="text" name="numTel" id="numTel"></p>';
		$contenu.='<p><label for="mail">Mail:</label><input type="text" name="mail" id="mail"></p>';
		$contenu.='<p><label for="max">Montent Max:</label><input type="text" name="max" id="max"></p>';
		$contenu.='<input type="submit" value="Valider" name="validerCreer"></fieldset></form>';

	require_once('vue/agent.php');
}
function afficherSAV(){
	$contenu='';
	$contenu.='<form method="post" action="controleurFrontalAgent.php"><p><input type="text" name="RIdClient" id="RIdClient" value="" class="RIdClient"/>';
	$contenu.='<input type="submit" value="Valider" name="validerRId"></form>';
	require_once('vue/agent.php');
}
function afficheErreur($msg){
	$contenu='<p>'.$erreur.'</p>
			<p><a href="controleurFrontalAgent.php"/>OK</a></p>';

	require_once('vue/gabarit.php');
}
function afficherClientId($client){
	$contenu='';
	$contenu='<form method="post" action="controleurFrontalAgent.php"><fieldset><h3>Affichage des clients</h3><p>';
	foreach($client as $ligne){
		$contenu.='<p><label for="id">Prenom:</label><input type="text" name="id" value='.$ligne->idClient.' id="id" readonly="readonly"></p>';
		$contenu.='<p><label for="prenom">Prenom:</label><input type="text" name="prenom" value='.$ligne->prenomClient.' id="prenom" readonly="readonly"></p>';
		$contenu.='<p><label for="nom">Nom:</label><input type="text" name="nom"  value='.$ligne->nomClient.' id="nom" readonly="readonly"></p>';
		$contenu.='<p><label for="adresse">Adresse:</label><input type="text" name="adresse" value='.$ligne->clientAdress.' id="adresse" readonly="readonly"></p>';
		$contenu.='<p><label for="numTel">Telephone:</label><input type="text" name="numTel" value='.$ligne->telClient.' id="numTel" readonly="readonly"></p>';
		$contenu.='<p><label for="mail">Mail:</label><input type="text" name="mail" value='.$ligne->emailClient.' id="mail" readonly="readonly"></p>';
		$contenu.='<p><label for="max">Montent Max:</label><input type="text" name="max" value='.$ligne->montantMax.' id="max" readonly="readonly"></p>';
	}
	require_once('vue/agent.php');
	

}
function afficherClient($client){
	$contenu='';
	$contenu='<form method="post" action="controleurFrontalAgent.php"><fieldset><h3>Affichage des clients</h3><p>';
	foreach($client as $ligne){
		$contenu.='<p><label for="id">Id:</label><input type="text" name="id" value='.$ligne->idClient.' id="id" readonly="readonly"></p>';
		$contenu.='<p><label for="prenom">Prenom:</label><input type="text" name="prenom" value='.$ligne->prenomClient.' id="prenom"></p>';
		$contenu.='<p><label for="nom">Nom:</label><input type="text" name="nom"  value='.$ligne->nomClient.' id="nom"></p>';
		$contenu.='<p><label for="adresse">Adresse:</label><input type="text" name="adresse" value='.$ligne->clientAdress.' id="adresse"></p>';
		$contenu.='<p><label for="numTel">Telephone:</label><input type="text" name="numTel" value='.$ligne->telClient.' id="numTel"></p>';
		$contenu.='<p><label for="mail">Mail:</label><input type="text" name="mail" value='.$ligne->emailClient.' id="mail"></p>';
		$contenu.='<p><label for="max">Montent Max:</label><input type="text" name="max" value='.$ligne->montantMax.' id="max"></p>';
		$contenu.='<input type="submit" value="Valider" name="modifClient"></fieldset></form>';




		/*$contenu.='<p><label><input type="submit" value="modifier" name="modifClient"'.$ligne->idClient.'">Client numéro '.$ligne->idClient.
		'</label><input type="text" name="user" value="nom: '.$ligne->nomClient.'Prenom: '.$ligne->prenomClient.'Adresse: '.$ligne->clientAdress.'Tel '.$ligne->telClient.'Email: '.$ligne->emailClient.'Max: '.$ligne->montantMax.
		'" size=70 /></p>';*/
	}
	require_once('vue/agent.php');
}
function afficherPrendreIntervention(){
	$contenu='';
	$contenu='<form method="post" action="controleurFrontalAgent.php"><fieldset><h3>Prendre rendez vous</h3><p>';
	$contenu.='<p><label for="date">date:</label><input type="text" name="date" value='.'yyyy-mm-dd'.' id="date"></p>';
	$contenu.='<p><label for="heure">heure:</label><input type="text" name="heure" value='.'hh:mm:ss'.' id="heure"></p>';
	$contenu.='<p><label for="idClient">idClient:</label><input type="text" name="idClient"  id="idClient"></p>';
	$contenu.='<p><label for="idEmployer">idEmployer:</label><input type="text" name="idEmployer"  id="idEmployer"></p>';
	$contenu.='<p><label for="idTypeIntervention">Type intervention:</label><input type="text" name="idTypeIntervention" id="idTypeIntervention"></p>';
	$contenu.='<input type="submit" value="Valider" name="prendereInterventionValider"></fieldset></form>';

	require_once('vue/agent.php');
}
function afficherIntervention($intervention){
	$contenu='';

	$contenu.='<form method="post" action="controleurFrontalAgent.php"><fieldset><h3>Affichage des Interventions</h3><p>';
	foreach($intervention as $ligne){
		$contenu.='<p><input type="checkbox" name="rembourser" />Rembourser le différé</p>';
		$contenu.='<p><label for="idIntervention">idIntervention:</label><input type="text" name="idIntervention" value='.$ligne->idIntervention.' id="id" readonly="readonly"></p>';
		$contenu.='<p><label for="Etat de payement">Etat de payement:</label><input type="text" name="etatPayement" value='.$ligne->etatPayement.' id="etatPayement"></p>';
		$contenu.='<p><label for="Etat d executuion">Etat d executuion:</label><input type="text" name="etatExecutuion" value='.$ligne->etatExecution.' id="etatExecutuion"></p>';
		$contenu.='<p><label for="Date">Date:</label><input type="text" name="date" value='.$ligne->date.' id="date"></p>';
		$contenu.='<p><label for=heure>Heure:</label><input type="text" name="heure" value='.$ligne->heure.' id="heure"></p>';
		$contenu.='<p><label for="idEmployee">id Employee:</label><input type="text" name="idEmployee" value='.$ligne->idEmployee.' id="idEmployee"></p>';
		$contenu.='<p><label for="idClient">id Client:</label><input type="text" name="idClient" value='.$ligne->idClient.' id="idClient"></p>';
		$contenu.='<p><label for="idTypeIntervention">id Type d intervention:</label><input type="text" name="idTypeIntervention" value='.$ligne->idTypeIntervention.' id="idTypeIntervention"></p>';
	}
	$contenu.='<input type="submit" value="Payer Cash" name="cash">';
	$contenu.='  <input type="submit" value="Differer" name="differer">';
	$contenu.='  <input type="submit" value="Rembourser les Differées" name="rembourser">';
	require_once('vue/agent.php');
}
	function afficherRDV($courantMec,$couranteSemaine,$mecaniciens,$interventionsMec,$formationsMec,$LesDonnesIntervention,
	$LesDonnesElementsIntervention)
	{
		$listeMec = '';
		$listeSem = '';
		$jours = '';
		$heure = '';
		
		// Afficher la liste de mécaniciens
		foreach($mecaniciens as $value) 
		{
			$listeMec .='<option value="'.$value['idEmployee'].'"';
			//Pour sauvegarder le mecanicien choisie
			if($value['idEmployee'] == $courantMec) { $listeMec .='selected'; }
			$listeMec .='>'.$value['nomEmployee'].'</option>';
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
		
		$FORM =
			'
				<form method="POST">
					<p class="new">
						<label class="labelMec">Nom mecanicien</label>
						<select name="mecanicien">
							'.$listeMec.'
						</select>
					</p>
					<p class="new">
						<label class="labelMec">Semaine</label>
						<select name="semaine">
							'.$listeSem.'
						</select>
					</p>
					<p class="new">
						<input type="submit" name="RDV" value="Valider" title="valider"/>
						<input type="submit" name="PI" value="Prendre intevention" title="formation" />
					</p>
				</form>
			';
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
					$jours .="<th style='background-color: blue; color: white;'>".$semaine[$i][$j].'/'.date('m')."</th>";
				} else 
				{
					// Si on a samedi ou dimanche on change la couleur
					if($j == 5 || $j == 6) {
						$jours .="<th><font color=red>".$semaine[$i][$j].'/'.date('m')."</font></th>";
					} else {
						$jours .="<th>".$semaine[$i][$j].'/'.date('m')."</th>";
					}
				}
			} 
			else 
			{
				//Si on a plus de jours on rempli la table par les espaces 
				$jours .="<th>&nbsp;</th>";
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
				$heure .='<tr>';
					$heure .='<td>'.$i.':00</td>';
					for($j=1;$j<=count($semaine[$couranteSemaine-1]);$j++) 
					{
						//Si on a une intervention on le met de manière de la référence pour après avoir l'information d'intervention
						if(isset($horaire[date('Y').'-'.date('m').'-'.str_pad($semaine[($couranteSemaine-1)][$j-1], 2, '0', STR_PAD_LEFT)][str_pad($i, 2, '0', STR_PAD_LEFT).':00:00'])) 
						{
							$heure .=
								'<td>
									 <div style="background-color:yellow; display: block; text-align:center; text-decoration:none;">I</div>
								</td>';
						} 
						else 
						{		
							//Si on a une formation on la met
							if(isset($horaireF[date('Y').'-'.date('m').'-'.str_pad($semaine[($couranteSemaine-1)][$j-1], 2, '0', STR_PAD_LEFT)][str_pad($i, 2, '0', STR_PAD_LEFT).':00:00'])) 
							{
								$heure .='<td style="text-align: center; background-color: cyan;">F</td>';
							}
							else 
							{
								$heure .='<td style="background-color: #eee;"></td>';
							}
						}
						
					}
				$heure .='</tr>';
			}
		}
		
		$TABLE =
			'
				<table>
					<thead>
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
							'.$jours.'
						</tr>
					</thead>
					<tbody>
						'.$heure.'
					</tbody>
				</table>
			';
		
		$DONNEE = '';
		
			
		/*if(count($LesDonnesIntervention) > 0) 
		{
			$DONNEE = '<HR/>
						<table>
							<tr>'.$LesDonnesIntervention[0]['idEmployee'].'</tr>
							<tr>
								<th colspan="2">Les donnes d\'intervention</th>
							</tr>
							<tr>
								<td>Information du client </td>
								<td>'.$LesDonnesIntervention[0]['prenomClient'].' '.$LesDonnesIntervention[0]['nomClient'].'<br/>'
								     .$LesDonnesIntervention[0]['telClient'].'; '.$LesDonnesIntervention[0]['emailClient'].'</td>
							</tr>
							<tr>
								<td>Information de l\'intervention </td>
								<td>'.$LesDonnesIntervention[0]['nomTypeIntervention'].'</td>
							</tr>
							<tr>
								<td>Prix de l\'intervention </td>
								<td>'.$LesDonnesIntervention[0]['prix'].'</td>
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
						</table>';
			}*/
			$contenu=$FORM.$TABLE.$DONNEE;

		require_once('vue/agent.php');
	
	}
				



