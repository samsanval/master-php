CREATE TABLE usuarios(
    id int(255) auto_increment not null,
    nombre varchar(255),
    apellidos varchar(255),
    email varchar(255),
    password varchar(255),
    fecha date not null,
    CONSTRAINT PK_USUARIOS PRIMARY KEY (id),
    CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;
CREATE TABLE categorias(
    id int(255) auto_increment not null,
    nombre text,
    CONSTRAINT PK_CATEGORIAS PRIMARY KEY (id)
)ENGINE=InnoDb;
CREATE TABLE entradas(
    id int(255) auto_increment not null,
    usuario_id int (255),
    categoria_id int(255),
    titulo text,
    description MEDIUMTEXT,
    fecha date not null,
    CONSTRAINT PK_ENTRADAS PRIMARY KEY (id),
    CONSTRAINT FK_USUARIOS_ID FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    CONSTRAINT FK_CATEGORIA_ID FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE

)ENGINE=InnoDb;

DROP TABLE usuarios_masters;
DROP TABLE categorias;
DROP TABLE entradas;
DROP TABLE usuarios;
DESC entradas;
SHOW TABLES;