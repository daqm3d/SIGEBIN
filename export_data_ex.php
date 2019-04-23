<?php
	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename=inventario.xls');

	require_once('includes/load.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

	$query="SELECT t1.name,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.id=t2.id WHERE t2.id ORDER by t1.id desc";
	$result=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:red;">
		<th>Descripcion</th>
		<th>Cantidad</th>
		<th>Marca</th>
		<th>Serial</th>
		<th>Modelo</th>
                <th>Nro. Bien</th>
                <th>Modelo</th>
                <th>Departamento</th>
                <th>Fecha de ingreso del Producto</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo $row['marca']; ?></td>
					<td><?php echo $row['serial']; ?></td>
					<td><?php echo $row['model']; ?></td>
                                        <td><?php echo $row['bien']; ?></td>
                                        <td><?php echo $row['model']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
				</tr>	

			<?php
		}

	?>
</table>