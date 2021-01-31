/*
CREAR TABLA
*/
CREATE DATABASE blog_masters;
use blog_masters;
CREATE TABLE usuarios (
    id int(11) auto_increment not null,
    nombre varchar(50) not null,
    apellidos varchar(50) null,
    email varchar(50) not null,
    password varchar(50) default 'password',
    CONSTRAINT pk_usuarios PRIMARY KEY(id)
);
DESC usuarios;