<?php
include "plantilla.php";

$pdf = new PDF('L'); // Orientación Landscape
$pdf->AliasNbPages();
$pdf->AddPage();

// Establecemos un margen izquierdo para centrar toda la tabla
$margenIzquierdo = 10; // Puedes ajustar este valor
$pdf->SetLeftMargin($margenIzquierdo);

// Cabecera de la tabla
$pdf->SetFillColor(37, 150, 190);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont('Arial', '', 12);

// Cabeceras de la tabla - Nota que eliminamos el Cell(2) inicial
$pdf->Cell(75,10,utf8_decode("Nombre del cliente"),1,0,"C",1);
$pdf->Cell(30,10,utf8_decode("Mesa"),1,0,"C",1);
$pdf->Cell(110,10,utf8_decode("Pedido del cliente"),1,0,"C",1);
$pdf->Cell(70,10,utf8_decode("Comentario"),1,1,"C",1);

require 'conexion.php';
$todos_datos= "SELECT * FROM `pedidos` ORDER BY `comentarios_cantidad` ASC";
$verpedido = mysqli_query($conectar, $todos_datos);

while($fila = $verpedido->fetch_array()){
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','',10);
    
    $y = $pdf->GetY();
    
    // Eliminamos el Cell(2) y mantenemos las dimensiones exactas
    $pdf->Cell(75,20,utf8_decode($fila["nombre_cliente_pedido"]),1,0,"C",0);
    $pdf->Cell(30,20,utf8_decode($fila["numero_mesa"]),1,0,"C",0);
    
    $x = $pdf->GetX();
    $pdf->MultiCell(110,10,utf8_decode($fila["pedido_cliente_pedido"]),1,"C",0);
    
    $pdf->SetXY($x + 110, $y);
    $pdf->Cell(70,20,utf8_decode($fila["comentarios_cantidad"]),1,1,"C",0);
}

$pdf->Output("","Dia_mes_anio_turno");
?>