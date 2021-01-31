SELECT e.titulo, u.nombre AS usuario, c.nombre
FROM entradas e, usuarios u, categorias c
WHERE e.usuario_id = u.id AND e.categoria_id = c.id;

SELECT c.nombre, COUNT(e.categoria_id)
FROM categorias c, entradas e
WHERE c.id = e.categoria_id
GROUP BY c.nombre;

SELECT u.email, COUNT(e.usuario_id)
FROM usuarios u, entradas e
WHERE u.id = e.usuario_id
GROUP BY u.email;

CREATE VIEW entradas_usuarios AS
SELECT u.nombre, e.titulo
FROM usuarios u
LEFT JOIN entradas e ON u.id = e.usuario_id;

SELECT * FROM entradas_usuarios;

DROP VIEW entradas_usuarios;