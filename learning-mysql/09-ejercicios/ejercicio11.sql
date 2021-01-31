/*
Visualizar todos los cargos de los vendedores y su numero
*/
SELECT cargo, COUNT(id)
FROM vendedores
GROUP BY cargo;