-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Funktionsbesetzung_BF_Berlin
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Funktionsbesetzung_BF_Berlin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Funktionsbesetzung_BF_Berlin` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `Funktionsbesetzung_BF_Berlin` ;

-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Direktion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Direktion` (
  `Direktion_ID` INT NOT NULL AUTO_INCREMENT,
  `Direktion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Direktion_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Dienststellen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (
  `Dienststellen_ID` INT NOT NULL AUTO_INCREMENT,
  `Direktion_Direktion_ID` INT NOT NULL,
  `Wache_Bezeichnung` VARCHAR(45) NOT NULL,
  `Wach_Nr` SMALLINT(6) NOT NULL,
  `soll_Tag` SMALLINT(2) NULL DEFAULT NULL,
  `soll_Nacht` SMALLINT(2) NULL DEFAULT NULL,
  PRIMARY KEY (`Dienststellen_ID`),
  INDEX `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID` ASC),
  CONSTRAINT `fk_dienststellen_direktion`
    FOREIGN KEY (`Direktion_Direktion_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (
  `Fahrzeuge_ID` INT NOT NULL AUTO_INCREMENT,
  `Fahrzeuge_Art` VARCHAR(15) NOT NULL,
  `Fahrzeug_Bezeichnung` VARCHAR(10) NOT NULL,
  `Rettungsdienst_Type` ENUM('C','B','A') NOT NULL,
  PRIMARY KEY (`Fahrzeuge_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Dienstgrad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (
  `Dienstgrad_ID` INT NOT NULL,
  `Dienstgrad_Bezeichnung` CHAR(8) NOT NULL,
  PRIMARY KEY (`Dienstgrad_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Wachabteilung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (
  `Wachabteilung_ID` INT NOT NULL AUTO_INCREMENT,
  `Abteilung` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`Wachabteilung_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Personal` (
  `Personal_ID` INT NOT NULL AUTO_INCREMENT,
  `Personalnummer` CHAR(8) NOT NULL,
  `Nachname` VARCHAR(45) NOT NULL,
  `Vorname` VARCHAR(45) NOT NULL,
  `Dienstgrad_Dienstgrad_ID` INT NOT NULL,
  `Dienststellen_Dienststellen_ID` INT NOT NULL,
  `Wachabteilung_Wachabteilung_ID` INT NOT NULL,
  PRIMARY KEY (`Personal_ID`),
  INDEX `fk_Personal_Dienstgrad1_idx` (`Dienstgrad_Dienstgrad_ID` ASC),
  INDEX `fk_Personal_dienststellen1_idx` (`Dienststellen_Dienststellen_ID` ASC),
  UNIQUE INDEX `Personalnummer_UNIQUE` (`Personalnummer` ASC),
  INDEX `fk_Personal_Wachabteilung1_idx` (`Wachabteilung_Wachabteilung_ID` ASC),
  CONSTRAINT `fk_Personal_Dienstgrad1`
    FOREIGN KEY (`Dienstgrad_Dienstgrad_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personal_dienststellen1`
    FOREIGN KEY (`Dienststellen_Dienststellen_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personal_Wachabteilung1`
    FOREIGN KEY (`Wachabteilung_Wachabteilung_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Personaldaten`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Personaldaten` (
  `Personal_Personal_ID` INT NOT NULL,
  `Ort` VARCHAR(45) NULL,
  `PLZ` VARCHAR(6) NULL,
  `Straße` VARCHAR(45) NULL,
  `Hausnummer` VARCHAR(3) NULL,
  `Adress-Zusatz` VARCHAR(45) NULL,
  `Telefon` VARCHAR(20) NULL,
  `Handy` VARCHAR(20) NULL,
  `GebDatum` DATE NULL,
  INDEX `fk_kontaktdaten_Personal1_idx` (`Personal_Personal_ID` ASC),
  PRIMARY KEY (`Personal_Personal_ID`),
  CONSTRAINT `fk_kontaktdaten_Personal1`
    FOREIGN KEY (`Personal_Personal_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Funktionsbesetzung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Funktionsbesetzung` (
  `Funktionsbesetzung_ID` INT NOT NULL AUTO_INCREMENT,
  `Personal_Personal_ID` INT NOT NULL,
  `Wachabteilung_Wachabteilung_ID` INT NOT NULL,
  `Planungs_Datum` DATE NULL DEFAULT NULL,
  `Plan_Dienststelle_Tag` VARCHAR(45) NULL DEFAULT NULL,
  `Plan_Funktion_Tag` VARCHAR(45) NULL DEFAULT NULL,
  `Plan_Dienststelle_Nacht` VARCHAR(45) NULL DEFAULT NULL,
  `Plan_Funktion_Nacht` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Funktionsbesetzung_ID`, `Wachabteilung_Wachabteilung_ID`),
  INDEX `fk_Funktionsbesetzung_Personal1_idx` (`Personal_Personal_ID` ASC),
  INDEX `fk_Funktionsbesetzung_Wachabteilung1_idx` (`Wachabteilung_Wachabteilung_ID` ASC),
  CONSTRAINT `fk_Funktionsbesetzung_Personal1`
    FOREIGN KEY (`Personal_Personal_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funktionsbesetzung_Wachabteilung1`
    FOREIGN KEY (`Wachabteilung_Wachabteilung_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Profilbilder`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Profilbilder` (
  `Personal_Personal_ID` INT NOT NULL,
  `Image_Data` LONGBLOB NULL,
  `Image_Type` VARCHAR(20) NULL,
  INDEX `fk_Profilbilder_Personal1_idx` (`Personal_Personal_ID` ASC),
  PRIMARY KEY (`Personal_Personal_ID`),
  CONSTRAINT `fk_Profilbilder_Personal1`
    FOREIGN KEY (`Personal_Personal_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (
  `Funktion_Rettungsdienst_ID` INT NOT NULL AUTO_INCREMENT,
  `Funktion_Rettungsdienst` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`Funktion_Rettungsdienst_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (
  `Funktion_TH_Brand_ID` INT NOT NULL AUTO_INCREMENT,
  `Funktions_TH_Brand` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Funktion_TH_Brand_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Funktion_Personal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Funktion_Personal` (
  `Funktion_Personal_ID` INT NOT NULL,
  `Funktion_TH_Brand_Funktion_TH_Brand_ID` INT NOT NULL,
  `Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID` INT NOT NULL,
  `Maschinist` TINYINT(1) NULL DEFAULT 0,
  `Fernmelder` TINYINT(1) NULL DEFAULT 0,
  `ANTS` TINYINT(1) NULL DEFAULT 0,
  `Langzeitgeräteträger` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`Funktion_Personal_ID`),
  INDEX `fk_Funktion_Personal_Personal1_idx` (`Funktion_Personal_ID` ASC),
  INDEX `fk_Funktion_Personal_Funktion_TH_Brand1_idx` (`Funktion_TH_Brand_Funktion_TH_Brand_ID` ASC),
  INDEX `fk_Funktion_Personal_Funktion_Rettungsdienst1_idx` (`Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID` ASC),
  CONSTRAINT `fk_Funktion_Personal_Personal1`
    FOREIGN KEY (`Funktion_Personal_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funktion_Personal_Funktion_TH_Brand1`
    FOREIGN KEY (`Funktion_TH_Brand_Funktion_TH_Brand_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Funktion_Personal_Funktion_Rettungsdienst1`
    FOREIGN KEY (`Funktion_Rettungsdienst_Funktion_Rettungsdienst_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Stützpunkte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (
  `Stützpunkt_ID` INT NOT NULL AUTO_INCREMENT,
  `Direktion_Direktion_ID` INT NOT NULL,
  `Stützpunkt_Bezeichnung` VARCHAR(45) NOT NULL,
  `Stützpunkt_Nr` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`Stützpunkt_ID`),
  INDEX `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID` ASC),
  CONSTRAINT `fk_dienststellen_direktion0`
    FOREIGN KEY (`Direktion_Direktion_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (
  `Fahrzeugfunktionen_ID` INT NOT NULL AUTO_INCREMENT,
  `Fahrzeuge_Fahrzeuge_ID` INT NOT NULL,
  `Funktions_Kennung` VARCHAR(45) NOT NULL,
  `Funktions_Bezeichnung` VARCHAR(45) NULL,
  `Grund_Qualifizierung` VARCHAR(45) NULL,
  PRIMARY KEY (`Fahrzeugfunktionen_ID`),
  INDEX `fk_Fahrzeugfunktionen_Fahrzeuge1_idx` (`Fahrzeuge_Fahrzeuge_ID` ASC),
  CONSTRAINT `fk_Fahrzeugfunktionen_Fahrzeuge1`
    FOREIGN KEY (`Fahrzeuge_Fahrzeuge_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Freiwillige_Wache`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Freiwillige_Wache` (
  `Freiwillige_Wache_ID` INT NOT NULL AUTO_INCREMENT,
  `Direktion_Direktion_ID` INT NOT NULL,
  `Wache_Bezeichnung` VARCHAR(45) NOT NULL,
  `Wach_Nr` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`Freiwillige_Wache_ID`),
  INDEX `fk_dienststellen_direktion_idx` (`Direktion_Direktion_ID` ASC),
  CONSTRAINT `fk_dienststellen_direktion1`
    FOREIGN KEY (`Direktion_Direktion_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen` (
  `Zuordnungs_ID` INT NOT NULL AUTO_INCREMENT,
  `Dienststellen_Dienststellen_ID` INT NOT NULL,
  `gültig_ab` TIMESTAMP(6) NULL,
  `Stützpunkte_Stützpunkt_ID_1` INT NULL,
  `Rang_Stützpunkt_Dienststelle_1` TINYINT(2) NULL,
  `Stützpunkte_Stützpunkt_ID_2` INT NULL,
  `Rang_Stützpunkt_Dienststelle_2` TINYINT(2) NULL,
  `Stützpunkte_Stützpunkt_ID_3` INT NULL,
  `Rang_Stützpunkt_Dienststelle_3` TINYINT(2) NULL,
  `Stützpunkte_Stützpunkt_ID_4` INT NULL,
  `Rang_Stützpunkt_Dienststelle_4` TINYINT(2) NULL,
  INDEX `fk_Stützpunkte_has_Dienststellen_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID` ASC),
  INDEX `fk_Stützpunkte_has_Dienststellen_Stützpunkte2_idx` (`Stützpunkte_Stützpunkt_ID_1` ASC),
  PRIMARY KEY (`Zuordnungs_ID`),
  CONSTRAINT `fk_Stützpunkte_has_Dienststellen_Dienststellen1`
    FOREIGN KEY (`Dienststellen_Dienststellen_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stützpunkte_has_Dienststellen_Stützpunkte2`
    FOREIGN KEY (`Stützpunkte_Stützpunkt_ID_1`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (`Stützpunkt_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Dienststelle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Dienststelle` (
  `Fahrzeugzuordnung_Dienststelle_ID` INT NOT NULL AUTO_INCREMENT,
  `Dienststellen_Dienststellen_ID` INT NOT NULL,
  `gültig_ab` TIMESTAMP(6) NULL,
  `Fahrzeuge_Fahrzeuge_ID_1` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_1` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_2` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_2` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_3` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_3` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_4` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_4` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_5` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_5` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_6` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_6` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_7` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_7` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_8` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_8` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_9` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_9` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_10` TINYINT(2) NOT NULL,
  `Position_auf_Dienststelle_10` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  PRIMARY KEY (`Fahrzeugzuordnung_Dienststelle_ID`),
  INDEX `fk_Fahrzeugzuordnung_Dienststellen1_idx` (`Dienststellen_Dienststellen_ID` ASC),
  CONSTRAINT `fk_Fahrzeugzuordnung_Dienststellen1`
    FOREIGN KEY (`Dienststellen_Dienststellen_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt` (
  `Fahrzeugzuordnung_Stützpunkte_ID` INT NOT NULL AUTO_INCREMENT,
  `Stützpunkte_Stützpunkt_ID` INT NOT NULL,
  `gültig_ab` TIMESTAMP(6) NULL,
  `Fahrzeuge_Fahrzeuge_ID_1` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_1` ENUM('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_2` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_2` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_3` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_3` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_4` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_4` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_5` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_5` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_6` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_6` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_7` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_7` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_8` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_8` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_9` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_9` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `Fahrzeuge_Fahrzeuge_ID_10` TINYINT(2) NOT NULL,
  `Position_auf_Stützpunkt_10` ENUM('0','1','2','3','4','5','6','7','8','9','10') NOT NULL,
  PRIMARY KEY (`Fahrzeugzuordnung_Stützpunkte_ID`),
  INDEX `fk_Fahrzeugzuordnung_Stützpunkt_Stützpunkte1_idx` (`Stützpunkte_Stützpunkt_ID` ASC),
  CONSTRAINT `fk_Fahrzeugzuordnung_Stützpunkt_Stützpunkte1`
    FOREIGN KEY (`Stützpunkte_Stützpunkt_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (`Stützpunkt_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Funktionsbesetzung_BF_Berlin`.`Rechte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funktionsbesetzung_BF_Berlin`.`Rechte` (
  `Personal_Personal_ID` INT NOT NULL,
  `Passwort` VARCHAR(255) NOT NULL,
  `Session` VARCHAR(255) NULL,
  `Berechtigung` TINYINT(3) NOT NULL DEFAULT 3,
  INDEX `fk_Rechte_Personal1_idx` (`Personal_Personal_ID` ASC),
  PRIMARY KEY (`Personal_Personal_ID`),
  CONSTRAINT `fk_Rechte_Personal1`
    FOREIGN KEY (`Personal_Personal_ID`)
    REFERENCES `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Direktion`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`, `Direktion`) VALUES (1, 'Nord');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`, `Direktion`) VALUES (2, 'Süd');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Direktion` (`Direktion_ID`, `Direktion`) VALUES (3, 'West');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Dienststellen`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`, `Direktion_Direktion_ID`, `Wache_Bezeichnung`, `Wach_Nr`, `soll_Tag`, `soll_Nacht`) VALUES (1, 1, 'FW_1300', 1300, 20, 18);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`, `Direktion_Direktion_ID`, `Wache_Bezeichnung`, `Wach_Nr`, `soll_Tag`, `soll_Nacht`) VALUES (2, 1, 'FW_2200', 2200, NULL, NULL);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`, `Direktion_Direktion_ID`, `Wache_Bezeichnung`, `Wach_Nr`, `soll_Tag`, `soll_Nacht`) VALUES (3, 1, 'FW_2600', 2600, NULL, NULL);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienststellen` (`Dienststellen_ID`, `Direktion_Direktion_ID`, `Wache_Bezeichnung`, `Wach_Nr`, `soll_Tag`, `soll_Nacht`) VALUES (4, 1, 'FW_2300', 2300, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (1, 'LHF', 'LHF_1', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (2, 'LHF', 'LHF_2', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (3, 'DLK', 'DLK', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (4, 'RTW', 'RTW_1', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (5, 'RTW', 'RTW_2', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (6, 'RTW', 'RTW_3', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (7, 'RTW', 'RTW_4', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (8, 'RTW', 'RTW_5', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (9, 'RTW', 'RTW_6', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (10, 'RTW', 'RTW_7', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (11, 'RTW', 'RTW_8', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (12, 'RTW', 'RTW_9', DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeuge` (`Fahrzeuge_ID`, `Fahrzeuge_Art`, `Fahrzeug_Bezeichnung`, `Rettungsdienst_Type`) VALUES (13, 'RTW', 'RTW_10', DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Dienstgrad`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (1, 'LBD');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (2, 'LBDv');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (3, 'BD*');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (4, 'BD');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (5, 'BOR');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (6, 'BR');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (7, 'BRef');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (8, 'BOAR');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (9, 'BAR');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (10, 'BA');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (11, 'BOI');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (12, 'BI');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (13, 'BOI_Anw');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (14, 'HBMz');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (15, 'HBM*');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (16, 'HBM');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (17, 'OBM');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (18, 'BM');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Dienstgrad` (`Dienstgrad_ID`, `Dienstgrad_Bezeichnung`) VALUES (19, 'BM_Anw');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Wachabteilung`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`, `Abteilung`) VALUES (1, '1_Tour');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`, `Abteilung`) VALUES (2, '2_Tour');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`, `Abteilung`) VALUES (3, '3_Tour');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Wachabteilung` (`Wachabteilung_ID`, `Abteilung`) VALUES (4, '4.Tour');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Personal`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Personal` (`Personal_ID`, `Personalnummer`, `Nachname`, `Vorname`, `Dienstgrad_Dienstgrad_ID`, `Dienststellen_Dienststellen_ID`, `Wachabteilung_Wachabteilung_ID`) VALUES (1, '24007146', 'Feesche', 'Marcel', 17, 1, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Personaldaten`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Personaldaten` (`Personal_Personal_ID`, `Ort`, `PLZ`, `Straße`, `Hausnummer`, `Adress-Zusatz`, `Telefon`, `Handy`, `GebDatum`) VALUES (1, 'Birkenwerder', '16547', 'Hohen Neuendorfer Weg', '1', NULL, '0330/3213359', NULL, '01.09.1975');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (1, 'Not_San');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (2, 'Rett_Ass');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (3, 'RS_2000');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (4, 'Rett_San');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (5, 'Rett_Helfer');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_Rettungsdienst` (`Funktion_Rettungsdienst_ID`, `Funktion_Rettungsdienst`) VALUES (6, 'ohne');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (1, 'A_Dienst');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (2, 'B_Dienst');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (3, 'C_Dienst');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (4, 'Zfg');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (5, 'Stf');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (6, 'Trupp_Fü');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Funktion_TH_Brand` (`Funktion_TH_Brand_ID`, `Funktions_TH_Brand`) VALUES (7, 'Trupp_Mann');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Stützpunkte`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (`Stützpunkt_ID`, `Direktion_Direktion_ID`, `Stützpunkt_Bezeichnung`, `Stützpunkt_Nr`) VALUES (1, 1, 'FW_1310', 1310);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (`Stützpunkt_ID`, `Direktion_Direktion_ID`, `Stützpunkt_Bezeichnung`, `Stützpunkt_Nr`) VALUES (2, 1, 'FW_2620', 2620);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte` (`Stützpunkt_ID`, `Direktion_Direktion_ID`, `Stützpunkt_Bezeichnung`, `Stützpunkt_Nr`) VALUES (3, 1, 'FW_2630', 2630);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (1, 4, '711', 'RDV_RTW_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (2, 4, '712', 'MA_RTW_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (3, 4, '713', 'Prakt_RTW_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (4, 5, '721', 'RDV_RTW_2', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (5, 5, '722', 'MA_RTW_2', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (6, 5, '723', 'Prakt_RTW_2', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (7, 6, '731', 'RDV_RTW_3', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (8, 6, '732', 'MA_RTW_3', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (9, 6, '733', 'Prakt_RTW_3', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (10, 7, '741', 'RDV_RTW_4', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (11, 7, '742', 'MA_RTW_4', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (12, 7, '743', 'Prakt_RTW_4', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (13, 8, '751', 'RDV_RTW_5', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (14, 8, '752', 'MA_RTW_5', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (15, 8, '753', 'Prakt_RTW_5', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (16, 9, '761', 'RDV_RTW_6', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (17, 9, '762', 'MA_RTW_6', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (18, 9, '763', 'Prakt_RTW_6', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (19, 1, '371', 'Fzf_Lhf_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (20, 1, '372', 'Fzf_Lhf_1_Pra', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (21, 1, '521', 'MA_Lhf_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (22, 1, '522', 'ATr_Fü_Lhf_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (23, 1, '523', 'ATr_Ma_Lhf_1', 'NULL');
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugfunktionen` (`Fahrzeugfunktionen_ID`, `Fahrzeuge_Fahrzeuge_ID`, `Funktions_Kennung`, `Funktions_Bezeichnung`, `Grund_Qualifizierung`) VALUES (24, 1, '524', 'ATr_Pra_Lhf_1', 'NULL');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen` (`Zuordnungs_ID`, `Dienststellen_Dienststellen_ID`, `gültig_ab`, `Stützpunkte_Stützpunkt_ID_1`, `Rang_Stützpunkt_Dienststelle_1`, `Stützpunkte_Stützpunkt_ID_2`, `Rang_Stützpunkt_Dienststelle_2`, `Stützpunkte_Stützpunkt_ID_3`, `Rang_Stützpunkt_Dienststelle_3`, `Stützpunkte_Stützpunkt_ID_4`, `Rang_Stützpunkt_Dienststelle_4`) VALUES (1, 1, NULL, 1, 1, 2, 2, NULL, NULL, NULL, NULL);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen` (`Zuordnungs_ID`, `Dienststellen_Dienststellen_ID`, `gültig_ab`, `Stützpunkte_Stützpunkt_ID_1`, `Rang_Stützpunkt_Dienststelle_1`, `Stützpunkte_Stützpunkt_ID_2`, `Rang_Stützpunkt_Dienststelle_2`, `Stützpunkte_Stützpunkt_ID_3`, `Rang_Stützpunkt_Dienststelle_3`, `Stützpunkte_Stützpunkt_ID_4`, `Rang_Stützpunkt_Dienststelle_4`) VALUES (2, 2, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Stützpunkte_has_Dienststellen` (`Zuordnungs_ID`, `Dienststellen_Dienststellen_ID`, `gültig_ab`, `Stützpunkte_Stützpunkt_ID_1`, `Rang_Stützpunkt_Dienststelle_1`, `Stützpunkte_Stützpunkt_ID_2`, `Rang_Stützpunkt_Dienststelle_2`, `Stützpunkte_Stützpunkt_ID_3`, `Rang_Stützpunkt_Dienststelle_3`, `Stützpunkte_Stützpunkt_ID_4`, `Rang_Stützpunkt_Dienststelle_4`) VALUES (3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Dienststelle`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Dienststelle` (`Fahrzeugzuordnung_Dienststelle_ID`, `Dienststellen_Dienststellen_ID`, `gültig_ab`, `Fahrzeuge_Fahrzeuge_ID_1`, `Position_auf_Dienststelle_1`, `Fahrzeuge_Fahrzeuge_ID_2`, `Position_auf_Dienststelle_2`, `Fahrzeuge_Fahrzeuge_ID_3`, `Position_auf_Dienststelle_3`, `Fahrzeuge_Fahrzeuge_ID_4`, `Position_auf_Dienststelle_4`, `Fahrzeuge_Fahrzeuge_ID_5`, `Position_auf_Dienststelle_5`, `Fahrzeuge_Fahrzeuge_ID_6`, `Position_auf_Dienststelle_6`, `Fahrzeuge_Fahrzeuge_ID_7`, `Position_auf_Dienststelle_7`, `Fahrzeuge_Fahrzeuge_ID_8`, `Position_auf_Dienststelle_8`, `Fahrzeuge_Fahrzeuge_ID_9`, `Position_auf_Dienststelle_9`, `Fahrzeuge_Fahrzeuge_ID_10`, `Position_auf_Dienststelle_10`) VALUES (1, 1, NULL, 1, '1', 3, '2', 2, '3', 4, '4', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt` (`Fahrzeugzuordnung_Stützpunkte_ID`, `Stützpunkte_Stützpunkt_ID`, `gültig_ab`, `Fahrzeuge_Fahrzeuge_ID_1`, `Position_auf_Stützpunkt_1`, `Fahrzeuge_Fahrzeuge_ID_2`, `Position_auf_Stützpunkt_2`, `Fahrzeuge_Fahrzeuge_ID_3`, `Position_auf_Stützpunkt_3`, `Fahrzeuge_Fahrzeuge_ID_4`, `Position_auf_Stützpunkt_4`, `Fahrzeuge_Fahrzeuge_ID_5`, `Position_auf_Stützpunkt_5`, `Fahrzeuge_Fahrzeuge_ID_6`, `Position_auf_Stützpunkt_6`, `Fahrzeuge_Fahrzeuge_ID_7`, `Position_auf_Stützpunkt_7`, `Fahrzeuge_Fahrzeuge_ID_8`, `Position_auf_Stützpunkt_8`, `Fahrzeuge_Fahrzeuge_ID_9`, `Position_auf_Stützpunkt_9`, `Fahrzeuge_Fahrzeuge_ID_10`, `Position_auf_Stützpunkt_10`) VALUES (1, 1, NULL, 4, '1', 5, '2', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt` (`Fahrzeugzuordnung_Stützpunkte_ID`, `Stützpunkte_Stützpunkt_ID`, `gültig_ab`, `Fahrzeuge_Fahrzeuge_ID_1`, `Position_auf_Stützpunkt_1`, `Fahrzeuge_Fahrzeuge_ID_2`, `Position_auf_Stützpunkt_2`, `Fahrzeuge_Fahrzeuge_ID_3`, `Position_auf_Stützpunkt_3`, `Fahrzeuge_Fahrzeuge_ID_4`, `Position_auf_Stützpunkt_4`, `Fahrzeuge_Fahrzeuge_ID_5`, `Position_auf_Stützpunkt_5`, `Fahrzeuge_Fahrzeuge_ID_6`, `Position_auf_Stützpunkt_6`, `Fahrzeuge_Fahrzeuge_ID_7`, `Position_auf_Stützpunkt_7`, `Fahrzeuge_Fahrzeuge_ID_8`, `Position_auf_Stützpunkt_8`, `Fahrzeuge_Fahrzeuge_ID_9`, `Position_auf_Stützpunkt_9`, `Fahrzeuge_Fahrzeuge_ID_10`, `Position_auf_Stützpunkt_10`) VALUES (2, 2, NULL, 4, '1', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT);
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Fahrzeugzuordnung_Stützpunkt` (`Fahrzeugzuordnung_Stützpunkte_ID`, `Stützpunkte_Stützpunkt_ID`, `gültig_ab`, `Fahrzeuge_Fahrzeuge_ID_1`, `Position_auf_Stützpunkt_1`, `Fahrzeuge_Fahrzeuge_ID_2`, `Position_auf_Stützpunkt_2`, `Fahrzeuge_Fahrzeuge_ID_3`, `Position_auf_Stützpunkt_3`, `Fahrzeuge_Fahrzeuge_ID_4`, `Position_auf_Stützpunkt_4`, `Fahrzeuge_Fahrzeuge_ID_5`, `Position_auf_Stützpunkt_5`, `Fahrzeuge_Fahrzeuge_ID_6`, `Position_auf_Stützpunkt_6`, `Fahrzeuge_Fahrzeuge_ID_7`, `Position_auf_Stützpunkt_7`, `Fahrzeuge_Fahrzeuge_ID_8`, `Position_auf_Stützpunkt_8`, `Fahrzeuge_Fahrzeuge_ID_9`, `Position_auf_Stützpunkt_9`, `Fahrzeuge_Fahrzeuge_ID_10`, `Position_auf_Stützpunkt_10`) VALUES (3, 3, NULL, 4, '1', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Funktionsbesetzung_BF_Berlin`.`Rechte`
-- -----------------------------------------------------
START TRANSACTION;
USE `Funktionsbesetzung_BF_Berlin`;
INSERT INTO `Funktionsbesetzung_BF_Berlin`.`Rechte` (`Personal_Personal_ID`, `Passwort`, `Session`, `Berechtigung`) VALUES (1, DEFAULT, NULL, 1);

COMMIT;

