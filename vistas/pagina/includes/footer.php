<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid">

	<div class="container">

		<div class="row">
			
			<!--=====================================
			DATOS CONTACTO
			======================================-->

			<div class="col-md-6 col-sm-6 col-xs-12 text-left infoContacto">
				
				<h5>Dudas e inquietudes, contáctenos en:</h5>

				<br>
				
				<h5>
					
					<i class="fa fa-phone-square" aria-hidden="true"></i> (+51) 987 987 987

					<br><br>

					<i class="fa fa-envelope" aria-hidden="true"></i> soporte@boticasac.com

					<br><br>

					<i class="fa fa-map-marker" aria-hidden="true"></i> AV PRIMAVERA 234 - LIMA.

					<br><br>
					LIMA | PERU

				</h5>

				

				<iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.3503160394357!2d-103.36176248507223!3d20.736590586157426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428afe03c93aa3f%3A0xa57edb5427dc271d!2sPaseo%20de%20Las%20Acacias%203265%2C%20Rinconadas%20Tabachines%2C%20Tabachines%2C%2045188%20Zapopan%2C%20Jal.!5e0!3m2!1ses!2smx!4v1573442746479!5m2!1ses!2smx" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


			</div>

			<!--=====================================
			FORMULARIO CONTÁCTENOS
			======================================-->

			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 formContacto">
				
				<h4>RESUELVA SU INQUIETUD</h4>

				<form>

			  		<input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control" placeholder="Escriba su nombre" required> 

			   		<br>
	    	      
   					<input type="email" id="emailContactenos" name="emailContactenos" class="	form-control" placeholder="Escriba su correo electrónico" required>  

   					<br>
	    		     	          
	       			<textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control" placeholder="Escriba su mensaje" rows="5" required></textarea>

	       			<br>
	    	
	       			<input type="submit" value="Enviar" class="btn btn-info pull-right" id="enviar" style="background-color: black">         

				</form>

			</div>
			
		</div>

	</div>

</footer>


<!--=====================================
FINAL
======================================-->

<div class="container-fluid final">
	
	<div class="container">
	
		<div class="row">
			
			<div class="col-sm-6 col-xs-12 text-left text-muted">
				
				<h5 style="color: #fff">&copy; 2020 Todos los derechos reservados. Sitio elaborado por la Compañía</h5>

			</div>

			<div class="col-sm-6 col-xs-12 text-right social">
				
			<ul>

			<?php
				
			$social = Web::consulta('plantilla');

				$jsonRedesSociales = json_mostrar($social["redesSociales"],true);		

				foreach ($jsonRedesSociales as $key => $value) {

					echo '<li>
							<a href="'.$value["url"].'" target="_blank">
								<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
							</a>
						</li>';
				}

			?>

			</ul>

			</div>

		</div>

	</div>

</div>






<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<input type="hidden" value="<?php echo $servidor; ?>" id="rutaOcultaServidor">

<!--=====================================
JAVASCRIPT PERSONALIZADO
======================================-->

<script src="<?php echo $url; ?>js/pagina/cabezote.js"></script>
<script src="<?php echo $url; ?>js/pagina/plantilla.js"></script>
<script src="<?php echo $url; ?>js/pagina/slide.js"></script>
<script src="<?php echo $url; ?>js/pagina/buscador.js"></script>
<script src="<?php echo $url; ?>js/pagina/infoproducto.js"></script>
<script src="<?php echo $url; ?>js/pagina/usuarios.js"></script>
<script src="<?php echo $url; ?>js/pagina/registroFacebook.js"></script>
<script src="<?php echo $url; ?>js/pagina/carrito-de-compras.js"></script>
<script src="<?php echo $url; ?>js/pagina/visitas.js"></script>

<!--=====================================
https://developers.facebook.com/
======================================-->

<?php echo $plantilla["apiFacebook"]; ?>

	<!--=====================================
	GOOGLE ANALYTICS
	======================================-->

	<?php echo $plantilla["googleAnalytics"]; ?>
</body>
</html>