-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 27 avr. 2022 à 10:23
-- Version du serveur :  10.3.9-MariaDB-log
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zfl2-zgouhiean`
--

-- --------------------------------------------------------

--
-- Structure de la table `TJ_PRESNTE_PRE`
--

CREATE TABLE `TJ_PRESNTE_PRE` (
  `EXP_NUM` int(11) NOT NULL,
  `OEU_CODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `TJ_PRESNTE_PRE`
--

INSERT INTO `TJ_PRESNTE_PRE` (`EXP_NUM`, `OEU_CODE`) VALUES
(1, 1),
(2, 2),
(2, 3),
(4, 3),
(2, 4),
(4, 4),
(2, 5),
(4, 5),
(2, 6),
(4, 6),
(3, 7),
(5, 7),
(6, 7),
(3, 8),
(5, 8),
(3, 9),
(5, 9),
(3, 10),
(5, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(1, 16),
(1, 17);

-- --------------------------------------------------------

--
-- Structure de la table `T_ACTUALITE_ACT`
--

CREATE TABLE `T_ACTUALITE_ACT` (
  `ACT_NUM` int(11) NOT NULL,
  `ACT_TITRE` varchar(100) NOT NULL,
  `ACT_TEXTE` varchar(500) NOT NULL,
  `ACT_DATEPUBLICATION` datetime NOT NULL,
  `CPT_PSEUDO` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_ACTUALITE_ACT`
--

INSERT INTO `T_ACTUALITE_ACT` (`ACT_NUM`, `ACT_TITRE`, `ACT_TEXTE`, `ACT_DATEPUBLICATION`, `CPT_PSEUDO`) VALUES
(1, 'Début de l\'exposition notre expositions débute le 2022-01-31', 'Notre expositions débute le 2022-01-31,\r\nnous seront ravis de vous accueillir n\'hésitez pas à vous renseigner sur les différents exposants leur info sont dors et déjà disponible sur notre site internet dans l\'onglet présentation', '2022-01-26 00:00:00', 'KuGou'),
(2, 'Monochrome', 'L\'artiste Did Moreres sera présent à l\'expo au coté de ses oeuvres tout les jeudi, vendredi et samedi de 14h à 18h.\r\nN\'hésitez plus FONCEZ !', '2022-01-29 00:00:00', 'organisateur1'),
(3, 'Aide aux nouveau venus :\r\n', 'Pour toutes questions sur l\'organisation de l\'expo, l\'achat de ticket et les réservations, n\'hésitez pas à contacter Juliette Gouhier à l\'adresse mail expo.couleur2022@gmail.com', '2022-01-27 00:00:00', 'KuGou'),
(4, 'Petits rappels : ', 'Pour le bon déroulement de notre expo nous comptons sur votre participation quand au port du masque et au respect des différents gestes barrières que je ne vous rappellerais pas.', '2022-01-27 00:00:00', 'organisateur1'),
(5, 'Message de toute l\'équipe d\'organisation :', 'Nous sommes tous ravis de pouvoir prochainement vous accueillir, nos équipes et organisateurs travaillent tous mains dans la mains pour le bon déroulement de ce projet, à très bientôt !', '2022-01-27 00:00:00', 'KuGou'),
(7, 'Ouverture de l\'exposition', 'Notre expositions est maintenant ouverte, les billets sont à prendre à l\'entrée et la visite sera à vous ! Venez vite découvrir nos exposants pour des animations hautes en couleur !', '2022-04-01 00:00:00', 'organisateur2');

-- --------------------------------------------------------

--
-- Structure de la table `T_COMMENTAIRE_COM`
--

CREATE TABLE `T_COMMENTAIRE_COM` (
  `COM_NUM` int(11) NOT NULL,
  `COM_DATEHEURE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `COM_TEXT` varchar(500) NOT NULL,
  `VIS_NUM` int(11) NOT NULL,
  `COM_ETAT` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_COMMENTAIRE_COM`
--

INSERT INTO `T_COMMENTAIRE_COM` (`COM_NUM`, `COM_DATEHEURE`, `COM_TEXT`, `VIS_NUM`, `COM_ETAT`) VALUES
(2, '2022-02-23 22:00:00', 'Merveilleuse exposition de ******', 3, 'C'),
(3, '2022-04-12 12:03:00', 'Expo magnifique du début à la fin, passionnée de couleur et du voyage qu\'elle permettent j\'ai été émerveillé. Merci encore :)', 1, 'P'),
(4, '2022-04-12 12:03:05', 'J\'ai beaucoup apprécié cette exposition, j\'ai beaucoup appris et je tiens à remercier tout le personnel en charge pour le travail effectué', 6, 'P'),
(5, '2022-04-12 12:03:09', 'Je reste déçu de la mise en place de cet évènement, la présence du covid je l\'admet complique les choses.', 7, 'P'),
(6, '2022-04-12 12:03:14', 'J\'ai beaucoup apprécié le contact avec les exposants, venez vite découvrir cette expo !', 9, 'P'),
(28, '2022-04-14 11:24:48', 'Très beau site, ça me rappelle ma course poursuite en plein Paris, foutue peugeot 404.', 16, 'P'),
(30, '2022-04-26 12:14:16', 'test en cours', 27, 'P');

-- --------------------------------------------------------

--
-- Structure de la table `T_COMPTEUTILISATEUR_CPT`
--

CREATE TABLE `T_COMPTEUTILISATEUR_CPT` (
  `CPT_PSEUDO` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `CPT_MDP` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_COMPTEUTILISATEUR_CPT`
--

INSERT INTO `T_COMPTEUTILISATEUR_CPT` (`CPT_PSEUDO`, `CPT_MDP`) VALUES
('KuGou', '68a30d203a9a7849e859a8df62509048'),
('Noooooa', '4b96fc21160c8ab5279ac7a3b31e4d49'),
('bibi72', '66f3c8d0e65072baed118388982ed0d5'),
('gEstionnaire', '98abb15e560057e55e4e99187702ed4e'),
('organisateur1', 'a30363a61e2c427060bc08b7a4dc70b9'),
('organisateur2', 'eaa8f93c1a38feb409f4ae6e593c35d0'),
('organisateur3', '20af9919be8c06dd0221cf85d00aedcf'),
('organisateur4', 'ec392f3dac9fb60fa89b0c6ff0ed2b6f'),
('organisateur5', '6d3d49dc44abdf9c2a7990cf3aea802a'),
('organisateur6', '07e2d3097fc747584e5a9d12086cb73b'),
('organisateur7', 'e3e4deee8635a55c52a5561f94ca2100'),
('organisateur8', '36f0fd2ce5797e758bb41e85e9d92fce');

-- --------------------------------------------------------

--
-- Structure de la table `T_CONFIGURATION_CFG`
--

CREATE TABLE `T_CONFIGURATION_CFG` (
  `CFG_INTITULE` varchar(50) NOT NULL,
  `CFG_DATEDEBUT` date NOT NULL,
  `CFG_DATEFIN` date NOT NULL,
  `CFG_PRESENTATION` varchar(300) NOT NULL,
  `CFG_LIEU` varchar(100) NOT NULL,
  `CFG_DATEVERNISSAGE` datetime DEFAULT NULL,
  `CFG_TEXTEBIENVENUE` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_CONFIGURATION_CFG`
--

INSERT INTO `T_CONFIGURATION_CFG` (`CFG_INTITULE`, `CFG_DATEDEBUT`, `CFG_DATEFIN`, `CFG_PRESENTATION`, `CFG_LIEU`, `CFG_DATEVERNISSAGE`, `CFG_TEXTEBIENVENUE`) VALUES
('La couleur, histoire de la couleur', '2022-01-31', '2022-06-30', 'Plusieurs exposant viendront présenter leur utilisation et leur connaissance sur la couleur.', 'Brest Médiathèque des Capucins', '2022-03-24 00:00:00', 'Bienvenue au capucins pour cette exposition haute en couleur !');

-- --------------------------------------------------------

--
-- Structure de la table `T_EXPOSANT_EXP`
--

CREATE TABLE `T_EXPOSANT_EXP` (
  `EXP_NUM` int(11) NOT NULL,
  `EXP_NOM` varchar(30) NOT NULL,
  `EXP_PRENOM` varchar(30) NOT NULL,
  `EXP_TEXTBIO` varchar(300) NOT NULL,
  `EXP_MAIL` varchar(50) NOT NULL,
  `EXP_URLSITE` varchar(200) NOT NULL,
  `EXP_FICIMAGE` varchar(200) NOT NULL,
  `CPT_PSEUDO` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_EXPOSANT_EXP`
--

INSERT INTO `T_EXPOSANT_EXP` (`EXP_NUM`, `EXP_NOM`, `EXP_PRENOM`, `EXP_TEXTBIO`, `EXP_MAIL`, `EXP_URLSITE`, `EXP_FICIMAGE`, `CPT_PSEUDO`) VALUES
(1, 'Did', 'Moreres', 'Peintre spécialisé dans le monochrome', 'did.moreres@expo.com', 'https://didmoreres.art/l-explorateur', 'https://didmoreres.art/img/galeries/g-apropos-59e89f393b97f.jpg', 'KuGou'),
(2, 'Duvent-Lamber', 'Marie-Elène', 'Vendeuse chez Ocre De France.\r\nSociété marchande de pigments natuels ', 'ocredefrance@gmail.com', 'https://www.ocres-de-france.com/fr/30-pigments-naturels?page=3', 'https://th.bing.com/th/id/OIP.em2K_L5JHrC0QENTMVxGpwAAAA?pid=ImgDet&rs=1', 'KuGou'),
(3, 'Brusatin', 'Manlio', 'Enseignant-chercheur et historien médiéviste', 'brusatin.auteur@gmail.fr', 'https://www.snof.org/encyclopedie/la-couleur-au-fil-des-si%C3%A8cles', 'https://www.diaphanes.net/image.php?f=2e2e2f692f313339392f683735302e6a7067', 'KuGou'),
(4, 'Dupont', 'Martin', 'Employé chez ocre de france service informatique et communication.', 'infos@ocres-de-france', 'https://www.ocres-de-france.com/fr/cms/20/fabrication-de-locre', 'https://cdn.cnn.com/cnnnext/dam/assets/210615140022-angus-watson-super-tease.jpg', 'KuGou'),
(5, 'Pastoureau', 'Michel', 'Auteur de l\'Histoire des couleurs', 'pastoureau.fan@hotmail.fr', 'https://www.seuil.com/ouvrage/bleu-michel-pastoureau/9782757840016', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Michel_Pastoureau.png/800px-Michel_Pastoureau.png', 'KuGou'),
(6, 'Brume', 'Fanny', 'Blogueuse photographe à son compte', 'brume.fannyfaq@hotmail.com', 'https://parenthesecitron.com/couleur-histoire-pigments/', 'https://i1.wp.com/parenthesecitron.com/wp-content/uploads/2018/12/conseils-pour-booster-sa-cr%C3%A9ativit%C3%A9-en-photo-15.jpg?resize=1500%2C1125&ssl=1', 'KuGou');

-- --------------------------------------------------------

--
-- Structure de la table `T_OEUVRE_OEU`
--

CREATE TABLE `T_OEUVRE_OEU` (
  `OEU_CODE` int(11) NOT NULL,
  `OEU_INTITULE` varchar(50) NOT NULL,
  `OEU_DESCRIPTION` varchar(800) DEFAULT NULL,
  `OEU_DATECREATION` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `OEU_FICHIERIMAGE` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_OEUVRE_OEU`
--

INSERT INTO `T_OEUVRE_OEU` (`OEU_CODE`, `OEU_INTITULE`, `OEU_DESCRIPTION`, `OEU_DATECREATION`, `OEU_FICHIERIMAGE`) VALUES
(1, 'HOT', 'MONOCHROME : Hot <br>\r\nL\'alchimie entre la matière, le relief, le mouvement et les pigments rouges.<br>DIMENSIONS : 60 x 60 cm POIDS : 6 kg', '2022-04-19 15:12:12', './assets/images/Did-Moreres-HOT-60X60cm.webp'),
(2, 'Pigments noir indien', 'Le noir Indien est un pigment provenant d\'Inde. Ce pigment est 100% naturel. Pour une utilisation en peinture artistique, il conviendra de le broyer finement dans un mortier avant de le mélanger au liant.\r\n', '2022-04-19 16:02:04', './assets/images/pigment-noir-indien.jpg'),
(3, 'Bassin de fabrication de l\'ocre', 'La phase finale du lavage de l\'ocre est la décantation. Les bassins sont remplis d\'eau et d\'ocre qui, plus lourde, se dépose au fond du bassin. Par un système de bouchon \"vidangeur\", l\'eau s\'évacue. Lorsque le bassin atteint une épaisseur d\'environ 50 cm soit 60 tonnes par bassin, la période de séchage de juillet à fin août peut commencer. L\'ocre est alors sortie des bassins et mise à sécher, grâce à l\'aide du mistral, sur une grande plate-forme.\nAprès cela, l\'ocre sera transportée à l\'usine pour l`\'achèvement de sa fabrication.', '2022-04-19 16:02:09', 'https://www.ocres-de-france.com/img/cms/Fabrication%20ocre/Bassin%20de%20d%C3%A9cantation%20s%C3%A9chage%20ocre.jpg'),
(4, 'Fabication de l\'ocre', 'L\'ocre... c\'est quoi ?<br>L\'ocre est une roche ferrique composée d\'une argile blanche pure (la kaolinite) et d\'hydroxyde de fer (la goethite) ou d\'oxyde de fer (l\'hématite). La goethite donne sa couleur jaune à l\'ocre tandis que l\'hématite tend sur les rouges. Cette argile colorée est amalgamée aux grains de sables (quartz) et les ocres se trouvent dans le sol sous forme de sables ocreux composés à plus de 80% de quartz.\nComme les agriculteurs, nous puisons notre richesse de la terre et, tout comme eux, l\'exploitation ocrière se fait au rythme des saisons.', '2022-03-02 17:38:39', 'https://www.ocres-de-france.com/img/cms/Fabrication%20ocre/Soci%C3%A9t%C3%A9%20des%20Ocres%20de%20France.png'),
(5, 'Carière d\'ocre', 'La première étape est l\'extraction. L\'ocre est tirée du minerai ocreux. Celui-ci se présente en couches assez régulières, d\'épaisseur variable, dont certaines peuvent atteindre 35m de hauteur.<br>Dans les gisements, le minerai est assez compact, ce qui nécessite l\'emploi d\'une pelle mécanique pour l\'abattage. Le minerai se compose de 80 à 90 % de sable siliceux très fin et de 10 à 20 % d\'ocre pure.', '2022-03-23 13:03:22', './assets/images/ocres2.png'),
(6, 'Lavage de l\'ocre', ' Le mélange minerai/eau est envoyé dans un séparateur épaississeur (cyclone revêtu de caoutchouc pour éviter l\'abrasion) par une pompe protégée de caoutchouc jusqu\'à l\'entrée du cyclone. Le mélange arrive avec une pression de 500 grammes/cm2. Sous l\'action de la force centripède, le sable concentré sur le centre du cyclone tombe, presque sec, et l\'ocre sort en surverse puis est dirigée vers la canalisation allant aux bassins de décantation.', '2022-03-02 17:39:58', 'https://www.ocres-de-france.com/img/cms/Fabrication%20ocre/Lavage%20min.jpg'),
(7, 'Rouge Histoire d\'une couleur ', 'Admiré des Grecs et des Romains, le rouge est dans l\'Antiquité symbole de puissance, de richesse et de majesté. Au Moyen Âge, il prend une forte dimension religieuse, évoquant aussi bien le sang du Christ que les flammes de l\'enfer. Mais il est aussi, dans le monde profane, la couleur de l\'amour, de la gloire et de la beauté, comme celle de l\'orgueil, de la violence et de la luxure.', '2022-03-23 13:03:22', './assets/images/rougecouleur.jpg'),
(8, 'Vert Histoire d\'une couleur', 'Aimez-vous le vert ? À cette question les réponses sont partagées. En Europe, une personne sur six environ a le vert pour couleur préférée ; mais il s\'en trouve presque autant pour détester le vert, tant chez les hommes que chez les femmes.', '2022-03-02 17:41:04', 'https://ref.lamartinieregroupe.com/media/9782021093254/grande/109325_couverture_Hres_0.jpg'),
(9, 'Noir Histoire d\'une couleur', 'Noir. Couleur des ténèbres, de la mort et de l\'enfer, le noir n\'a pas toujours été une couleur négative. Au fil de sa longue histoire, il a aussi été associé à la fertilité, à la tempérance, à la dignité, à l\'autorité. Et depuis quelques décennies, il incarne surtout l\'élégance et la modernité.', '2022-03-02 17:41:27', 'https://ref.lamartinieregroupe.com/media/9782020490870/grande/49087_couverture_Hres_0.jpg'),
(10, 'Bleu Histoire d\'une couleur', 'L\'histoire de la couleur bleue dans les sociétés européennes est celle d\'un complet renversement : pour les Grecs et les Romains, cette couleur compte peu ; elle est même désagréable à l\'œil. Or aujourd\'hui, partout en Europe, le bleu est de très loin la couleur préférée (devant le vert et le rouge).', '2022-03-02 17:41:47', 'https://ref.lamartinieregroupe.com/media/9782757840016/grande/116101_couverture_Hres_0.jpg'),
(11, 'La petite histoire des couleurs', 'Blog présentant l\'histoire des couleurs par parenthèse citron', '2022-04-19 16:02:16', 'https://parenthesecitron.com/wp-content/uploads/2021/08/parentheselogo.png'),
(12, '1- La préhistoire', 'On retrouve trace d’une utilisation des premiers pigments durant la Préhistoire : de nombreuses grottes (dont celle très connue de Lascaux) en sont des témoignages forts. Les couleurs de l’époque sont bien moins variées qu’aujourd’hui et consistent en des nuances d’ochres (terres jaunes à rouges ainsi que quelques pigments organiques), de rouge sombre (résines, baies, insectes broyés…), de noir (charbon de bois ou oxyde de manganèse) et de blanc (craie). Ces éléments étaient essentiellement mélangés à de l’argile ou du talc à l’aide d’un liant (de l’eau ou de la graisse).', '2022-04-19 16:02:24', './assets/images/lascaux2.png'),
(13, '2- Période antique', 'En Égypte, le bleu du lapis-lazuli et le bleu égyptien étaient fabriquées à partir de silice, de cuivre et de produits calcaires et nécessitaient de longues heures de cuisson. Cette dernière influait d’ailleurs sur l’intensité du bleu (de pâle à sombre) et permettait même, en dosant également différemment les proportions de cuivre et de sodium, d’obtenir le vert égyptien. D’autres nuances de vert étaient étaient obtenues à partir de malachite', '2022-04-19 16:02:28', './assets/images/antique.webp'),
(14, '3- Renaissance', 'A la Renaissance, les italiens développent les pigments de « terre » (on pense aux belles Terres et Ombres de Sienne) en brûlant des pigments terreux. A l’époque, la peau est représentée en utilisant la terre verte. Ils créent également le jaune de Naples (qui sera interdit plus tard à cause de la présence de plomb).', '2022-04-19 16:02:32', './assets/images/renaissance.webp'),
(15, '4- Epoque contemporaine', 'En matière de design, d’art et même de mode, ©Pantone s’est imposé comme LA référence en matière d’inventorisation des couleurs, qui sont à présent toutes reproductibles et tellement nombreuses qu’il n’est pas rare de peiner à différencier deux nuances proches. Des nuances très précises ont été déposées sous référence ©Pantone par des marques (telles que le rose Barbie ou le rouge Louboutin).', '2022-04-19 16:02:35', './assets/images/contemporaine.webp'),
(16, 'Black de toi ', 'MONOCHROME : Black de toi<br>\r\nL\'alchimie entre la matière, le relief, le mouvement et les pigments de Cassel polis.<br>\r\nDIMENSIONS : 100 x 150 cm POIDS: 21 kg', '2022-04-19 15:13:11', 'https://artiane.com/wp-content/uploads/2017/02/Terre-de-Cassel-80x120cm.jpg'),
(17, 'Immaculée', 'MONOCHROME : Immaculée<br>\r\nL\'alchimie entre la matière, le relief, le mouvement, et les pigments blancs.<br>\r\nDIMENSIONS : 60 x 60 cm POIDS : 6 kg', '2022-04-19 15:12:38', 'https://artiane.com/wp-content/uploads/2017/02/80X120-1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `T_PROFIL_PRO`
--

CREATE TABLE `T_PROFIL_PRO` (
  `PRO_NOM` varchar(80) NOT NULL,
  `PRO_PRENOM` varchar(80) NOT NULL,
  `PRO_MAIL` varchar(150) NOT NULL,
  `PRO_VALIDE` char(1) NOT NULL,
  `PRO_ROLE` char(1) NOT NULL,
  `PRO_DATECREATION` datetime NOT NULL,
  `CPT_PSEUDO` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_PROFIL_PRO`
--

INSERT INTO `T_PROFIL_PRO` (`PRO_NOM`, `PRO_PRENOM`, `PRO_MAIL`, `PRO_VALIDE`, `PRO_ROLE`, `PRO_DATECREATION`, `CPT_PSEUDO`) VALUES
('Gouhier Dupuis', 'Anouk', 'anou.gouh@gmail.com', 'A', 'A', '2022-01-26 00:00:00', 'KuGou'),
('Rufri', 'Noah', 'noa.ru@gmail.com', 'D', 'O', '2022-04-26 00:00:00', 'Noooooa'),
('Le Bian', 'Billie', 'bibi@gmail.com', 'A', 'O', '2022-04-26 00:00:00', 'bibi72'),
('Marc', 'Valérie', 'val.marc@univ-brest.fr', 'A', 'A', '2022-01-26 00:00:00', 'gEstionnaire'),
('Gouhier', 'Juliette', 'juju.gou@lrou.com', 'A', 'A', '2022-01-27 00:00:00', 'organisateur1'),
('Gordon', 'Julien', 'lapetitefabric@gmail.fr', 'D', 'O', '2022-01-27 00:00:00', 'organisateur2'),
('O\'Grady', 'Jean', 'jean.grad@hotmail.com', 'A', 'O', '2022-01-27 00:00:00', 'organisateur3'),
('Le Roux', 'Pascale-Elise', 'ps.leroux@orange.fr', 'D', 'O', '2022-01-27 00:00:00', 'organisateur4'),
('Burton', 'Elisabet', 'bur.et@ecomail.fr', 'D', 'O', '2022-01-27 00:00:00', 'organisateur5'),
('Robert', 'Mathias', 'robertdu27@gmail.com', 'D', 'O', '2022-01-27 00:00:00', 'organisateur6'),
('George', 'Thomas', 'george.t@gmail.com', 'A', 'O', '2022-01-27 00:00:00', 'organisateur7'),
('Dupuis', 'Elsa', 'dupuis.el@hotmail.fr', 'D', 'O', '2022-01-27 00:00:00', 'organisateur8');

-- --------------------------------------------------------

--
-- Structure de la table `T_VISITEUR_VIS`
--

CREATE TABLE `T_VISITEUR_VIS` (
  `VIS_NUM` int(11) NOT NULL,
  `VIS_MDP` char(15) NOT NULL,
  `VIS_DATEHEURE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `VIS_NOM` varchar(80) DEFAULT NULL,
  `VIS_PRENOM` varchar(80) DEFAULT NULL,
  `VIS_MAIL` varchar(150) DEFAULT NULL,
  `CPT_PSEUDO` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `T_VISITEUR_VIS`
--

INSERT INTO `T_VISITEUR_VIS` (`VIS_NUM`, `VIS_MDP`, `VIS_DATEHEURE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_MAIL`, `CPT_PSEUDO`) VALUES
(1, 'dsv54sbeg', '2022-04-12 12:00:18', 'Petit', 'Pierre', 'petit.pierre@gmail.com', 'KuGou'),
(2, 's12r52vfg', '2022-04-27 08:21:08', NULL, NULL, NULL, 'KuGou'),
(3, '21b51brt5h1b', '2022-04-12 12:00:05', 'richard', 'le petit', 'riri.ptiloup@gmail.com', 'KuGou'),
(4, 'qerh7v151v', '2022-04-27 08:15:00', NULL, NULL, NULL, 'KuGou'),
(6, '12569ihgbqs', '2022-04-12 11:59:47', 'Gribou', 'Lucas', 'grib.luc@hotmail.fr', 'organisateur1'),
(7, 'djhbsrv56', '2022-04-12 11:59:42', 'Petitepomme', 'Julie', 'pp.ju@gmail.com', 'organisateur1'),
(9, 'jzrgi5s56s', '2022-04-12 11:59:30', 'Bruvri', 'Antoine', 'antoine.b@hotmail.fr', 'organisateur5'),
(10, 'ul$1x2zt4Y', '2022-04-27 08:16:47', NULL, NULL, NULL, 'organisateur3'),
(15, 'qNM5mKcuT4', '2022-04-27 08:16:54', NULL, NULL, NULL, 'organisateur3'),
(16, 'duqvefb45', '2022-04-23 20:59:51', 'Jacques', 'Mesrine', 'JacquesMes@hotmail.fr', 'KuGou'),
(18, 'AciF4k6pWd', '2022-04-27 08:17:03', NULL, NULL, NULL, 'gEstionnaire'),
(20, '12Q8dP9m#E', '2022-04-27 08:17:25', NULL, NULL, NULL, 'gEstionnaire'),
(21, '$Nqh6piJKL', '2022-04-27 08:17:31', NULL, NULL, NULL, 'organisateur3'),
(22, 'Ltm1ZYEyPr', '2022-04-27 08:17:37', NULL, NULL, NULL, 'KuGou'),
(23, '5NTPiq6H07z8&eS', '2022-04-27 08:17:43', NULL, NULL, NULL, 'KuGou'),
(24, 'YHMzi#oW29OeZhj', '2022-04-27 08:17:50', NULL, NULL, NULL, 'KuGou'),
(25, 'F8iEmoL027IyPA5', '2022-04-27 08:17:58', NULL, NULL, NULL, 'KuGou'),
(27, 'J8pL5qGknd0FgMV', '2022-04-26 12:13:54', 'M', 'V', 'mv@gmail.com', 'bibi72'),
(28, 'my2nJFltdvcSMKj', '2022-04-27 08:18:03', NULL, NULL, NULL, 'bibi72'),
(29, 'NUlS#EdheJ&mjp8', '2022-04-27 08:18:09', NULL, NULL, NULL, 'bibi72');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `TJ_PRESNTE_PRE`
--
ALTER TABLE `TJ_PRESNTE_PRE`
  ADD PRIMARY KEY (`OEU_CODE`,`EXP_NUM`),
  ADD KEY `EXP_NUM` (`EXP_NUM`);

--
-- Index pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  ADD PRIMARY KEY (`ACT_NUM`),
  ADD KEY `CPT_PSEUDO` (`CPT_PSEUDO`);

--
-- Index pour la table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  ADD PRIMARY KEY (`COM_NUM`),
  ADD UNIQUE KEY `VIS_NUM` (`VIS_NUM`),
  ADD UNIQUE KEY `tk_com_vis` (`VIS_NUM`);

--
-- Index pour la table `T_COMPTEUTILISATEUR_CPT`
--
ALTER TABLE `T_COMPTEUTILISATEUR_CPT`
  ADD PRIMARY KEY (`CPT_PSEUDO`);

--
-- Index pour la table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  ADD PRIMARY KEY (`EXP_NUM`),
  ADD KEY `CPT_PSEUDO` (`CPT_PSEUDO`);

--
-- Index pour la table `T_OEUVRE_OEU`
--
ALTER TABLE `T_OEUVRE_OEU`
  ADD PRIMARY KEY (`OEU_CODE`);

--
-- Index pour la table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD PRIMARY KEY (`CPT_PSEUDO`);

--
-- Index pour la table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  ADD PRIMARY KEY (`VIS_NUM`),
  ADD KEY `CPT_PSEUDO` (`CPT_PSEUDO`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  MODIFY `ACT_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  MODIFY `COM_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  MODIFY `EXP_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `T_OEUVRE_OEU`
--
ALTER TABLE `T_OEUVRE_OEU`
  MODIFY `OEU_CODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  MODIFY `VIS_NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `TJ_PRESNTE_PRE`
--
ALTER TABLE `TJ_PRESNTE_PRE`
  ADD CONSTRAINT `TJ_PRESNTE_PRE_ibfk_1` FOREIGN KEY (`OEU_CODE`) REFERENCES `T_OEUVRE_OEU` (`OEU_CODE`),
  ADD CONSTRAINT `TJ_PRESNTE_PRE_ibfk_2` FOREIGN KEY (`EXP_NUM`) REFERENCES `T_EXPOSANT_EXP` (`EXP_NUM`);

--
-- Contraintes pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  ADD CONSTRAINT `T_ACTUALITE_ACT_ibfk_1` FOREIGN KEY (`CPT_PSEUDO`) REFERENCES `T_COMPTEUTILISATEUR_CPT` (`CPT_PSEUDO`);

--
-- Contraintes pour la table `T_COMMENTAIRE_COM`
--
ALTER TABLE `T_COMMENTAIRE_COM`
  ADD CONSTRAINT `T_COMMENTAIRE_COM_ibfk_1` FOREIGN KEY (`VIS_NUM`) REFERENCES `T_VISITEUR_VIS` (`VIS_NUM`);

--
-- Contraintes pour la table `T_EXPOSANT_EXP`
--
ALTER TABLE `T_EXPOSANT_EXP`
  ADD CONSTRAINT `T_EXPOSANT_EXP_ibfk_1` FOREIGN KEY (`CPT_PSEUDO`) REFERENCES `T_COMPTEUTILISATEUR_CPT` (`CPT_PSEUDO`);

--
-- Contraintes pour la table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD CONSTRAINT `T_PROFIL_PRO_ibfk_1` FOREIGN KEY (`CPT_PSEUDO`) REFERENCES `T_COMPTEUTILISATEUR_CPT` (`CPT_PSEUDO`);

--
-- Contraintes pour la table `T_VISITEUR_VIS`
--
ALTER TABLE `T_VISITEUR_VIS`
  ADD CONSTRAINT `T_VISITEUR_VIS_ibfk_1` FOREIGN KEY (`CPT_PSEUDO`) REFERENCES `T_COMPTEUTILISATEUR_CPT` (`CPT_PSEUDO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
