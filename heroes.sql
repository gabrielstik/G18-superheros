-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 10 Avril 2018 à 16:45
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
  `player_1_hand` varchar(90) NOT NULL,
  `player_2_hand` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `matches`
--

INSERT INTO `matches` (`id`, `in_progress`, `round`, `player_1`, `player_2`, `playing_player`, `player_1_hand`, `player_2_hand`) VALUES
(1, 1, 1, '41', '44', 41, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `level` int(11) NOT NULL DEFAULT '1',
  `folio` text NOT NULL,
  `deck` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `creation_date`, `alias`, `picture`, `wins`, `loses`, `money`, `rank`, `level`, `folio`, `deck`) VALUES
(41, 'admin', '$2y$10$kDU47kxA5vGKkKe0TEBZt.VMchSVNHXV9vP5pkSxNz6W194/P0DjS', 1523305282, 'admin', '', 0, 0, 10000, 0, 1, '', ''),
(44, 'azertyuiop', '$2y$10$gxilYe7eQbNc842yxHFgEuhn01HOR.gLzPjtgMgfdSKGwYEFKeuIK', 1523359719, 'azertyuiop', '', 0, 0, 10000, 0, 1, '', '');

--
-- Index pour les tables exportées
--

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
-- Index pour la table `shop`
--
ALTER TABLE `shop`
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
-- AUTO_INCREMENT pour la table `hands`
--
ALTER TABLE `hands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
