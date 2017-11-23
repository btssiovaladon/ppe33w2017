<p>
<form action="">
<select id="repas">
<?php foreach ( $lesRepas as $leDiner){
	$diner=$leDiner['NUMREPAS'];
	echo "<option value='$diner'>a ".$leDiner['LIEUREPAS']." le ".$leDiner['DATEREPAS']."</option>";
	
}
	?>
</select>

<table border=1>
<tr>
<td>Ajoutez un participant</td>
<td>Consultation</td>
<td>Modification</td>
<td>Supression</td>
<td>Edition</td>
</tr>
<tr>
<td><input type=submit name="AjoutPart" action="" value="Ajoutez un participant"></td>
<td><input type=submit name="Consultation" action="" value="Consultation"></td>
<td><input type=submit name="ModifDiner" action="" value="Modification"></td>
<td><input type=submit name="SuppDiner" action="" value="Supression"></td>
<td><input type=submit name="EditDiner" action="" value="Edition"></td>
</tr>
</table>
</form>