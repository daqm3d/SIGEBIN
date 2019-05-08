<?php
require_once("dompdf/autoload.inc.php");
use Dompdf\dompdf;
require_once('includes/load.php');
//page_require_level(1);
$conn=new Conexion();
$link = $conn->conectarse();
//require_once("includes/conexion.php");
//$departamentos =$_GET['departamentos'];
//$rst_inventario=mysqli_query("SELECT t1.name as name1 ,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE  t2.name =$departamentos", $link);
$query="SELECT t1.name as name1 ,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE  t2.name = '". $_GET["departamentos"] ."' order by categorie_id desc";
$rst_inventario=mysqli_query($link, $query);
$html ='
<html>
<body>
<p align="right"><img src="libs/images/logo-sudebin.png" width="250" height="120"/>
<br>
<br>
<br>
<br>
<h2 align="center" ><strong><u>LISTADO DE INVENTARIO POR DEPARTAMENTO</u></strong></h2>
<table width="720" border="1">  
  <tr class="titulo2">
    <td style="text-align: center"><strong>Fecha de Ingreso</strong></td>
    <td style="text-align: center"><strong>Descripción</strong></td>
    <td style="text-align: center"><strong>Marca</strong></td>
    <td style="text-align: center"><strong>Modelo</strong></td>
    <td style="text-align: center"><strong>Nro. Serial</strong></td>
    <td style="text-align: center"><strong>Nro. Bienes Nacionales</strong></td>
    <td style="text-align: center"><strong>Departamento</strong></td>
    <td style="text-align: center"><strong>Stock</strong></td>
  </tr>';
  
  foreach ($rst_inventario as $result):
	
$html .='
    <tr>  
	   <td style="text-align: center">'.remove_junk($result['date']).'</td>
      <td style="text-align: center">'.remove_junk($result['name1']).'</td>
      <td style="text-align: center">'.remove_junk($result['model']).'</td>
      <td style="text-align: center">'.remove_junk($result['marca']).'</td>  
      <td style="text-align: center">'.remove_junk($result['serial']).'</td>
      <td style="text-align: center">'.remove_junk($result['bien']).'</td>
      <td style="text-align: center">'.remove_junk($result['name']).'</td>
      <td style="text-align: center">'.remove_junk($result['quantity']).'</td>
    </tr>';
	endforeach;;
$html .= '
</table>
</body>
</html>';

$dompdf=new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "landscape"); 
// Creamos una instancia a la clase
//ho $html; exit;
$dompdf->render();
$departamentos = $dompdf->output();
$dompdf->stream("ReporteDepartamento.pdf");
exit();
?>