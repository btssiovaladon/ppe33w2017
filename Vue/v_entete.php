<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="Style/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!--<script src="script.js"></script>-->
   <script src="JavaScript/envoiAmis.js"></script>
   <title>Club des AMIS</title>
   
</head>

<table>
	<tr>
		<td id="left">
			<!--<img src="./Image/logo"/>-->
		</td>
		<td id="center">
			<h1>Club des AMIS</h1>
		</td>
		<td id="right">
		<?php  
			if(isset($_SESSION['nomAmis'])){?>
			<div id="deconnexion">
				<h4><?php echo $_SESSION['nomAmis']." ".$_SESSION['prenomAmis'] ?></h4>
				<a href="index.php">Se déconnecter</a>
			</div>
			<?php }?>
		</td>
	</tr>
</table>
<?php
include("Vue/v_menu.php") ;
?>

