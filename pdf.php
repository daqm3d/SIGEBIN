<?php
	
//error_reporting(E_ALL ^ E_NOTICE );
	require_once('includes/load.php');
	$conn=new Conexion();
	$link = $conn->conectarse();
        
        /***********************/
	$query="SELECT * FROM categories WHERE name!='NINGUNO'";
	$result=mysqli_query($link, $query);
	/*****************************/
	$num='1';
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
   
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Lista de Inventario por Departamento</span>
       </strong>
      </div>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
<!--
blanco {
	color: #FFF;
}
.blanco {
	color: #FFF;
}
.centrar {
	text-align: center;
}
.centro {
	text-align: center;
}
.letra {
	font-size: 12px;
}
.grisoscuro {
	color: #666;
}

</style>
</head>

<body>
    <form id="form1" name="form1" method="post" action="pdferror.php?num=<?php echo $num;?>" target="inferior"  >
  <div align="center">
    <table width="500">
      <tr>
        
        <td><div align="center" class="grisoscuro"><strong>Inventario por Departamento</strong></div></td>
        <td><label>
          <select name="s_emp" id="select">
            <option selected="selected"  value="">[Seleccione departamento]</option>
            <?php
				while ($fila=mysqli_fetch_array($result))
				{
					echo "<option value='". $fila["name"]."'>".$fila["name"] ."</option>";
				
				}
			?>
            </select>
        </label></td>
        <td><div align="left">
          <input type="submit" name="button" id="button" class="btn btn-primary" value="Consultar" title="Buscar Inventario"/>
        </div></td>
        
      </tr>
    </table>
  </div>
</form>
</body>
</html>
<?php include_once('layouts/footer.php'); ?>