/*
Ver las unidades totales vendidas de cada coche a cada cliente
mostrando el nombre del producto, el numero del cliente y la suma de unidades
*/

SELECT CONCAT(c.modelo,' ', c.marca ) AS producto, e.cliente_id, SUM(cantidad) AS unidades_vendidas
FROM coches c INNER JOIN encargos e ON c.id = e.coche_id
GROUP BY producto

SELECT * FROM encargos;