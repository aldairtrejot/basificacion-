--	TABLE ASISTENT

DROP TABLE IF EXISTS asistencia_bas;
CREATE TABLE IF NOT EXISTS asistencia_bas(
	id_asistencia_bas SERIAL PRIMARY KEY,
	fecha TIMESTAMP,
	id_tbl_empleados_hraes INTEGER
)