<?php
require('./fpdf/fpdf.php');
require_once("../include/class.pdogsb.inc.php");
$pdo = new PdoGsb();

//Récupération des données
		$activite=1;
		$lesAmis= $pdo->getAllAmisParActivité($activite);
		$leChef=$pdo->getChefActivite($activite);
		$nomActivite=$pdo->getNomActivite($activite);
/* On nettoie les entrées pour faire place au pdf */
$buffer = ob_get_clean();

class PDF extends FPDF{
	protected $col = 0; // Colonne courante
	protected $y0;      // Ordonnée du début des colonnes
	
	/* Entête */
	function Header(){
		$pdo = new PdoGsb();
		$activite=1;
		$nomActivite=$pdo->getNomActivite($activite);
		
		$this->SetFont('Arial','b',15);
		$this->Cell(50);
		$this->Cell(100,9,utf8_decode('Activité'." ".$nomActivite['nom']),1,0,'C');
		$this->Ln(30);
		
		$this->SetFont('Arial','B',8);
		$this->Cell(24,10,utf8_decode("Nom"),1,0,'C');
		$this->Cell(24,10,utf8_decode("Prénom"),1,0,'C');
		$this->Cell(18,10,utf8_decode("Rôle"),1,0,'C');
		$this->Cell(40,10,utf8_decode("Adresse"),1,0,'C');
		$this->Cell(8,10,utf8_decode("CP"),1,0,'C');
		$this->Cell(24,10,utf8_decode("Ville"),1,0,'C');
		$this->Cell(22,10,utf8_decode("Téléphone"),1,0,'C');
		$this->Cell(34,10,utf8_decode("Mail"),1,0,'C');
	}
	/* Pied de page */
	function Footer(){
		// Positionnement à 1,5 cm du bas
		$this->SetY(-15);
		// Police Arial italique 8
		$this->SetFont('Arial','I',8);
		// Numéro de page
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	/* SubWrite pour le positionnement */
	function subWrite($h, $txt, $link='', $subFontSize=12, $subOffset=0){
		// resize font
		$subFontSizeold = $this->FontSizePt;
		$this->SetFontSize($subFontSize);
		
		// reposition y
		$subOffset = ((($subFontSize - $subFontSizeold) / $this->k) * 0.3) + ($subOffset / $this->k);
		$subX        = $this->x;
		$subY        = $this->y;
		$this->SetXY($subX, $subY - $subOffset);

		//Output text
		$this->Write($h, $txt, $link);

		// restore y position
		$subX        = $this->x;
		$subY        = $this->y;
		$this->SetXY($subX,  $subY + $subOffset);

		// restore font size
		$this->SetFontSize($subFontSizeold);
	}
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->Ln(10);
$pdf->SetFont('Arial','',7);
	$pdf->Cell(24,6,utf8_decode($leChef['nom']),1,0,'C');
	$pdf->Cell(24,6,utf8_decode($leChef['prenom']),1,0,'C');
	$pdf->Cell(18,6,utf8_decode('Chef'),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($leChef['adresse']),1,0,'C');
	$pdf->Cell(8,6,utf8_decode($leChef['codePostal']),1,0,'C');
	$pdf->Cell(24,6,utf8_decode($leChef['ville']),1,0,'C');
	$pdf->Cell(22,6,utf8_decode($leChef['telephone']),1,0,'C');
	$pdf->Cell(34,6,utf8_decode($leChef['mail']),1,0,'C');
$pdf->Ln(6);
for($i=0;$i<count($lesAmis);$i++){
	$pdf->Cell(24,6,utf8_decode($lesAmis[$i]['nom']),1,0,'C');
	$pdf->Cell(24,6,utf8_decode($lesAmis[$i]['prenom']),1,0,'C');
	$pdf->Cell(18,6,utf8_decode('Participant'),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($lesAmis[$i]['adresse']),1,0,'C');
	$pdf->Cell(8,6,utf8_decode($lesAmis[$i]['codePostal']),1,0,'C');
	$pdf->Cell(24,6,utf8_decode($lesAmis[$i]['ville']),1,0,'C');
	$pdf->Cell(22,6,utf8_decode($lesAmis[$i]['telephone']),1,0,'C');
	$pdf->Cell(34,6,utf8_decode($lesAmis[$i]['mail']),1,0,'C');
}
$pdf->AliasNbPages();
$pdf->Output();

?>