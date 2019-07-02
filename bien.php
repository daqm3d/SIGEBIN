<?php
  $page_title = 'Lista de Inventario por Centro de Comando';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
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
          <span>Consultar Nro. de Bien</span>
       </strong>
      </div>
<div class="form">                                   
    <form class="form" action="bien.php" method="POST" autocomplete="off">
                <input type="text" name="palabra" placeholder="Escriba Numero de Bien" id="textfield" class="form-control" maxlength="10" required="">
                <input type="submit" value="Buscar" id="id_buscar" class="btn btn-primary">
	</form>
	<?php
		if(isset($_POST['palabra'])){
                        include_once ('includes/conexion.php');
			include_once ('includes/buscar.php');
		}
	?></div>

<?php include_once('layouts/footer.php'); ?>
