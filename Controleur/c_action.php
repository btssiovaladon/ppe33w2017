<?php 
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'choix';
}
$action = $_REQUEST['action'];

switch($action){
	case 'choix':
		//$actions=$pdo->getAction();
		include('vue/choix_action.php');
	break;
	
	case 'modificationAction' :
	
	break;
	
	case 'supprAction' :
	
	break;
	
	case 'ajoutAction' :
			include "vue/v_saisieAction.php";
	break;
	
	case 'ajouterAct' :
		$pdo->ajouterAction($_GET['num_ami'], $_GET['num_commi'], $_GET['libelle_act'], $_GET['montant_act'], 
		$_GET['date_act'], $_GET['duree_act']);
		
	break;
	
	
}


?>