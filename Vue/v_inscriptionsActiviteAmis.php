<div>
	<h2>Affecter des AMIS aux activités </h2>
	<p>
		<h4>Activité <?php  echo $nomActivite['nom'];?></h4>
	</p>
	<form id="formulaire" action="#" method="GET">
		<p>
			<label class="labelinput" for="rech">Ajouter :</label>
			<input type="text" name="rech" id="rech" class="ui-autocomplete" />
			<input type="submit" name="go" id="go" class="bouton" value="Ajouter à la liste"/>
		</p>
	</form>
	<!--tableau des Personnes-->
	<table class="listePersonne">
	<caption>Personnes choisies </caption>
	<tr>
		<td></td>
		<td></td>
		<?php echo "<td><a href='index.php?uc=validerFrais&action=validerFrais'>X</a></td>";?>
	</tr>
	</table>
	<input id="ok" type="submit" value="Valider Personnes" size="20" disabled="true" />
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


<script>
	var litseamis = <?php echo json_encode($listeamis['nom']); ?>;
	$("#rech").autocomplete({
		source : listeamis,
		autofocus:true
	});
	$(document).ready(function(){ 
        $("#tableauamis").tablesorter(); 
    }); 
</script>