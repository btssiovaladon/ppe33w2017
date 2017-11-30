<?php
require_once("Include/fct.inc.php");
require_once("Include/class.pdogsb.inc.php");
include("Vue/v_creationAmis.php") ; 
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("Controleur/c_connexion.php");
		break;
=======
	
	case 'c_gererAmis':{
		include("Controleur/c_gererAmis.php");
		break;
	}
	/*case 'c_connexion':{
		include("controleurs/c_connexion.php");
		break;
	}*/
	
	
}
?>