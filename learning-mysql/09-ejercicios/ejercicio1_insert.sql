INSERT INTO coches values(
    NULL,
    'Renault',
    'Clio',
    13000.00,
    3
);
INSERT INTO coches values(
    NULL,
    'Dacia',
    'Sandero',
    12500.00,
    10
);
INSERT INTO coches values(
    NULL,
    'BMW',
    'M3',
    33000.00,
    1
);
INSERT INTO coches values(
    NULL,
    'Audi',
    'A3',
    21000.00,
    5
);

SELECT * FROM coches;

INSERT INTO grupos values(
    NULL,
    'Grupo Canovas',
    'Murcia'
);
INSERT INTO grupos values(
    NULL,
    'Grupo Automoviles',
    'Valencia'
);
INSERT INTO grupos values(
    NULL,
    'Grupo Automoviles SA',
    'Almeria'
);
SELECT * FROM grupos;

INSERT INTO vendedores values(
    NULL,
    1,
    'Pepe',
    'Canovas',
    'Jefe de Ventas',
    "2020-01-01",
    30000.00,
    12.12,
    NULL
);
INSERT INTO vendedores values(
    NULL,
    1,
    'Pepe',
    'Canovas',
    'Jefe de Ventas',
    "2020-01-01",
    30000.00,
    12.12,
    NULL
);
INSERT INTO vendedores values(
    NULL,
    2,
    'Juan',
    'Sanchez',
    'Sales Manager',
    "2008-01-01",
    40000.00,
    23.00,
    NULL
);
INSERT INTO vendedores values(
    NULL,
    2,
    'Maria',
    'Lopez',
    'Ventas',
    "2020-01-01",
    11000.00,
    02.12,
    'Juan Sanchez'
);
INSERT INTO vendedores values(
    NULL,
    3,
    'Laura',
    'Guillen',
    'Jefe de Ventas',
    "2011-03-01",
    33000.00,
    15.76,
    NULL
);
SELECT * FROM vendedores;

INSERT INTO clientes values(
    NULL,
    1,
    'Samuel',
    'Murcia',
    12000.00
);
INSERT INTO clientes values(
    NULL,
    2,
    'Nacho',
    'Valencia',
    35000.00
);
INSERT INTO clientes values(
    NULL,
    3,
    'Sara',
    'Murcia',
    22000.00
);

SELECT * FROM clientes;

INSERT INTO encargos values(
    NULL,
    3,
    3,
    1,
    "2020-03-01"
);
INSERT INTO encargos values(
    NULL,
    2,
    4,
    1,
    "2020-12-12"
);