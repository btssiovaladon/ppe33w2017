<?php
echo"
<h3>Ajouter un dîner</h3>
<form method='POST' action='index.php?uc=c_gererDiner&action=validerCreationDiner'>
<table class='tabNonQuadrille'>
<tr>
	<td>Date du dîner (jj/mois/aaaa)</td>
	<td>
		<input  type='date' name=dateDiner  size='30' maxlength='45'>
	</td>
</tr>
<tr>
	<td>Heure du dîner</td>
	<td>
		<input  type='text' name=heureDiner  size='50' maxlength='100'>
	</td>
</tr>
<tr>
	<td>Prix dîner</td>
	<td>
		<input  type='text' name=prixDiner  size='30' maxlength='45'>
	</td>
</tr>
<tr>
	<td>Nombre de place</td>
	<td><input type='number' name='nbplaceDiner' value=''>
	</td>
</tr>

<tr>
	<td>Lieu dîner</td>
	<td><input type='text' name='lieuDiner' value=''>
	</td>
</tr>

</table>
<input type='submit' value='Valider' name='valider'>
         <input type='reset' value='Annuler' name='annuler'>

</form>
";
?>