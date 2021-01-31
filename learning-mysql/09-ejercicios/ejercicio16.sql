/*
Obtener listado de clientes atendidos por el vendedor Maria Lopez
*/
SELECT *
FROM clientes
WHERE vendedor_id IN (
    SELECT id
    FROM vendedores
    WHERE nombre = 'Maria');
