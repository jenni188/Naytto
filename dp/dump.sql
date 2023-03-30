-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema naytto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema naytto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `naytto` DEFAULT CHARACTER SET utf8 ;
USE `naytto` ;

-- -----------------------------------------------------
-- Table `naytto`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `naytto`.`product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `img` LONGBLOB NOT NULL,
  `code` INT NOT NULL,
  `price` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `product_code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `naytto`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `naytto`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `pwd`  VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `naytto`.`texts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `naytto`.`texts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `heading` VARCHAR(50) NOT NULL,
  `text` VARCHAR(1000) NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `me_text_UNIQUE` (`heading` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
