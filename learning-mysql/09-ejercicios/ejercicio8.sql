/*
Visualizar coches cuya marca contenga la letra a y empiece por R
*/
SELECT *
FROM coches
WHERE marca LIKE '%a%' AND marca LIKE 'S%'