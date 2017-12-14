<form action="index.php?uc=c_gererAmisModif&action=selectionnerAmis" method="post">

<label for="lstAmis" accesskey="n">Amis à selectionner : </label>
<select id="lstAmis" name="lstAmis" onchange="submit()">
		<option selected value="">  Choisir </option>
	<?php
	foreach($lesAmis as $Amis){
		
		?>
		<option value="<?php echo $Amis['NUMAMIS'];?>"><?php echo $Amis['NOMAMIS'];?></option>
		<?php
	}
		?>
</select>
</form>	