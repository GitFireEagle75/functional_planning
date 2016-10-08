-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Okt 2016 um 12:50
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `funktionsbesetzung_bf_berlin`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dienstgrad`
--

CREATE TABLE `dienstgrad` (
  `Dienstgrad_ID` int(11) NOT NULL,
  `Dienstgrad_Bezeichnung` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `dienstgrad`
--

INSERT INTO `dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES
(1, 'LBD'),
(2, 'LBDv'),
(3, 'BD*'),
(4, 'BD'),
(5, 'BOR'),
(6, 'BR'),
(7, 'BRef'),
(8, 'BOAR'),
(9, 'BAR'),
(10, 'BA'),
(11, 'BOI'),
(12, 'BI'),
(13, 'BOI_Anw'),
(14, 'HBMz'),
(15, 'HBM*'),
(16, 'HBM'),
(17, 'OBM'),
(18, 'BM'),
(19, 'BM_Anw');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dienststellen`
--

CREATE TABLE `dienststellen` (
  `Dienststellen_ID` int(11) NOT NULL,
  `Direktion_Direktion_ID` int(11) NOT NULL,
  `Wache_Bezeichnung` varchar(45) NOT NULL,
  `Wach_Nr` smallint(6) NOT NULL,
  `soll_Tag` smallint(2) DEFAULT NULL,
  `soll_Nacht` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `dienststellen`
--

INSERT INTO `dienststellen` (`Dienststellen_ID`, `Direktion_Direktion_ID`, `Wache_Bezeichnung`, `Wach_Nr`, `soll_Tag`, `soll_Nacht`) VALUES
(1, 1, 'FW_1300', 1300, 20, 18);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `direktion`
--

CREATE TABLE `direktion` (
  `Direktion_ID` int(11) NOT NULL,
  `Direktion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `direktion`
--

INSERT INTO `direktion` (`Direktion_ID`, `Direktion`) VALUES
(1, 'Nord'),
(2, 'Süd'),
(3, 'West');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeuge`
--

CREATE TABLE `fahrzeuge` (
  `Fahrzeuge_ID` int(11) NOT NULL,
  `Fahrzeuge_Art` varchar(15) NOT NULL,
  `Fahrzeug_Bezeichnung` varchar(10) NOT NULL,
  `Rettungsdienst_Type` enum('C','B','A') NOT NULL DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `fahrzeuge`
--

INSERT INTO `fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES
(1, 'LHF', 'LHF_1', 'B'),
(2, 'LHF', 'LHF_2', 'B'),
(3, 'DLK', 'DLK', 'B'),
(4, 'RTW', 'RTW_1', 'B'),
(5, 'RTW', 'RTW_2', 'B'),
(6, 'RTW', 'RTW_3', 'B'),
(7, 'RTW', 'RTW_4', 'B'),
(8, 'RTW', 'RTW_5', 'B'),
(9, 'RTW', 'RTW_6', 'B'),
(10, 'RTW', 'RTW_7', 'B'),
(11, 'RTW', 'RTW_8', 'B'),
(12, 'RTW', 'RTW_9', 'B'),
(13, 'RTW', 'RTW_10', 'B');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeugfunktionen`
--

CREATE TABLE `fahrzeugfunktionen` (
  `Fahrzeugfunktionen_ID` int(11) NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID` int(11) NOT NULL,
  `Funktions_Kennung` varchar(45) NOT NULL,
  `Funktions_Bezeichnung` varchar(45) DEFAULT NULL,
  `Grund_Qualifizierung` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `fahrzeugfunktionen`
--

