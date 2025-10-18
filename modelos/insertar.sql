USE Copatoon;

-- ===============================
-- ADMINISTRADORES
-- ===============================
INSERT INTO Administrador (nombre, apellido, correo, clave) VALUES
('Samir', 'Gonzalez', 'admin@copatoon.com', MD5('12345')),
('Laura', 'Perez', 'laura@copatoon.com', MD5('12345'));

-- ===============================
-- REGIONES
-- ===============================
INSERT INTO Region (nombreRegion) VALUES
('Europa'),
('Sudamérica'),
('Asia');

-- ===============================
-- PAISES
-- ===============================
INSERT INTO Pais (nombrePais, idRegion) VALUES
('España', 1),
('Francia', 1),
('Brasil', 2),
('Argentina', 2),
('Japón', 3),
('Corea del Sur', 3);

-- ===============================
-- EQUIPOS
-- ===============================
INSERT INTO Equipo (nombreEquipo, idPais) VALUES
('Real Madrid', 1),
('FC Barcelona', 1),
('Paris Saint-Germain', 2),
('Flamengo', 3),
('River Plate', 4),
('Boca Juniors', 4),
('Kashima Antlers', 5),
('Ulsan Hyundai', 6);

-- ===============================
-- LOCAL / VISITANTE
-- ===============================
INSERT INTO Loc_Vis (nombreLoc_Vis) VALUES
('Local'),
('Visitante');

-- ===============================
-- CAMPEONATOS
-- ===============================
INSERT INTO Campeonato (nombreCampeonato, FechaInicio, FechaFin) VALUES
('Copa Copatoon 2025', '2025-07-01', '2025-09-01'),
('Champions Copatoon 2025', '2025-08-15', '2025-11-20');

-- ===============================
-- PARTIDOS
-- ===============================
INSERT INTO Partido (fechaPartido, horaPartido, idCampeonato) VALUES
('2025-07-05', '18:00:00', 1),
('2025-07-06', '20:00:00', 1),
('2025-08-20', '19:30:00', 2);

-- ===============================
-- PARTIDO_EQUIPO (RESULTADOS)
-- ===============================
INSERT INTO Partido_Equipo (idPartido, idEquipo, idLoc_Vis, golesEquipo) VALUES
(1, 1, 1, 3),  -- Real Madrid (Local)
(1, 2, 2, 2),  -- FC Barcelona (Visitante)
(2, 3, 1, 1),  -- PSG (Local)
(2, 4, 2, 0),  -- Flamengo (Visitante)
(3, 5, 1, 2),  -- River Plate (Local)
(3, 6, 2, 2);  -- Boca Juniors (Visitante)

-- ===============================
-- CAMPEONATO_EQUIPO (TABLA DE POSICIONES)
-- ===============================
INSERT INTO Campeonato_Equipo (
    idCampeonato, idEquipo, partidosJugados, partidosGanados, partidosEmpatados,
    partidosPerdidos, golesAFavor, golesEnContra, puntos
) VALUES
(1, 1, 1, 1, 0, 0, 3, 2, 3),
(1, 2, 1, 0, 0, 1, 2, 3, 0),
(1, 3, 1, 1, 0, 0, 1, 0, 3),
(1, 4, 1, 0, 0, 1, 0, 1, 0),
(2, 5, 1, 0, 1, 0, 2, 2, 1),
(2, 6, 1, 0, 1, 0, 2, 2, 1);
