<?php
include("include/inc_fonctions.php");

$action=null;
if (isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
}
switch ($action) {
	case 'Repasmodifier':
		
		break;
	case 'Repassupprimer':
		
		break;
	default:
		 include("vue/v_.php");
		break;
}




?>