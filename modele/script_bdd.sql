-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 juin 2022 à 20:15
-- Version du serveur : 10.3.31-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfoliosio`
--

-- --------------------------------------------------------

--
-- Structure de la table `acquis`
--

CREATE TABLE `acquis` (
                          `id_projet` int(11) NOT NULL,
                          `id_competence` int(11) NOT NULL,
                          `description` text DEFAULT NULL,
                          `dateCreation` datetime DEFAULT NULL,
                          `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
                            `id` int(11) NOT NULL,
                            `intitule` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id`, `intitule`) VALUES
                                              (1, ' Activité 1.1. Gestion du patrimoine informatique'),
                                              (2, 'Activité 1.2. Réponse aux incidents et aux demandes d’assistance et d’évolution'),
                                              (3, 'Activité 1.3. Développement de la présence en ligne de l’organisation'),
                                              (4, 'Activité 1.4. Travail en mode projet'),
                                              (5, 'Activité 1.5. Mise à disposition des utilisateurs d’un service informatique'),
                                              (6, 'Activité 1.6. Organisation de son développement professionnel');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
                              `id` int(11) NOT NULL,
                              `id_activite` int(11) NOT NULL,
                              `intitule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `id_activite`, `intitule`) VALUES
                                                               (1, 1, 'Recensement et identification des ressources numériques'),
                                                               (2, 1, 'Exploitation des référentiels, normes et standards adoptés par le prestataire informatique'),
                                                               (3, 1, 'Mise en place et vérification des niveaux d’habilitation associés à un service'),
                                                               (4, 1, 'Vérification des conditions de la continuité d’un service informatique'),
                                                               (5, 1, 'Gestion des sauvegardes'),
                                                               (6, 1, 'Vérification du respect des règles d’utilisation des ressources numériques'),
                                                               (7, 2, 'Collecte, suivi et orientation des demandes'),
                                                               (8, 2, 'Traitement des demandes concernant les applicatifs, services réseau et système'),
                                                               (13, 4, 'Analyse des objectifs et des modalités d’organisation d’un projet'),
                                                               (14, 4, 'Planification des activités'),
                                                               (15, 4, 'Évaluation des indicateurs de suivi d’un projet et analyse des écarts'),
                                                               (16, 5, 'Test d’intégration et d’acceptation d’un service'),
                                                               (17, 5, 'Déploiement d’un service'),
                                                               (18, 5, 'Accompagnement des utilisateurs dans la mise en place d’un service'),
                                                               (19, 6, 'Mise en place de son environnement d’apprentissage personnel'),
                                                               (20, 6, 'Mise en œuvre d’outils et de stratégie veille informationnelle'),
                                                               (21, 6, 'Gestion de son identité professionnelle'),
                                                               (22, 6, 'Développement de son projet professionnel'),
                                                               (23, 2, 'Traiter des demandes concernant les applications'),
                                                               (24, 3, 'Participer à la valorisation de l’image de l’organisation sur les médias numériques en tenant compte'),
                                                               (25, 3, 'Référencer les services en ligne de l’organisation et mesurer leur visibilité'),
                                                               (26, 3, 'Participer à l’évolution d’un site Web exploitant les données de l’organisation');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
                        `id` int(11) NOT NULL,
                        `id_utilisateur` int(11) NOT NULL,
                        `cle` varchar(128) DEFAULT NULL,
                        `titre` varchar(128) DEFAULT NULL,
                        `contenu` text DEFAULT NULL,
                        `icone` char(32) DEFAULT NULL,
                        `dateModification` datetime DEFAULT NULL,
                        `dateCreation` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `id_utilisateur`, `cle`, `titre`, `contenu`, `icone`, `dateModification`, `dateCreation`) VALUES
    (16, 1, 'accueil', 'Accueil', '&lt;p&gt;Bienvenue sur l&amp;#39;application PortfolioSIO !&lt;/p&gt;\r\n\r\n&lt;p&gt;Cet outil &amp;agrave; destination des &amp;eacute;tudiants du BTS SIO, SISR et SLAM, permet de faciliter la r&amp;eacute;alisation de son portfolio pour l&amp;#39;&amp;eacute;preuve E4 qui consiste &amp;agrave; pr&amp;eacute;senter les comp&amp;eacute;tences acquises sur les deux ann&amp;eacute;es de la formation.&amp;nbsp;&amp;nbsp;&lt;/p&gt;\r\n', 'las la-home', '2022-06-21 16:22:41', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
                          `id` int(11) NOT NULL,
                          `id_utilisateur` int(11) NOT NULL,
                          `titre` varchar(128) DEFAULT NULL,
                          `image` varchar(128) DEFAULT NULL,
                          `logo` char(50) DEFAULT NULL,
                          `lieu` varchar(128) DEFAULT NULL,
                          `organisation` varchar(128) DEFAULT NULL,
                          `annee` varchar(128) DEFAULT NULL,
                          `contexte` text DEFAULT NULL,
                          `technologies` text DEFAULT NULL,
                          `liens` text DEFAULT NULL,
                          `dateCreation` datetime DEFAULT NULL,
                          `dateModification` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
                               `id` int(11) NOT NULL,
                               `mel` varchar(128) DEFAULT NULL,
                               `prenom` varchar(128) DEFAULT NULL,
                               `motDePasse` varchar(128) DEFAULT NULL,
                               `dateConnexion` datetime DEFAULT NULL,
                               `photo` varchar(128) DEFAULT NULL,
                               `nom` varchar(128) DEFAULT NULL,
                               `biographie` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mel`, `prenom`, `motDePasse`, `dateConnexion`, `photo`, `nom`, `biographie`) VALUES
    (1, 'admin@portfoliosio.fr', 'John', '$2y$10$bRkQXQMAg3U2hQavtIQele/YKt3fVk6dmSjRr0BkXENWc1.AeKWdi', NULL, 'P2706202220222022180655', 'Doe', 'Futur développeur en 2e année de BTS SIO en option SLAM.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acquis`
--
ALTER TABLE `acquis`
    ADD KEY `FK_ACQUIS_PROJET` (`id_projet`),
    ADD KEY `FK_ACQUIS_COMPETENCE` (`id_competence`);

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
    ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_COMPETENCE_ACTIVITE` (`id_activite`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_PAGE_UTILISATEUR` (`id_utilisateur`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_PROJET_UTILISATEUR` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acquis`
--
ALTER TABLE `acquis`
    ADD CONSTRAINT `FK_ACQUIS_COMPETENCE` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`ID`),
    ADD CONSTRAINT `FK_ACQUIS_PROJET` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`ID`) ON DELETE CASCADE;

--
-- Contraintes pour la table `competence`
--
ALTER TABLE `competence`
    ADD CONSTRAINT `FK_COMPETENCE_ACTIVITE` FOREIGN KEY (`ID_ACTIVITE`) REFERENCES `activite` (`ID`);

--
-- Contraintes pour la table `page`
--
ALTER TABLE `page`
    ADD CONSTRAINT `FK_PAGE_UTILISATEUR` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
    ADD CONSTRAINT `FK_PROJET_UTILISATEUR` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `utilisateur` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
