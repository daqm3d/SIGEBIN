<?php
	header('Content-type:application/xlsx');
	header('Content-Disposition: attachment; filename=inventario.xlsx');
	require_once('includes/load.php');
  $conn=new Conexion();
  $link = $conn->conectarse();
  $departamentos= $_POST["Departamentos"]; 
  $query="SELECT t1.name as name1 ,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE  t2.name = '$departamentos' ";
  $results=mysqli_query($link, $query);
?>

<table border="1">
	<tr style="background-color:red;">
		<th>Fecha de Ingreso</th>
              <th>Descripción</th>
              <th>Marca</th> 
              <th>Modelo</th>
              <th>Nro. Serial</th>
              <th>Nro. Bienes Nacionales</th>
              <th>Departamento</th>
              <th>Stock</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td class=""><?php echo remove_junk($result['date']);?></td>
              <td class="text-right"><?php echo remove_junk($result['name1']);?></td>
              <td class="text-right"><?php echo remove_junk($result['model']);?></td>
              <td class="text-right"><?php echo remove_junk($result['marca']);?></td>
              <td class="text-right"><?php echo remove_junk($result['serial']);?></td>
              <td class="text-right"><?php echo remove_junk($result['bien']);?></td>
              <td class="text-right"><?php echo remove_junk($result['name']);?></td>
              <td class="text-right"><?php echo remove_junk($result['quantity']);?></td>
				</tr>	

			<?php
		}

	?>
</table>