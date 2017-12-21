<?php
$dateDiner=$_POST['Consultation2'];
$idDiner=$_POST['Consultation3'];
?>
<h3>Consultation repas du : <?php echo $dateDiner;?></h3>

<table border=1px>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Nombre d'invités</th>
		<th>Supprimer du dîner</th>
	</tr>
<?php
	foreach ($lesParticipants as $leParticipant){
		$idPart=$leParticipant['NUMAMIS'];
?>
		<tr>
			<td><?php echo $leParticipant['NOMAMIS'];?></td>
			<td><?php echo $leParticipant['PRENOMAMIS'];?></td>
			<td><?php echo $leParticipant['NOMBREPERSONNES'];?></td>
			<td><?php echo "<a href='index.php?uc=c_gererDiner&action=supprimerParticipant&id=$idPart&idRepas=$idDiner'>X</a>";?></td>
		</tr>
	<?php	
	} 
	?>
</table>

