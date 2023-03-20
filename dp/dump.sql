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
  `category` INT UNSIGNED NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `productc_img` LONGBLOB NOT NULL,
  `desc1` VARCHAR(500) NOT NULL,
  `code` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `code_UNIQUE` (`code` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `naytto`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `naytto`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `pwd` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `user_name_UNIQUE` (`user_name` ASC),
  UNIQUE INDEX `pwd_UNIQUE` (`pwd` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `naytto`.`text`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `naytto`.`text` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `me_text` VARCHAR(1000) NOT NULL,
  `order_text` VARCHAR(1000) NOT NULL,
  `contact_text` VARCHAR(1000) NOT NULL,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `me_text_UNIQUE` (`me_text` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
