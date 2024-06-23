-----------------------------
-----------------------------
-----------------------------

UPDATE cat_estatus_bas
SET 
	nombre = 'CONCLUIDO'
WHERE 
	id_cat_estatus_bas = 1;
	
UPDATE cat_estatus_bas
SET 
	nombre = 'RECHAZADO'
WHERE 
	id_cat_estatus_bas = 2;
	
INSERT INTO cat_estatus_bas (nombre) VALUES ('INICIO');


DROP TABLE IF EXISTS cat_test_bas;
CREATE TABLE IF NOT EXISTS cat_test_bas (
	id_cat_test_bas SERIAL PRIMARY KEY,
	nombre VARCHAR(20)
);

INSERT INTO cat_test_bas (nombre) VALUES ('PSICOMETRICO');

DROP TABLE IF EXISTS cat_estatus_test;
CREATE TABLE IF NOT EXISTS cat_estatus_test (
	id_cat_estatus_test SERIAL PRIMARY KEY,
	nombre VARCHAR(20)
);

INSERT INTO cat_estatus_test (nombre) VALUES ('APROBADO'), ('NO APROBADO');

DROP TABLE IF EXISTS ctrl_test_bas;
CREATE TABLE IF NOT EXISTS ctrl_test_bas(
	id_ctrl_test_bas SERIAL PRIMARY KEY,
	id_cat_estatus_test INTEGER,
	id_cat_test_bas INTEGER,
	id_tbl_empleados_hraes INTEGER
);






-----------------------------
-----------------------------
-----------------------------
-----------------------------
-----------------------------




DROP TABLE IF EXISTS cat_asistencia_bas;
CREATE TABLE IF NOT EXISTS cat_asistencia_bas (
	id_cat_asistencia_bas SERIAL PRIMARY KEY,
	nombre VARCHAR(40)
);

INSERT INTO cat_asistencia_bas (nombre) VALUES ('ASISTENCIA'), ('ASISTENCIA (ENTREGA DOCUMENTOS)');

DROP TABLE IF EXISTS cat_estatus_bas;
CREATE TABLE IF NOT EXISTS cat_estatus_bas(
	id_cat_estatus_bas SERIAL PRIMARY KEY,
	nombre VARCHAR(49)
);

INSERT INTO cat_estatus_bas (nombre) VALUES ('ACEPTDADO'), ('RECHAZADO');

DROP TABLE IF EXISTS ctrl_asistencia_bas;
CREATE TABLE IF NOT EXISTS ctrl_asistencia_bas(
	id_ctrl_asistencia_bas SERIAL PRIMARY KEY,
	fecha DATE,
	hora TIME,
	observaciones VARCHAR(150),
	id_tbl_empleados_hraes INTEGER,
	id_cat_asistencia_bas INTEGER,
	id_cat_estatus_bas INTEGER
);
