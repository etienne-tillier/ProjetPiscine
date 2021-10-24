-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 24 oct. 2021 à 08:57
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
-- Base de données : `piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `idAuteur` int(11) NOT NULL,
  `nomAuteur` varchar(50) NOT NULL,
  `prenomAuteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`idAuteur`, `nomAuteur`, `prenomAuteur`) VALUES
(3, 'Pâtissier', 'roche'),
(4, 'Pâtissier', 'roche'),
(5, 'responsable', 'pâtissier'),
(6, 'responsable', 'pâtissier'),
(7, 'responsable', 'Entremétier'),
(8, 'responsable', 'Entremétier'),
(9, 'responsable', 'Entremétier'),
(10, 'responsable', 'Potager'),
(11, 'responsable', 'Potager'),
(12, 'responsable', 'Garde manger'),
(13, 'responsable', 'Garde manger'),
(14, 'responsable', 'Cuisine chaude'),
(15, 'responsable', 'Cuisine chaude'),
(16, 'responsable', 'Rôtisseur'),
(17, 'responsable', 'Rôtisseur');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `idTypeIngredient` int(11) NOT NULL,
  `idTVA` varchar(50) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL,
  `unite` varchar(50) NOT NULL,
  `allergene` tinyint(1) NOT NULL,
  `prixUnitaire` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `idTypeIngredient`, `idTVA`, `nomIngredient`, `unite`, `allergene`, `prixUnitaire`) VALUES
