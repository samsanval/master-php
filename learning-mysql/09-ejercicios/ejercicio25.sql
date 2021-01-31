/*
Obtener listado de nombres de clientes con el importe de sus encargos acumulado
*/

SELECT nombre, SUM(gastado)
FROM clientes
GROUP BY id;