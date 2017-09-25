IF  NOT EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name = N'Wachbesetzung')
CREATE DATABASE [Wachbesetzung]
USE Wachbesetzung;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Dienstgrad"
-- Auflistung aller  Dienstgrade der Berliner Feuerwehr
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Dienstgrad] (Dienstgrad_ID int PRIMARY KEY,
                    Dienstgrad varchar(10));

-- Daten für Tabelle "Dienstgrad"
SET IDENTITY_INSERT [dbo].[Dienstgrad] ON;

INSERT INTO [dbo].[Dienstgrad] (Dienstgrad_ID, Dienstgrad) VALUES
(1, 'LBD'),(2, 'LBDv'),(3, 'BD*'),(4, 'BD'),(5, 'BOR'),(6, 'BR'),(7, 'BRef'),(8, 'BOAR'),(9, 'BAR'),(10, 'BA'),
(11, 'BOI'),(12, 'BI'),(13, 'BOI_Anw'),(14, 'HBMz'),(15, 'HBM*'),(16, 'HBM'),(17, 'OBM'),(18, 'BM'),(19, 'BM_Anw'),(20, 'BM_zA');

SET IDENTITY_INSERT [dbo].[Dienstgrad] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Direktion"
-- Auflistung der Direktionen
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Direktion](Direktions_ID int PRIMARY KEY,
                    DirektionName varchar(6)); 

-- Daten für Tabelle "Direktion"

SET IDENTITY_INSERT [dbo].[Direktion] ON ;

INSERT INTO [dbo].[Direktion] (Direktions_ID, DirektionName) VALUES
(1, 'Nord'),(2, 'Süd'),(3, 'West');

SET IDENTITY_INSERT [dbo].[Direktion] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Dienststellen"
-- alle Dienststellen BF und FF ohne Stützpunkte
-- Fremdkey gerichtet auf Tabelle Direktion, FwZuordnung

CREATE TABLE [dbo].[Dienststellen](Dienststellen_ID int PRIMARY KEY,
                    Dienststellenname varchar(25),
                    Dienststellenkennung varchar(10),
                    Direktions_ID int,
                    FwZuordnung_ID int,
                    CONSTRAINT Direktions_Fk FOREIGN KEY (Direktions_ID) REFERENCES Direktion(Direktions_ID)ON DELETE CASCADE,
					CONSTRAINT FwZuordnung_Fk FOREIGN KEY (FwZuordnung_ID) REFERENCES FwZuordnung(FwZuordnung_ID)ON DELETE CASCADE);
 
-- on delete keine Verändernung in Direktion , FwZuordnung zulassen nur mit Script durch Admin

SET IDENTITY_INSERT [dbo].[Dienststellen] ON;

INSERT INTO [dbo].[Dienststellen](Dienststellen_ID, Dienststellenname, Direktions_ID, FwZuordnung_ID) VALUES
(1, 'BF Prenzlauer Berg', 1300, 1, 1),(2, 'BF Wittenau', 2200, 1, 1),(3, 'BF Hermsdorf', 2300, 1, 1),(4, 'BF Tegel', 2400, 1, 1),(5, 'BF Pankow', 2600, 1, 1),
(6, 'BF Marzahn', 6100, 1, 1),(7, 'BF Hellersdorf', 6200, 1, 1),(8, 'BF Weißensee', 6300, 1, 1),(9, 'BF Lichtenberg', 6400, 1, 1),(10, 'BF Karlshorst', 6500, 1, 1),
(11, 'BF Rettungsdienst', 6600, 1, 1),(12, 'BF Mitte',1100, 3, 1),(13, 'BF Moabit',1400, 3, 1),(14, 'BF Tiergarten', 1700, 3, 1),(15, 'BF Schillerpark',2100, 3, 1),
(16, 'BF Wedding',2500, 3, 1),(17, 'BF Spandau-Nord', 3100, 3, 1),(18, 'BF Spandau-Süd',3200, 3, 1),(19, 'BF Suarez',3300, 3, 1),(20,'BF Wilmersdorf',3400, 3, 1),
(21,'BF Ranke',3500, 2, 1),(22,'BF Charlottenburg-Nord',3600, 2, 1),(23,'BF Haselhorst',3690, 2, 1),(24,'BF Grunewald',3700, 2, 1),(25,'BF Zehlendorf',4100, 2, 1),
(26,'BF Steglitz',4200, 2, 1),(27,'BF Wannsee',4500, 2, 1),(28,'BF Lichterfelde',4600, 2, 1),(29,'BF Friedrichshain',1200, 2, 1),(30,'BF Urban',1500, 2, 1),
(31,'BF Kreuzberg',1600, 2, 1),(32,'BF Tempelhof',4300, 2, 1),(33,'BF Schöneberg',4400, 2, 1),(34,'BF Marienfelde',4700, 2, 1),(35,'BF Neukölln',5100, 2, 1),
(36,'BF Buckow',5200, 2, 1),(37,'BF Treptow',5300, 2, 1),(38,'BF Köpenick',5400, 2, 1),(39,'FD',3649, 3, 4),(40,'TD-1',3639, 3, 3),(41,'TD-2',6139, 1, 3),

