-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2021 at 12:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprint2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employe`
--

CREATE TABLE `Employe` (
  `numEmploye` int(10) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `categorie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employe`
--

INSERT INTO `Employe` (`numEmploye`, `nom`, `login`, `mdp`, `categorie`) VALUES
(1, 'dupont', 'dupont', 'dupont', 'Directeur'),
(2, 'tom', 'tom', 'tom', 'Conseiller'),
(3, 'jerry', 'jerry', 'jerry', 'Conseiller'),
(4, 'kim', 'kim', 'kim', 'Agent'),
(5, 'lola', 'lola', 'lola', 'Agent'),
(6, 'zac', 'zac', 'zac', 'Agent'),
(7, 'jean', 'jean', 'jeam', 'Agent'),
(9, 'thomas', 'thomas', 'thomas', 'Agent');

-- --------------------------------------------------------

--
-- Table structure for table `TypeCompte`
--

CREATE TABLE `TypeCompte` (
  `numTypeCompte` int(10) NOT NULL,
  `nomTypeCompte` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TypeCompte`
--

INSERT INTO `TypeCompte` (`numTypeCompte`, `nomTypeCompte`) VALUES
(7, 'assurance'),
(9, 'assurance auto'),
(8, 'assurance vie'),
(17, 'assurance voiture'),
(6, 'cel'),
(12, 'pel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employe`
--
ALTER TABLE `Employe`
  ADD PRIMARY KEY (`numEmploye`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `TypeCompte`
--
ALTER TABLE `TypeCompte`
  ADD PRIMARY KEY (`numTypeCompte`),
  ADD UNIQUE KEY `nomTypeCompte` (`nomTypeCompte`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employe`
--
ALTER TABLE `Employe`
  MODIFY `numEmploye` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `TypeCompte`
--
ALTER TABLE `TypeCompte`
  MODIFY `numTypeCompte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
