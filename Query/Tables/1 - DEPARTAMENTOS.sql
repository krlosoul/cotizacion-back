DO $$
BEGIN
IF NOT EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = 'departamentos') THEN
	CREATE TABLE DEPARTAMENTOS
	(
		DEP_CODIGO SERIAL,
		DEP_NOMBRE VARCHAR(100) NOT NULL,
		CONSTRAINT PK_DEPARTAMENTOS PRIMARY KEY(DEP_CODIGO)
	);
	RAISE NOTICE 'SE HA CREADO LA TABLA DEPARTAMENTOS';
END IF;
END $$;