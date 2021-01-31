/*
Mostrar todos los vendedores y el numero de clientes
*/
SELECT v.nombre, COUNT(c.vendedor_id)
FROM vendedores v
LEFT OUTER JOIN clientes c ON c.vendedor_id = v.id
GROUP BY v.nombre;