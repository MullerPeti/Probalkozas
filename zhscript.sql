-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Hirportal
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Hirportal` ;

-- -----------------------------------------------------
-- Schema Hirportal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Hirportal` DEFAULT CHARACTER SET utf8 ;
USE `Hirportal` ;

-- -----------------------------------------------------
-- Table `Hirportal`.`Hirek`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Hirportal`.`Hirek` ;

CREATE TABLE IF NOT EXISTS `Hirportal`.`Hirek` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cim` VARCHAR(45) NULL,
  `szoveg` VARCHAR(2000) NULL,
  `datum` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Hirportal`.`hozzaszolas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Hirportal`.`hozzaszolas` ;

CREATE TABLE IF NOT EXISTS `Hirportal`.`hozzaszolas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `szerzo` VARCHAR(45) NULL,
  `hozzaszolas` VARCHAR(2000) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


drop table if exists hirek_has_hozzaszolas;
-- -----------------------------------------------------
-- Table `Hirportal`.`Hirek_has_hozzaszolas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Hirportal`.`hozzaszolasok` ;

CREATE TABLE IF NOT EXISTS `Hirportal`.`hozzaszolasok` (
  `hirid` INT NULL,
  `hozzaszolasid` INT NULL,
  PRIMARY KEY (`hirid`, `hozzaszolasid`),
  CONSTRAINT `fk_Hirek_has_hozzaszolas_Hirek`
    FOREIGN KEY (`hirid`)
    REFERENCES `Hirportal`.`Hirek` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Hirek_has_hozzaszolas_hozzaszolas1`
    FOREIGN KEY (`hozzaszolasid`)
    REFERENCES `Hirportal`.`hozzaszolas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
delete from hirek where id = 1;

insert into hirek(cim,szoveg,datum) values("elloptak a biciklit", "a piros fehér biciklit",'2024-01-12');
insert into hirek(cim,szoveg,datum) values("ujabb szerzodest kötött a siemens", "ez a szerzodes nagyon meglepte a magyar munkavállalókat",'2024-03-12');
insert into hozzaszolas(szerzo,hozzaszolas) values("Csumagep","hát ez nagyon jó");
insert into hozzaszolas(szerzo,hozzaszolas) values("Csumagep","hát ez szomorú");
insert into hozzaszolas(szerzo,hozzaszolas) values("Andris","mekkora meglepetést okozott ez most nekem");

insert into hozzaszolasok(hirid,hozzaszolasid) values(1,2);
insert into hozzaszolasok(hirid,hozzaszolasid) values(2,3);
insert into hozzaszolasok(hirid,hozzaszolasid) values(2,1);

select hirek.cim as cim, hirek.szoveg as szoveg, hirek.datum as datum from hirek where hirek.datum > '2024-01-01' order by hirek.datum;




select h.szerzo as szerzo, h.hozzaszolas as szoveg from hozzaszolas h inner join hozzaszolasok
on hozzaszolasok.hozzaszolasid = h.id inner join hirek on 
hirek.id = hozzaszolasok.hirid where hirek.cim = "elloptak a biciklit";




