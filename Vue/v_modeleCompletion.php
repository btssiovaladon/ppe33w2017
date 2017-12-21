<style>
    #rechercheAmis {
		padding: 2px 4px;
		width: 220px; height: 22px;
		border: 1px solid #AAA;
    }

    #rechercheAmis:hover, #search:focus {
		border-color: #777;
    }

    #results {
		display: none;
		width: 218px;
		border: 1px solid #AAA;
		border-top-width: 0;
		background-color: #FFF;
    }

    #results div {
		width: 210px;
		padding: 2px 4px;
		text-align: left;
		border: 0;
		background-color: #FFF;
    }

    #results div:hover, .result_focus {
		background-color: #DDD !important;
    }
</style>
Liste des amis :
</br>
<input type="text" id ="rechercheAmis" name="rechercheAmis"> <!--contient le nom et prénom-->
<input type="hidden" id ="rechercheAmisH" name="rechercheAmisH"> <!--contient le numéro-->

  
<div id="results"></div>

<script src="JavaScript/envoiAmis.js"></script>
