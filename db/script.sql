-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 04:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Ciencia Ficción'),
(2, 'Suspense Tecnológico'),
(3, 'Drama Biográfico'),
(4, 'Acción Hacker');

-- --------------------------------------------------------

--
-- Table structure for table `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha_L` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `genero_id` int(11) NOT NULL,
  `url_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peliculas`
--

INSERT INTO `peliculas` (`id`, `nombre`, `descripcion`, `fecha_L`, `genero_id`, `url_imagen`) VALUES
(1, 'The Matrix', 'Un programador descubre que la realidad es una simulación interactiva creada por máquinas y se une a la rebelión.', '1999-03-31 04:00:00', 1, 'img/matrix.jpg'),
(2, 'Who Am I: Ningún sistema es seguro', 'Un joven informático experto en Linux se une a un grupo de hackers subversivos en Berlín para ganar reconocimiento en la Dark Web.', '2014-09-25 04:00:00', 2, 'img/whoami.jpg'),
(3, 'Snowden', 'La historia del consultor técnico que descubrió programas de vigilancia masiva y filtró documentos clasificados de la NSA.', '2016-09-16 04:00:00', 3, 'img/snowden.jpg'),
(4, 'Juegos de Guerra (WarGames)', 'Un joven entusiasta de las computadoras se infiltra accidentalmente en un superordenador militar pensando que es un videojuego.', '1983-06-03 04:00:00', 4, 'img/wargames.jpg'),
(5, 'Takedown (Hackers 2)', 'Basada en la historia real de la épica persecución en la red del famoso hacker de ingeniería social, Kevin Mitnick.', '2000-03-15 04:00:00', 4, 'img/takedown.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `generos` (`genero_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
