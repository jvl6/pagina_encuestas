CREATE DATABASE bd_encuesta;

USE bd_encuesta;

CREATE TABLE opcionUno(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(200)
);

CREATE TABLE opcionDos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nombre NVARCHAR(200)
);

CREATE TABLE pregunta(
	id INT PRIMARY KEY AUTO_INCREMENT,
    opcionUno_fk INT REFERENCES opcion (id),
    opcionDos_fk INT REFERENCES opcion (id)
);

CREATE TABLE votoUno(
	id INT PRIMARY KEY AUTO_INCREMENT,
    opcionUno_fk INT REFERENCES opcionUno (id),
    voto INT
);

CREATE TABLE votoDos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    opcionDos_fk INT REFERENCES opcionDos (id),
    voto INT
);

DELIMITER //
CREATE PROCEDURE insertarVotoUno(idOpcionUno INT)
BEGIN
	DECLARE existeVotoUno BIT;
    SET existeVotoUno = (SELECT COUNT(*) FROM votoUno WHERE id = idOpcionUno);
    
    IF(existeVotoUno = 0) 
    THEN
		INSERT INTO votoUno VALUES (NULL, idOpcionUno, 1);
	ELSE UPDATE votoUno SET voto = voto + 1 WHERE opcionUno_fk = idOpcionUno;
	END IF;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE insertarVotoDos(idOpcionDos INT)
BEGIN
	DECLARE existeVotoDos BIT;
    SET existeVotoDos = (SELECT COUNT(*) FROM votoDos WHERE id = idOpcionDos);
    
    IF(existeVotoDos = 0) 
    THEN
		INSERT INTO votoDos VALUES (NULL, idOpcionDos, 1);
	ELSE UPDATE votoDos SET voto = voto + 1 WHERE opcionDos_fk = idOpcionDos;
	END IF;
END //
DELIMITER ;

INSERT INTO opcionUno VALUES (NULL, 'Chocolate');
INSERT INTO opcionDos VALUES (NULL, 'Vainilla');

INSERT INTO pregunta VALUES (NULL, 1, 1);

CALL insertarVotoUno (1);
CALL insertarVotoDos (1);