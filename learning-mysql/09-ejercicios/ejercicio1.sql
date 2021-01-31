CREATE DATABASE concesionario;

USE concesionario;

CREATE TABLE coches(
    id int not null auto_increment,
    modelo text,
    marca text,
    precio float(2),
    stock integer default 0,
    CONSTRAINT pk_primary PRIMARY KEY(id)
);
USE concesionario;
CREATE TABLE grupos(
    id int not null auto_increment,
    nombre text,
    ciudad text,
    CONSTRAINT pk_primary PRIMARY KEY (id)
);

USE concesionario;
CREATE TABLE vendedores(
    id int not null auto_increment,
    grupo_id int,
    nombre text,
    apellido text,
    cargo text,
    fecha_alta date,
    sueldo float(2),
    comision float(2),
    jefe text,
    CONSTRAINT pk_primary PRIMARY KEY (id),
    CONSTRAINT fk_grupo FOREIGN KEY(grupo_id) REFERENCES grupos(id)

);

USE concesionario;
CREATE TABLE clientes(
    id int not null auto_increment,
    vendedor_id int not null,
    nombre text,
    ciudad text,
    gastado float(2),
    CONSTRAINT pk_primary PRIMARY KEY (id),
    CONSTRAINT fk_vendedor FOREIGN KEY(vendedor_id) REFERENCES vendedores(id)

);
USE concesionario;

DESC clientes;

USE concesionario;
CREATE TABLE encargos(
    id int not null auto_increment,
    cliente_id int not null,
    coche_id int not null,
    cantidad int not null,
    fecha date,
    CONSTRAINT pk_primary PRIMARY KEY (id),
    CONSTRAINT fk_cliente FOREIGN KEY(cliente_id) REFERENCES clientes(id),
    CONSTRAINT fk_coche FOREIGN KEY(coche_id) REFERENCES coches(id)

);