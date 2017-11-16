<?php

require_once("include/fonctionThomas.php");
$pdo = new Pdo_amis();
if(!isset($_REQUEST['uc'])){
	$_REQUEST['uc']='action';
}
$uc = $_REQUEST['uc'];
switch($uc){
	
	case 'action':
		include ('Controleur/c_action.php');
	break;
}

?>