<?php
if(!isset($_REQUEST['action']))
	{$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action)
	{case 'demandeConnexion':{
		
		break;
	}
	case 'valideConnexion':
	{	$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			$erreur[0]="Login ou mot de passe incorrect";
			include("vues/v_erreurs.php");
		
		}
		else
		{	$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
		}
		break;
	}
	default :
	{	
		break;
	}
	
	include("vues/v_entete.php");
}
?>