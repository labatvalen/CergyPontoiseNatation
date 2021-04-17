<?php

// variables globales
$GLOBALS["server"]="localhost";
$GLOBALS["user"]="zamoramael";
$GLOBALS["mdp"]="eiWah3Eebior";

// fichier nécessaire
require("core.php");

//////////////////////////////////////////////
//Quelques fonctions qui pourront être utiles

//convertit les temps format "h,m,s,c" en secondes
function tempsSecondes($heures,$minutes,$secondes,$centiemes){
	$tmp= 3600*$heures+60*$minutes+$secondes+$centiemes/100;
	return $tmp;
}

//prend un temps en secondes et affiche un temps format "h:m:s.c"
function formatTemps($sec){
	$h=(int)($sec/3600);
	$sec=$sec-3600*$h;

	$m=(int)($sec/60);
	$sec=$sec-60*$m;

	$s=(int)($sec);

	$c=($sec-$s)*100;

	$h1=str_pad($h,2,"0",STR_PAD_LEFT);
	$m1=str_pad($m,2,"0",STR_PAD_LEFT);
	$s1=str_pad($s,2,"0",STR_PAD_LEFT);
	$c1=str_pad($c,2,"0",STR_PAD_LEFT);

	return $h1.":".$m1.":".$s1.".".$c1;
}

//retourne la moyenne des temps provenant d'une requête
function moyenne($res){

	$compteur=0;
	$secTot=0;
	while ($row=mysqli_fetch_assoc($res)){
	  $tmp=$row['temps'];
	  $secTot=$secTot+$tmp;
	  $compteur=$compteur+1;
	}
	$moy=$secTot/$compteur;
	$arrondi=round($moy,2,PHP_ROUND_HALF_DOWN);

	return $arrondi;
}


//retourne la moyenne des temps provenant d'une requête
function moyenne25($res){

	$compteur=0;
	$secTot=0;
	while ($row=mysqli_fetch_assoc($res)){
	  $tmp=$row['temps25'];
	  $secTot=$secTot+$tmp;
	  $compteur=$compteur+1;
	}
	$moy=$secTot/$compteur;
	$arrondi=round($moy,2,PHP_ROUND_HALF_DOWN);

	return $arrondi;
}

////////////////////////////////////////////////////////////////////////////////////
//Les requêtes qui seront utiles pour les statistiques, et les moyennes qui correspondent

//retourne la requête de sélection des critères en arguments
function requeteGASABC($idGroupe,$age,$sexe,$idSaison,$bassin,$idClub,$idNage,$idDistance){

	if ($bassin=="Tous"){
		$query="SELECT p.temps25" ;
	} else {
		$query="SELECT p.temps" ;
	}

	$query.=" FROM Performance p, Nageur n, Saison s WHERE p.idNageur=n.id AND p.idSaison=s.id AND p.idNage=".$idNage." AND p.idDistance=".$idDistance ;

	if ($sexe!="Tous"){
		$query.= " AND n.sexe='".$sexe."'";
	}

	if ($idGroupe!="Tous"){
		$query.= " AND n.idGroupe=".$idGroupe ;
	}

	if ($idSaison!="Tous"){
		$query.= " AND s.id=".$idSaison;
	}

	if ($idClub!="Tous"){
		$query.= " AND p.idClub=".$idClub ;
	}

	if ($age!="Tous"){
		//on agit par tranche d'âge : tous les ans strictement en dessous de 18, 18 et 19 sont regroupés, puis tous les 5 ans un groupe différent (20->24; 25->29;30->34 etc.).
		if ($age<18){
			$query.=" AND n.age=".$age ;

		} elseif ($age==18 || $age==19){
			$query.=" AND (n.age=18 OR n.age=19)" ;

		} elseif ($age>=20) { //on ne met pas un else puisque c'est l'utilisateur qui rentre l'âge et s'il rentre autre chose que des nombres positifs cela serait contraignant
			$trancheInf=((int)($age/5))*5;
			$trancheSup=$trancheInf+4;

			$query.=" AND n.age>=".$trancheInf." AND n.age<=".$trancheSup ;
		}

	}

	if ($bassin!="Tous"){
		$query.= " AND p.bassin=".$bassin ;
	}

	return $query;
}

