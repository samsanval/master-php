/*
Obtener los vendedores con dos o más clientes
*/
SELECT *
FROM vendedores
WHERE id IN (SELECT vendedor_id
            FROM clientes
            GROUP BY vendedor_id
            HAVING COUNT(clientes.id) >=2 )