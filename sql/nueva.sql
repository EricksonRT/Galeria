CREATE DATABASE
IF NOT EXISTS db_galeria;
USE db_galeria;

CREATE TABLE usuarios
(
    id_usuario INT NOT NULL
    AUTO_INCREMENT,
nombre_usuario VARCHAR
    (50) NOT NULL,
contrasenia VARCHAR
    (280) NOT NULL,
     PRIMARY KEY
    (id_usuario)
    );

    CREATE TABLE
    (
        id_img INT NOT NULL
        AUTO_INCREMENT,  
    idUsuario INT NOT NULL,                  
    titulo VARCHAR
        (30) NOT NULL,
    contenido_img VARCHAR NOT NULL,
    primary key
        (id_img),
    foreign key
        (idUsuario) references usuarios
        (id_usuario)) ;