/*
Mostrar todos los vendedores del grupo 2 ordenados por salario de menor a mayor
*/

SELECT *
FROM vendedores
WHERE grupo_id = 2
ORDER BY sueldo DESC