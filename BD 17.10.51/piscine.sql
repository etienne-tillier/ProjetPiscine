-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 08, 2021 at 11:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

CREATE TABLE `auteur` (
  `idAuteur` int(11) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `prenomAuteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`idAuteur`, `nomAuteur`, `prenomAuteur`) VALUES
(1, 'Maurin', 'Jean');

-- --------------------------------------------------------

--
-- Table structure for table `charge`
--

CREATE TABLE `charge` (
  `nomCharge` varchar(50) NOT NULL,
  `montantCharge` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `idTypeIngredient` int(11) NOT NULL,
  `idTVA` varchar(50) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL,
  `unite` varchar(50) NOT NULL,
  `allergene` tinyint(1) NOT NULL,
  `prixUnitaire` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `idTypeIngredient`, `idTVA`, `nomIngredient`, `unite`, `allergene`, `prixUnitaire`) VALUES
(1, 1, 'Fruit', 'Pomme', 'kg', 0, 5.00),
(2, 1, 'Fruit', 'Banane', 'kg', 0, 1.00),
(4, 1, 'Fruit', 'poire', 'kg', 1, 2.00),
(5, 6, 'Fruit', 'Oeuf Poule', 'unité', 0, 0.30),
(6, 1, 'Fruit', 'Tomate', 'kg', 0, 2.00),
(7, 4, 'Fruit', 'poivre', 'g', 0, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `ingredientdansrecette`
--

CREATE TABLE `ingredientdansrecette` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `idTypeRecette` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `nomRecette` varchar(50) NOT NULL,
  `nombrePortion` int(11) NOT NULL,
  `descriptif` varchar(300) NOT NULL,
  `progression` varchar(2000) NOT NULL,
  `prixMainOeuvre` decimal(10,0) NOT NULL,
  `multiplicateur` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`idRecette`, `idTypeRecette`, `idAuteur`, `nomRecette`, `nombrePortion`, `descriptif`, `progression`, `prixMainOeuvre`, `multiplicateur`) VALUES
(1, 1, 1, 'Salade niçoise', 6, 'Salade préparé par nos soins contenant du poulet', 'Bien laver les tomates avant de les servir', '2', '4');

-- --------------------------------------------------------

--
-- Table structure for table `recettedansrecette`
--

CREATE TABLE `recettedansrecette` (
  `idRecetteMere` int(11) NOT NULL,
  `idRecetteFille` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tva`
--

CREATE TABLE `tva` (
  `nomTVA` varchar(50) NOT NULL,
  `tauxTVA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tva`
--

INSERT INTO `tva` (`nomTVA`, `tauxTVA`) VALUES
('Fruit', '0');

-- --------------------------------------------------------

--
-- Table structure for table `typeingredient`
--

CREATE TABLE `typeingredient` (
  `idTypeIngredient` int(11) NOT NULL,
  `nomTypeIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeingredient`
--

INSERT INTO `typeingredient` (`idTypeIngredient`, `nomTypeIngredient`) VALUES
(1, 'Fruit'),
(2, 'poisson'),
(3, 'herbes'),
(4, 'assaisonnement'),
(5, 'vinaigres'),
(6, 'Oeufs'),
(7, 'Légumes');

-- --------------------------------------------------------

--
-- Table structure for table `typerecette`
--

CREATE TABLE `typerecette` (
  `idTypeRecette` int(11) NOT NULL,
  `nomTypeRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typerecette`
--

INSERT INTO `typerecette` (`idTypeRecette`, `nomTypeRecette`) VALUES
(1, 'Salades');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idAuteur`);

--
-- Indexes for table `charge`
--
ALTER TABLE `charge`
  ADD PRIMARY KEY (`nomCharge`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `TVA` (`idTVA`),
  ADD KEY `typeIngredient` (`idTypeIngredient`);

--
-- Indexes for table `ingredientdansrecette`
--
ALTER TABLE `ingredientdansrecette`
  ADD KEY `recette` (`idRecette`),
  ADD KEY `ingredient` (`idIngredient`);

--
-- Indexes for table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `typeRecette` (`idTypeRecette`),
  ADD KEY `auteur` (`idAuteur`);

--
-- Indexes for table `recettedansrecette`
--
ALTER TABLE `recettedansrecette`
  ADD KEY `recetteMere` (`idRecetteMere`),
  ADD KEY `recetteFille` (`idRecetteFille`);

--
-- Indexes for table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`nomTVA`);

--
-- Indexes for table `typeingredient`
--
ALTER TABLE `typeingredient`
  ADD PRIMARY KEY (`idTypeIngredient`);

--
-- Indexes for table `typerecette`
--
ALTER TABLE `typerecette`
  ADD PRIMARY KEY (`idTypeRecette`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `idAuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `typeingredient`
--
ALTER TABLE `typeingredient`
  MODIFY `idTypeIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `typerecette`
--
ALTER TABLE `typerecette`
  MODIFY `idTypeRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `TVA` FOREIGN KEY (`idTVA`) REFERENCES `tva` (`nomTVA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeIngredient` FOREIGN KEY (`idTypeIngredient`) REFERENCES `typeingredient` (`idTypeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredientdansrecette`
--
ALTER TABLE `ingredientdansrecette`
  ADD CONSTRAINT `ingredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `auteur` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeRecette` FOREIGN KEY (`idTypeRecette`) REFERENCES `typerecette` (`idTypeRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recettedansrecette`
--
ALTER TABLE `recettedansrecette`
  ADD CONSTRAINT `recetteFille` FOREIGN KEY (`idRecetteFille`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recetteMere` FOREIGN KEY (`idRecetteMere`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
