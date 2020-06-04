<!--=====================================
USUARIOS
======================================-->	
<!-- user-menu -->
<li class="dropdown user user-menu">

	<!-- dropdown-toggleGG -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
		<?php

		if($_SESSION["USER_FOTO"] == ""){

			echo '<img src="'.IMG.'perfiles/default/anonymous.png" class="user-image" alt="User Image">';

		}else{

			echo '<img src="'.IMG.'perfiles/'.$_SESSION["USER_FOTO"].'" class="user-image" alt="User Image">';

		}


		?>	
		
		<span class="hidden-xs"><?php echo $_SESSION["USER_NOMBRE"]; ?></span>
	
	</a>
	<!-- dropdown-toggle -->

	<!-- dropdown-menu -->
	<ul class="dropdown-menu">

		<li class="user-header">
		
			<?php

			if($_SESSION["USER_FOTO"] == ""){

				echo '<img src="'.IMG.'perfiles/default/anonymous.png" class="user-image" alt="User Image">';

			}else{

				echo '<img src="'.IMG.'perfiles/'.$_SESSION["USER_FOTO"].'" class="user-image" alt="User Image">';

			}


			?>	

			<p>
			<?php echo $_SESSION["USER_NOMBRE"]; ?>
			<h4 style="color:white"><?php echo $_SESSION["USER_PERFIL"]; ?></h4>
			</p>
		
		</li>

		<li class="user-footer">
	
			
			<div class="pull-right">
			
				<a href="<?php echo URL_DOMINIO_ADMIN; ?>salir.php" class="btn btn-default btn-flat">Salir</a>
			
			</div>
		</li>

	</ul>
	<!-- dropdown-menu -->

</li>
<!-- user-menu -->