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
		break;
	}
}
?>