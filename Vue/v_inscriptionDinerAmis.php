<div>
		<?php 
		$listediner=$pdo->getRepas();
		

		?>
		<h3>Inscription d'un ou de plusieurs amis aux diners</h3>
			<form method="POST" action="" id="formdate">
				<select size="2" name="datediner">
					<?php
					foreach ($date as $value) {
					
					?>
				
					<option selected="selected" value="<?php echo $values[0];?>"><?php echo dateAnglaisVersFrancais($values[0]);?></option>
						<?php
					}
					?>
					<table id="dateTable">
						<tr>
							<td>DATEREPAS</td>
							<td>HEUREREPAS</td>
							<td>LIEUREPAS</td>
							<td>PRIXREPAS</td>
							<td>NUMREPAS</td>
							
						</tr>
						<?php

						?>
						
					</table>
                </select>
                		<TEXTAREA ></TEXTAREA>

					<label>Liste des participants</label>
					<TEXTAREA name="lstparticipation"></TEXTAREA>

					<input type="number" name="nbplaces">

					<button name="Valider" type="submit" >Valider</button>
			</form>
</div>
<script type="text/javascript"></script>
<?php
include("vue/v_pied.php");
?>

<script type="text/javascript">
	$("select").change()function(){
		var date =new Date($(this).val()).toLocaleDateString('en-FR');
		var heure=new Heure($(this).val()).
		var str='<tr><td>'+date+'</td><td>'+heure+'</td>
	}



</script>