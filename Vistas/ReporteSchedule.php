<?php

session_start();

if (isset($_SESSION['username']))
{


require_once('../Recursos/tcpdf/tcpdf.php');


date_default_timezone_set('UTC');
 
class IMAGEN_NUEVA extends TCPDF {

    //Page header
    public function Header() {
        
       
         
//        $image_file2 = K_PATH_IMAGES.'fondo_factura.jpg';
//        $this->Image($image_file2, 0, 0, 257, 210, '', '', '', false, 300, '', false, false, 0);
        
         $image_file = K_PATH_IMAGES.'IBM-logo.jpg';
        
        $this->Image($image_file, 0, 0, 120, 30, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $idschedule = $_SESSION['id_schedule'];
        $html = ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                .' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                . '<table width="300px"><tr><td></td></tr><tr><td width="18%"></td><td width="80%">'
                .'<table bgcolor="#D6D2D2" border="0" style="border:2 px solid black">'
                . '<tr><td align="center"><label style="font-family:Courier;font-size:22; font-weight:bold;">SCHEDULE</label></td></tr>'
                . '<tr><td align="center"><label style="font-family:Courier;font-size:15; font-weight:bold;">N° 000'.$idschedule.'</label></td></tr>'
                . '</table>'
                . '</td><td width="2%"></td></tr></table>';
        
        $this->writeHTML($html, true, false, true, false, '');
        
        $this->SetFont('helvetica', 'B', 15);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-25);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        
        $this->Cell(0, 2, '_____________________________________________________________________________________________________________________________________________________________________________' , 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 2, '© Copyright 2016, Schedule UNIQUE  GTS - IBM DEL PERU' , 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 2, 'Av. Javier Prado Este 6230, Lima, Perú ' , 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 2, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 1, 'C', 0, '', 0, false, 'T', 'M');
        
    }
    
}


// Crear el documento
$pdf = new IMAGEN_NUEVA(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// Información referente al PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($_SESSION['username']);
$pdf->SetTitle('SCHEDULE UNIQUE');
$pdf->SetSubject('SCHEDULE UNIQUE');
$pdf->SetKeywords('SCHEDULE UNIQUE');
 
// Contenido de la cabecera
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


// Fuente de la cabecera y el pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// Márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// Saltos de página automáticos.
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
// Establecer el ratio para las imagenes que se puedan utilizar
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// Establecer la fuente
//$pdf->SetFont('times', 'BI', 11);
 
// Añadir página
$pdf->AddPage('L', 'A4');
 
// Escribir una línea con el método CELL
$fecha = date("Y-m-d");
$arreglo = $_SESSION['Schedule'];
$arreglo2 = $_SESSION['Schedule_cabecera'];
$pdf->Cell(0, 7, '___________________________________________________________________________________________________________________',0,1,'C');
//$pdf->Cell(0, 10, '',0,1,'C');
$pdf->SetFont('helvetica','B',24);
$pdf->Cell(0, 10, 'REPORTE DE SCHEDULE UNIQUE',0,1,'C');
$num=1;


foreach ($arreglo as $r)
  {
        if($r['actividad_team']=='1'){
        $team = 'COP';
    }else if($r['actividad_team']=='2') {
        $team = 'PCT';
    }
    
     if($r['actividad_tws']=='1'){
        $color = '#68FF7E';
    }else if($r['actividad_tws']=='2') {
        $color = '#FFFFFF';
    }

    
  $tabla_detalle[]=
  '
  <table border="1" style="border: 1px solid black;font-size:7;font-family:courier;font-weight:bold;" cellpadding="2">
        <tr align="center" bgcolor="'.$color.'" >
            <td width="30"><label>'.$num.'</label></td>
            <td width="35"><label>'.$team.'</label></td>
            <td width="45"><label>'.substr($r['actividad_horaejecucion'], 0, -3).'</label></td>
            <td width="60"><label>'.$r['procedimiento_nombre'].'</label></td>
            <td width="90"><label>'.$r['actividad_servidor'].'</label></td>   
            <td width="680" align="left"><label>'.$r['actividad_descripcion'].'</label></td> 
        </tr>
  </table>
';
$num++;  
  }
  
  $snip_tabla = "";
  
  for ($i=0;$i<count($arreglo);$i++)
  {
      $snip_tabla= $snip_tabla.$tabla_detalle[$i];
  }

$pdf->SetFont('Helvetica', '', 9); 


foreach ($arreglo2 as $d)
  {
$detalle_reporte = '
    <br><br>  
    <table border="0" style="border: 2px solid black; font-size:10"cellspacing="2" width="1280">
        <tr>
            <td width="180"></td>
            <td width="320"></td>
            <td width="160"></td>
            <td width="255"></td>
        </tr>
        <tr style="font-weight:bold;">
            
            <td colspan="4"><label>LIMA, '.strtoupper(date("d F Y",strtotime($d['schedule_fecha']))).'</label></td>
            
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="font-weight:bold;">            
            <td><b>TURNO:</b></td>
            <td><label>'.$d['turno_nombre'].'</label></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
       
        <tr style="font-weight:bold;">
            <td><b>HORA DE INICIO:</b></td>
            <td><label>'.$d['turno_horainicio'].'</label></td>
            <td><b>HORA DE FIN:</b></td>
            <td><label>'.$d['turno_horafin'].'</label></td>
        </tr>        
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
                      
    </table>
 <br> 
 <br>
<b> &nbsp;&nbsp; Por lo siguiente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Favor extender documento a la orden de IBM DEL PERÚ</b>
'; 
  }
$pdf->writeHTML($detalle_reporte, true, false, true, false, '');

// Establecer la fuente
$pdf->SetFont('Helvetica', '', 6); 


$html = '
<br><br>  
<table border="1" bgcolor="#121359" color="white" style="font-size:5;font-family:courier;font-weight:bold">
        <tr align="center">
            <td width="30"><b>N°</b></td>
            <td width="35"><b>TEAM</b></td>
            <td width="45"><b>HORA EJEC.</b></td>
            <td width="60"><b>PROCEDIMIENTO</b></td> 
            <td width="90"><b>SERVIDOR</b></td>
            <td width="680"><b>ACTIVIDAD</b></td>       
        </tr>
</table>

  <br>'.$snip_tabla.'<br>
 
 <br>

  <table border="0" style="font-size:7;font-family:courier;font-weight:bold"  width="630" cellpadding="6">
        <tr align="center">
            <td width="300"><label></label></td>
            <td width="360" rowspan="3"><label><img src="../Controles/Firmas/firma2.png" alt="test alt attribute" width="145" height="60" border="0" /></label></td>
            
        </tr>
  </table>  
  <table border="0" style="font-size:7;font-family:courier;font-weight:bold"  width="630" cellpadding="6">
        <tr align="center">
            <td width="300"><label></label></td>
            <td width="360"><label>____________________________</label></td>
            
        </tr>
  </table>  
  <table border="0" style="font-size:7;font-family:courier;font-weight:bold"  width="630" cellpadding="6">
        <tr align="center">
            <td width="300"><label></label></td>
            <td width="360"><label>PROCESADO</label></td>
            
        </tr>
  </table>
  <table border="0" style="font-size:7;font-family:courier;font-weight:bold"  width="630" cellpadding="6">
        <tr align="center">
            <td width="300"><label></label></td>
            <td width="360"><label></label></td>
            <td colspan="2" style="color:red; font-weight:bold;"><label>ADMINISTRADOR</label></td>
        </tr>
  </table>
  ';



// output the HTML content


$pdf->writeHTML($html, true, false, true, false, '');


 
//Cerramos y damos salida al fichero PDF
$pdf->Output('Reporte_Schedule_.pdf', 'I');

}
else{
     header("location: ../../Vistas/login.php");
}

?>
