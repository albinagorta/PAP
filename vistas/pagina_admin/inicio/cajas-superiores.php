<?php

$ventas = Web::consulta('ventas','','SUM(pago) total');

$visitas =Web::consulta('visitaspaises','','SUM(cantidad) as total');

$usuarios = Web::consultas('usuarios','ORDER BY id DESC');
$totalUsuarios = count($usuarios);

$productos = Web::consultas('productos','ORDER BY id DESC');
$totalProductos = count($productos);

?>

<!--=====================================
CAJAS SUPERIORES
======================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">

  <!-- small box -->
  <div class="small-box bg-aqua">
    
    <!-- inner -->
    <div class="inner">
      
      <h3>$<?php echo number_format($ventas["total"]); ?></h3>

      <p>Ventas</p>
    
    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">
    
      <i class="ion ion-bag"></i>
    
    </div>
    <!-- icon -->
    
    <a href="<?php echo URL_DOMINIO_ADMIN; ?>ventas" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small-box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-green">

    <!-- inner -->
    <div class="inner">
      
      <h3><?php echo number_format($visitas["total"]); ?></h3>

      <p>Visitas</p>
    
    </div>
    <!-- inner -->
    
    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-stats-bars"></i>
    
    </div>
    <!-- icon -->

    <a href="<?php echo URL_DOMINIO_ADMIN; ?>visitas" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-yellow">
    
    <!-- inner -->
    <div class="inner">
    
      <h3><?php echo number_format($totalUsuarios); ?></h3>

      <p>Usuarios</p>
    
    </div>
    <!-- inner -->

    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-person-add"></i>
    
    </div>
    <!-- icon -->

    <a href="<?php echo URL_DOMINIO_ADMIN; ?>usuarios" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->

<!--===========================================================================-->

<!-- col -->
<div class="col-lg-3 col-xs-6">
  
  <!-- small box -->
  <div class="small-box bg-red">
  
    <!-- inner -->
    <div class="inner">
    
      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Productos</p>

    </div>
    <!-- inner -->
    
    <!-- icon -->
    <div class="icon">
      
      <i class="ion ion-pie-graph"></i>
    
    </div>
    <!-- icon -->
    
    <a href="<?php echo URL_DOMINIO_ADMIN; ?>productos" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>
  <!-- small box -->

</div>
<!-- col -->
