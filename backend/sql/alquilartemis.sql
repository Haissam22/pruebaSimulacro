-- Active: 1685022154787@@127.0.0.1@3306@album
CREATE DATABASE alquilartemis;
USE alquilartemis;
CREATE table constructora(
    id_constructora INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_cons VARCHAR(60) NOT NULL,
    direccion_cons VARCHAR(60) NOT NULL,
    celular_cons VARCHAR(60) NOT NULL
);

CREATE TABLE empleado(
    id_empleado INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nombre_emp VARCHAR(60) NOT NULL,
    cedula INT(11) NOT NULL
);

CREATE TABLE usuarios(
    id_empleado INT NOT NULL,
    usuario VARCHAR(60) NOT NULL,
    password VARCHAR(60) NOT NULL,
    Foreign Key (id_empleado) REFERENCES empleado(id_empleado) 
);

CREATE TABLE cotizacion(
    id_cotizacion INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_constructora INT NOT NULL,
    id_empleado INT NOT NULL,
    fecha VARCHAR(60) NOT NULL,
    Foreign Key (id_constructora) REFERENCES constructora(id_constructora),
    Foreign Key (id_empleado) REFERENCES empleado(id_empleado)
);
CREATE TABLE producto(
    id_producto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL,
    imagen VARCHAR(60) NOT NULL,
    precio INT(11) NOT NULL
);

CREATE TABLE detalleCo(
    id_detalle INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cotizacion INT NOT NULL,
    id_producto INT NOT NULL,
    fecha VARCHAR(60) NOT NULL,
    hora VARCHAR(60) NOT NULL,
    precio VARCHAR(60) NOT NULL,
    duracion INT(11) NOT NULL,
    horaExtra INT(11),
    totalPago INT(11) NOT NULL,
    Foreign Key (id_cotizacion) REFERENCES cotizacion(id_cotizacion),
    Foreign Key (id_producto) REFERENCES producto(id_producto)
)

