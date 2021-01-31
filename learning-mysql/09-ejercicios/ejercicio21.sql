/*
Mostras los nombres y ciudades de los clientes que tengan encargos
*/
SELECT nombre, ciudad
FROM clientes
WHERE id IN (SELECT id
            FROM encargos
            WHERE cantidad > 3);