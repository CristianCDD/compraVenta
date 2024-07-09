--Listar todas los registros por sucursal
CREATE PROCEDURE SP_L_PROVEEDOR_01
@EMP_ID INT
AS
BEGIN
	SELECT * FROM TM_PROVEEDOR
	WHERE
	EMP_ID = @EMP_ID
	AND EST = 1
END


----------------Obtener registro por ID
CREATE PROCEDURE SP_L_PROVEEDOR_02
@PROV_ID INT
AS
BEGIN
	SELECT * FROM TM_PROVEEDOR
	WHERE
	PROV_ID = @PROV_ID
	
END

--Eliminar registros
CREATE PROCEDURE SP_D_PROVEEDOR_01
@PROV_ID INT
AS
BEGIN
	UPDATE TM_PROVEEDOR
	SET
		EST = 0
	WHERE 
		PROV_ID = @PROV_ID
	
END

--REGISTRAR NUEVO REIGISTRO
ALTER PROCEDURE SP_I_PROVEEDOR_01
@EMP_ID INT,
@PROV_NOM VARCHAR(150),
@PROV_RUC INT,
@PROV_TELF VARCHAR(150),
@PROV_DIRECC VARCHAR(150),
@PROV_CORREO INT

AS
BEGIN
	INSERT INTO TM_PROVEEDOR
	(EMP_ID,POV_NOM, PROV_RUC, PROV_TELF, PROV_DIRECC, PROV_CORREO, FECH_CREA, EST)
	VALUES
	(@EMP_ID, @PROV_NOM, @PROV_RUC, @PROV_TELF, @PROV_DIRECC, @PROV_CORREO, GETDATE(), 1)
END




-- ACTUALIZAR REGISTRO EXISTENTE
ALTER PROCEDURE SP_U_PROVEEDOR_01
@PROV_ID INT,  -- Identificador del proveedor a actualizar
@EMP_ID INT,
@PROV_NOM VARCHAR(150),
@PROV_RUC VARCHAR(50),
@PROV_TELF VARCHAR(150),
@PROV_DIRECC VARCHAR(150),
@PROV_CORREO INT
AS
BEGIN
	UPDATE TM_PROVEEDOR
	SET 
		EMP_ID = @EMP_ID,
		PROV_NOM = @PROV_NOM,
		PROV_RUC = @PROV_RUC,
		PROV_TELF = @PROV_TELF,
		PROV_DIRECC = @PROV_DIRECC,
		PROV_CORREO = @PROV_CORREO
	WHERE PROV_ID = @PROV_ID;
END