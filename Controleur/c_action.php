<?php 
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'choix';
}
$action = $_REQUEST['action'];

switch($action){	
	case 'modificationAction' :
	$action = $pdo->getInfoAction($_POST['idAction']);
	$commi = $pdo->getAllCommission();
	$amis = $pdo->getAllAmis();
		if(isset($_POST['modifierInfo'])){
			
		}
	break;
	
	case 'supprAction' :
	
	break;
	
	case 'a_inscription':{
		$code = $_REQUEST['codeActivité'];
		include("Vue/v_inscriptionActivitéAmis.php");
		break;
	}
	
	
}


?>