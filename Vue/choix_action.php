<<<<<<< HEAD
<form method="POST" action="indexThomas.php?uc=action&action=choixMenu">
=======
<form method="post" action="indexThomas.php?uc=action&action=choixMenu">
>>>>>>> 6e0276d6b95d256cc30ac24cfc0bc2a008d292ee
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
<<<<<<< HEAD
		<td> <?php $action['LIBELLEACTION'] ?> </td>
=======
		<td> <?php $action['libelleAction'] ?> </td>
>>>>>>> 6e0276d6b95d256cc30ac24cfc0bc2a008d292ee
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