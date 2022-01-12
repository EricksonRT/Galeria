<?php 
session_start();
require_once "../php/conexion.php";
$usuario= $_POST['usuario'];
$clave= $_POST['clave'];

$sql_consulta="SELECT * FROM usuarios WHERE nombre_usuario=? ";
$consulta = $pdo->prepare($sql_consulta);
$consulta->execute(array($usuario));
$resultado_unico= $consulta->fetch(); 

 if(!$consulta){
     echo 'No existe ese usuario';     die();
}
 if($clave==$resultado_unico['contrasenia'] ){
    //  echo '¡La contraseña es válida!';
   //  var_dump( $clave, $resultado_unico['contrasenia']);
    $_SESSION['usuario']=$usuario ;
    header('Location: ../index.php');
 } else {
   header('Location: ../index.php');
    die();
 }