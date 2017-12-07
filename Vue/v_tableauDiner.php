<form>
	<table border=1>
		<tr>
			<td>date du diner</td>
			<td>Ajoutez un participant</td>
			<td>Consultation</td>
			<td>Modification</td>
			<td>Supression</td>
			<td>Edition</td>
		</tr>
		<tr>
			<td><?php echo $dateRepas['DATEREPAS'] ?></td>
			<form action='index.php?controleur=&action='><td><input type=submit name="AjoutPart" action="" value="Ajoutez un participant"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="Consultation" action="" value="Consultation"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="ModifDiner" action="" value="Modification"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="SuppDiner" action="" value="Supression"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="EditDiner" action="" value="Edition"></td></form>
		</tr>
	</table>
</form>