<?php
  $page_title = 'Editar Centro de Comando';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $categorie = find_by_id('center',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","No se ecuentra centro de comando.");
    redirect('centers.php');
  }
?>

<?php
if(isset($_POST['edit_center'])){
  $req_field = array('center-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['center-name']));
  if(empty($errors)){
        $sql = "UPDATE center SET commands='{$cat_name}'";
       $sql .= " WHERE id='{$categorie['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Centro de Comando actualizada con éxito.");
       redirect('centers.php',false);
     } else {
       $session->msg("d", "Lo siento, actualización falló.");
       redirect('centers.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('centers.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editando <?php echo remove_junk(ucfirst($categorie['commands']));?></span>
        </strong>
       </div>
       <div class="panel-body">
       <form method="post" action="edit_center.php?id=<?php echo (int)$categorie['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="center-name" value="<?php echo remove_junk(ucfirst($categorie['commands']));?>">
           </div>
           <button type="submit" name="edit_center" class="btn btn-primary">Actualizar categoría</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>