//permet de calculer la moyenne de tous les temps d'un type de nage qui correspondent à une sélection (ou non) du groupe, de l'âge, du sexe, de l'annee, du club, de la taille du bassin; il faudra mettre , en italique en dessous du formulaire que si "Tous" est sélectionné pour la taille du bassin, les perfs en 50m sont convertis selon la table de conversion officielle pour passer en 25m.
function moyenneGASABC($idGroupe,$age,$sexe,$idSaison,$bassin,$idClub,$idNage,$idDistance){
	echo "La moyenne des temps sélectionnés vaut ";

	// Connection à la BDD
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query=requeteGASABC($idGroupe,$age,$sexe,$idSaison,$bassin,$idClub,$idNage,$idDistance);

	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	if (mysqli_num_rows($res)==0) {
		echo "Aucun temps enregistré ne correspond à cette requête.";
	}else{
		if ($bassin=="Tous"){
			formatTemps(moyenne25($res));
		}else{
			formatTemps(moyenne($res));
		}
	}

	deconnecterBDD($db);
}

//return la requête des temps pour un nageur précis pouvant choisir l'annee, la taille du bassin et toujours le type de nage
function requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance){

	if ($bassin=="Tous"){
		$query="SELECT p.temps25" ;
	} else {
		$query="SELECT p.temps" ;
	}

	$query.= " FROM Performance p, Saison s WHERE p.idSaison=s.id AND p.idNageur=".$idNageur." AND p.idNage=".$idNage." AND p.idDistance=".$idDistance ;

	if ($idSaison!="Tous"){
		$query.=" AND s.id=".$idSaison ;
	}

	if ($bassin!="Tous"){
		$query.= " AND p.bassin=".$bassin ;
	}

	return $query;
}




//affiche la moyenne personnelle des temps pour un nageur selon les critères en arguments
function moyennePerso($idNageur,$idSaison,$bassin,$idNage,$idDistance){

	echo "La moyenne des temps personnels sélectionnés vaut : ";

	// Connection à la BDD
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	if (mysqli_num_rows($res)==0) {
		echo "Aucun temps enregistré ne correspond à cette requête.";
	}else{
		if ($bassin=="Tous"){
			formatTemps(moyenne25($res));
		}else{
			formatTemps(moyenne($res));
		}
	}

	deconnecterBDD($db);
}

//////////////////////////////////
//Calcule des marges et des taux

//Il faudra afficher en italique que l'âge retenu est l'année actuelle moins l'année de naissance
function requeteidNageur($nom, $prenom, $age, $idGroupe){
	$query="SELECT id FROM Nageur WHERE nom='".$nom."'' AND prenom='".$prenom."'" ;

	if ($age!="Tous"){
		$query.= " AND age=".$age ;
	}
	if ($idGroupe!="Tous"){
		$query.= "AND idGroupe=".$idGroupe ;
	}

	return $query ;
}



function requeteMinPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance){
	if ($bassin=="Tous"){
		$query="SELECT Min(p.temps25) as temps25" ;
	} else {
		$query="SELECT Min(p.temps) as temps" ;
	}

	$query.= " FROM Performance p, Saison s WHERE p.idSaison=s.id AND p.idNageur=".$idNageur." AND p.idNage=".$idNage." AND p.idDistance=".$idDistance ;

	if ($idSaison!="Tous"){
		$query.=" AND s.id=".$idSaison ;
	}

	if ($bassin!="Tous"){
		$query.= " AND p.bassin=".$bassin ;
	}

	return $query;
}

function tauxProgression($t2,$t1){
	return round(($t1/$t2)-1,3,PHP_ROUND_HALF_DOWN);
}


//affiche le taux en pourcent
function formatTaux($taux){
	$pourcent=100*$taux;
	return $pourcent."%";
}



