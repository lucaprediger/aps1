-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema eventus
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eventus
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eventus` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_db
-- -----------------------------------------------------
USE `eventus` ;

-- -----------------------------------------------------
-- Table `eventus`.`eventos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`eventos` ;

CREATE TABLE IF NOT EXISTS `eventus`.`eventos` (
  `EveID` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `EveNome` VARCHAR(45) NOT NULL COMMENT '',
  `EveDataIni` DATE NOT NULL COMMENT '',
  `EveDataFim` DATE NOT NULL COMMENT '',
  `eveLocal` VARCHAR(45) NOT NULL COMMENT '',
  `eveCampus` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(200) NOT NULL COMMENT '',
  `eventoscol` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`EveID`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`atividades` ;

CREATE TABLE IF NOT EXISTS `eventus`.`atividades` (
  `atiId` INT(11) NOT NULL COMMENT '',
  `atiInicio` DATETIME NOT NULL COMMENT '',
  `atiFim` DATETIME NOT NULL COMMENT '',
  `atiTema` VARCHAR(150) NOT NULL COMMENT '',
  `atiNome` VARCHAR(45) NOT NULL COMMENT '',
  `atiEveEveId` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`atiId`)  COMMENT '',
  INDEX `fk_atividades_eventos1_idx` (`atiEveEveId` ASC)  COMMENT '',
  CONSTRAINT `fk_atividades_eventos1`
    FOREIGN KEY (`atiEveEveId`)
    REFERENCES `eventus`.`eventos` (`EveID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`ministrantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`ministrantes` ;

CREATE TABLE IF NOT EXISTS `eventus`.`ministrantes` (
  `MinID` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `MinNome` VARCHAR(75) NOT NULL COMMENT '',
  `MinInstituicao` VARCHAR(75) NOT NULL COMMENT '',
  `MinCelular` VARCHAR(11) NULL DEFAULT NULL COMMENT '',
  `MinEmail` VARCHAR(100) NOT NULL COMMENT '',
  `MinCusto` DECIMAL(12,2) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`MinID`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `eventus`.`pessoas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`pessoas` ;

CREATE TABLE IF NOT EXISTS `eventus`.`pessoas` (
  `pesId` BIGINT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `pesNome` VARCHAR(100) NOT NULL COMMENT '',
  `pesTipo` INT(11) NOT NULL COMMENT '',
  `pesIdentificacao` VARCHAR(30) NULL DEFAULT NULL COMMENT '',
  `pesCPF` VARCHAR(11) NOT NULL COMMENT '',
  `pesDtNasc` DATE NOT NULL COMMENT '',
  `pesEmail` VARCHAR(200) NOT NULL COMMENT '',
  `pesRG` VARCHAR(15) NOT NULL COMMENT '',
  `pessoascol` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`pesId`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 50
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`recursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`recursos` ;

CREATE TABLE IF NOT EXISTS `eventus`.`recursos` (
  `RecId` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `RecDescricao` VARCHAR(75) NOT NULL COMMENT '',
  `RecCusto` DECIMAL(5,2) NULL DEFAULT '0.00' COMMENT '',
  PRIMARY KEY (`RecId`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8
COMMENT = '	';


-- -----------------------------------------------------
-- Table `eventus`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `eventus`.`usuarios` (
  `usuId` BIGINT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `usuUsername` VARCHAR(15) NOT NULL COMMENT '',
  `usuSenha` VARCHAR(15) NOT NULL COMMENT '',
  `usuNivel` INT(11) NOT NULL COMMENT '',
  `usuPessoa` INT(11) NOT NULL COMMENT '',
  `email` VARCHAR(200) NOT NULL COMMENT '',
  `usuPesId` BIGINT(11) NOT NULL COMMENT '',
  `usuHash` VARCHAR(32) NOT NULL COMMENT '',
  `usuAtivo` INT(1) NOT NULL DEFAULT 0 COMMENT '',
  PRIMARY KEY (`usuId`)  COMMENT '',
  INDEX `fk_usuarios_pessoas1_idx` (`usuPesId` ASC)  COMMENT '',
  CONSTRAINT `fk_usuarios_pessoas1`
    FOREIGN KEY (`usuPesId`)
    REFERENCES `eventus`.`pessoas` (`pesId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eventus`.`TipoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`TipoUsuario` ;

CREATE TABLE IF NOT EXISTS `eventus`.`TipoUsuario` (
  `tusId` BIGINT(11) NOT NULL COMMENT '',
  `tusDescrição` VARCHAR(45) NULL COMMENT '',
  `tusUsuId` BIGINT(11) NOT NULL COMMENT '',
  `TipoUsuariocol` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`tusId`)  COMMENT '',
  INDEX `fk_TipoUsuario_usuarios1_idx` (`tusUsuId` ASC)  COMMENT '',
  CONSTRAINT `fk_TipoUsuario_usuarios1`
    FOREIGN KEY (`tusUsuId`)
    REFERENCES `eventus`.`usuarios` (`usuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventus`.`permissoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`permissoes` ;

CREATE TABLE IF NOT EXISTS `eventus`.`permissoes` (
  `perId` BIGINT(11) NOT NULL COMMENT '',
  `perPermissao` VARCHAR(45) NULL COMMENT '',
  `perTiuTusId` BIGINT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`perId`)  COMMENT '',
  INDEX `fk_permissoes_TipoUsuario1_idx` (`perTiuTusId` ASC)  COMMENT '',
  CONSTRAINT `fk_permissoes_TipoUsuario1`
    FOREIGN KEY (`perTiuTusId`)
    REFERENCES `eventus`.`TipoUsuario` (`tusId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventus`.`palestras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`palestras` ;

CREATE TABLE IF NOT EXISTS `eventus`.`palestras` (
  `palPalId` INT NOT NULL COMMENT '',
  `atividades_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`palPalId`)  COMMENT '',
  INDEX `fk_palestras_atividades1_idx` (`atividades_id` ASC)  COMMENT '',
  CONSTRAINT `fk_palestras_atividades1`
    FOREIGN KEY (`atividades_id`)
    REFERENCES `eventus`.`atividades` (`atiId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventus`.`minicursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`minicursos` ;

CREATE TABLE IF NOT EXISTS `eventus`.`minicursos` (
  `atividades_id` INT(11) NOT NULL COMMENT '',
  INDEX `fk_minicursos_atividades1_idx` (`atividades_id` ASC)  COMMENT '',
  CONSTRAINT `fk_minicursos_atividades1`
    FOREIGN KEY (`atividades_id`)
    REFERENCES `eventus`.`atividades` (`atiId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eventus`.`atividades_has_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `eventus`.`atividades_has_usuarios` ;

CREATE TABLE IF NOT EXISTS `eventus`.`atividades_has_usuarios` (
  `atividades_id` INT(11) NOT NULL COMMENT '',
  `usuarios_usuId` BIGINT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`atividades_id`, `usuarios_usuId`)  COMMENT '',
  INDEX `fk_atividades_has_usuarios_usuarios1_idx` (`usuarios_usuId` ASC)  COMMENT '',
  INDEX `fk_atividades_has_usuarios_atividades1_idx` (`atividades_id` ASC)  COMMENT '',
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
