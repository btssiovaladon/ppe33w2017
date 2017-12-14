<?php
if(!isset($_REQUEST['action']) |
	(count($_SESSION)==0 & $_REQUEST['action'])!= 'valideConnexion'){
		$_REQUEST['action'] = 'demandeConnexion';
		$_SESSION = array();
}

$action = $_REQUEST['action'];
$erreur="";

switch($action){
	case 'accueil':
	break;
	
	case 'valideConnexion':
		$login=$_REQUEST['login'];
		$mdp=$_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		
		if(!is_array( $visiteur)){
			$erreur ="Login ou mot de passe incorrect";
			include("Vue/v_connexion.php");	
		}
		
		else{
			
			
			$id = $visiteur['NUMAMIS'];
			$nom =  $visiteur['NOMAMIS'];
			$prenom = $visiteur['PRENOMAMIS'];
			$fonction = $visiteur['NUMFONCTION'];
			connecter($id,$nom,$prenom,$fonction);
			include("Vue/v_entete.php");
		}
		
		break;
	
	case 'deconnecter':
		deconnecter();
		$_REQUEST['action'] = 'demandeConnexion';
	
	
	default :
			include("Vue/v_connexion.php");
		break;
	
	
}

?>