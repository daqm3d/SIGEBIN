
<?php
  $page_title = 'Reporte por Producto';
  require_once('includes/load.php');
  $conn=new Conexion();
  $link = $conn->conectarse();

  $query="SELECT * FROM categories  ";
  $result=mysqli_query($link, $query);
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Codigo de Producto</span>
         </strong>
        </div>
        <div class="panel-body">
          <form class="clearfix" method="post" action="daily_sales_process.php">
              <div class="form-group">
                <input type="text" class="form-control" name="productos" placeholder="Codigo" >
              </div>
            <div class="form-group">
               <button type="submit" name="name" class="btn btn-primary">Generar Reporte</button>
            </div>
          </form>
        </div>
      </div>
  </div>

</div>
<?php include_once('layouts/footer.php'); ?>

