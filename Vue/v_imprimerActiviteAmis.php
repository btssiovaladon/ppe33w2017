<h1>Activité <?php echo $nomActivite['nom'];?></h1>
<h2>Liste des participants à cette activité</h2>
<table>
	<th>Nom</th>
	<th>Prénom</th>
	<th>Rôle</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>Telephone</th>
	<th>Adresse mail</th>
	<tr>
		<td><?php echo $leChef['nom'];?></td>
		<td><?php echo $leChef['prenom']; ?></td> 
		<td>Chef</td>
		<td><?php echo $leChef['adresse'];?></td>
		<td><?php echo $leChef['codePostal']; ?></td> 
		<td><?php echo $leChef['ville']; ?></td>
		<td><?php echo $leChef['telephone'];?></td>
		<td><?php echo $leChef['mail']; ?></td>
	</tr>
<?php 
	for($i=0;$i<count($lesAmis);$i++){
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
<<<<<<< HEAD
</table>
=======
	<tr>
		<td><?php echo $leChef['nom'];?></td>
		<td><?php echo $leChef['prenom']; ?></td> 
		<td>Chef</td>
		<td><?php echo $leChef['adresse'];?></td>
		<td><?php echo $leChef['codePostal']; ?></td> 
		<td><?php echo $leChef['ville']; ?></td>
		<td><?php echo $leChef['telephone'];?></td>
		<td><?php echo $leChef['mail']; ?></td>
	</tr>
</table>

<h2>Imprimer cette page</h2>
<h4><?php echo "<a href=\"index.php?uc=c_action&action=a_imprActivitePDF\" target=\"_blank\" title=\"Imprimer en PDF\"><img src=\"./Image/pdf.png\" alt=\"Pdf\" height=\"60\" width=\"60\"/></a>"?></h4>
>>>>>>> feb2ed75b0f38df947bdfda83388129b02d21e95
