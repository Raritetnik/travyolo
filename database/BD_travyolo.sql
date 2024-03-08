-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema travyolo
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema travyolo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `travyolo` DEFAULT CHARACTER SET utf8 ;
USE `travyolo` ;

-- -----------------------------------------------------
-- Table `travyolo`.`chains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`chains` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`image_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`image_categories` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`image_categories_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`image_categories_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `image_categories_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `image_categories_code`),
  INDEX `fk_image_categories_translations_image_categories_idx` (`image_categories_code` ASC) ,
  INDEX `fk_image_categories_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_image_categories_translations_image_categories`
    FOREIGN KEY (`image_categories_code`)
    REFERENCES `travyolo`.`image_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`room_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`room_types` (
  `code` VARCHAR(25) NOT NULL,
  `quantity` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`code`, `quantity`, `name`, `updated_at`) VALUES
('DB', 2, 'Double', now()),
('FL', 0, 'Family Room', now()),
('FL5', 5, 'Family Room', now()),
('FL6', 6, 'Family Room', now()),
('FL7', 7, 'Family Room', now()),
('FL8', 8, 'Family Room', now()),
('QB', 4, 'Quad', now()),
('SB', 1, 'Single', now()),
('TB', 3, 'Triple', now()),
('TW', 2, 'Twin', now());

-- --------------------------------------------------------

-- -----------------------------------------------------
-- Table `travyolo`.`room_types_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`room_types_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `room_types_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `room_types_code`),
  INDEX `fk_room_types_translations_room_types_idx` (`room_types_code` ASC) ,
  INDEX `fk_room_types_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_room_types_translations_room_types`
    FOREIGN KEY (`room_types_code`)
    REFERENCES `travyolo`.`room_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`room_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`room_categories` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`room_categories_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`room_categories_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `room_categories_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `room_categories_code`),
  INDEX `fk_room_categories_translations_room_categories_idx` (`room_categories_code` ASC) ,
  INDEX `fk_room_categories_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_room_categories_translations_room_categories`
    FOREIGN KEY (`room_categories_code`)
    REFERENCES `travyolo`.`room_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`meal_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`meal_types` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `score` INT NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


--
-- Dumping data for table `meal_types`
--

INSERT INTO `meal_types` (`code`, `name`, `score`, `updated_at`) VALUES
('AI', 'All Inclusive', 5, now()),
('BC', 'Breakfast Continental', 1, now()),
('BE', 'Breakfast English', 2, now()),
('FB', 'Full Board', 4, now()),
('HB', 'Half Board', 3, now()),
('RO', 'Room Only', 0, now()),
('SC', 'Self Catering', 0, now()),
('UL', 'Ultra', 6, now());

-- --------------------------------------------------------


-- -----------------------------------------------------
-- Table `travyolo`.`meal_types_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`meal_types_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `meal_types_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `meal_types_code`),
  INDEX `fk_meal_types_translations_meal_types_idx` (`meal_types_code` ASC) ,
  INDEX `fk_meal_types_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_meal_types_translations_meal_types`
    FOREIGN KEY (`meal_types_code`)
    REFERENCES `travyolo`.`meal_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotel_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotel_types` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotel_types_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotel_types_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `hotel_types_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `hotel_types_code`),
  INDEX `fk_hotel_types_translations_hotel-types_idx` (`hotel_types_code` ASC) ,
  INDEX `fk_hotel_types_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_hotel_types_translations_hotel-types`
    FOREIGN KEY (`hotel_types_code`)
    REFERENCES `travyolo`.`hotel_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotel_themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotel_themes` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotel_themes_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotel_themes_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `hotel_themes_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `hotel_themes_code`),
  INDEX `fk_hotel_themes_translations_hotel_themes_idx` (`hotel_themes_code` ASC) ,
  INDEX `fk_hotel_themes_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_hotel_themes_translations_hotel-themes`
    FOREIGN KEY (`hotel_themes_code`)
    REFERENCES `travyolo`.`hotel_themes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_types` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_categories` (
  `code` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_scopes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_scopes` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`facility_scopes_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_scopes_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `facility_scopes_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `facility_scopes_code`),
  INDEX `fk_facility_scope_translations_facility_themes_idx` (`facility_scopes_code` ASC) ,
  INDEX `fk_facility_scope_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_facility_scope_translations_hotel-types`
    FOREIGN KEY (`facility_scopes_code`)
    REFERENCES `travyolo`.`facility_scopes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`facilities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facilities` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  `facility_types_code` VARCHAR(25) NOT NULL,
  `facility_categories_code` VARCHAR(25) NULL,
  `facility_scopes_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_facilities_facility_types_idx` (`facility_types_code` ASC) ,
  INDEX `fk_facilities_facility_categories_idx` (`facility_categories_code` ASC) ,
  INDEX `fk_facilities_facility_scopes_idx` (`facility_scopes_code` ASC) ,
  CONSTRAINT `fk_facilities_facility_types`
    FOREIGN KEY (`facility_types_code`)
    REFERENCES `travyolo`.`facility_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_facilities_facility_categories`
    FOREIGN KEY (`facility_categories_code`)
    REFERENCES `travyolo`.`facility_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_facilities_facility_scopes`
    FOREIGN KEY (`facility_scopes_code`)
    REFERENCES `travyolo`.`facility_scopes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facilities_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facilities_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(75) NOT NULL,
  `updated_at` DATETIME NULL,
  `facilities_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `facilities_code`),
  INDEX `fk_facilities_translations_facilities_idx` (`facilities_code` ASC) ,
  INDEX `fk_facilities_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_facilities_translations_facilities`
    FOREIGN KEY (`facilities_code`)
    REFERENCES `travyolo`.`facilities` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_types_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_types_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(75) NOT NULL,
  `facility_types_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `facility_types_code`),
  INDEX `fk_facility_types_translations_facility_types_idx` (`facility_types_code` ASC) ,
  INDEX `fk_facility_types_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_facility_types_translations_facility_types`
    FOREIGN KEY (`facility_types_code`)
    REFERENCES `travyolo`.`facility_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_categories_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_categories_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(75) NOT NULL,
  `facility_categories_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `facility_categories_code`),
  INDEX `fk_facility-categories_translations_facility-categories_idx` (`facility_categories_code` ASC),
  INDEX `fk_facility-categories_translations_language_country_idx` (`language_country` ASC),
  CONSTRAINT `fk_facility-categories_translations_facility-categories`
    FOREIGN KEY (`facility_categories_code`)
    REFERENCES `travyolo`.`facility_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_themes` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  INDEX `code` (`code` ASC) ,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facility_themes_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facility_themes_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `facility_themes_code` VARCHAR(25) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`language_country`, `facility_themes_code`),
  INDEX `fk_facility_theme_translations_facility_themes_idx` (`facility_themes_code` ASC) ,
  INDEX `fk_facility_theme_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_facility_theme_translations_hotel-types`
    FOREIGN KEY (`facility_themes_code`)
    REFERENCES `travyolo`.`facility_themes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`continents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`continents` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`countries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`countries` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `continents_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_countries_continents_idx` (`continents_code` ASC) ,
  CONSTRAINT `fk_countries_continents`
    FOREIGN KEY (`continents_code`)
    REFERENCES `travyolo`.`continents` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`regions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`regions` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(255) NULL,
  `kind` VARCHAR(45) NOT NULL,
  `state_code` VARCHAR(45) NULL,
  `updated_at` DATETIME NULL,
  `countries_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_regions_countries_idx` (`countries_code` ASC) ,
  CONSTRAINT `fk_regions_countries`
    FOREIGN KEY (`countries_code`)
    REFERENCES `travyolo`.`countries` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`destinations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`destinations` (
  `code` VARCHAR(25) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `parent` VARCHAR(45) NULL,
  `countries_code` VARCHAR(25) NOT NULL,
  `latitude` FLOAT NOT NULL,
  `longitude` FLOAT NOT NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_destinations_countries_idx` (`countries_code` ASC) ,
  CONSTRAINT `fk_destinations_countries`
    FOREIGN KEY (`countries_code`)
    REFERENCES `travyolo`.`countries` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`destinations_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`destinations_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `destinations_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `destinations_code`),
  INDEX `fk_destinations_translations_destinations_idx` (`destinations_code` ASC) ,
  INDEX `fk_destinations_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_destinations_translations_destinations`
    FOREIGN KEY (`destinations_code`)
    REFERENCES `travyolo`.`destinations` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`regions_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`regions_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `regions_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `regions_code`),
  INDEX `fk_regions_translations_regions_idx` (`regions_code` ASC) ,
  INDEX `fk_regions_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_regions_translations_regions`
    FOREIGN KEY (`regions_code`)
    REFERENCES `travyolo`.`regions` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`countries_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`countries_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `updated_at` DATETIME NULL,
  `countries_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `countries_code`),
  INDEX `fk_countries_translations_countries_idx` (`countries_code` ASC) ,
  INDEX `fk_countries_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_countries_translations_countries`
    FOREIGN KEY (`countries_code`)
    REFERENCES `travyolo`.`countries` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`continents_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`continents_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL,
  `continents_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `continents_code`),
  INDEX `fk_continents_translations_continents_idx` (`continents_code` ASC) ,
  INDEX `fk_continents_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_continents_translations_continents`
    FOREIGN KEY (`continents_code`)
    REFERENCES `travyolo`.`continents` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotels` (
  `code` VARCHAR(25) NOT NULL,
  `master` VARCHAR(45) NULL,
  `name` VARCHAR(75) NOT NULL,
  `zipcode` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `latitude` FLOAT NULL,
  `longitude` FLOAT NULL,
  `stars` FLOAT NULL,
  `nr_rooms` INT NULL,
  `nr_restaurants` INT NULL,
  `nr_bars` INT NULL,
  `nr_halls` INT NULL,
  `yearbuilt` INT NULL,
  `checkin_from` VARCHAR(45) NULL,
  `checkout_to` VARCHAR(45) NULL,

  `checkout_from` VARCHAR(45) NULL,
  `checkin_to` VARCHAR(45) NULL,
  `gmt_offset` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `phone` VARCHAR(45) NULL,
  `currencycode` VARCHAR(25) NULL,
  `availability_score` FLOAT NULL,
  `hotel_score` FLOAT NULL,
  `book_score` FLOAT NULL,
  `room_amenity` TEXT(1000) NULL,

  `hotel_information` TEXT(1000) NULL,
  `hotel_introduction` TEXT(1000) NULL,
  `location_information` TEXT(1000) NULL,
  `attraction_information` TEXT(1000) NULL,
  `hotel_amenity` TEXT(1000) NULL,
  `updated_at` DATETIME NULL,
  `destinations_code` VARCHAR(25) NOT NULL,
  `hotel_types_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`code`),
  INDEX `fk_hotels_destinations_idx` (`destinations_code` ASC) ,
  INDEX `fk_hotels_hotel_types_idx` (`hotel_types_code` ASC) ,
  CONSTRAINT `fk_hotels_destinations`
    FOREIGN KEY (`destinations_code`)
    REFERENCES `travyolo`.`destinations` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_hotel_types`
    FOREIGN KEY (`hotel_types_code`)
    REFERENCES `travyolo`.`hotel_types` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`images` (
  `tag` VARCHAR(75) NULL,
  `original` VARCHAR(200) NOT NULL UNIQUE,
  `large` VARCHAR(200) NULL,
  `small` VARCHAR(200) NULL,
  `mid` VARCHAR(200) NULL,
  `updated_at` DATETIME NULL,
  `image_categories_code` VARCHAR(25) NOT NULL,
  `room_categories_code` VARCHAR(25) NULL,
  `hotels_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`hotels_code`,`original`),
  INDEX `fk_images_image_categories_idx` (`image_categories_code` ASC) ,
  INDEX `fk_images_hotels_idx` (`hotels_code` ASC) ,
  INDEX `fk_images_room_categories_idx` (`room_categories_code` ASC) ,
  INDEX `fk_images_original_idx` (`original` ASC) ,
  CONSTRAINT `fk_images_image_categories`
    FOREIGN KEY (`image_categories_code`)
    REFERENCES `travyolo`.`image_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_images_room_categories`
    FOREIGN KEY (`room_categories_code`)
    REFERENCES `travyolo`.`room_categories` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_images_hotels`
    FOREIGN KEY (`hotels_code`)
    REFERENCES `travyolo`.`hotels` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotels_translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotels_translations` (
  `language_country` VARCHAR(45) NOT NULL,
  `hotel_information` TEXT(1000) NULL,
  `hotel_introduction` TEXT(1000) NULL,
  `location_information` TEXT(1000) NULL,
  `attraction_information` TEXT(1000) NULL,
  `hotel_amenity` TEXT(1000) NULL,
  `updated_at` DATETIME NULL,
  `hotels_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`language_country`, `hotels_code`),
  INDEX `fk_hotels_translations_hotels_idx` (`hotels_code` ASC) ,
  INDEX `fk_hotels_translations_language_country_idx` (`language_country` ASC) ,
  CONSTRAINT `fk_hotels_translations_hotels`
    FOREIGN KEY (`hotels_code`)
    REFERENCES `travyolo`.`hotels` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`hotels_has_facilities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotels_has_facilities` (
  `hotels_code` VARCHAR(25) NOT NULL,
  `facilities_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`hotels_code`, `facilities_code`),
  INDEX `fk_hotels_has_facilities_facilities_idx` (`facilities_code` ASC) ,
  INDEX `fk_hotels_has_facilities_hotels_idx` (`hotels_code` ASC) ,
  CONSTRAINT `fk_hotels_has_facilities_hotels`
    FOREIGN KEY (`hotels_code`)
    REFERENCES `travyolo`.`hotels` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_has_facilities_facilities`
    FOREIGN KEY (`facilities_code`)
    REFERENCES `travyolo`.`facilities` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`hotels_has_chains`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotels_has_chains` (
  `hotels_code` VARCHAR(25) NOT NULL,
  `chains_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`hotels_code`, `chains_code`),
  INDEX `fk_hotels_has_chains_chains_idx` (`chains_code` ASC) ,
  INDEX `fk_hotels_has_chains_hotels_idx` (`hotels_code` ASC) ,
  CONSTRAINT `fk_hotels_has_chains_hotels`
    FOREIGN KEY (`hotels_code`)
    REFERENCES `travyolo`.`hotels` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_has_chains_chains`
    FOREIGN KEY (`chains_code`)
    REFERENCES `travyolo`.`chains` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`hotels_has_hotel_themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`hotels_has_hotel_themes` (
  `hotels_code` VARCHAR(25) NOT NULL,
  `hotel_themes_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`hotels_code`, `hotel_themes_code`),
  INDEX `fk_hotels_has_hotel_themes_hotel_themes_idx` (`hotel_themes_code` ASC) ,
  INDEX `fk_hotels_has_hotel_themes_hotels_idx` (`hotels_code` ASC) ,
  CONSTRAINT `fk_hotels_has_hotel_themes_hotels`
    FOREIGN KEY (`hotels_code`)
    REFERENCES `travyolo`.`hotels` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_hotels_has_hotel_themes_hotel_themes`
    FOREIGN KEY (`hotel_themes_code`)
    REFERENCES `travyolo`.`hotel_themes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `travyolo`.`facilities_has_facility_themes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`facilities_has_facility_themes` (
  `facilities_code` VARCHAR(25) NOT NULL,
  `facility_themes_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`facilities_code`, `facility_themes_code`),
  INDEX `fk_facilities_has_facility_themes_facility_themes_idx` (`facility_themes_code` ASC) ,
  INDEX `fk_facilities_has_facility_themes_facilities_idx` (`facilities_code` ASC) ,
  CONSTRAINT `fk_facilities_has_facility_themes_facilities`
    FOREIGN KEY (`facilities_code`)
    REFERENCES `travyolo`.`facilities` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_facilities_has_facility_themes_facility_themes`
    FOREIGN KEY (`facility_themes_code`)
    REFERENCES `travyolo`.`facility_themes` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `travyolo`.`destination_has_regions`
-- -----------------------------------------------------
CREATE TABLE `travyolo`.`destination_has_regions` (
  `destinations_code` VARCHAR(25) NOT NULL,
  `regions_code` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`destinations_code`, `regions_code`),
  INDEX `fk_destinations_has_regions_destinations_idx` (`destinations_code` ASC) ,
  INDEX `fk_destinations_has_regions_regions_idx` (`regions_code` ASC) ,
  CONSTRAINT `fk_destinations_has_regions_destinations`
    FOREIGN KEY (`destinations_code`)
    REFERENCES `travyolo`.`destinations` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_destinations_has_regions_regions`
    FOREIGN KEY (`regions_code`)
    REFERENCES `travyolo`.`regions` (`code`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


USE `travyolo` ;

-- -----------------------------------------------------
-- Placeholder table for view `travyolo`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `travyolo`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `travyolo`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `travyolo`.`view1`;
USE `travyolo`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
