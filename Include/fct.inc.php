﻿<?php
/** 
 * Fonctions pour l'application GSB
 
 * @package default
 * @author JP Chateau
 * @version    1.0
 */
 /**
 * Teste si un quelconque amis est connecté
 * @return vrai ou faux 
 */
function estConnecte(){
  return isset($_SESSION['idAmis']);
}
/**
 * Enregistre dans une variable session les infos d'un visiteur
 
 * @param $id 
 * @param $nom
 * @param $prenom
 / @param $type
 */
function connecter($id,$nom,$prenom,$type){
//A compléter
	
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
}
?>