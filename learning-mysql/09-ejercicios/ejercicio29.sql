/*
Crear una vista llamada vendedores_canovas que incluira todos los vendedores del grupo Grupo Canovas
*/
CREATE VIEW vendedores_canovas AS
SELECT *
FROM vendedores
WHERE grupo_id IN (
    SELECT id
    FROM grupos
    WHERE nombre = 'Grupo Canovas'
);

SELECT * FROM vendedores_canovas;