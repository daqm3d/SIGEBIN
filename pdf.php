<?php
	
//error_reporting(E_ALL ^ E_NOTICE );
	include("conexion.php");
        
        /***********************/
	$rst_empleado=mysql_query("SELECT * FROM categories WHERE name!='NINGUNO';",$conexion);
	if (mysql_num_rows($rst_empleado)==0)
	{
		mysql_close($conexion);
		echo mostrar_mensaje("No hay ninguno","");
		exit();
	}
	$num='1';
?>
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
    <table width="874" border="1">
      <tr>
        
        <td><div align="center" class="grisoscuro"><strong>Inventario por Departamento</strong></div></td>
        <td><label>
          <select name="s_emp" id="select">
            <option selected="selected"  value="">[Seleccione departamento]</option>
            <?php
				while ($fila=mysql_fetch_array($rst_empleado))
				{
					echo "<option value='". $fila["name"]."'>".$fila["name"] ."</option>";
				
				}
			?>
            </select>
        </label></td>
        <td><div align="left">
          <input type="submit" name="button" id="button" value="Consultar" title="Buscar Inventario"/>
        </div></td>
        
      </tr>
    </table>
  </div>
</form>
</body>
</html>