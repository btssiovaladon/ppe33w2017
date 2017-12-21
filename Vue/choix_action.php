<form method="post" action="indexThomas.php?uc=action&action=choixMenu">
<table>
	<th>Nom activité</th>
	<th>Ajouter un participant</th>
	<th>Consulter</th>
	<th>Modifier l'activité</th>
	<th>Supprimer l'activité</th>
	<th>Imprimer</th>
	<th>Imprimer etiquette</th>
	<?php
	foreach($actions as $action){
	?>
	<tr>
		<td> <?php $action['libelleAction'] ?> </td>
		<td> <input type="submit" value="ajouter" name="ajouter"> </input> </td>
		<td> <input type="submit" value="consulter" name="consulter"> </input> </td>
		<td> <input type="submit" value="modifier" name="modifier"> </input> </td>
		<td> <input type="submit" value="supprimer" name="supprimer"> </input> </td>
		<td> <input type="submit" value="imprimer" name="imprimer"> </input> </td>
		<td> <input type="submit" value="imprimer" name="imprimer2"> </input> </td>
	</tr>
	<?php } ?>
	
</table>
</form>