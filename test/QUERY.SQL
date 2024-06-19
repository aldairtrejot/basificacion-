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