(42, 'FF Prenzlauer Berg', 1310, 1, 8),(43, 'FF Wittenau', 2201, 1, 8),(44, 'FF Hermsdorf', 2301, 1, 8),(45, 'FF Lübars', 2310, 1, 8),(46, 'FF Frohnau', 2320, 1, 8),
(47, 'FF Tegel', 2401, 1, 8),(48, 'FF Heiligensee', 2410, 1, 8),(49, 'FF Tegelort', 2420, 1, 8),(50, 'FF Niederschönhausen', 2610, 1, 8),(51, 'FF Buchholz', 2620, 1, 8),
(52, 'FF Blankenfelde',2630, 1, 8),(53, 'FF Wilhelmsruh',2640, 1, 8),(54, 'FF Pankow',2650, 1, 8),(55, 'FF Buch',2710, 1, 8),(56, 'FF Karow',2720, 1, 8),(57, 'FF Marzahn',6110, 1, 8),
(58, 'FF Biesdorf',6120, 1, 8),(59, 'FF Kaulsdorf',6210, 1, 8),(60, 'FF Mahlsdorf',6220, 1, 8),(61, 'FF Hellersdorf',6230, 1, 8),(62, 'FF Weißensee',6301, 1, 8),(63, 'FF Hohenschönhausen',6310, 1, 8),
(64, 'FF Falkenberg',6320, 1, 8),(65, 'FF Wartenberg',6330, 1, 8),(66, 'FF Blankenburg',6360, 1, 8),(67, 'FF Heinersdorf',6370, 1, 8),(68, 'FF Lichtenberg',6401, 1, 8),(69, 'FF Karlshorst',6501, 1, 8),

(70, 'FF Mitte',1110, 3, 8),(71, 'FF Moabit',1401, 3, 8),(72, 'FF Wedding',2501, 3, 8),(73, 'FF Spandau-Nord',3101, 3, 8),(74, 'FF Staaken',3110, 3, 8),(75, 'FF Gatow',3210, 3, 8),(76, 'FF Kladow',3220, 3, 8),
(77, 'FF Suarez',3301, 3, 8),(78, 'FF Zehlendorf',4101, 3, 8),(79, 'FF Lichterfelde',4601, 3, 8),(80, 'FF Friedrichshain',1201, 2, 8),(81, 'FF Urban',1501, 2, 8),(82, 'FF Schöneberg',4401, 2, 8),
(83, 'FF Marienfelde',4701, 2, 8),(84, 'FF Lichtenrade',4710, 2, 8),(85, 'FF Neukölln',5101, 2, 8),(86, 'FF Rudow',5210, 2, 8),(87, 'FF Treptow',5301, 2, 8),(88, 'FF Adlershof',5310, 2, 8),
(89, 'FF Bohnsdorf',5320, 2, 8),(90, 'FF Altglienicke',5330, 2, 8),(91, 'FF Oberschöneweide',5340, 2, 8),(92, 'FF Köpenick',5401, 2, 8),(93, 'FF Friedrichshagen',5410, 2, 8),(94, 'FF Wilhelmshagen',5430, 2, 8),
(95, 'FF Müggelheim',5440, 2, 8),(96, 'FF Schmöckwitz',5450, 2, 8),(97, 'FF Rauchfangswerder',5460, 2, 8),(98, 'FF Grünau',5470, 2, 8);

SET IDENTITY_INSERT [dbo].[Dienststellen] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Stützpunkte"
-- Auflistung aller Stützpunkte auch in Krankenhäusern
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Stuetzpunkte](Stuetzpunkte_ID int PRIMARY KEY,
                    Dienststellenname varchar(40),
                    Dienststellenkennung varchar(10));
                    -- Dienststellen_ID int;

SET IDENTITY_INSERT [dbo].[Stuetzpunkte] ON;

