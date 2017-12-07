﻿<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author JP Chateau
 * @version    1.0
 * @link
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=ppeamis';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */	
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}

/**
* Retourne tous les amis participants à une activité
 
* @param $idActivité
* @return un tableau contenant toutes les informations des participants
*/
	public function getAllAmisParActivité($idActivité){
		$req = "select p.NUMAMIS as numero, NOMAMIS as nom, PRENOMAMIS as prenom, ADRESSERUEAMIS as adresse, ADRESSEVILLEAMIS as ville, CODEPOSTALAMIS as codePostal, TELEPHONEAMIS as telephone, MAILAMIS as mail from amis a INNER JOIN participer p on p.NUMAMIS=a.NUMAMIS
		where NUMACTION ='$idActivité'
		order by NOMAMIS";	
		$res = PdoGsb::$monPdo->query($req);
		$lesAmis = $res->fetchAll();
		return $lesAmis; 
	}
	
/**
* Retourne le chef d'une activité
 
* @param $idActivité
* @return un tableau contenant toutes les informations du chef
*/
	public function getChefActivite($idActivité){
		$req = "select p.NUMAMIS as numero, NOMAMIS as nom, PRENOMAMIS as prenom, ADRESSERUEAMIS as adresse,ADRESSEVILLEAMIS as ville, CODEPOSTALAMIS as codePostal, TELEPHONEAMIS as telephone, MAILAMIS as mail from amis a INNER JOIN action ac on ac.NUMAMIS=a.NUMAMIS
		where NUMACTION ='$idActivité'";	
		$res = PdoGsb::$monPdo->query($req);
		$lesAmis = $res->fetchAll();
		return $leChef; 
	}
	
/**
* Retourne toutes les activités
 
* @param 
* @return un tableau contenant toutes les activités
*/
	public function getAllActivite(){
		$req = "select NUMACTION as numero, NUMAMIS as numeroAmis, NUMEROCOMMISSION as numeroCommission, LIBELLEACTION as nom, MONTANTACTION as montant, DATEACTION as date, DUREEACTION as duree from action";
		$res = PdoGsb::$monPdo->query($req);
		$lesAmis = $res->fetchAll();
		return $lesAmis; 
	}
	/*
	*Modification des données d'un repas 
	*
	*@param $idRepas
	*@retourne le diner contenant la mise à jour des données

	public function modifierRepas($idRepas, $heure, $date, $prix, $places, $lieu){
		$req =" UPDATE `repas` SET HEUREREPAS= '$heure',DATEREPAS = '$date',PRIXREPAS ='$prix',NBRPLACESREPAS='$places',LIEUREPAS='$lieu' WHERENUMREPAS='$idRepas'";
		$rs = $this->monPdo->query($req);

	public function modifierRepas($idRepas,$heure,$date,$prix,$places,$lieu){
		$req =" UPDATE `repas` SET HEUREREPAS='$heure',DATEREPAS='$date',PRIXREPAS='$prix',NBRPLACESREPAS='$places',LIEUREPAS='$lieu' WHERE NUMREPAS='$idRepas'";

}
/*
	*Suppression des données d'un repas 
	*
	*@param $idRepas
	*@supprime le diner par l'identifiant 
	*/
	public function supprimerRepas($idRepas){
   		$req = " DELETE FROM `repas` WHERE NUMREPAS='$idRepas'";
   		$rs =$this->monPdo->query($req);
	}
	
	/*
	*Ajout d'une action
	*@param $num_ami, $num_commi, $libelle_act, $montant_act, $date_act, $duree_act
	*/
	public function ajouterAction($num_ami, $num_commi, $libelle_act, $montant_act, $date_act, $duree_act){
		
		
		$req = "insert into action
		values (NULL, '$num_ami', '$num_commi', '$libelle_act', '$montant_act', '$date_act', '$duree_act')";
		PdoGsB::$monPdo->exec($req);
		
	}
	/*
	*retourne tous les amis
	*
	*/
	public function getAllAmis(){
		$req="SELECT * FROM AMIS";
		$rs = PdoGsb::$monPdo->query($req);
			$lignes=array();
			if($rs == true){
				$lignes = $rs->fetchAll();
			}
			return $lignes;
	}
	
	public function getAllCommission(){
		$req="SELECT * FROM commission";
		$rs = PdoGsb::$monPdo->query($req);
			$lignes=array();
			if($rs == true){
				$lignes = $rs->fetchAll();
			}
			return $lignes;
	}
	
	
	public function getAllAmisCompletion($nomAmis){
		$req="select * from amis where NOMAMIS like '".$nomAmis."%' ORDER by NOMAMIS, PRENOMAMIS";
		
		$rs = PdoGsb::$monPdo->query($req);
			$lignes=array();
			if($rs == true){
				$lignes = $rs->fetchAll();
			}
			return $lignes;
	}
	
	
	


	/*
	*
	*retoune tous les repas 
	*/

	public function getRepas(){
		$req="SELECT * FROM REPAS";
		$rs =PdoGsb::$monPdo->query($req);

		$ligne=array();
		if($rs == true){
			$ligne = $rs->fetchAll();
		}
		return $ligne;

	}


	/*
	*nombre d'action donnee dans participer
	*
	*@idAction
	*/
	public function getnbActionParticiper($idAction){
		$req = "SELECT COUNT(NUMACTION) AS nbAction FROM PARTICIPER WHERE NUMACTION = '$idAction'";
		$res = PdoGsb::$monPdo->query($req);
		$action = $res->fetch();
		return $action;
	}

/**
 * Crée un nouvel amis à partir des informations fournies en paramètre.
 
 * @param $nomAmis
 * @param $prenomAmis
 * @param $adresseRueAmis
 * @param $adresseComplementAmis
 * @param $adresseVilleAmis
 * @param $codePostalAmis
 * @param $telephoneAmis
 * @param $mailAmis
 * @param $dateEntreAmis
*/
	public function creeNouvelAmis ($nomAmis, $prenomAmis, $adresseRueAmis, $adresseComplementAmis, $adresseVilleAmis, 
									$codePostalAmis, $telephoneAmis, $mailAmis, $dateEntreeAmis){
		$req = "INSERT INTO amis VALUES (NULL, '$nomAmis', '$prenomAmis','$adresseRueAmis',
		'$adresseComplementAmis','$adresseVilleAmis', '$codePostalAmis','$telephoneAmis','$mailAmis','$dateEntreAmis')";
		PdoGsb::$monPdo->exec($req);
	}

}

?>