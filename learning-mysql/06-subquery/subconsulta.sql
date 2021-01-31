SELECT nombre
FROM usuarios
WHERE id IN (SELECT usuario_id FROM entradas );

SELECT nombre
FROM usuarios
WHERE id IN (SELECT usuario_id
            FROM entradas
            WHERE titulo LIKE '%COD%');
SELECT *
FROM entradas
WHERE categoria_id IN (SELECT id
                        FROM categorias
                        WHERE nombre = 'Rol');

SELECT usuario_id
FROM entradas
GROUP BY usuario_id
ORDER BY COUNT(usuario_id);
SELECT *
FROM categorias
WHERE id IN (SELECT categoria_id
            FROM entradas
            GROUP BY categoria_id
            HAVING COUNT(categoria_id) =2);

SELECT *
FROM usuarios
WHERE id IN (SELECT usuario_id
            FROM entradas
            WHERE DAYOFWEEK(fecha) = 3);

SELECT nombre
FROM usuarios
WHERE id = (SELECT usuario_id
            FROM entradas
            GROUP BY usuario_id
            ORDER BY COUNT(usuario_id)
            LIMIT 1);