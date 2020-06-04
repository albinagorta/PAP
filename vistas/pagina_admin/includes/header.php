 <!-- main-header -->
 <header class="main-header">
<?php $plantilla=Web::consulta('plantilla'); ?>
  <!-- logo -->
    <a href="<?php echo URL_DOMINIO_ADMIN; ?>" class="logo">
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo IMG.$plantilla['icono']; ?>" class="img-responsive" style="padding:10px; filter:contrast(200%);"></span>
      <!-- logo for regular state and mobile devices -->    
      <span class="logo-lg"><img src="<?php echo IMG.$plantilla['logo']; ?>" class="img-responsive" style="padding:10px 30px; filter:contrast(200%);"></span>
    
    </a>
    <!-- logo -->

     <!-- navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
    
     <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

    <!-- navbar-custom-menu -->
      <div class="navbar-custom-menu"> 

        <ul class="nav navbar-nav">
      
        <!--=====================================
          NOTIFICACIONES
          ======================================-->

          <?php include 'cabezote/notificaciones.php'; ?>

  
          <!--=====================================
            USUARIO
            ======================================--> 
           <?php include 'cabezote/usuarios.php'; ?> 
          
        </ul>

      </div>
    <!-- navbar-custom-menu -->

    </nav>
    <!-- navbar -->

 </header>
 <!-- main-header -->



    <!--=====================================
      MENU
      ======================================-->	
      <!-- main-sidebar -->
      <aside class="main-sidebar">

      <!-- sidebar -->
      <section class="sidebar">

        <ul class="sidebar-menu">
          
         <?php include 'cabezote/menu.php'; ?> 

        </ul> 

    </section>
    <!-- /.sidebar -->

</aside>
<!-- main-sidebar -->

