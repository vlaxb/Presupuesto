USE [presama]
GO
/****** Object:  StoredProcedure [dbo].[SP_ESM]    Script Date: 12/10/2017 16:22:28 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[SP_ESM]
(
	@IN_MODALIDAD VARCHAR(30),
	@IN_VIGENCIA INT,
	@IN_FUERZA VARCHAR(100)
)
AS
	SET NOCOUNT ON

	SELECT CODI_ESM, NOM_ESM
	FROM(
			SELECT DISTINCT	S.COD_SATELITE CODI_ESM,
				S.NOMBRE_SATELITE NOM_ESM
			FROM AUDI_ESM_PRESUP E
			INNER JOIN AUDI_SATELITE_PRESUP S
				ON S.COD_ESM = E.CODI_ESM
			WHERE E.TX_FUERZA = @IN_FUERZA
			AND E.TX_MODALIDAD = @IN_MODALIDAD
			AND E.VIGENCIA = @IN_VIGENCIA

		UNION ALL
		
			SELECT DISTINCT(E.CODI_ESM) CODI_ESM,
				E.NOM_ESM NOM_ESM
			FROM AUDI_ESM_PRESUP E	
			WHERE E.TX_FUERZA = @IN_FUERZA
			AND E.TX_MODALIDAD = @IN_MODALIDAD
			AND E.VIGENCIA = @IN_VIGENCIA
		) A
	ORDER BY NOM_ESM;