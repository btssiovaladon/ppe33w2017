<?php 
//include("vue/v_entete.php");
?>


<form action="indexThomas.php?uc=c_action&action=modificationAction" method="POST">
	<fieldset>
		<legend>Modifier une action </legend>
		
		
		<select name="actionCommission" required>
			<?php
				
			?>
		</select>
		</br></br>
		<select name="actionAmis" required>
			<?php
			
			?>
		</select>
		</br></br>
		libellé action : <input type="text" name="libelleAction" required />
		</br></br>
		Montant action : <input type="text" name="montantAction" required />
		</br></br>
		Date action : <input type="date" name="dateAction" required />
		</br></br>
		Durée action : <input type="text" name="dureeAction" required />
		</br></br>
		<input type="submit" name="modifierInfo" value="Modifier">
	</fieldset>
</form>