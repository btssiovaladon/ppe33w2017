// <?php
	// $listeamis = $pdo -> getAllAmis()
	// $listeactivite = $pdo -> getAllActivite()
	// $listeeineamis = array();
	
// ?>
<div>
	<h2>Affecter des AMIS aux activités </h2>
	<p>
		<h4>Activité <?php // echo $listeactivite['']; ?></h4>
	</p>
	<form id="formulaire" action="#" method="GET">
		<p>
			<label class="labelinput" for="rech">Rechercher :</label>
			<input type="text" name="rech" id="rech" class="ui-autocomplete" />
			<input type="submit" name="go" id="go" class="bouton" value="Go !"/>
		</p>
	</form>
</div>

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