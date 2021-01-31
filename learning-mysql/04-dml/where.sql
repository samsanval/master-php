SELECT *
FROM usuarios
WHERE email = 'samsanchezalvarez@gmail.com';

SELECT *
FROM usuarios
WHERE YEAR(fecha) != 2020 OR !ISNULL(fecha);

SELECT *
FROM usuarios
WHERE nombre LIKE '%o%' AND password='admin';

SELECT *
FROM usuarios
WHERE (YEAR(fecha) % 2 != 0);

SELECT UPPER(nombre)
FROM usuarios
WHERE CHAR_LENGTH(apellidos) >= 5;