//return la requête des temps et de leur date pour un nageur précis pouvant choisir l'annee, la taille du bassin et toujours le type de nage
function requeteDatesPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query = "SELECT p.date FROM Performance p, Saison s WHERE p.idSaison=s.id AND p.idNageur=".$idNageur." AND p.idNage=".$idNage." AND p.idDistance=".$idDistance ;

	if ($idSaison!="Tous"){
		$query.=" AND s.id=".$idSaison ;
	}

	if ($bassin!="Tous"){
		$query.= " AND p.bassin=".$bassin ;
	}

	return $query;
}


//retourne le min entre les deux dates
function minDates($date1,$date2){
	$tabDate1=explode("/",$date1);
	$jour1=$tabDate1[0];
	$mois1=$tabDate1[1];
	$an1=$tabDate1[2];

	$tabDate2=explode("/",$date2);
	$jour2=$tabDate2[0];
	$mois2=$tabDate2[1];
	$an2=$tabDate2[2];

	if ($an1<$an2) {
		return $date1;
	}elseif ($an1>$an2){
		return $date2;
	}else{
		if ($mois1<$mois2){
			return $date1;
		}elseif ($mois1>$mois2){
			return $date2;
		}else{
			if ($jour1<$jour2){
				return $date1;
			}else{
				return $date2;
			}
		}
	}
}


//retourne le max entre les deux dates
function maxDates($date1,$date2){
	$tabDate1=explode("/",$date1);
	$jour1=$tabDate1[0];
	$mois1=$tabDate1[1];
	$an1=$tabDate1[2];

	$tabDate2=explode("/",$date2);
	$jour2=$tabDate2[0];
	$mois2=$tabDate2[1];
	$an2=$tabDate2[2];

	if ($an1<$an2) {
		return $date2;
	}elseif ($an1>$an2){
		return $date1;
	}else{
		if ($mois1<$mois2){
			return $date2;
		}elseif ($mois1>$mois2){
			return $date1;
		}else{
			if ($jour1<$jour2){
				return $date2;
			}else{
				return $date1;
			}
		}
	}
}


//retourne la premiere date effectuée
function premiereDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query = requeteDatesPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	if (mysqli_num_rows($res)==0){
		echo "Aucun temps ne correspond aux critères sélectionnés.";
	}else{

		$row=mysqli_fetch_assoc($res);
		$premiereDate=$row['date'];

		while ($row=mysqli_fetch_assoc($res)){
			$date=$row['date'];
			$a=$premiereDate;
			$premiereDate=minDates($a,$date);
		}
		return $premiereDate;
	}
}


//retourne la requête pour avoir la valeur du premier temps effectué
function requetePremierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query1 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	if (mysqli_num_rows($res1)==0){
		echo "Aucun temps ne correspond aux critères sélectionnés.";
	}else{
		$query1.=" AND p.date ='".premiereDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance)."'" ;

		return $query1;
	}
}

//retourne de la dernière date
function derniereDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query = requeteDatesPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	if (mysqli_num_rows($res)==0){
		echo "Aucun temps ne correspond aux critères sélectionnés.";
	}else{

		$row=mysqli_fetch_assoc($res);
		$derniereDate=$row['date'];

		while ($row=mysqli_fetch_assoc($res)){
			$date=$row['date'];
			$a=$derniereDate;
			$derniereDate=maxDates($a,$date);
		}
		return $derniereDate;
	}
}

//retourne la requête pour avoir la valeur du dernier temps effectué
function requeteDernierTemps($db, $idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query1 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	if (mysqli_num_rows($res1)==0){
		echo "Aucun temps ne correspond aux critères sélectionnés.";
	}else{
		$query1.=" AND p.date ='".derniereDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance)."'" ;

		return $query1;
	}
}

//taux de progression global : entre le premier temps et le temps minimum
function tauxProgGlob($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query1=requetePremierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	$query2=requeteMinPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);

	if (mysqli_num_rows($res1)==0 || mysqli_num_rows($res2)==0) {
		echo "Les temps enregistrés ne correspondent pas à cette requête.";
	}else{

		while ($row1=mysqli_fetch_assoc($res1)){
			if ($bassin=="Tous"){
				$premierTemps=$row1['temps25'];
			}else{
				$premierTemps=$row1['temps'];
			}
		}

		while ($row2=mysqli_fetch_assoc($res2)){
			if ($bassin=="Tous"){
				$TempsMin=$row2['temps25'];
			}else{
				$TempsMin=$row2['temps'];
			}
		}
		echo $TempsMin."<br/>";
		return tauxProgression($TempsMin,$premierTemps);
	}
}

