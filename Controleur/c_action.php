<?php 
// if(!isset($_REQUEST['action'])){
	// $_REQUEST['action'] = 'choix';
// }
$URL = "http://localhost/AMIS/ppe33w2017/";
$action = $_REQUEST['action'];
switch($action){	
	case 'modificationAction' :{
	$action = $pdo->getInfoAction($_POST['idAction']);
	$lesCommi = $pdo->getAllCommission();
	$lesAmis = $pdo->getAllAmis();
		if(isset($_POST['modifierInfo'])){
			$pdo->modifierAction($_POST['actionAmis'], $_POST['actionCommission'], $_POST['libelleAction'], $_POST['montantAction'], $_POST['dateAction'], $_POST['DureeAction'], $action['NUMACTION']);
		}
	break;
	}
	
	case 'supprAction' :{
		if($pdo->getnbActionParticiper($_POST['idAction'])==0){
			$pdo->supprimerAction($_POST['idAction']);
		}else{
			echo "supression impossible";
		}
	break;
	}
	
	case 'a_inscription':{
		// $code = $_REQUEST['codeActivité'];
		$activite=1;
		$lesAmis= $pdo->getAllAmisParActivité($activite);
		$leChef=$pdo->getChefActivite($activite);
		$nomActivite=$pdo->getNomActivite($activite);
		include("Vue/v_inscriptionsActiviteAmis.php");
		break;
	}
	
	case 'a_imprimerActivite':{
		$activite=1;
		$lesAmis= $pdo->getAllAmisParActivité($activite);
		$leChef=$pdo->getChefActivite($activite);
		$nomActivite=$pdo->getNomActivite($activite);
		include("Vue/v_imprimerActiviteAmis.php");
		break;
	}
	
	
}
?>