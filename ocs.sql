-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jan 2018 um 14:59
-- Server-Version: 10.1.28-MariaDB
-- PHP-Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ocs`
--

-- --------------------------------------------------------

--
-- Stellvertreter-Struktur des Views `getmessages`
-- (Siehe unten für die tatsächliche Ansicht)
--
CREATE TABLE `getmessages` (
`id` int(11)
,`fk_user` int(11)
,`username` varchar(50)
,`haspic` tinyint(4)
,`text` varchar(500)
,`fk_room` int(11)
,`name` varchar(30)
,`maxusers` int(11)
,`time` timestamp
);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_room` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `message`
--

INSERT INTO `message` (`id`, `text`, `fk_user`, `fk_room`, `time`) VALUES
(1, 'hallo', 8, 1, '2018-01-15 07:50:20'),
(2, 'hallo', 8, 1, '2018-01-15 07:50:30'),
(3, 'hallo', 8, 3, '2018-01-15 07:50:37'),
(4, 'hallo', 8, 1, '2018-01-15 07:50:46'),
(5, 'hallo', 8, 2, '2018-01-15 07:50:51'),
(6, 'Hio', 1, 1, '2018-01-15 08:52:35'),
(7, 'awd', 1, 2, '2018-01-15 08:24:16'),
(8, 'nice', 8, 1, '2018-01-15 08:50:04'),
(9, 'Was geht ab', 2, 1, '2018-01-15 08:52:50'),
(10, 'hehe', 2, 1, '2018-01-15 08:52:54'),
(11, 'naaa', 2, 1, '2018-01-15 08:53:12'),
(12, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', 8, 1, '2018-01-15 08:56:12'),
(13, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', 1, 2, '2018-01-15 08:57:06'),
(14, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores ', 1, 1, '2018-01-15 08:57:24'),
(15, 'lalala', 8, 1, '2018-01-15 08:57:50'),
(16, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 1, 1, '2018-01-15 08:58:02'),
(17, 'moiensenz', 1, 1, '2018-01-15 09:42:02'),
(18, 'yeeeeeeeeeeee', 8, 3, '2018-01-15 09:43:53'),
(19, 'hi', 8, 1, '2018-01-15 09:44:14'),
(20, 'hi', 8, 3, '2018-01-15 09:44:24'),
(21, 'lel', 1, 1, '2018-01-15 09:44:50'),
(22, 'ajo0', 8, 1, '2018-01-15 09:45:00'),
(23, 'lul', 8, 1, '2018-01-15 09:45:12'),
(24, 'hallo', 8, 1, '2018-01-29 07:43:10'),
(25, 'hh', 2, 1, '2018-01-29 11:20:47'),
(26, 'geil', 2, 5, '2018-01-29 11:21:21');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `maxusers` int(11) DEFAULT '10',
  `currentusers` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `room`
--

INSERT INTO `room` (`id`, `name`, `maxusers`, `currentusers`) VALUES
(1, 'Raum 1', 10, 0),
(2, 'Raum 2', 10, 0),
(3, 'Raum Trompse', 100, 0),
(4, 'Trompstetetetete', 50, 0),
(5, 'Thorstens Knebelbude', 2, 0),
(6, 'Knickidiknick', 23, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(36) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fk_room` int(11) DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `haspic` tinyint(4) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `fk_room`, `blocked`, `level`, `haspic`, `admin`) VALUES
(1, 'CptnDaddy', '2ad4df4d8472d092d1bd5abd0ccc7c8e', 'nicolas.hage2@gmail.com', 5, 0, 0, 1, 1),
(2, 'tronje', '68b62823ed173ad3bed0ce700d556b2a', 'dohurensohn@yahoo.de', 5, 0, 0, 1, 0),
(3, 'jessica', '8326046e50889a72a8e6f39f6dc218f7', 'jessicakeucher@web.de', NULL, 0, 0, 0, 0),
(4, 'Holag', 'dd38a11978447c52eef3db393eb9d348', 'holag147@googlemail.com', NULL, 0, 0, 0, 0),
(7, 'Marcel', '25d55ad283aa400af464c76d713c07ad', 'marcel@tie.de', NULL, 0, 0, 0, 0),
(8, 'Strezzka', '68b62823ed173ad3bed0ce700d556b2a', 'de.de@de.de', 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktur des Views `getmessages`
--
DROP TABLE IF EXISTS `getmessages`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getmessages`  AS  select `m`.`id` AS `id`,`m`.`fk_user` AS `fk_user`,`u`.`username` AS `username`,`u`.`haspic` AS `haspic`,`m`.`text` AS `text`,`m`.`fk_room` AS `fk_room`,`r`.`name` AS `name`,`r`.`maxusers` AS `maxusers`,`m`.`time` AS `time` from ((`message` `m` join `users` `u` on((`m`.`fk_user` = `u`.`id`))) join `room` `r` on((`m`.`fk_room` = `r`.`id`))) ;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_ibfk_1` (`fk_user`),
  ADD KEY `message_ibfk_2` (`fk_room`);

--
-- Indizes für die Tabelle `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`fk_room`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT für Tabelle `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`fk_room`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_room`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
