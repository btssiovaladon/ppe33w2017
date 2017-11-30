<?php
	include("../Include/class.pdogsb.inc.php");
	$liste=$pdo-> getRepas();
?>

<div id="suppression repas">
	<h1> Suppression d'un repas</h1>
		<select name="idDiner">
			<?php
				foreach ($liste as $unrepas) {
			?>
			<form method="POST" action="index.php?controleur=c_gererDiner&action=supprimerDiner">
				<option value="<?php echo $unrepas['NUMREPAS']; ?>"> <?php echo $unrepas['LIEUREPAS']." ".$unrepas['DATEREPAS']." ".$unrepas['HEUREREPAS']; ?></option>
				<input type="submit" name="BTN_suppr" value="supprimer"/>
			<?php
				}
			?>
		</select>
	</form>
</div>