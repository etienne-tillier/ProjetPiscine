-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2021 at 06:22 PM
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
(1, 'Maurin', 'Jean'),
(2, 'Tillier', 'Etienne');

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
(2, 1, 'Fruit', 'Banane', 'kg', 0, 1.00),
(4, 1, 'Poire', 'poire', 'kg', 0, 2.00),
(5, 6, 'Fruit', 'Oeuf Poule', 'unité', 0, 0.30),
(6, 1, 'Fruit', 'Tomate', 'kg', 0, 2.00),
(7, 4, 'Fruit', 'poivre', 'g', 0, 4.00),
(10, 12, 'poisson', 'filet d\'anchois', 'kg', 0, 12.00),
(12, 7, 'Fruit', 'cougette', 'kg', 0, 8.00),
(13, 7, 'Fruit', 'magnoc', '8', 1, 9.00),
(14, 1, 'Fruit', 'cacahuete', 'kg', 0, 5.00),
(15, 8, 'Fruit', 'ada', 'kg', 0, 8.00),
(16, 9, 'Fruit', 'kiwi', 'unite', 0, 8.00),
(17, 10, 'Fruit', 'poiron', 'kg', 0, 8.00),
(18, 11, 'Fruit', 'friz2', 'kg', 0, 7.00),
(19, 6, 'Fruit', 'autruche oeuf', 'unite', 0, 9.00),
(20, 1, 'Fruit', 'fraise', 'kg', 0, 6.00),
(21, 1, 'melon', 'melon', 'kg', 0, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `ingredientdansrecette`
--

CREATE TABLE `ingredientdansrecette` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredientdansrecette`
--

INSERT INTO `ingredientdansrecette` (`idRecette`, `idIngredient`, `quantiteIngredient`) VALUES
(1, 5, '4.00'),
(1, 6, '2.00'),
(1, 7, '100.00'),
(1, 10, '1.00'),
(1, 4, '5.00'),
(1, 13, '7.00'),
(1, 12, '6.00'),
(1, 4, '5.00'),
(1, 13, '7.00'),
(1, 12, '6.00'),
(1, 2, '5.00'),
(1, 13, '10.00'),
(1, 12, '5.00'),
(14, 2, '2.00'),
(14, 12, '4.00'),
(14, 10, '5.00'),
(16, 12, '5.00'),
(16, 7, '20.00'),
(16, 6, '6.00'),
(17, 2, '5.00'),
(17, 6, '8.00'),
(17, 4, '6.00'),
(19, 2, '2.00'),
(19, 6, '2.00'),
(19, 12, '1.00'),
(22, 12, '5.00'),
(22, 2, '2.00'),
(24, 2, '85.00'),
(15, 10, '1.00'),
(15, 12, '2.00'),
(15, 5, '3.00'),
(25, 2, '5.00');

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
(1, 1, 1, 'Salade niçoise', 6, 'Salade préparé par nos soins contenant du poulet', 'Bien laver les tomates avant de les servir', '2', '4'),
(3, 1, 1, 'rizoto', 8, 'du bon riz                    ', 'super bon l\'eau                    ', '5', '5'),
(4, 1, 1, 'aaaa', 8, '       test                    ', '        test                    ', '7', '5'),
(5, 1, 1, 'magnoc ultime', 8, '            aaa                ', '                aaa            ', '1', '6'),
(13, 1, 1, 'soupe', 8, '           dad                 ', '         ada                   ', '5', '4'),
(14, 1, 1, 'soupe', 8, '           dad                 ', '         ada                   ', '5', '4'),
(15, 1, 1, 'salade d\'anchois', 4, '          super salade fraiche                  ', '                         acheter de bons anchois                           ', '6', '4'),
(16, 1, 1, 'gros plat', 8, '           def                 ', '             def               ', '4', '2'),
(17, 1, 1, 'testtt', 8, '         def                   ', '            ef                ', '5', '2'),
(18, 1, 1, 'a', 5, '                            ', '                            ', '8', '5'),
(19, 1, 1, 'Poele champetre', 7, '                    dad        ', '                              dada                          ', '5', '2'),
(22, 1, 1, 'Pamplemousse chocolat', 4, '             dad               ', '                                                         ada                                                       ', '2', '5'),
(23, 1, 1, 'plat cuisine', 2, '                    def        ', '              def              ', '3', '5'),
(24, 1, 1, 'test', 8, '                 def           ', '             def               ', '4', '2'),
(25, 1, 1, 'plancha de ouf', 4, '                     truc de ouf       ', '                                super bon    sssss                    ', '2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `recettedansrecette`
--

CREATE TABLE `recettedansrecette` (
  `idRecetteMere` int(11) NOT NULL,
  `idRecetteFille` int(11) NOT NULL,
  `quantiteRecette` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recettedansrecette`
--

INSERT INTO `recettedansrecette` (`idRecetteMere`, `idRecetteFille`, `quantiteRecette`) VALUES
(1, 4, '8.00'),
(1, 1, '1.00'),
(1, 1, '1.00'),
(1, 3, '2.00'),
(14, 1, '2.00'),
(14, 3, '1.00'),
(16, 1, '1.00'),
(16, 3, '2.00'),
(17, 1, '15.00'),
(17, 15, '68.00'),
(19, 16, '5.00'),
(19, 1, '1.00'),
(23, 1, '2.00'),
(23, 3, '1.00'),
(23, 13, '5.00'),
(24, 1, '5.00'),
(15, 1, '7.00');

-- --------------------------------------------------------

--
-- Table structure for table `tva`
--

CREATE TABLE `tva` (
  `nomTVA` varchar(50) NOT NULL,
  `tauxTVA` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tva`
--

INSERT INTO `tva` (`nomTVA`, `tauxTVA`) VALUES
('Fruit', '0.00'),
('melon', '0.00'),
('Poire', '0.30'),
('poisson', '1.00');

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
(7, 'Légumes'),
(8, 'jar'),
(9, ''),
(10, 'friz'),
(11, 'test'),
(12, 'petit poisson');

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
(1, 'Salades'),
(2, 'apero ');

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
  MODIFY `idAuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `typeingredient`
--
ALTER TABLE `typeingredient`
  MODIFY `idTypeIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typerecette`
--
ALTER TABLE `typerecette`
  MODIFY `idTypeRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
