SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `rich_issue` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rich_issue` ;

-- -----------------------------------------------------
-- Table `rich_issue`.`salon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`salon` (
  `salon_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL,
  `prefecture_code` TINYINT NULL,
  `address1` VARCHAR(20) NULL,
  `address2` VARCHAR(20) NULL,
  `tel` VARCHAR(13) NULL,
  `open_time` CHAR(13) NULL,
  `holiday` VARCHAR(15) NULL,
  `intro_title` CHAR(30) NULL,
  `intro_body` TEXT NULL,
  `img1` VARCHAR(255) NULL,
  `img2` VARCHAR(255) NULL,
  `img3` VARCHAR(255) NULL,
  `recommend_flg` TINYINT NULL,
  `page_view` INT NULL,
  PRIMARY KEY (`salon_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`beautician`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`beautician` (
  `beautician_id` INT NOT NULL AUTO_INCREMENT,
  `salon_id` INT NOT NULL,
  `first_name` VARCHAR(10) NULL,
  `first_name_kana` VARCHAR(10) NULL,
  `last_name` VARCHAR(10) NULL,
  `last__name_kana` VARCHAR(10) NULL,
  `sex_code` TINYINT NULL,
  `nickname` VARCHAR(10) NULL,
  `about` TEXT NULL,
  `img` VARCHAR(255) NULL,
  `recommend_flg` TINYINT NULL,
  `page_view` INT NULL,
  PRIMARY KEY (`beautician_id`),
  INDEX `fk_beautician_salon1_idx` (`salon_id` ASC),
  CONSTRAINT `fk_beautician_salon1`
    FOREIGN KEY (`salon_id`)
    REFERENCES `rich_issue`.`salon` (`salon_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`tag_name`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`tag_name` (
  `tag_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE INDEX `tag_id_UNIQUE` (`tag_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`good_cut`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`good_cut` (
  `good_cut_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`good_cut_id`),
  UNIQUE INDEX `good_cut_id_UNIQUE` (`good_cut_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`salon_ranking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`salon_ranking` (
  `salon_id` INT NOT NULL,
  `page_view` INT NOT NULL,
  PRIMARY KEY (`salon_id`),
  INDEX `fk_ranking_salon1_idx` (`salon_id` ASC),
  UNIQUE INDEX `salon_id_UNIQUE` (`salon_id` ASC),
  CONSTRAINT `fk_ranking_salon1`
    FOREIGN KEY (`salon_id`)
    REFERENCES `rich_issue`.`salon` (`salon_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`beautician_ranking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`beautician_ranking` (
  `beautician_id` INT NOT NULL,
  `page_view` INT NOT NULL,
  PRIMARY KEY (`beautician_id`),
  INDEX `fk_beautician_ranking_beautician1_idx` (`beautician_id` ASC),
  UNIQUE INDEX `beautician_id_UNIQUE` (`beautician_id` ASC),
  CONSTRAINT `fk_beautician_ranking_beautician1`
    FOREIGN KEY (`beautician_id`)
    REFERENCES `rich_issue`.`beautician` (`beautician_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`salon_tag_relations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`salon_tag_relations` (
  `salon_tag_relations_id` INT NOT NULL AUTO_INCREMENT,
  `salon_id` INT NOT NULL,
  `tag_id` INT NOT NULL,
  PRIMARY KEY (`salon_tag_relations_id`),
  INDEX `fk_tags_tag_name1_idx` (`tag_id` ASC),
  CONSTRAINT `fk_tags_salon1`
    FOREIGN KEY (`salon_id`)
    REFERENCES `rich_issue`.`salon` (`salon_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tags_tag_name1`
    FOREIGN KEY (`tag_id`)
    REFERENCES `rich_issue`.`tag_name` (`tag_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rich_issue`.`beautician_cut_relations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rich_issue`.`beautician_cut_relations` (
  `beautician_good_cut_relations_id` INT NOT NULL AUTO_INCREMENT,
  `beautician_id` INT NOT NULL,
  `good_cut_id` INT NOT NULL,
  PRIMARY KEY (`beautician_good_cut_relations_id`),
  INDEX `fk_cuts_cut_name1_idx` (`good_cut_id` ASC),
  CONSTRAINT `fk_cuts_beautician1`
    FOREIGN KEY (`beautician_id`)
    REFERENCES `rich_issue`.`beautician` (`beautician_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuts_cut_name1`
    FOREIGN KEY (`good_cut_id`)
    REFERENCES `rich_issue`.`good_cut` (`good_cut_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
