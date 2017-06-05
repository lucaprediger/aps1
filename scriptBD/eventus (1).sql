-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eventus
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eventus
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eventus` DEFAULT CHARACTER SET utf8 ;
USE `eventus` ;

-- -----------------------------------------------------
-- Table `eventus`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`eventos` (
  `EveID` INT(11) NOT NULL AUTO_INCREMENT,
  `EveNome` VARCHAR(45) NOT NULL,
  `EveDataIni` DATE NOT NULL,
  `EveDataFim` DATE NOT NULL,
  `eveLocal` VARCHAR(45) NOT NULL,
  `eveCampus` VARCHAR(45) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `eventoscol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`EveID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`atividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`atividades` (
  `atiId` INT(11) NOT NULL,
  `atiInicio` DATETIME NOT NULL,
  `atiFim` DATETIME NOT NULL,
  `atiTema` VARCHAR(150) NOT NULL,
  `atiNome` VARCHAR(45) NOT NULL,
  `atiEveEveId` INT(11) NOT NULL,
  PRIMARY KEY (`atiId`),
  INDEX `fk_atividades_eventos1_idx` (`atiEveEveId` ASC),
  CONSTRAINT `fk_atividades_eventos1`
    FOREIGN KEY (`atiEveEveId`)
    REFERENCES `eventus`.`eventos` (`EveID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`pessoas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`pessoas` (
  `pesId` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `pesNome` VARCHAR(100) NOT NULL,
  `pesIdentificacao` VARCHAR(30) NULL DEFAULT NULL,
  `pesCPF` VARCHAR(11) NOT NULL,
  `pesDtNasc` DATE NOT NULL,
  `pesEmail` VARCHAR(200) NOT NULL,
  `pesRG` VARCHAR(15) NULL DEFAULT NULL,
  PRIMARY KEY (`pesId`))
ENGINE = InnoDB
AUTO_INCREMENT = 127
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`usuarios` (
  `usuId` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `usuUsername` VARCHAR(15) NOT NULL,
  `usuSenha` VARCHAR(15) NOT NULL,
  `usuNivel` INT(11) NOT NULL,
  `usuPesId` BIGINT(11) NOT NULL,
  `usuHash` VARCHAR(32) NOT NULL,
  `usuAtivo` INT(1) NOT NULL DEFAULT '0',
  `usuTipo` INT(1) NOT NULL,
  PRIMARY KEY (`usuId`),
  INDEX `fk_usuarios_pessoas1_idx` (`usuPesId` ASC),
  CONSTRAINT `fk_usuarios_pessoas1`
    FOREIGN KEY (`usuPesId`)
    REFERENCES `eventus`.`pessoas` (`pesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 85
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`atividades_has_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`atividades_has_usuarios` (
  `atividades_id` INT(11) NOT NULL,
  `usuarios_usuId` BIGINT(11) NOT NULL,
  PRIMARY KEY (`atividades_id`, `usuarios_usuId`),
  INDEX `fk_atividades_has_usuarios_usuarios1_idx` (`usuarios_usuId` ASC),
  INDEX `fk_atividades_has_usuarios_atividades1_idx` (`atividades_id` ASC),
  CONSTRAINT `fk_atividades_has_usuarios_atividades1`
    FOREIGN KEY (`atividades_id`)
    REFERENCES `eventus`.`atividades` (`atiId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividades_has_usuarios_usuarios1`
    FOREIGN KEY (`usuarios_usuId`)
    REFERENCES `eventus`.`usuarios` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`minicursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`minicursos` (
  `atividades_id` INT(11) NOT NULL,
  INDEX `fk_minicursos_atividades1_idx` (`atividades_id` ASC),
  CONSTRAINT `fk_minicursos_atividades1`
    FOREIGN KEY (`atividades_id`)
    REFERENCES `eventus`.`atividades` (`atiId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`ministrantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`ministrantes` (
  `MinID` INT(11) NOT NULL AUTO_INCREMENT,
  `MinNome` VARCHAR(75) NOT NULL,
  `MinInstituicao` VARCHAR(75) NOT NULL,
  `MinCelular` VARCHAR(11) NULL DEFAULT NULL,
  `MinEmail` VARCHAR(100) NOT NULL,
  `MinCusto` DECIMAL(12,2) NULL DEFAULT NULL,
  PRIMARY KEY (`MinID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`palestras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`palestras` (
  `palPalId` INT(11) NOT NULL,
  `atividades_id` INT(11) NOT NULL,
  PRIMARY KEY (`palPalId`),
  INDEX `fk_palestras_atividades1_idx` (`atividades_id` ASC),
  CONSTRAINT `fk_palestras_atividades1`
    FOREIGN KEY (`atividades_id`)
    REFERENCES `eventus`.`atividades` (`atiId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`permissoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`permissoes` (
  `perId` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `perDescricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`perId`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`permissoesUsuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`permissoesUsuarios` (
  `pusID` INT(11) NOT NULL AUTO_INCREMENT,
  `pusUsuId` BIGINT(11) NOT NULL,
  `pusPerId` BIGINT(11) NOT NULL,
  `pusLeitura` SMALLINT(1) NOT NULL DEFAULT '0',
  `pusGravacao` SMALLINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pusID`),
  INDEX `fk_permissoesUsuarios_2_idx` (`pusUsuId` ASC),
  INDEX `fk_permissoesUsuarios_1_idx` (`pusPerId` ASC),
  CONSTRAINT `fk_permissoesUsuarios_1`
    FOREIGN KEY (`pusPerId`)
    REFERENCES `eventus`.`permissoes` (`perId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissoesUsuarios_2`
    FOREIGN KEY (`pusUsuId`)
    REFERENCES `eventus`.`usuarios` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`recursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`recursos` (
  `RecId` INT(11) NOT NULL AUTO_INCREMENT,
  `RecDescricao` VARCHAR(75) NOT NULL,
  `RecCusto` DECIMAL(5,2) NULL DEFAULT '0.00',
  PRIMARY KEY (`RecId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = '	';


-- -----------------------------------------------------
-- Table `eventus`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eventus`.`tipousuario` (
  `tusId` BIGINT(11) NOT NULL,
  `tusDescrição` VARCHAR(45) NULL DEFAULT NULL,
  `tusUsuId` BIGINT(11) NOT NULL,
  `TipoUsuariocol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`tusId`),
  INDEX `fk_TipoUsuario_usuarios1_idx` (`tusUsuId` ASC),
  CONSTRAINT `fk_TipoUsuario_usuarios1`
    FOREIGN KEY (`tusUsuId`)
    REFERENCES `eventus`.`usuarios` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