INSERT INTO `fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES
(1, 4, '711', 'RDV_RTW_1', 'NULL'),
(2, 4, '712', 'MA_RTW_1', 'NULL'),
(3, 4, '713', 'Prakt_RTW_1', 'NULL'),
(4, 5, '721', 'RDV_RTW_2', 'NULL'),
(5, 5, '722', 'MA_RTW_2', 'NULL'),
(6, 5, '723', 'Prakt_RTW_2', 'NULL'),
(7, 6, '731', 'RDV_RTW_3', 'NULL'),
(8, 6, '732', 'MA_RTW_3', 'NULL'),
(9, 6, '733', 'Prakt_RTW_3', 'NULL'),
(10, 7, '741', 'RDV_RTW_4', 'NULL'),
(11, 7, '742', 'MA_RTW_4', 'NULL'),
(12, 7, '743', 'Prakt_RTW_4', 'NULL'),
(13, 8, '751', 'RDV_RTW_5', 'NULL'),
(14, 8, '752', 'MA_RTW_5', 'NULL'),
(15, 8, '753', 'Prakt_RTW_5', 'NULL'),
(16, 9, '761', 'RDV_RTW_6', 'NULL'),
(17, 9, '762', 'MA_RTW_6', 'NULL'),
(18, 9, '763', 'Prakt_RTW_6', 'NULL'),
(19, 1, '371', 'Fzf_Lhf_1', 'NULL'),
(20, 1, '372', 'Fzf_Lhf_1_Pra', 'NULL'),
(21, 1, '521', 'MA_Lhf_1', 'NULL'),
(22, 1, '522', 'ATr_Fü_Lhf_1', 'NULL'),
(23, 1, '523', 'ATr_Ma_Lhf_1', 'NULL'),
(24, 1, '524', 'ATr_Pra_Lhf_1', 'NULL');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeugzuordnung_dienststelle`
--

