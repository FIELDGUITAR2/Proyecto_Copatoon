CREATE DATABASE IF NOT EXISTS Copatoon;
USE Copatoon;

-- Tabla Administrador
CREATE TABLE Administrador (
    idAdministrador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    apellido VARCHAR(45) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    clave VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

-- Tabla Región
CREATE TABLE Region (
    idRegion INT AUTO_INCREMENT PRIMARY KEY,
    nombreRegion VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

-- Tabla País
CREATE TABLE Pais (
    idPais INT AUTO_INCREMENT PRIMARY KEY,
    nombrePais VARCHAR(45) NOT NULL,
    idRegion INT NOT NULL,
    FOREIGN KEY (idRegion) REFERENCES Region(idRegion)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Equipo
CREATE TABLE Equipo (
    idEquipo INT AUTO_INCREMENT PRIMARY KEY,
    nombreEquipo VARCHAR(45) NOT NULL,
    idPais INT NOT NULL,
    FOREIGN KEY (idPais) REFERENCES Pais(idPais)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Local/Visitante
CREATE TABLE Loc_Vis (
    idLoc_Vis INT AUTO_INCREMENT PRIMARY KEY,
    nombreLoc_Vis VARCHAR(45) NOT NULL
) ENGINE=InnoDB;

-- Tabla Campeonato
CREATE TABLE Campeonato (
    idCampeonato INT AUTO_INCREMENT PRIMARY KEY,
    nombreCampeonato VARCHAR(45) NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL
) ENGINE=InnoDB;

-- Tabla Partido
CREATE TABLE Partido (
    idPartido INT AUTO_INCREMENT PRIMARY KEY,
    fechaPartido DATE NOT NULL,
    horaPartido TIME NOT NULL,
    idCampeonato INT NOT NULL,
    FOREIGN KEY (idCampeonato) REFERENCES Campeonato(idCampeonato)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Partido_Equipo (relación N:N entre Partido y Equipo)
CREATE TABLE Partido_Equipo (
    idPartido_Equipo INT AUTO_INCREMENT PRIMARY KEY,
    idPartido INT NOT NULL,
    idEquipo INT NOT NULL,
    idLoc_Vis INT NOT NULL,
    golesEquipo INT DEFAULT 0,
    FOREIGN KEY (idPartido) REFERENCES Partido(idPartido)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idEquipo) REFERENCES Equipo(idEquipo)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idLoc_Vis) REFERENCES Loc_Vis(idLoc_Vis)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- Tabla Campeonato_Equipo (relación N:N entre Campeonato y Equipo)
CREATE TABLE Campeonato_Equipo (
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
    FOREIGN KEY (idCampeonato) REFERENCES Campeonato(idCampeonato)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (idEquipo) REFERENCES Equipo(idEquipo)
        ON DELETE CASCADE
        ON UPDATE CASCADE
) ENGINE=InnoDB;
