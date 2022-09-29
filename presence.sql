-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 19 sep. 2022 à 11:27
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `presence`
--

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `fnger_id` int(11) NOT NULL DEFAULT 0,
  `nom` varchar(20) NOT NULL,
  `postnom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `start_date` date NOT NULL DEFAULT current_timestamp(),
  `dellet` int(11) NOT NULL DEFAULT 1,
  `add_state` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agents`
--

INSERT INTO `agents` (`id`, `fnger_id`, `nom`, `postnom`, `prenom`, `genre`, `matricule`, `start_date`, `dellet`, `add_state`) VALUES
(27, 1, 'kadiata', 'yav', 'jonathan', 'homme', '18ky095', '2022-09-19', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `agent_log`
--

CREATE TABLE `agent_log` (
  `id_user_log` int(11) NOT NULL,
  `checkindate` date NOT NULL DEFAULT current_timestamp(),
  `agent_id` int(11) NOT NULL,
  `time_int` time NOT NULL DEFAULT current_timestamp(),
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agent_log`
--

INSERT INTO `agent_log` (`id_user_log`, `checkindate`, `agent_id`, `time_int`, `time_out`) VALUES
(25, '2022-09-19', 27, '13:18:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `pwd`) VALUES
(1, 'admin', 'admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent_log`
--
ALTER TABLE `agent_log`
  ADD PRIMARY KEY (`id_user_log`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `agent_log`
--
ALTER TABLE `agent_log`
  MODIFY `id_user_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent_log`
--
ALTER TABLE `agent_log`
  ADD CONSTRAINT `agent_log_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
