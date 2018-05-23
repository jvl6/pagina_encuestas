CREATE DATABASE bd_encuesta;

USE bd_encuesta;

CREATE TABLE opcionUno(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(200),
    votos INT
);

CREATE TABLE opcionDos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(200),
    votos INT
);

CREATE TABLE pregunta(
	id INT PRIMARY KEY AUTO_INCREMENT,
    opcionUno_fk INT REFERENCES opcionUno (id),
    opcionDos_fk INT REFERENCES opcionDos (id)
);

DELIMITER //
CREATE FUNCTION estadisticaUno (pregunta INT) RETURNS FLOAT
BEGIN
	DECLARE porcentajeUno FLOAT;
    
    DECLARE fk_opcionUno INT;
    DECLARE fk_opcionDos INT;
    
	DECLARE cantUno INT;
    DECLARE cantDos INT;
    DECLARE total INT;
    
	SET fk_opcionUno = (SELECT opcionUno_fk FROM pregunta WHERE id = pregunta);
    SET fk_opcionDos = (SELECT opcionDos_fk FROM pregunta WHERE id = pregunta);
    
    SET cantUno = (SELECT votos FROM opcion WHERE id = opcionUno_fk);
    SET cantDos = (SELECT votos FROM opcion WHERE id = opcionDos_fk);
    
	SET total = (cantUno + cantDos);
    SET porcentajeUno = (cantUno * 100) / total;
    
    RETURN porcentajeUno;
END //
DELIMITER ;

DELIMITER //
CREATE FUNCTION estadisticaDos (pregunta INT) RETURNS FLOAT
BEGIN
	DECLARE porcentajeDos FLOAT;
    
    DECLARE fk_opcionUno INT;
    DECLARE fk_opcionDos INT;
    
	DECLARE cantUno INT;
    DECLARE cantDos INT;
    DECLARE total INT;
    
	SET fk_opcionUno = (SELECT opcionUno_fk FROM pregunta WHERE id = pregunta);
    SET fk_opcionDos = (SELECT opcionDos_fk FROM pregunta WHERE id = pregunta);
    
    SET cantUno = (SELECT votos FROM opcion WHERE id = opcionUno_fk);
    SET cantDos = (SELECT votos FROM opcion WHERE id = opcionDos_fk);
    
	SET total = (cantUno + cantDos);
    SET porcentajeDos = (cantUno * 100) / total;
    
    RETURN porcentajeDos;
END //
DELIMITER ;