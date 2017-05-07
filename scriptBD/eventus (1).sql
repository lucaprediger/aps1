-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Maio-2017 às 02:23
-- Versão do servidor: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `EveID` int(11) NOT NULL,
  `EveNome` varchar(45) NOT NULL,
  `EveDataIni` date NOT NULL,
  `EveDataFim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`EveID`, `EveNome`, `EveDataIni`, `EveDataFim`) VALUES
(7, 'SETAC 2015', '2015-11-23', '2015-11-26'),
(8, 'SABIO 2014', '2014-09-09', '2014-10-23'),
(10, 'SETAC', '2015-11-19', '2015-11-23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `resource` varchar(30) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `start`, `end`, `resource`, `name`) VALUES
(14, '2017-06-05 09:00:00', '2017-06-05 12:00:00', NULL, 'palestra joao'),
(15, '2017-06-05 11:30:00', '2017-06-05 13:00:00', NULL, 'arduino'),
(16, '2017-04-18 12:00:00', '2017-04-18 14:30:00', NULL, 'Event'),
(17, '2017-04-19 10:00:00', '2017-04-19 11:30:00', NULL, 'Event'),
(18, '2017-04-17 09:30:00', '2017-04-17 11:00:00', NULL, 'cafe'),
(19, '2017-04-19 14:00:00', '2017-04-19 16:30:00', NULL, 'Event'),
(20, '2017-04-17 12:00:00', '2017-04-17 12:30:00', NULL, 'Event'),
(21, '2017-04-26 09:30:00', '2017-04-26 11:00:00', NULL, 'Event');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ministrantes`
--

CREATE TABLE `ministrantes` (
  `MinID` int(11) NOT NULL,
  `MinNome` varchar(75) NOT NULL,
  `MinInstituicao` varchar(75) NOT NULL,
  `MinCelular` varchar(11) DEFAULT NULL,
  `MinEmail` varchar(100) NOT NULL,
  `MinCusto` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ministrantes`
--

INSERT INTO `ministrantes` (`MinID`, `MinNome`, `MinInstituicao`, `MinCelular`, `MinEmail`, `MinCusto`) VALUES
(1, 'João de Souza', 'UTFPR', '4388194012', 'jsouza@utfpr.edu.br', '400.00'),
(2, 'Carmem Almeida', 'UFPB', '8298124512', 'cmsalmeida@ufpb.edu.br', '1400.22'),
(3, 'Rita Pereira', 'UFRS', '519443312', 'rmaleida@ufrs.edu.br', '700.22'),
(4, 'Almir Andrade', 'UNIOESTE', '4587432312', 'aandrade@unioeste.edu.br', '800.22'),
(5, 'Josélia Ribas', 'UTFPR', '4499887766', 'josribas@utfpr.edu.br', '389.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoesUsuario`
--

CREATE TABLE `permissoesUsuario` (
  `pusId` int(11) NOT NULL,
  `pusPagina` varchar(45) NOT NULL,
  `pusUsuId` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissoesUsuario`
--

INSERT INTO `permissoesUsuario` (`pusId`, `pusPagina`, `pusUsuId`) VALUES
(1, 'CadastrarUsuario', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `pesId` bigint(11) NOT NULL,
  `pesNome` varchar(100) NOT NULL,
  `pesTipo` int(11) NOT NULL,
  `pesIdentificacao` varchar(30) DEFAULT NULL,
  `pesCPF` varchar(11) NOT NULL,
  `pesDtNasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`pesId`, `pesNome`, `pesTipo`, `pesIdentificacao`, `pesCPF`, `pesDtNasc`) VALUES
(47, 'marcio', 1, '', '0', NULL),
(48, 'luca', 1, '', '0', NULL),
(49, '', 1, '', '0', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recursos`
--

CREATE TABLE `recursos` (
  `RecId` int(11) NOT NULL,
  `RecDescricao` varchar(75) NOT NULL,
  `RecCusto` decimal(5,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Extraindo dados da tabela `recursos`
--

INSERT INTO `recursos` (`RecId`, `RecDescricao`, `RecCusto`) VALUES
(1, 'Pincel marcador', '3.23'),
(2, 'Agua mineral 600ml', '1.92'),
(3, 'Caneta azul', '0.70'),
(4, 'Bloco de anotação', '0.79'),
(5, 'Caneta amarela', '0.95'),
(6, 'Caneta azul', '0.95'),
(7, 'Caneta verde', '0.70'),
(10, 'bastão', '90.87');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuId` bigint(11) NOT NULL,
  `usuUsername` varchar(15) NOT NULL,
  `usuSenha` varchar(15) NOT NULL,
  `usuNivel` int(11) NOT NULL,
  `usuPessoa` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuId`, `usuUsername`, `usuSenha`, `usuNivel`, `usuPessoa`, `email`) VALUES
(1, 'marcio', '1234', 1, 1, 'marcioaraujo@gmail.com'),
(2, 'luca', '1234', 1, 2, 'luca@gmail.com'),
(3, '4', '4', 0, 45, '444'),
(4, 'pereira', '2222', 0, 46, 'pereira@bol.com.br'),
(5, 'marcio', '1234', 0, 47, 'marcio@marcio.com'),
(6, 'luca', '1111', 0, 48, 'luca@luca'),
(7, 'Confirmar', '', 0, 49, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`EveID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministrantes`
--
ALTER TABLE `ministrantes`
  ADD PRIMARY KEY (`MinID`);

--
-- Indexes for table `permissoesUsuario`
--
ALTER TABLE `permissoesUsuario`
  ADD PRIMARY KEY (`pusId`),
  ADD KEY `fk_permissoesUsuario_1_idx` (`pusUsuId`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`pesId`);

--
-- Indexes for table `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`RecId`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `EveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ministrantes`
--
ALTER TABLE `ministrantes`
  MODIFY `MinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permissoesUsuario`
--
ALTER TABLE `permissoesUsuario`
  MODIFY `pusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `pesId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `recursos`
--
ALTER TABLE `recursos`
  MODIFY `RecId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `permissoesUsuario`
--
ALTER TABLE `permissoesUsuario`
  ADD CONSTRAINT `fk_permissoesUsuario_1` FOREIGN KEY (`pusUsuId`) REFERENCES `usuarios` (`usuId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
