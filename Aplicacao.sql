-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Dez-2020 às 19:09
-- Versão do servidor: 8.0.22-0ubuntu0.20.04.3
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Aplicacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cadastro_topico`
--

CREATE TABLE `Cadastro_topico` (
  `id_topico` int NOT NULL,
  `ano` int NOT NULL,
  `posicao` int NOT NULL,
  `vulnerabilidade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Cadastro_topico`
--

INSERT INTO `Cadastro_topico` (`id_topico`, `ano`, `posicao`, `vulnerabilidade`) VALUES
(1, 2020, 1, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cadastro_usuario`
--

CREATE TABLE `Cadastro_usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `id_usuario_fk` int DEFAULT NULL,
  `id_topico_fk` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Cadastro_usuario`
--

INSERT INTO `Cadastro_usuario` (`id_usuario`, `nome`, `usuario`, `senha`, `id_usuario_fk`, `id_topico_fk`) VALUES
(1, 'mari', 'mari', 'mari', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Cadastro_topico`
--
ALTER TABLE `Cadastro_topico`
  ADD PRIMARY KEY (`id_topico`);

--
-- Índices para tabela `Cadastro_usuario`
--
ALTER TABLE `Cadastro_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario_idx` (`id_usuario_fk`),
  ADD KEY `id_topico_fk` (`id_topico_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Cadastro_topico`
--
ALTER TABLE `Cadastro_topico`
  MODIFY `id_topico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `Cadastro_usuario`
--
ALTER TABLE `Cadastro_usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Cadastro_usuario`
--
ALTER TABLE `Cadastro_usuario`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario_fk`) REFERENCES `Cadastro_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
