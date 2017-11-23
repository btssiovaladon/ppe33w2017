<?php
include("vues/v_sommaire.php");
$mois = getMois(date("d/m/Y"));
$numAnnee =substr( $mois,0,4);
$numMois =substr( $mois,4,2);
$action = $_REQUEST['action'];
switch($action){
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




}

?>