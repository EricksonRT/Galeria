<?php 
require_once ('../php/conexion.php');


$id= $_POST['img_id'];

    //Lectura de lo que contiene la base
    $sql_leer='SELECT id_img, contenido_img FROM imagenes where id_img=?';
    $gsent=$pdo->prepare($sql_leer);
    $gsent->execute(array($id));
    $lectura=$gsent->fetchAll();
    // hacemos un foreach para poder ver los datos del objeto, y crear una varibable para la ruta de la imagen, para luego borrarla del directorio con unlink.
            foreach ($lectura as $foto ) {
                $ruta=$foto['contenido_img'];
                   unlink('.'.$ruta); 
            }
            
        $delete='DELETE FROM imagenes WHERE id_img=?';
        $execute=$pdo->prepare($delete);
        $execute->execute(array($id));

$delete=null;
$pdo=null;