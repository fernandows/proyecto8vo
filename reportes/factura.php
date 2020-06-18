<?php
require 'FPDF/fpdf.php';
require_once("../db/ModCon.php");
 class PDF extends FPDF
{


// Pie de página
function Footer()
{
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
$a=$pdf->Image('../img/logo_fac.jpg',10,10,-80);
$a=$pdf->Image('../img/silla_fac2.jpg',40,50,-200);
 $pdf->Cell(30);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(80,10,"RUC:1003721824001",0,0,"C");

$pdf->Cell(80,10,"FECHA:  ".$tmp['fecha'],1,1,"L");
$pdf->SetFont('Arial','i',12);
$pdf->Cell(30,7,"",0,0,"C");
$pdf->SetFont('Arial','B',15);
 $pdf->Cell(80,10,"NAJERA LARA SANTIAGO ",0,0,"C");

$pdf->SetFont('Arial','B',13);
 $pdf->Cell(30,8,"FACTURA N:",1,0,"C");
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
  $pdf->Cell(50,8," SB-".$codigo,1,1,"C");
$pdf->SetFont('Arial','i',12);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(30,7,"",0,0,"C");
$pdf->SetFont('Arial','B',11);
 $pdf->Cell(80,7,"Chica Narvaez 6-75 y Oviedo",0,1,"C");
 $pdf->Cell(30,7,"",0,0,"C");
 $pdf->Cell(80,7,"Ibarra-Ecuador",0,1,"C");

  $pdf->Cell(190,7,"	DATOS DEL CLIENTE",1,1,"C");

$pdf->SetFont('Arial','B',13);
  $pdf->Cell(31,6,"RUC/CI:",1,0,"C");
  $pdf->SetFont('Helvetica','',12);
 $pdf->Cell(30,6,"".$DATOS['cedula'],0,0,"L");

$pdf->SetFont('Arial','B',13);
  $pdf->Cell(31,6,"CLIENTE:",1,0,"C");
  $pdf->SetFont('Helvetica','',12);
  $cliente=$DATOS['nombre']."  ".$DATOS['apellido'];
 $pdf->Cell(150,6,$cliente,0,1,"L");

 $pdf->SetFont('Arial','B',13);
   $pdf->Cell(31,8,"DOMICILIO:",1,0,"C");
   $pdf->SetFont('Helvetica','',12);
 $pdf->Cell(165,6,"".$DATOS['ciudad'],0,1,"L");
 $pdf->SetFont('Arial','B',13);

$pdf->Cell(0,2,"",0,1,"C");

  $pdf->Cell(20,8,"CANT",1,0,"C");
    $pdf->Cell(100,8,"DESCRIPCION",1,0,"C");
      $pdf->Cell(35,8,"PRECIO UNIT.",1,0,"C");
        $pdf->Cell(35,8,"IMPORTE",1,1,"C");
         $pdf->SetFont('Helvetica','',13);

$vaciar=$conexion->query("SELECT pro.precio,det.cantidad,ven.total,pro.producto
FROM  detalle_v det
INNER JOIN venta  ven on ven.idventa=det.idventa
INNER JOIN producto pro on pro.idproducto=det.idproducto
WHERE det.idventa='$id_factura'   ");

while ($pro=$vaciar->fetch_array())

{
  $cant=$pro['cantidad'];
  $pre=$pro['precio'];
  $importe=$cant*$pre;

  $pdf->Cell(20,8,$pro['cantidad'],1,0,"C");
     $pdf->Cell(100,8,$pro['producto'],1,0,"C");
      $pdf->Cell(35,8,$pro['precio'],1,0,"C");
       $pdf->Cell(35,8,$importe,1,1,"C");
}


for ($i=0; $i < 4; $i++) {

	$pdf->Cell(20,8,"",1,0,"C");
    $pdf->Cell(100,8,"",1,0,"C");
      $pdf->Cell(35,8,"",1,0,"C");
        $pdf->Cell(35,8,"",1,1,"C");
}


$aux=$conexion->query("SELECT subtotal,iva,total
FROM  venta
WHERE idventa='$id_factura'  ");



 $precio=$aux->fetch_array();
$total=$precio['total'];
$iva=$precio['iva'];
$subtotal=$precio['subtotal'];

$pdf->SetFont('Helvetica','i',10);
$pdf->Cell(120,24,"Esta Factura No es Valida Sin El Sello y la Firma Autorizada",1,0,"C");
$pdf->SetFont('Helvetica','B',13);
    $pdf->Cell(35,8,"SubTotal :",1,0,"C");
$pdf->SetFont('Helvetica','',13);
      $pdf->Cell(35,8,$subtotal,1,1,"C");

      $pdf->Cell(120,8,"",0,0,"C");
     $pdf->SetFont('Helvetica','B',13);
    $pdf->Cell(35,8,"Iva 12% :",1,0,"C");
$pdf->SetFont('Helvetica','',13);

      $pdf->Cell(35,8,$iva,1,1,"C");

      $pdf->Cell(120,8,"",0,0,"C");
    $pdf->SetFont('Helvetica','B',13);
    $pdf->Cell(35,8,"Total :",1,0,"C");
$pdf->SetFont('Helvetica','',13);

      $pdf->Cell(35,8,$total,1,1,"C");
      $pdf->Cell(190,15,"",0,1,"L");
       $pdf->SetFont('Helvetica','B',13);
       $pdf->Cell(190,8,"__________________",0,1,"C");
        $pdf->Cell(190,5," FIRMA AUTORIZADA",0,1,"C");


$pdf->Output('Factura:'.$codigo.'.pdf','D');

header("location:/receipt.php");
 ?>
