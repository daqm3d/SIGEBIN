<?php
///// INCLUIR LA CONEXIÓN A LA BD /////////////////
require_once('includes/load.php');
	$conn=new Conexion();
	$link = $conn->conectarse();
            /******************************/
	$query="SELECT t1.name as name1,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.id=t2.id WHERE t2.id  ORDER by t1.id desc";
	$result=mysqli_query($link, $query);
?>

<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
                <link href="libs/css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
                            <h2><img src="libs/images/logo-sudebin.png" width="400" height="250"></h2>
			</div>
		</header>
		<section>
			<table class="table" width="500">
				<tr class="bg-primary">
					<th>Descripcion del Bien</th>
					<th>Cantidad</th>
					<th>Marca</th>
					<th>Serial</th>
                                        <th>Modelo</th>
					<th>Nro. Bien</th>
                                        <th>Departamento</th>
                                        <th>Fecha de Ingreso del Bien</th>
				</tr>
				<?php
				while ($registroInventario = $result->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
						 <td>'.$registroInventario['name1'].'</td>
						 <td>'.$registroInventario['quantity'].'</td>
						 <td>'.$registroInventario['marca'].'</td>
						 <td>'.$registroInventario['serial'].'</td>
						 <td>'.$registroInventario['model'].'</td>
                                                 <td>'.$registroInventario['bien'].'</td>
                                                 <td>'.$registroInventario['name'].'</td>
                                                 <td>'.$registroInventario['date'].'</td>    
						 </tr>';
				}
				?>
			</table>
		</section>

            <form method="post" class="form" action="exportar_data.php" align="center">
		<input type="date" name="fecha1">
		<input type="date" name="fecha2">
		<input type="submit" name="generar_reporte" class="btn btn-primary">
		</form>
	</body>
</html>