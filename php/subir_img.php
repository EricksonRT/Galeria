<?php
require ('../php/conexion.php');
if (($_POST)) {
	$descripcion = $_POST['descripcion'];
		// Nombres de archivos de temporales
			$archivonombre = $_FILES["foto"]["name"]; 
			$fuente = $_FILES["foto"]["tmp_name"]; 
			$destino = './Imagenes_subidas/'; //Declaramos el nombre de la carpeta que guardara los archivos
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

    $ubicacion= './php/Imagenes_subidas/'.$archivonombre;	
     $sqlInsert= 'INSERT INTO imagenes (descripcion, contenido_img) VALUES (?, ?)';
     $sql_listo=$pdo->prepare($sqlInsert);
     $sql_listo->execute(array($descripcion, $ubicacion));
	 
	 header("Location: ../index.php");
	 $sqlInsert= null;
	 $pdo= null;

} 
// var_dump($_FILES, $descripcion);

?>