(34, 14, 'viande', 'Epaule d\'agneau sans os ', 'kg', 0, '8.49'),
(35, 14, 'viande', 'Filet de poulet', 'kg', 0, '4.12'),
(36, 14, 'viande', 'Chorizo doux', 'kg', 0, '9.00'),
(37, 14, 'viande', 'Jarret ou Paleron de bœuf', 'kg', 0, '2.92'),
(38, 14, 'viande', 'Poitrine fumée', 'kg', 0, '5.10'),
(39, 14, 'viande', 'Joue de bœuf', 'kg', 0, '13.00'),
(40, 14, 'viande', 'Avant bœuf pour viande haché', 'kg', 0, '11.50'),
(41, 15, 'viande', 'Crevettes surg 30/40', 'kg', 0, '17.61'),
(42, 15, 'crustacés et poisson', 'Dos de cabillaud sans peau surg', 'kg', 0, '13.90'),
(43, 15, 'crustacés et poisson', 'Ecrevisses surg', 'kg', 0, '9.90'),
(44, 15, 'crustacés et poisson', 'Filet de saumon', 'kg', 0, '13.50'),
(45, 15, 'crustacés et poisson', 'Parure de saumon fumé', 'kg', 0, '5.57'),
(46, 16, 'viande', 'Beurre', 'kg', 0, '5.50'),
(47, 16, 'cremerie', 'Crème liquide', 'L', 0, '2.50'),
(48, 16, 'cremerie', 'Lait', 'L', 0, '0.62'),
(49, 16, 'cremerie', 'Œufs', 'P', 1, '0.11'),
(50, 16, 'cremerie', 'Parmesan', 'kg', 0, '13.75'),
(51, 16, 'cremerie', 'Mascarpone', 'kg', 0, '7.22'),
(52, 16, 'cremerie', 'Jaunes d\'œuf au litre', 'L', 0, '9.75'),
(53, 16, 'cremerie', 'Blancs d\'œuf  au litre', 'L', 0, '8.00'),
(54, 16, 'cremerie', 'Œufs entiers au litre', 'L', 0, '2.50'),
(55, 16, 'cremerie', 'Crème mascarpone', 'L', 0, '5.37'),
(56, 16, 'cremerie', 'Beurre demi sel', 'kg', 0, '6.00'),
(57, 16, 'cremerie', 'Mozarella', 'kg', 0, '5.00'),
(58, 17, 'viande', 'Potimarron', 'kg', 0, '2.20'),
(59, 17, 'fruits/légumes', 'Oignons', 'kg', 0, '2.00'),
(60, 17, 'fruits/légumes', 'Oignons rouges', 'kg', 0, '2.60'),
(61, 17, 'fruits/légumes', 'Carottes', 'kg', 0, '1.75'),
(62, 17, 'fruits/légumes', 'Courgettes', 'kg', 0, '2.00'),
(63, 17, 'fruits/légumes', 'Cèpes surg pied et morceaux', 'kg', 0, '12.50'),
(64, 17, 'fruits/légumes', 'Poires', 'kg', 0, '7.50'),
(65, 17, 'fruits/légumes', 'Pommes Granny Smith', 'kg', 0, '2.60'),
(66, 17, 'fruits/légumes', 'Céleri rave', 'kg', 0, '2.00'),
(67, 17, 'fruits/légumes', 'Citron jaune', 'kg', 0, '3.60'),
(68, 17, 'fruits/légumes', 'Citron vert', 'kg', 0, '5.50'),
(69, 17, 'fruits/légumes', 'Choux fleur', 'kg', 0, '3.60'),
(70, 17, 'fruits/légumes', 'Ail', 'kg', 0, '4.50'),
(71, 17, 'fruits/légumes', 'Poireaux', 'kg', 0, '3.00'),
(72, 17, 'fruits/légumes', 'Bouquet garni', 'P', 0, '0.05'),
(73, 17, 'fruits/légumes', 'Echalotes', 'kg', 0, '2.00'),
(74, 17, 'fruits/légumes', 'Persil', 'Botte', 0, '0.78'),
(75, 17, 'fruits/légumes', 'Pommes de terre', 'kg', 0, '0.95'),
(76, 17, 'fruits/légumes', 'Orange', 'kg', 0, '1.95'),
(77, 17, 'fruits/légumes', 'pomme golden', 'kg', 0, '1.89'),
(78, 17, 'fruits/légumes', 'Basilic surg', 'kg', 0, '22.00'),
(79, 17, 'fruits/légumes', 'Cebette', 'B', 0, '0.95'),
(80, 17, 'fruits/légumes', 'Petits pois surg', 'kg', 0, '2.21'),
(81, 17, 'fruits/légumes', 'Menthe', 'Botte', 0, '0.90'),
(82, 18, 'viande', 'Pois chiche 4/4', 'B', 0, '3.75'),
(83, 18, 'épicerie', 'Cœur de palmier 4/4', 'B', 0, '3.56'),
(84, 18, 'épicerie', 'Vinaigre de riz', 'L', 0, '7.06'),
(85, 18, 'épicerie', 'Miel', 'kg', 0, '9.00'),
(86, 18, 'épicerie', 'Sauce nuoc nam', 'L', 0, '20.00'),
(87, 18, 'épicerie', 'Cuisses de canard confites 5/1', 'B', 0, '29.88'),
(88, 18, 'épicerie', 'Huile de sésame', 'L', 0, '11.00'),
(89, 18, 'épicerie', 'Huile d\'olive', 'L', 0, '5.01'),
(90, 18, 'épicerie', 'Huile de tournesol', 'L', 0, '1.51'),
(91, 18, 'épicerie', 'Huile de pépins de raisin', 'L', 0, '3.60'),
(92, 18, 'épicerie', 'Graines de sésame', 'kg', 0, '36.00'),
(93, 18, 'épicerie', 'Piment d\'Espelette', 'kg', 0, '200.00'),
(94, 18, 'épicerie', 'Agar agar', 'kg', 0, '82.60'),
(95, 18, 'épicerie', 'Nouilles chinoise', 'kg', 0, '16.00'),
(96, 18, 'épicerie', 'Sésame noir en pâte', 'kg', 0, '30.00'),
(98, 18, 'épicerie', 'Jus d\'agneau déshydraté', 'kg', 0, '8.83'),
(99, 18, 'épicerie', 'Fond brun de veau lié', 'kg', 0, '8.83'),
(100, 18, 'crustacés et poisson', 'Fumet de poisson', 'kg', 1, '9.00'),
(101, 18, 'épicerie', 'Sauce soja au yuzu (ponzu)', 'L', 0, '45.00'),
(102, 18, 'épicerie', 'Sarasin en grain', 'kg', 0, '5.00'),
(103, 18, 'épicerie', 'Cognac', 'L', 0, '8.00'),
(104, 18, 'vin', 'Vin blanc', 'L', 0, '2.00'),
(105, 18, 'épicerie', 'Concentré de tomate', 'kg', 0, '12.84'),
(106, 18, 'épicerie', 'Safran', 'kg', 0, '2000.00'),
(107, 18, 'épicerie', 'Pois cassés', 'kg', 0, '2.18'),
(108, 18, 'épicerie', 'Epices à tajine', 'kg', 0, '20.00'),
(109, 18, 'épicerie', 'Abricots secs', 'kg', 0, '8.00'),
(110, 18, 'épicerie', 'Semoule de blé moyenne', 'kg', 0, '1.30'),
(111, 18, 'épicerie', 'Crozet de Savoie', 'kg', 0, '6.00'),
(112, 18, 'épicerie', 'Noix muscade', 'kg', 0, '15.99'),
(113, 18, 'épicerie', 'Riz rond arborio', 'kg', 0, '1.50'),
(114, 18, 'épicerie', 'Cèpes séchès', 'kg', 0, '40.00'),
(115, 18, 'épicerie', 'Malibu', 'L', 0, '12.00'),
(116, 18, 'épicerie', 'Coco râpé', 'kg', 0, '18.00'),
(117, 18, 'épicerie', 'Levure de boulanger', 'kg', 0, '11.00'),
(118, 18, 'épicerie', 'Muscat de Lunel', 'L', 0, '8.65'),
(119, 18, 'épicerie', 'Farine', 'kg', 0, '0.70'),
(120, 18, 'épicerie', 'Calvados', 'L', 0, '30.00'),
(121, 18, 'épicerie', 'Fécule', 'kg', 0, '6.50'),
(122, 18, 'vin', 'vinaigre blanc', 'L', 0, '0.80'),
(123, 18, 'épicerie', 'Huile d\'arachide', 'L', 0, '1.31'),
(124, 18, 'épicerie', 'Pesto', 'U', 0, '7.00'),
(125, 18, 'épicerie', 'Chapelure brune', 'kg', 0, '1.70'),
(126, 18, 'épicerie', 'Sel fin', 'kg', 0, '0.81'),
(127, 18, 'épicerie', 'Gros sel', 'kg', 0, '0.66'),
(128, 18, 'épicerie', 'Poivre blanc', 'kg', 0, '80.00'),
(129, 18, 'épicerie', 'Poivre noir', 'kg', 0, '10.00'),
(130, 18, 'épicerie', 'fleur de sel de camargue', 'kg', 0, '38.00'),
(131, 18, 'épicerie', 'Sucre semoule', 'kg', 0, '0.54'),
(132, 18, 'épicerie', 'Chocolat blanc', 'kg', 0, '5.35'),
(133, 18, 'épicerie', 'Chocolat lait suprème belcolade', 'kg', 0, '5.35'),
(134, 18, 'épicerie', 'Fleur de cao', 'kg', 0, '67.34'),
(135, 18, 'épicerie', 'Glucose', 'kg', 0, '3.89'),
(136, 18, 'épicerie', 'Cacao poudre', 'kg', 0, '7.42'),
(137, 18, 'épicerie', 'Gélatine (feuille de 2g)', 'kg', 0, '29.70'),
(138, 18, 'épicerie', 'Vanille gousses', 'P', 0, '2.20'),
(139, 18, 'épicerie', 'Poudre d\'amande', 'kg', 0, '7.11'),
(140, 18, 'épicerie', 'Spigol', 'kg', 0, '269.40'),
(141, 18, 'épicerie', 'Baking Power', 'kg', 0, '4.99'),
(142, 18, 'épicerie', 'Jus d\'orange', 'L', 0, '1.70'),
(143, 18, 'épicerie', 'Sirop basilic', 'kg', 0, '7.45'),
(144, 18, 'épicerie', 'Sucre glace', 'kg', 0, '1.50'),
(145, 18, 'épicerie', 'Beurre de cacao', 'kg', 0, '21.00'),
(146, 18, 'épicerie', 'Nappage neutre', 'kg', 0, '10.00'),
(147, 18, 'épicerie', 'Colorant jaune en poudre', 'kg', 0, '124.00'),
(148, 18, 'épicerie', 'Chocolat noir ariaga', 'kg', 0, '5.25'),
(149, 18, 'épicerie', 'Stabilisateur', 'kg', 0, '50.00'),
(150, 18, 'épicerie', 'Sachet de vanille', 'U', 0, '1.50'),
(151, 18, 'épicerie', 'Cacao poudre', 'kg', 0, '9.00'),
(152, 18, 'épicerie', 'Praliné amande noisette', 'kg', 0, '19.90'),
(153, 18, 'épicerie', 'Feuillantine', 'kg', 0, '12.00'),
(154, 18, 'épicerie', 'Genduja', 'kg', 0, '29.70'),
(155, 18, 'épicerie', 'Café soluble', 'kg', 0, '35.00'),
(156, 18, 'épicerie', 'Amaretto', 'L', 0, '30.00'),
(157, 18, 'épicerie', ' Boudoir carton de 240P', 'U', 0, '13.35'),
(158, 18, 'épicerie', 'Café grains', 'kg', 0, '12.00'),
(159, 18, 'épicerie', 'Pate de marron imbert', 'kg', 0, '11.00'),
(160, 18, 'épicerie', 'Noisettes', 'kg', 0, '12.00'),
(161, 18, 'épicerie', 'Pure pâte de pistache', 'kg', 0, '40.00'),
(162, 18, 'épicerie', 'Pâte de pistche aromatisée colorée', 'kg', 0, '39.00'),
(163, 18, 'épicerie', 'Sucre casonade', 'kg', 0, '1.50'),
(164, 18, 'épicerie', 'Poudre de Noisette grise', 'kg', 0, '12.00'),
(165, 18, 'épicerie', 'Pistache entière', 'kg', 0, '13.00'),
(166, 18, 'épicerie', 'Arome Hibiscus', 'kg', 0, '34.00'),
(167, 18, 'épicerie', 'Poudre à crème', 'kg', 0, '6.69'),
(168, 18, 'épicerie', 'Colorant rouge', 'kg', 0, '124.00'),
(169, 18, 'épicerie', 'Fève tonga', 'kg', 0, '150.00'),
(170, 18, 'épicerie', 'Rhum', 'L', 0, '25.00'),
(171, 18, 'épicerie', 'Extrait de vanille', 'kg', 0, '23.00'),
(172, 18, 'épicerie', 'Amandes amère', 'kg', 0, '32.00'),
(173, 18, 'épicerie', 'Farine de riz', 'kg', 0, '3.00'),
(174, 18, 'épicerie', 'Pate de noisette', 'kg', 0, '22.00'),
(175, 18, 'épicerie', 'Poudre de pistache', 'kg', 0, '50.00'),
(176, 18, 'épicerie', 'jus de pommes', 'L', 0, '1.80'),
(177, 18, 'épicerie', 'Feuilletage', 'kg', 0, '7.33'),
(178, 18, 'épicerie', 'Trimoline', 'kg', 0, '11.50'),
(179, 18, 'épicerie', 'Fond de tarte', 'P', 0, '0.45'),
(180, 18, 'épicerie', 'Amandes mondées', 'kg', 0, '18.00'),
(181, 18, 'épicerie', 'Kahlua', 'L', 0, '16.18'),
(182, 18, 'épicerie', 'Pectine NH', 'kg', 0, '37.80'),
(183, 18, 'épicerie', 'Farine traité thermiquement', 'kg', 0, '1.00'),
(184, 18, 'épicerie', 'Anis étoilé', 'kg', 0, '37.80'),
(185, 18, 'épicerie', 'Cannelle moulue', 'kg', 0, '13.51'),
(186, 18, 'épicerie', 'Pruneaux', 'kg', 0, '7.90'),
(187, 18, 'épicerie', 'Amandes batonnets', 'kg', 0, '13.07'),
(188, 18, 'épicerie', 'Noix de pécan', 'kg', 0, '24.99'),
(189, 18, 'épicerie', 'Figues séchées', 'kg', 0, '15.80'),
(191, 18, 'épicerie', 'Vergeoise', 'kg', 0, '3.08'),
(192, 18, 'épicerie', 'Spéculos', 'kg', 0, '7.96'),
(193, 18, 'épicerie', 'Fructose', 'kg', 0, '3.50'),
(194, 18, 'épicerie', 'Brownies', 'kg', 0, '14.00'),
(195, 18, 'épicerie', 'Amandes hachées', 'kg', 0, '8.90'),
(196, 18, 'épicerie', 'Noisettes hachées', 'kg', 0, '14.90'),
(197, 18, 'épicerie', 'Paprika', 'kg', 0, '11.00'),
(198, 18, 'épicerie', 'Sorbitol', 'kg', 0, '12.51'),
(199, 18, 'épicerie', 'Fleur d’oranger', 'kg', 0, '10.95'),
(200, 18, 'épicerie', 'Grisettes de Montpellier', 'kg', 0, '17.00'),
(201, 18, 'épicerie', 'Poudre de réglisse', 'kg', 0, '28.00'),
(202, 18, 'épicerie', 'Orange confite', 'kg', 0, '17.99'),
(203, 18, 'épicerie', 'Grand Marnier', 'kg', 0, '22.90'),
(204, 18, 'épicerie', 'Huile de citron', 'kg', 0, '90.00'),
(205, 18, 'épicerie', 'Citron confit', 'kg', 0, '8.50'),
(206, 18, 'épicerie', 'Blanc d’oeuf en poudre', 'kg', 1, '20.47'),
(207, 18, 'épicerie', 'Colorant vert en poudre', 'kg', 0, '150.00'),
(208, 18, 'épicerie', 'Weck entrée /dessert', 'U', 0, '0.69'),
(209, 18, 'épicerie', 'Weck plat', 'U', 0, '0.74'),
(210, 18, 'épicerie', 'compote de pomme', 'kg', 0, '2.15'),
(211, 18, 'épicerie', 'Sorbet fraise', 'kg', 0, '17.90'),
(212, 18, 'épicerie', 'Glace otantic 2,5L', 'U', 0, '10.90'),
(213, 18, 'épicerie', 'Purée mangue', 'kg', 0, '7.00'),
(214, 18, 'épicerie', 'Purée de citron jaune', 'kg', 0, '7.00'),
(215, 18, 'épicerie', 'Purée coco', 'kg', 0, '7.00'),
(216, 18, 'épicerie', 'Purée fruits rouges', 'kg', 0, '7.00'),
(217, 18, 'épicerie', 'jus de pomme', 'L', 0, '1.05'),
(218, 18, 'épicerie', 'Purée de framboise', 'kg', 0, '7.00'),
(219, 18, 'épicerie', 'Purée passion', 'kg', 0, '7.00'),
(220, 18, 'épicerie', 'Purée Myrtille', 'kg', 0, '7.00'),
(221, 18, 'épicerie', 'Purée de banane', 'kg', 0, '7.00'),
(222, 18, 'épicerie', 'Purée de leetchi', 'kg', 0, '7.00'),
(223, 18, 'épicerie', 'Purée de citron vert', 'kg', 0, '7.00'),
(224, 18, 'épicerie', 'purée de cranberry', 'kg', 0, '7.00'),
(225, 18, 'épicerie', 'Boite blanche', 'U', 0, '0.59'),
(226, 18, 'épicerie', 'Plateau carton', 'U', 0, '0.36'),
(227, 18, 'épicerie', 'Pique bambou', 'U', 0, '0.01'),
(228, 18, 'épicerie', 'Carton', 'U', 0, '0.50'),
(229, 18, 'épicerie', 'Barquette thermoscellées', 'U', 0, '0.07'),
(230, 18, 'épicerie', 'Barquettes alu 2250ml', 'U', 0, '0.28'),
(231, 18, 'épicerie', 'Sac pour arrancini', 'U', 0, '0.30'),
(232, 18, 'épicerie', 'Eau', 'L', 0, '0.18'),
(233, 18, 'épicerie', 'oeufs', 'U', 1, '0.16'),
(234, 18, 'épicerie', 'Beurre pour plaque', 'kg', 0, '7.63'),
(235, 18, 'épicerie', 'jaunes', 'U', 0, '1.00'),
(236, 18, 'épicerie', 'sucre', 'kg', 0, '0.74'),
(237, 18, 'épicerie', 'blancs d\'oeufs', 'P', 1, '0.17'),
(238, 14, 'viande', 'Foie gras', 'kg', 0, '63.45'),
(239, 18, 'épicerie', 'lentilles préparées', 'B', 0, '1.69'),
(240, 18, 'épicerie', 'Cerfeuil', 'Botte', 0, '1.19'),
(241, 18, 'épicerie', 'pois cassés', 'kg', 0, '1.59'),
(242, 14, 'viande', 'poitrine de port demi sel', 'kg', 0, '10.18'),
(243, 18, 'épicerie', 'vert de poireau', 'kg', 0, '1.20'),
(244, 18, 'épicerie', 'Bouquet garni', 'PM', 0, '1.00'),
(245, 15, 'crustacés et poisson', 'Langoustines', 'P', 0, '13.00'),
(246, 18, 'épicerie', 'pain de mie', 'kg', 0, '1.00'),
(247, 18, 'épicerie', 'sel gros', 'kg', 0, '0.66'),
(248, 17, 'fruits/légumes', 'tomates grappes', 'kg', 0, '2.65'),
(249, 18, 'épicerie', 'Fond blanc de veau', 'kg', 0, '8.83');

