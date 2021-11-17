-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2021 às 20:00
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblyos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(4) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `cadastrador` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `nome`, `autor`, `data_cadastro`, `cadastrador`) VALUES
(40, 'O Velho e o Mar.', 'Ernest Hemingway', '2021-11-17', 'antonio@linave.com.br'),
(41, 'Esperando Godot', 'Samuel Beckett', '2021-11-17', 'admin@admin.com'),
(43, 'Laranja Mecânica', 'Anthony Burgess', '2021-11-17', 'admin@admin.com'),
(44, 'O Processo', 'Franz Kafka', '2021-11-17', 'admin@admin.com'),
(46, 'Eurico, o Presbítero', 'Alexandre Herculano', '2021-11-17', 'antonio@linave.com.br'),
(47, 'Os Sertões', 'Euclides da Cunha', '2021-11-17', 'admin@admin.com'),
(49, 'Olhai os Lírios do campo', 'Érico Verissimo', '2021-10-15', 'marvinrs@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(4) NOT NULL,
  `nome` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(3, 'admin', 'admin@admin.com', '1233', 'admin'),
(4, 'antonio', 'antonio@linave.com.br', '123', 'cliente'),
(5, 'marvin', 'marvinrs@gmail.com', '123', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
