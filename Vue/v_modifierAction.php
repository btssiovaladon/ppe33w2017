<?php 
//include("vue/v_entete.php"); aaaaaaaaa
?>


<form action="indexThomas.php?uc=c_action&action=modificationAction" method="POST">
	<fieldset>
		<legend>Modifier une action </legend>
		
		
		Liste commission : <select name="actionCommission" required>
			<?php
				foreach($lesCommi as $commi){
					if($commi['NUMEROCOMMISSION']==$action['NUMEROCOMMISSION']){
			?>
						<option value="<?php echo $commi['NUMEROCOMMISSION']; ?>" selected > <?php echo $commi['LIBELLECOMMISSION']; ?> </option>
						
			<?php
					}else{
			?>
						<option value="<?php echo $commi['NUMEROCOMMISSION']; ?>"> <?php echo $commi['LIBELLECOMMISSION']; ?> </option>
			<?php	}
				
				}
			?>
		</select>
		</br></br>
		Liste amis : <select name="actionAmis" required>
			<?php
				foreach($lesAmis as $ami){
					if($ami['NUMAMIS']==$action['NUMAMIS']){
			?>
						<option value="<?php echo $ami['NUMAMIS']; ?>" selected > <?php echo $ami['NOMAMIS']." ".$ami['PRENOMAMIS']; ?> </option>
						
			<?php
					}else{
			?>
						<option value="<?php echo $ami['NUMAMIS']; ?>"> <?php echo $ami['NOMAMIS']." ".$ami['PRENOMAMIS']; ?> </option>
			<?php	}
				
				}
			?>
		</select>
		</br></br>
		libellé action : <input type="text" name="libelleAction" value="<?php echo $action['LIBELLEACTION']; ?>" required />
		</br></br>
		Montant action : <input type="text" name="montantAction" value="<?php echo $action['MONTANTACTION']; ?>" required />
		</br></br>
		Date action : <input type="date" name="dateAction" value="<?php echo $action['DATEACTION']; ?>" required />
		</br></br>
		Durée action : <input type="text" name="dureeAction" value="<?php echo $action['DUREEACTION']; ?>" required />
		</br></br>
		<input type="submit" name="modifierInfo" value="Modifier">
	</fieldset>
</form>