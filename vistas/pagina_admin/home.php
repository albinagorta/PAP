<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="<?php echo URL_DOMINIO_ADMIN; ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>

    </ol>

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
    
    <!-- row -->
    <div class="row">

      <!--=====================================
      CAJAS SUPERIORES
      ======================================-->
        <?php include 'inicio/cajas-superiores.php'; ?>


        </div>
        <!-- row -->

        <!-- row -->
        <div class="row">

          <div class="col-lg-6">
             
       
       <!--=====================================
            GRÁFICO DE VENTAS
        ======================================-->
           <?php include 'inicio/grafico-ventas.php'; ?>


        <!--=====================================
        PRODUCTOS MÁS VENDIDOS
        ======================================-->
          <?php include 'inicio/productos-mas-vendidos.php'; ?>

                        
        </div>

     


        
        <div class="col-lg-6">
         
              <!--=====================================
                GRÁFICO DE VISITAS
              ======================================-->
              <?php include 'inicio/grafico-visitas.php'; ?>

                <!--=====================================
                  ÚLTIMOS USUARIOS
                  ======================================-->

                 <?php include 'inicio/ultimos-usuarios.php'; ?>

          </div>   

       <div class="col-lg-12">

        <!--=====================================
          PRODUCTOS RECIENTES
          ======================================-->
      <?php include 'inicio/productos-recientes.php'; ?>


      </div>

    </div>
    <!-- row -->

 </section>
  <!-- content -->

</div>
<!-- content-wrapper -->

  