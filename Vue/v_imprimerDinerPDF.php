<?php


$content='

<page>
		<h1 style="align-text:center">Edition de la liste des Amis invité à un Diner</h1>

		<table border=1>

		<tr>
			<td >DATEREPAS</td>
			<td>HEUREREPAS</td>
			<td>LIEUREPAS</td>
			<td>PRIXREPAS</td>	
			<td>NombreRepas</td>
			<td>NomAmis</td>
			<td>PrénomAmis</td>

		</tr>';

$listeparticipant =$pdo->getParticipantRepas($idRepas);


		while ($ligne=$listeparticipant->fetch(PDO::FETCH_OBJECT)) {
			$content.='<tr>';
				$content.='<td>'.$ligne->date_repas.'</td>';
				$content.='<td>'.$ligne->heure_repas.'</td>';
				$content.='<td>'.$ligne->lieu_repas.'</td>';
				$content.='<td>'.$ligne->nombre_repas.'</td>';
				$content.='<td>'.$ligne->nom_amis.'</td>';
				$content.='<td>'.$ligne->prénom_amis.'</td>';
				$content.='</tr>';
			}


$content.="</table></page>";
 
 require_once('./include/html2pdf/html2pdf.class.php');
 $html2pdf= new HTML2PDF('L,A4,fr');
 $html2pdf->WriteHTML($content);
 $html2pdf->Output('listeDinerAmis.pdf');
 
 ?>















?>