INSERT INTO [dbo].[Stuetzpunkte](Stuetzpunkte_ID, Dienststellenname, Dienststellenkennung) VALUES
(1, 'RD-SP Buchholz', 2620),(2, 'RD-SP Prenzlauer Berg', 1310),(3, 'RD-SP Mitte', 1110),(4, 'RD-SP Staaken', 3110),(5, 'RD-SP Kladow', 3220),(6, 'RD-SP KH Westend', 3304),
(7, 'RD-SP Elisabeth KRH', 3504),(8, 'RD-SP Spandau Wald KH', 3104),(9, 'RD-SP Klinikum Spandau', 3100),(10, 'RD-SP Martin-Luther KH', 3404),(11, 'RD-SP Haselhorst', 3690),
(12, 'RD-SP KH St.Marien', 4604),(13, 'RD-SP KH Friedrichshain', 1204),(14, 'RD-SP Lichtenrade', 4710),(15, 'RD-SP ', 1310),(16, 'RD-SP Rudow', 5210),(17, 'RD-SP KH Hedwigshöhe', 5304),
(18, 'RD-SP Altglienicke', 5330),(19, 'RD-SP Friedrichshagen', 5410),(20, 'RD-SP Bucholz', 2620),(21, 'RD-SP Blankenfelde', 2630),(22, 'RD-SP Frohnau', 2320),(23, 'RD-SP Tegelort', 2420),
(24, 'RD-SP Marzahn', 6110),(25, 'RD-SP Biesdorf', 6120),(26, 'RD-SP KH Maria Heimsuchung', 2604),(27, 'RD-SP Falkenberg', 6320),(28, 'RD-SP KH Kaulsdorf', 6204),(29, 'RD-SP KH Buch', 2704),
(30, 'RD-SP Wartenberg/Malchow', 6330),(31, 'RD-SP Hohenschönhausen', 6310);

SET IDENTITY_INSERT [dbo].[Stuetzpunkte] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Stützpunkte_has_Dienststellen"
-- Welcher Stützpunkt ist der Hauptwache zugeordnet und ab wann bzw bis wann (Wachtagebuch einsicht rückwirkend)
--!!!!!!!!!!!!!!!! Datum für Auswertung ab/bis !!!!!!!!!!!!

CREATE TABLE [dbo].[Stützpunkte_has_Dienststellen](Dienststelle_has_ID int PRIMARY KEY,
                                                    Dienststellen_ID int,
                                                    Stuetzpunkt_ID int,
                                                    Stuetzpunkt_Rang int,
													Gültig_ab Date,
					                                Gültig_bis Date,
                                                    
                                                    CONSTRAINT Dienststellen_Fk FOREIGN KEY (Dienststellen_ID) REFERENCES Dienststellen(Dienststellen_ID)ON DELETE CASCADE,
                                                    CONSTRAINT StuePun_Fk FOREIGN KEY (Stuetzpunkt_ID) REFERENCES Dienstgrad(Dienstgrad_ID)ON DELETE CASCADE,
                                                    CONSTRAINT StuePunRang_Fk FOREIGN KEY (Stuetzpunkt_ID) REFERENCES Dienstgrad(Dienstgrad_ID)ON DELETE CASCADE);
SET IDENTITY_INSERT [dbo].[Stützpunkte_has_Dienststellen] ON;

INSERT INTO [dbo].[Stützpunkte_has_Dienststellen](Dienststelle_has_ID, Dienststellen_ID, Stuetzpunkt_ID , Stuetzpunkt_Rang , Gültig_ab , Gültig_bis) VALUES
(1,1,2,1,2011-01-01,'NULL');

SET IDENTITY_INSERT [dbo].[Stützpunkte_has_Dienststellen] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Wachabteilung"
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Wachabteilung](Wachabteilung_ID int PRIMARY KEY,
                                   Abteilung varchar(10)) ;

-- Daten für Tabelle "Wachabteilung"
SET IDENTITY_INSERT [dbo].[Wachabteilung] ON ;

INSERT INTO [dbo].[Wachabteilung](Wachabteilung_ID, Abteilung) VALUES
(1, '1_Tour'),(2, '2_Tour'),(3, '3_Tour'),(4, '4_Tour');

SET IDENTITY_INSERT [dbo].[Wachabteilung] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Führungsfunktion"
--Auflistung aller Führungsfunktionen
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Führungsfunktion](Führungsfunktion_ID int PRIMARY KEY,
                                      Führungsfunktion varchar(20)) ;

-- Daten für Tabelle "Führungsfunktion"
SET IDENTITY_INSERT [dbo].[Führungsfunktion] ON ;
INSERT INTO [dbo].[Führungsfunktion](Führungsfunktion_ID, Führungsfunktion) VALUES
(1, 'A-Dienst'),(2, 'B-Dienst'),(3, 'C-Dienst'),(4, 'C-Dienst ÄLRD'),(5, 'Zgf'),(6, 'Stf*'),(7, 'Stf'),(8, 'Fzf'),(9, 'Tr_Fü'),(10, 'Tr_Ma');

SET IDENTITY_INSERT [dbo].[Führungsfunktion] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Funktion_Rettungsdienst"
--Auflistung aller Rettungsdienstfunktionen
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Funktion_Rettungsdienst](Funktion_Rettungsdienst_ID int PRIMARY KEY,
                                             Funktion_Rettungsdienst varchar(15)) ;

-- Daten für Tabelle "Funktion_Rettungsdienst"

SET IDENTITY_INSERT [dbo].[Funktion_Rettungsdienst] ON ;
INSERT INTO [dbo].[Funktion_Rettungsdienst] (Funktion_Rettungsdienst_ID, Funktion_Rettungsdienst) VALUES
(1, 'Notarzt'),(2, 'Not_San'),(3, 'Rett_Ass'),(4, 'RS_2000'),(5, 'Rett_San'),(6, 'Rett_Helfer'),(7, 'ohne');

