--Listar todas los registros por sucursal
CREATE PROCEDURE SP_L_UNIDAD_01
@SUC_ID INT
AS
BEGIN
	SELECT * FROM TM_UNIDAD
	WHERE
	SUC_ID = @SUC_ID
	AND EST = 1
END


----------------Obtener registro por ID
CREATE PROCEDURE SP_L_UNIDAD_02
@UND_ID INT
AS
BEGIN
	SELECT * FROM TM_UNIDAD
	WHERE
	UND_ID = @UND_ID
	
END

--Eliminar registros
CREATE PROCEDURE SP_D_UNIDAD_01
@UND_ID INT
AS
BEGIN
	UPDATE TM_UNIDAD
	SET
		EST = 0
	WHERE 
		UND_ID = @UND_ID
	
END

--REGISTRAR NUEVO REIGISTRO
CREATE PROCEDURE SP_I_UNIDAD_01
@SUC_ID INT,
@UND_NOM VARCHAR(150)
AS
BEGIN
	INSERT INTO TM_UNIDAD
	(SUC_ID, UND_NOM, FECH_CREA, EST)
	VALUES
	(@SUC_ID, @UND_NOM, GETDATE(), 1)
END



--ACTUALIZAR NUEVO REIGISTRO
CREATE PROCEDURE SP_U_UNIDAD_01
@UND_ID INT,
@SUC_ID INT,
@UND_NOM VARCHAR(150)
AS
BEGIN
	UPDATE  TM_UNIDAD
	SET
		SUC_ID = @SUC_ID,
		UND_NOM = @UND_NOM
	WHERE
		UND_ID = @UND_ID
END