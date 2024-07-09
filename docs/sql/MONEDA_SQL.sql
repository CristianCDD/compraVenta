--Listar todas los registros por sucursal
CREATE PROCEDURE SP_L_MONEDA_01
@SUC_ID INT
AS
BEGIN
	SELECT * FROM TM_MONEDA
	WHERE
	SUC_ID = @SUC_ID
	AND EST = 1
END


----------------Obtener registro por ID
CREATE PROCEDURE SP_L_MONEDA_02
@MON_ID INT
AS
BEGIN
	SELECT * FROM TM_MONEDA
	WHERE
	MON_ID = @MON_ID
	
END

--Eliminar registros
CREATE PROCEDURE SP_D_MONEDA_01
@MON_ID INT
AS
BEGIN
	UPDATE TM_MONEDA
	SET
		EST = 0
	WHERE 
		MON_ID = @MON_ID
	
END

--REGISTRAR NUEVO MONEDA
CREATE PROCEDURE SP_I_MONEDA_01
@SUC_ID INT,
@MON_NOM VARCHAR(150)
AS
BEGIN
	INSERT INTO TM_MONEDA
	(SUC_ID, MON_NOM, FECH_CREA, EST)
	VALUES
	(@SUC_ID, @MON_NOM, GETDATE(), 1)
END



--ACTUALIZAR NUEVO MONEDA
CREATE PROCEDURE SP_U_MONEDA_01
@MON_ID INT,
@SUC_ID INT,
@MON_NOM VARCHAR(150)
AS
BEGIN
	UPDATE  TM_MONEDA
	SET
		SUC_ID = @SUC_ID,
		MON_NOM = @MON_NOM
	WHERE
		MON_ID = @MON_ID
END