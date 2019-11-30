-- -----------------------------------------------------
-- Schema u_instagram
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u_instagram` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `u_instagram` ;

-- -----------------------------------------------------
-- Table `u_instagram`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u_instagram`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(20) NULL,
  `name` VARCHAR(100) NULL,
  `surname` VARCHAR(200) NULL,
  `nick` VARCHAR(100) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `image` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `remember_token` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u_instagram`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u_instagram`.`images` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `image_path` VARCHAR(255) NULL,
  `description` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_images_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_images_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `u_instagram`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u_instagram`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u_instagram`.`comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `image_id` INT NOT NULL,
  `content` TEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comments_users1_idx` (`user_id` ASC),
  INDEX `fk_comments_images1_idx` (`image_id` ASC),
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `u_instagram`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_images1`
    FOREIGN KEY (`image_id`)
    REFERENCES `u_instagram`.`images` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u_instagram`.`likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u_instagram`.`likes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `image_id` INT NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_likes_users1_idx` (`user_id` ASC),
  INDEX `fk_likes_images1_idx` (`image_id` ASC),
  CONSTRAINT `fk_likes_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `u_instagram`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_likes_images1`
    FOREIGN KEY (`image_id`)
    REFERENCES `u_instagram`.`images` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;