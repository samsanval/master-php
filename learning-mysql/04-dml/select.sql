SELECT email,nombre,apellidos FROM usuarios;

SELECT id, email, (id+7) AS suma
FROM usuarios
ORDER BY id DESC;

SELECT id, email, ROUND(id,2) AS suma
FROM usuarios;

SELECT TRIM(CONCAT(nombre,' ',apellidos)) AS nombre_completo, email FROM usuarios;

SELECT nombre, CURDATE()
FROM usuarios;

SELECT nombre, DATEDIFF(fecha,CURDATE())
FROM usuarios;

SELECT nombre, DAYOFMONTH(fecha)
FROM usuarios;

SELECT nombre, SYSDATE()
FROM usuarios;

SELECT nombre, DATE_FORMAT(fecha,'%d-%m-%Y')
FROM usuarios;

SELECT DISTINCT nombre, STRCMP(apellidos,'Sanchez'), VERSION(),  USER()
FROM usuarios;
