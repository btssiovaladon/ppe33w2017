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
* Retourne le chef d'une activité
 
* @param $idActivité
* @return un tableau contenant toutes les informations du chef
*/
	public function getChefActivite($idActivité){
		$req = "select p.NUMAMIS as numero, NOMAMIS as nom, PRENOMAMIS as prenom, ADRESSERUEAMIS as adresse,ADRESSEVILLEAMIS as ville, CODEPOSTALAMIS as codePostal, TELEPHONEAMIS as telephone, MAILAMIS as mail from amis a INNER JOIN action ac on ac.NUMAMIS=a.NUMAMIS
		where NUMACTION ='$idActivité'";	
		$res = PdoGsb::$monPdo->query($req);
		$lesAmis = $res->fetchAll();
		$leChef = $res->fetch();
		return $leChef; 
	}
	
/**
* Retourne toutes les activités
 
* @param 
* @return un tableau contenant toutes les activités
*/
	public function getAllActivite(){
		$req = "select NUMACTION, NUMAMIS, NUMEROCOMMISSION, LIBELLEACTION, MONTANTACTION, DATEACTION, DUREEACTION from action";
		$res = PdoGsb::$monPdo->query($req);
		$lesAmis = $res->fetchAll();
		return $lesAmis; 
	}
	/*
	*Modification des données d'un repas 
	*
	*@param $idRepas
	*@retourne le diner contenant la mise à jour des données
	*/

	public function modifierRepas($idRepas, $heure, $date, $prix, $places, $lieu){
		$req =" UPDATE `repas` SET HEUREREPAS= '$heure',DATEREPAS = '$date',PRIXREPAS ='$prix',NBRPLACESREPAS='$places',LIEUREPAS='$lieu' WHERENUMREPAS='$idRepas'";
		$rs = $this->monPdo->query($req);
	}
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
	*Affichage des données d'un repas 
	*
	*@Affiche les informations des diner 
	*/
	public function getAllInfoDiner(){
		$req = "SELECT * FROM repas";
		$res =PdoGsb::$monPdo->query($req);
		$repas =$res->fetchAll();
		return $repas;
	}


