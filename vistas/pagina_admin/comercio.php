
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Gestor comercio
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gestor comercio</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

    <div class="col-md-6 col-xs-12">
              
      <!-- =============================================
        ADMINISTRACIÓN DE LOGOTIPO E ICONO
      ============================================= -->
        
        <?php   include "comercio/logotipo.php"; ?>

         <!--=====================================
        ADMINISTRAR COMERCIO
        ====================================== -->
    
        <?php  include "comercio/informacion.php"; ?>
    <!-- <div class="box box-info">
          
        <div class="box-header with-border" >
            
             <h3 class="box-title">INFORMACIÓN DEL COMERCIO</h3>

            <div class="box-tools">
             <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>

                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

        </div>

        <div class="box-body formularioInformacion">
        PASARELA DE PAGO PAYPAL

            <div class="panel panel-default">
                  
                <div class="panel-heading">

                        <h4 class="text-uppercase">Configuración Paypal</h4>

                </div>
                
                  <div class="panel-body">
                  
                    <div class="form-group row">
                      
                       <div class="col-xs-3">
                        
                        <label>Modo:</label>

                         <label class="checkbox">

                              <input class="cambioInformacion" type="radio" value="sandbox" name="modoPaypal">  

                                    Sandbox

                                  </label>
                                    
                                    <label class="checkbox">

                                      <input class="cambioInformacion" type="radio" value="live" name="modoPaypal" checked> 

                                      Live

                                    </label>

                       </div>

                       <div class="col-xs-4">
                        
                              <label for="comment">Cliente:</label>
                  
                              <input type="text" class="form-control cambioInformacion" id="clienteIdPaypal" value="89038">

                            </div>

                          <div class="col-xs-5">

                              <label for="comment">Llave Secreta:</label>
                      
                              <input type="text" class="form-control cambioInformacion" id="llaveSecretaPaypal" value="300">

                          </div>

                    </div>

                  </div>

            </div>

               PASARELA DE PAGO PAYU 

            <div class="panel panel-default">
          
              <div class="panel-heading">

                  <h4 class="text-uppercase">Configuración Payu Latam</h4>

                </div>

                <div class="panel-body">

                  <div class="form-group row">
                  
                      <div class="col-xs-3">

                        <label>Modo:</label>
                    
                           <label class="checkbox"><input class="cambioInformacion" type="radio" value="sandbox" name="modoPayu">  Sandbox</label>
                            <label class="checkbox"><input class="cambioInformacion" type="radio" value="live" name="modoPayu" checked> Live</label>

                      </div>
                  
                      <div class="col-xs-3">
                      
                        <label for="comment">Merchant Id:</label>
                
                        <input type="text" class="form-control cambioInformacion" id="merchantIdPayu" value="3099" >

                      </div>
                  
                      <div class="col-xs-3">

                      <label for="comment">Account Id:</label>
              
                        <input type="text" class="form-control cambioInformacion" id="accountIdPayu" value="30">

                  </div>

                    <div class="col-xs-3">

                        <label for="comment">Api Key:</label>
              
                        <input type="text" class="form-control cambioInformacion" id="apiKeyPayu" value="09">

                      </div>

                  </div>

                </div>

            </div>
          
       </div>

        <div class="box-footer">
              
        <button type="button" id="guardarInformacion" class="btn btn-primary pull-right">Guardar</button>
            
        </div>

    </div>-->
         
      
    </div>


  <div class="col-md-6 col-xs-12">
        
      <!-- =====================================
        ADMINISTRAR CÓDIGOS
        ====================================== -->
    <?php  include "comercio/codigos.php"; ?>
      

              
     
 </div>


 </div>
   
    </section>

  </div>