-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2025 at 04:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage12`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int NOT NULL,
  `model` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `horsePower` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `model`, `brand`, `horsePower`, `image`) VALUES
(29, 'Model S', 'Tesla', 670, 'modelS.jpg'),
(30, 'Civic', 'Honda', 158, 'civic.jpg'),
(31, 'Golf', 'Volkswagen', 150, 'golf.jpg'),
(32, 'Mustang', 'Ford', 450, 'mustang.jpg'),
(34, ' 5 E-Tech Electric', 'Renault', 150, 'r5-100.jpg'),
(46, '911 Carrera', 'Porsche', 379, 'carrera.jpg'),
(48, 'SU7', 'Xiaomi', 299, 'xiaomi su7.jpg'),
(50, 'AMG', 'Mercedes', 300, 'mercedes.jpg'),
(51, 'Corvette ZR1', 'Chevrolet', 647, 'lamborghini.jpg'),
(52, 'Phantom', 'Rolls-Royce', 563, 'Rolls-Royce Phantom.jpg'),
(53, ' Continental GT Speed Convertible', 'Bentley', 659, 'Continental GT Speed Convertible.jpg'),
(54, ' Urus', ' Lamborghini', 666, 'Lamborghini  Urus.jpg'),
(55, 'SF90 Stradale', 'Ferrari', 1000, 'Ferrari SF90 Stradale.jpg'),
(56, 'DBS Superleggera', 'Aston Martin', 715, 'Aston Martin DBS Superleggera.jpg'),
(57, '911 Turbo S', 'Porsche', 650, 'Porsche 911 Turbo S.jpg'),
(58, 'CH-R', 'TOYOTA', 160, 'toyota chr.jpg'),
(59, 'CLIO III', 'Renault', 180, 'clio 3.jpg'),
(60, 'Golf ', 'Volkswagen', 190, 'golf 08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_inscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `mot_de_passe`, `date_inscription`) VALUES
(4, 'Admin', 'admin@example.com', '$2y$10$U5s1RKx9O521BrgOm0QnKuNlKjfm95hLseC0ynKavYhGrKHD3Mxbm', '2025-03-07 11:35:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
