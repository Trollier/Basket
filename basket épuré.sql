DROP DATABASE IF EXISTS basketProject;
CREATE DATABASE IF NOT EXISTS basketProject;
USE basketProject;

DROP TABLE IF EXISTS `daysofweek`;
CREATE TABLE IF NOT EXISTS `daysofweek` (
  `idDay` int(11) NOT NULL,
  `Label` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `idPlayer` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRole` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idRoleType` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `roletype`;
CREATE TABLE IF NOT EXISTS `roletype` (
  `roleTypeId` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `ordre` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  UNIQUE KEY `label` (`label`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `idStaff` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `showInMenu` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `staffsroletypes`;
CREATE TABLE IF NOT EXISTS `staffsroletypes` (
  `idStaffRoleType` int(11) NOT NULL,
  `idStaff` int(11) NOT NULL,
  `idRoleType` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


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

DROP TABLE IF EXISTS `teamscoaches`;
CREATE TABLE IF NOT EXISTS `teamscoaches` (
  `idTeamCoach` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `idCoach` int(11) NOT NULL,
  `coachLicence` varchar(10) NOT NULL,
  `mainCoach` int(11) NOT NULL DEFAULT '1',
  `YearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `teamsdelegues`;
CREATE TABLE IF NOT EXISTS `teamsdelegues` (
  `idTeamDelegue` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `idDelegue` int(11) NOT NULL,
  `mainDelegue` int(11) NOT NULL DEFAULT '0',
  `yearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `teamsgames`;
CREATE TABLE IF NOT EXISTS `teamsgames` (
  `idTeamGame` int(11) NOT NULL ,
  `idTeam` int(11) NOT NULL,
  `currentYear` int(11) NOT NULL,
  `gameDay` int(11) NOT NULL,
  `gameTime` time NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `teamsplayers`;
CREATE TABLE IF NOT EXISTS `teamsplayers` (
  `idTeamPlayer` int(11) NOT NULL ,
  `idTeam` int(11) NOT NULL,
  `idPlayer` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `position` varchar(20) NOT NULL,
  `yearTeam` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;


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


DROP TABLE IF EXISTS `typesmatchs`;
CREATE TABLE IF NOT EXISTS `typesmatchs` (
  `idTypeMatch` char(6) NOT NULL,
  `TypeMatch` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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

