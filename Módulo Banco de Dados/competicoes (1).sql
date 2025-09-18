-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/09/2025 às 13:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `competicoes`
--


CREATE DATABASE competicoes;

USE competicoes;
-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `lastname`, `email`, `cpf`) VALUES
(1, 'Rafael', 'Rodrigues', 'rafa@gmail.com', '34654098765'),
(2, 'Lucas', 'Maia', 'lucas@gmail.com', '87656453241'),
(3, 'Ana', 'Lima', 'ana@gmail.com', '98076565436'),
(4, 'João', 'Lopes', 'joão@gmail.com', '67654321234'),
(5, 'Arthur', 'Santorio', 'arthur@gmail.com', '98767512345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `capacity_ticket` int(11) NOT NULL,
  `date_event` date NOT NULL,
  `time_event` time NOT NULL,
  `endereco_event` varchar(120) NOT NULL,
  `img_event` varchar(150) NOT NULL,
  `limit_ticket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `events`
--

INSERT INTO `events` (`id`, `name`, `capacity_ticket`, `date_event`, `time_event`, `endereco_event`, `img_event`, `limit_ticket`) VALUES
(1, 'Grande Show Senac', 5000, '2025-10-10', '08:30:00', 'Rua Venanciu Aires, 353, Centro, Brásilia', 'image/event.png', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sales`
--

INSERT INTO `sales` (`id`, `sale_time`, `user_id`) VALUES
(1, '2025-09-18 11:10:11', 2),
(2, '2025-09-18 11:10:11', 2),
(3, '2025-09-18 11:10:11', 2),
(4, '2025-09-18 11:10:11', 2),
(5, '2025-09-18 11:10:21', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `capacity_ticket` int(11) NOT NULL,
  `ticket_reserved` int(11) NOT NULL,
  `type_sector` enum('VIP','IMP','COM') DEFAULT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `capacity_ticket`, `ticket_reserved`, `type_sector`, `event_id`) VALUES
(1, 'Setor VIP', 500, 100, 'VIP', 1),
(2, 'Setor Imprensa', 1000, 350, 'IMP', 1),
(3, 'Setor Comum', 3500, 1300, 'COM', 1);


-- No atributo type_sector o "VIP" referece ao setor com status de "VIP, o "IMP" referece ao setor com status de "IMPRENSA" e "COM" referece ao setor com status de "COMUM"


-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `code_ticket` char(12) NOT NULL,
  `time_validation` datetime NOT NULL,
  `status_ticket` enum('Emitido','Validado') DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tickets`
--

INSERT INTO `tickets` (`id`, `code_ticket`, `time_validation`, `status_ticket`, `client_id`, `sale_id`, `sector_id`) VALUES
(1, 'JL453K3H45K3', '2025-10-10 09:30:00', 'Validado', 1, 1, 2),
(2, 'HJD509HJ23SD', '2025-10-10 09:00:00', 'Validado', 2, 5, 1),
(3, 'GH34097JG56D', '2025-10-10 00:00:00', 'Emitido', 3, 5, 3),
(4, 'J5H408JGBV76', '2025-10-10 00:00:00', 'Emitido', 3, 5, 3),
(5, 'KJ876GH09K87', '2025-10-10 11:00:00', 'Validado', 5, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` char(11) NOT NULL,
  `profile` enum('Adm','Saller','Check') DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `cpf`, `profile`, `password`) VALUES
(1, 'Leandro', 'Candido', 'adm@email.com', '67543425910', 'Adm', '*6602C7F1C9C199DBDC3307D2886962507B4A362E'),
(2, 'Beatriz', 'Oliveira', 'vendedor@email.com', '65785462314', 'Saller', '*E33813F71C1BB28100CC069517EA5C463E39C952'),
(3, 'Junior', 'Marques', 'validador@email.com', '67854309876', 'Check', '*711A080F5D54F233FF8A0962DCEBDACC92141908');


-- Para o hash da senha ultilizei um tamanho maior de espaço no banco para ter uma segurança melhor no qual ultilizei a função PASSWORD() EX: PASSWORD('senha123'), para executar o hash no módulo do banco de dados

-- No atributo profile o "ADM" referece ao usuário com perfil  de "ADMINISTRADOR", o "Saller" referece ao usuário com perfil  de "VENDEDOR" e o "Check" referece ao usuário com perfil  de "VALIDADOR"



--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Índices de tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