/*
	*Affichage de la date d'un repas 
	*
	*@param $idRepas
	*@Affiche la date du diner par l'identifiant 
	*/
	public function getDateDiner($idRepas){
		$req = "SELECT DATEREPAS FROM REPAS WHERE NUMREPAS='$idRepas'";
		$res =PdoGsb::$monPdo->query($req);
		$repas =$res->fetch();
		return $repas;
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
	*Ajout d'une action
	*@param $num_ami, $num_commi, $libelle_act, $montant_act, $date_act, $duree_act
	*/
	public function ajouterAction($num_ami, $num_commi, $libelle_act, $montant_act, $date_act, $duree_act){
		
		
		$req = "insert into action
		values (NULL, '$num_ami', '$num_commi', '$libelle_act', '$montant_act', '$date_act', '$duree_act')";
		PdoGsB::$monPdo->exec($req);
		
	}
	public function modifierAction($numAmis, $numComi, $libelle, $montant, $date, $duree, $numAction){
		$req =" UPDATE ACTION SET NUMAMIS= '$numAmis', NUMEROCOMMISSION = '$numComi',LIBELLEACTION ='$libelle', MONTANTACTION='$montant', DATEACTION='$date', DUREEACTION='$duree' WHERE NUMACTION='$numAction'";
		PdoGsb::$monPdo->query($req);
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
	*/
		public function getAllCommission(){
		$req = "SELECT * FROM COMMISSION";
		$res = PdoGsb::$monPdo->query($req);
		$lesCommi = $res->fetchAll();
		return $lesCommi;
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
	/*récupération des repas par l'identifiant
	*
	*@paramètre $idRepas
	*
	*/
	public function getRepasById($idRepas){
			$req= "SELECT * FROM REPAS WHERE NUMREPAS=$idRepas";
			$rs = PdoGsb::$monPdo->query($req);
			$rec=$rs->fetchAll();
			return $rec;
	}

	/*
	*récupère les participants  grâce l'dentifiant des amis et l'dentifiant d'un repas
	*
	*@param  $idRepas
	*
	*/
	public function getParticipantRepas($idRepas){
		$req="SELECT * FROM AMIS a INNER JOIN Inviter i ON i.numamis=a.numamis where NUMREPAS='$idRepas'";
		$res = PdoGsb::$monPdo->query($req);
		$participant= $res->fetchAll();
		return $participant;
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
		
	/*
	*Suppression des données d'une action 
	*
	*@param $idAction
	*/
	public function supprimerAction($idAction){
   		$req = " DELETE FROM ACTION WHERE NUMACTION='$idAction'";
   		PdoGsb::$monPdo->query($req);
}


	/**
 * Crée un nouveau diner à partir des informations fournies en paramètre
 
 * @param $dateDiner
 * @param $heure
 * @param $prix
 * @param $nbPlace
 * @param $lieu
*/


/** Retourne le nom d'une activité

* @param $numAction le numéro de l'action
* @return le nom de l'activité
*/
	public function getNomActivite($numAction){
		$req = "select LIBELLEACTION as nom from action where NUMACTION='$numAction'";
		$res = PdoGsb::$monPdo->query($req);
		$nomAct = $res->fetch();
		return $nomAct; 
	}
/**
 * Crée un nouveau diner à partir des informations fournies en paramètre
 
 * @param $dateDiner
 * @param $heure
 * @param $prix
 * @param $nbPlace
 * @param $lieu
*/
	public function creeNouveauDiner($dateDiner,$heure,$prix,$nbPlace,$lieu){
		$req = "insert into repas
		values(NULL,'$heure','$dateDiner',$prix,$nbPlace,'$lieu')";
		PdoGsb::$monPdo->exec($req);
	}

	/*
	*retourne tous les amis
	*
	*/
	public function getAmis($num){
		$req="SELECT * FROM AMIS WHERE NUMAMIS='$num' ";
		$res = PdoGsb::$monPdo->query($req);
		$nomAmis= $res->fetch();
		return $nomAmis; 
			
	}
	
	/*
	*Modification des données d'un ami
	*
	*
	*/
	public function modifierAmi($nom,$prenom,$num){
		/*$req =" UPDATE AMIS SET NOMAMIS= ?,PRENOMAMIS = ?,ADRESSERUEAMIS =?, ADRESSECOMPLEMENTAMIS=?, ADRESSEVILLEAMIS=?, CODEPOSTALAMIS=?, TELEPHONEAMIS=?,TELEPHONEAMIS=?, MAILAMIS=?, DATEENTREEAMIS=?, NUMPARRAIN1=?, NUMPARRAIN2=?, LOGIN=?, MDP=? WHERE NUMAMIS=?";
		$prep = PdoGsb::$monPdoGsb->query($req);
		$parm=array($data["nom"],$data["prenom"], $data["adresse"], $data["complementAmis"], $data["ville"], $data["codePostal"],$data["telephone"],$data["mail"],$data["numparrain1"], $data["numparrain2"], $data["login"], $data["mdp"]);
		//$this->exexute($prep,$parm);*/
		$req =" UPDATE AMIS SET NOMAMIS= ?,PRENOMAMIS = ? WHERE NUMAMIS=?";
		$prep = PdoGsb::$monPdoGsb->prepare($req);
		$prep->execute(array($nom,$prenom,$num));
		
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
	public function creeNouvelAmis ($nomAmis, $prenomAmis, $adresseRueAmis, $adresseComplementAmis, $adresseVilleAmis,$codePostalAmis, $telephoneAmis, $mailAmis, $dateEntreeAmis){
		$req = "INSERT INTO amis VALUES (NULL, '$nomAmis', '$prenomAmis','$adresseRueAmis','$adresseComplementAmis','$adresseVilleAmis', '$codePostalAmis','$telephoneAmis','$mailAmis','$dateEntreAmis')";
		PdoGsb::$monPdo->exec($req);
	}

/**
*Cette fonction permet de vérifier si un ami participe à une activité en temps que chef ou participant
* @param $numAction le numéro de l'action à vérifier
* @param $numAmis le numéro d'un ami à vérifier
* @return Vrai s'il n'y est pas Faux sinon
*/	
	public function verifAmis($numAction,$numAmis){
		$req ="SELECT COUNT(*) FROM PARTICIPER where NUMAMIS='$numAmis' and NUMACTION='$numAction'";
		$req2 ="SELECT COUNT(*) FROM ACTION where NUMAMIS='$numAmis' and NUMACTION='$numAction'";
		$res = PdoGsb::$monPdo->query($req);
		$action = $res->fetch();
		$res2 = PdoGsb::$monPdo->query($req2);
		$action2 = $res2->fetch();
		if ($action+$action2==0){
			return true;
		}
		else{
			return false;
		}
	}


	public function getInfosVisiteur ($login, $MDP){
		$req = "select NUMAMIS, NOMAMIS, PRENOMAMIS, NUMFONCTION from amis where Login = :login and MDP = :MDP ";
		$res = PdoGsb::$monPdo->prepare($req);
		$res -> execute(array(
				'login' => $login,
				'MDP' => $MDP ));
		$row = $res->fetch();
		return $row; 
	}
	
	/*
	*retourne le montant total des repas
	*
	*/
	
	public function montantannuel(){
		$req="SELECT a.NUMAMIS, NOMAMIS, PRENOMAMIS, DATEREPAS, NOMBREPERSONNES, PRIXREPAS, PRIXREPAS*NOMBREPERSONNES AS Montanttotal FROM `inviter` i INNER JOIN amis a on i.NUMAMIS = a.NUMAMIS INNER JOIN repas r on i.NUMREPAS=r.NUMREPAS order by i.NUMAMIS";
		$res = PdoGsb::$monPdo->query($req);
		$montant = $res->fetchAll();
		return $montant; 
	}
	
	/*
	*retourne la cotisation annuelle
	*
	*/
	
	public function cotisation(){
		$req="SELECT MONTANTCOTISATION FROM PARAMETRE";
		$res = PdoGsb::$monPdo->query($req);
		$montant = $res->fetchAll();
		return $montant; 
	}
	/*
	*Affichage de la date d'un repas 
	*
	*@param $idRepas
	*@Affiche la date du diner par l'identifiant 
	*/
	public function getIdDiner($idRepas){
		$req = "SELECT NUMREPAS FROM REPAS WHERE NUMREPAS='$idRepas'";
		$res =PdoGsb::$monPdo->query($req);
		$repas =$res->fetch();
		return $repas;
	}	
	
	public function enregistrerBureau($secretaire,$secretaireAdj,$tresorier,$tresorierAdj){
		$req = "update amis set NUMFONCTION = 5 where NUMFONCTION!=5";
		PdoGsb::$monPdo->exec($req);
		$reqSec = "update amis set NUMFONCTION = 1 where NUMAMIS = $secretaire";
		PdoGsb::$monPdo->exec($reqSec);
		$reqSecAdj = "update amis set NUMFONCTION = 2 where NUMAMIS = $secretaireAdj";
		PdoGsb::$monPdo->exec($reqSecAdj);
		$reqTre = "update amis set NUMFONCTION = 3 where NUMAMIS = $tresorier";
		PdoGsb::$monPdo->exec($reqTre);
		$reqTreAdj = "update amis set NUMFONCTION = 4 where NUMAMIS = $tresorierAdj";
		PdoGsb::$monPdo->exec($reqTreAdj);
	}
	
	/*
	*Récupération des informations des participants pour un repas
	*
	*@param $idRepas
	*/
	public function getInfoParticipantRepas($idRepas){
		$req = "SELECT i.NUMAMIS,NOMAMIS,PRENOMAMIS,NOMBREPERSONNES FROM INVITER i JOIN AMIS a ON i.NUMAMIS=a.NUMAMIS WHERE NUMREPAS=$idRepas";
		$res = PdoGsb::$monPdo->query($req);
		$repas = $res->fetchAll();
		return $repas;
	}
	
	/*
	*Supprimer le participant d'un repas
	*
	*@param $idAmis
	*/
	public function supprimerParticipant($idAmis,$idRepas){
		$req = "DELETE FROM INVITER WHERE NUMAMIS=$idAmis AND NUMREPAS=$idRepas";
		$res = PdoGsb::$monPdo->query($req);
	}
}
?>