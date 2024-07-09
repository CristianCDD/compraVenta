--Listar todas los registros por sucursal
CREATE PROCEDURE SP_L_SUCURSAL_01
@EMP_ID INT
AS
BEGIN
	SELECT * FROM TM_SUCURSAL
	WHERE
	EMP_ID = @EMP_ID
	AND EST = 1
END


----------------Obtener registro por ID
CREATE PROCEDURE SP_L_SUCURSAL_02
@SUC_ID INT
AS
BEGIN
	SELECT * FROM TM_SUCURSAL
	WHERE
	SUC_ID = @SUC_ID
	
END

--Eliminar registros
CREATE PROCEDURE SP_D_SUCURSAL_01
@SUC_ID INT
AS
BEGIN
	UPDATE TM_SUCURSAL
	SET
		EST = 0
	WHERE 
		SUC_ID = @SUC_ID
	
END

--REGISTRAR NUEVO REIGISTRO
CREATE PROCEDURE SP_I_SUCURSAL_01
@EMP_ID INT,
@SUC_NOM VARCHAR(150)
AS
BEGIN
	INSERT INTO TM_SUCURSAL
	(EMP_ID, SUC_NOM, FECH_CREA, EST)
	VALUES
	(@EMP_ID, @SUC_NOM, GETDATE(), 1)
END



--ACTUALIZAR NUEVO REIGISTRO
CREATE PROCEDURE SP_U_SUCURSAL_01
@SUC_ID INT,
@EMP_ID INT,
@SUC_NOM VARCHAR(150)
AS
BEGIN
	UPDATE  TM_SUCURSAL
	SET
		EMP_ID = @EMP_ID,
		SUC_NOM = @SUC_NOM
	WHERE
		SUC_ID = @SUC_ID
END