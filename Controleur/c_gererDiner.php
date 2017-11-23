<?php
$action = $_REQUEST['action'];
switch($action){
	case 'selectionDiner':{
		$lesRepas= $pdo->getAllInfoDiner();
		if(!isset($lesRepas)){
			echo "aucun repas...";
			break;
		}
		include("Vue/v_tableauDiner.php");
		break;
	}
	
	case 'validerCreationDiner':{
		$dateDiner = $_REQUEST['dateFrais'];
		$heure = $_REQUEST['heureDiner'];
		$prix = $_REQUEST['prixDiner'];
		$nbPlace = $_REQUEST['nbplaceDiner'];
		$lieu = $_REQUEST['lieuDiner'];
		valideInfosDiner($dateDiner,$heure,$prix,$nbPlace,$lieu);
		if (nbErreurs() != 0 ){
			include("vues/v_erreurs.php");
		}
		else{
			$pdo->creeNouveauDiner($dateDiner,$heure,$prix,$nbPlace,$lieu);
		}
		break;
	}

	case 'supprimerDiner':{
		$idRepas= $_REQUEST['idDiner'];
	    $pdo->supprimerDiner($idRepas);
		break;
	}
	case 'modifierDiner':{
		
		$pdo->modifierDiner($idRepas,$heure,$date,$prix,$places,$lieu);
		break;
	}
}

?>