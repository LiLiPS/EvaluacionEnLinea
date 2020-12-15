CREATE DATABASE Examen;
USE Examen;

CREATE TABLE Maestro (
	id_maestro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido_paterno VARCHAR(30) NOT NULL,
	apellido_materno VARCHAR(30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Alumno (
	id_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_usuario INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido_paterno VARCHAR(30) NOT NULL,
	apellido_materno VARCHAR(30),
	no_control INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Alumno_maestro (
	id_alumno_maestro INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_alumno INT NOT NULL,
	id_maestro INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Grupo (
	id_grupo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50),
	id_maestro INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Alumno_grupo (
	id_alumno_grupo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_alumno INT NOT NULL,
	id_grupo INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Usuario (
	id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario VARCHAR(20) NOT NULL,
	contrasenia VARCHAR(50) NOT NULL,
	id_rol INT DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Rol (
	id_rol INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre_rol VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Examen (
	id_examen INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Examen_alumno(
	id_examen_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_alumno INT NOT NULL,
	id_examen INT NOT NULL,
	fecha datetime,
	resultado TINYINT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Examen_grupo(
	id_examen_grupo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_examen INT NOT NULL,
	id_grupo INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Pregunta(
	id_pregunta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_examen INT NOT NULL,
	pregunta VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Palabras_clave(
	id_palabras_clave INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_pregunta INT NOT NULL,
	palabras_clave VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Respuesta_alumno(
	id_respuesta_alumno INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_examen INT NOT NULL,
	id_pregunta INT NOT NULL,
	id_alumno INT NOT NULL,
	respuesta VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Maestro ADD CONSTRAINT fk_maestro_usuario FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE;
ALTER TABLE Alumno ADD CONSTRAINT fk_alumno_usuario FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE;
ALTER TABLE Usuario ADD CONSTRAINT fk_usuario_rol FOREIGN KEY (id_rol) REFERENCES Rol(id_rol) ON DELETE CASCADE;

ALTER TABLE Alumno_maestro ADD CONSTRAINT fk_alumnoMaestro_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno) ON DELETE CASCADE;
ALTER TABLE Alumno_maestro ADD CONSTRAINT fk_alumnoMaestro_maestro FOREIGN KEY (id_maestro) REFERENCES Maestro(id_maestro) ON DELETE CASCADE;

ALTER TABLE Grupo ADD CONSTRAINT fk_grupo_maestro FOREIGN KEY (id_maestro) REFERENCES Maestro(id_maestro) ON DELETE CASCADE;

ALTER TABLE Alumno_grupo ADD CONSTRAINT fk_alumnoGrupo_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno) ON DELETE CASCADE;
ALTER TABLE Alumno_grupo ADD CONSTRAINT fk_alumnoGrupo_grupo FOREIGN KEY (id_grupo) REFERENCES Grupo(id_grupo) ON DELETE CASCADE;

ALTER TABLE Examen_alumno ADD CONSTRAINT fk_examenAlumno_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno) ON DELETE CASCADE;
ALTER TABLE Examen_alumno ADD CONSTRAINT fk_examenAlumno_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen) ON DELETE CASCADE;

ALTER TABLE Examen_grupo ADD CONSTRAINT fk_examenGrupo_grupo FOREIGN KEY (id_grupo) REFERENCES Grupo(id_grupo) ON DELETE CASCADE;
ALTER TABLE Examen_grupo ADD CONSTRAINT fk_examenGrupo_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen) ON DELETE CASCADE;

ALTER TABLE Pregunta ADD CONSTRAINT fk_pregunta_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen) ON DELETE CASCADE;

ALTER TABLE Palabras_clave ADD CONSTRAINT fk_palabrasClave_pregunta FOREIGN KEY (id_pregunta) REFERENCES Pregunta(id_pregunta) ON DELETE CASCADE;

ALTER TABLE Respuesta_alumno ADD CONSTRAINT fk_respuestaAlumno_alumno FOREIGN KEY (id_alumno) REFERENCES Alumno(id_alumno) ON DELETE CASCADE;
ALTER TABLE Respuesta_alumno ADD CONSTRAINT fk_respuestaAlumno_examen FOREIGN KEY (id_examen) REFERENCES Examen(id_examen) ON DELETE CASCADE;
/*----------------------------------------------------------------------------------*/

INSERT INTO Rol VALUES (1, 'Docente'), (2, 'Alumno');
/*
INSERT INTO `usuario` (`usuario`, `contrasenia`, `id_rol`) VALUES ('jc08', '1234', '2'), ('Conrado1', '1234', '1');
INSERT INTO `alumno` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `no_control`) VALUES ('1', 'Juan Carlos', 'Marín', 'Chávez', '15240947');
INSERT INTO `maestro` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`) VALUES ('2', 'Eugenio Conrado', 'Marín', 'Gonzalez');
INSERT INTO `grupo` (`nombre`, `id_maestro`) VALUES ('Inteligencia Artificial 845', '1'),
																('Inteligencia Artificial 1030', '1');
INSERT INTO `examen` (`nombre`) VALUES ('Examen unidad 1 A'), ('Examen unidad 1 B');
INSERT INTO `alumno_grupo` (`id_alumno`, `id_grupo`) VALUES ('1', '1');
*/

CREATE VIEW vista_usuario_alumno AS
	SELECT Usuario.id_usuario, Usuario.usuario, Usuario.contrasenia, Usuario.id_rol, Alumno.id_alumno, Alumno.nombre
	FROM Usuario INNER JOIN Alumno ON Usuario.id_usuario = Alumno.id_usuario;

CREATE VIEW vista_examen_grupo AS
	SELECT Examen.id_examen, Examen.nombre, Examen_grupo.id_grupo
	FROM Examen INNER JOIN Examen_grupo ON Examen.id_examen = Examen_grupo.id_examen;

CREATE VIEW vista_alumno_grupo AS
	SELECT Alumno.id_alumno, Alumno.nombre, Alumno.apellido_paterno, Alumno.apellido_materno, Alumno_grupo.id_grupo
	FROM Alumno INNER JOIN Alumno_grupo ON Alumno.id_Alumno = Alumno_grupo.id_alumno;

/*Se agrega columna de palabras clave y se borrará tabla*/
ALTER TABLE `pregunta` ADD `palabras_clave` VARCHAR(255) NOT NULL AFTER `pregunta`;
DROP TABLE palabras_clave;


/*MODIFICACIONES*/
ALTER TABLE `examen_grupo` ADD `hora_inicio` TIME NOT NULL AFTER `id_grupo`, ADD `hora_fin` TIME NOT NULL AFTER `hora_inicio`;
ALTER TABLE `examen_grupo` ADD `fecha` DATE NOT NULL AFTER `id_grupo`;

ALTER TABLE `examen_alumno` ADD `id_aplicacion` INT NOT NULL AFTER `id_examen_alumno`;
ALTER TABLE examen_alumno ADD CONSTRAINT FOREIGN KEY (id_aplicacion) REFERENCES examen_grupo(id_examen_grupo);