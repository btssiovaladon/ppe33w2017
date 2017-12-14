<form method="post" action="index.php?uc=c_action&action=choix">
<table>
	
	<tr>
	   <td>Nom activité</td>
	   <td>Ajouter un participant</td>
	   <td>Consulter</td>
	   <td>Modifier l'activité</td>
	   <td>Supprimer l'activité</td>
	   <td>Imprimer</td>
	   <td>Imprimer étiquettes</td>
	</tr>

	<tr>
		<td>
		<select name="idAction" type="text">
			<?php
			foreach ($actions as $action){
				$numaction =$action['numero'];
				$nomaction = $action['nom'];
			?>
			<option selected value="<?php echo $numaction ?>"><?php echo $nomaction ?></option>
			<?php } ?>
			</select> 
		</td>
		<td> <input type="submit" value="ajouter" name="ajouter"> </input> </td>
		<td> <input type="submit" value="consulter" name="consulter"> </input> </td>
		<td> <input  type="submit" value="modifier" name="modifier"> </input></td>
		<td> <input type="submit" value="supprimer" name="supprimer" onclick="if(!confirm('Etes vous sur de vouloir supprimer ?')) return false;"> </input> </td>
		<td> <input type="submit" value="imprimer" name="imprimer"> </input> </td>
		<td> <input type="submit" value="imprimer" name="imprimer2"> </input> </td>
	</tr>

</table>
</form>