//renvoie le taux de progression entre 2 saisons demandées : les temps min de ces 2 saisons sont comparées
function tauxProgSaisons($db,$idNageur,$idSaison1,$idSaison2,$bassin,$idNage,$idDistance){

	$query1=requeteMinPerso($idNageur,$idSaison1,$bassin,$idNage,$idDistance);
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	$query2=requeteMinPerso($idNageur,$idSaison2,$bassin,$idNage,$idDistance);
	$res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);

	if (mysqli_num_rows($res1)==0 || mysqli_num_rows($res2)==0) {
		echo "Les temps enregistrés ne correspondent pas à cette requête.";
	}else{

		while ($row1=mysqli_fetch_assoc($res1)){
			if ($bassin=="Tous"){
				$TempsMin1=$row1['temps25'];
			}else{
				$TempsMin1=$row1['temps'];
			}
		}

		while ($row2=mysqli_fetch_assoc($res2)){
			if ($bassin=="Tous"){
				$TempsMin2=$row2['temps25'];
			}else{
				$TempsMin2=$row2['temps'];
			}
		}
		return tauxProgression($TempsMin2,$TempsMin1);
	}
}

//retourne la requete de l'annee du dernier temps enregistré pour un nageur et un type de nage donnés
function requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance){

	$query="SELECT id FROM Saison WHERE annee=(SELECT Max(s.annee) FROM Saison s, Performance p WHERE s.id=p.idSaison AND p.idNage=".$idNage." AND p.idDistance=".$idDistance." AND p.idNageur=".$idNageur;

	if ($bassin!="Tous"){
		$query.=" AND p.bassin=".$bassin ;
	}
	$query.=")";

	return $query;
}

//retourne la margeMin : le taux de progression pour atteindre son meilleur temps
function margeMin($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)!=0){
		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query1=requeteDernierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

		$row1=mysqli_fetch_assoc($res1);
		if ($bassin=="Tous"){
			$dernierTemps=$row1['temps25'];
		}else{
			$dernierTemps=$row1['temps'];
		}

		$query2=requeteMinPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);

		$row2=mysqli_fetch_assoc($res2);
		if ($bassin=="Tous"){
			$TempsMin=$row2['temps25'];

		}else{
			$TempsMin=$row2['temps'];
		}

		return tauxProgression($TempsMin,$dernierTemps);
	}else{
		echo "Les temps enregistrés ne correspondent pas à cette requête.";
	}
}


function AvdDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){

	$query = requeteDatesPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	if (mysqli_num_rows($res)<2){
		echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
	}else{
		$row=mysqli_fetch_assoc($res);
		$derniereDate=$row['date'];
		$AvdDate=$derniereDate;

		while ($row=mysqli_fetch_assoc($res)){
				$date=$row['date'];
				$a=$derniereDate;
				$derniereDate=maxDates($a,$date);
				if ($date!=$derniereDate){
					$b=$AvdDate;
					$AvdDate=maxDates($b,$date);
			}
		}
		return $AvdDate;
		}
	}


//retourne une requete pour avoir l'avant dernier temps
function requeteAvdTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance){
	$query1 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	$compteur=0;

	while ($row1=mysqli_fetch_assoc($res1)){
		$compteur+=1;
	}

	if ($compteur<2){
		echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
	}else{
		$query1.=" AND p.date ='".AvdDate($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance)."'" ;


		return $query1;
	}
}

