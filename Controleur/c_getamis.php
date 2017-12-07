<?php


require_once("../Include/fct.inc.php");
require_once("../Include/class.pdogsb.inc.php"); 
session_start();
$pdo = PdoGsb::getPdoGsb();

$lesamis=$pdo->getAllAmisCompletion($_POST['rechercheAmis']);

$resultat = "";

foreach($lesamis as $amis)
{
	$resultat=$resultat.'/'.$amis['NUMAMIS'].'*'.$amis['NOMAMIS'].'*'.$amis['PRENOMAMIS']; // le tableau résultat contiendra les occurrences résultat de la requêtes séparées par un « / ».

}

echo $resultat; // le tableau résultat va être renvoyé en retour à la méthode $.ajax.
?>