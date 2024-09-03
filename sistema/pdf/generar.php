<?php
require_once '../ema/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Comprobante de la Venta");
$pdf->SetFont('Arial', 'B', 12);

$id_compra = $_GET['ID_Compra'];
$id_tran = $_GET['ID_transaccion'];
$idcliente = $_GET['ID_Cliente'];

$consulta = "SELECT usuario.nombre, datos_usuario.numero_telefonico, datos_usuario.direccion, datos_usuario.ciudad FROM datos_usuario, usuario WHERE usuario.id = '$idcliente' AND datos_usuario.id_usuario = '$idcliente'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$datosC=$resultado->fetch(PDO::FETCH_ASSOC);

$consultados = "SELECT zapato.tipo_zapato,detalle_compra.* FROM detalle_compra,zapato WHERE detalle_compra.id_compra = '$id_compra' and zapato.id = detalle_compra.id_producto";
$resultados = $conexion->prepare($consultados);
$resultados->execute();


$pdf->Cell(195, 5, utf8_decode("Anana_spa"), 0, 1, 'C');
$pdf->Image("../img/WhatsApp Image 2022-12-11 at 2.20.03 PM_preview_rev_1.png", 180, 10, 25, 25, 'PNG');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode("288 140 3857"), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode("Calle Azueta Esquina Caballito Local #103 Cosamaloapan, Ver"), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Correo: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode("zapateria_cristopher@gmail.com"), 0, 1, 'L');

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Datos del cliente", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(70, 5, utf8_decode('Nombre del Cliente'), 0, 0, 'C');
$pdf->Cell(50, 5, utf8_decode('Teléfono'), 0, 0, 'C');
$pdf->Cell(56, 5, utf8_decode('Dirección'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5, utf8_decode($datosC['nombre']), 0, 0, 'C');
$pdf->Cell(50, 5, utf8_decode($datosC['numero_telefonico']), 0, 0, 'C');
$pdf->Cell(56, 5, utf8_decode($datosC['direccion'].", ".$datosC['ciudad']), 0, 1, 'C');

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Detalle de Producto", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(14, 5, utf8_decode('N°'), 0, 0, 'C');
$pdf->Cell(90, 5, utf8_decode('Producto'), 0, 0, 'C');
$pdf->Cell(25, 5, 'Cantidad', 0, 0, 'C');
$pdf->Cell(32, 5, 'Precio', 0, 0, 'C');
$pdf->Cell(35, 5, 'Sub Total.', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$contador = 1;

while ($productos = $resultados->fetch(PDO::FETCH_ASSOC)) {
    $pdf->Cell(14, 5, $contador, 0, 0, 'C');
    $pdf->Cell(90, 5, $productos['tipo_zapato']." ".$productos['nombre'], 0, 0, 'C');
    $pdf->Cell(25, 5, $productos['cantidad'], 0, 0,'C');
    $pdf->Cell(32, 5, $productos['precio'], 0, 0, 'C');
    $pdf->Cell(35, 5, number_format(1.16*($productos['cantidad'] * $productos['precio']), 2, '.', ','), 0, 1, 'C');
    $contador++;
}
 
$pdf->Output("ventas.pdf", "I");

?>
