
CREATE DATABASE
IF NOT EXISTS db_galeria;
USE db_galeria;
CREATE TABLE
IF NOT EXISTS usuarios
(
id_usuario INT UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
nombre_usuario VARCHAR
(80) NOT NULL,
contrasenia VARCHAR
(280) NOT NULL
);

-- datos usuarios


INSERT INTO usuarios
    (
    nombre_usuario,
    contrasenia)
VALUES
    ('admin', 'admin');
-- 


CREATE TABLE
IF NOT EXISTS imagenes
(
id_img INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
descripcion VARCHAR
(90) NOT NULL,
contenido_img VARCHAR
(90) NOT NULL
);
