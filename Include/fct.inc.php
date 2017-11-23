<?php
/** 
 * Fonctions pour l'application GSB
 
 * @package default
 * @author JP Chateau
 * @version    1.0
 */
 /**
 * Teste si un quelconque amis est connecté
 * @return vrai ou faux 
 */
function estConnecte(){
  return isset($_SESSION['idAmis']);
}
/**
 * Enregistre dans une variable session les infos d'un visiteur
 
 * @param $id 
 * @param $nom
 * @param $prenom
 / @param $type
 */
function connecter($id,$nom,$prenom,$type){
//A compléter
	
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
}

/* gestion des erreurs*/
/**
 * Indique si une valeur est un entier positif ou nul
 
 * @param $valeur
 * @return vrai ou faux
*/
function estEntierPositif($valeur) {
	return preg_match("/[^0-9]/", $valeur) == 0;
	
}

/**
 * Indique si un tableau de valeurs est constitué d'entiers positifs ou nuls
 
 * @param $tabEntiers : le tableau
 * @return vrai ou faux
*/
function estTableauEntiers($tabEntiers) {
	$ok = true;
	foreach($tabEntiers as $unEntier){
		if(!estEntierPositif($unEntier)){
		 	$ok=false; 
		}
	}
	return $ok;
}
/**
 * Vérifie si une date est inférieure d'un an à la date actuelle
 
 * @param $dateTestee 
 * @return vrai ou faux
*/
function estDateDepassee($dateTestee){
	$dateActuelle=date("d/m/Y");
	@list($jour,$mois,$annee) = explode('/',$dateActuelle);
	$annee--;
	$AnPasse = $annee.$mois.$jour;
	@list($jourTeste,$moisTeste,$anneeTeste) = explode('/',$dateTestee);
	return ($anneeTeste.$moisTeste.$jourTeste < $AnPasse); 
}
/**
 * Vérifie la validité du format d'une date française jj/mm/aaaa 
 
 * @param $date 
 * @return vrai ou faux
*/
function estDateValide($date){
	$tabDate = explode('/',$date);
	$dateOK = true;
	if (count($tabDate) != 3) {
	    $dateOK = false;
    }
    else {
		if (!estTableauEntiers($tabDate)) {
			$dateOK = false;
		}
		else {
			if (!checkdate($tabDate[1], $tabDate[0], $tabDate[2])) {
				$dateOK = false;
			}
		}
    }
	return $dateOK;
}

/**
 * Vérifie la validité des cinq arguments : la date, l'heure du diner, le prix, le nombre de place et le lieu
 
 * des message d'erreurs sont ajoutés au tableau des erreurs
 
 * @param $dateDiner 
 * @param $heure
 * @param $prix
 * @param $nbPlace
 * @param $lieu
 */
function valideInfosDiner($dateDiner,$heure,$prix,$nbPlace,$lieu){
	if($dateDiner==""){
		ajouterErreur("Le champ date ne doit pas être vide");
	}
	else{
		if(!estDatevalide($dateFrais)){
			ajouterErreur("Date invalide");
		}	
		else{
			if(estDateDepassee($dateFrais)){
				ajouterErreur("date d'enregistrement du diner dépassé, plus de 1 an");
			}			
		}
	}
	if($heure == ""){
		ajouterErreur("Le champ heure ne peut pas être vide");
	}
	if($prix == ""){
		ajouterErreur("Le champ montant ne peut pas être vide");
	}
	else{
		if(!is_numeric($prix) ){
			ajouterErreur("Le champ montant doit être numérique");
		}
	}
	if($nbPlace == ""){
		ajouterErreur("Le champ nombre de place ne peut pas être vide");
	}
	else{
		if(!is_numeric($nbPlace) ){
			ajouterErreur("Le champ montant doit être numérique");
		}
	}
	if($lieu == ""){
		ajouterErreur("Le champ lieu ne peut pas être vide");
	}
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs 
 
 * @param $msg : le libellé de l'erreur 
 */
function ajouterErreur($msg){
   if (! isset($_REQUEST['erreurs'])){
      $_REQUEST['erreurs']=array();
	} 
   $_REQUEST['erreurs'][]=$msg;
}
/**
 * Retoune le nombre de lignes du tableau des erreurs 
 
 * @return le nombre d'erreurs
 */
function nbErreurs(){
   if (!isset($_REQUEST['erreurs'])){
	   return 0;
	}
	else{
	   return count($_REQUEST['erreurs']);
	}
}

?>