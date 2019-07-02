<?php
	include 'plantilla.php';
	require 'includes/conexion.php';
	
	$query = "t1.name as t1.name1,t1.quantity,t1.serial,t1.model,t1.bien,t2.name FROM products AS t1 INNER JOIN categories t2 AS t2 ON t1.categorie_id=t2.id";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'Descripcion',1,0,'C',1);
	$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(70,6,'Serial',1,1,'C',1);
        $pdf->Cell(70,6,'Modelo',1,1,'C',1);
        $pdf->Cell(70,6,'Bien',1,1,'C',1);
        $pdf->Cell(70,6,'Departamento',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['name1']),1,0,'C');
		$pdf->Cell(20,6,$row['quantity'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['serial']),1,1,'C');
                $pdf->Cell(70,6,utf8_decode($row['model']),1,1,'C');
                $pdf->Cell(70,6,utf8_decode($row['bien']),1,1,'C');
                $pdf->Cell(70,6,utf8_decode($row['name']),1,1,'C');
	}
	$pdf->Output();
?>