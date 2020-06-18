<?php
require 'FPDF/fpdf.php';
require_once("../db/ModCon.php");
 class PDF extends FPDF
{


// Pie de página
function Footer()
{
  $this->Cell(0,130,"",0,1,"C");
  $this->SetFont('Arial','B',8);
  $this->Cell(190,6,"Calidad y Confort en un solo Lugar",1,1,"C");

    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
session_start();
extract($_GET);

$id_factura=$_GET['idventa'];
 $estado=$_GET['estado'];
  $fe1=$_GET['fecha1'];
  $fe2=$_GET['fecha2'];

  $fe11 = date("Y/m/d", strtotime($fe1));
  $fe22 = date("Y/m/d", strtotime($fe2));

$modelo=new ModCon();
$conexion=$modelo->conectar();
$sql=$conexion->query("SELECT tra.idventa,cli.cedula,cli.nombre,cli.apellido,cli.ciudad
FROM venta tra
INNER join clientes  cli ON cli.idcliente=tra.idcliente
WHERE tra.idventa='$id_factura'");

$DATOS=$sql->fetch_array();
$fecha=$conexion->query("SELECT fecha FROM venta
WHERE idventa='$id_factura' ");
$tmp=$fecha->fetch_array();
// Creación del objeto de la clase heredada
$pdf = new PDF("P","mm","Letter");
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',22);
$a=$pdf->Image('../img/logo_reporte.jpg',10,10,-173);
$a=$pdf->Image('../img/silla_reporte.jpg',40,70,-180);
$pdf->Cell(30);

 $pdf->SetTextColor(255,0,0);
 $pdf->SetFont('Helvetica','b',18);
 $max=$DATOS['idventa'];

                    if ($max<10) {
                    $codigo="000000000".$max;
                   }else  if ($max<100) {
                    $codigo="00000000".$max;
                   }else if ($max<1000) {
                    $codigo="0000000".$max;
                   }else if ($max<10000) {
                    $codigo="000000".$max;
                   }else if ($max<100000) {
                    $codigo="00000".$max;
                   }else  if ($max<1000000) {
                    $codigo="0000".$max;
                   }else if ($max<10000000) {
                    $codigo="000".$max;
                   }else if ($max<100000000) {
                    $codigo="00".$max;
                   }else  if ($max<1000000000) {
                    $codigo="0".$max;
                   }else  if ($max<10000000000) {
                    $codigo="0".$max;
                   }


$pdf->SetTextColor(0,0,0);

$pdf->Cell(0,35,"",0,1,"C");
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,10,"REPORTE DE CLIENTES TOP- $estado",1,1,"C");

 $pdf->SetFont('Helvetica','',13);
$pdf->Cell(80,10,"Desde: ".$fe1,0,1,"C");
$pdf->Cell(80,10,"Hasta: ".$fe2,0,1,"C");



 $pdf->SetFont('Arial','B',12);

$pdf->Cell(0,2,"",0,1,"C");

  $pdf->Cell(25,8,"FACTURAS",1,0,"C");
    $pdf->Cell(30,8,"CEDULA",1,0,"C");
      $pdf->Cell(60,8,"NOMBRE",1,0,"C");
        $pdf->Cell(50,8,"DIRECCION",1,0,"C");
        $pdf->Cell(25,8,"TOTAL",1,1,"C");
         $pdf->SetFont('Helvetica','',12);

$vaciar=$conexion->query("SELECT COUNT(tra.idventa)as No_Facturas,cli.cedula,cli.nombre,cli.apellido,cli.ciudad, cli.celular, sum(tra.total) as Total
FROM venta tra
inner join clientes cli on cli.idcliente=tra.idcliente
WHERE  tra.estado='$estado'  and tra.fecha BETWEEN  '$fe11 00:00:00' and '$fe22 23:59:59'
 GROUP by cli.cedula order by No_Facturas DESC ");

while ($pro=$vaciar->fetch_array())

{
  $nombre=$pro['nombre'];
  $apellido=$pro['apellido'];
  $cliente=''.$nombre.' '.' '.$apellido;

  $pdf->Cell(25,8,$pro['No_Facturas'],1,0,"C");
     $pdf->Cell(30,8,$pro['cedula'],1,0,"C");
      $pdf->Cell(60,8,$cliente,1,0,"C");
       $pdf->Cell(50,8,$pro['ciudad'],1,0,"C");
       $pdf->Cell(25,8,$pro['Total'],1,1,"C");

}


for ($i=0; $i < 4; $i++) {

	$pdf->Cell(25,8,"",0,0,"C");
    $pdf->Cell(30,8,"",0,0,"C");
      $pdf->Cell(60,8,"",0,0,"C");
        $pdf->Cell(50,8,"",0,0,"C");
        $pdf->Cell(25,8,"",0,1,"C");
}





$pdf->Output('Factura:'.$codigo.'.pdf','D');

header("location:../admin/reportes.php");
 ?>
