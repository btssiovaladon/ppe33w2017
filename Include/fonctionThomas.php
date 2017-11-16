<?php

class Pdo_amis {
	
	private $serveur = 'mysql:host=localhost';
	private $bdd = 'dbname=amis';
	private $user = 'root';
	private $mdp = '';
	private $monPdoInspection = null;
	
	
	public function getAction(){
		$req = "select DISTINCT numaction,libelleAction FROM ACTION";
			$rs = $pdo->query($req);
			$lignes = $rs->fetchALL();
			return $lignes;
		
	}

}
?>