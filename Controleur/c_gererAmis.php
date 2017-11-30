<?php
$action = $_REQUEST['action'];
switch($action){
	case 'a_ajouteAmis':{
		//appel fonction verif
		//si verif ok appel vue
		include("Vue/v_creationAmis.php");
		break;
	
	}
	case 'a_modifierAmis':{
	
	include ("Vue/v_modifierSupprimerAmis.php");
	break;
	}
	
}

?>