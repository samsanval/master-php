/*
Obtener listado de encargos realizados por el cliente Sara
*/
SELECT *
FROM encargos
WHERE cliente_id IN (
    SELECT id
    FROM clientes
    WHERE nombre = 'Sara'
)