SET IDENTITY_INSERT [dbo].[Funktion_Rettungsdienst] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Fahrzeuge"
-- Auflistung aller Fahrzeuge die bei der FW existieren
-- letzte Ebene der Normalisierung


CREATE TABLE [dbo].[Fahrzeuge](Fahrzeuge_ID int PRIMARY KEY,
                    Fahrzeuge_Art varchar(12) NOT NULL,
                    Fahrzeug_Bezeichnung varchar(12) NOT NULL);

-- Daten für Tabelle "Fahrzeuge"

SET IDENTITY_INSERT [dbo].[Fahrzeuge] ON ;

INSERT INTO [dbo].[Fahrzeuge](Fahrzeuge_ID, Fahrzeuge_Art, Fahrzeug_Bezeichnung) VALUES
(1, 'LHF', 'LHF-1'),(2, 'LHF', 'LHF-2'),(3, 'TLF', 'TLF-24/40'),(4, 'TLF', 'TLF-24/50'),(5, 'LF-16-TS', 'LF-16-TS'),(6, 'LF-Z', 'LF-Z'),(7, 'DL(K)', 'DL(K)'),
(8, 'Klef', 'Klef'),(9, 'ELW', 'ELW-A'),(10, 'ELW', 'ELW-B'),(11, 'ELW', 'ELW-C'),(12, 'ELW', 'ELW-C ÄLRD'),(13, 'ELW-3', 'ELW-3'),(14, 'FmeW', 'FmeW'),
(15, 'LKW', 'LKW'),(16, 'LKW', 'LKW Ladebord'),(17, 'LKW', 'LKW Öl'),(18, 'SW', 'SW'),(19, 'RTB', 'RettBoot'),
(20, 'AB', 'AB Schlauch'),(21, 'AB', 'AB Gefahrgut'),(22, 'AB', 'AB Atemschutz'),(23, 'AB', 'AB *?*'),(24, 'AB', 'AB Sand'),
(25, 'RW', 'RW-3'),(26, 'MTF', 'MTF-1'),(27, 'MTF', 'MTF-3'),(28, 'GW', 'GW Mess'),(29, 'GW Wasser', 'GW Wasser'),(30, 'WLF', 'WLF Gr.1'),(31, 'WLF', 'WLF Gr.2'),
(32, 'FWK', 'FWK-30'),(33, 'TM', 'TM-50'),(34, 'ABC Erkunder', 'ABC Erkunder'),(35, 'Dekon P', 'Dekon P'),(36, 'Dekon G', 'Dekon G'),
(37, 'GW', 'GW ManV'),(38, 'AB', 'AB ManV'),(39, 'GW', 'GW San'),(40, 'STEMO', 'STEMO'),(41, 'RTW', 'RTW_1'),(42, 'RTW', 'RTW_2'),(43, 'RTW', 'RTW_3'),
(44, 'RTW', 'RTW_4'),(45, 'RTW', 'RTW_5'),(46, 'RTW', 'RTW_6'),(47, 'RTW', 'RTW_7'),(48, 'RTW', 'RTW_8'),(49, 'RTW', 'RTW_9'),(50, 'RTW', 'RTW_10'),
(51, 'RTW', 'RTW-S(BTW)'),(52, 'RTW', 'RTW-I(Intensiv)'),(53, 'RTW', 'RTW_ASB'),(54, 'RTW', 'RTW_DRK'),(55, 'RTW', 'RTW_JUH'),(56, 'RTW', 'RTW_MHD'),
(57, 'RTW', 'RTW_BW'),(58, 'NEF', 'NEF'),(59, 'Fmel', 'Fernmelder'); 

SET IDENTITY_INSERT [dbo].[Fahrzeuge] OFF;
----------------------------------------------------------------------------------------------------------------------

-- Tabellenstruktur für Tabelle "Zuordnung"
-- mit IT (DME) abgeglichene Kennung (Bsp.: 13 1 71 1) = FW + ZuOrdnung + TruppKennung + Truppfunktion (1-9)  
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[FwZuordnung](FwZuordnung_ID int PRIMARY KEY,
                    BezeichnungZuordnung varchar(50));

SET IDENTITY_INSERT [dbo].[FwZuordnung] ON;

INSERT INTO [dbo].[FwZuordnung](FwZuordnung_ID, BezeichnungZuordnung) VALUES
(1,'BF'),(2,'BW'),(3,'TD'),(4,'FD'),(5,'BFRA(LRW Fahrzeuge)'),
(6,'BF/LRW auf StüP'),(7,'HioS'),(8,'FF'),(9,'Sonderfunktion');

SET IDENTITY_INSERT [dbo].[FwZuordnung] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle ">Fahrzeugfunktionen"
-- Auflistung aller Truppfunktionen die bei der FW existieren


