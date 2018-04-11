-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 11 Avril 2018 à 14:01
-- Version du serveur :  10.0.32-MariaDB-0+deb8u1
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `heroes`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `api_id` int(11) NOT NULL,
  `rareness` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cards`
--

INSERT INTO `cards` (`id`, `api_id`, `rareness`, `price`) VALUES
(2, 4, 1, 100000),
(3, 14, 0, 40000),
(4, 29, 3, 1600000),
(5, 30, 1, 100000),
(6, 32, 3, 1600000),
(7, 35, 3, 1600000),
(8, 38, 2, 400000),
(9, 43, 2, 400000),
(10, 57, 0, 40000),
(11, 60, 1, 100000),
(12, 64, 1, 100000),
(13, 69, 1, 100000),
(14, 70, 3, 1600000),
(15, 71, 2, 400000),
(16, 76, 0, 40000),
(17, 80, 3, 1600000),
(18, 93, 0, 40000),
(19, 95, 1, 100000),
(20, 106, 2, 400000),
(21, 107, 2, 400000),
(22, 124, 1, 100000),
(23, 132, 0, 40000),
(24, 136, 3, 1600000),
(25, 145, 1, 100000),
(26, 149, 2, 400000),
(27, 152, 1, 100000),
(28, 156, 1, 100000),
(29, 157, 3, 1600000),
(30, 162, 3, 1600000),
(31, 172, 1, 100000),
(32, 194, 1, 100000),
(33, 195, 2, 400000),
(34, 201, 0, 40000),
(35, 204, 3, 1600000),
(36, 213, 3, 1600000),
(37, 216, 2, 400000),
(38, 218, 2, 400000),
(39, 222, 2, 400000),
(40, 224, 3, 1600000),
(41, 226, 3, 1600000),
(42, 230, 3, 1600000),
(43, 233, 3, 1600000),
(44, 234, 0, 40000),
(45, 235, 1, 100000),
(46, 242, 2, 400000),
(47, 251, 0, 40000),
(48, 260, 1, 100000),
(49, 266, 1, 100000),
(50, 267, 3, 1600000),
(51, 273, 3, 1600000),
(52, 274, 1, 100000),
(53, 278, 2, 400000),
(54, 280, 2, 400000),
(55, 284, 0, 40000),
(56, 298, 0, 40000),
(57, 303, 1, 100000),
(58, 305, 1, 100000),
(59, 306, 2, 400000),
(60, 309, 2, 400000),
(61, 311, 0, 40000),
(62, 321, 3, 1600000),
(63, 322, 0, 40000),
(64, 325, 2, 400000),
(65, 332, 2, 400000),
(66, 333, 1, 100000),
(67, 346, 2, 400000),
(68, 348, 1, 100000),
(69, 356, 3, 1600000),
(70, 359, 0, 40000),
(71, 367, 0, 40000),
(72, 368, 1, 100000),
(73, 370, 2, 400000),
(74, 385, 1, 100000),
(75, 386, 0, 40000),
(76, 387, 1, 100000),
(77, 423, 3, 1600000),
(78, 431, 1, 100000),
(79, 432, 0, 40000),
(80, 445, 0, 40000),
(81, 457, 0, 40000),
(82, 487, 2, 400000),
(83, 496, 1, 100000),
(84, 498, 3, 1600000),
(85, 505, 3, 1600000),
(86, 522, 1, 100000),
(87, 523, 2, 400000),
(88, 524, 2, 400000),
(89, 527, 3, 1600000),
(90, 528, 2, 400000),
(91, 538, 1, 100000),
(92, 542, 3, 1600000),
(93, 566, 1, 100000),
(94, 579, 3, 1600000),
(95, 594, 1, 100000),
(96, 598, 3, 1600000),
(97, 601, 2, 400000),
(98, 612, 3, 1600000),
(99, 620, 2, 400000),
(100, 622, 1, 100000),
(101, 630, 1, 100000),
(102, 632, 3, 1600000),
(103, 635, 0, 40000),
(104, 643, 2, 400000),
(105, 644, 3, 1600000),
(106, 645, 1, 100000),
(107, 655, 3, 1600000),
(108, 659, 2, 400000),
(109, 660, 1, 100000),
(110, 678, 0, 40000),
(111, 680, 3, 1600000),
(112, 684, 1, 100000),
(113, 687, 3, 1600000),
(114, 697, 2, 400000),
(115, 703, 0, 40000),
(116, 705, 3, 1600000),
(117, 710, 3, 1600000),
(118, 711, 0, 40000),
(119, 714, 1, 100000),
(120, 717, 3, 1600000),
(121, 718, 1, 100000),
(122, 720, 2, 400000),
(123, 723, 3, 1600000),
(124, 730, 2, 400000),
(125, 731, 1, 100000),
(126, 397, 3, 1600000);

-- --------------------------------------------------------

--
-- Structure de la table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `related_user` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `in_deck` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `collection`
--

INSERT INTO `collection` (`id`, `related_user`, `card_id`, `in_deck`) VALUES
(1, 41, 385, 1),
(2, 41, 527, 0),
(3, 44, 230, 0),
(4, 44, 322, 0);

-- --------------------------------------------------------

--
-- Structure de la table `hands`
--

CREATE TABLE `hands` (
  `id` int(11) NOT NULL,
  `related_match` int(11) NOT NULL,
  `related_round` int(11) NOT NULL,
  `related_player` int(11) NOT NULL,
  `hero_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `defense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hands`
--

INSERT INTO `hands` (`id`, `related_match`, `related_round`, `related_player`, `hero_id`, `position`, `defense`) VALUES
(1, 1, 1, 41, 385, 1, 70),
(2, 1, 1, 41, 527, 2, 70);

-- --------------------------------------------------------

--
-- Structure de la table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `in_progress` tinyint(1) NOT NULL DEFAULT '0',
  `round` int(11) NOT NULL DEFAULT '1',
  `player_1` varchar(50) NOT NULL,
  `player_2` varchar(50) NOT NULL,
  `playing_player` int(11) NOT NULL,
  `player_1_energy` int(11) NOT NULL DEFAULT '5',
  `player_2_energy` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matches`
--

INSERT INTO `matches` (`id`, `in_progress`, `round`, `player_1`, `player_2`, `playing_player`, `player_1_energy`, `player_2_energy`) VALUES
(1, 1, 1, '41', '44', 41, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `wins` int(11) NOT NULL,
  `loses` int(11) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '10000',
  `rank` int(11) NOT NULL,
  `xp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `creation_date`, `alias`, `picture`, `wins`, `loses`, `money`, `rank`, `xp`) VALUES
(41, 'admin', '$2y$10$kDU47kxA5vGKkKe0TEBZt.VMchSVNHXV9vP5pkSxNz6W194/P0DjS', 1523305282, 'admin', '', 0, 0, 10000, 0, 1),
(44, 'azertyuiop', '$2y$10$gxilYe7eQbNc842yxHFgEuhn01HOR.gLzPjtgMgfdSKGwYEFKeuIK', 1523359719, 'azertyuiop', '', 0, 0, 10000, 0, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hands`
--
ALTER TABLE `hands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT pour la table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `hands`
--
ALTER TABLE `hands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
