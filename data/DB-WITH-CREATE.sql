-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 juin 2024 à 09:04
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portal_oop`
--
CREATE DATABASE IF NOT EXISTS `portal_oop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `portal_oop`;

-- --------------------------------------------------------

--
-- Structure de la table `devlog`
--

DROP TABLE IF EXISTS `devlog`;
CREATE TABLE IF NOT EXISTS `devlog` (
  `dev_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `dev_date` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dev_log` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dev_visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dev_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `devlog`
--

INSERT INTO `devlog` (`dev_id`, `dev_date`, `dev_log`, `dev_visible`) VALUES
(1, '29/02/2024', 'Registered Domain', 0),
(2, '01/03/2024', 'Created Portal Home Page', 1),
(3, '02/03/2024', 'Started Contact Page', 1),
(4, '04/03/2024', 'Started Reply Field', 1),
(5, '06/03/2024', 'Finished Reply Field', 1),
(6, '18/05/2024', 'This is a test of Log Input', 0),
(7, '07/03/2024', 'Started Card Game', 1),
(8, '09/03/2024', 'Finished Card Game', 1),
(9, '09/03/2024', 'Started Dev Log', 1),
(10, '10/03/2024', 'Started new project. Tabs', 1),
(11, '11/03/2024', 'Changed SQL to JOIN', 1),
(12, '12/03/2024', 'Changed PHP query to prepare', 1),
(13, '13/03/2024', 'Added Pages to Countries', 1),
(14, '14/03/2024', 'Select Amount to display to Countries', 1),
(15, '15/03/2024', 'Added SortBy to Countries', 1),
(16, '16/03/2024', 'Complete rewrite of Countries, fully working', 1),
(17, '20/03/2024', 'Made Tabs Page visible and protected the AddTab page', 1),
(18, '21/03/2024', 'Moved Tabs and Maps into their own folders (local, Git and Site)', 1),
(19, '23/03/2024', 'Completed Tabs Project including homemade SlugMaker', 1),
(20, '24/03/2024', 'Rebuilt tabs to improve DB efficiency', 1),
(21, '26/03/2024', 'Completed New Tabs. Now online', 1),
(22, '05/04/2024', 'Working on School Projects : Completed questionnaire &amp;lpar;for MP&amp;rpar;', 1),
(23, '10/04/2024', 'Working on School Projects : Completed Company &amp;lpar;for AP&amp;rpar;', 1),
(24, '21/04/2024', 'Added new Session, CRUD, Bootstrap and Map project', 1),
(25, '29/04/2024', 'Working on TI3', 1),
(26, '06/05/2024', 'Rewrote homepage CSS to improve responsiveness', 0),
(27, '07/05/2024', 'Completely changed backend of site', 0),
(28, '09/05/2024', 'Added TI3 to site', 0),
(29, '16/05/2024', 'Added Image resize to backend', 1),
(30, '18/05/2024', 'Added Trivia Quiz game', 0);

-- --------------------------------------------------------

--
-- Structure de la table `global_css`
--

DROP TABLE IF EXISTS `global_css`;
CREATE TABLE IF NOT EXISTS `global_css` (
  `global_id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `global_selector` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `global_value` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `global_old_val` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `global_def_val` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`global_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `global_css`
--

INSERT INTO `global_css` (`global_id`, `global_selector`, `global_value`, `global_old_val`, `global_def_val`) VALUES
(1, 'backgroundColor', 'linear-gradient(180deg, hsla(208, 33%, 21%, 1) 0%, hsla(211, 36%, 46%, 1) 100%)', 'linear-gradient(180deg, hsla(208, 33%, 21%, 1) 0%, hsla(211, 36%, 46%, 1) 100%)', 'linear-gradient(180deg, hsla(208, 33%, 21%, 1) 0%, hsla(211, 36%, 46%, 1) 100%)'),
(2, 'font-family', 'Helvetica', 'Helvetica', 'Helvetica'),
(3, 'color', '#4ba0a0', '#4ba0a0', '#4ba0a0'),
(4, 'border-header', '2px solid red', '2px solid white', '2px solid  hsla(211, 36%, 46%, 1);'),
(5, 'box-shadow-header', '0px 4px 8px white, 0px 8px 16px white, 0px 16px 32px white, 0px 32px 64px white;', '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;', '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;'),
(6, 'border-field', '2px solid  hsla(211, 36%, 46%, 1);', NULL, '2px solid  hsla(211, 36%, 46%, 1);'),
(7, 'box-shadow-field', '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;', NULL, '0px 4px 8px black, 0px 8px 16px black, 0px 16px 32px black, 0px 32px 64px black;'),
(8, 'border-windows', '2px solid  hsla(211, 36%, 46%, 1);', NULL, '2px solid  hsla(211, 36%, 46%, 1);'),
(9, 'border-radius-windows', '0px;', '20px;', '20px;');

-- --------------------------------------------------------

--
-- Structure de la table `portals`
--

DROP TABLE IF EXISTS `portals`;
CREATE TABLE IF NOT EXISTS `portals` (
  `port_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `port_title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `port_description` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `port_img_src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `port_img_width` tinyint UNSIGNED NOT NULL DEFAULT '80',
  `port_img_width_type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `port_img_height` tinyint NOT NULL DEFAULT '30',
  `port_img_height_type` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `port_dest_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `port_visible` tinyint(1) NOT NULL DEFAULT '1',
  `port_placement` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`port_id`),
  UNIQUE KEY `placement` (`port_placement`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `portals`
--

INSERT INTO `portals` (`port_id`, `port_title`, `port_description`, `port_img_src`, `port_img_width`, `port_img_width_type`, `port_img_height`, `port_img_height_type`, `port_dest_url`, `port_visible`, `port_placement`) VALUES
(1, 'CRUD Project', 'Projet sur CRUD, Bootstrap et Leaflet', 'url(images/mapCard.png)', 80, '%', 30, 'vh', 'https://leerlandais.com/newCrud', 1, 0),
(2, 'Jeux du Mémoire', 'Crée 07/03/2024 - 09/03/2024', 'url(images/memCardGame.png)', 80, '%', 30, 'vh', 'https://leerlandais.com/portail/public/?p=cardgame', 1, 1),
(3, 'Countries', 'Un exercice sur les DB et PHP', 'url(images/ie.svg)', 80, '%', 30, 'vh', 'https://leerlandais.com/newMaps', 1, 3),
(78, 'Tabs', 'Un collection de mes tablatures préférés', 'url(images/guitar1.jpg)', 80, '%', 30, 'vh', 'https://leerlandais.com/newTabs', 1, 7),
(79, 'Site Préformation', 'Mon premier site. Fait pour le fin de notre préformation (17/11/2023)', 'url(images/cmdrPet.jpeg)', 80, '%', 30, 'vh', 'https://2023.webdev-cf2m.be/Lee/Site/', 1, 2),
(80, 'Premier Travail d&#039;Intégration', 'Notre premier test d&#039;intégration (14/12/2023)', 'url(images/TI1.png)', 80, '%', 30, 'vh', 'https://2023.webdev-cf2m.be/Lee/TI/public/', 1, 5),
(81, 'Deuxième Travail d&#039;Intégration', 'Le deuxième test d&#039;intégration (19/02/2024)', 'url(images/postit.jpeg)', 80, '%', 30, 'vh', 'https://2023.webdev-cf2m.be/Lee/TI2-HomeVersion/public/', 1, 8),
(82, 'GitHub', 'My GitHub', 'url(images/git_shadow.jpeg)', 80, '%', 30, 'vh', 'https://github.com/Leerlandais', 1, 9),
(83, 'Mes débuts avec JS', 'Mes premiers pas en JS (17/11/2023 - 22/12/2023)', 'url(images/javascript.jpeg)', 80, '%', 30, 'vh', 'https://2023.webdev-cf2m.be/Lee/javaStuff/', 1, 6),
(84, 'CF2M', 'Vers le site de l&#039;école', 'url(images/cf2m_logo.png)', 80, '%', 30, 'vh', 'https://www.cf2m.be/home', 1, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
