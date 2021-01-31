/*
Visualizar los nombre de los clientes y la cantidad de encargos realizados
*/

SELECT c.nombre, COUNT(e.cliente_id)
FROM clientes c
LEFT OUTER JOIN encargos e ON c.id = e.cliente_id
GROUP BY(c.nombre);