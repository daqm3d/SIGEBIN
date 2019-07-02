<?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  $all_centers = find_all('center');
  //$all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('descripcion','departamento','product-quantity','brand', 'seriell','modelle','waren','centro','status'  );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['descripcion']));
     $p_cat   = remove_junk($db->escape($_POST['departamento']));
     $p_cet   = remove_junk($db->escape($_POST['centro']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['brand']));
     $p_sale  = remove_junk($db->escape($_POST['seriell']));
     $p_modelle = remove_junk($db->escape($_POST['modelle']));
     $p_waren = remove_junk($db->escape($_POST['waren']));
     $p_sta   = remove_junk($db->escape($_POST['status']));
     /*if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['product-photo']));
     }*/
     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .=" name,quantity,marca,serial,model,bien,categorie_id,date,centro,status";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_modelle}', '{$p_waren}','{$p_cat}', '{$date}','{$p_cet}','{$p_sta}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Producto agregado exitosamente. ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar producto</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="descripcion" placeholder="Descripción">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="departamento">
                      <option value="">Selecciona un departamento</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                    <div class="col-md-6">
                    <select class="form-control" name="centro">
                      <option value="">Selecciona un Centro de Comando</option>
                    <?php  foreach ($all_centers as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['commands'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Cantidad">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-th-large"></i>
                     </span>
                       <input type="text" class="form-control" name="brand" placeholder="Marca">
                   </div>
                 </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th-large"></i>
                      </span>
                        <input type="text" class="form-control" name="seriell" placeholder="Nro. Serial">
                    </div>
                  </div>
               </div>
              </div>    
                  
             <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th-large"></i>
                      </span>
                        <input type="text" class="form-control" name="modelle" placeholder="Modelo">
                    </div>
              </div>
              
              <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th-large"></i>
                      </span>
                        <input type="text" class="form-control" name="waren" placeholder="Nro. Bien">
                    </div>
              </div>   
              <div class="col-md-4">
                    <select class="form-control" name="status">
                      <option value="#">Status</option>
                      <option value="A">Activo</option>
                      <option value="I">Inactivo</option>
                    </select>
                  </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