//calcule la margeDyn = taux de progression de l'avant-dernier au dernier temps
function margeDyn($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)==0){
		echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
	}else{

		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query1=requeteDernierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

		$query2=requeteAvdTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);

		$query3 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
		$res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);

		$compteur=0;

		while ($row3=mysqli_fetch_assoc($res3)){
			$compteur+=1;
		}

		if ($compteur<2){
			echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
		}else{

			while ($row1=mysqli_fetch_assoc($res1)){
				if ($bassin=="Tous"){
					$dernierTemps=$row1['temps25'];
				}else{
					$dernierTemps=$row1['temps'];
				}
			}

			while ($row2=mysqli_fetch_assoc($res2)){
				if ($bassin=="Tous"){
					$avDernierTemps=$row2['temps25'];
				}else{
					$avDernierTemps=$row2['temps'];
				}
			}

			return tauxProgression($dernierTemps,$avDernierTemps);
		}
	}
}

//retourne l'age du nageur
function trouveAge($db,$idNageur){

	$query = "SELECT age FROM Nageur WHERE id=".$idNageur ;
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	$row=mysqli_fetch_assoc($res);
	$age=$row['age'];


	return $age;
}

//retourne le rapport de réduction qui dépend de l'âge
function ReducAge($age){

	if ($age<=8 || $age>=70){
		return (0.1);

	}elseif($age<=17){
		return (1-(18-$age)/10);

	}elseif($age>=30){
		return (1-((int)(age/5)-5)/10);

	}else{
		return 1;
	}
}

//retourne le sexe du nageur
function trouveSexe($db,$idNageur){

	$query = "SELECT sexe FROM Nageur WHERE id=".$idNageur ;
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	while ($row=mysqli_fetch_assoc($res)){
		$sexe=$row['sexe'];
	}

	return $sexe;
}

//retourne la requete du record du monde associé
function requeteRecordMonde($sexe,$idNage,$idDistance){
	$query="SELECT temps FROM Record WHERE UPPER(sexe)=UPPER('".$sexe."') AND idNage=".$idNage." AND idDistance=".$idDistance ;
	return $query;
}

//retourne le temps du record du monde associé
function TempsRecordMonde($db,$sexe,$idNage,$idDistance){
	$query = requeteRecordMonde($sexe,$idNage,$idDistance);
	$res = mysqli_query($db, $query) or die('Request error : '.$query);

	$row=mysqli_fetch_assoc($res);
	$tempsRec=$row['temps'];

	return $tempsRec;
}

//la marge par rapport au record du monde
function margeMonde($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	$row0=mysqli_fetch_assoc($res0);
	$idSaison=$row0['id'];

	$query1=requeteDernierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	$row1=mysqli_fetch_assoc($res1);
	if ($bassin=="Tous"){
		$dernierTemps=$row1['temps25'];
	}else{
		$dernierTemps=$row1['temps'];
	}

	return tauxProgression(TempsRecordMonde($db,trouveSexe($db,$idNageur),$idNage,$idDistance),$dernierTemps);
}

//la marge de Majoration
function margeMaj($db,$idNageur,$bassin,$idNage,$idDistance){
	$margeMaj= 0.5*(ReducAge(trouveAge($db,$idNageur))*margeMonde($db,$idNageur,$bassin,$idNage,$idDistance));

	return round($margeMaj,3,PHP_ROUND_HALF_DOWN);
}


//et enfin le résultat final de notre marge intra-saisonnière
//bassin peut prendre la valeur "Tous"
function margeIntra($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)==0){
		echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
	}else{

		while($row0=mysqli_fetch_assoc($res0)){
			$idSaison=$row0['id'];
		}
		$query3 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
		$res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);

		$compteur=0;

		while ($row3=mysqli_fetch_assoc($res3)){
			$compteur+=1;
		}

		if ($compteur<2){
			echo "Il faut au moins 2 temps correspondant aux critères sélectionnés.";
		}else{
			$margeMin=margeMin($db,$idNageur,$bassin,$idNage,$idDistance);

			$margeDyn=margeDyn($db,$idNageur,$bassin,$idNage,$idDistance);

			$margeMaj=margeMaj($db,$idNageur,$bassin,$idNage,$idDistance);

			$margeIntra=round($margeMin+((1-2*$margeMin)**3)*(2*$margeDyn+$margeMaj)/3,3,PHP_ROUND_HALF_DOWN);

			return $margeIntra;
		}
	}
	deconnecterBDD($db);
}

