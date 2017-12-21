<h1> Saisie d'un bureau </h1>


<form method="post" action="indexKillian.php?uc=c_bureau&action=enregistrerBureau">
	<h2> Secrétaire </h2>
	<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);"></td>
	<select id="listeAmis" size="18">
	</select>

	<input type="hidden" name="secretaire" value="secretaire" />


	<h2> Secrétaire-adjoint </h2>
	<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);"></td>
	<select id="listeAmis" size="18">
	</select>

	<input type="hidden" name="secretaire" value="secretaire" />

	<h2> Trésorier </h2>
	<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);"></td>
	<select id="listeAmis" size="18">
	</select>

	<input type="hidden" name="secretaire" value="secretaire" />

	<h2> Trésorier-adjoint </h2>
	<td align="left"><input type="text" id ="rechercheAmis" name="rechercheAmis" onkeyup="envoiAmisajax(this.value);"></td>
	<select id="listeAmis" size="18">
	</select>

	<input type="hidden" name="secretaire" value="secretaire" />
	
	<input type="submit" value="Valider" onclick="if(!confirm('Enregistrer ce bureau ?')) return false;"/>
</form>

