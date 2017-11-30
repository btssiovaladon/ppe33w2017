<?php
		include("vue/v_entete.php");
		require_once("include/class.pdogsb.inc.php");
		require_once("vue/fct.inc.php");
		session_start();
		$pdo = PdoGsb::getPdoGsb();
		$estConnecte = estConnecte(); 

		if(!isset($_REQUEST['uc']) || !$estConnecte){
     		$_REQUEST['uc'] = 'connexion';
		}	 
		$uc = $_REQUEST['uc'];
		switch($uc){
			case 'c_action':
			include("Controleur/c_action.php");
			break;
		}
?>