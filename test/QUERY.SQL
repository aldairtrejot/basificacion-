SELECT UPPER(tbl_centro_trabajo_hraes.clave_centro_trabajo),
		UPPER (tbl_centro_trabajo_hraes.pais),
		UPPER (tbl_centro_trabajo_hraes.colonia),
		UPPER (tbl_centro_trabajo_hraes.codigo_postal),
		UPPER (tbl_centro_trabajo_hraes.num_exterior),
		UPPER (tbl_centro_trabajo_hraes.num_interior),
		UPPER (tbl_centro_trabajo_hraes.latitud),
		UPPER (tbl_centro_trabajo_hraes.longitud),
		UPPER (CONCAT(cat_region.clave_region,' - ',cat_region.region)),
		UPPER (cat_estatus.estatus),
		UPPER (CONCAT(cat_entidad.clave_entidad, ' - ', cat_entidad.entidad))
FROM tbl_centro_trabajo_hraes
INNER JOIN cat_region
	ON tbl_centro_trabajo_hraes.id_cat_region =
		cat_region.id_cat_region
INNER JOIN cat_estatus
	ON tbl_centro_trabajo_hraes.id_estatus_centro =
		cat_estatus.id_cat_estatus
INNER JOIN cat_entidad
	ON tbl_centro_trabajo_hraes.id_cat_entidad =
		cat_entidad.id_cat_entidad





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
