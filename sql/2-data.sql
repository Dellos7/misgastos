USE misgastos;
INSERT INTO users ( id, name, last_name, role, email, password )
    VALUES ( '6014288ea6838', 'David', 'López Castellote', 'admin', 'd@d.com', '$2y$10$UE9OdK.2/VuXM8ohAhGA1.0c2FBQ3coI8e2vMrA2SLaQqgHPO4xNG' );

INSERT INTO tipo_gasto (id, nombre) VALUES ('5ece4797eaf5e', 'Alimentación');
INSERT INTO tipo_gasto (id, nombre) VALUES ('601545ab28eb6', 'Hogar');
INSERT INTO tipo_gasto (id, nombre) VALUES ('601545b37a64b', 'Transporte');

INSERT INTO tipo_recurrencia (id, nombre) VALUES ('601545bb7a83d', 'Diaria');
INSERT INTO tipo_recurrencia (id, nombre) VALUES ('601545c2d0453', 'Semanal');
INSERT INTO tipo_recurrencia (id, nombre) VALUES ('601545c9600c5', 'Mensual');
INSERT INTO tipo_recurrencia (id, nombre) VALUES ('601545d16d9b0', 'Anual');

INSERT INTO gasto_concreto (id, nombre, descripcion, coste, fecha, user_id)
    VALUES ( '5ece4797eaf5e', 'Compra Mercadona', 'Lista de la compra', 35, '2021-01-30 16:45:00', '6014288ea6838' );

INSERT INTO gasto_concreto (id, nombre, descripcion, coste, fecha, user_id)
    VALUES ( '60157b36a3801', 'Alquiler', 'Alquiler piso', 400, '2021-02-01 13:00:00', '6014288ea6838' );