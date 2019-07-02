<?php
	require_once('includes/load.php');
	$conn=new Conexion();
	$link = $conn->conectarse();
 
	$rst_empleado="SELECT t1.name,t1.quantity,t1.serial,t1.model,t1.bien, t2.commands FROM products t1 INNER JOIN center t2 ON t1.centro=t2.id WHERE t2.commands='". $_GET["s_emp"] ."'";
	$resultado = mysqli_query($link, $query);
	if (is_numeric( $_GET["num"]))
		$numero_pagina=$_GET["num"]; //Asignamos el numero a la variable
	else 
		$numero_pagina=1; //Asignamos el 1, que es la pagina por defecto
	if ($resultado["Serial_Cpu"]=='NINGUNO')
	{
		header("Location:cuerpo2.php?num=". $numero_pagina);
	}
else
	{
		header("Location:commandcenterpdf.php?s_emp=". $_POST["s_emp"] ."&id=". $numero_pagina);
	}
?>