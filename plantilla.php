<?php

require "fpdf/fpdf.php";

class PDF extends FPDF{
  //cabecera de la pagina
  function Header()
  {
    //logo
    $this -> Image('img/logo_colon.png', 10, 10, 30);
    //primer parametro es x, y y es el ancho px

    //Titulo
    $this -> SetFont('Helvetica', 'B', 20);//Arial bold 20px
    $this -> Cell(0, 10, 'Reporte de Pedidos', 0, 0, 'C');
    //celda con texto los parametros CELL son: ancho, alto, "texto de la celda", borde(0,1),salto de linea(0,1), alineacion (C,L,R)

    $this -> Ln(40);//salto de linea 
  }
  //pie de la pagina
  function Footer()
  {
    //para el numero de pagina
    $this -> SetY(-15);//Posición: a 1,5 cm del final
    $this -> SetFont('Helvetica', 'I', 8);//tipo de fuente, negrita (B-I-U-BIU),  Tamaño texto
    $this -> Cell(0, 10, utf8_decode('Pag. ') . $this->PageNo(). '/{nb}', 0, 0, 'C');

    //para la fecha 
    $this -> SetY(-15);//Posición: a 1,5 cm del final
    $this -> SetFont('Helvetica', 'I', 8);//tipo de fuente, cursiva, TamañoTexto
    $hoy =date('d-m-Y');
    $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R');
  }

}
?>