/*
Visualizar nombres y apellidos en una columna, la fecha de alta y el dia de la semana
*/
SELECT CONCAT(nombre,' ',apellido) AS nombre_completo, fecha_alta, DAY(fecha_alta) AS dia
FROM vendedores;