SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `yildizi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `yildizi` ;

-- -----------------------------------------------------
-- Table `yildizi`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(127) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `idioma` VARCHAR(45) NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(250) NOT NULL,
  `estadoEliminado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yildizi`.`idioma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`idioma` (
  `id_idioma` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_idioma`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yildizi`.`clasificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`clasificacion` (
  `id_clasificacion` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_clasificacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yildizi`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`perfil` (
  `id_perfil` INT NOT NULL,
  `NombrePerfil` VARCHAR(45) NOT NULL,
  `foto` VARCHAR(45) NULL,
  `idioma_id_idioma` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `clasificacion_id_clasificacion` INT NOT NULL,
  PRIMARY KEY (`id_perfil`),
  INDEX `fk_perfil_idioma1_idx` (`idioma_id_idioma` ASC),
  INDEX `fk_perfil_usuario1_idx` (`usuario_id_usuario` ASC),
  INDEX `fk_perfil_clasificacion1_idx` (`clasificacion_id_clasificacion` ASC),
  CONSTRAINT `fk_perfil_idioma1`
    FOREIGN KEY (`idioma_id_idioma`)
    REFERENCES `yildizi`.`idioma` (`id_idioma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `yildizi`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_clasificacion1`
    FOREIGN KEY (`clasificacion_id_clasificacion`)
    REFERENCES `yildizi`.`clasificacion` (`id_clasificacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yildizi`.`contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`contenido` (
  `categoria` INT NOT NULL,
  `nombre` VARCHAR(127) NOT NULL,
  `año` INT NOT NULL,
  `url` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yildizi`.`perfil_has_contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yildizi`.`perfil_has_contenido` (
  `perfil_id_perfil` INT NOT NULL,
  `contenido_categoria` INT NOT NULL,
  PRIMARY KEY (`perfil_id_perfil`, `contenido_categoria`),
  INDEX `fk_perfil_has_contenido_contenido1_idx` (`contenido_categoria` ASC),
  INDEX `fk_perfil_has_contenido_perfil1_idx` (`perfil_id_perfil` ASC),
  CONSTRAINT `fk_perfil_has_contenido_perfil1`
    FOREIGN KEY (`perfil_id_perfil`)
    REFERENCES `yildizi`.`perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_contenido_contenido1`
    FOREIGN KEY (`contenido_categoria`)
    REFERENCES `yildizi`.`contenido` (`categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `yildizi`.`idioma`
-- -----------------------------------------------------
START TRANSACTION;
USE `yildizi`;
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (1, 'Inglés');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (2, 'Chino');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (3, 'Español');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (4, 'Árabe');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (5, 'Portugués');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (6, 'Francés');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (7, 'Japonés');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (8, 'Ruso');
INSERT INTO `yildizi`.`idioma` (`id_idioma`, `nombre`) VALUES (9, 'Alemán');

COMMIT;


-- -----------------------------------------------------
-- Data for table `yildizi`.`clasificacion`
-- -----------------------------------------------------
START TRANSACTION;
USE `yildizi`;
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (1, 'AA');
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (2, 'A');
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (3, 'B');
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (4, 'B15');
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (5, 'C');
INSERT INTO `yildizi`.`clasificacion` (`id_clasificacion`, `nombre`) VALUES (6, 'D');

COMMIT;

