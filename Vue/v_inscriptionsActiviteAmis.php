<div>
	<h2>Affecter des AMIS aux activités </h2>
	<p>
		<h4>Activité <?php  echo $nomActivite['nom'];?></h4>
	</p>
	<form id="formulaire" action="#" method="POST">
		<p>
			<!--<label class="labelinput" for="rech">Ajouter :</label>
			<input type="text" name="rech" id="rech" class="ui-autocomplete" />-->
			Liste des amis :
			<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);"></td>

			<select id="listeAmis" size="18">
	
			</select>
			<input type="submit" name="go" id="go" class="bouton" value="Ajouter à la liste"/>
		</p>
	</form>
	<form id="formulaire2" action="#" method="POST">
		<!--tableau des Personnes-->
		<table class="listePersonne" name="listePersonne" id="listePersonne">
		<caption>Personnes choisies </caption>
		<tr>
			<td>aaa</td>
			<td>rrr</td>
			<td bgcolor="#FF0000" onclick="supprimerLigne(this.parentNode.rowIndex);">X</td>
		</tr>
		<tr>
			<td>aaab</td>
			<td>rrr</td>
			<td bgcolor="#FF0000" onclick="supprimerLigne(this.parentNode.rowIndex);">X</td>
		</tr>
		</table>
		<input id="ok" type="submit" value="Valider Personnes" size="20"  />
	</form>
</div>
<table>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Rôle</th>
	<tr>
		<td><?php echo $leChef['nom'];?></td>
		<td><?php echo $leChef['prenom']; ?></td> 
		<td>Chef</td>
	</tr>
<?php 
	
	for($i=0;$i<count($lesAmis);$i++){
?>
		<tr>
			<td><?php echo $lesAmis[$i]['nom'];?></td>
			<td><?php echo $lesAmis[$i]['prenom']; ?></td> 
			<td>Participant</td>
		</tr>
<?php 
	}
?>
</table>

<?php 

?>
<script>
var arrayLignes = document.getElementById("listePersonne").rows; //l'array est stocké dans une variable
var longueur = arrayLignes.length;//on peut donc appliquer la propriété length
var i=0; //on définit un incrémenteur qui représentera la clé
//alert(longueur);
while(i<longueur)
{
	if(i % 2 == 0)//si la clé est paire
	{
		arrayLignes[i].style.backgroundColor = "#bdcbf5";
	}
	else //elle est impaire
	{
		arrayLignes[i].style.backgroundColor = "#829eeb";
	}
	i++;
}
	function supprimerLigne(num)
{
	document.getElementById("listePersonne").deleteRow(num);
}
function GetLigne(){
	var arrayLignes = document.getElementById("listePersonne").rows; //l'array est stocké dans une variable
	var longueur = arrayLignes.length;//on peut donc appliquer la propriété length
	return longueur;
}
</script>
<script>
	var litseamis = <?php echo json_encode($listeamis['nom']); ?>;
	$("#rech").autocomplete({
		source : listeamis,
		autofocus:true
	});
	$(document).ready(function(){ 
        $("#tableauamis").tablesorter(); 
    }); 
	
function ajouterLigne()
{
	var tableau = document.getElementById("listePersonne");

	var ligne = tableau.insertRow(-1);//on a ajouté une ligne

	var colonne1 = ligne.insertCell(0);//on a une ajouté une cellule
	colonne1.innerHTML += document.getElementById("nom").value;//on y met le contenu de titre

	var colonne2 = ligne.insertCell(1);//on ajoute la seconde cellule
	colonne2.innerHTML += document.getElementById("prenom").value;
}
</script>