CREATE DATABASE bienesraices_crud;


USE bienesraices_crud;
CREATE TABLE vendedor(
    id_vendedor INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_vendedor varchar(45),
    apellido_vendedor varchar(45),
    telefono_vendedor varchar(15)
);


CREATE TABLE propiedades(
    id_propiedades INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titulo_propiedades varchar(45),
    precio_propiedades decimal (10,2),
    imagen_propiedades varchar(200),
    descripcion_propiedades LONGTEXT,
    nhabitaciones_propiedades INT(1),
    banos_habitaciones INT(1),
    estacionamiento_propiedades INT(1),
    creado date,
    id_vendedor INT,
    FOREIGN KEY(id_vendedor) REFERENCES vendedor(id_vendedor)
);

USE bienesraices_crud;
CREATE TABLE usuarios(
    id_usuario INT(1) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    password char(60)
);

use bienesraices_crud;
SELECT * FROM propiedades;
SELECT * FROM vendedor;
SELECT * FROM usuarios;
use bienesraices_crud;
INSERT INTO vendedor (id_vendedor, nombre_vendedor, apellido_vendedor, telefono_vendedor) VALUES (null, 'Stiven', 'Paul', '0985141410');
INSERT INTO vendedor (id_vendedor, nombre_vendedor, apellido_vendedor, telefono_vendedor) VALUES (null, 'Antony', 'Holguin', '0967617518');

