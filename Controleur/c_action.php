<?php 
// if(!isset($_REQUEST['action'])){
	// $_REQUEST['action'] = 'choix';
// }
$URL = "http://localhost/AMIS/ppe33w2017/";
$action = $_REQUEST['action'];

switch($action){	
	case 'modificationAction' :
	$action = $pdo->getInfoAction($_POST['idAction']);
	$lesCommi = $pdo->getAllCommission();
	$lesAmis = $pdo->getAllAmis();
		if(isset($_POST['modifierInfo'])){
			$pdo->modifierAction($_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $_POST[''], $action['NUMACTION']);
		}
	break;
	
	case 'supprAction' :
	
	break;
	
	case 'a_inscription':{
		// $code = $_REQUEST['codeActivité'];
		include("Vue/v_inscriptionsActivitéAmis.php");
		break;
	}
	
	
	
}


?>