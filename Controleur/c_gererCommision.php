<?php 
	$action = $_REQUEST['action'];

	switch ($action) {
		case 'Ajout':
				$ajout = $pdo->Ajout_Commision($_POST["choix_personne"], $_POST["choix_commision"], $_POST["choix_fonction"]);
				
			break;
		
		default:
			# code...
			break;
	}
?>