<?php

	$action = $_REQUEST['action'];
	switch($action){
		case 'validerCreationDiner':{
			$dateDiner = $_REQUEST['dateDiner'];
			$heure = $_REQUEST['heureDiner'];
			$prix = $_REQUEST['prixDiner'];
			$nbPlace = $_REQUEST['nbplaceDiner'];
			$lieu = $_REQUEST['lieuDiner'];
			valideInfosDiner($dateDiner,$heure,$prix,$nbPlace,$lieu);
			if (nbErreurs() != 0 ){
				include("Vue/v_erreurs.php");
				break;
			}
			else{
				$pdo->creeNouveauDiner($dateDiner,$heure,$prix,$nbPlace,$lieu);
			}
			break;
		}

		case 'a_creerDiner':{
			include("Vue/v_ajoutDiner.php");
			break;
		}
		
		case 'modifierDiner':{
			if(isset($_POST['dateDiner']) && ($__POST['heureDiner']) && ($_POST['prixDiner']) && ($_POST['nbplaceDiner']) && ($_POST['lieuDiner'])){

				$idRepas=$_POST['idRepas'];
				$date=$_POST['dateDiner'];
				$heure=$_POST['heureDiner'];
				$prix=$_POST['prixDiner'];
				$places=$_POST['nbplaceDiner'];
				$lieu=$_POST['lieuDiner'];
				$pdo->modifierDiner($idRepas,$heure,$date,$prix,$places,$lieu);
			}
			break;
		}	
		

		case 'supprimerDiner':{
			$idRepas= $_REQUEST['idDiner'];
			$pdo->supprimerDiner($idRepas);
			break;
		}
		
		case 'selectionDiner':{
			$lesRepas= $pdo->getAllInfoDiner();
			if(!isset($lesRepas)){
				echo "aucun repas...";
				break;
			}
			include("Vue/v_moisDiner.php");
			break;
		}
		
		case 'tableaudiner':{
			$lesRepas= $pdo->getAllInfoDiner();
			$idRepas=$_POST['repas'];
			$dateRepas= $pdo->getDateDiner($idRepas);
			include("Vue/v_moisDiner.php");
			include("Vue/v_tableauDiner.php");
			break;
		}
		case'inscription':{
			echo "Bonojour";
			$repas=1;
			$listediner=$pdo->getRepas();
			
			$listeparticipant =$pdo->getParticipantRepas($cmbdiner);
			include("Vue/v_inscriptionDinerAmis.php");
			break;
		}
		case'edition':{
			$repas=1;
			$listediner=$pdo->getRepas();
			
			$listeparticipant =$pdo->getParticipantRepas($cmbdiner);
			include("Vue/v_imprimerDinerPDF.php");
			break;
		}
		case 'consultationDiner':{
			$idDiner=$_POST['Consultation3'];
			$lesParticipants = $pdo->getInfoParticipantRepas($idDiner);
			include("Vue/v_consultationDiner.php");
			break;
		}
		case 'supprimerParticipant':{
			$idPart=$_GET['id'];
			$idDiner=$_GET['idRepas'];
			$pdo->supprimerParticipant($idPart,$idDiner);
			break;
		}
	}
?>