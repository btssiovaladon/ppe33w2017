<?php

$amis = $_REQUEST['amis'];
switch($amis){
	case 'validerCreationAmis':{
		$nomAmis = $_REQUEST['nomAmis'];
		$prenomAmis = $_REQUEST['prenomAmis'];
		$adresseRueAmis = $_REQUEST['adresseRueAmis'];
		$adresseComplementAmis = $_REQUEST['adresseComplementAmis'];
		$adresseVilleAmis = $_REQUEST['adresseVilleAmis'];
		$codePostalAmis = $_REQUEST['codePostalAmis'];
		$telephoneAmis = $_REQUEST['prenomAmis'];
		$mailAmis = $_REQUEST['adresseRueAmis'];
		$dateEntreeAmis= $_REQUEST['dateEntreeAmis'];
			$pdo->creeNouvelAmis($nomAmis,$prenomAmis,$adresseRueAmis,$adresseComplementAmis,$codePostalAmis,$telephoneAmis,$mailAmis,$dateEntreeAmis);
		}

$action = $_REQUEST['action'];
switch($action){
	case 'a_ajouteAmis':{
		//appel fonction verif
		//si verif ok appel vue
		include("Vue/v_creationAmis.php");

		break;
	
	}

	case 'a_modifierAmis':{
	
	include ("Vue/v_modifierSupprimerAmis.php");
	break;
	}
	
}

?>