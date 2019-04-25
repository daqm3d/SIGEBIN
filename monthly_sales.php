
<?php
  $page_title = 'Reporte por Departamento';
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
  <div class="col-md-6">
    <div class="panel">
      <div class="panel-heading">

      </div>
      <div class="panel-body">
          <form class="clearfix" method="post" action="monthly_sales_process.php">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Departamentos</label>
              <select name="Departamentos" class="form-control"  id="exampleFormControlSelect1">
                    <option >Seleccionar Departamento</option>
                    <?php
                      while($lista=mysqli_fetch_assoc($result ))
                        echo "<option value=".$lista["id"].">".$lista["name"]."</option>"; 
                    ?>
                </select>
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
