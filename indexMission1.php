<?php
require_once("Include/fct.inc.php");
require_once("Include/class.pdogsb.inc.php"); 
session_start();
$pdo = PdoGsb::getPdoGsb();

include ("Vue/v_entete.php");
include ('controleur/c_modeleCompletion.php');
?>