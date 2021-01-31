DESC usuarios;
INSERT INTO usuarios VALUES(null,'Samuel','Sanchez','samsanchezalvarez@gmail.com','admin','2021-01-26');
INSERT INTO usuarios VALUES(null,'Pedro','Sanchez','pedro@gmail.com','admin','2021-01-26');
INSERT INTO usuarios VALUES(null,'Juan','Alvarez','juan@gmail.com','admin','2021-01-26');
INSERT INTO usuarios VALUES(null,'Pepe','Canovas','pep@gmail.com','admin','2021-01-26');

SELECT * FROM usuarios;

INSERT INTO usuarios(email,password,fecha)
VALUES('polo@gmail.com','admin','2021-01-26');