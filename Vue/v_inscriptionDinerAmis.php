<div>
		<?php 
		$listediner=$pdo->getRepas();
		

		?>
		<h3>Inscription d'un ou de plusieurs amis aux diners</h3>
			<form method="POST" action="">
				<select size="2" name="datediner"></select>
					<option><?php echo ?></option>
                    

					<label>Liste des participants</label>
					<TEXTAREA name="lstparticipation"></TEXTAREA>
					<input type="number" name="nbplaces">

					<button name="Valider" type="submit" >Valider</button>
			</form>


		

		
		

		<table>
			<tr>
				
			</tr>
		</table>


</div>