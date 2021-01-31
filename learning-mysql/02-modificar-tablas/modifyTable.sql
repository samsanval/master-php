ALTER TABLE usuarios_masters
CHANGE apellidos apellido varchar(10) null;

ALTER TABLE usuarios_masters
MODIFY apellido varchar(50);

#Añadir columna
ALTER TABLE usuarios_masters
ADD COLUMN website varchar(100) not null;

#Añadir restriction
ALTER TABLE usuarios_masters
ADD CONSTRAINT unique_email UNIQUE(email);
DESC usuarios_masters;

#Borrar columna
ALTER TABLE usuarios_masters
DROP website;
DESC usuarios_masters;