//calcule le temps après une marge à partir d'un temps
function tempsPostMarge($temps1,$marge) {
	if ($marge==-1){
		echo "Une marge valant -1 (ou -100%) est impossible.";
	}else{
		$temps2=$temps1/(1+$marge);
		return round($temps2,2,PHP_ROUND_HALF_DOWN);
	}
}
///////////////////////////////////////
//Calcul de la marge inter-saisonnière

//Pour le calcul de la marge inter-saisonnière, on a besoin de la marge de majoration pour l'année d'après, avec le meilleur temps de l'année en cours

//Pour cela on a besoin de la marge du temps minimum par rapport au record du monde
function margeMonde2($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	$row0=mysqli_fetch_assoc($res0);
	$idSaison=$row0['id'];

	$query1=requeteMinPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

	$row1=mysqli_fetch_assoc($res1);
	if ($bassin=="Tous"){
		$TempsMin=$row1['temps25'];
	}else{
		$TempsMin=$row1['temps'];
	}

	return tauxProgression(TempsRecordMonde($db,trouveSexe($db,$idNageur),$idNage,$idDistance),$TempsMin);
}


//Voici donc une marge de majoration adaptée
function margeMaj2($db,$idNageur,$bassin,$idNage,$idDistance){
	$margeMaj= 0.5*(ReducAge(trouveAge($db,$idNageur)+1)*margeMonde2($db,$idNageur,$bassin,$idNage,$idDistance));

	return round($margeMaj,3,PHP_ROUND_HALF_DOWN);
}


//Calculons maintenant la marge inter-saisonnière
//bassin peut prendre la valeur "Tous"
function margeInter($idNageur,$bassin,$idNage,$idDistance){
	// Connection à la BDD
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)==0){
		echo "Il faut au moins 2 temps correspondant aux critères sélectionnés pour obtenir une marge significative.";
	}else{

		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query3 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
		$res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);

		$compteur=0;

		while ($row3=mysqli_fetch_assoc($res3)){
			$compteur+=1;
		}

		if ($compteur<2){
			echo "Il faut au moins 2 temps correspondant aux critères sélectionnés pour obtenir une marge significative.";
		}else{

			$tauxProgGlob=tauxProgGlob($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);

			$margeMaj=margeMaj2($db,$idNageur,$bassin,$idNage,$idDistance);

			$margeInter=round(+(2*$tauxProgGlob+$margeMaj)/3,3,PHP_ROUND_HALF_DOWN);

			deconnecterBDD($db);
			return $margeInter;
		}
	}
	deconnecterBDD($db);
}

////////////////////////
//tableaux de valeurs

//tableau des temps globaux sélectionnés en fonction des critères en commentaires, seul idNage et idNage distance prennent une valeur obligatoire, les autres peuvent prendre "Tous"
function tabGlobal($idGroupe,$age,$sexe,$idSaison,$bassin,$idClub,$idNage,$idDistance){
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query=requeteGASABC($idGroupe,$age,$sexe,$idSaison,$bassin,$idClub,$idNage,$idDistance);
	$res=mysqli_query($db, $query) or die('Request error : '.$query);

	$array=[];

	while($row=mysqli_fetch_assoc($res)){
		if ($bassin=="Tous"){
			array_push($array,$row['temps25']);
		}else{
			array_push($array,$row['temps']);
		}
	}

	return $array;
	deconnecterBDD($db);
}

//Idem mais pour les temps d'une personne, idSaison et bassin peuvent prendre "Tous"
function tabPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance){
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query=requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
	$res=mysqli_query($db, $query) or die('Request error : '.$query);

	$array=[];

	while($row=mysqli_fetch_assoc($res)){
		if ($bassin=="Tous"){
			array_push($array,$row['temps25']);
		}else{
			array_push($array,$row['temps']);
		}
	}

	deconnecterBDD($db);
	return $array;
}

