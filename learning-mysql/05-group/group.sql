SELECT COUNT(titulo) AS num_categorias, categoria_id
FROM entradas
GROUP BY categoria_id;

SELECT COUNT(titulo) AS num_categorias, categoria_id
FROM entradas
GROUP BY categoria_id
HAVING  num_categorias > 1;