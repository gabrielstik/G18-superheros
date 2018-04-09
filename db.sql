-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 06 avr. 2018 à 16:53
-- Version du serveur :  5.6.38
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `partiel_stik`
--

-- --------------------------------------------------------

--
-- Structure de la table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `related_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `amount`, `category`, `date`, `related_user`) VALUES
(66, 'Courses pâques', 62, 'Courses', '2018-04-09', 'bruno'),
(67, 'Essence moto', 16, 'Station-service', '2018-04-09', 'bruno'),
(68, 'Cinéma', 5, 'Sorties', '2018-04-02', 'bruno'),
(69, 'Réservation vacances', 297, 'Vacances', '2018-04-09', 'bruno'),
(71, 'Shampoing', 4, 'Courses', '2018-04-05', 'bruno');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(7, 'bruno', '$2y$10$s9dDnD9L5eJ8Hwt.6Jkt0umglMl.T14YlemkmA2A1pobQasRd3xdK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
