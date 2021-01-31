/*
Subir precio de los coches en un 2%
*/
UPDATE coches
SET precio = precio+(precio*0.02);

SELECT * FROM coches;