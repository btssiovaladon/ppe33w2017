<?php
$action = $_REQUEST['action'];

switch($action){
	
	case 'enregistrerBureau':{
		enregistrerBureau($,$,$,$);
		include('Vue/v_saisieBureau.php');
	break;
	}
	
?>