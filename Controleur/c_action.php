<?php 
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'choix';
}
$action = $_REQUEST['action'];

switch($action){
	case 'choix':
		$actions=$pdo->getAllActivite();
		include('vue/tab.php');
	break;
	
	case 'modificationAction' :
	
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