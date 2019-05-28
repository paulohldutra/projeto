-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Maio-2019 às 15:04
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(4) NOT NULL,
  `nome_cliente` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `cpf` varchar(11) COLLATE utf8mb4_bin DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `nome_cliente`, `cpf`, `data_nasc`, `email`) VALUES
(1, 'JoÃ£o', '12345678', '2008-11-11', 'juaopaulo@gmail.com'),
(2, 'Paulo', '87654321', '1999-02-05', 'paulhldutra@gmail.com'),
(3, 'Matheus', '44444444', '2001-01-13', 'juaopaulo@terra.com.br'),
(4, 'JosÃ©', '55555555', '1997-03-11', 'paulo@uotlook.com'),
(5, 'Maria', '12312312', '2002-05-20', 'elen@senai.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(4) NOT NULL,
  `cod_produto` int(4) NOT NULL,
  `cod_cliente` int(4) NOT NULL,
  `data_pedido` date NOT NULL,
  `qntd` int(4) DEFAULT NULL,
  `situacao` varchar(10) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `cod_produto`, `cod_cliente`, `data_pedido`, `qntd`, `situacao`) VALUES
(1, 1, 1, '2019-05-23', 2, 'Em Aberto'),
(2, 2, 1, '2019-05-23', 1, 'Em Aberto'),
(3, 3, 3, '2019-05-23', 5, 'Pago'),
(4, 3, 3, '2019-05-23', 2, 'Cancelado'),
(5, 1, 1, '2019-05-23', 3, 'Cancelado'),
(6, 1, 5, '2019-05-23', 1, 'Em Aberto'),
(7, 1, 3, '2019-05-23', 6, 'Em Aberto'),
(8, 1, 4, '2019-05-23', 2, 'Em Aberto'),
(9, 2, 5, '2019-05-23', 3, 'Cancelado'),
(10, 5, 1, '2019-05-23', 1, 'Em Aberto'),
(11, 1, 1, '2019-05-23', 2, 'Pago'),
(12, 2, 3, '2019-05-27', 12, 'Em Aberto'),
(13, 3, 3, '2019-05-03', 1, 'Em Aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod_produto` int(4) NOT NULL,
  `nome_produto` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `cod_barra` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `preco` double(6,2) DEFAULT NULL,
  `descricao` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome_produto`, `cod_barra`, `preco`, `descricao`) VALUES
(1, 'Cadeira', '70589A', 57.00, 'Cadeira de madeira'),
(2, 'Amofada', '40028A', 42.50, 'Amofada de algodão'),
(3, 'Caneca', '70598a', 13.75, 'Caneca de Cerâmica'),
(5, 'Mesa de rascunho', '7798FC', 300.00, 'Escrivaninha'),
(6, 'Lapis', '123456a', 1.42, 'Lapis Grafiti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_produto` (`cod_produto`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `cod_produto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
