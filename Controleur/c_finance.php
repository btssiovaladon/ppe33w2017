<?php 
if(!isset($_REQUEST['finance'])){
	$_REQUEST['finance'] = 'saisiecotisation';
}
$action = $_REQUEST['finance'];

switch($action){
	case 'saisiecotisation':
		include('Vue/v_formCotisation.php');
	break;
	
	case 'EditionPDF' :
		$actions=$pdo->getAction();
		include('Vue/v_editionpdf.php');
	
	break;
	
	case 'rgltamis' :
		$actions=$pdo->getAction();
		include('Vue/v_reglement.php');
	
	break;
	
}

?>