INSERT INTO categorias VALUES(null,'Accion');
INSERT INTO categorias VALUES(null,'Rol');
INSERT INTO categorias VALUES(null,'Plataformas');

SELECT *
FROM usuarios;

DESC entradas;

INSERT INTO entradas VALUES(null,1,1,'COD: el fracaso','por qué cod falló',CURDATE());
INSERT INTO entradas VALUES(null,1,2,'Yakuza Like a Dragon','El mejor yakuza',CURDATE());
INSERT INTO entradas VALUES(null,4,3,'Viva Odyssey','Y si no desmientemelo',CURDATE());
INSERT INTO entradas VALUES(null,5,2,'El pesado del Dark Souls','Aun no ha hablado de Lordran',CURDATE());

SELECT *
FROM entradas;