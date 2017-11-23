<!--<h3>Ajouter un nouvel AMIS :</h3>
<form method='POST' action='indexMission1.php?uc=c_gererAmis&action=validerCreationAmis'>
<table class='tabNonQuadrille'>
<tr>

</tr>

</table>
<input type='submit' value='Valider' name='valider'>
         <input type='reset' value='Annuler' name='annuler'>

</form>-->
Liste des amis :
<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="javascript:envoiAmisajax(this.value)"></td>

<select id="listeAmis" size="18"></select> 


<script>
function envoiAmisajax(nom)
{
var requete= $.ajax({ // ajax :la variable requete envoie un objet XMLHttpRequest.
url: "getamis.php", // url de la page à charger
type:"POST",
data:"rechercheAmis=" + escape(nom)
success:function(){ 

var selectAmis=document.getElementById("listeAmis"); //initialisation de la liste déroulante
 
if(requete.responseText=='') //normalement, requete.responseText contient le résultat renvoyé par l’URL, c’est à dire la liste des personnes séparées par
//des“/” et à l’intérieur de chaque ligne, les champs séparées par des “*”.
{
selectAmis.length=0; //document.getElementById("prix").innerHTML='';
}
else
{
var amis,i,nb,pers;
amis=requete.responseText.split('/'); // personne est un
//tableau contenant toutes les lignes renvoyées par la requête. La fonction split() permet de
//scinder une chaîne de caractères et de retourner les résultats dans un tableau

nb=amis.length; // nb contient le nombre de lignes du tableau
selectAmis.length=nb; // ce sera donc le nombre d’éléments présents dans la liste.

for (i=0; i<nb; i++) //boucle pour afficher tous les elements dans la liste
{
pers=personne[i].split('*'); //On sépare le code, le nom et le prénom
selectAmis.options[i].value=pers[0];//le code personne devient la valeur de la liste
selectAmis.options[i].text=pers[1]+ " " +pers[2];// le texte de la liste est composé de la concatenation du nom et du prénom
}
selectAmis.options[0].selected='selected';
}
},
error:function(){ //dans le cas d’échec, envoyer un message.
alert("perdu");
}
});
return;
}
</script>