
<div class="content-wrapper">
  
   <section class="content-header">
      
    <h1>
      Gestor ventas
    </h1>

    <ol class="breadcrumb">

      <li><a href="<?php echo URL_DOMINIO_ADMIN; ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor ventas</li>
      
    </ol>

  </section>


  <section class="content">

    <div class="box"> 

      <div class="box-header with-border">
        
        <!--=====================================
          GRÁFICO DE VENTAS
          ======================================-->
         <?php

        include "inicio/grafico-ventas.php";

        ?>

      </div>

      <div class="box-body">

        <div class="box-tools">

          <a href="<?php echo URL_DOMINIO_ADMIN; ?>?pro=excel&reporte=ventas">
             <button class="btn btn-success">Descargar reporte en Excel</button>

          </a>

        </div>

        <br>
        
        <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
        
          <thead>
            
            <tr>
              
              <th style="width:10px">#</th>
              <th>Producto</th>
              <th>P. Imagen</th>
              <th>Cliente</th>
              <th>F. Cliente</th>
              <th>Venta</th>
              <th>Tipo</th>  
              <th>Proceso</th>         
              <th>Metodo</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>País</th>
              <th>Fecha</th>

            </tr>

          </thead> 


        </table>


      </div>

    </div>

  </section>

</div>