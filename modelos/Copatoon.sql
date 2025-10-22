CREATE DATABASE IF NOT EXISTS Copatoon;
USE Copatoon;

-- =============================
-- Tabla Administrador
-- =============================
CREATE TABLE g4_administrador (
    idAdministrador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- =============================
-- Tabla Confederación
-- =============================
CREATE TABLE g4_confederacion (
    idConfederacion INT AUTO_INCREMENT PRIMARY KEY,
    nombreConfederacion VARCHAR(60) NOT NULL,
    sigla VARCHAR(10) NOT NULL
) ENGINE=InnoDB;

-- =============================
-- Tabla Región
-- =============================
CREATE TABLE g4_region (
    idRegion INT AUTO_INCREMENT PRIMARY KEY,
    nombreRegion VARCHAR(45) NOT NULL,
    idConfederacion INT NOT NULL,
    FOREIGN KEY (idConfederacion) REFERENCES g4_confederacion(idConfederacion)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =============================
-- Tabla País
-- =============================
CREATE TABLE g4_pais (
    idPais INT AUTO_INCREMENT PRIMARY KEY,
    nombrePais VARCHAR(45) NOT NULL,
    idRegion INT NOT NULL,
    FOREIGN KEY (idRegion) REFERENCES g4_region(idRegion)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =============================
-- Tabla Equipo
-- =============================
CREATE TABLE g4_equipo (
    idEquipo INT AUTO_INCREMENT PRIMARY KEY,
    nombreEquipo VARCHAR(60) NOT NULL,
    idPais INT NOT NULL,
    FOREIGN KEY (idPais) REFERENCES g4_pais(idPais)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =============================
-- Tabla Local / Visitante
-- =============================
CREATE TABLE g4_loc_vis (
    idLoc_Vis INT AUTO_INCREMENT PRIMARY KEY,
    nombreLoc_Vis VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

-- =============================
-- Tabla Campeonato
-- =============================
CREATE TABLE g4_campeonato (
    idCampeonato INT AUTO_INCREMENT PRIMARY KEY,
    nombreCampeonato VARCHAR(60) NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL
) ENGINE=InnoDB;

-- =============================
-- Tabla Partido
-- =============================
CREATE TABLE g4_partido (
    idPartido INT AUTO_INCREMENT PRIMARY KEY,
    fechaPartido DATE NOT NULL,
    horaPartido TIME NOT NULL,
    idCampeonato INT NOT NULL,
    FOREIGN KEY (idCampeonato) REFERENCES g4_campeonato(idCampeonato)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =============================
-- Tabla Partido_Equipo
-- =============================
CREATE TABLE g4_partido_equipo (
    idPartido_Equipo INT AUTO_INCREMENT PRIMARY KEY,
    idPartido INT NOT NULL,
    idEquipo INT NOT NULL,
    idLoc_Vis INT NOT NULL,
    golesEquipo INT DEFAULT 0,
    FOREIGN KEY (idPartido) REFERENCES g4_partido(idPartido)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idEquipo) REFERENCES g4_equipo(idEquipo)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idLoc_Vis) REFERENCES g4_loc_vis(idLoc_Vis)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- =============================
-- Tabla Campeonato_Equipo
-- =============================
CREATE TABLE g4_campeonato_equipo (
    idCampeonato_Equipo INT AUTO_INCREMENT PRIMARY KEY,
    idCampeonato INT NOT NULL,
    idEquipo INT NOT NULL,
    partidosJugados INT DEFAULT 0,
    partidosGanados INT DEFAULT 0,
    partidosEmpatados INT DEFAULT 0,
    partidosPerdidos INT DEFAULT 0,
    golesAFavor INT DEFAULT 0,
    golesEnContra INT DEFAULT 0,
    puntos INT DEFAULT 0,
    FOREIGN KEY (idCampeonato) REFERENCES g4_campeonato(idCampeonato)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idEquipo) REFERENCES g4_equipo(idEquipo)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;
