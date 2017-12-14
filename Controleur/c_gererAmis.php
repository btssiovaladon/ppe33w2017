<?php
$action = $_REQUEST['action'];
switch($action){
	
	case 'a_selectionnerAmis':{
	$_REQUEST['lstAmis']='';
	break;
	}

	
	case 'a_modification':{
	$_REQUEST['lstAmis']=$_POST['num'];
	// $data=array(	$_POST['nom'], 
					// $_POST['prenom'], 
					// $_POST['adresse'], 
					// $_POST['complementAdresse'],
					// $_POST['ville'], 
					// $_POST['codePostal'], 
					// $_POST['telephone'],
					// $_POST['mail'],
					// $_POST['numparrain1'],
					// $_POST['numparrain2'],
					// $_POST['login'],
					// $_POST['mdp'],
					// $_POST['num']);
					
	$pdo->modifierAmi($_POST['nom'], $_POST['prenom'],$_POST['num']);
	echo "chips";
		
	break;
	}
	
}
	
	$num=$_REQUEST['lstAmis'];
	
	$lesAmis=$pdo->getAllAmis();
	include ("Vue/v_listeAmis.php"); 
	
		if ($num != '' ){
			$ami=$pdo->getAmis($num);
			include ("Vue/v_modifierSupprimerAmis.php"); 
	}

	
	
	


?>