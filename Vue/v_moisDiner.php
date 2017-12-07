<p>
<form action="index.php?controleur=c_gererDiner&action=tableaudiner" METHOD="POST">
<select name="repas">
<?php foreach ( $lesRepas as $leDiner){
	$diner=$leDiner['NUMREPAS'];
	$datediner=$leDiner['DATEREPAS'];
	echo "<option value=$diner>a ".$leDiner['LIEUREPAS']." le ".$datediner."</option>";
	
}
	?>
</select>
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
      </p> 
</form>