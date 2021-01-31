/*
Mostrar listado de clientes (id y nombre)
mostrar el numero de vendedor y su nombre
*/
SELECT clientes.id, clientes.nombre, vendedores.id, vendedores.nombre
FROM clientes, vendedores
WHERE clientes.vendedor_id = vendedores.id;