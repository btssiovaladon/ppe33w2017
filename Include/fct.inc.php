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
function connecter($id,$nom,$prenom,$fonction){
//A compléter
<<<<<<< HEAD
	
=======
	$_SESSION['idAmis']=$id;
	$_SESSION['nomAmis']=$nom;
	$_SESSION['prenomAmis']=$prenom;
	$_SESSION['numFonction']=$fonction;
>>>>>>> 6e0276d6b95d256cc30ac24cfc0bc2a008d292ee
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
<<<<<<< HEAD
}
=======
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
>>>>>>> bd057134471b0b08df7d06c2d0c5f0f98f3ff680

/**
 * Vérifie si une date est inférieure d'un an à la date actuelle
 
 * @param $dateTestee 
 * @return vrai ou faux
*/
function estDateDepassee($dateTestee){
	
 
}


/**
 * Vérifie la validité des trois arguments : la date, le libellé du frais et le montant 
 
 * des message d'erreurs sont ajoutés au tableau des erreurs
 
 * @param $dateFrais 
 * @param $libelle 
 * @param $montant
 */
function valideInfosDiner($dateDiner,$heure,$prix,$nbPlace,$lieu){
	if($dateFrais==""){
		ajouterErreur("Le champ date ne doit pas être vide");
	}
	else{
<<<<<<< HEAD
		if(!estDatevalide($dateFrais)){
			ajouterErreur("Date invalide");
		}	
		else{
			if(estDateDepassee($dateFrais)){
				ajouterErreur("date d'enregistrement du frais dépassé, plus de 1 an");
			}			
		}
=======
		if(estDateDepassee($dateDiner)){
			ajouterErreur("date d'enregistrement du diner dépassé, plus de 1 an");
		}			
>>>>>>> bd057134471b0b08df7d06c2d0c5f0f98f3ff680
	}
	if($libelle == ""){
		ajouterErreur("Le champ description ne peut pas être vide");
	}
	if($montant == ""){
		ajouterErreur("Le champ montant ne peut pas être vide");
	}
	else
		if( !is_numeric($montant) ){
			ajouterErreur("Le champ montant doit être numérique");
		}
}

?>