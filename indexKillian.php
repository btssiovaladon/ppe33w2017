<?php
require_once("Include/fct.inc.php");
require_once("Include/class.pdogsb.inc.php");
//include("Vue/v_entete.php") ; 
session_start();

$estConnecte = estConnecte();
$pdo = PdoGsb::getPdoGsb();

if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("Controleur/c_connexion.php");
		break;
	}
	case 'c_action':{
		include("Controleur/c_action.php");
		break;
	}
	case 'c_gererDiner':{
		include("Controleur/c_gererDiner.php");
		break;
	}
}
//include("Vue/v_pied.php") ;
?>