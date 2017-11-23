<<<<<<< HEAD
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
=======
<?php
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
			include("Vue/v_erreurs.php");
>>>>>>> 2a56b24ff6515a270f0195c569acd20712e70b87
		}

		case 'supprimerDiner':{
			$idRepas= $_REQUEST['idDiner'];
			$pdo->supprimerDiner($idRepas);
			break;
		}
<<<<<<< HEAD
=======
		break;
	}
	case 'a_creerDiner':{
		include("Vue/v_ajoutDiner.php");
		break;
	}
>>>>>>> 2a56b24ff6515a270f0195c569acd20712e70b87

		case 'modifierDiner':{
			if(isset($_POST['dateDiner']) && ($__POST['heureDiner') && ($_POST['prixDiner']) && ($_POST['nbplaceDiner']) && ($_POST['lieuDiner'])){

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




	}

	?>