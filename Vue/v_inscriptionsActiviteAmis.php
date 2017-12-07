<?php
	$listeamis = $pdo -> getAllAmis();
	$listeactivite = $pdo -> getAllActivite();
	
?>
<div>
	<h2>Affecter des AMIS aux activités </h2>
	<p>
		<h4>Activité <?php  echo $nomActivite['nom'];?></h4>
	</p>
	<form id="formulaire" action="#" method="GET">
		<p>
			<label class="labelinput" for="rech">Rechercher :</label>
			<input type="text" name="rech" id="rech" class="ui-autocomplete" />
			<input type="submit" name="go" id="go" class="bouton" value="Go !"/>
		</p>
	</form>
</div>
<table>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Rôle</th>
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
	<tr>
		<td><?php echo $leChef['nom'];?></td>
		<td><?php echo $leChef['prenom']; ?></td> 
		<td>Chef</td>
	</tr>
</table>
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