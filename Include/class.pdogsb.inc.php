<?php
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
		retourne toutes les actions
	**/
	
	public function getAction(){
		$req = "select DISTINCT numaction,libelleAction FROM ACTION";
			$rs = PdoGsb::$monPdo->query($req);
			$lignes=array();
			if($rs == true){
				$lignes = $rs->fetchAll();
			}
			return $lignes;
		
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
	*/

	public function modifierRepas($idRepas, $heure, $date, $prix, $places, $lieu){
		$req =" UPDATE `repas` SET HEUREREPAS= '$heure',DATEREPAS = '$date',PRIXREPAS ='$prix',NBRPLACESREPAS='$places',LIEUREPAS='$lieu' WHERENUMREPAS='$idRepas'";
		$rs = $this->monPdo->query($req);
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
	*Recupere les informations d'une action fourni
	*
	*@idAction
	*/
	public function getInfoAction($idAction){
		$req = "SELECT * FROM ACTION WHERE NUMACTION = '$idAction'";
		$res = PdoGsb::$monPdo->query($req);
		$action = $res->fetch();
		return $action;
	}
	
	/*
	*Modification des données d'une action
	*
	*
	*/
	public function modifierAction($numAmis, $numComi, $libelle, $montant, $date, $duree, $numAction){
		$req =" UPDATE ACTION SET NUMAMIS= ?,NUMEROCOMMISSION = ?,LIBELLEACTION =?, MONTANTACTION=?, DATEACTION=?, DUREEACTION=? WHERE NUMACTION=?";
		$prep = PdoGsb::$monPdoGsb->prepare($req);
		$prep->execute(array($numAmis,$numComi,$libelle,$montant,$date,$duree,$numAction));
}

	/*
	*retourne toutes les commissions
	*
	*/
	public function getAllCommission(){
		$req="SELECT * FROM COMMISSION";
		$rs = PdoGsb::$monPdo->query($req);
			$lignes=array();
			if($rs == true){
				$lignes = $rs->fetchAll();
			}
			return $lignes;
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
	
}

?>