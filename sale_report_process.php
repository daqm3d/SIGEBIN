<?php
$page_title = 'Reporte por fechas';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
  if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
      $results      = find_sale_by_dates($start_date,$end_date);
    else:
      $session->msg("d", $errors);
      redirect('sales_report.php', false);
    endif;

  } else {
    $session->msg("d", "Select dates");
    redirect('sales_report.php', false);
  }
?>
<!doctype html>
<html lang="en-US">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <title>Reporte de ventas</title>
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
           <h1>Reporte de Bienes Nacionales</h1>
           <strong>Por fecha: <?php if(isset($start_date)){ echo $start_date;}?> a <?php if(isset($end_date)){echo $end_date;}?> </strong>
       </div>
      <table class="table table-border">
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
        </tbody>
      </table>
    </div>
    <div class="form-group" id="exportar">
      <a href="sales_report.php"><button type="submit" name="submit" class="btn btn-primary">Cancelar</button></a>
      <button type="submit"  name="submit" class="btn btn-primary">Exportar a PDF </button>
      <button type="submit"  name="submit" class="btn btn-primary">Exportar a EXCEL </button>
    </div>
  <?php
    else:
        $session->msg("d", "No se encontraron productos en la fechas: $start_date al $end_date");
        redirect('sales_report.php', false);
     endif;
  ?>
</body>
</html>
<?php if(isset($db)) { $db->db_disconnect(); } ?>
