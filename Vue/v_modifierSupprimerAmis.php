<?php 
//include("vue/v_entete.php");
?>


	<fieldset>
		<legend>Modifier un ami </legend>
		
		

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
		Nom : <input type="text" name="libelleAction" value="<?php echo $ami['NOMAMIS']; ?>" required />
		</br></br>
		Prenom : <input type="text" name="montantAction" value="<?php echo $ami['PRENOMAMIS']; ?>" required />
		</br></br>
		adresse : <input type="texte" name="dateAction" value="<?php echo $ami['ADRESSERUEAMIS']; ?>" required />
		</br></br>
		complement adresse : <input type="text" name="dureeAction" value="<?php echo $ami['ADRESSECOMPLEMENTAMIS']; ?>" required />
		</br></br>
		ville : <input type="text" name="dureeAction" value="<?php echo $ami['ADRESSEVILLEAMIS']; ?>" required />
		</br></br>
		code postal : <input type="text" name="dureeAction" value="<?php echo $ami['CODEPOSTALAMIS']; ?>" required />
		</br></br>
		télephonne : <input type="text" name="dureeAction" value="<?php echo $ami['TELEPHONEAMIS']; ?>" required />
		</br></br>
		mail : <input type="text" name="dureeAction" value="<?php echo $ami['MAILAMIS']; ?>" required />
		</br></br>
		n° parrain 1 : <input type="text" name="dureeAction" value="<?php echo $ami['NUMPARRAIN1']; ?>" required />
		</br></br>
		n° parrain 2 : <input type="text" name="dureeAction" value="<?php echo $ami['NUMPARRAIN2']; ?>" required />
		</br></br>
		login : <input type="text" name="dureeAction" value="<?php echo $ami['Login']; ?>" required />
		</br></br>
		mdp : <input type="text" name="dureeAction" value="<?php echo $ami['MDP']; ?>" required />
		</br></br>
		<input type="submit" name="modifierInfo" value="Modifier">
	</fieldset>