--!!!!!! noch überarbeiten IDs noch nicht einmalig Trupps Doppelt Lösung finden !!!!!!!!!!!!
CREATE TABLE [dbo].[Fahrzeugfunktionen](Fahrzeugfunktionen_ID int PRIMARY KEY,
                    Fahrzeuge_ID int NOT NULL,
                    Funktions_Kennung int NOT NULL,
                    Funktions_Bezeichnung varchar(40),
                    Grund_Qualifizierung int NULL,

                    CONSTRAINT Fahrzeuge_Fk FOREIGN KEY (Fahrzeuge_ID) REFERENCES Fahrzeuge(Fahrzeuge_ID)ON DELETE CASCADE);

-- Daten für Tabelle "Fahrzeugfunktionen"

SET IDENTITY_INSERT [dbo].[Fahrzeugfunktionen] ON ;

INSERT INTO [dbo].[Fahrzeugfunktionen](Fahrzeugfunktionen_ID, Fahrzeuge_ID, Funktions_Kennung, Funktions_Bezeichnung, Grund_Qualifizierung) VALUES
(1, 41, '711', 'RDV_RTW_1', 'NULL'),(2, 41, '712', 'MA_RTW_1', 'NULL'),(3, 41, '713', 'Prakt_RTW_1', 'NULL'),
(4, 42, '721', 'RDV_RTW_2', 'NULL'),(5, 42, '722', 'MA_RTW_2', 'NULL'),(6, 42, '723', 'Prakt_RTW_2', 'NULL'),
(7, 43, '731', 'RDV_RTW_3', 'NULL'),(8, 43, '732', 'MA_RTW_3', 'NULL'),(9, 43, '733', 'Prakt_RTW_3', 'NULL'),
(10, 44, '741', 'RDV_RTW_4', 'NULL'),(11, 44, '742', 'MA_RTW_4', 'NULL'),(12, 44, '743', 'Prakt_RTW_4', 'NULL'),
(13, 45, '751', 'RDV_RTW_5', 'NULL'),(14, 45, '752', 'MA_RTW_5', 'NULL'),(15, 45, '753', 'Prakt_RTW_5', 'NULL'),
(16, 46, '761', 'RDV_RTW_6', 'NULL'),(17, 46, '762', 'MA_RTW_6', 'NULL'),(18, 46, '763', 'Prakt_RTW_6', 'NULL'),

(19, 47, '771', 'RDV_RTW_I', 'NULL'),(20, 47, '772', 'MA_RTW_I', 'NULL'),(21, 47, '773', 'Prakt_RTW_I', 'NULL'),

(22, 58, '781', 'Notarzt', 'NULL'),(23, 58, '782', 'MA_NEF', 'NULL'),(24, 58, '783', 'Prakt_NEF', 'NULL'),

(25, 48, '791', 'RDV_RTW_S', 'NULL'),(26, 48, '792', 'MA_RTW_S', 'NULL'),(27, 48, '793', 'Prakt_RTW_S', 'NULL'),

(28, 1, '371', 'Fzf_Lhf_1', 'NULL'),(29, 1, '372', 'Fzf_Lhf_1_Pra', 'NULL'),(30, 1, '521', 'MA_Lhf_1', 'NULL'),(31, 1, '522', 'ATr_Fü_Lhf_1', 'NULL'),
(32, 1, '523', 'ATr_Ma_Lhf_1', 'NULL'),(33, 1, '524', 'ATr_Pra_Lhf_1', 'NULL'),(34,1, '551', 'WTr_Fü_Lhf_1', 'NULL'),(35, 1, '552', 'WTr_Ma_Lhf_1', 'NULL'),
(36, 1, '553', 'WTr_Pra_Lhf_1', 'NULL'),

(37, 2, '381', 'Fzf_Lhf_2', 'NULL'),(38, 2, '382', 'Fzf_Lhf_2_Pra', 'NULL'),(39, 2, '531', 'MA_Lhf_2', 'NULL'),(40, 2, '532', 'ATr_Fü_Lhf_2', 'NULL'),
(41, 2, '533', 'ATr_Ma_Lhf_2', 'NULL'),(42, 2, '534', 'ATr_Pra_Lhf_2', 'NULL'),(43,1, '541', 'WTr_Fü_Lhf_1', 'NULL'),(44, 1, '542', 'WTr_Ma_Lhf_1', 'NULL'),
(45, 1, '543', 'WTr_Pra_Lhf_1', 'NULL'),

(46, 7, '511', 'DLK_Fü', 'NULL'),(47, 7, '512', 'DLK_Ma', 'NULL'),
(48, 8, '841', 'Klef_Fü', 'NULL'),(49, 8, '842', 'Klef_Ma', 'NULL'),

(50, 9, '111', 'ELW-LBD', 'NULL'),(51, 9, '112', 'ELW-LBD_Ma', 'NULL'),
(52, 9, '121', 'ELW-A_1_Fü', 'NULL'),(53, 9, '122', 'ELW-A_1_Ma', 'NULL'),
(54, 9, '131', 'ELW-A_2_Fü', 'NULL'),(55, 9, '132', 'ELW-A_2_Ma', 'NULL'),

