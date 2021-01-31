/*
Mostrar los clientes con mayor numero numero de pedidos han hecho y mostrar cuantos pedidos son
*/
SELECT c.nombre, COUNT(e.id) as num_pedidos
FROM clientes c INNER JOIN encargos e ON c.id = e.cliente_id
GROUP BY c.nombre
ORDER BY 2;