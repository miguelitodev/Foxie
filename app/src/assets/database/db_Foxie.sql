-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Fev-2020 às 03:28
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_etec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbnivelacesso`
--

CREATE TABLE `tbNivelAcesso` (
  `idNivelAcesso` int(11) NOT NULL,
  `descNivelAcesso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbnivelacesso`
--

INSERT INTO `tbNivelAcesso` (`idNivelAcesso`, `descNivelAcesso`) VALUES
(1, 'Usuário'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbUsuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(255) NOT NULL,
  `senhaUsuario` varchar(16) NOT NULL,
  `idNivelAcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbUsuario` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `idNivelAcesso`) VALUES
(1, 'Gabriel Teodoro', 'gabriel@gmail.com', '123', 2),
(2, 'Miguel Riquelme', 'miguel@gmail.com', '123', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbnivelacesso`
--
ALTER TABLE `tbNivelAcesso`
  ADD PRIMARY KEY (`idNivelAcesso`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idNivelAcesso` (`idNivelAcesso`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbnivelacesso`
--
ALTER TABLE `tbNivelAcesso`
  MODIFY `idNivelAcesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  ADD CONSTRAINT `tbUsuario_ibfk_1` FOREIGN KEY (`idNivelAcesso`) REFERENCES `tbNivelAcesso` (`idNivelAcesso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
