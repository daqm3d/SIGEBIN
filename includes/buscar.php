<?php
	$palabra=$_POST['palabra'];
	$query="SELECT t1.name as name1,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE t1.bien LIKE '". $palabra ."'";
	$consulta3=$mysqli->query($query);
	if($consulta3->num_rows>=1){
		echo "<table class='table table-bordered table-striped table-hover'>
		<thead>
			<tr>
				
				<th class='text-center'>Descripcion del Bien</th>
                                <th class='text-center'>Cantidad</th>
                                <th class='text-center'>Marca</th>
				<th class='text-center'>Serial</th>
				<th class='text-center'>Modelo</th>
				<th class='text-center'>Bien</th>
                                <th class='text-center'>Departamento</th>
			</tr>
		</thead>
		<tbody>";
		while($fila=$consulta3->fetch_array(MYSQLI_ASSOC)){
			echo "<tr>
				
				<td class='text-center'>".$fila['name1']."</td>
                                <td class='text-center'>".$fila['quantity']."</td>    
                                <td class='text-center'>".$fila['marca']."</td>    
				<td class='text-center'>".$fila['serial']."</td>
				<td class='text-center'>".$fila['model']."</td>
				<td class='text-center'>".$fila['bien']."</td>
                                <td class='text-center'>".$fila['name']."</td>    
			</tr>";
		}
		echo "</tbody>
	</table>";
	}else{
            echo 'No se encuentra este registro' .$palabra; 
            
            
}
            ?>     