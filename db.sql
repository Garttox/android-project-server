-- MySQL Script generated by MySQL Workbench
-- Mon Nov  5 18:48:34 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema OpavaTour
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema OpavaTour
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OpavaTour` DEFAULT CHARACTER SET utf8 ;
USE `OpavaTour` ;

-- -----------------------------------------------------
-- Table `OpavaTour`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpavaTour`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `role` ENUM('admin', 'editor') NOT NULL DEFAULT 'editor',
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpavaTour`.`tour`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpavaTour`.`tour` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `published` ENUM('yes', 'no', 'wip') NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `title_UNIQUE` (`title` ASC),
  INDEX `fk_tour_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_tour_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `OpavaTour`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpavaTour`.`point`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpavaTour`.`point` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `order` INT NOT NULL,
  `coordinateE` VARCHAR(20) NOT NULL,
  `coordinateN` VARCHAR(20) NOT NULL,
  `text` LONGTEXT NULL,
  `fotoURL` VARCHAR(100) NULL,
  `name` VARCHAR(80) NOT NULL,
  `tour_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_point_tour1_idx` (`tour_id` ASC),
  CONSTRAINT `fk_point_tour1`
    FOREIGN KEY (`tour_id`)
    REFERENCES `OpavaTour`.`tour` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
