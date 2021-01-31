/*
Seleccionar el grupo con el vendedor con más salario y mostrar su nombre
*/
SELECT g.nombre
FROM grupos g
INNER JOIN vendedores v ON v.grupo_id = g.id
ORDER BY v.sueldo
LIMIT 1