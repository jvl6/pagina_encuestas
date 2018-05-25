CREATE DATABASE bd_encuesta;

USE bd_encuesta;

CREATE TABLE opcion(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(200)
);

CREATE TABLE pregunta(
	id INT PRIMARY KEY AUTO_INCREMENT,
    opcionUno_fk INT REFERENCES opcion (id),
    cantUno INT,
    porcentajeUno FLOAT,
    opcionDos_fk INT REFERENCES opcion (id),
    cantDos INT,
    porcentajeDos FLOAT,
    totalVotos INT
);

DELIMITER //
CREATE PROCEDURE insertarPregunta (opcionUno NVARCHAR(200), opcionDos NVARCHAR(200))
BEGIN
	DECLARE idOpcionUno INT;
    DECLARE idOpcionDos INT;
    DECLARE existeOpcionUno BIT;
    DECLARE existeOpcionDos BIT;
    SET existeOpcionUno = (SELECT COUNT(*) FROM opcion WHERE nombre = opcionUno);
	SET existeOpcionDos = (SELECT COUNT(*) FROM opcion WHERE nombre = opcionDos);
    
    IF(existeOpcionUno = 0) THEN 
		INSERT INTO opcion VALUES (NULL, opcionUno);
    END IF;
    
    IF(existeOpcionDos = 0) THEN 
		INSERT INTO opcion VALUES (NULL, opcionDos);
    END IF;
    
	SET idOpcionUno = (SELECT id FROM opcion WHERE nombre = opcionUno);
	SET idOpcionDos = (SELECT id FROM opcion WHERE nombre = opcionDos);
    
    INSERT INTO pregunta VALUES (NULL, idOpcionUno, 0, 0, idOpcionDos, 0, 0, 0);
END //

DELIMITER //
CREATE TRIGGER calcular BEFORE UPDATE ON pregunta 
FOR EACH ROW
BEGIN
	DECLARE cantUnoC INT;
    DECLARE cantDosC INT;
    DECLARE porcentajeUnoC FLOAT;
    DECLARE porcentajeDosC FLOAT;
	DECLARE totalC INT;
    
	SET cantUnoC = (SELECT NEW.cantUno);
    SET cantDosC = (SELECT NEW.cantDos);
	SET totalC = cantUnoC + cantDosC;
    SET porcentajeUnoC = (cantUnoC * 100) / totalC;
    SET porcentajeDosC = (cantDosC * 100) / totalC;
    
    SET NEW.totalVotos = totalC;
    SET NEW.porcentajeUno = porcentajeUnoC;
    SET NEW.porcentajeDos = porcentajeDosC;
END //
DELIMITER ;

DROP TRIGGER calcular;
DROP TRIGGER actualizar;

DROP DATABASE bd_encuesta;

CALL insertarPregunta ('Chocolate', 'Vainilla');

SELECT * FROM pregunta;

UPDATE pregunta SET cantDos = 1 WHERE id = 1;