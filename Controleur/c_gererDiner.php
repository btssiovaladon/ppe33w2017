<?php
//$mois = getMois(date("d/m/Y"));
//$numAnnee =substr( $mois,0,4);
//$numMois =substr( $mois,4,2);
$URL = "http://localhost/AMIS/ppe33w2017/";
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
		case 'supprimerDiner':{
			$idRepas= $_REQUEST['idDiner'];
			$pdo->supprimerDiner($idRepas);
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
			else{
				include("vue/v_ajoutDiner.php");
			}
			break;
		}
	}
?>