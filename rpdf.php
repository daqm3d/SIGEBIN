<?php

require_once('includes/load.php');
	$conn=new Conexion();
	$link = $conn->conectarse();

$id=$_GET['id'];

 $sql="SELECT t1.name as name1,t1.quantity,t1.serial,t1.model,t1.bien, t2.name 
 FROM products t1 
 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE t2.name='". $id ."'";

$result=mysqli_query($link,$sql);

	$ver=mysqli_fetch_row($result);

	
?>  


<!DOCTYPE html>
 <html>
<body>
<p align="right"><img src="libs/images/logo-sudebin.png" width="250" height="120"/>
<br>
<br>
<br>
<br>
<h2 align="center" ><strong><u>LISTADO DE INVENTARIO POR DEPARTAMENTO</u></strong></h2>

<table width="580">
  
  <tr class="titulo2" border="1">
    <td text-align="center"><strong>Descripcion del bien</strong></td>
    <td text-align="center"><strong>Cantidad</strong></td>
    <td text-align="center"><strong>Marca</strong></td>
    <td text-align="center"><strong>Modelo</strong></td>	
    <td text-align="center"><strong>Nro. Bien</strong></td>
    <td text-align="center"><strong>Departamento</strong></td>
  </tr>
  
  <?php
  $sql="SELECT t1.name as name1,t1.quantity,t1.serial,t1.model,t1.bien, t2.name 
 FROM products t1 
 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE t2.name='". $id ."'";
  
  $result=mysqli_query($link,$sql);
			//$total=0;
			while($mostrar=mysqli_fetch_array($result)):
  ?> <tr>
    <td text-align="center"><?php echo $mostrar["name1"]; ?></td>
    <td text-align="center"><?php echo $mostrar["quantity"]; ?></td>
    <td text-align="center"><?php echo $mostrar["serial"]; ?></td>
    <td text-align="center"><?php echo $mostrar["model"]; ?></td>	
    <td text-align="center"><?php echo $mostrar["bien"]; ?></td>
    <td text-align="center"><?php echo $mostrar["name"]; ?></td>
<?php  endwhile; ?>  
</tr>
  
</table>
 </body>
 </html>