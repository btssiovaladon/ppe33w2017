<?php 
$pdo = PdoGsb::$monPdoGsb;
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'choix';
}
$action = $_REQUEST['action'];

switch($action){
	case 'choix':
		$actions=$pdo->getAction();
		include('vue/choix_action.php');
	break;
	
	case 'modificationAction' :
	
	break;
	
	case 'supprAction' :
	
	break;
	
	
}


?>