(56, 10, '141', 'ELW-B_Fü', 'NULL'),(57, 10, '142', 'ELW-B_Ma', 'NULL'),
(58, 10, '151', 'ELW-B_Fü', 'NULL'),(59, 10, '152', 'ELW-B_Ma', 'NULL'),
(60, 10, '161', 'ELW-B_Fü', 'NULL'),(61, 10, '162', 'ELW-B_Ma', 'NULL'),

(62, 11, '311', 'ELW-C_Fü', 'NULL'),(63, 11, '312', 'ELW-C_Ma', 'NULL'),
(64, 12, '321', 'ELW-C ÄLRD_Fü', 'NULL'),(65, 12, '322', 'ELW-C ÄLRD_Ma', 'NULL'),

--FD
(66, 11, '591', 'ELW-1-Doku_Fü', 'NULL'), --!!!!!!!!!!!!! ab hier überarbeiten !!!!!!!!!!!!!!!!!!!!!
(66, 13, '961', 'ELW-3-FL', 'NULL'),
(66, 13, '962', 'ELW-3_Ma', 'NULL'),(67, 13, '963', 'ELW-3', 'NULL'),
(61, 14, '', 'FmeW', 'NULL'),(61, 14, '', 'FmeW', 'NULL'),
--TD
(61, 14, '991', 'Zfg_TD', 'NULL'),
(61, 14, '981', 'GW_Mess_Fü', 'NULL'),(61, 14, '982', 'GW_Mess_Ma', 'NULL'),
(66, 13, '581', 'GW_Wasser_Fü', 'NULL'),(66, 13, '582', 'GW_Wasser_Ma', 'NULL'),
--LKW
(61, 14, '571', 'LKW_AB/LB_Fü', 'NULL'),(61, 14, '572', 'LKW_AB/LB_Ma', 'NULL'),(61, 14, '573', 'LKW_AB/LB', 'NULL'),
(61,'' , '811', 'LKW_1_Ma', 'NULL'),(61,'' , '821', 'LKW_2_Ma', 'NULL'),(61,'' , '831', 'LKW_3_Ma', 'NULL'),
(61,'' , '', '', 'NULL'),(61,'' , '', '', 'NULL'),(61,'' , '', '', 'NULL'),
--ABC
(61,'' , '341', 'ABC_Erkunder', 'NULL'),(61,'' , '342', 'ABC_Erkunder', 'NULL'),
--Klef
(66, 13, '581', 'Klef', 'NULL'),(66, 13, '582', 'Klef', 'NULL'),
--GW
(66, 13, '581', 'GW_San_Fü', 'NULL'),(66, 13, '582', 'Klef', 'NULL'),

(62, 19, '561', 'RTB', 'NULL'),(63, 19, '562', 'RTB', 'NULL'),
(64, 59, '881', 'FernMel', 'NULL'),(65, 59, '882', 'FernMel', 'NULL'),(66, 59, '883', 'FernMel', 'NULL'),
(67, 0, '841', 'LKW', 'NULL'); -- Gruppieren aller LKW ?;

SET IDENTITY_INSERT [dbo].[Fahrzeugfunktionen] OFF;

----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Fahrzeugzuordnung_Dienststelle"
-- Welche Fahrzeuge stehen auf der Hauptwache

--!!!!!! noch überarbeiten Daten nicht vollzählig + Lösung finden !!!!!!!!!!!!
--bei Änderung der Reihenfolge DB Eintrag ändern
--bei Fahrzeug neu Zuordnung neuer Eintrag mit Datum ab wann diese gilt
--keine Einträge löschen 

CREATE TABLE [dbo].[Fahrzeugzuordnung_Dienststelle](Dienststellenzuordnung_ID int PRIMARY KEY,
                    Dienststellen_ID int NOT NULL,
                    Fahrzeug_ID int NOT NULL,
                    Dienststellenposition int NOT NULL,
                    Gültig_ab Date NOT NULL,
					Gültig_bis Date NOT NULL,

                    CONSTRAINT Fahrzeuge_Fk FOREIGN KEY (Fahrzeug_ID) REFERENCES Fahrzeuge(Fahrzeuge_ID)ON DELETE CASCADE,
                    CONSTRAINT Dienststellen_Fk FOREIGN KEY (Dienststellen_ID) REFERENCES Dienststellen(Dienststellen_ID)ON DELETE CASCADE) ;

SET IDENTITY_INSERT [dbo].[Fahrzeugzuordnung_Dienststelle] ON;

INSERT INTO [dbo].[Fahrzeugzuordnung_Dienststelle](Dienststellenzuordnung_ID, Dienststellen_ID, Fahrzeug_ID, Dienststellenposition, Gültig_ab, Gültig_bis) VALUES
(1,1,1,1,2011-01-01,2011-01-01),(2,1,3,2,2011-01-01,2011-01-01),(3,1,2,3,2011-01-01,2011-01-01),(4,1,4,4,2011-01-01,2011-01-01);

