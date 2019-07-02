<?php
  $page_title = 'Lista de Inventario por Departamento';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  
  $all_categories = find_by_departures('categories')
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
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">Descripcion</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Nro. Serial</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Nro. Bien</th>
                    <th class="text-center">Departamento</th>
                    
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                <tr>
                    
                    <td><?php echo remove_junk(ucfirst($cat['name1'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['quantity'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['serial'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['model'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['bien'])); ?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>

                </tr>
              <?php endforeach; ?>
            <a href="reportepdf.php?s_emp=<?php echo $_GET['s_emp'];?>"><button type="submit" name="add_cat" class="btn btn-primary">Ver PDF</button></a>    
            </tbody>
            
            
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
