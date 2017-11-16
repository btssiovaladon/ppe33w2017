<?php
$action = $_REQUEST['action'];
switch($action){
	case 'a_inscription':{
		$code = $_REQUEST['codeActivité'];
		include("Vue/v_inscriptionAmis.php");
		break;
	}
}
?>