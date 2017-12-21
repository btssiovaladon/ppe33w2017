	<div>
		<h3>Inscription d'un ou de plusieurs amis aux diners</h3>
				<form method="POST" action="" >
					<select  name="cmbdiner" onchange="submit()">
						<?php
						foreach ($listediner as $undiner){
						
							$selected="";
							if ($cmbdiner==$repas[0]) {
									$selected="selected";
							}//selected garde la valeur selectionner//
						?>

							<option value="">Choisir un repas</option>
						<option <?php echo $selected; ?> value="<?php echo $undiner[0];?>"><?php echo dateAnglaisVersFrancais($undiner[2]). " ". $undiner[5];?></option>
							<?php
						}
						?>
					</select>
					
				</form>

			<?php 
			$listediner=$pdo->getRepas();

			$repas=array();

			$cmbdiner="";

			$cmbamis="";


			if (isset($_POST['cmbdiner'])) {
				$repas=$pdo->getRepasById($_POST['cmbdiner']);


				
				$cmbdiner=$_POST['cmbdiner'];
				?>
				<table  border="3">
							<tr>
								<td >DATEREPAS</td>
								<td>HEUREREPAS</td>
								<td >LIEUREPAS</td>
								<td >PRIXREPAS</td>	
								<td>NombreRepas</td>
							</tr>
							<tr>
								<td ><?php echo $repas[2];?></td>
								<td><?php echo $repas[1];?></td>
								<td ><?php echo $repas[5];?></td>
								<td ><?php echo $repas[3];?></td>	
								<td><?php echo $repas[4];?></td>
							</tr>
							
						</table>
						
				 <table border="3">
							<tr>
								<td >NomAmis</td>
								<td>PrenomAmis</td>
								
							</tr>
							<?php
						
						$listeparticipant =$pdo->getParticipantRepas($cmbdiner);
						 foreach ($listeparticipant as $unparticipant) {

			


			?>
							<tr>

								<td ><?php echo $unparticipant[2];?></td>
								<td><?php echo $unparticipant[3];?></td>
								
							</tr>
							
						
				<?php 
			}?>
		</table>
		<?php
	}	

				 ?>


			


				<?php /*
	                
	            Liste des amis :
	<input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);">s

	<select id="listeAmis" size="18"></select>
						
	*/?>

						<button name="Valider" type="submit" >Valider</button>
				
	</div>


