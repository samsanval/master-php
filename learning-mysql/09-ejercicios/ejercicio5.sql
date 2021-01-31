/*
Mostrar los vendedores y sus dias trabajados en el concesionario
*/

SELECT nombre, DATEDIFF(CURDATE(),fecha_alta)
FROM vendedores;