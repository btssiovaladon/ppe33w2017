<?php
$req=mysql_query("select * from amis where NOMAMIS like '".$_POST['NOMAMIS']."%'"."ORDER by NOMAMIS, PRENOMAMIS"); // requête sélectionnant les 
//personnes dont le nom commence par les caractères envoyés par l’intermédiaire de la méthode $.ajax
$amis=mysql_fetch_assoc($req);
if ($amis){
$resultat=$amis['NUMAMIS'].'*'.$amis['NOMAMIS'].'*'.$amis['PRENOMAMIS']; // le tableau résultat contient la concaténation du code de la personne, de son nom et de son prénom séparés par des « * ».
$amis=mysql_fetch_assoc($req);
}
else
{
$resultat='';
}
while($amis)
{
$resultat=$resultat.'/'.$amis['NUMAMIS'].'*'.$amis['NOMAMIS'].'*'.$amis['PRENOMAMIS']; // le tableau résultat contiendra les occurrences résultat de la requêtes séparées par un « / ».
$amis=mysql_fetch_assoc($req);
}
//mysql_close(
echo $resultat; // le tableau résultat va être renvoyé en retour à la méthode $.ajax.
?>