<html>
	<head>
		<meta charset="utf-8"/>
	</head>
		<body>
		<div id="corps">
			<div id="corps2">
				<img src="" width="12%" margin-left="50px"/>
			</div>
			<div id="titre">
				<h1>Le club des Amis</h1>
			</div>
			</div>
		</body>
</html>
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