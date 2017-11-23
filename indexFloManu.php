<!doctype html>
<html>
	<head>
	   <meta charset='utf-8'>
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="Style/styles.css">
	   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	   <script src="script.js"></script>
	   <title>Menu</title>
	</head>
	
	<body>
	<div id="entete">
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
	</div>
	<div id='cssmenu'>
	<ul>
	   <li><a href='#'><span>Accueil</span></a></li>
	   
	   <li class='active has-sub'><a href='#'><span>Gestion des AMIS</span></a>
		  <ul>
			 <li class='has-sub'><a href='#'><span>Créer d'un AMIS</span></a></li>
			 <li class='has-sub'><a href='controleur\c_gererAmis.php'><span>Modifier/Supprimer un AMIS</span></a></li>
		  </ul>
	   </li>
	   
	   <li class='active has-sub'><a href='#'><span>Gestion des actions</span></a>
		  <ul>
			 <li class='has-sub'><a href='#'><span>Saisir une action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Modifier une action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Supprimer une action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Inscrire un AMIS à une action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Editer la liste des participants par action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Consulter les membres de l'action</span></a></li>
			 <li class='has-sub'><a href='#'><span>Editer une étiquette</span></a></li>
		  </ul>
	   </li>
	   
	   <li class='active has-sub'><a href='#'><span>Gestion des dîners</span></a>
		  <ul>
			 <li class='has-sub'><a href='#'><span>Créer un dîner</span></a></li>
			 <li class='has-sub'><a href='#'><span>Modifier/Supprimer un dîner</span></a></li>
			 <li class='has-sub'><a href='#'><span>Inscription à un dîner</span></a></li>
			 <li class='has-sub'><a href='#'><span>Editer la liste des participants à un dîner</span></a></li>
			 <li class='has-sub'><a href='#'><span>Consulter les membres d'un dîner</span></a></li>
		  </ul>
	   </li>
	   
	   <li class='active has-sub'><a href='#'><span>Gestion du bureau et des commissions</span></a>
		  <ul>
			 <li class='has-sub'><a href='#'><span>Saisir un bureau</span></a></li>
			 <li class='has-sub'><a href='#'><span>Modifier un bureau</span></a></li>
			 <li class='has-sub'><a href='#'><span>Créer une commission</span></a></li>
			 <li class='has-sub'><a href='#'><span>Modifier/Supprimer une commission</span></a></li>
			 <li class='has-sub'><a href='#'><span>Saisir le bureau de commission</span></a></li>
			 <li class='has-sub'><a href='#'><span>Inscrire un AMIS à une commission</span></a></li>
			 <li class='has-sub'><a href='#'><span>Consulter les membres d'une commission</span></a></li>
		  </ul>
	   </li>
	   
	</ul>
	</div>

	</body>
<html>
