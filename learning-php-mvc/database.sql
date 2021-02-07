CREATE DATABASE php_mvc;

USE php_mvc;

CREATE TABLE usuarios(
    id  int(255) not null auto_increment,
    nombre varchar(100) not null,
    apellidos varchar(100) not null,
    email varchar(100) not null,
    password varchar(100) not null,
    fecha date not null,
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;

CREATE TABLE notas(
    id int(255) not null auto_increment,
    usuario_id int(255) not null,
    titulo varchar(100) not null,
    descripcion MEDIUMTEXT,
    fecha   date not null,
    CONSTRAINT pk_notas PRIMARY KEY(id),
    CONSTRAINT fk_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)
USE php_mvc;
SHOW tables;