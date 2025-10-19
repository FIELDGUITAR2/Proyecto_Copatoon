-- ===============================
-- ADMINISTRADORES
-- ===============================
INSERT INTO Administrador (nombre, apellido, correo, clave) VALUES
('Samir', 'Gonzalez', 'admin@copatoon.com', MD5('12345')),
('Laura', 'Perez', 'laura@copatoon.com', MD5('12345'));

-- =============================
-- Confederaciones FIFA
-- =============================
INSERT INTO Confederacion (nombreConfederacion, sigla) VALUES
('Confederación Sudamericana de Fútbol', 'CONMEBOL'),
('Unión de Asociaciones Europeas de Fútbol', 'UEFA'),
('Confederación de Norteamérica, Centroamérica y el Caribe', 'CONCACAF'),
('Confederación Africana de Fútbol', 'CAF'),
('Confederación Asiática de Fútbol', 'AFC'),
('Confederación de Fútbol de Oceanía', 'OFC');

-- =============================
-- Regiones (una por confederación)
-- =============================
INSERT INTO Region (nombreRegion, idConfederacion) VALUES
('Sudamérica', 1),
('Europa', 2),
('Norteamérica y Caribe', 3),
('África', 4),
('Asia', 5),
('Oceanía', 6);

-- =============================
-- Países y Equipos Nacionales
-- =============================

-- CONMEBOL
INSERT INTO Pais (nombrePais, idRegion) VALUES
('Argentina', 1), ('Brasil', 1), ('Uruguay', 1), ('Colombia', 1), ('Chile', 1);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección Argentina', 1), ('Selección de Brasil', 2), ('Selección de Uruguay', 3),
('Selección de Colombia', 4), ('Selección de Chile', 5);

-- UEFA
INSERT INTO Pais (nombrePais, idRegion) VALUES
('España', 2), ('Francia', 2), ('Alemania', 2), ('Italia', 2), ('Inglaterra', 2);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección de España', 6), ('Selección de Francia', 7),
('Selección de Alemania', 8), ('Selección de Italia', 9), ('Selección de Inglaterra', 10);

-- CONCACAF
INSERT INTO Pais (nombrePais, idRegion) VALUES
('México', 3), ('Estados Unidos', 3), ('Canadá', 3);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección de México', 11), ('Selección de Estados Unidos', 12), ('Selección de Canadá', 13);

-- CAF
INSERT INTO Pais (nombrePais, idRegion) VALUES
('Nigeria', 4), ('Senegal', 4), ('Marruecos', 4);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección de Nigeria', 14), ('Selección de Senegal', 15), ('Selección de Marruecos', 16);

-- AFC
INSERT INTO Pais (nombrePais, idRegion) VALUES
('Japón', 5), ('Corea del Sur', 5), ('Irán', 5);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección de Japón', 17), ('Selección de Corea del Sur', 18), ('Selección de Irán', 19);

-- OFC
INSERT INTO Pais (nombrePais, idRegion) VALUES
('Nueva Zelanda', 6), ('Islas Salomón', 6);

INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Selección de Nueva Zelanda', 20), ('Selección de Islas Salomón', 21);

-- =============================
-- Local/Visitante
-- =============================
INSERT INTO Loc_Vis (nombreLoc_Vis) VALUES ('Local'), ('Visitante');

-- =============================
-- Ejemplo de campeonato y partidos
-- =============================
INSERT INTO Campeonato (nombreCampeonato, fechaInicio, fechaFin)
VALUES ('Copa de Confederaciones', '2025-06-15', '2025-07-01');

INSERT INTO Partido (fechaPartido, horaPartido, idCampeonato)
VALUES 
('2025-06-15', '15:00:00', 1),
('2025-06-16', '18:00:00', 1);

INSERT INTO Partido_Equipo (idPartido, idEquipo, idLoc_Vis, golesEquipo)
VALUES
(1, 1, 1, 2), -- Argentina Local
(1, 7, 2, 1), -- Francia Visitante
(2, 2, 1, 3), -- Brasil Local
(2, 8, 2, 3); -- Alemania Visitante
