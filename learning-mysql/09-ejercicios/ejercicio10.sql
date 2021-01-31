/*
10. Visualizar los apellidos de los vendedores, su fecha y su numero de grupo ordenado
por fecha descendente y limitarlo los 4 ultimos
*/
SELECT apellido, fecha_alta, grupo_id
FROM vendedores
ORDER BY fecha_alta DESC
LIMIT 4