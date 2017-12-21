<?php 
// if(!isset($_REQUEST['action'])){
	// $_REQUEST['action'] = 'choix';
// }
$URL = "http://localhost/Amis/ppe33w2017/";
$action = $_REQUEST['action'];

switch($action){
	case 'choix':
		$actions=$pdo->getAllActivite();
		include('vue/tab.php');
		
		if(isset($_POST['modifier'])){
			$lesCommi = $pdo->getAllCommission();
			$lesAmis = $pdo->getAllAmis();
			$action = $pdo->getInfoAction($_POST['idAction']);
			include('vue/v_modifierAction.php');
		}
		
		if(isset($_POST['supprimer'])){
			$nb = $pdo->getnbActionParticiper($_POST['idAction']);
			if($nb['nbAction']==0){
				$pdo->supprimerAction($_POST['idAction']);
			}else{
				echo "* supression impossible ";
			}
		}

	break;
		
	case 'modificationAction' :{
		if(isset($_POST['modifierInfo'])){
				$pdo->modifierAction($_POST['actionAmis'], $_POST['actionCommission'], $_POST['libelleAction'], $_POST['montantAction'], $_POST['dateAction'], $_POST['dureeAction'], $_POST['idActionM']);
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
	
	case 'a_imprActivitePDF':{
		echo "<script>document.location.href=\"".$URL."Vue/v_imprActivitePDF.php\";</script>";
		break;
	}
	case 'saisirBureau' :{
		include ('Vue/v_saisieBureau.php');
		break;
	}
}
?>