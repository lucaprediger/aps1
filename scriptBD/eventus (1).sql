CREATE DATABASE  IF NOT EXISTS `eventus` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `eventus`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: eventus
-- ------------------------------------------------------
-- Server version	5.6.26-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `atividades`
--

DROP TABLE IF EXISTS `atividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades` (
  `atiId` int(11) NOT NULL,
  `atiInicio` datetime NOT NULL,
  `atiFim` datetime NOT NULL,
  `atiTema` varchar(150) NOT NULL,
  `atiNome` varchar(45) NOT NULL,
  `atiEveEveId` int(11) NOT NULL,
  PRIMARY KEY (`atiId`),
  KEY `fk_atividades_eventos1_idx` (`atiEveEveId`),
  CONSTRAINT `fk_atividades_eventos1` FOREIGN KEY (`atiEveEveId`) REFERENCES `eventos` (`EveID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `atividades_has_usuarios`
--

DROP TABLE IF EXISTS `atividades_has_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atividades_has_usuarios` (
  `atividades_id` int(11) NOT NULL,
  `usuarios_usuId` bigint(11) NOT NULL,
  PRIMARY KEY (`atividades_id`,`usuarios_usuId`),
  KEY `fk_atividades_has_usuarios_usuarios1_idx` (`usuarios_usuId`),
  KEY `fk_atividades_has_usuarios_atividades1_idx` (`atividades_id`),
  CONSTRAINT `fk_atividades_has_usuarios_atividades1` FOREIGN KEY (`atividades_id`) REFERENCES `atividades` (`atiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividades_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_usuId`) REFERENCES `usuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `EveID` int(11) NOT NULL AUTO_INCREMENT,
  `EveNome` varchar(45) NOT NULL,
  `EveDataIni` date NOT NULL,
  `EveDataFim` date NOT NULL,
  `eveLocal` varchar(45) NOT NULL,
  `eveCampus` varchar(45) NOT NULL,
  `email` varchar(200) NOT NULL,
  `eventoscol` varchar(45) NOT NULL,
  PRIMARY KEY (`EveID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `minicursos`
--

DROP TABLE IF EXISTS `minicursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minicursos` (
  `atividades_id` int(11) NOT NULL,
  KEY `fk_minicursos_atividades1_idx` (`atividades_id`),
  CONSTRAINT `fk_minicursos_atividades1` FOREIGN KEY (`atividades_id`) REFERENCES `atividades` (`atiId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ministrantes`
--

DROP TABLE IF EXISTS `ministrantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ministrantes` (
  `MinID` int(11) NOT NULL AUTO_INCREMENT,
  `MinNome` varchar(75) NOT NULL,
  `MinInstituicao` varchar(75) NOT NULL,
  `MinCelular` varchar(11) DEFAULT NULL,
  `MinEmail` varchar(100) NOT NULL,
  `MinCusto` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`MinID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `palestras`
--

DROP TABLE IF EXISTS `palestras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `palestras` (
  `palPalId` int(11) NOT NULL,
  `atividades_id` int(11) NOT NULL,
  PRIMARY KEY (`palPalId`),
  KEY `fk_palestras_atividades1_idx` (`atividades_id`),
  CONSTRAINT `fk_palestras_atividades1` FOREIGN KEY (`atividades_id`) REFERENCES `atividades` (`atiId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissoes` (
  `perId` bigint(11) NOT NULL AUTO_INCREMENT,
  `perDescricao` varchar(100) NOT NULL,
  PRIMARY KEY (`perId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `pesId` bigint(11) NOT NULL AUTO_INCREMENT,
  `pesNome` varchar(100) NOT NULL,
  `pesIdentificacao` varchar(30) DEFAULT NULL,
  `pesCPF` varchar(11) NOT NULL,
  `pesDtNasc` date NOT NULL,
  `pesEmail` varchar(200) NOT NULL,
  `pesRG` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`pesId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `recursos`
--

DROP TABLE IF EXISTS `recursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recursos` (
  `RecId` int(11) NOT NULL AUTO_INCREMENT,
  `RecDescricao` varchar(75) NOT NULL,
  `RecCusto` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`RecId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `tusId` bigint(11) NOT NULL,
  `tusDescrição` varchar(45) DEFAULT NULL,
  `tusUsuId` bigint(11) NOT NULL,
  `TipoUsuariocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tusId`),
  KEY `fk_TipoUsuario_usuarios1_idx` (`tusUsuId`),
  CONSTRAINT `fk_TipoUsuario_usuarios1` FOREIGN KEY (`tusUsuId`) REFERENCES `usuarios` (`usuId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuId` bigint(11) NOT NULL AUTO_INCREMENT,
  `usuUsername` varchar(15) NOT NULL,
  `usuSenha` varchar(15) NOT NULL,
  `usuNivel` int(11) NOT NULL,
  `usuPesId` bigint(11) NOT NULL,
  `usuHash` varchar(32) NOT NULL,
  `usuAtivo` int(1) NOT NULL DEFAULT '0',
  `usuTipo` int(1) NOT NULL,
  PRIMARY KEY (`usuId`),
  KEY `fk_usuarios_pessoas1_idx` (`usuPesId`),
  CONSTRAINT `fk_usuarios_pessoas1` FOREIGN KEY (`usuPesId`) REFERENCES `pessoas` (`pesId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-06 10:32:50
    