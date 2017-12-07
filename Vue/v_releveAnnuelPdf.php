<?php
   // get the HTML
   ob_start();
  
//----- DEFINIR LE DOCUMENT AU FORMAT HTML (et balises spécifiques Html2Pdf) -----

?>

<page>



</page>

<?php
//----- GENERER LE FICHIER PDF -----

    $content = ob_get_clean(); // Récupère le contenu HTML et le mémorise
	
    // convert to PDF
    require_once(PATH_INCLUDE.'html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('releveannuel.pdf','D'); // 'D' propose le fichier en téléchargement
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }