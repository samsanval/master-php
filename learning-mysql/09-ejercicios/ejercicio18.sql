/*
Listar clientes que han hecho un encargo de Dacia Sandero
*/
SELECT *
FROM clientes
INNER JOIN encargos ON clientes.id = encargos.cliente_id
INNER JOIN coches ON encargos.coche_id = coches.id
WHERE coches.modelo = 'Audi' AND coches.marca = 'A3';

