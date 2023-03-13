<?php
$usuario  = "root";
$password = "Petrisor";
$servidor = "192.168.4.236";
$basededatos = "sarabastall";
$con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
$db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");


date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_ES');
$fecha_registro   = date('d-m-Y H:i:s A'); 


ini_set("memory_limit", "128M");
//require_once('/public/tcpdf/tcpdf.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/tcpdf/tcpdf.php'); 
//require_once dirname( __FILE__ ) . '/tcpdf/tcpdf.php';
ob_end_clean(); //limpiar la memoria


class MYPDF extends TCPDF {
    public function Header() {
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file1 = 'assets/img/fondo.jpg';
        $this->Image($img_file1, 0, 0, 220, 297, '', '', '', false, 300, '', false, false, 0);
        $img_file = 'assets/img/logo-fundacion-sarabastall1.png';
        $this->Image($img_file, 162, 100, 22, 90, '', '', '', false, 300, '', false, false, 0);
        $img_file2 = 'assets/img/linea.png';
        $this->Image($img_file2, 37, 98, 0.5, 100, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    } 
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);        

$pdf->AddPage();

$idCurso = $datos['diplomaCurso']->idCurso;
$sqlCurso      = ("SELECT curso.* FROM curso, curso_persona 
                        WHERE curso.idCurso = $idCurso
                        AND curso_persona.idCurso = $idCurso");
$resultadoCurso= mysqli_query($con, $sqlCurso);
$totalCurso    = mysqli_num_rows($resultadoCurso);
$dataFilaCurso = mysqli_fetch_assoc($resultadoCurso);

$idTrabajador = $datos['diplomaPersona'][0]->idTrabajador;
$sqlCliente      = ("SELECT persona.*, curso_persona.* FROM curso_persona, persona 
                        WHERE idTrabajador = $idTrabajador
                        AND idPersona =  $idTrabajador");
$resultadoClient = mysqli_query($con, $sqlCliente);
$total           = mysqli_num_rows($resultadoClient);
$dataFilaCliente = mysqli_fetch_assoc($resultadoClient);
$nomape = $dataFilaCliente['nombre']." ".$dataFilaCliente['apellidos'];

if($total >0){

$pdf->SetFont('freesans', 'B', 45, '', 'false');
$pdf->SetXY(190, 25);
$pdf->Rotate(-90);
$pdf->Cell(245,98, ('DIPLOMA'),0,0,'C');

$pdf->SetFont('freesans', 'B', 20, '', 'false');
$pdf->SetXY(191, 20);
$pdf->Cell(245,145, ('CERTIFICA QUE:'),0,0,'C');


/*Nombre completo del cliente*/
$pdf->SetFont('FreeSans', 'B', 40, '', 'false');
$pdf->SetXY(200, 20);
$pdf->Cell(230,175, ($nomape),0,0,'C');

$pdf->SetFont('FreeSans', 'B', 17, '', 'false');
$pdf->SetXY(200, 20);
$pdf->Cell(220,220, ('ha finalizado con éxito el curso '.$dataFilaCurso['nombreCurso'].','),0,0,'C');

$pdf->SetFont('Helvetica', 'B', 17, '', 'false');
$pdf->SetXY(201, 20);
$pdf->Cell(220,235, ('con fecha a '.$dataFilaCurso['fechaFin']),0,0,'C');


$pdf->Output('Cliente.pdf', 'I');

}


?>



