<?php 
//include("vue/v_entete.php");
?>

<form action="index.php?uc=c_gererAmis&action=a_modification" method="post">
	<fieldset>
		<legend>Modifier un ami </legend>
		
		
		</br></br>
		Nom : <input type="text" name="nom" value="<?php echo $ami['NOMAMIS']; ?>" required />
		</br></br>
		Prenom : <input type="text" name="prenom" value="<?php echo $ami['PRENOMAMIS']; ?>" required />
		</br></br>
		adresse : <input type="texte" name="adresse" value="<?php echo $ami['ADRESSERUEAMIS']; ?>" required />
		</br></br>
		complement adresse : <input type="text" name="complementAdresse" value="<?php echo $ami['ADRESSECOMPLEMENTAMIS']; ?>" required />
		</br></br>
		ville : <input type="text" name="ville" value="<?php echo $ami['ADRESSEVILLEAMIS']; ?>" required />
		</br></br>
		code postal : <input type="text" name="codePostal" value="<?php echo $ami['CODEPOSTALAMIS']; ?>" required />
		</br></br>
		télephonne : <input type="text" name="telephone" value="<?php echo $ami['TELEPHONEAMIS']; ?>" required />
		</br></br>
		mail : <input type="text" name="mail" value="<?php echo $ami['MAILAMIS']; ?>" required />
		</br></br>
		n° parrain 1 : <input type="text" name="numparrain1" value="<?php echo $ami['NUMPARRAIN1']; ?>" required />
		</br></br>
		n° parrain 2 : <input type="text" name="numparrain2" value="<?php echo $ami['NUMPARRAIN2']; ?>" required />
		</br></br>
		login : <input type="text" name="login" value="<?php echo $ami['Login']; ?>" required />
		</br></br>
		mdp : <input type="text" name="mdp" value="<?php echo $ami['MDP']; ?>" required />
		</br></br>
		<input type="text" name="num" value="<?php echo $ami['NUMAMIS']; ?>" hidden  />
		</br></br>
		
		<input type="submit" name="modifierInfo" value="Modifier">
		
	</fieldset>
</form>