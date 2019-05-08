
<?php
  $page_title = 'Reporte por Departamento';
  require_once('includes/load.php');
  $conn=new Conexion();
  $link = $conn->conectarse();

  $query="SELECT * FROM categories WHERE name!='NINGUNO'";
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
    <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Departamentos</span>
         </strong>
        </div>
        <div class="panel-body">
          <form class="clearfix" method="post" action="consultardepartamentopdf.php">
            <div class="form-group">
              <select name="departamentos" class="form-control"  id="exampleFormControlSelect1">
                    <option >Seleccionar Departamento</option>
                    <?php
                      while($lista=mysqli_fetch_assoc($result ))
                        echo "<option value=".$lista["name"].">".$lista["name"]."</option>"; 
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
