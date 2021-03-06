-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16-Jan-2021 às 16:08
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
(58, 2017, 1, 'SQL Injection'),
(59, 2017, 7, 'XSS'),
(60, 2013, 8, 'CSRF'),
(61, 2010, 1, 'Command Execution');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cadastro_usuario`
--

CREATE TABLE `Cadastro_usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `senha` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Cadastro_usuario`
--

INSERT INTO `Cadastro_usuario` (`id_usuario`, `nome`, `usuario`, `senha`) VALUES
(45, 'Administrador', 'Admin', '751cb3f4aa17c36186f4856c8982bf27');

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
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Cadastro_topico`
--
ALTER TABLE `Cadastro_topico`
  MODIFY `id_topico` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `Cadastro_usuario`
--
ALTER TABLE `Cadastro_usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
