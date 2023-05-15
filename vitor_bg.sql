-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2023 às 22:40
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vitor_bg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaproduto`
--

CREATE TABLE `categoriaproduto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoriaproduto`
--

INSERT INTO `categoriaproduto` (`id`, `nome`) VALUES
(1, 'Perecíveis'),
(2, 'Comida'),
(3, 'Bebida'),
(4, 'Doces'),
(5, 'Eletrônicos'),
(6, 'Limpeza'),
(7, 'Descartáveis'),
(8, 'Roupa'),
(9, 'Festa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpfcnpj` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(5) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpfcnpj`, `email`, `telefone`, `endereco`, `numero`, `cidade`, `status`, `id_estado`) VALUES
(1, 'João Silva', '111.111.111-11', 'JS@gmail.com', '44 999999999', 'Rua dos Anjos', 123, 'Umuarama', 'n', 2),
(3, 'Victor Jardim', '111.111.111-12', 'VictorAheh@gmail.com', '44 999999998', 'Rua das Flores', 123, 'Umuarama', '0', NULL),
(4, 'Vítor Barbosa Garla', '111.111.111-13', 'vitor-b-garla@hotmail.com', '44 999999997', 'Rua Oliveira', 123, 'Umuarama', '0', NULL),
(5, 'Carlos da Cunha', '111.111.111-14', 'CarlosCunha1996@gmail.com', '44 999999996', 'Rua Santa Tereza', 123, 'Umuarama', '0', NULL),
(6, 'Pedro Campos', '111.111.111-15', 'PedroC@gmail.com', '44 999999995', 'Rua Global', 123, 'Umuarama', '0', NULL),
(7, 'Marcos Santos', '111.111.111-16', 'MarcosSantos@gmail.com', '44 999999995', 'Rua da Liberdade, Zona 8', 123, 'Umuarama', '0', NULL),
(8, 'João Pedro Gomes', '111.111.111-17', 'JPGomes@gmail.com', '44 999999994', 'Avenida Olinda', 123, 'Umuarama', '', 2),
(17, '', '', '', '', '', 0, '', 'n', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`) VALUES
(2, 'Paraná'),
(3, 'Sergipe'),
(4, 'Manaus'),
(5, 'Amazonas'),
(6, 'Acre'),
(7, 'São Paulo'),
(8, 'Mato Grosso');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupousuario`
--

CREATE TABLE `grupousuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupousuario`
--

INSERT INTO `grupousuario` (`id`, `nome`) VALUES
(1, 'Limpeza'),
(2, 'Administração'),
(3, 'Caixa'),
(4, 'Serviços'),
(5, 'Padaria'),
(6, 'Açogue'),
(8, 'Dono'),
(9, 'Assistencia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `siglaproduto` varchar(20) NOT NULL,
  `unidademedida` varchar(20) NOT NULL,
  `id_categoriaproduto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `siglaproduto`, `unidademedida`, `id_categoriaproduto`) VALUES
(1, 'Sonho de chocolate', 'a', 'a', 1),
(2, 'Pão caseiro', '', '', NULL),
(3, 'Amendoin', '', '', NULL),
(4, 'Alface', '', '', NULL),
(5, 'Detergente', '', '', NULL),
(6, 'Rodo de Pia', '', '', NULL),
(7, 'Vassoura', '', '', NULL),
(8, 'Esfregão', '', '', NULL),
(9, 'Pizza congelada', '', '', NULL),
(10, 'Margarina', '', '', NULL),
(11, 'Arroz', '', '', NULL),
(12, 'Feijão', '', '', NULL),
(13, 'Presunto', '', '', NULL),
(14, 'Mussarela', '', '', NULL),
(24, 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `grupousuario_id` int(11) DEFAULT NULL,
  `sexo` varchar(6) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `grupousuario_id`, `sexo`, `foto`) VALUES
(1, 'João Silva', 'JS@gmail.com', '123', 2, 'homem', 'IMG-20221118-WA0005.jpg'),
(2, 'Pedro Celta', 'PedrinhoC1996@gmail.com', '123', NULL, '', ''),
(3, 'Ígor de Campos', 'IgaoC@gmail.com', '123', NULL, '', ''),
(4, 'Jefferson Antonio', 'Jeffao@gmail.com', '123', NULL, 'homem', ''),
(5, 'Joaquim Medeiro', 'JoaquimMedeiro@gmail.com', '123', NULL, '', ''),
(6, 'Vítor Barbosa Garla', 'vitor-b-garla@hotmail.com', '123', NULL, '', ''),
(7, 'Otavio Barbosa', 'Otaviob@gmail.com', '123', NULL, '', ''),
(8, 'Luisa de Souza', 'LuisaSouza@gmail.com', '123', NULL, '', ''),
(9, 'Renata Glasc', 'renatinha@gmail.com', '123', NULL, '', ''),
(10, 'Fernanda Paes', 'FernandaPaes@gmail.com', '123', NULL, '', ''),
(11, 'Tatiane Silva', 'Tati1990@gmail.com', '123', NULL, '', ''),
(12, 'admin', 'admin@admin@gmail.com', '$2y$10$IwUmaL39VQJ6Ci5w3ez57eyvsjof8zOd06MuQqZAr/Z', NULL, '', ''),
(31, 'chupisco', 'vitor-b-garla@hotmail.com', '$2y$10$MP9ikG4AIz8tpJ/0wHycdOYPs0nqYPVa8YZ1Gzjt3qB', NULL, 'homem', 'ca0319bc365bc4bcf089ddb7b39f0df1.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpfcnpj` (`cpfcnpj`),
  ADD KEY `fk_estado_cliente` (`id_estado`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoriaproduto_produto` (`id_categoriaproduto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupousuario_usuario` (`grupousuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoriaproduto`
--
ALTER TABLE `categoriaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_estado_cliente` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_categoriaproduto_produto` FOREIGN KEY (`id_categoriaproduto`) REFERENCES `categoriaproduto` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_grupousuario_usuario` FOREIGN KEY (`grupousuario_id`) REFERENCES `grupousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
