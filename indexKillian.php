<?php
require_once("Include/fct.inc.php");
require_once("Include/class.pdogsb.inc.php");
include("Vue/v_entete.php") ; 
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'c_connexion':{
		//include("controleurs/c_connexion.php");break;
	}
	case 'c_actions':{
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