<?php
/* Conectar a una base de datos de MySQL invocando al controlador */
$url = 'mysql:dbname=db_galeria;host=localhost';
$usuario = 'root';
$contraseña = '';

try {
    $pdo = new PDO($url, $usuario, $contraseña);
    // echo "Conected";
} 
catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}