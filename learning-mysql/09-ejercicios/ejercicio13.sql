/*
Media de sueldos de los vendedores por grupo
*/
SELECT AVG(sueldo)
FROM vendedores
GROUP BY grupo_id;