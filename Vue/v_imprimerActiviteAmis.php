<table>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Rôle</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>Telephone</th>
	<th>Adresse mail</th>
<?php 
	for($i=0;$i<count($lesAmis+1);$i++){
?>
		<tr>
			<td><?php echo $lesAmis[$i]['nom'];?></td>
			<td><?php echo $lesAmis[$i]['prenom']; ?></td> 
			<td>Participant</td>
			<td><?php echo $lesAmis[$i]['adresse'];?></td>
			<td><?php echo $lesAmis[$i]['codePostal']; ?></td> 
			<td><?php echo $lesAmis[$i]['ville']; ?></td>
			<td><?php echo $lesAmis[$i]['telephone'];?></td>
			<td><?php echo $lesAmis[$i]['mail']; ?></td>
		</tr>
<?php 
	}
?>
	<tr>
		<td><?php echo $leChef[0]['nom'];?></td>
		<td><?php echo $leChef[0]['prenom']; ?></td> 
		<td>Chef</td>
		<td><?php echo $leChef[0]['adresse'];?></td>
		<td><?php echo $leChef[0]['codePostal']; ?></td> 
		<td><?php echo $leChef[0]['ville']; ?></td>
		<td><?php echo $leChef[0]['telephone'];?></td>
		<td><?php echo $leChef[0]['mail']; ?></td>
	</tr>
</table>