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
 //$estado=$_GET['fech'];
 $fe1=$_GET['fecha11'];
 $fe2=$_GET['fecha22'];

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

$pdf->Cell(190,10,"Reporte categoria mas Vendido",1,1,"C");
$pdf->SetFont('Helvetica','',13);
$pdf->Cell(80,10,"".$fe11,0,1,"C");
$pdf->Cell(80,10,"".$fe22,0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,2,"",0,1,"C");


    $pdf->Cell(90,8,"CATEGORIA",1,0,"C");
      $pdf->Cell(50,8,"TOTAL EN VENTAS",1,0,"C");
        $pdf->Cell(50,8,"CANTIDAD PRODUCTOS",1,1,"C");

         $pdf->SetFont('Helvetica','',12);




$vaciar=$conexion->query(" SELECT  pro.categoria AS categoria,SUM(pro.precio) as Total,sum(det.cantidad) as Cantidad FROM
detalle_v det
INNER JOIN producto pro on pro.idproducto=det.idproducto
INNER join venta fac on det.idventa=fac.idventa
WHERE  fac.estado='ENTREGADO' AND fac.fecha
BETWEEN '$fe11 %' and '$fe22 23:59:59'
GROUP BY categoria
ORDER BY Cantidad DESC");


while ($pro=$vaciar->fetch_array())

{

  $product_id=$pro['categoria'];
  $producto=$pro['Total'];
  $precio=$pro['Cantidad'];




     $pdf->Cell(90,8,$product_id,1,0,"C");
     $pdf->Cell(50,8,$producto,1,0,"C");
     $pdf->Cell(50,8,$precio,1,1,"C");


}


for ($i=0; $i < 4; $i++) {


    $pdf->Cell(90,8,"",0,0,"C");
      $pdf->Cell(50,8,"",0,0,"C");

        $pdf->Cell(50,8,"",0,1,"C");
}





$pdf->Output('Factura:'.$codigo.'.pdf','D');

header("location:../admin/reportes.php");
 ?>