//idem que tabPerso mais on peut prendre l'id sera trouvé à partir du nom, du prénom, et potentiellement de l'age* et de l'idGroupe*. *:peut prendre la valeur "Tous" quand même.
function tabPersoNom($nom, $prenom, $age, $idGroupe,$idSaison,$bassin,$idNage,$idDistance){
	$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
	$boolRes = mysqli_select_db($db, 'Projet');

	$query=requeteidNageur($nom, $prenom, $age, $idGroupe);
	$res=mysqli_query($db, $query) or die('Request error : '.$query);
	$row=mysqli_fetch_assoc($res);
	$idNageur=$row['id'];

	deconnecterBDD($db);
	return tabPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance);
}

// Beaucoup de fonctions fonctionnent avec l'idNageur, mais j'ai fait une fonction requeteidNageur (présente dans la fct ci-dessus) pour le retrouver

//retourne l'id du TypeNage en fonction de son nom
function idNage($nomNage){
	$query="SELECT id FROM TypeNage WHERE nom='".$nomNage."'";
	$res=mysqli_query($db, $query) or die('Request error : '.$query);
	$row=mysqli_fetch_assoc($res);
	$idNage=$row['id']

	return $idNage;
}

//retourne l'id de la distance en fonction de sa longueur
function idDistance($longueur){
	$query="SELECT id FROM Distance WHERE longueur=".$longueur ;
	$res=mysqli_query($db, $query) or die('Request error : '.$query);
	$row=mysqli_fetch_assoc($res);
	$idDistance=$row['id']

	return $idDistance;
}


//retourne le dernier temps d'un nageur sur une nage dans un bassin
function dernierTemps($db,$nom,$prenom,$bassin,$idNage,$idDistance){

	$query=requeteidNageur($nom, $prenom, "Tous", "Tous");
	$res=mysqli_query($db, $query) or die('Request error : '.$query);
	$row=mysqli_fetch_assoc($res);
	$idNageur=$row['id'];

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)!=0){
		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query1=requeteDernierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

		$row1=mysqli_fetch_assoc($res1);
		if ($bassin=="Tous"){
			$dernierTemps=$row1['temps25'];
		}else{
			$dernierTemps=$row1['temps'];
		}
		return $dernierTemps;
}

//retourne le dernier temps d'un nageur sur une nage dans un bassin avec son id
function dernierTemps2($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)!=0){
		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query1=requeteDernierTemps($db,$idNageur,$idSaison,$bassin,$idNage,$idDistance);
		$res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);

		$row1=mysqli_fetch_assoc($res1);
		if ($bassin=="Tous"){
			$dernierTemps=$row1['temps25'];
		}else{
			$dernierTemps=$row1['temps'];
		}
		return $dernierTemps;
}


function idNageur($db,$nom,$prenom){
	$query=requeteidNageur($nom, $prenom, "Tous", "Tous");
	$res=mysqli_query($db, $query) or die('Request error : '.$query);
	$row=mysqli_fetch_assoc($res);
	$idNageur=$row['id'];

	return $idNageur;
}

//compte le nombre de temps dans la derniere saison pour une nage
function testNbTemps($db,$idNageur,$bassin,$idNage,$idDistance){

	$query0=requeteDerniereAnnee($idNageur,$bassin,$idNage,$idDistance);
	$res0 = mysqli_query($db, $query0) or die('Request error : '.$query0);

	if (mysqli_num_rows($res0)!=0){
		$row0=mysqli_fetch_assoc($res0);
		$idSaison=$row0['id'];

		$query3 = requeteTempsPerso($idNageur,$idSaison,$bassin,$idNage,$idDistance) ;
		$res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);

		return mysqli_num_rows($res3);
}

//tabGlobal("Tous","Tous","Tous","Tous",25,"Tous",1,1);
//tabPerso(2,"Tous","Tous",1,1);

//moyennePerso(1,"Tous","Tous",1,1);
//moyenneGASABC("Tous","Tous","Tous","Tous",25,"Tous",1,1);

//echo margeIntra(1,25,1,1);
//echo margeInter(1,25,1,1);


?>
