
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Configuraciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Configuraciones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">



      <form id="formeditar"  method="post">


        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <input type="text" class="form-control input-lg" id='editarNombre'  name="nombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DIRECCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span> 

                <input type="text" class="form-control input-lg" id='editarDireccion' name="direccion" placeholder="Ingresar direccion" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span> 

                <input type="text" class="form-control input-lg" id='editarCelular' name="celular" placeholder="Ingresar celular" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" id='editarTelefono' name="telefono" placeholder="Ingresar telefono" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" id='editarEmail' name="email" placeholder="Ingresar Email"  required >

              </div>
            </div>


            <input type='submit' class='btn btn-primary' value='Guardar'>
            <img src='<?php echo IMG; ?>load.gif' class='load'>
            
            <input type='hidden'  name='pro' value='empresa'>
            <input type='hidden'  name='op' value='edit'>


          </div>

        </div>     

      </form>



    </div>

  </section>

</div>



