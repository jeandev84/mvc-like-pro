-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Sam 26 Octobre 2019 à 06:15
-- Version du serveur :  10.3.18-MariaDB-1:10.3.18+maria~bionic
-- Version de PHP :  7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvclikeprologin`
--

-- --------------------------------------------------------

--
-- Structure de la table `remembered_logins`
--

CREATE TABLE `remembered_logins` (
  `token_hash` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_hash` varchar(64) DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL,
  `activation_hash` varchar(64) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `password_reset_hash`, `password_reset_expires_at`, `activation_hash`, `is_active`) VALUES
(1, 'jean', 'john@gmail.com', '$2y$10$MMzVW/uOJEFKi1SuwTIo6.pPjQiy1Mr/3Eh5nYot9AhQR37bJj5kO', '39e626d055b60f221172a243a4149bf21228ceec8b56608597f29e877a3ed6eb', '2019-10-26 00:54:55', NULL, 1),
(2, 'jean1', 'jeanyao1@ymail.com', '$2y$10$HyDhWaNVFVfwrvQv/QMiN.bB3HqmX/srZLC./.N8nWslGr2QE3RfS', NULL, NULL, NULL, 0),
(3, 'max', 'test@ymail.com', '$2y$10$XvchJGIQnc8myBgYkstFauYgMgxprtq4Ti8VmEqoWQNoEoGTtMyC.', NULL, NULL, NULL, 0),
(5, 'marley', 'jeanyao34@yahoo.com', '$2y$10$H95yXzwp9wtRQEack4f9Xuom5UjSdL4HZjUigmz5mfXeoSyhuqfEG', NULL, NULL, NULL, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD PRIMARY KEY (`token_hash`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_hash` (`password_reset_hash`),
  ADD UNIQUE KEY `activation_hash` (`activation_hash`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD CONSTRAINT `remembered_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
