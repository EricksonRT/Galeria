<?php
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["archivo"]["name"][$key]) {
			// Nombres de archivos de temporales
			$archivonombre = $_FILES["archivo"]["name"][$key]; 
			$fuente = $_FILES["archivo"]["tmp_name"][$key]; 
			
			$destino = 'Imagenes_subidas/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
			if(!file_exists($destino)){
				mkdir($destino, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
			
			$dir=opendir($destino);
			$target_path = $destino.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
			
	
			if(move_uploaded_file($fuente, $target_path)) {	
				echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
				} else {	
				echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos la conexion con la carpeta destino
		}
	}
?>