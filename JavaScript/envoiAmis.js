

var searchElementKU = document.getElementById('rechercheAmis');
searchElementKU.addEventListener('keyup', onKeyUpRechercheAmi);

function onKeyUpRechercheAmi(e){

	if (e.keyCode == 38 | e.keyCode == 40) return;
	
	var searchElementKU = document.getElementById('rechercheAmis');
	envoiAmisajax(searchElementKU);
}

function envoiAmisajax(nom)
{

	
	var requete= $.ajax({ // ajax :la variable requete envoie un objet XMLHttpRequest.
		url: "Controleur/c_getamis.php", // url de la page à charger
		type:"POST",
		data:"rechercheAmis=" + escape(nom),
		success:function(){ 

			var selectAmis=document.getElementById("results"), //initialisation de la liste déroulante
				searchElement = document.getElementById('rechercheAmis'),
				selectIdAmis = document.getElementById('rechercheAmisH'),
				selectedResult = -1, // Permet de savoir quel résultat est sélectionné : -1 signifie "aucune sélection"
				previousRequest, // On stocke notre précédente requête dans cette variable
				previousValue = searchElement.value; // On fait de même avec la précédente valeur
			 
			
			//alert(requete.reponseText.);
			selectAmis.style.display = requete.responseText.length ? 'block' : 'none'; // On cache le conteneur si on n'a pas de résultats
			
			if (requete.responseText.length == 1){
				selectAmis.style.display = 'none';
			}else{
			if (requete.responseText.length) { // On ne modifie les résultats que si on en a obtenu
	
				requete.responseText = requete.responseText.split('/');
				var responseLen = requete.responseText.length;
	
				selectAmis.innerHTML = ''; // On vide les résultats
	
				for (var i = 0, div ; i < responseLen ; i++) {
					if (searchElement.value == ""){
						selectAmis.innerHTML = '';
					}
					else{
						div = selectAmis.appendChild(document.createElement('div'));
						div.innerHTML = requete.responseText[i];
	
						div.addEventListener('click', function(e) {
							chooseResult(e.target);
						});
					}
	
				}
	
			}
			}
			
			function chooseResult(result) { // Choisi un des résultats d'une requête et gère tout ce qui y est attaché
				var searchElementH = "";
				var searchElementR = "";
				var i = result.innerHTML.length;
				var a = 0;
				while (result.innerHTML.charAt(a) != '-'){
					searchElementH = searchElementH + result.innerHTML.charAt(a);
					a++;
				}
				a++;
				while (a < i){
					searchElementR = searchElementR + result.innerHTML.charAt(a);
					a++;
				}
				selectIdAmis.value=searchElementH
				searchElement.value = previousValue = searchElementR; // On change le contenu du champ de recherche et on enregistre en tant que précédente valeur
				selectAmis.style.display = 'none'; // On cache les résultats
				result.className = ''; // On supprime l'effet de focus
				selectedResult = -1; // On remet la sélection à "zéro"
				searchElement.focus(); // Si le résultat a été choisi par le biais d'un clique alors le focus est perdu, donc on le réattribue
			}
	
			searchElement.addEventListener('keyup', function(e) {
	
				var divs = selectAmis.getElementsByTagName('div');
	
				if (e.keyCode == 38 && selectedResult > -1) { // Si la touche pressée est la flèche "haut"
	
					divs[selectedResult--].className = '';
	
					if (selectedResult > -1) { // Cette condition évite une modification de childNodes[-1], qui n'existe pas, bien entendu
						divs[selectedResult].className = 'result_focus';
					}
	
				}
	
				else if (e.keyCode == 40 && selectedResult < divs.length - 1) { // Si la touche pressée est la flèche "bas"
	
					selectAmis.style.display = 'block'; // On affiche les résultats
	
					if (selectedResult > -1) { // Cette condition évite une modification de childNodes[-1], qui n'existe pas, bien entendu
						divs[selectedResult].className = '';
					}
					
					selectedResult++;
					divs[selectedResult].className = 'result_focus';
					
					a=0;
	
				}
	
				else if (e.keyCode == 13 && selectedResult > -1) { // Si la touche pressée est "Entrée"
	
					chooseResult(divs[selectedResult]);
	
				}
	
				else if (searchElement.value != previousValue) { // Si le contenu du champ de recherche a changé
	
					previousValue = searchElement.value;
	
					if (previousRequest && previousRequest.readyState < XMLHttpRequest.DONE) {
						previousRequest.abort(); // Si on a toujours une requête en cours, on l'arrête
					}
	
					previousRequest = envoiAmisajax(previousValue); // On stocke la nouvelle requête
	
					selectedResult = -1; // On remet la sélection à "zéro" à chaque caractère écrit
	
				}
	
			});
			
			//selectAmis.options[i].value=pers[0];//le code personne devient la valeur de la liste
			//selectAmis.text=pers[1]+ " " +pers[2];// le texte de la liste est composé de la concatenation du nom et du prénom
			
			//selectAmis.options[0].selected='selected';
			
		},
			
		error:function(){ //dans le cas d’échec, envoyer un message.
			alert("perdu");
		}
	});
return;
}

	