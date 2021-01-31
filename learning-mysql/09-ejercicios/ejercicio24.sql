/*
Lista encargos con nombre del coche, nombre del cliente y nombre de la ciudad del cliente
cuando sean de Murcia
*/
SELECT co.modelo, c.nombre, c.ciudad
FROM encargos e
INNER JOIN coches co ON e.coche_id = co.id
INNER JOIN clientes c ON e.cliente_id = c.id
WHERE c.ciudad = 'Murcia';