DROP DATABASE IF EXISTS basketProject;
CREATE DATABASE IF NOT EXISTS basketProject;
USE basketProject;
-- --------------------------------------------------------

--
-- Table structure for table `daysofweek`
--

DROP TABLE IF EXISTS `daysofweek`;
CREATE TABLE IF NOT EXISTS `daysofweek` (
  `idDay` int(11) NOT NULL,
  `Label` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daysofweek`
--

INSERT INTO `daysofweek` (`idDay`, `Label`) VALUES
(7, 'Dimanche'),
(4, 'Jeudi'),
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(6, 'Samedi'),
(5, 'Vendredi');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `idPlayer` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`idPlayer`, `name`, `firstname`, `birthdate`, `email`, `active`) VALUES
(1, 'Romano', 'Stevio', '1999-06-03', 'stevio.romano@basket.be', 1),
(2, 'Rahmani', 'Yanis', '2008-12-08', 'memel@basket.be',1),
(3, 'Foucoux', 'Tom', '2008-10-31', 'petit.lena@basket.be',1),
(4, 'Bertolo', 'Sacha', '2008-03-11', 'benjaberto@basket.be',1),
(5, 'Taminiau', 'Sasha', '2007-12-19', 'stefanydance@basket.be',1),
(6, 'Burm', 'Boris', '2007-10-21', 'palm.carole@basket.be',1),
(7, 'Mahieu', 'Baptiste', '2007-09-20', 'memel@basket.be',1),
(8, 'Piserchia', 'Tiziano', '2007-09-13', 'roccopiserchia@basket..be',1),
(9, 'Michel', 'Mathéo', '2007-04-17', 'memel@basket.be', 1),
(10, 'Wilmot', 'Nöé', '2007-06-13', 'isabelle.rappez@basket.be', 1),
(11, 'Ghignatti', 'Noah', '2007-06-05', 'ghignatti.damiano@basket.be', 1),
(12, 'Rahmani', 'Ilyes', '2007-05-05', 'kacimi_farida@basket.be', 1),
(13, 'Maréchal', 'Théo', '2007-04-17', 'memel@basket.be', 1),
(14, 'Desart', 'Roméo', '2007-03-10', 'memel@basket.be', 1),
(15, 'Vazzano', 'Salvatrore', '2007-02-28', 'memel@basket.be', 1),
(16, 'Pellegrino', 'Luis', '2007-01-01', 'memel@basket.be', 1),
(17, 'Maes', 'Ilan', '2007-01-01', 'memel@basket.be', 1),
(18, 'Maes', 'Esteban', '2007-01-01', 'memel@basket.be', 1),
(19, 'Mainfroid', 'Raphael', '2007-02-20', 'memel@basket.be', 1),
(20, 'Tomazos', 'Amélio', '2006-12-25', 'memel@basket.be', 1),
(21, 'Bartha', 'Raphael', '2006-07-25', 'memel@basket.be', 1),
(22, 'Lewillon', 'Mathias', '2005-11-30', 'memel@basket.be', 1),
(23, 'Piccicuto', 'Noa', '2006-06-30', 'memel@basket.be', 1),
(24, 'Odeurs', 'Léopold', '2005-11-10', 'y.odeurs@basket.be', 1),
(25, 'Vanmmaele', 'Fergal', '2005-01-01', 'memel@basket.be', 1),
(26, 'Vermeersch', 'Robin', '2005-07-01', 'willyver@basket.be', 1),
(27, 'Claeys', 'Thimotée', '2004-01-01', 'claeys123@basket.be', 1),
(28, 'Di Nicola', 'Samuel', '2004-07-06', 'colo.dinicola@basket.be', 1),
(29, 'Demeuter', 'Arthur', '2004-04-12', 'benoit.demeuter@basket.be', 1),
(30, 'Defaut', 'Mattéo', '2004-02-13', 'memel@basket.be', 0),
(31, 'Di Leto', 'Mattéo', '2003-02-02', 'gianni355@basket.be', 1),
(32, 'Rigaud', 'Louis', '2002-11-11', 'jean.rigaud@basket.be', 1),
(33, 'Delwart', 'Naim', '2002-11-06', 'memel@basket.be', 1),
(34, 'Dupont', 'Brieuc', '2003-09-29', 'dupfamily4@basket.be', 1),
(35, 'Karbowiak', 'Tom', '2002-11-02', 'dom.karbowiak@basket.be', 1),
(36, 'Zgajewski', 'Emilien', '2002-10-06', 'bidazou99@basket.be', 1),
(37, 'Lacroix', 'Killian', '2002-09-09', 'thierrylacroix603@basket.be', 1),
(38, 'Alberti', 'Louca', '2002-05-08', 'calo107@basket.be', 1),
(39, 'Nourry', 'Noah', '2002-04-24', 'davidnourry@basket.be', 1),
(40, 'Dupont', 'Cyril', '2002-03-16', 'dupfamily4@basket.be', 1),
(42, 'Chedron', 'Thomas', '2001-10-15', 'benoit.cherdon@basket.be', 1),
(43, 'Vermeersch', 'Maxime', '2001-07-13', 'willyver@basket.be', 1),
(44, 'Havelette', 'Noah', '2003-11-28', 'daniel.havelette@basket.be', 1),
(45, 'Lo Giudice', 'Matteo', '2001-05-22', 'marjoriecipolletta@basket.be', 1),
(46, 'Marcus', 'Nathan', '2001-04-14', 'romuald.marcus@basket.be', 1),
(47, 'Cotteaux', 'Ethan', '2001-04-12', 'vaballas@basket.be', 1),
(48, 'Odeurs', 'Alexandre', '2001-04-11', 'y.odeurs@basket.be', 1),
(49, 'Quintart', 'Sacha', '2001-04-07', 'christophequintart@basket.be', 1),
(50, 'Bortot', 'Thomas', '2001-01-03', 'sandro.bortot@basket.be', 1),
(51, 'Zgajewski', 'Corentin', '2000-11-29', 'bidazou99@basket.be', 1),
(52, 'Foucoux', 'Noa', '2000-11-23', 'petit.lena@basket.be', 1),
(53, 'Chiavetta', 'Dylan', '1999-12-20', 'chipieflic@basket.be', 1),
(54, 'Dupont', 'Bastien', '1999-10-29', 'dupfamily1@basket.be', 0),
(55, 'Demaret', 'Gaultier', '2000-08-03', 'ysgomado@basket.be', 1),
(56, 'Alloisio', 'Alexandre', '1999-09-19', 'steph.allo@basket.be', 0),
(57, 'Hoslet', 'Florian', '1999-08-17', 'philippe.hoslet@basket.be', 1),
(58, 'MBongoum', 'Martin', '1999-06-06', 'michelina.mammone@basket.be', 1),
(60, 'Zgajewski', 'Mederic', '1999-04-01', 'bidazou99@basket.be', 1),
(61, 'Peeters', 'Glen', '1999-03-12', 'soquetted@basket.be', 1),
(62, 'Gonzalez', 'Hugo', '2000-11-18', 'tito4u@basket.be', 1 ),
(63, 'Demeuter', 'Antoine', '1998-10-23', 'benoit.demeuter@basket.be', 1),
(64, 'Taskin', 'Mikail', '1998-09-30', 'abduta@basket.be', 1),
(65, 'Moneze', 'Simon-Sebastien', '1998-07-18', 'pmegal@basket..be', 1),
(66, 'Durmuskaya', 'Batuhan', '1998-05-29', 'batu-didim@basket.be', 1),
(67, 'Debauche', 'Annaeg', '1998-05-06', 'meniercarla@basket.be', 1),
(68, 'D''Onofrio', 'Diego', '1998-04-15', 'neroeazzuro@basket..be', 1),
(69, 'Perugini', 'Adrien', '1997-12-17', 'enricoperugini@basket.be', 1),
(70, 'Moons', 'Robin', '1997-11-15', 'olimoons@basket.be', 1),
(71, 'Bondi', 'Esteban', '1997-11-13', 'esteban.bondi@basket.be', 1),
(72, 'Hoyaux', 'Giulian', '1997-10-14', 'carhoyaux@basket.be', 1),
(73, 'Francolini', 'Bruno', '1997-03-22', 'bruno-forza-inter@basket.be', 1),
(74, 'Fournez', 'Robin', '1997-03-13', 'jean.rob.man@basket.be', 1),
(75, 'Focke', 'Antoine', '1997-01-29', 'ronaldo_antoine@basket.be', 1),
(76, 'Foncoux', 'Nicolas', '1996-12-23', 'nico123456789@basket.be',1),
(77, 'Ciuro', 'Miguel', '1996-11-21', 'miguel_ciuro_10@basket.be', 1),
(78, 'Mukoko', 'Jonathan', '1996-11-05', 'jo-b-play@basket.be', 1),
(79, 'Popadinec', 'Aurelien', '1996-08-22', 'popa-aure22@basket.be', 1),
(80, 'Ramdani', 'Lyes', '1996-04-01', 'ramdanilyes@basket.be', 1),
(81, 'Frabel', 'Luca', '1996-01-12', 'secretariatbasket@basket.be', 1),
(82, 'Goffaux', 'Martin', '1995-05-24', 'goffauxmartin@basket.be', 1),
(83, 'Blariaux', 'Valentin', '1994-09-21', 'valentinblariaux10@basket.be', 1),
(84, 'Vercleven', 'Quentin', '1994-04-20', 'v-quentiiin@basket..be', 1),
(85, 'Fievez', 'Julien', '1994-01-10', 'jul2ien_6042@basket.be', 1),
(86, 'Scailquin', 'Hugo', '1997-03-09', 'jc.scailquin@basket.be', 1),
(87, 'Bailly', 'Tom', '2000-04-27', 'ninibelgique@basket.be', 1),
(88, 'Ballieu', 'Marino', '1967-03-18', 'maguyno@basket.be', 1),
(89, 'Capiteyn', 'Michaël', '1984-04-19', 'mcapiteyn@basket.be', 1),
(90, 'Colonius', 'Olivier', '1980-05-05', 'colonius@basket.be', 1),
(91, 'Descamps', 'Fred', '1976-03-14', 'lefred@lefred.be', 1),
(92, 'Demeuter', 'Damien', '1969-01-20', 'damien.demeuter@basket.be', 1),
(93, 'Duray', 'Yves', '1963-09-15', 'yves_duray@basket.be',  1),
(94, 'Sculteur', 'Charles', '1971-11-09', 'sculteur.leroy@basket.be', 1),
(95, 'Spadavecchia', 'Julien', '1985-01-08', 'julien.spadavecchia@basket.be', 1),
(96, 'Verkeyn', 'Grégory', '1976-05-15', 'gregory.verkeyn@basket.be', 1),
(97, 'Doumont', 'Kevin', '1986-02-05', 'kevin.doumont@basket.be', 1),
(98, 'Delfosse', 'Christophe', '1976-01-24', 'christophe.delfosse@basket.be', 1),
(99, 'Leduc', 'Gaylord', '1981-08-16', 'ducvangege@basket.be', 1),
(100, 'Vasseur', 'Julien', '1985-02-06', 'julienvasseur@basket.be', 1),
(101, 'Baise', 'Benjamin', '1984-05-07', 'bbaise@basket.be', 1),
(102, 'Poffe', 'Nicolas ', '1986-07-11', 'nicolas9@basket.be', 1),
(103, 'Petit', 'Romuald', '1986-10-06', 'petit.romu@basket.be', 1),
(104, 'Petit', 'Jonathan', '1984-12-17', 'jonathanpetit@basket.be', 1),
(105, 'Delespesse', 'Alexis', '1993-11-30', 'alex301193@basket.be', 1),
(107, 'Zapotoczny', 'Stephane', '1974-09-17', 'stephane.zapotoczny@basket.be', 1),
(108, 'Marcus', 'Romuald', '1970-03-20', 'romuald.marcus@basket.be', 1),
(110, 'Frabel', 'Loïc ', '1992-12-13', 'memel@basket.be', 1),
(111, 'Nerrinck', 'Thibaut', '1998-10-22', 'lebronjames1998@basket.be', 1),
(112, 'Marlon', 'Romain', '1998-11-22', 'romainmarlon@basket.be', 1),
(113, 'Blariaux', 'Mathieu', '1993-06-11', 'air-mat@basket.be', 1),
(114, 'Dupont', 'Jonathan', '1979-02-08', 'dupontj8888@basket.be', 1),
(115, 'D''Haeyer', 'Yovan', '1990-06-22', 'yovan.dhaeyer@basket.be', 1),
(116, 'Fazzani', 'Bilel', '1983-02-13', 'fazzanib@basket.co.in', 1),
(117, 'Notarnicolas', 'Dorian', '1990-06-28', 'dorian-11@basket.be', 1),
(118, 'Painblanc', 'Jonathan', '1992-08-06', 'jonathan.painblanc@basket.be', 1),
(119, 'Frabel', 'Loïc', '1996-01-01', 'loicfrabel5@basket.be', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idRoleType` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRole`, `idUser`, `idRoleType`) VALUES
(114, 1, 11),
(115, 1, 15),
(116, 1, 16),
(63, 2, 1),
(64, 2, 11),
(121, 3, 3),
(122, 3, 11),
(123, 4, 5),
(124, 4, 11),
(125, 4, 14),
(109, 5, 4),
(110, 5, 11),
(126, 6, 8),
(127, 6, 9),
(56, 7, 13),
(57, 7, 17),
(119, 8, 1),
(120, 8, 11),
(130, 9, 7),
(131, 9, 9),
(132, 9, 15),
(62, 10, 15),
(65, 11, 15),
(133, 12, 9),
(69, 13, 9),
(70, 14, 9),
(73, 15, 9),
(72, 16, 9),
(128, 17, 10),
(129, 17, 11),
(76, 18, 11),
(100, 19, 11),
(79, 20, 11),
(101, 21, 11),
(81, 22, 11),
(82, 23, 11),
(139, 24, 11),
(141, 24, 15),
(140, 24, 19),
(84, 25, 11),
(85, 26, 11),
(136, 27, 11),
(87, 28, 11),
(88, 29, 11),
(89, 31, 11),
(90, 32, 11),
(91, 33, 11),
(92, 34, 11),
(93, 35, 11),
(94, 36, 11),
(95, 37, 11),
(96, 38, 11),
(134, 39, 11),
(102, 40, 11),
(103, 41, 11),
(104, 42, 9),
(106, 43, 11),
(107, 44, 9),
(108, 45, 9),
(135, 46, 6),
(142, 47, 11),
(144, 47, 15),
(143, 47, 19);

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

DROP TABLE IF EXISTS `roletype`;
CREATE TABLE IF NOT EXISTS `roletype` (
  `roleTypeId` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `ordre` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `label` (`label`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roletype`
--

INSERT INTO `roletype` (`roleTypeId`, `label`, `ordre`, `active`) VALUES
(1, 'Président', 10, 1),
(2, 'Vice-président', 20, 1),
(3, 'Secrétaire', 30, 1),
(4, 'Secrétaire Adjoint', 40, 1),
(5, 'Trésorier', 50, 1),
(6, 'Cellule sportive', 60, 1),
(7, 'Directeur Technique (Gros Ballon)', 70, 1),
(8, 'Directeur Technique (Petit Ballon)', 80, 1),
(9, 'Coach', 90, 1),
(10, 'Délégué Général', 100, 1),
(11, 'Délégué', 110, 1),
(12, 'Médecin sportif', 120, 1),
(13, 'Kinésithérapeute', 130, 1),
(14, 'Logistique', 140, 1),
(15, 'Membre Comité', 150, 1),
(16, 'Webmaster', 200, 1),
(17, 'Préparateur physique', 135, 1),
(18, 'Sponsoring', 145, 1),
(19, 'Events', 135, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `idStaff` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `showInMenu` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`idStaff`, `label`, `ordre`, `showInMenu`, `active`) VALUES
(1, 'Staff Sportif', 1, 1, 1),
(2, 'Staff Medical', 10, 1, 1),
(3, 'Comité', 20, 1, 1),
(4, 'Coachs', 30, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffsroletypes`
--

DROP TABLE IF EXISTS `staffsroletypes`;
CREATE TABLE IF NOT EXISTS `staffsroletypes` (
  `idStaffRoleType` int(11) NOT NULL,
  `idStaff` int(11) NOT NULL,
  `idRoleType` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffsroletypes`
--

INSERT INTO `staffsroletypes` (`idStaffRoleType`, `idStaff`, `idRoleType`) VALUES
(1, 1, 6),
(2, 1, 7),
(3, 1, 8),
(16, 1, 10),
(4, 2, 12),
(5, 2, 13),
(6, 2, 17),
(7, 3, 1),
(8, 3, 2),
(9, 3, 3),
(10, 3, 4),
(11, 3, 5),
(12, 3, 14),
(13, 3, 15),
(15, 3, 18),
(17, 3, 19),
(14, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `idTeam` int(11) NOT NULL,
  `label` varchar(30) NOT NULL,
  `ageMin` int(11) NOT NULL,
  `ageMax` int(11) NOT NULL,
  `godFather` int(11) NOT NULL DEFAULT '1',
  `ordre` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`idTeam`, `label`, `ageMin`, `ageMax`, `godFather`, `ordre`, `active`) VALUES
(1, 'Provinciale 1', 16, 99, 0, 5, 1),
(2, 'Provinciale 3', 16, 99, 0, 10, 1),
(3, 'Minimes (U16)', 12, 15, 0, 30, 1),
(4, 'Provinciale 4', 16, 99, 0, 15, 1),
(5, 'Juniors AWBB (U21)', 16, 20, 0, 20, 1),
(6, 'Cadets (U18)', 14, 17, 0, 25, 1),
(7, 'Pupilles A (U14)', 10, 13, 0, 35, 1),
(8, 'Pupilles B (U14)', 10, 13, 0, 40, 1),
(9, 'Benjamins (U12)', 8, 11, 0, 45, 1),
(10, 'Poussins (U10)', 6, 9, 0, 50, 1),
(11, 'Pré-Poussins (U8) A', 3, 7, 0, 55, 1),
(12, 'Pré-Poussins (U8) B', 3, 7, 0, 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teamscalendar`
--

DROP TABLE IF EXISTS `teamscalendar`;
CREATE TABLE IF NOT EXISTS `teamscalendar` (
  `idCalendar` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `yearTeam` int(11) NOT NULL,
  `inTeam` varchar(30) NOT NULL,
  `outTeam` varchar(30) NOT NULL,
  `scoreIn` int(11) NOT NULL DEFAULT '-1',
  `scoreOut` int(11) NOT NULL DEFAULT '-1',
  `modified` int(11) NOT NULL DEFAULT '0',
  `matchNumber` int(11) NOT NULL,
  `dateMatch` date NOT NULL,
  `timeMatch` time NOT NULL,
  `TypeMatch` char(5) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamscalendar`
--

INSERT INTO `teamscalendar` (`idCalendar`, `idTeam`, `yearTeam`, `inTeam`, `outTeam`, `scoreIn`, `scoreOut`, `modified`, `matchNumber`, `dateMatch`, `timeMatch`, `TypeMatch`) VALUES
(1, 3, 2014, 'BELFIUS MONS HT', 'BCC', -1, -1, 0, 701171, '2014-09-06', '16:00:00', 'CHAMP'),
(2, 3, 2014, 'BCC', 'RBC JS BAULET', -1, -1, 0, 702173, '2014-09-13', '15:30:00', 'CHAMP'),
(3, 3, 2014, 'BCC', 'RE PONT DE LOUP', -1, -1, 0, 704171, '2014-10-04', '15:30:00', 'CHAMP'),
(4, 3, 2014, 'OLYMPIC MSM A', 'BCC', -1, -1, 0, 705171, '2014-10-12', '13:00:00', 'CHAMP'),
(5, 3, 2014, 'BCC', 'ABC REM MOUSCRON A', -1, -1, 0, 706171, '2014-10-18', '15:30:00', 'CHAMP'),
(6, 3, 2014, 'BCC', 'JS LUTTRE', -1, -1, 0, 703171, '2014-10-29', '18:00:00', 'CHAMP'),
(7, 3, 2014, 'BCC', 'JSB MAFFLE A', -1, -1, 0, 708171, '2014-11-11', '09:30:00', 'CHAMP'),
(8, 3, 2014, 'SP CHARLEROI A', 'BCC', -1, -1, 0, 709176, '2014-11-15', '14:00:00', 'CHAMP'),
(9, 3, 2014, 'BCC', 'US VX CAMPINAIRE', -1, -1, 0, 710171, '2014-11-22', '15:30:00', 'CHAMP'),
(10, 3, 2014, 'JS DOTTIGNIES A', 'BCC', -1, -1, 0, 711175, '2014-11-29', '15:00:00', 'CHAMP'),
(11, 3, 2014, 'R BLAREGNIES BC', 'BCC', -1, -1, 0, 712177, '2014-12-06', '09:30:00', 'CHAMP'),
(12, 3, 2014, 'BCC', 'BCJ RESSAIX', -1, -1, 0, 713171, '2014-12-13', '15:30:00', 'CHAMP'),
(13, 3, 2014, 'BCC', 'BELFIUS MONS HT', -1, -1, 0, 714172, '2014-12-20', '15:30:00', 'CHAMP'),
(14, 3, 2014, 'RBC JS BAULET', 'BCC', -1, -1, 0, 715171, '2015-01-04', '17:00:00', 'CHAMP'),
(15, 3, 2014, 'JS LUTTRE', 'BCC', -1, -1, 0, 716174, '2015-01-10', '15:30:00', 'CHAMP'),
(16, 3, 2014, 'BCC', 'JS DOTTIGNIES A', -1, -1, 0, 717171, '2015-01-17', '15:30:00', 'CHAMP'),
(17, 3, 2014, 'RE PONT DE LOUP', 'BCC', -1, -1, 0, 718176, '2015-01-25', '09:00:00', 'CHAMP'),
(18, 3, 2014, 'BCC', 'R BLAREGNIES BC', -1, -1, 0, 725171, '2015-01-31', '15:30:00', 'CHAMP'),
(19, 3, 2014, 'BCC', 'OLYMPIC MSM A', -1, -1, 0, 719171, '2015-02-07', '15:30:00', 'CHAMP'),
(20, 3, 2014, 'US VX CAMPINAIRE', 'BCC', -1, -1, 0, 724172, '2015-02-15', '13:30:00', 'CHAMP'),
(21, 3, 2014, 'ABC TREM MOUSCRON A', 'BCC', -1, -1, 0, 720177, '2015-02-21', '13:00:00', 'CHAMP'),
(22, 3, 2014, 'JSB MAFFLE A', 'BCC', -1, -1, 0, 721173, '2015-03-07', '12:00:00', 'CHAMP'),
(23, 3, 2014, 'BCC', 'SP CHARLEROI A', -1, -1, 0, 723171, '2015-03-21', '15:30:00', 'CHAMP'),
(24, 3, 2014, 'BCJ RESSAIX', 'BCC', -1, -1, 0, 726175, '2015-04-25', '12:00:00', 'AMICA'),
(25, 1, 2014, 'ABC TREM MOUSCRON A', 'BCC', -1, -1, 0, 701017, '2014-09-06', '20:30:00', 'CHAMP'),
(26, 1, 2014, 'BCC', 'BCJ RESSAIX A', -1, -1, 0, 702013, '2014-09-13', '20:45:00', 'CHAMP'),
(27, 1, 2014, 'RBC JS BAULET A', 'BCC', -1, -1, 0, 703012, '2014-09-20', '20:45:00', 'CHAMP'),
(28, 1, 2014, 'BCC', 'RBC MONTAGNARD A', -1, -1, 0, 704013, '2014-10-04', '20:45:00', 'CHAMP'),
(29, 1, 2014, 'BBC TOURNAI A', 'BCC', -1, -1, 0, 705017, '2014-10-12', '17:00:00', 'CHAMP'),
(30, 1, 2014, 'BCC', 'OLYMPIC MSM B', -1, -1, 0, 706013, '2014-10-18', '20:45:00', 'CHAMP'),
(31, 1, 2014, 'BCC', 'RCBE 2000 A', -1, -1, 0, 708013, '2014-11-11', '14:00:00', 'CHAMP'),
(32, 1, 2014, 'JSB MAFFLE A', 'BCC', -1, -1, 0, 709013, '2014-11-15', '20:00:00', 'CHAMP'),
(33, 1, 2014, 'BCC', 'BC L9 FLENU A', -1, -1, 0, 710013, '2014-11-22', '20:45:00', 'CHAMP'),
(34, 1, 2014, 'REBC TEMPLEUVE A', 'BCC', -1, -1, 0, 711016, '2014-11-29', '20:30:00', 'CHAMP'),
(35, 1, 2014, 'JS STAMBRUGES A', 'BCC', -1, -1, 0, 712015, '2014-12-06', '19:00:00', 'CHAMP'),
(36, 1, 2014, 'BCC', 'CHARLEROI RAVENS A', -1, -1, 0, 713013, '2014-12-13', '20:45:00', 'CHAMP'),
(37, 1, 2014, 'BCC', 'ABC TREM MOUSCRON A', -1, -1, 0, 714013, '2014-12-20', '20:45:00', 'CHAMP'),
(38, 2, 2014, 'Charleroi Ravens B', 'BCC', -1, -1, 0, 701047, '2014-09-06', '19:00:00', 'CHAMP'),
(39, 2, 2014, 'BCC', 'BC MACCABI CHA A', -1, -1, 0, 702043, '2014-09-13', '18:00:00', 'CHAMP'),
(40, 2, 2014, 'RBC JS BAULET B', 'BCC', -1, -1, 0, 703042, '2014-09-20', '18:30:00', 'CHAMP'),
(41, 2, 2014, 'BCC', 'JS LUTTRE B', -1, -1, 0, 704043, '2014-10-04', '00:00:18', 'CHAMP'),
(42, 2, 2014, 'UBC BINCHE B', 'BCC', -1, -1, 0, 705047, '2014-10-11', '18:45:00', 'CHAMP'),
(43, 2, 2014, 'BCC', 'BCR THUIN LOBBES B', -1, -1, 0, 706043, '2014-10-18', '18:00:00', 'CHAMP'),
(44, 2, 2014, 'BC RANSART NEW A', 'BCC', -1, -1, 0, 707042, '2014-10-26', '17:00:00', 'CHAMP'),
(45, 4, 2014, 'BCJ RESSAIX C', 'BCC', -1, -1, 0, 701077, '2014-09-06', '12:00:00', 'CHAMP'),
(46, 4, 2014, 'BCC', 'BC MACCABI CHA C', -1, -1, 0, 702073, '2014-09-13', '18:00:00', 'CHAMP'),
(47, 4, 2014, 'BCC', 'MARSU B', -1, -1, 0, 704073, '2014-10-04', '18:00:00', 'CHAMP'),
(48, 4, 2014, 'MARCINELLE HAIES B', 'BCC', -1, -1, 0, 705077, '2014-10-11', '17:00:00', 'CHAMP'),
(49, 4, 2014, 'BCC', 'JSB MAFFLE C', -1, -1, 0, 706073, '2014-10-18', '18:00:00', 'CHAMP'),
(50, 4, 2014, 'BCPC BRACQUEGNIES', 'BCC', -1, -1, 0, 707072, '2014-10-25', '19:30:00', 'CHAMP'),
(51, 3, 2014, 'FLENU-QUAREGNON', 'BCC', 42, 40, 0, 0, '2014-08-22', '17:30:00', 'AMICA'),
(52, 6, 2014, 'BCJ RESSAIX', 'BCC', -1, -1, 0, 701146, '2014-09-06', '14:00:00', 'CHAMP'),
(53, 6, 2014, 'BCC', 'BBC BRAINOIS', -1, -1, 0, 702143, '2014-09-13', '00:00:12', 'CHAMP'),
(54, 6, 2014, 'BCC', 'RBC MONTAGNARD', -1, -1, 0, 704143, '2014-10-04', '12:00:00', 'CHAMP'),
(55, 6, 2014, 'JSB MAFFLE', 'BCC', -1, -1, 0, 705143, '2014-10-11', '14:00:00', 'CHAMP'),
(56, 6, 2014, 'BCC', 'SP CHARLEROI', -1, -1, 0, 706143, '2014-10-18', '12:00:00', 'CHAMP'),
(57, 6, 2014, 'BCCG 2007', 'BCC', -1, -1, 0, 707144, '2014-10-25', '12:30:00', 'CHAMP'),
(58, 6, 2014, 'BC ECAUSSINNES', 'BCC', -1, -1, 0, 709145, '2014-11-14', '19:30:00', 'CHAMP'),
(59, 6, 2014, 'RE PONT DE LOUP', 'BCC', -1, -1, 0, 711146, '2014-11-30', '11:00:00', 'CHAMP'),
(60, 7, 2014, 'SP CHARLEROI A', 'BCC', -1, -1, 0, 701215, '2014-09-06', '10:00:00', 'CHAMP'),
(61, 7, 2014, 'BCC', 'OLYMPIC MSM B', -1, -1, 0, 702215, '2014-09-13', '09:30:00', 'CHAMP'),
(62, 7, 2014, 'JS CUESMES', 'BCC', -1, -1, 0, 703216, '2014-09-20', '10:45:00', 'CHAMP'),
(63, 7, 2014, 'BCC', 'BELFIUS MONS HT', -1, -1, 0, 704212, '2014-10-04', '09:30:00', 'CHAMP'),
(64, 7, 2014, 'CEP FLEURUS', 'BCC', -1, -1, 0, 706213, '2014-10-18', '15:00:00', 'CHAMP'),
(65, 7, 2014, 'BCJ RESSAIX', 'BCC', -1, -1, 0, 707216, '2014-10-25', '16:00:00', 'CHAMP'),
(66, 7, 2014, 'BCC', 'JS LUTTRE A', -1, -1, 0, 705215, '2014-11-11', '09:30:00', 'CHAMP'),
(67, 7, 2014, 'BCCG 2007', 'BCC', -1, -1, 0, 709213, '2014-11-15', '12:30:00', 'CHAMP'),
(68, 7, 2014, 'BCC', 'OLYMPIC MSM', -1, -1, 0, 710215, '2014-11-22', '11:30:00', 'CHAMP'),
(69, 7, 2014, 'JS STAMBRUGES', 'BCC', -1, -1, 0, 711215, '2014-11-30', '09:30:00', 'CHAMP'),
(70, 8, 2014, 'SP CHARLEROI B', 'BCC', -1, -1, 0, 701226, '2014-09-06', '12:00:00', 'CHAMP'),
(71, 8, 2014, 'BCC', 'BBC BRAINOIS A', -1, -1, 0, 702223, '2014-09-13', '11:30:00', 'CHAMP'),
(72, 8, 2014, 'RBC MARCINELLE', 'BCC', -1, -1, 0, 703222, '2014-09-20', '16:30:00', 'CHAMP'),
(73, 8, 2014, 'BCC', 'RBC MONTAGNARD', -1, -1, 0, 704223, '2014-10-04', '11:30:00', 'CHAMP'),
(74, 8, 2014, 'BCC', 'BCR THUIN LOBBES', -1, -1, 0, 706223, '2014-10-18', '11:30:00', 'CHAMP'),
(75, 8, 2014, 'JSB MAFFLE A', 'BCC', -1, -1, 0, 707224, '2014-10-25', '10:00:00', 'CHAMP'),
(76, 8, 2014, 'RBC MORLANWELZ', 'BCC', -1, -1, 0, 705223, '2014-11-01', '13:30:00', 'CHAMP'),
(77, 8, 2014, 'BJC RESSAIX B', 'BCC', -1, -1, 0, 709225, '2014-11-16', '14:00:00', 'CHAMP'),
(78, 8, 2014, 'BCC', 'US LAMBUSART', -1, -1, 0, 710223, '2014-11-22', '13:30:00', 'CHAMP'),
(79, 8, 2014, 'RE PONT DE LOUP', 'BCC', -1, -1, 0, 711226, '2014-11-29', '14:30:00', 'CHAMP'),
(80, 9, 2014, 'UBC BINCHE B', 'BCC', -1, -1, 0, 701297, '2014-09-06', '12:00:00', 'CHAMP'),
(81, 9, 2014, 'BCC', 'BBC BRAINOIS B', -1, -1, 0, 702293, '2014-09-13', '13:30:00', 'CHAMP'),
(82, 9, 2014, 'JS SOIGNIES A', 'BCC', -1, -1, 0, 703292, '2014-09-20', '14:30:00', 'CHAMP'),
(83, 9, 2014, 'BCC', 'JS SOIGNIES B', -1, -1, 0, 704293, '2014-10-04', '13:30:00', 'CHAMP'),
(84, 9, 2014, 'NEW BC BOUSSU 2013', 'BCC', -1, -1, 0, 705297, '2014-10-11', '16:00:00', 'CHAMP'),
(85, 9, 2014, 'BCC', 'JS STAMBRUGES B', -1, -1, 0, 706293, '2014-10-18', '13:30:00', 'CHAMP'),
(86, 9, 2014, 'BCPC BRACQUEGNIES', 'BCC', -1, -1, 0, 707292, '2014-10-25', '17:00:00', 'CHAMP'),
(87, 9, 2014, 'RBC MORLANWELZ', 'BCC', -1, -1, 0, 709293, '2014-11-15', '11:30:00', 'CHAMP'),
(88, 9, 2014, 'JSE ENGHIEN', 'BCC', -1, -1, 0, 711296, '2014-11-29', '13:30:00', 'CHAMP'),
(89, 10, 2014, 'BCC', 'RBC JS BAULET B', -1, -1, 0, 702333, '2014-09-13', '15:30:00', 'CHAMP'),
(90, 10, 2014, 'BC FELUY-OBAY', 'BCC', -1, -1, 0, 703332, '2014-09-20', '10:00:00', 'CHAMP'),
(91, 1, 2014, 'ABC PERONNES', 'BCC', 72, 84, 0, 201, '2014-08-17', '11:45:00', 'COUPE'),
(92, 1, 2014, 'BCC', 'BC FELUY-OBAIX A', -1, -1, 0, 260, '2014-08-31', '11:00:00', 'COUPE'),
(93, 3, 2014, 'BCC', 'NEW BC BOUSSU 2013', 82, 32, 0, 603, '2014-08-31', '13:00:00', 'COUPE'),
(94, 10, 2014, 'BCC', 'OLYMPIC MSM B', -1, -1, 0, 704333, '2014-10-04', '15:30:00', 'CHAMP'),
(95, 10, 2014, 'BCC', 'BC ECAUSSINNES', -1, -1, 0, 706333, '2014-10-18', '15:30:00', 'CHAMP'),
(96, 10, 2014, 'JS SOIGNIES', 'BCC', -1, -1, 0, 707334, '2014-10-25', '14:45:00', 'CHAMP'),
(97, 10, 2014, 'RBC MORLANWELZ', 'BCC', -1, -1, 0, 705333, '2014-11-01', '10:00:00', 'CHAMP'),
(98, 10, 2014, 'BC MAURAGE', 'BCC', -1, -1, 0, 701336, '2014-11-11', '11:00:00', 'CHAMP'),
(99, 10, 2014, 'BCC', 'SPIROU FEMININ B', -1, -1, 0, 710333, '2014-11-22', '15:30:00', 'CHAMP'),
(100, 10, 2014, 'BCJ RESSAIX', 'BCC', -1, -1, 0, 711336, '2014-11-29', '10:30:00', 'CHAMP'),
(101, 11, 2014, 'BCC', 'UBC BINCHE (au BCC)', -1, -1, 0, 10000, '2014-10-05', '10:00:00', 'CHAMP'),
(102, 11, 2014, 'BCC', 'BC MAURAGE (au BCC)', -1, -1, 0, 10001, '2014-10-05', '12:00:00', 'CHAMP'),
(103, 11, 2014, 'BCC', 'BC CARNIERES B (au UBC Binche)', -1, -1, 0, 10002, '2014-11-15', '09:30:00', 'CHAMP'),
(104, 11, 2014, 'BC ECAUSSINNES (au UBC Binche)', 'BCC', -1, -1, 0, 10003, '2014-11-15', '10:30:00', 'CHAMP'),
(105, 11, 2014, 'BC ECAUSSINNES (au BCC)', 'BCC', -1, -1, 0, 10004, '2014-11-23', '11:00:00', 'CHAMP'),
(106, 11, 2014, 'BCC', 'BC CARNIERES B (au BCC)', -1, -1, 1, 10005, '2014-11-23', '12:00:00', 'CHAMP'),
(107, 12, 2014, 'BCC', 'BC ECAUSSINNES (au BCC)', -1, -1, 0, 11000, '2014-10-05', '10:00:00', 'CHAMP'),
(108, 12, 2014, 'UBC BINCHE (au BCC)', 'BCC', -1, -1, 0, 11001, '2014-10-05', '11:00:00', 'CHAMP'),
(109, 12, 2014, 'BC CARNIERES A (au UBC Binche)', 'BCC', -1, -1, 0, 11002, '2014-11-15', '09:30:00', 'CHAMP'),
(110, 12, 2014, 'BCC', 'BC MAURAGE (au UBC Binche)', -1, -1, 0, 11003, '2014-11-15', '10:30:00', 'CHAMP'),
(111, 12, 2014, 'BCC', 'BC MAURAGE (au BCC)', -1, -1, 0, 11004, '2014-11-23', '10:00:00', 'CHAMP'),
(112, 12, 2014, 'BC CARNIERES A (au BCC)', 'BCC', -1, -1, 0, 11005, '2014-11-23', '12:00:00', 'CHAMP'),
(113, 6, 2014, 'BCC', 'FDFD', -1, -1, 0, 100, '2014-09-02', '20:00:00', 'AMICA');

-- --------------------------------------------------------

--
-- Table structure for table `teamscoaches`
--

DROP TABLE IF EXISTS `teamscoaches`;
CREATE TABLE IF NOT EXISTS `teamscoaches` (
  `idTeamCoach` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `idCoach` int(11) NOT NULL,
  `coachLicence` varchar(10) NOT NULL,
  `mainCoach` int(11) NOT NULL DEFAULT '1',
  `YearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamscoaches`
--

INSERT INTO `teamscoaches` (`idTeamCoach`, `idTeam`, `idCoach`, `coachLicence`, `mainCoach`, `YearTeam`) VALUES
(3, 11, 6, '', 1, 2014),
(4, 8, 6, '', 1, 2014),
(5, 1, 16, '', 1, 2014),
(7, 5, 16, '', 1, 2014),
(8, 6, 15, '', 1, 2014),
(9, 3, 14, '', 1, 2014),
(10, 7, 9, '', 1, 2014),
(11, 10, 13, '', 1, 2014),
(12, 11, 12, '', 0, 2014),
(13, 2, 42, '', 1, 2014),
(14, 4, 44, '', 1, 2014),
(15, 4, 45, '', 1, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `teamsdelegues`
--

DROP TABLE IF EXISTS `teamsdelegues`;
CREATE TABLE IF NOT EXISTS `teamsdelegues` (
  `idTeamDelegue` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `idDelegue` int(11) NOT NULL,
  `mainDelegue` int(11) NOT NULL DEFAULT '0',
  `yearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamsdelegues`
--

INSERT INTO `teamsdelegues` (`idTeamDelegue`, `idTeam`, `idDelegue`, `mainDelegue`, `yearTeam`) VALUES
(4, 3, 1, 1, 2013),
(5, 2, 1, 0, 2013),
(6, 1, 7, 1, 2013),
(7, 3, 7, 0, 2013),
(8, 2, 3, 1, 2013),
(9, 4, 40, 1, 2014),
(10, 4, 41, 0, 2014),
(11, 2, 43, 1, 2014),
(12, 3, 1, 1, 2014),
(13, 3, 19, 0, 2014),
(14, 3, 26, 0, 2014),
(15, 3, 39, 0, 2014),
(16, 3, 32, 0, 2014),
(17, 3, 25, 0, 2014),
(18, 3, 47, 0, 2014);

-- --------------------------------------------------------

--
-- Table structure for table `teamsgames`
--

DROP TABLE IF EXISTS `teamsgames`;
CREATE TABLE IF NOT EXISTS `teamsgames` (
  `idTeamGame` int(11) NOT NULL ,
  `idTeam` int(11) NOT NULL,
  `currentYear` int(11) NOT NULL,
  `gameDay` int(11) NOT NULL,
  `gameTime` time NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamsgames`
--

INSERT INTO `teamsgames` (`idTeamGame`, `idTeam`, `currentYear`, `gameDay`, `gameTime`) VALUES
(1, 1, 2013, 6, '20:45:00'),
(2, 2, 2013, 6, '18:30:00'),
(3, 1, 2014, 6, '20:45:00'),
(4, 2, 2014, 6, '18:00:00'),
(5, 4, 2014, 6, '18:00:00'),
(6, 3, 2014, 6, '15:30:00'),
(7, 6, 2014, 6, '12:00:00'),
(8, 7, 2014, 6, '09:30:00'),
(9, 8, 2014, 6, '11:30:00'),
(10, 9, 2014, 6, '13:30:00'),
(11, 10, 2014, 6, '15:30:00'),
(12, 5, 2014, 6, '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teamsplayers`
--

DROP TABLE IF EXISTS `teamsplayers`;
CREATE TABLE IF NOT EXISTS `teamsplayers` (
  `idTeamPlayer` int(11) NOT NULL ,
  `idTeam` int(11) NOT NULL,
  `idPlayer` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `position` varchar(20) NOT NULL,
  `yearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamsplayers`
--

INSERT INTO `teamsplayers` (`idTeamPlayer`, `idTeam`, `idPlayer`, `number`, `position`, `yearTeam`) VALUES
(2, 5, 76, 0, '', 2014),
(3, 5, 77, 0, '', 2014),
(4, 5, 78, 0, '', 2014),
(5, 5, 79, 0, '', 2014),
(6, 5, 80, 0, '', 2014),
(7, 5, 81, 0, '', 2014),
(8, 5, 82, 0, '', 2014),
(9, 5, 83, 0, '', 2014),
(10, 5, 84, 0, '', 2014),
(11, 5, 85, 0, '', 2014),
(12, 5, 86, 0, '', 2014),
(14, 6, 74, 13, 'Pivot', 2014),
(15, 6, 73, 14, 'Ailier', 2014),
(17, 6, 71, 5, 'Ailier/Meneur', 2014),
(18, 6, 70, 11, 'Pivot', 2014),
(19, 6, 69, 8, 'Meneur', 2014),
(20, 6, 68, 4, 'Meneur', 2014),
(21, 6, 67, 7, 'Pivot', 2014),
(24, 6, 64, 10, 'Ailier/pivot', 2014),
(25, 6, 63, 12, 'Ailier', 2014),
(27, 3, 51, 4, '', 2014),
(28, 3, 52, 14, '', 2014),
(29, 3, 53, 12, '', 2014),
(31, 3, 55, 16, '', 2014),
(32, 3, 57, 9, '', 2014),
(33, 3, 58, 18, '', 2014),
(34, 3, 1, 6, '', 2014),
(35, 3, 59, 11, '', 2014),
(36, 3, 60, 5, '', 2014),
(37, 3, 61, 15, '', 2014),
(38, 3, 62, 13, '', 2014),
(39, 3, 87, 7, '', 2014),
(40, 7, 50, 0, '', 2014),
(41, 7, 49, 0, '', 2014),
(42, 7, 47, 0, '', 2014),
(43, 7, 46, 0, '', 2014),
(44, 7, 45, 0, '', 2014),
(45, 7, 43, 0, '', 2014),
(46, 7, 42, 0, '', 2014),
(47, 7, 40, 0, '', 2014),
(48, 7, 35, 0, '', 2014),
(49, 8, 32, 0, '', 2014),
(50, 8, 34, 0, '', 2014),
(51, 8, 36, 0, '', 2014),
(52, 8, 37, 0, '', 2014),
(53, 8, 38, 0, '', 2014),
(54, 8, 39, 0, '', 2014),
(55, 8, 41, 0, '', 2014),
(56, 8, 44, 0, '', 2014),
(57, 8, 48, 0, '', 2014),
(58, 9, 27, 0, '', 2014),
(59, 9, 28, 0, '', 2014),
(60, 9, 29, 0, '', 2014),
(61, 9, 31, 0, '', 2014),
(62, 10, 20, 0, '', 2014),
(63, 10, 21, 0, '', 2014),
(64, 10, 22, 0, '', 2014),
(65, 10, 23, 0, '', 2014),
(66, 10, 24, 0, '', 2014),
(67, 10, 25, 0, '', 2014),
(68, 10, 26, 0, '', 2014),
(69, 11, 12, 0, '', 2014),
(70, 11, 3, 0, '', 2014),
(71, 11, 4, 0, '', 2014),
(72, 11, 5, 0, '', 2014),
(73, 11, 6, 0, '', 2014),
(74, 11, 7, 0, '', 2014),
(75, 11, 8, 0, '', 2014),
(76, 11, 9, 0, '', 2014),
(77, 11, 10, 0, '', 2014),
(78, 11, 11, 0, '', 2014),
(79, 11, 13, 0, '', 2014),
(80, 11, 15, 0, '', 2014),
(81, 11, 16, 0, '', 2014),
(82, 11, 17, 0, '', 2014),
(83, 11, 18, 0, '', 2014),
(84, 11, 19, 0, '', 2014),
(85, 11, 14, 0, '', 2014),
(86, 11, 2, 0, '', 2014),
(87, 4, 88, 0, '', 2014),
(88, 4, 89, 0, '', 2014),
(89, 4, 90, 0, '', 2014),
(90, 4, 91, 0, '', 2014),
(91, 4, 92, 0, '', 2014),
(92, 4, 93, 0, '', 2014),
(93, 4, 94, 0, '', 2014),
(94, 4, 95, 0, '', 2014),
(95, 4, 96, 0, '', 2014),
(96, 4, 97, 0, '', 2014),
(97, 4, 98, 0, '', 2014),
(98, 4, 99, 0, '', 2014),
(99, 2, 100, 0, '', 2014),
(100, 2, 101, 0, '', 2014),
(101, 2, 102, 0, '', 2014),
(102, 2, 104, 0, '', 2014),
(103, 2, 103, 0, '', 2014),
(104, 2, 105, 0, '', 2014),
(105, 2, 106, 0, '', 2014),
(106, 2, 107, 0, '', 2014),
(107, 2, 108, 0, '', 2014),
(108, 2, 109, 0, '', 2014),
(109, 2, 110, 0, '', 2014),
(110, 6, 112, 6, 'Pivot', 2014),
(111, 6, 111, 9, 'Ailier', 2014),
(112, 1, 113, 0, '', 2014),
(113, 1, 77, 0, '', 2014),
(114, 1, 114, 0, '', 2014),
(115, 1, 115, 0, '', 2014),
(116, 1, 116, 0, '', 2014),
(117, 1, 85, 0, '', 2014),
(118, 1, 117, 0, '', 2014),
(119, 1, 118, 0, '', 2014),
(120, 1, 84, 0, '', 2014),
(121, 1, 119, 0, '', 2014),
(122, 6, 75, 15, 'Pivot', 2014);

-- --------------------------------------------------------

--
-- Table structure for table `teamsranking`
--

DROP TABLE IF EXISTS `teamsranking`;
CREATE TABLE IF NOT EXISTS `teamsranking` (
  `idRanking` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `myYear` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `played` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `lost` int(11) NOT NULL,
  `deuce` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `dateRanking` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teamsranking`
--

INSERT INTO `teamsranking` (`idRanking`, `idTeam`, `myYear`, `name`, `played`, `win`, `lost`, `deuce`, `points`, `dateRanking`) VALUES
(1, 1, 2013, 'qs', 4, 2, 1, 1, 8, '2014-03-04'),
(2, 2, 2013, 'aaa', 3, 1, 1, 1, 5, '0000-00-00'),
(3, 2, 2013, 'bbb', 3, 1, 1, 1, 5, '0000-00-00'),
(4, 1, 2014, 'BC CARNIERES A', 0, 0, 0, 0, 0, '0000-00-00'),
(5, 1, 2014, 'BCJ RESSAIX A', 0, 0, 0, 0, 0, '0000-00-00'),
(6, 1, 2014, 'RBC MONTAGNARD A', 0, 0, 0, 0, 0, '0000-00-00'),
(7, 1, 2014, 'RBC JS BAULET A', 0, 0, 0, 0, 0, '0000-00-00'),
(8, 1, 2014, 'JSB MAFFLE A', 0, 0, 0, 0, 0, '0000-00-00'),
(9, 1, 2014, 'BC L''9 FLENU A', 0, 0, 0, 0, 0, '0000-00-00'),
(10, 1, 2014, 'JS STAMBRUGES A', 0, 0, 0, 0, 0, '0000-00-00'),
(11, 1, 2014, 'US VX CAMPINAIRE A', 0, 0, 0, 0, 0, '0000-00-00'),
(12, 1, 2014, 'RCBE 2000 A', 0, 0, 0, 0, 0, '0000-00-00'),
(13, 1, 2014, 'BBC TOURNAI A', 0, 0, 0, 0, 0, '0000-00-00'),
(14, 1, 2014, 'CHARLEROI RAVENS A', 0, 0, 0, 0, 0, '0000-00-00'),
(15, 1, 2014, 'REBC TEMPLEUVE A', 0, 0, 0, 0, 0, '0000-00-00'),
(16, 1, 2014, 'ABC TREM MOUSCRON A', 0, 0, 0, 0, 0, '0000-00-00'),
(17, 1, 2014, 'OLYMPIC MSM B', 0, 0, 0, 0, 0, '2014-08-26'),
(18, 3, 2014, 'BC CARNIERES', 1, 1, 0, 0, 3, '2014-09-08'),
(19, 3, 2014, 'BELFIUS MONS HT', 0, 0, 0, 0, 0, '2014-09-08'),
(20, 3, 2014, 'RBC JS BAULET', 0, 0, 0, 0, 0, '2014-09-08'),
(21, 3, 2014, 'RE PONT DE LOUP', 0, 0, 0, 0, 0, '2014-09-08'),
(22, 3, 2014, 'OLYMPIC MSM A', 0, 0, 0, 0, 0, '2014-09-08'),
(23, 3, 2014, 'ABC REM MOUSCRON A', 0, 0, 0, 0, 0, '2014-09-08'),
(24, 3, 2014, 'JS LUTTRE', 0, 0, 0, 0, 0, '2014-09-08'),
(25, 3, 2014, 'JSB MAFFLE A', 0, 0, 0, 0, 0, '2014-09-08'),
(26, 3, 2014, 'SP CHARLEROI A', 0, 0, 0, 0, 0, '2014-09-08'),
(27, 3, 2014, 'US VX CAMPINAIRE', 0, 0, 0, 0, 0, '2014-09-08'),
(28, 3, 2014, 'JS DOTTIGNIES A', 0, 0, 0, 0, 0, '2014-09-08'),
(29, 3, 2014, 'R BLAREGNIES BC', 0, 0, 0, 0, 0, '2014-09-08'),
(30, 3, 2014, 'BCJ RESSAIX', 1, 0, 1, 1, 1, '2014-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `teamstraining`
--

DROP TABLE IF EXISTS `teamstraining`;
CREATE TABLE IF NOT EXISTS `teamstraining` (
  `idTraining` int(11) NOT NULL ,
  `idTeam` int(11) NOT NULL,
  `currentYear` int(11) NOT NULL,
  `dayOfWeek` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `room` varchar(40) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `teamstraining`
--

INSERT INTO `teamstraining` (`idTraining`, `idTeam`, `currentYear`, `dayOfWeek`, `startTime`, `endTime`, `room`) VALUES
(2, 1, 2013, 1, '19:00:00', '20:30:00', 'Salle Provinciale (1)'),
(3, 2, 2013, 1, '19:00:00', '20:30:00', 'Salle Provinciale (2)'),
(4, 2, 2013, 3, '19:30:00', '21:00:00', 'Salle Salle Comunale (1)'),
(5, 1, 2013, 4, '21:00:00', '22:30:00', 'Salle Salle Comunale (1)'),
(6, 2, 2013, 5, '20:00:00', '22:00:00', 'Salle Salle Comunale (2)'),
(7, 1, 2013, 2, '18:00:00', '20:00:00', 'Salle Salle Comunale (3)'),
(8, 1, 2014, 1, '21:00:00', '22:30:00', 'Salle Comunale'),
(9, 1, 2014, 3, '19:30:00', '21:00:00', 'Salle Comunale (T1)'),
(10, 1, 2014, 4, '19:30:00', '21:00:00', 'Salle Comunale (T1)'),
(11, 2, 2014, 4, '21:00:00', '22:30:00', 'Salle Comunale'),
(12, 4, 2014, 3, '19:30:00', '21:00:00', 'Salle Comunale (T2)'),
(13, 5, 2014, 1, '21:00:00', '22:30:00', 'Salle Comunale'),
(14, 5, 2014, 3, '19:30:00', '21:00:00', 'Salle Comunale (T1)'),
(15, 5, 2014, 4, '19:30:00', '21:00:00', 'Salle Comunale (T1)'),
(16, 6, 2014, 1, '19:00:00', '20:30:00', 'Salle provinciale (T1)'),
(17, 6, 2014, 3, '18:00:00', '19:30:00', 'Salle Comunale (T1)'),
(18, 6, 2014, 4, '18:00:00', '19:30:00', 'Salle Comunale (T2)'),
(19, 3, 2014, 1, '19:00:00', '20:30:00', 'Salle provinciale (T2)'),
(20, 3, 2014, 3, '18:00:00', '19:30:00', 'Salle Comunale (T2)'),
(21, 3, 2014, 5, '17:15:00', '18:30:00', 'Salle Comunale (T2)'),
(22, 7, 2014, 2, '18:00:00', '19:30:00', 'Salle Comunale (T1)'),
(23, 7, 2014, 3, '18:00:00', '19:30:00', 'Salle provinciale (T3)'),
(24, 7, 2014, 5, '17:15:00', '18:30:00', 'Salle Comunale (T1)'),
(25, 8, 2014, 1, '19:00:00', '20:30:00', 'Salle provinciale (T3)'),
(26, 8, 2014, 3, '16:30:00', '18:00:00', 'Salle Comunale (T2)'),
(27, 8, 2014, 2, '18:00:00', '19:30:00', 'Salle Comunale (T2)'),
(28, 9, 2014, 3, '16:30:00', '18:00:00', 'Salle Comunale (T1)'),
(29, 9, 2014, 1, '16:45:00', '18:00:00', 'Salle Comunale (T2)'),
(30, 10, 2014, 1, '16:45:00', '18:00:00', 'Salle Comunale (T1)'),
(31, 10, 2014, 3, '15:00:00', '16:30:00', 'Salle Comunale (T1)'),
(32, 11, 2014, 5, '16:15:00', '17:15:00', 'Salle Comunale');

-- --------------------------------------------------------

--
-- Table structure for table `typesmatchs`
--

DROP TABLE IF EXISTS `typesmatchs`;
CREATE TABLE IF NOT EXISTS `typesmatchs` (
  `idTypeMatch` char(6) NOT NULL,
  `TypeMatch` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typesmatchs`
--

INSERT INTO `typesmatchs` (`idTypeMatch`, `TypeMatch`) VALUES
('AMICAL', 'Amical'),
('CHAMP', 'Championnat'),
('COUPE', 'Coupe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL ,
  `name` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `name`, `firstname`, `mail`, `password`, `active`) VALUES
(1, 'Romano', 'Carmelo', 'webmaster@basket.be', '01c38c3ca0cba90', 1),
(2, 'Lecrivain', 'Jacques', 'jlecrivain@basket.be', '59dd64c6e394d', 0),
(3, 'François', 'Karinne', 'secretaire@basket.be', '6395f80141f140', 1),
(4, 'Vicic', 'Rudy', 'tresorier@basket.be', '518c68865784', 1),
(5, 'Duray', 'Yves', 'yves_duray@basket.be', 'd4a1363f7695', 1),
(6, 'Vercleven', 'Aline', 'coordinateur.petit.ballon@basket.be', 'ed66094693bcfa8', 1),
(7, 'Staelpaert', 'André', 'staelpaert.andre@basket.be', '130079801c6d2', 0),
(8, 'D''Haeyer', 'Daniel', 'president@basket.be', '93d54b002e2b', 1),
(9, 'Stevens', 'Anthony', 'coordinateur.gros.ballon@basket.be', '0cacd9f13ff05', 1),
(10, 'Engin', 'Dominique', 'dominique_engin@basket.be', '9b045338b161', 1),
(11, 'Collard', 'Joseph', 'joseph_collard@basket.be', '6b02f9e0b52', 1),
(12, 'Goffaux', 'Martin', 'goffauxmartin@basket.be', '06257834e1223', 1),
(13, 'Ciuro', 'Miguel', 'miguel_ciuro_10@basket.be', 'e87d3035f9cfd', 1),
(14, 'Houdart', 'Michaël', 'houdartmichael@basket.be', '25c90f4f7e5d7e', 1),
(15, 'Pontillo', 'Moreno', 'pontillo-moreno@basket..be', '09bd067d94006', 1),
(16, 'Buja', 'Sébastien', 'bujasebastien@basket.be', '641bd542009af80', 1),
(17, 'Vermeersch', 'Wilfrid', 'delegue.general@basket.be', 'b0ef479a2267aa76', 1),
(18, 'Alloisio', 'Stéphane', 'alloisio_lescart@basket.be', 'fa0ab59d8de33', 0),
(19, 'Chiavetta', 'Calogero', 'chipieflic@basket.be', '98cd0f919185', 1),
(20, 'Cipolletta', 'Marjorie', 'marjoriecipolletta@basket.be', 'a35b41034d2c57', 1),
(21, 'Deveen', 'Cathy', 'enricoperugini@basket.be', '6c6aa841514', 1),
(22, 'Dragone', 'Joséphine', 'dragonejoe@basket..be', '19f4e97faa3b', 1),
(23, 'Dupont', 'Marc', 'dupfamily1@basket.be', '2e1a8a83c754', 0),
(24, 'Dupont', 'Pierre', 'dupfamily4@basket.be', '9d531be3d3c98', 1),
(25, 'Halipre		', 'Stéphanie', 'ninibelgique@basket.be', 'cce7e7e8cb89c21', 1),
(26, 'Hoslet', 'Philippe', 'philippe.hoslet@total.be', '596cbf216b', 1),
(27, 'Karbowiak', 'Dominique', 'd.karbowiak@ergopro.be', '64ac1e890e4', 1),
(28, 'Lacroix', 'Thierry', 'thierrylacroix603@basket.be', 'cdca6bebb7', 1),
(29, 'Lecocq', 'Christian', 'christian.lec@basket.be', 'f1d5bf2f52', 1),
(31, 'Lescart', 'Nathalie', 'alloisio_lescart2@basket.be', '3802d6301ec', 0),
(32, 'Mammone', 'Michelina', 'michelina.mammone@basket.be', 'd068f41628ec', 1),
(33, 'Marcus', 'Romuald', 'romuald.marcus@basket.be', 'd00219c15', 1),
(34, 'Moro', 'Doriann', 'dupfamily4A@basket.be', '37fbe5d92', 1),
(35, 'Odeurs', 'Yvan', 'y.odeurs@basket.be', 'f05a1fcd4411e', 1),
(36, 'Petit', 'Lena', 'petit.lena@basket.be', '245aac07', 1),
(37, 'Quintart', 'Christophe', 'christophequintart@basket.be', '46c78', 1),
(38, 'Rappez', 'Isabelle', 'isabelle.rappez@basket.be', '4526544', 1),
(39, 'Soquette', 'Dominique', 'soquetted@basket.be', 'fe538ab56ea9', 1),
(40, 'Capiteyn', 'Joël', 'jca@cph.be', '0c0fb6b235035', 1),
(41, 'Pinsart', 'Nathalie', 'nathalie_pinsart@basket.be', '0c0fb6b2235035', 1),
(43, 'Delespesse', 'Michel', 'memel@basket.be', 'b63ca426aedac2', 1),
(44, 'Ballieu', 'Marino', 'maguyno@basket.be', 'a24465fde281', 1),
(45, 'Demeuter', 'Damien', 'damien.demeuter@basket.be', '5a82520d410', 1),
(46, 'Wilmot', 'Frédéric', 'consultantsportif@basket.be', '6a9400207d59', 1),
(47, 'Peeters', 'Pascal', 'peetersp844@basket.be', '1a91168', 1);
