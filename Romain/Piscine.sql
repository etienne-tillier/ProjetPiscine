-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 27 sep. 2021 à 08:14
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `AUTEUR`
--

CREATE TABLE `AUTEUR` (
  `idAuteur` int(11) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `prenomAuteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `CHARGE`
--

CREATE TABLE `CHARGE` (
  `nomCharge` varchar(50) NOT NULL,
  `montantCharge` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `INGREDIENT`
--

CREATE TABLE `INGREDIENT` (
  `idIngredient` int(11) NOT NULL,
  `idTypeIngredient` int(11) NOT NULL,
  `idTVA` varchar(50) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL,
  `unite` varchar(50) NOT NULL,
  `allergene` tinyint(1) NOT NULL,
  `prixUnitaire` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `INGREDIENTDANSRECETTE`
--

CREATE TABLE `INGREDIENTDANSRECETTE` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `RECETTE`
--

CREATE TABLE `RECETTE` (
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

-- --------------------------------------------------------

--
-- Structure de la table `RECETTEDANSRECETTE`
--

CREATE TABLE `RECETTEDANSRECETTE` (
  `idRecetteMere` int(11) NOT NULL,
  `idRecetteFille` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TVA`
--

CREATE TABLE `TVA` (
  `nomTVA` varchar(50) NOT NULL,
  `tauxTVA` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TYPEINGREDIENT`
--

CREATE TABLE `TYPEINGREDIENT` (
  `idTypeIngredient` int(11) NOT NULL,
  `nomTypeIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `TYPERECETTE`
--

CREATE TABLE `TYPERECETTE` (
  `idTypeRecette` int(11) NOT NULL,
  `nomTypeRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `AUTEUR`
--
ALTER TABLE `AUTEUR`
  ADD PRIMARY KEY (`idAuteur`);

--
-- Index pour la table `CHARGE`
--
ALTER TABLE `CHARGE`
  ADD PRIMARY KEY (`nomCharge`);

--
-- Index pour la table `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `TVA` (`idTVA`),
  ADD KEY `typeIngredient` (`idTypeIngredient`);

--
-- Index pour la table `INGREDIENTDANSRECETTE`
--
ALTER TABLE `INGREDIENTDANSRECETTE`
  ADD KEY `recette` (`idRecette`),
  ADD KEY `ingredient` (`idIngredient`);

--
-- Index pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `typeRecette` (`idTypeRecette`),
  ADD KEY `auteur` (`idAuteur`);

--
-- Index pour la table `RECETTEDANSRECETTE`
--
ALTER TABLE `RECETTEDANSRECETTE`
  ADD KEY `recetteMere` (`idRecetteMere`),
  ADD KEY `recetteFille` (`idRecetteFille`);

--
-- Index pour la table `TVA`
--
ALTER TABLE `TVA`
  ADD PRIMARY KEY (`nomTVA`);

--
-- Index pour la table `TYPEINGREDIENT`
--
ALTER TABLE `TYPEINGREDIENT`
  ADD PRIMARY KEY (`idTypeIngredient`);

--
-- Index pour la table `TYPERECETTE`
--
ALTER TABLE `TYPERECETTE`
  ADD PRIMARY KEY (`idTypeRecette`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `AUTEUR`
--
ALTER TABLE `AUTEUR`
  MODIFY `idAuteur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TYPEINGREDIENT`
--
ALTER TABLE `TYPEINGREDIENT`
  MODIFY `idTypeIngredient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TYPERECETTE`
--
ALTER TABLE `TYPERECETTE`
  MODIFY `idTypeRecette` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `INGREDIENT`
--
ALTER TABLE `INGREDIENT`
  ADD CONSTRAINT `TVA` FOREIGN KEY (`idTVA`) REFERENCES `tva` (`nomTVA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeIngredient` FOREIGN KEY (`idTypeIngredient`) REFERENCES `typeingredient` (`idTypeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `INGREDIENTDANSRECETTE`
--
ALTER TABLE `INGREDIENTDANSRECETTE`
  ADD CONSTRAINT `ingredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `RECETTE`
--
ALTER TABLE `RECETTE`
  ADD CONSTRAINT `auteur` FOREIGN KEY (`idAuteur`) REFERENCES `AUTEUR` (`idAuteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeRecette` FOREIGN KEY (`idTypeRecette`) REFERENCES `typerecette` (`idTypeRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `RECETTEDANSRECETTE`
--
ALTER TABLE `RECETTEDANSRECETTE`
  ADD CONSTRAINT `recetteFille` FOREIGN KEY (`idRecetteFille`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recetteMere` FOREIGN KEY (`idRecetteMere`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
