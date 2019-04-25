<?php
$page_title = 'Reporte por fechas';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
  require_once('includes/load.php');
  $conn=new Conexion();
  $link = $conn->conectarse();
  $departamentos = $_POST["Departamentos"];
  
  $query="SELECT t1.name,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE  t1.categorie_id = $departamentos ";

  $results=mysqli_query($link, $query);
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Reporte de Productos</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
     <link rel="stylesheet" href="libs/css/main.css" />
   <style>
   @media print {
     html,body{
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
     }.page-break {
       page-break-before:always;
       width: auto;
       margin: auto;
      }
    }
    .page-break{
      width: 980px;
      margin: 0 auto;
    }
     .sale-head{
       margin: 40px 0;
       text-align: center;
     }.sale-head h1,.sale-head strong{
       padding: 10px 20px;
       display: block;
     }.sale-head h1{
       margin: 0;
       border-bottom: 1px solid #212121;
     }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }
      table thead tr th {
       text-align: center;
       border: 1px solid #ededed;
     }table tbody tr td{
       vertical-align: middle;
     }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }.sale-head h1,table thead tr th,table tfoot tr td{
       background-color: #f8f8f8;
     }tfoot{
       color:#000;
       text-transform: uppercase;
       font-weight: 500;
     }
   </style>
</head>
<body>
  <?php if($results): ?>
    <div class="page-break">
       <div class="sale-head pull-right">
           <h1>Reporte de Productos</h1>
           <strong class="text-right">De <?php  echo $departamentos ?></strong>
       </div>
      <table class="table table-border">
        <thead>
          <tr>
              <th>Fecha</th>
              <th>Descripción</th>
              <th>Marca</th> 
              <th>Modelo</th>
              <th>Nro. Serial</th>
              <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $result): ?>
           <tr>
              <td class=""><?php echo remove_junk($result['date']);?></td>
              <td class="desc">
                <h6><?php echo remove_junk(ucfirst($result['name']));?></h6>
              </td>
              <td class="text-right"><?php echo remove_junk($result['model']);?></td>
              <td class="text-right"><?php echo remove_junk($result['marca']);?></td>
              <td class="text-right"><?php echo remove_junk($result['serial']);?></td>
              <td class="text-right"><?php echo remove_junk($result['quantity']);?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
         <tr class="text-right">
           <td colspan="4"></td>
           <td colspan="1"> Total </td>
           <td> $
           <?php echo number_format(@total_price($result)[0], 2);?>
          </td>
         </tr>
         <tr class="text-right">
           <td colspan="4"></td>
           <td colspan="1">Utilidad</td>
           <td> $<?php echo number_format(@total_price($result)[1], 2);?></td>
         </tr>
        </tfoot>
      </table>
    </div>
    <div class="form-group" id="exportar">
      <a href="sales_report.php"><button type="submit" name="submit" class="btn btn-primary">Cancelar</button></a>
      <button type="submit"  name="submit" class="btn btn-primary">Exportar</button>
    </div>
  <?php
    else:
        $session->msg("d", "No se encontro producto en el departamento de  $departamento ");
        redirect('monthly_sales.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
