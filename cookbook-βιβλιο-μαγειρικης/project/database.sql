-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 05 Ιαν 2017 στις 21:35:30
-- Έκδοση διακομιστή: 10.1.19-MariaDB
-- Έκδοση PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `2931_3748`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `materials`
--

CREATE TABLE `materials` (
  `ID` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `measurementUnit` int(1) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `materials`
--

INSERT INTO `materials` (`ID`, `name`, `measurementUnit`, `quantity`) VALUES
(9, 'σκόρδο', 1, 30),
(10, 'φακές', 1, 1000),
(11, 'μακαρόνια', 0, 5),
(12, 'κρεμμύδι', 1, 50);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `recipes`
--

CREATE TABLE `recipes` (
  `ID` int(4) NOT NULL,
  `recipeName` varchar(50) NOT NULL,
  `recipeCategory` int(4) NOT NULL,
  `recipeTime` int(4) NOT NULL,
  `quantity1` int(10) DEFAULT NULL,
  `material1` varchar(20) DEFAULT NULL,
  `quantity2` int(10) DEFAULT NULL,
  `material2` varchar(20) DEFAULT NULL,
  `quantity3` int(10) DEFAULT NULL,
  `material3` varchar(20) DEFAULT NULL,
  `quantity4` int(10) DEFAULT NULL,
  `material4` varchar(20) DEFAULT NULL,
  `quantity5` int(10) DEFAULT NULL,
  `material5` varchar(20) DEFAULT NULL,
  `quantity6` int(10) DEFAULT NULL,
  `material6` varchar(20) DEFAULT NULL,
  `quantity7` int(10) DEFAULT NULL,
  `material7` varchar(20) DEFAULT NULL,
  `quantity8` int(10) DEFAULT NULL,
  `material8` varchar(20) DEFAULT NULL,
  `quantity9` int(10) DEFAULT NULL,
  `material9` varchar(20) DEFAULT NULL,
  `quantity10` int(10) DEFAULT NULL,
  `material10` varchar(20) DEFAULT NULL,
  `quantity11` int(10) DEFAULT NULL,
  `material11` varchar(20) DEFAULT NULL,
  `quantity12` int(10) DEFAULT NULL,
  `material12` varchar(20) DEFAULT NULL,
  `quantity13` int(10) DEFAULT NULL,
  `material13` varchar(20) DEFAULT NULL,
  `quantity14` int(10) DEFAULT NULL,
  `material14` varchar(20) DEFAULT NULL,
  `quantity15` int(10) DEFAULT NULL,
  `material15` varchar(20) DEFAULT NULL,
  `directions` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `recipes`
--

INSERT INTO `recipes` (`ID`, `recipeName`, `recipeCategory`, `recipeTime`, `quantity1`, `material1`, `quantity2`, `material2`, `quantity3`, `material3`, `quantity4`, `material4`, `quantity5`, `material5`, `quantity6`, `material6`, `quantity7`, `material7`, `quantity8`, `material8`, `quantity9`, `material9`, `quantity10`, `material10`, `quantity11`, `material11`, `quantity12`, `material12`, `quantity13`, `material13`, `quantity14`, `material14`, `quantity15`, `material15`, `directions`) VALUES
(23, 'Φακές', 0, 60, 20, '10', 10, '9', 5, '12', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 'Συνταγή για φακές'),
(24, 'Μακαρόνια', 1, 20, 1, '11', 10, '9', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 0, '0', 'Εδώ είναι η συνταγή για τα μακαρόνια');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `ID` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'mate', '0000'),
(3, 'marikaki7', '1234');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Ευρετήρια για πίνακα `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `materials`
--
ALTER TABLE `materials`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT για πίνακα `recipes`
--
ALTER TABLE `recipes`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
