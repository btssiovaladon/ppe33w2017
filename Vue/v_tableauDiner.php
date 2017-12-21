<?php

 ?>
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
<<<<<<< HEAD
			<td><?php echo $dateRepas['DATEREPAS']; ?></td>
			<form action='index.php?controleur=&action='><td><input type=submit name="AjoutPart" action="" value="Ajoutez un participant"></td></form>
=======
			<td><?php echo $dateRepas['DATEREPAS'] ?></td>
			<form action='index.php?uc=c_gererDiner&action=inscription'><td><input type=submit name="AjoutPart" action="" value="Ajoutez un participant"></td></form>
>>>>>>> a5a9491489faf1a999ef939353fbfdaa3cc06085
			<form action='index.php?controleur=&action='><td><input type=submit name="Consultation" action="" value="Consultation"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="ModifDiner" action="" value="Modification"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="SuppDiner" action="" value="Supression"></td></form>
			<form action='index.php?controleur=&action='><td><input type=submit name="EditDiner" action="" value="Edition"></td></form>
		</tr>
	</table>
</form>