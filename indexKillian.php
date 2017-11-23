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
	case 'connexion':{
		include("Controleur/c_connexion.php");break;
	}
}
//include("Vue/v_pied.php") ;
?>