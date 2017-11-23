<?php
	include("../Include/class.pdogsb.inc.php");
	$liste=$pdo-> getRepas();
?>

<div id="suppression repas">
	<h1> Suppression d'un repas</h1>
	<form method="POST" action="index.php?controleur=c_gererDiner&action=supprimerDiner">
		<select name="idDiner">
			<?php
				foreach ($liste as $unrepas) {
			?>
			<option value="<?php echo $unrepas['NUMREPAS']; ?>"> <?php echo $unrepas['LIEUREPAS']." ".$unrepas['DATEREPAS']." ".$unrepas['HEUREREPAS']; ?> </option>
			<?php
				}
			?>
		</select>
	</form>
</div>