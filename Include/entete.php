<table>
			<tr>
				<td id="left">
					<img src="./Image/logo"/>
				</td>
				<td id="center">
					<h1>Club des AMIS</h1>
				</td>
				<td id="right">
					<div id="connect">
						<?php 
							if(isset($_SESSION['login'])){ //Si un utilisateur est connecté.
						?>
								<div id="formulaireConnexion">
									<h4> Bienvenue <?php echo $_SESSION['login'];?></h4>
									<a href="pages\deconnection.php">Se déconnecter</a>
								</div>
						<?php
							}else{
						?>
								<div id="formulaireConnexion">
									<h3>Connexion : </h3>
									<form method="POST" action="" >
										<table id="connexion">
											<tr>
											   <td><label for="login"><strong>Nom de compte</strong></label></td>
											   <td><input type="text" name="txtLogin" id="login"/></td>             
											</tr>  
										
											<tr>
											   <td><label for="pass"><strong>Mot de passe</strong></label></td>
											   <td><input type="password" name="txtPass" id="pass"/></td>
											</tr>
										</table>
										<input class="btn_connexion" type="submit" name="connexion" value="Se connecter"/>
									</form>
								</div>
						<?php
							}
						?>
					
					</div>
				</td>
			</tr>
		</table>