SET IDENTITY_INSERT [dbo].[Fahrzeugzuordnung_Dienststelle] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Fahrzeugzuordnung_Stützpunkt"
-- Welche Fahrzeuge stehen auf den Stützpunkten

--!!!!!! noch überarbeiten Daten nicht vollzählig + Lösung finden !!!!!!!!!!!!
--bei Änderung der Reihenfolge DB Eintrag ändern
--bei Fahrzeug neu Zuordnung neuer Eintrag mit Datum ab wann diese gilt
--keine Einträge löschen 

CREATE TABLE [dbo].[Fahrzeugzuordnung_Stützpunkt](Stuetzpunktzuordnung_ID int PRIMARY KEY,
                    Stuetzpunkt_ID int NOT NULL,
                    Fahrzeug_ID int,
                    Dienststellenposition int,
                    Gültig_ab Date,
					Gültig_bis Date,

                    CONSTRAINT Stuetzpunkt_Fk FOREIGN KEY (Stuetzpunkt_ID) REFERENCES Stuetzpunkte(Stuetzpunkte_ID)ON DELETE CASCADE,
                    CONSTRAINT Fahrzeuge_Fk FOREIGN KEY (Fahrzeug_ID) REFERENCES Fahrzeuge(Fahrzeuge_ID)ON DELETE CASCADE);

SET IDENTITY_INSERT [dbo].[Fahrzeugzuordnung_Stützpunkt] ON;

INSERT INTO [dbo].[Fahrzeugzuordnung_Stützpunkt](Stuetzpunktzuordnung_ID, Stuetzpunkt_ID, Fahrzeug_ID, Dienststellenposition, Gültig_ab, Gültig_bis) VALUES
(1,1,4,1,2011-01-01,2011-01-01),(2,1,5,2,2011-01-01,2011-01-01);

SET IDENTITY_INSERT [dbo].[Fahrzeugzuordnung_Stützpunkt] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Wachzuordnung"
CREATE TABLE [dbo].[Wachzuordnung](Wachzuordnung_ID int PRIMARY KEY) ;

-- Daten für Tabelle "Wachzuordnung"
SET IDENTITY_INSERT [dbo].[Wachzuordnung] ON ;

--INSERT INTO [dbo].[Wachzuordnung](Wachzuordnung_ID) VALUES


SET IDENTITY_INSERT [dbo].[Wachzuordnung] OFF;

----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Personal"
-- Wünschenswert Zugriff auf die PLASMA Datenbank

CREATE TABLE [dbo].[Personal](Personal_ID int PRIMARY KEY,
            PersonalNr int,
            Nachname varchar(50),
            Vorname varchar(50),
            Dienstgrad_ID int,
            Dienststellen_ID int,
            Wachabteilung_ID int,
            FwZuordnung_ID int,
            CONSTRAINT DG_Fk FOREIGN KEY (Dienstgrad_ID) REFERENCES Dienstgrad(Dienstgrad_ID)ON DELETE CASCADE,
            CONSTRAINT Dienststellen_Fk FOREIGN KEY (Dienststellen_ID)  REFERENCES Dienststellen(Dienststellen_ID)ON DELETE CASCADE,
            CONSTRAINT Wachabteilung_Fk FOREIGN KEY (Wachabteilung_ID)  REFERENCES Wachabteilung(Wachabteilung_ID)ON DELETE CASCADE,
            CONSTRAINT FwZuordnung_Fk FOREIGN KEY (FwZuordnung_ID)  REFERENCES FwZuordnung(FwZuordnung_ID)ON DELETE CASCADE);

SET IDENTITY_INSERT [dbo].[Personal] ON;

--INSERT INTO [dbo].[Personal](Personal_ID, PersonalNr, Nachname, Vorname, Dienstgrad_ID,
-- Dienststellen_ID, Abteilungs_ID, FwZuordnung_ID) VALUES


SET IDENTITY_INSERT [dbo].[Personal] OFF;
-----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Personaldaten" 
-- Wünschenswert Zugriff auf die PLASMA Datenbank
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Personaldaten](Personal_ID int PRIMARY KEY,
                                    Telefon varchar(25), 
                                    Handy varchar(25), 
                                    Geburtsdatum Date);

SET IDENTITY_INSERT [dbo].[Personaldaten] ON;

--INSERT INTO [dbo].[Personaldaten](Personal_ID int, Telefon, Handy, Geburtsdatum) VALUES

SET IDENTITY_INSERT [dbo].[Personaldaten] OFF;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Profilbilder"
-- Wünschenswert Zugriff auf die PLASMA Datenbank
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Profilbilder](Profilbild_ID int PRIMARY KEY,
                                  Dateiname varchar(8), --Personalnummer
                                  ImageData image) ;

SET IDENTITY_INSERT [dbo].[Profilbilder] ON;

