<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="Style/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Club des AMIS</title>
</head>
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
								<div id="formulaireConnexion">
									<h3>Connexion : </h3>
									<form method="POST" action="" >
										<table id="connexion">
										<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
											<tr>
											   <td><label for="login"><strong>Nom de compte</strong></label></td>
											   <td><input type="text" name="login" id="login"/></td>             
											</tr>  
										
											<tr>
											   <td><label for="mdp"><strong>Mot de passe</strong></label></td>
											   <td><input type="password" name="mdp" id="mdp"/></td>
											</tr>
										</table>
										<input class="btn_connexion" type="submit" name="connexion" value="Se connecter"/>
									</form>
								</div>
					</div>
				</td>
			</tr>
		</table>
		<?php
		include("Vue/v_menu.php") ;
		?>