CREATE TABLE `fahrzeugzuordnung_dienststelle` (
  `Fahrzeugzuordnung_Dienststelle_ID` int(11) NOT NULL,
  `Dienststellen_Dienststellen_ID` int(11) NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID` int(11) NOT NULL,
  `Position_auf_Dienststelle` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `gültig_ab` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeugzuordnung_stützpunkt`
--

CREATE TABLE `fahrzeugzuordnung_stützpunkt` (
  `Fahrzeugzuordnung_Stützpunkte_ID` int(11) NOT NULL,
  `Dienststellen_Dienststellen_ID` int(11) NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID` int(11) NOT NULL,
  `Position_auf_Stützpunkt` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `gültig_ab` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `freiwillige_wache`
--

CREATE TABLE `freiwillige_wache` (
  `Freiwillige_Wache_ID` int(11) NOT NULL,
  `Direktion_Direktion_ID` int(11) NOT NULL,
  `Wache_Bezeichnung` varchar(45) NOT NULL,
  `Wach_Nr` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funktionsbesetzung`
--

CREATE TABLE `funktionsbesetzung` (
  `Funktionsbesetzung_ID` int(11) NOT NULL,
  `Personal_Personal_ID` int(11) NOT NULL,
  `Wachabteilung_Wachabteilung_ID` int(11) NOT NULL,
  `Planungs_Datum` date DEFAULT NULL,
  `Plan_Dienststelle_Tag` varchar(45) DEFAULT NULL,
  `Plan_Funktion_Tag` varchar(45) DEFAULT NULL,
  `Plan_Dienststelle_Nacht` varchar(45) DEFAULT NULL,
  `Plan_Funktion_Nacht` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funktion_personal`
--

CREATE TABLE `funktion_personal` (
  `Funktion_Personal_ID` int(11) NOT NULL,
  `Funktion_TH_Brand_Funktion_TH_Brand_ID` int(11) NOT NULL,
  `Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID` int(11) NOT NULL,
  `Maschinist` tinyint(1) DEFAULT '0',
  `Fernmelder` tinyint(1) DEFAULT '0',
  `ANTS` tinyint(1) DEFAULT '0',
  `Langzeitgeräteträger` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funktion_rettungsdienst`
--

CREATE TABLE `funktion_rettungsdienst` (
  `Funktion_Rettungsdienst_ID` int(11) NOT NULL,
  `Funktion_Rettungsdienst` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `funktion_rettungsdienst`
--

INSERT INTO `funktion_rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES
(1, 'Not_San'),
(2, 'Rett_Ass'),
(3, 'RS_2000'),
(4, 'Rett_San'),
(5, 'Rett_Helfer'),
(6, 'ohne');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `funktion_th_brand`
--

CREATE TABLE `funktion_th_brand` (
  `Funktion_TH_Brand_ID` int(11) NOT NULL,
  `Funktions_TH_Brand` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `funktion_th_brand`
--

INSERT INTO `funktion_th_brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES
(1, 'A_Dienst'),
(2, 'B_Dienst'),
(3, 'C_Dienst'),
(4, 'Zfg'),
(5, 'Stf'),
(6, 'Trupp_Fü'),
(7, 'Trupp_Mann');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personal`
--

CREATE TABLE `personal` (
  `Personal_ID` int(11) NOT NULL,
  `Personalnummer` char(8) NOT NULL,
  `Nachname` varchar(45) NOT NULL,
  `Vorname` varchar(45) NOT NULL,
  `Dienstgrad_Dienstgrad_ID` int(11) NOT NULL,
  `Dienststellen_Dienststellen_ID` int(11) NOT NULL,
  `Wachabteilung_Wachabteilung_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `personal`
--

INSERT INTO `personal` (`Personal_ID`, `Personalnummer`, `Nachname`, `Vorname`, `Dienstgrad_Dienstgrad_ID`, `Dienststellen_Dienststellen_ID`, `Wachabteilung_Wachabteilung_ID`) VALUES
(1, '24007146', 'Feesche', 'Marcel', 17, 1, 3),
(2, '24093659', 'Henseleit', 'Sven', 17, 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personaldaten`
--

CREATE TABLE `personaldaten` (
  `Personal_Personal_ID` int(11) NOT NULL,
  `Ort` varchar(45) DEFAULT NULL,
  `PLZ` varchar(6) DEFAULT NULL,
  `Straße` varchar(45) DEFAULT NULL,
  `Hausnummer` varchar(3) DEFAULT NULL,
  `Adress-Zusatz` varchar(45) DEFAULT NULL,
  `Telefon` varchar(20) DEFAULT NULL,
  `Handy` varchar(20) DEFAULT NULL,
  `GebDatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `personaldaten`
--

INSERT INTO `personaldaten` (`Personal_Personal_ID`, `Ort`, `PLZ`, `Straße`, `Hausnummer`, `Adress-Zusatz`, `Telefon`, `Handy`, `GebDatum`) VALUES
(1, 'Birkenwerder', '16547', 'Hohen Neuendorfer Weg', '1', NULL, '0330/3213359', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `profilbilder`
--

CREATE TABLE `profilbilder` (
  `Personal_Personal_ID` int(11) NOT NULL,
  `Image_Data` longblob,
  `Image_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechte`
--

CREATE TABLE `rechte` (
  `Personal_Personal_ID` int(11) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Session` varchar(255) NOT NULL,
  `Berechtigung` tinyint(3) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `rechte`
--

INSERT INTO `rechte` (`Personal_Personal_ID`, `Passwort`, `Session`, `Berechtigung`) VALUES
(1, '678491f6afeccad816ecc0d8f47ef9a3', '', 1),
(2, '7f6ffaa6bb0b408017b62254211691b5', '', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stützpunkte`
--

CREATE TABLE `stützpunkte` (
  `Stützpunkt_ID` int(11) NOT NULL,
  `Direktion_Direktion_ID` int(11) NOT NULL,
  `Stützpunkt_Bezeichnung` varchar(45) NOT NULL,
  `Stützpunkt_Nr` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `stützpunkte`
--

INSERT INTO `stützpunkte` (`Stützpunkt_ID`, `Direktion_Direktion_ID`, `Stützpunkt_Bezeichnung`, `Stützpunkt_Nr`) VALUES
(1, 1, 'FW_1310', 1300),
(2, 1, 'FW_2620', 2620);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stützpunkte_has_dienststellen`
--

CREATE TABLE `stützpunkte_has_dienststellen` (
  `Dienststellen_Dienststellen_ID` int(11) NOT NULL,
  `Stützpunkte_Stützpunkt_ID` int(11) NOT NULL,
  `Rang_Stützpunkt_Dienststelle` tinyint(2) DEFAULT NULL,
  `gültig_ab` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wachabteilung`
--

CREATE TABLE `wachabteilung` (
  `Wachabteilung_ID` int(11) NOT NULL,
  `Abteilung` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `wachabteilung`
--

INSERT INTO `wachabteilung` (`Wachabteilung_ID`, `Abteilung`) VALUES
(1, '1_Tour'),
(2, '2_Tour'),
(3, '3_Tour'),
(4, '4.Tour');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wachzuordnung`
--

CREATE TABLE `wachzuordnung` (
  `Wachzuordnung_ID` int(11) NOT NULL,
  `Dienststellen_Dienststellen_ID` int(11) NOT NULL,
  `gültig_ab` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dienstgrad`
--
ALTER TABLE `dienstgrad`
  ADD PRIMARY KEY (`Dienstgrad_ID`);

--
-- Indizes für die Tabelle `dienststellen`
--
ALTER TABLE `dienststellen`
  ADD PRIMARY KEY (`Dienststellen_ID`),
  ADD KEY `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID`);

--
-- Indizes für die Tabelle `direktion`
--
ALTER TABLE `direktion`
  ADD PRIMARY KEY (`Direktion_ID`);

--
-- Indizes für die Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  ADD PRIMARY KEY (`Fahrzeuge_ID`);

--
-- Indizes für die Tabelle `fahrzeugfunktionen`
--
ALTER TABLE `fahrzeugfunktionen`
  ADD PRIMARY KEY (`Fahrzeugfunktionen_ID`),
  ADD KEY `fk_Fahrzeugfunktionen_Fahrzeuge1_idx` (`Fahrzeuge_Fahrzeuge_ID`);

--
-- Indizes für die Tabelle `fahrzeugzuordnung_dienststelle`
--
ALTER TABLE `fahrzeugzuordnung_dienststelle`
  ADD PRIMARY KEY (`Fahrzeugzuordnung_Dienststelle_ID`),
  ADD KEY `fk_Fahrzeugzuordnung_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID`),
  ADD KEY `fk_Fahrzeugzuordnung_Dienststelle_Fahrzeuge1_idx` (`Fahrzeuge_Fahrzeuge_ID`);

--
-- Indizes für die Tabelle `fahrzeugzuordnung_stützpunkt`
--
ALTER TABLE `fahrzeugzuordnung_stützpunkt`
  ADD PRIMARY KEY (`Fahrzeugzuordnung_Stützpunkte_ID`),
  ADD KEY `fk_Fahrzeugzuordnung_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID`),
  ADD KEY `fk_Fahrzeugzuordnung_Dienststelle_Fahrzeuge1_idx` (`Fahrzeuge_Fahrzeuge_ID`);

--
-- Indizes für die Tabelle `freiwillige_wache`
--
ALTER TABLE `freiwillige_wache`
  ADD PRIMARY KEY (`Freiwillige_Wache_ID`),
  ADD KEY `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID`);

--
-- Indizes für die Tabelle `funktionsbesetzung`
--
ALTER TABLE `funktionsbesetzung`
  ADD PRIMARY KEY (`Funktionsbesetzung_ID`,`Wachabteilung_Wachabteilung_ID`),
  ADD KEY `fk_Funktionsbesetzung_Personal1_idx` (`Personal_Personal_ID`),
  ADD KEY `fk_Funktionsbesetzung_Wachabteilung1_idx` (`Wachabteilung_Wachabteilung_ID`);

--
-- Indizes für die Tabelle `funktion_personal`
--
ALTER TABLE `funktion_personal`
  ADD PRIMARY KEY (`Funktion_Personal_ID`),
  ADD KEY `fk_Funktion_Personal_Personal1_idx` (`Funktion_Personal_ID`),
  ADD KEY `fk_Funktion_Personal_Funktion_TH_Brand1_idx` (`Funktion_TH_Brand_Funktion_TH_Brand_ID`),
  ADD KEY `fk_Funktion_Personal_Funktion_Rettungsdienst1_idx` (`Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID`);

--
-- Indizes für die Tabelle `funktion_rettungsdienst`
--
ALTER TABLE `funktion_rettungsdienst`
  ADD PRIMARY KEY (`Funktion_Rettungsdienst_ID`);

--
-- Indizes für die Tabelle `funktion_th_brand`
--
ALTER TABLE `funktion_th_brand`
  ADD PRIMARY KEY (`Funktion_TH_Brand_ID`);

--
-- Indizes für die Tabelle `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Personal_ID`),
  ADD UNIQUE KEY `Personalnummer_UNIQUE` (`Personalnummer`),
  ADD KEY `fk_Personal_Dienstgrad1_idx` (`Dienstgrad_Dienstgrad_ID`),
  ADD KEY `fk_Personal_dienststellen1_idx` (`Dienststellen_Dienststellen_ID`),
  ADD KEY `fk_Personal_Wachabteilung1_idx` (`Wachabteilung_Wachabteilung_ID`);

--
-- Indizes für die Tabelle `personaldaten`
--
ALTER TABLE `personaldaten`
  ADD PRIMARY KEY (`Personal_Personal_ID`),
  ADD KEY `fk_kontaktdaten_Personal1_idx` (`Personal_Personal_ID`);

--
-- Indizes für die Tabelle `profilbilder`
--
ALTER TABLE `profilbilder`
  ADD PRIMARY KEY (`Personal_Personal_ID`),
  ADD KEY `fk_Profilbilder_Personal1_idx` (`Personal_Personal_ID`);

--
-- Indizes für die Tabelle `rechte`
--
ALTER TABLE `rechte`
  ADD PRIMARY KEY (`Personal_Personal_ID`),
  ADD KEY `fk_Rechte_Personal1_idx` (`Personal_Personal_ID`);

--
-- Indizes für die Tabelle `stützpunkte`
--
ALTER TABLE `stützpunkte`
  ADD PRIMARY KEY (`Stützpunkt_ID`),
  ADD KEY `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID`);

--
-- Indizes für die Tabelle `stützpunkte_has_dienststellen`
--
ALTER TABLE `stützpunkte_has_dienststellen`
  ADD PRIMARY KEY (`Dienststellen_Dienststellen_ID`),
  ADD KEY `fk_Stützpunkte_has_Dienststellen_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID`),
  ADD KEY `fk_Stützpunkte_has_Dienststellen_Stützpunkte2_idx` (`Stützpunkte_Stützpunkt_ID`);

--
-- Indizes für die Tabelle `wachabteilung`
--
ALTER TABLE `wachabteilung`
  ADD PRIMARY KEY (`Wachabteilung_ID`);

--
-- Indizes für die Tabelle `wachzuordnung`
--
ALTER TABLE `wachzuordnung`
  ADD PRIMARY KEY (`Wachzuordnung_ID`),
  ADD KEY `fk_Wachzuordnung_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dienststellen`
--
ALTER TABLE `dienststellen`
  MODIFY `Dienststellen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `direktion`
--
ALTER TABLE `direktion`
  MODIFY `Direktion_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `fahrzeuge`
--
ALTER TABLE `fahrzeuge`
  MODIFY `Fahrzeuge_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT für Tabelle `fahrzeugfunktionen`
--
ALTER TABLE `fahrzeugfunktionen`
  MODIFY `Fahrzeugfunktionen_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT für Tabelle `fahrzeugzuordnung_dienststelle`
--
ALTER TABLE `fahrzeugzuordnung_dienststelle`
  MODIFY `Fahrzeugzuordnung_Dienststelle_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `fahrzeugzuordnung_stützpunkt`
--
ALTER TABLE `fahrzeugzuordnung_stützpunkt`
  MODIFY `Fahrzeugzuordnung_Stützpunkte_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `freiwillige_wache`
--
ALTER TABLE `freiwillige_wache`
  MODIFY `Freiwillige_Wache_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `funktionsbesetzung`
--
ALTER TABLE `funktionsbesetzung`
  MODIFY `Funktionsbesetzung_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `funktion_rettungsdienst`
--
ALTER TABLE `funktion_rettungsdienst`
  MODIFY `Funktion_Rettungsdienst_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `funktion_th_brand`
--
ALTER TABLE `funktion_th_brand`
  MODIFY `Funktion_TH_Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `personal`
--
ALTER TABLE `personal`
  MODIFY `Personal_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `stützpunkte`
--
ALTER TABLE `stützpunkte`
  MODIFY `Stützpunkt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `wachabteilung`
--
ALTER TABLE `wachabteilung`
  MODIFY `Wachabteilung_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `wachzuordnung`
--
ALTER TABLE `wachzuordnung`
  MODIFY `Wachzuordnung_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `dienststellen`
--
ALTER TABLE `dienststellen`
  ADD CONSTRAINT `fk_dienststellen_direktion` FOREIGN KEY (`Direktion_Direktion_ID`) REFERENCES `direktion` (`Direktion_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `fahrzeugfunktionen`
--
ALTER TABLE `fahrzeugfunktionen`
  ADD CONSTRAINT `fk_Fahrzeugfunktionen_Fahrzeuge1` FOREIGN KEY (`Fahrzeuge_Fahrzeuge_ID`) REFERENCES `fahrzeuge` (`Fahrzeuge_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `fahrzeugzuordnung_dienststelle`
--
ALTER TABLE `fahrzeugzuordnung_dienststelle`
  ADD CONSTRAINT `fk_Fahrzeugzuordnung_Dienststelle_Fahrzeuge1` FOREIGN KEY (`Fahrzeuge_Fahrzeuge_ID`) REFERENCES `fahrzeuge` (`Fahrzeuge_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Fahrzeugzuordnung_Dienststellen1` FOREIGN KEY (`Dienststellen_Dienststellen_ID`) REFERENCES `dienststellen` (`Dienststellen_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `fahrzeugzuordnung_stützpunkt`
--
ALTER TABLE `fahrzeugzuordnung_stützpunkt`
  ADD CONSTRAINT `fk_Fahrzeugzuordnung_Dienststelle_Fahrzeuge10` FOREIGN KEY (`Fahrzeuge_Fahrzeuge_ID`) REFERENCES `fahrzeuge` (`Fahrzeuge_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Fahrzeugzuordnung_Dienststellen10` FOREIGN KEY (`Dienststellen_Dienststellen_ID`) REFERENCES `dienststellen` (`Dienststellen_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `freiwillige_wache`
--
ALTER TABLE `freiwillige_wache`
  ADD CONSTRAINT `fk_dienststellen_direktion1` FOREIGN KEY (`Direktion_Direktion_ID`) REFERENCES `direktion` (`Direktion_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `funktionsbesetzung`
--
ALTER TABLE `funktionsbesetzung`
  ADD CONSTRAINT `fk_Funktionsbesetzung_Personal1` FOREIGN KEY (`Personal_Personal_ID`) REFERENCES `personal` (`Personal_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Funktionsbesetzung_Wachabteilung1` FOREIGN KEY (`Wachabteilung_Wachabteilung_ID`) REFERENCES `wachabteilung` (`Wachabteilung_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `funktion_personal`
--
ALTER TABLE `funktion_personal`
  ADD CONSTRAINT `fk_Funktion_Personal_Funktion_Rettungsdienst1` FOREIGN KEY (`Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID`) REFERENCES `funktion_rettungsdienst` (`Funktion_Rettungsdienst_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Funktion_Personal_Funktion_TH_Brand1` FOREIGN KEY (`Funktion_TH_Brand_Funktion_TH_Brand_ID`) REFERENCES `funktion_th_brand` (`Funktion_TH_Brand_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Funktion_Personal_Personal1` FOREIGN KEY (`Funktion_Personal_ID`) REFERENCES `personal` (`Personal_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_Personal_Dienstgrad1` FOREIGN KEY (`Dienstgrad_Dienstgrad_ID`) REFERENCES `dienstgrad` (`Dienstgrad_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personal_Wachabteilung1` FOREIGN KEY (`Wachabteilung_Wachabteilung_ID`) REFERENCES `wachabteilung` (`Wachabteilung_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Personal_dienststellen1` FOREIGN KEY (`Dienststellen_Dienststellen_ID`) REFERENCES `dienststellen` (`Dienststellen_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `personaldaten`
--
ALTER TABLE `personaldaten`
  ADD CONSTRAINT `fk_kontaktdaten_Personal1` FOREIGN KEY (`Personal_Personal_ID`) REFERENCES `personal` (`Personal_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `profilbilder`
--
ALTER TABLE `profilbilder`
  ADD CONSTRAINT `fk_Profilbilder_Personal1` FOREIGN KEY (`Personal_Personal_ID`) REFERENCES `personal` (`Personal_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `rechte`
--
ALTER TABLE `rechte`
  ADD CONSTRAINT `fk_Rechte_Personal1` FOREIGN KEY (`Personal_Personal_ID`) REFERENCES `personal` (`Personal_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `stützpunkte`
--
ALTER TABLE `stützpunkte`
  ADD CONSTRAINT `fk_dienststellen_direktion0` FOREIGN KEY (`Direktion_Direktion_ID`) REFERENCES `direktion` (`Direktion_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `stützpunkte_has_dienststellen`
--
ALTER TABLE `stützpunkte_has_dienststellen`
  ADD CONSTRAINT `fk_Stützpunkte_has_Dienststellen_Dienststellen1` FOREIGN KEY (`Dienststellen_Dienststellen_ID`) REFERENCES `dienststellen` (`Dienststellen_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Stützpunkte_has_Dienststellen_Stützpunkte2` FOREIGN KEY (`Stützpunkte_Stützpunkt_ID`) REFERENCES `stützpunkte` (`Stützpunkt_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `wachzuordnung`
--
ALTER TABLE `wachzuordnung`
  ADD CONSTRAINT `fk_Wachzuordnung_Dienststellen1` FOREIGN KEY (`Dienststellen_Dienststellen_ID`) REFERENCES `dienststellen` (`Dienststellen_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
