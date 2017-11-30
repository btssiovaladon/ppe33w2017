<?php
$amis = $_REQUEST['amis'];
switch($amis){
	case 'a_ajouteAmis':{
		//appel fonction verif
		//si verif ok appel vue
		include("Vue/v_creationAmis.php");
		break;
	}
	/*case 'validerCreationFrais':{
		
		
		break;*/
}
?>