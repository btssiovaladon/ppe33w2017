<div id="connexion">
	<div id="formulaireConnexion">
		<h3>Connexion : </h3>
		<form method="POST" action="indexKillian.php?uc=connexion&action=valideConnexion" >
			<table id="connexion">
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