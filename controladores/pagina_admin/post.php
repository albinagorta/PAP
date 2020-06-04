<?php
require(MODELOS.'web.php');
require(MODELOS.'slide.php'); 

switch($_POST['pro']){
	case 'loginadmin':
		require(MODELOS.'administrador.php');
		$admin = new Administrador();		
		$admin->email = $_POST['user'];
		$admin->pass = $_POST['pass'];
		$admin->revision();
		header('Location: '.URL_DOMINIO_ADMIN);
	break;
 
	case 'notificaciones':
		switch($_POST['op']){
		case 'editar':
				$data=array();				
				$data[$_POST['item']] = 0;
				echo Web::actualizar('notificaciones',$data,1);
		break;
			

		}		
	break;

	case 'administradores':
		switch($_POST['op']){
		case 'estado':
				$data=array();
				$data['estado'] = $_POST['estado'];
				echo Web::actualizar('administradores',$data,$_POST['id']);
				
		break;
		
		case 'eliminar':
				Web::borrar_img('perfiles',$_POST['foto']);
				Web::eliminar('administradores',$_POST['id']);				
		break;			

		case 'edit':
				$data=array();
				if(!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])){
				echo 'datos incorrectos en nombre';exit();
				}
				if(!preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){
				echo 'datos incorrectos en password';exit();	
				}
				if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){
					echo 'datos incorrectos en Email';exit();
				}	
					
				if($_POST['id']==0){
				$rutaperfil=Web::GuardarImgUsuario('perfiles',$_FILES["foto"]);				
				$data['nombre'] = $_POST['nombre'];
				$data['email'] = $_POST['email'];
		$encriptar = crypt($_POST["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$data['password'] = $encriptar;
				$data['perfil'] = $_POST['perfil'];
				$data['foto'] = $rutaperfil;
				echo Web::guardar('administradores',$data);

				}else{
				$rutaperfil=Web::GuardarImgUsuario('perfiles',$_FILES["foto"],$_POST["fotoantigua"]);				
				$data['nombre'] = $_POST['nombre'];
				$data['email'] = $_POST['email'];
				if($_POST["password"] != ""){
		$encriptar = crypt($_POST["password"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				}else{
					$encriptar = $_POST["passwordantigua"];
				}

				$data['password'] = $encriptar;
				$data['perfil'] = $_POST['perfil'];
				$data['foto'] = $rutaperfil;
				echo Web::actualizar('administradores',$data,$_POST['id']);	
			}
					
		break;

		case 'mostrar':
				 $respuesta=Web::consulta('administradores','AND id='.$_POST['id']);
				echo json_encode($respuesta);	
		break;	

		}		
	break;

	case 'empresa':
		switch($_POST['op']){		
		case 'edit':
				if(!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"])){
				echo 'datos incorrectos en nombre';exit();
				}
				if(!preg_match('/^[0-9]+$/', $_POST["telefono"])){
				echo 'datos incorrectos en telefono';exit();	
				}
				if(!preg_match('/^[0-9]+$/', $_POST["celular"])){
				echo 'datos incorrectos en Celular';exit();	
				}
				if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){
					echo 'datos incorrectos en Email';exit();
				}
				if(!preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["direccion"])){
					echo 'datos incorrectos en direccion';exit();
				}

				$data=array();
				$data['nombre'] = $_POST['nombre'];
				$data['direccion'] = $_POST['direccion'];
				$data['celular'] = $_POST['celular'];
				$data['telefono'] = $_POST['telefono'];
				$data['email'] = $_POST['email'];
				echo Web::actualizar('empresa',$data,'1');					
		break;

		case 'mostrar':
				 $respuesta=Web::consulta('empresa','AND id=1');
				echo json_encode($respuesta);	
		break;	

		}		
	break;

	case 'comercio':
		switch($_POST['op']){		
		case 'imagenLogo':		
			$data=array();
			$respuesta=Web::consulta('plantilla');
			$logo=Web::LogoIcono('logo',$_FILES['imagenLogo'],$respuesta['logo']);
			$data['logo'] = $logo;
			echo Web::actualizar('plantilla',$data,'1');			
		break;
		
		case 'imagenIcono':
			$data=array();
			$respuesta=Web::consulta('plantilla');
			$icono=Web::LogoIcono('icono',$_FILES['imagenIcono'],$respuesta['icono']);
			$data['icono'] = $icono;
			echo Web::actualizar('plantilla',$data,'1');		
		break;
		
		case 'informacion':
				$data=array();
				$data['modoPaypal'] = $_POST['modoPaypal'];
				$data['clienteIdPaypal'] = $_POST['clienteIdPaypal'];
				$data['llaveSecretaPaypal'] = $_POST['llaveSecretaPaypal'];
				$data['modoPayu'] = $_POST['modoPayu'];
				$data['merchantIdPayu'] = $_POST['merchantIdPayu'];
				$data['accountIdPayu'] = $_POST['accountIdPayu'];
				$data['apiKeyPayu'] = $_POST['apiKeyPayu'];
				echo Web::actualizar('comercio',$data,'1');		
		break;
		
		case 'codigoscript':
				$data=array();
				$data['apiFacebook'] = $_POST['apiFacebook'];
				$data['pixelFacebook'] = $_POST['pixelFacebook'];
				$data['googleAnalytics'] = $_POST['googleAnalytics'];
				echo Web::actualizar('plantilla',$data,'1');		
		break;	

		}		
	break;

	case 'slide':
		switch($_POST['op']){		
		case 'agregar':	
			$data=array();
			$respuesta=Web::consulta('slide','','max(orden) orden');
			$data['imgFondo'] = $_POST["imgFondo"];
			$data['tipoSlide'] = $_POST["tipoSlide"];
			$data['estiloTextoSlide'] = $_POST["estiloTextoSlide"];
			$data['titulo1'] = $_POST["titulo1"];
			$data['titulo2'] = $_POST["titulo2"];
			$data['titulo3'] = $_POST["titulo3"];
			$data['boton'] = $_POST["boton"];
			$data['url'] = $_POST["url"];
			$data['orden'] = $respuesta['orden']+1;
			echo Web::guardar('slide',$data);			
		break;
		
		case 'cambiarOrden':
			$data=array();
			$data['orden'] = $_POST["orden"];
			echo Web::actualizar('slide',$data,$_POST["idSlide"]);		
		break;
		
		case 'eliminar':	
			if($_POST['imgFondo']!='default/fondo.jpg'){
				Web::borrar_img('slide',$_POST['imgFondo']);
			}
			if($_POST["imgProducto"] != ""){
			Web::borrar_img('slide',$_POST['imgProducto']);
			}

			if(file_exists('../img/slide/slide'.$_POST["idSlide"])){
			rmdir('../img/slide/slide'.$_POST["idSlide"]);
			}
				 
			echo Web::eliminar('slide',$_POST['idSlide']);
		break;

		case 'edit':	
			$data=array();
			// CAMBIAR FONDO 
			if(isset($_FILES["subirFondo"])){
			$fondo=Slide::SlideFondo('slide/',$_FILES["subirFondo"],$_POST["imgFondo"],$_POST["id"]);	
			}else{
			$fondo=Slide::SlideFondo('slide/',null,$_POST["imgFondo"],$_POST["id"]);
			}	
			// CAMBIAR IMAGEN PRODUCTO
			if(isset($_FILES["subirImgProducto"])){
			$producto=Slide::SlideProducto('slide/',$_FILES["subirImgProducto"],$_POST["imgProducto"],$_POST["id"]);
			}else{
			$producto=Slide::SlideProducto('slide/',null,$_POST["imgProducto"],$_POST["id"]);
			} 

			$data['nombre']=$_POST["nombre"];
			$data['tipoSlide']=$_POST["tipoSlide"];
			$data['estiloImgProducto']=$_POST["estiloImgProducto"];
			$data['estiloTextoSlide']=$_POST["estiloTextoSlide"];
			$data['imgFondo']=$fondo;
			$data['imgProducto']=$producto;
			$data['titulo1']=$_POST["titulo1"];
			$data['titulo2']=$_POST["titulo2"];
			$data['titulo3']=$_POST["titulo3"];
			$data['boton']=$_POST["boton"];
			$data['url']=$_POST["url"];
			echo Web::actualizar('slide',$data,$_POST["id"]);	
		break;

		}		
	break;

	case 'producto':
		switch($_POST['op']){		
		case 'estado':	
				$data=array();
				$data['estado'] = $_POST['estado'];
				echo Web::actualizar('productos',$data,$_POST['id']);
		break;

		case 'eliminar':	
			/*ELIMINAR MULTIMEDIA*/
			$borrar = glob("../img/multimedia/".$_POST["rutaCabecera"]."/*");
			foreach($borrar as $file){unlink($file);}
			rmdir("../img/multimedia/".$_POST["rutaCabecera"]);

			/*ELIMINAR FOTO PRINCIPAL*/
			if($_POST["imgPrincipal"] != "" && $_POST["imgPrincipal"] != "default/default.jpg"){

				unlink("../img/productos/".$_POST["imgPrincipal"]);		

			}

			/*ELIMINAR OFERTA*/
			if($_POST["imgOferta"] != ""){unlink("../img/ofertas/".$_POST["imgOferta"]);}

			/*ELIMINAR CABECERA*/
			if($_POST["imgPortada"] != "" && $_POST["imgPortada"] != "default/default.jpg"){
			unlink('../img/cabeceras/'.$_POST["imgPortada"]);
			}

			$respuesta=Web::eliminar('productos',$_POST['idProducto']);			
			echo ($respuesta);

		break;

		case 'titulo':	
			$respuesta=Web::consulta('productos',' AND titulo="'.$_POST['validarProducto'].'" ');
			
			echo json_encode($respuesta);
		break;

		case 'multimedia':
			$respuesta=Web::SubirMultimedia($_FILES["file"],$_POST["ruta"]);
			echo $respuesta;
		break;

		case 'mostrar':
			$respuesta=Web::consulta('productos','AND id='.$_POST["id"]);
			echo json_encode($respuesta);
		break;

		case 'cabecera':
			$respuesta=Web::consulta('cabeceras','AND ruta="'.$_POST["ruta"].'"');
			echo json_encode($respuesta);
		break;

		case 'add':	
				$data=array();
				$data['titulo']=$_POST["tituloProducto"];
				$data['ruta']=$_POST["rutaProducto"];
				$data['tipo']=$_POST["seleccionarTipo"];
				$data['estado']=1;
				$data['detalles'] = $_POST["detalles"];
				$data['url_instalacion'] = $_POST["url_instalacion"];
				$data['url_descarga'] = $_POST["url_descarga"];
				$data['descripcion']=$_POST["descripcionProducto"];
				$data['precio']=$_POST["precio"];
				$data['multimedia']= $_POST["multimedia"];
				if(isset($_FILES["fotoPrincipal"])){
				$fotoPrincipal=Web::P_IMG('default/default.jpg','productos/',$_FILES["fotoPrincipal"],$_POST["rutaProducto"],525,450);
				}else{
					$fotoPrincipal='default/default.jpg';
				}
				
				$data['portada']= $fotoPrincipal;
				if($_POST["selActivarOferta"] == "oferta"){
				$data['oferta']=1;
				$data['precioOferta']= $_POST["precioOferta"];
				$data['descuentoOferta']= $_POST["descuentoOferta"];
				if(isset($_FILES["fotoOferta"])){
				$fotoOferta=Web::P_IMG('','ofertas/',$_FILES["fotoOferta"],$_POST["rutaProducto"],640,430);
				}else{
				$fotoOferta='';	
				}			

				$data['imgOferta']= $fotoOferta;
			   	$data['finOferta']= $_POST["finOferta"];
				}else{
				$data['oferta']=0;
				$data['precioOferta']= 0;
				$data['descuentoOferta']= 0;
				$data['imgOferta']= '';
			   	$data['finOferta']= '';	
				}
				 Web::guardar('productos',$data);
				unset($data);
				$data=array();
				///cabecera
				if(isset($_FILES["fotoPortada"])){
				$fotoPortada=Web::P_IMG('default/default.jpg','cabeceras/',$_FILES["fotoPortada"],$_POST["rutaProducto"],1280,720);	
				}else{
				$fotoPortada='default/default.jpg';
				}

				
				$data['ruta']=$_POST["rutaProducto"];
				$data['titulo']= $_POST["tituloProducto"];				
				$data['descripcion']=$_POST["descripcionProducto"];
				$data['palabrasClaves']=$_POST["pClavesProducto"];
				$data['portada']=$fotoPortada;
				echo Web::guardar('cabeceras',$data);

		break;

		case 'edit':	
				$data=array();

				$traerProductos = Web::consultas("productos",'AND id='.$_POST["idProducto"]);
				if($traerProductos!=null && $traerProductos[0]["multimedia"]!=null){
						foreach ($traerProductos as $key => $value){
						$multimediaBD = json_mostrar($value["multimedia"]);
						$multimediaEditar = json_decode($_POST["multimedia"],true);
						$objectMultimediaBD = array();
						$objectMultimediaEditar = array();
					 foreach($multimediaBD as $key => $value){
						 array_push($objectMultimediaBD, $value["foto"]);
					 }

					 foreach ($multimediaEditar as $key => $value) {
					  array_push($objectMultimediaEditar, $value["foto"]);
					  }

						$borrarFoto = array_diff($objectMultimediaBD, $objectMultimediaEditar);

						foreach ($borrarFoto as $key => $value){
							
							unlink('../img/multimedia/'.$value);
						}

					}
				}				
				/*=============================================
				PREGUNTAMOS SI VIENE OFERTE EN CAMINO
				=============================================*/
				$data['detalles'] = $_POST["detalles"];
				$data['url_instalacion'] = $_POST["url_instalacion"];
				$data['url_descarga'] = $_POST["url_descarga"];
				$data['descripcion']=$_POST["descripcionProducto"];
				$data['precio']=$_POST["precio"];
				if($_POST["multimedia"]!='null' && $_POST["multimedia"]!='[]'){
					$data['multimedia']= $_POST["multimedia"];
				}else{
					$data['multimedia']= ''; 
				}

				if(isset($_FILES["fotoPrincipal"])){
				if($_POST["antiguaFotoPrincipal"] != "" && $_POST["antiguaFotoPrincipal"] !="default/default.jpg"){
					unlink("../img/productos/".$_POST["antiguaFotoPrincipal"]);
				}

				$fotoPrincipal=Web::P_IMG('default/default.jpg','productos/',$_FILES["fotoPrincipal"],$_POST["rutaProducto"],525,450);
				}else{
					if($_POST["antiguaFotoPrincipal"] != ""){
					$fotoPrincipal=$_POST["antiguaFotoPrincipal"];
					}else{
					$fotoPrincipal='default/default.jpg';	
					}
					
				}
				
				$data['portada']= $fotoPrincipal;
				if($_POST["selActivarOferta"] == "oferta"){
				$data['oferta']=1;
				$data['precioOferta']= $_POST["precioOferta"];
				$data['descuentoOferta']= $_POST["descuentoOferta"];

				if(isset($_FILES["fotoOferta"])){
					if($_POST["antiguaFotoOferta"] != ""){
					unlink("../img/ofertas/".$_POST["antiguaFotoOferta"]);
					}	
				$fotoOferta=Web::P_IMG('','ofertas/',$_FILES["fotoOferta"],$_POST["rutaProducto"],640,430);

				}else{
					if($_POST["antiguaFotoOferta"] != ""){
					$fotoOferta=$_POST["antiguaFotoOferta"];
					}else{
					$fotoOferta='';		
					}
				
				}			

				$data['imgOferta']= $fotoOferta;
			   	$data['finOferta']= $_POST["finOferta"];
				}else{
				$data['oferta']=0;
				$data['precioOferta']= 0;
				$data['descuentoOferta']= 0;
				$data['imgOferta']= '';
			   	$data['finOferta']= '';	
				}
				
				Web::actualizar('productos',$data,$_POST["idProducto"]);
				unset($data);
				$data=array();
				///cabecera
				if(isset($_FILES["fotoPortada"])){

				if($_POST["antiguaFotoPortada"] != "" && $_POST["antiguaFotoPortada"] != "default/default.jpg"){
					unlink("../img/cabeceras/".$_POST["antiguaFotoPortada"]);
				}
					
				$fotoPortada=Web::P_IMG('default/default.jpg','cabeceras/',$_FILES["fotoPortada"],$_POST["rutaProducto"],1280,720);	
				}else{

				if($_POST["antiguaFotoPortada"] != ""){
					$fotoPortada=$_POST["antiguaFotoPortada"];
				}else{ $fotoPortada='default/default.jpg';	}

				}			
				$data['descripcion']=$_POST["descripcionProducto"];
				$data['palabrasClaves']=$_POST["pClavesProducto"];
				$data['portada']=$fotoPortada;
				echo Web::actualizar('cabeceras',$data,$_POST["rutaProducto"],'ruta');

		break;
			}

	break;


}