-- --------------------------------------------------------

--
-- Structure de la table `ingredientdansrecette`
--

CREATE TABLE `ingredientdansrecette` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ingredientdansrecette`
--

INSERT INTO `ingredientdansrecette` (`idRecette`, `idIngredient`, `quantiteIngredient`) VALUES
(33, 126, '0.01'),
(33, 131, '0.01'),
(33, 46, '0.08'),
(33, 119, '0.13'),
(33, 232, '0.25'),
(33, 233, '4.00'),
(33, 48, '0.50'),
(33, 235, '4.00'),
(33, 131, '0.10'),
(33, 167, '0.04'),
(33, 138, '1.00'),
(33, 137, '2.00'),
(33, 236, '0.10'),
(33, 237, '8.00'),
(33, 131, '0.00'),
(33, 234, '0.00'),
(40, 248, '2.50'),
(40, 59, '0.30'),
(40, 70, '0.01'),
(40, 93, '0.00'),
(40, 89, '0.15'),
(40, 62, '0.30'),
(40, 59, '0.10'),
(40, 248, '0.30'),
(40, 70, '0.00'),
(40, 78, '1.00'),
(40, 72, '1.00'),
(40, 93, '0.00'),
(40, 67, '1.00'),
(40, 70, '0.00'),
(40, 67, '1.00'),
(40, 233, '3.00'),
(40, 93, '0.00'),
(40, 89, '0.00'),
(40, 78, '1.00'),
(40, 126, '0.00'),
(40, 129, '0.00'),
(40, 128, '0.00'),
(42, 89, '0.15'),
(42, 61, '0.30'),
(42, 59, '0.30'),
(42, 104, '0.25'),
(42, 105, '0.20'),
(42, 72, '1.00'),
(42, 70, '0.02'),
(42, 93, '0.00'),
(42, 106, '0.00'),
(42, 52, '1.00'),
(42, 70, '0.00'),
(42, 89, '0.10'),
(42, 90, '0.15'),
(42, 75, '1.50'),
(42, 126, '0.00'),
(42, 128, '0.00'),
(44, 73, '0.04'),
(44, 52, '4.00'),
(44, 46, '0.25'),
(44, 240, '1.00'),
(44, 73, '0.05'),
(44, 89, '0.00'),
(44, 70, '0.00'),
(44, 72, '0.00'),
(44, 75, '2.00'),
(44, 46, '0.05'),
(44, 119, '0.00'),
(44, 67, '1.00'),
(44, 126, '0.00'),
(36, 238, '1.00'),
(36, 64, '5.00'),
(36, 46, '0.10'),
(36, 239, '1.00'),
(36, 38, '0.15'),
(36, 47, '0.30'),
(36, 240, '1.00'),
(36, 126, '0.00'),
(36, 129, '0.00'),
(38, 107, '0.70'),
(38, 46, '0.04'),
(38, 242, '0.10'),
(38, 243, '0.08'),
(38, 61, '0.08'),
(38, 59, '0.08'),
(38, 72, '1.00'),
(38, 70, '0.01'),
(38, 47, '0.08'),
(38, 240, '1.00'),
(38, 46, '0.05'),
(38, 245, '24.00'),
(38, 246, '0.10'),
(38, 46, '0.08'),
(38, 89, '0.02'),
(38, 126, '0.00'),
(38, 247, '0.00'),
(38, 129, '0.00'),
(38, 249, '2.00');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `idTypeRecette` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL,
  `nomRecette` varchar(100) NOT NULL,
  `nombrePortion` int(11) NOT NULL,
  `descriptif` varchar(2000) NOT NULL,
  `progression` varchar(10000) NOT NULL,
  `prixMainOeuvre` decimal(10,2) NOT NULL,
  `multiplicateur` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `idTypeRecette`, `idAuteur`, `nomRecette`, `nombrePortion`, `descriptif`, `progression`, `prixMainOeuvre`, `multiplicateur`) VALUES
(33, 7, 5, 'Saint Honoré', 10, '          Saint Honoré                         ', 'Mise en place du poste de travail.(5\') \r\nRéaliser les pesées.(10\') \r\n\r\n1)Réaliser la base du Saint Honoré :(30\') \r\n*Réaliser la pâte à choux. \r\n*Découper un disque de pâte feuilletée, le piquer des deux côtés. *Disposer une couronne de pâte à choux à 1 cm du bord du feuilletage. \r\n*Couché le reste de pâte en petits choux. \r\n*Cuire séparément au four à 200°C et terminer à 180°C. \r\n*Réserver sur grille après cuisson. \r\n\r\n2)Réaliser la crème Chiboust :(30\') \r\n*Réaliser une crème pâtissière, la coller à l’aide de la gélatine. *Monter les blancs d’œufs en neige, serrer avec le sucre (meringue française). \r\n*Incorporer à la crème pâtissière délicatement la meringue française. \r\n\r\n3)Monter le Saint Honoré(15\') \r\n*Garnir la fond de tarte avec la Chiboust, décorer à la douille à Saint Honoré. Réserver. \r\n*Garnir les choux à la crème Chiboust et les glacer au caramel blond. \r\n*Avec le reste de caramel réaliser des cheveux d’ange. \r\n\r\n4)Dresser :(5\') \r\nSur carton et papier dentelle.\r\n\r\n\r\n                                                                                  ', '17.42', '1.43'),
(36, 9, 8, 'Escalope de foie gras de canard poêlé, crème de lentilles, poire rôtie', 10, 'Escalope de foie gras de canard poêlé, crème de lentilles, poire rôtie                                            ', '                                                \r\nMettre en place le poste de travail.\r\n\r\nRéaliser les préliminaires légumes.\r\n\r\n1/ Foie gras sauté.\r\n* Parer les foies de canard, dénerver partiellement.\r\n* Escaloper le foie gras, le faire sauter rapidement à sec. Assaisonner, réserver.\r\n\r\n\r\n2/ Réaliser les poires rôties.\r\n* Couper les poires en deux les évider.\r\n* Les émincer et les disposer sur une plaque gastro beurré.\r\n* Cuire au four à 140°C.\r\n\r\n3/ Crème de lentilles :\r\n* Sauter la poitrine fumée détaillée en lardons dans un sautoir.\r\n* Ajouter les lentilles préparées.\r\n* Crémer.\r\n* Mixer et passer au chinois, rectifier et réserver au bain marie.\r\n\r\n6/ Finition.\r\n* Pluche de cerfeuil.\r\n\r\n7/ Dresser et envoyer selon les consignes du chef.\r\n\r\n                                                                                    ', '20.00', '1.43'),
(38, 10, 10, 'Potage Saint Germain aux langoustines', 10, 'Potage Saint Germain aux langoustines                                            ', '                                                                                                \r\n1/ Mise en place du poste de travail.\r\n\r\n2/ Réaliser le potage Saint Germain.\r\n* Blanchir les pois cassés. Départ à froid après les avoir lavés. \r\n* Rafraîchir, égoutter.\r\n\r\n* Détailler la poitrine en lardons et blanchir départ à froid, égoutter.\r\n\r\n* Tailler en fine mirepoix les carottes et oignons, émincer finement le vert de poireau.\r\n\r\n* Raidir les lardons au beurre, ajouter verts de poireau, carottes et oignons, faire suer quelques minutes (sans coloration).\r\n* Ajouter les pois cassés.\r\n* Mouiller au fond blanc de veau froid.\r\n* Ajouter l’ail et le bouquet garni.\r\n* Cuire doucement et régulièrement à couvert environ 45 minutes. \r\n* Saler au gros sel en fin de cuisson.\r\n\r\n* Eliminer le bouquet garni, mixer, passer au chinois en foulant.\r\n* Crèmer, porter à ébullition.\r\n* Vérifier l’onctuosité et l’assaisonnement.\r\n* Réserver au bain marie.\r\n* Tamponner au beurre et couvrir\r\n\r\n\r\n3/ Préparer les garnitures.\r\nDétailler le pain de mie en croûtons et faire sauter au beurre plus huile jusqu’à coloration.\r\n\r\nChâtrer les langoustines et les faire sauter rapidement, décortiquer et réserver.\r\n\r\n\r\n4/ Décoration.\r\n* Pluche de cerfeuil, moules en coquilles.\r\n\r\n5/ Dresser.\r\n\r\n* En fonction des consignes du chef\r\n                                                                                                                            ', '20.00', '1.43'),
(40, 10, 12, 'Gaspacho et sorbet aux herbes, gambas en craquant ', 10, 'Gaspacho et sorbet aux herbes, gambas en craquant d’épices                                            ', '                        Mise en place du poste de travail.\r\nPréliminaires légumes.\r\n\r\n1/Réaliser le gaspacho :\r\n* Monder les tomates et les épépiner.\r\n* Peler les concombres.\r\n* Epépiner les poivrons.\r\n* Broyer les tomates, les concombres, les poivrons, les oignons, ajouter ail haché, piment d’Espelette, vinaigre de Xérès, laisser reposer au frais 1 heure.\r\n* Passer au chinois en foulant fortement, rectifier l’assaisonnement et ajouter l’huile d’olive en l’émulsifiant.\r\n* Réserver au frais.\r\n\r\n2/Réaliser la Bohémienne de légumes :\r\n* Tailler les poivrons et les courgettes en brunoise.\r\n* Ciseler les oignons.\r\n* Sauter à l’huile d’olive les légumes séparément.\r\n* Regrouper ensuite dans un sautoir les légumes avec les tomates tailler en brunoise, le bouquet garni, l’ail haché et le basilic ciselé.\r\n* Assaisonner et terminer la cuisson à couvert quelques minutes.\r\n* Vérifier l’assaisonnement et refroidir en cellule.\r\nl\r\n3/Réaliser le sorbet aux herbes :\r\n* ajouter au fromage blanc la ciboulette ciselée, le jus de citron et une pointe d’ail en purée.\r\n* Assaisonner et turbiner. Réserver au congélateur.\r\n\r\n4/Confectionner les gambas en craquant :\r\n* Décortiquer les gambas.\r\n* Les arroser d’un filet de jus de citron.\r\n* Les assaisonner sel et piment d’Espelette.\r\n* Les tremper dans l’anglaise puis dans de la chapelure de pain d’épices.\r\n* Les sauter vivement à l’huile d’olive et les égoutter.\r\n* Utiliser aussitôt.\r\n\r\nFinition :\r\n* pluches de basilic.\r\n\r\nDresser et envoyer :\r\n* En fonction des consignes du chef.\r\n\r\n                                                                ', '20.00', '1.43'),
(42, 10, 14, 'Rouille de seiche à la Sétoise', 10, 'Rouille de seiche à la Sétoise                                            ', '                        Désinfection et mise en place du plan de travail.\r\nRéaliser les préliminaires légumes.\r\n\r\n\r\n1/Réaliser la rouille à la sétoise :\r\n\r\n•	Parer les blancs de seiche et les découper en cube.\r\n•	Faire sauter vivement les blancs de seiche afin d’éliminer la première eau. Réserver.\r\n\r\n•	Suer à l’huile d’olive les carottes et oignons émincés, ajouter le jambon taillé en dés.\r\n•	Déglacer au vin blanc, réduire à sec.\r\n•	Ajouter le concentré de tomate le caraméliser légèrement.\r\n•	Ajouter les tomates épépinées et concassées.\r\n•	Mouiller à l’eau ou au fumet de poisson à hauteur.\r\n•	Ajouter le bouquet garni, safran et piment d’Espelette.\r\n•	Cuire 40’ a petite ébullition.\r\n•	Passer au moulin à  légumes en prenant soin d’éliminer le BG.\r\n\r\n•	Remettre à cuire la sauce avec les blancs de seiche. Cuire 1h30 minimum. Rectifier en safran et piment si necessaire.\r\n\r\n\r\n2/Réaliser la sauce rouille :\r\n•	Confectionner une mayonnaise, ajouter l’ail écrasé et haché, la pulpe de pomme de terre, et l’huile rouge récupérée de la cuisson des seiche.\r\n•	Réserver.\r\n\r\n\r\n\r\n\r\n\r\n\r\n3/Confectionner la garniture.\r\n•	Tailler les pommes de terre en coin de rue et cuire à l’anglaise.\r\n•	Réserver.\r\n•	\r\n\r\n4/Dresser et envoyer :\r\n•	Lier la rouille de seiche avec la sauce rouille, éviter de faire bouillir.\r\n•	Dresser en fonction des consignes du chef.	\r\n                                                                ', '20.00', '1.43'),
(44, 10, 16, 'Côte de boeuf sauce Choron, terrine de pommes de terre', 8, 'Côte de boeuf sauce Choron, terrine de pommes de terre, artichauts sautés                                            ', '                                                Mettre en place le poste de travail.(5\')\r\nRéaliser les préliminaires légumes.\r\n\r\n\r\n1/Préparer les côtes de boeuf :(20\')\r\n Parer les côtes de boeuf réserver.\r\n Les faire sauter au moment du service.\r\n\r\n2/Réaliser la sauce Choron :(20\')\r\n Réaliser la réduction :\r\n    Réunir dans une sauteuse les échalotes ciselées, la moitié de l’estragon ciselé, le poivre en grain concassé (mignonnette), ajouter le vinaigre d’alcool et laisser réduire à sec.\r\n    Laisser refroidir la réduction.\r\n Confectionner une concassée de tomate :\r\n    Monder et épépiner les tomate, les concasser.\r\nSuer à l’huile d’olive les échalotes ciselées.\r\n    Ajouter la tomate concassée, l’ail écrasé et le BG, couvrir de papier sulfurisé et cuire à feu doux, jusqu’à évaporation de l’eau de végétation.\r\n\r\n Confectionner la sauce Choron (au moment service) :\r\n    Clarifier les œufs, les ajouter à la réduction.\r\n    Ajouter 0.02 l d’eau, monter sur feu doux en sabayon.\r\nSaler et incorporer progressivement le beurre clarifié et décanté hors du feu.\r\n    Ajouter la concassée de tomate.\r\n    Passer la sauce au chinois, ajouter le reste d’estragon et de cerfeuil, réserver dans un bain marie à sauce à couvert dans un endroit tiède ou servir immédiatement.\r\n\r\n Garnitures :\r\n    Cuire dans un blanc les fonds d’artichauts.\r\n    Détailler en quartier.\r\n    Sauter au beurre.\r\n\r\n    Emincer les pommes de terre à la mandoline.(30\')\r\nChemiser un gastro de papier sulfurisé graissé. \r\n    Disposer des couches de PDT harmonieusement, en prenant soin de saler et poivrer, et de nourrir à la graisse de canard.\r\nCuire au four à 140°C.\r\n    Après cuisson refroidir rapidement, démouler et tailler suivant les consignes du chef.\r\n\r\n4/Dresser et envoyer en fonction des consignes du chef.(3\')\r\n                                                                                    ', '20.00', '1.43');

-- --------------------------------------------------------

--
-- Structure de la table `recettedansrecette`
--

CREATE TABLE `recettedansrecette` (
  `idRecetteMere` int(11) NOT NULL,
  `idRecetteFille` int(11) NOT NULL,
  `quantiteRecette` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `nomTVA` varchar(50) NOT NULL,
  `tauxTVA` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`nomTVA`, `tauxTVA`) VALUES
('cremerie', '5.50'),
('crustacés et poisson', '10.00'),
('épicerie', '5.50'),
('fruits/légumes', '10.00'),
('viande', '10.00'),
('vin', '20.00');

-- --------------------------------------------------------

--
-- Structure de la table `typeingredient`
--

CREATE TABLE `typeingredient` (
  `idTypeIngredient` int(11) NOT NULL,
  `nomTypeIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeingredient`
--

INSERT INTO `typeingredient` (`idTypeIngredient`, `nomTypeIngredient`) VALUES
(14, 'VIANDES / VOLAILLES'),
(15, 'POISSON ET CRUSTACES'),
(16, 'CREMERIE'),
(17, 'FRUITS ET LEGUMES'),
(18, 'EPICERIE');

-- --------------------------------------------------------

--
-- Structure de la table `typerecette`
--

CREATE TABLE `typerecette` (
  `idTypeRecette` int(11) NOT NULL,
  `nomTypeRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typerecette`
--

INSERT INTO `typerecette` (`idTypeRecette`, `nomTypeRecette`) VALUES
(7, 'Dessert'),
(9, 'Dîner'),
(10, 'Déjeuner');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idAuteur`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `TVA` (`idTVA`),
  ADD KEY `typeIngredient` (`idTypeIngredient`);

