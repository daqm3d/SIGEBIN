<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('center',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","ID del centro de comando falta.");
    redirect('centers.php');
  }
?>
<?php
  $delete_id = delete_by_id('center',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Centro de Comandos eliminado");
      redirect('centers.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('centers.php');
  }
?>
