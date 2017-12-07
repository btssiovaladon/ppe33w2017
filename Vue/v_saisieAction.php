
<?php
$numami = $pdo->getAllAmis();
$numcommi = $pdo->getAllCommission();
?>


<form method='POST' action="index.php?uc=action&action=ajouterAct">
	Numéro amis 
	<SELECT name="num_ami" size="1">
		<?php
		foreach($numami as $numeroami){
		?>
		<OPTION value="<? echo $numeroami['NUMAMIS'] ?>" >
			<?php 
			echo $numeroami['NUMAMIS']." ".$numeroami['NOMAMIS']." ".$numeroami['PRENOMAMIS'];
			?>
		</OPTION>
		<?php
		}
		?>
	</SELECT>
	</br>
	Numéro Commission 
	<SELECT name="num_commi" size="1">
	
		<OPTION value="NULL">Aucune</OPTION>
		
		<?php
		foreach($numcommi as $numerocommi){
		?>
		
		<OPTION value="<?php echo $numerocommi['NUMEROCOMMISSION']; ?>">
			<?php
			echo $numerocommi['NUMEROCOMMISSION']." ".$numerocommi['LIBELLECOMMISSION'];
			?>
		</OPTION>
		<?php
		}
		?>
	</SELECT>
	</br>
	Libellé de l'action <input type="text"    name="libelle_act" required/> </br>
	Montant de l'action <input type="text"    name="montant_act" required/> </br>
	Date de l'action <input type="date"       name="date_act" required> </br>
	Durée de l'action <input type="text"      name="duree_act" required/> (en jour) </br>
	
	<input type="submit" value="Ajouter"/>
	
</form>