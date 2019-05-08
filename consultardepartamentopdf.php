<?php
  $page_title = 'Lista de Inventario por Departamento';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
    $conn=new Conexion();
    $link = $conn->conectarse();
    $departamentos = $_POST['departamentos'];
  $query="SELECT t1.name as name1 ,t1.quantity,t1.marca,t1.serial,t1.model,t1.bien,t1.date, t2.name FROM products t1 INNER JOIN categories t2 ON t1.categorie_id=t2.id WHERE  t2.name = '$departamentos'";
  $results=mysqli_query($link, $query);
?>

<?php include_once('layouts/header.php'); ?>
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
    }.table>thead:first-child>tr:first-child>th{
       border-top: 1px solid #000;
      }.sale-head,table.table thead tr th,table tbody tr td,table tfoot tr td{
       border: 1px solid #212121;
       white-space: nowrap;
     }
   </style>
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
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                  <th>Fecha de Ingreso</th>
                  <th>Descripción</th>
                  <th>Marca</th> 
                  <th>Modelo</th>
                  <th>Nro. Serial</th>
                  <th>Nro. Bienes Nacionales</th>
                  <th>Departamento</th>
                  <th>Stock</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($results as $result): ?>
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
              <?php endforeach; ?>
            <a href="reportepdf.php?departamentos=<?php echo $departamentos ?>"> <button type="submit" name="add_cat" class="btn btn-primary">Ver PDF </button></a>    
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