--INSERT INTO [dbo].[Profilbilder](Profilbild_ID, Dateiname , ImageData) VALUES

SET IDENTITY_INSERT [dbo].[Stuetzpunkte] OFF;

----------------------------------------------------------------------------------------------------------------------
/*-- Tabellenstruktur für Tabelle "Sonderfunktionen" 
--?????????????? Ermitteln unterschiedlicher Sonderfunktionen ????????????????
-- Auflistung wer darf was tun
-- alternative für -> Tabelle Funktionen Personal  alles Auflisten und auf True or False setzen
--?????????? neue Tabelle für die Priorität der Funktion in der automatischen Funktionsplanung  ???????????????

CREATE TABLE [dbo].[Sonderfunktionen](Sonderfunktion_ID int PRIMARY KEY,
                                        Personal_ID int NOT NULL,
                                        Maschinist_ELW Boolean False,
                                        Maschinist_RTW boolean False,
                                        Maschinist_NEF boolean False,
                                        Maschinist_LKW boolean False,
                                        Maschinist_DLK boolean False, 
                                        Maschinist_Kran boolean False,
                                        Maschinist_TM_50 boolean False,
                                        Maschinist_Saugwagen boolean False,
                                        Maschinist_Boot boolean False,
                                        Maschinist_GW_Mess boolean False,
                                        Maschinist_GW_Wasser boolean False,
                                        Maschinist_Dekon_G boolean False,
                                        Maschinist_Dekon_P boolean False,
                                        Maschinist_ErKw boolean False,
                                        Maschinist_GW_San boolean False,
                                        ABC_Dekon boolean False,
                                        ABC_Erkunder boolean False,
                                        Rüstgruppe boolean False,
                                        Taucher boolean False,
                                        ANT boolean False,
                                        ANTS boolean False,
                                        Langzeitgeräteträger boolean False,
                                        ELW_3 boolean False,
										CONSTRAINT Personal_Fk FOREIGN KEY (Personal_ID) REFERENCES Personal(Personal_ID)ON DELETE CASCADE);

-- Daten für Tabelle "Sonderfunktionen"

/*SET IDENTITY_INSERT [dbo].[Sonderfunktionen] ON ;
INSERT INTO [dbo].[Sonderfunktionen] (Sonderfunktion_ID, Sonderfunktionen) VALUES
(1, ''),(2, ''),(3, ''),(4, ''),(5, ''),(6, ''),(7, 'ohne');

SET IDENTITY_INSERT [dbo].[Sonderfunktionen] OFF;*/
*/
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Funktionsbesetzung"
-- Speichern der Einteilung

CREATE TABLE [dbo].[Funktionsbesetzung](Besetzungs_ID int PRIMARY KEY,
                                        Personal_ID int,
                                        Wachabteilungs_ID int,
                                        Planungsdatum Date,
                                        Plan_Dienststelle_Tag int,
                                        Plan_Funktion_Tag int,
                                        Plan_Dienststelle_Nacht int,
                                        Plan_Funktion_Nacht int,

                                        CONSTRAINT Personal_Fk FOREIGN KEY (Personal_ID) REFERENCES Personal(Personal_ID)ON DELETE CASCADE,
                                        CONSTRAINT Wachabteilungs_Fk FOREIGN KEY (Wachabteilungs_ID) REFERENCES Wachabteilung(Wachabteilung_ID)ON DELETE CASCADE) ;
----------------------------------------------------------------------------------------------------------------------
-- Tabellenstruktur für Tabelle "Funktion_Personal"
-- Was darf welcher Kollege für Funktionen ausüben
-- letzte Ebene der Normalisierung

CREATE TABLE [dbo].[Funktion_Personal](Grundfunktions_ID int PRIMARY KEY,
                    Funktionsbezeichnung varchar(40),
                    FunktionsKeyBerechnung int) ;

SET IDENTITY_INSERT [dbo].[Funktion_Personal] ON;

-- Summe mehrerer "FunktionsKeyBerechnung" muss eindeutig sein um einzelne Fahrzeugfunktion zu bestimmen
-- Bsp.: Key.: 99999999 = ohne Funktion / 1 höhste 8 niedrigste Funktion
-- Zusammensetzung aus (Führungsfunktion=1 ,Maschinist Wache, Maschinist Führungsfahrzeuge, Maschinist Sonderfahrzeuge, Rettungsdienstfunktion)
--  oder: jede Funktion eindeutige Nummer - Summe aller Nummern ist Berechtigungs Key                                           
--                                             )
INSERT INTO [dbo].[Funktion_Personal](Grundfunktions_ID, Funktionsbezeichnung, FunktionsKeyBerechnung) VALUES
(1,'A-Dienst',19999999),(2,'B-Dienst',29999999),(3,'C-Dienst',39999999),(4,'Zfg',49999999);

SET IDENTITY_INSERT [dbo].[Funktion_Personal] OFF;
----------------------------------------------------------------------------------------------------------------------
