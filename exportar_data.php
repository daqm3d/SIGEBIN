<?php
 include('conexion.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_Fechas_Ingreso.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('Descripcion', 'Cantidad', 'Marca', 'Serial', 'Modelo', 'Nro Bien'));
	// QUERY PARA CREAR EL REPORTE
	$reporteCsv=$conexion->query("SELECT *  FROM products where date BETWEEN '$fecha1' AND '$fecha2' ORDER BY id");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, [$filaR['id'], 
								$filaR['name'],
								$filaR['quantity'],
								$filaR['marca'],
                                                                $filaR['serial'],
                                                                $filaR['model'],
                                                                $filaR['bien'],
								$filaR['date']]);

}

?>