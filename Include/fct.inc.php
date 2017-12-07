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
	$_SESSION['idAmis']=$id;
	$_SESSION['nomAmis']=$nom;
	$_SESSION['prenomAmis']=$prenom;
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
	$_SESSION=array();
}

/**
 * Transforme une date au format format anglais aaaa-mm-jj vers le format français jj/mm/aaaa 
 
 * @param $madate au format  aaaa-mm-jj
 * @return la date au format format français jj/mm/aaaa
*/
function dateAnglaisVersFrancais($maDate){
   @list($annee,$mois,$jour)=explode('-',$maDate);
   $date="$jour"."/".$mois."/".$annee;
   return $date;
}

/* gestion des erreurs*/

/**
 * Vérifie si une date est inférieure d'un an à la date actuelle
 
 * @param $dateTestee 
 * @return vrai ou faux
*/
function estDateDepassee($dateTestee){
	
 
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
		if(estDateDepassee($dateDiner)){
			ajouterErreur("date d'enregistrement du diner dépassé, plus de 1 an");
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