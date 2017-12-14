<?php
if(!isset($_REQUEST['action']))
	{
		$_REQUEST['action'] = 'demandeConnexion';
		$_SESSION = array();
}

$action = $_REQUEST['action'];

switch($action){
	case 'accueil':
	break;
	
	case 'valideConnexion':{
		$login=$_REQUEST['login'];
		$mdp=$_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			$erreur[0]="Login ou mot de passe incorrect";
			include("Vue/v_erreurs.php");			
		}
		else{
			$id = $visiteur['NUMAMIS'];
			$nom =  $visiteur['NOMAMIS'];
			$prenom = $visiteur['PRENOMAMIS'];
			connecter($id,$nom,$prenom);
		}
		break;
	}
	default :
			include("Vue/v_connexion.php");
		break;
	
	
}
?>