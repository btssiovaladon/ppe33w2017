<?php ?>
<html>
		<form action="" method="POST">
			<fieldset>
					choix commision <select name="choix_commision">
						<?php  foreach ($tab as $tab) { ?>
							<option> <?php echo $tab[$i] ?> </option>
						<?php } ?>

						</select>	
					<input type="submit" value="valider" name="envoyer"/>
			</fieldset>
		</form>
		

		</br>
		</br>
		</br>

		<?php
			if (isset($_POST["envoyer"])){
		?>
		<fieldset>

			<form>
				choix fonction <select name="choix_fonction">
					<?php ?>
					<option> président </option>
					<option> secretaire </option>
					<option> coordinateur </option>
				</select>

				choix amis <select name="choix_personne">
					<?php ?>
					<option> liste autocomplétion </option>
				</select>					
			</form>
		</fieldset>	
		<?php
		}
		?>

		

</html>