--
-- Index pour la table `ingredientdansrecette`
--
ALTER TABLE `ingredientdansrecette`
  ADD KEY `recette` (`idRecette`),
  ADD KEY `ingredient` (`idIngredient`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `typeRecette` (`idTypeRecette`),
  ADD KEY `auteur` (`idAuteur`);

--
-- Index pour la table `recettedansrecette`
--
ALTER TABLE `recettedansrecette`
  ADD KEY `recetteMere` (`idRecetteMere`),
  ADD KEY `recetteFille` (`idRecetteFille`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`nomTVA`);

--
-- Index pour la table `typeingredient`
--
ALTER TABLE `typeingredient`
  ADD PRIMARY KEY (`idTypeIngredient`);

--
-- Index pour la table `typerecette`
--
ALTER TABLE `typerecette`
  ADD PRIMARY KEY (`idTypeRecette`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auteur`
--
ALTER TABLE `auteur`
  MODIFY `idAuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `typeingredient`
--
ALTER TABLE `typeingredient`
  MODIFY `idTypeIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `typerecette`
--
ALTER TABLE `typerecette`
  MODIFY `idTypeRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `tva` FOREIGN KEY (`idTVA`) REFERENCES `tva` (`nomTVA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeIngredient` FOREIGN KEY (`idTypeIngredient`) REFERENCES `typeingredient` (`idTypeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ingredientdansrecette`
--
ALTER TABLE `ingredientdansrecette`
  ADD CONSTRAINT `ingredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `auteur` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `typeRecette` FOREIGN KEY (`idTypeRecette`) REFERENCES `typerecette` (`idTypeRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recettedansrecette`
--
ALTER TABLE `recettedansrecette`
  ADD CONSTRAINT `recetteFille` FOREIGN KEY (`idRecetteFille`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recetteMere` FOREIGN KEY (`idRecetteMere`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
