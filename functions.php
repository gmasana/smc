<?php
	function print_r_pre($value) {
		echo '<pre>';
        print_r($value);
        echo  '</pre>';
	}
	function echo_pre($value) {
		echo '<pre>';
        echo ($value);
        echo  '</pre>';
	}
	function cargarPagina($pagina){
		$modulo = $pagina . ".php"; 
		
		//file_exists también chequea si un directorio existe
		if(file_exists($modulo)) {
		   require_once($modulo);
		} else {
			require_once("404.php");
		}
		   
	}
    function mostrarMensaje($cod){
        $mensaje = "";
        switch ($cod) {
			case '0x001':
				$mensaje = "El nombre ingresado no es válido";
			break;
			
			case '0x002':
				$mensaje = "El e-mail ingresado no es válido";
			break;

			case '0x003':
				$mensaje = "El mensaje ingresado no es válido";
			break;

			case '0x004':
				$mensaje = "Su consulta ha sido enviada... muchas gracias!";
			break;

			case '0x005':
				$mensaje = "Ocurrio un error, intente de nuevo";
			break;		
			case '0x006':
				$mensaje = "Seleccione el tipo de riesgo";
			break;					
		}
		return "<p class='rta rta-".$cod."'>".$mensaje."</p>";
	}
	
	function mostrarProductos(){
		if(file_exists("listadoProductos.csv")){
			/* Manera 1 - Clásica */
			$puntero = fopen("listadoProductos.csv","r");
			$fila = 1;
			
			while (($datos = fgetcsv($puntero,1000)) !== FALSE) {//mientras no sea idéntico a false que siga buscando registros en el archivo 
				
				//$numero = count($datos);
				//echo "<p> $numero de campos en la línea $fila: <br></p>\n";
				//$fila++;
				//for ($c=0; $c < $numero; $c++) {
				//	echo $datos[$c] . "<br />\n";
				//}
				?> <!-- Buena tecnica al revés para incluir html dentro de una funcion y no volverse loco con las concatenaciones -->
				<div class="product-grid">
					<div class="content_box">
						<a href="./?page=producto">
							<div class="left-grid-view grid-view-left">
								<img src="images/productos/<?= $datos[0]?>.jpg" class="img-responsive watch-right" alt="<?= $datos[4]?> - <?= $datos[1]?>"/>
							</div>
						</a>
						<h4><a href="#"> <?= $datos[4]?> - <?= $datos[1]?></a></h4>
						<p>Presentacion: <?= $datos[5]?> - Stock: <?= $datos[3]?></p>
						<span><strong>$<?= $datos[2]?></strong></span>
					</div>
				</div>
				<?php
			}
			
			
		}
	}
	
	//function validarNombre($nombre){
	//	if(empty($nombre))||strlen($nombre)<3||is_numeric($nombre)||is_numeric($nombre[0])){
	//		return false;
	//	}
	//	return true;
	//}
	//function validarApellido($apellido){
	//	if(empty($apellido))||strlen($apellido)<3||is_numeric($apellido)||is_numeric($apellido[0]){
	//		return false;
	//	}
	//	return true;
	//}
	//function crearUsuario($nombre,$apellido,$email,$pass,$repass){
	//	validarNombre($nombre);
	//	validarApellido($apellido);
	//	validadEmail($email);//falta
	//	validadPass($pass,$repass);//falta
	//}
?>