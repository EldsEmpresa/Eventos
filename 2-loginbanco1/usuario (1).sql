-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/05/2025 às 19:00
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
-- Banco de dados: `usuario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data_evento` date NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `data_evento`, `descricao`, `imagem`, `usuario`, `criado_em`) VALUES
(1, 'Virada Cultural - São Miguel', '2025-05-25', 'São Miguel com Léo Santana', 'evento1.png', 'carlos@gmail.com', '2025-05-17 01:23:07'),
(2, 'Virada Cultural - São Miguel', '2025-05-25', 'Virada Cultural São Miguel com Léo Santana', 'evento2.png', 'carlos@gmail.com', '2025-05-17 01:23:39'),
(3, 'Virada Cultural - Zona Norte', '2025-05-24', 'Zona Norte', 'img_6827ed16ab2ef.jpg', 'carlos@gmail.com', '2025-05-17 01:32:03'),
(4, 'Virada Cultural ', '2025-05-21', 'Shows diversos', 'evento2.jpg', 'carlos@gmail.com', '2025-05-17 01:37:00'),
(5, 'Virada Cultural - Centro', '2025-05-20', 'Eventos no Centro da Cidade', 'evento3.jpg', 'carlos@gmail.com', '2025-05-17 01:40:33'),
(6, 'Virada Cultural - Centro', '2025-05-20', 'Eventos no Centro da Cidade', 'evento4.jpg', 'carlos@gmail.com', '2025-05-17 01:40:56'),
(7, 'Virada Cultural - Centro', '2025-05-20', 'Eventos no Centro da Cidade', 'evento5.jpg', 'carlos@gmail.com', '2025-05-17 01:41:06'),
(8, 'Virada Cultural - Centro', '2025-05-20', 'Eventos no Centro da Cidade', 'img_6827ed2dcf6e3.jpg', 'carlos@gmail.com', '2025-05-17 01:53:38'),
(9, 'Virada Cultural - Zona Sul', '2026-06-10', 'virada cultural xona sul', 'img_6827ee19893f0.jpg', 'carlos@gmail.com', '2025-05-17 02:01:37'),
(10, 'Virada Cultural sp', '2025-02-25', 'evento top', 'evento6.png', 'luiz@gmail.com', '2025-05-19 15:22:01'),
(11, 'Virada Cultural sp', '2025-02-25', 'evento top', 'evento7.png', 'luiz@gmail.com', '2025-05-19 15:22:01'),
(12, 'tteste', '2025-12-12', 'teste', 'evento8.jpg', 'luiz@gmail.com', '2025-05-19 15:44:01'),
(13, 'uol', '2025-04-12', 'teessste', 'evento9.jpg', 'luiz@gmail.com', '2025-05-19 15:46:02'),
(14, 'uol', '2025-04-12', 'teessste', 'evento10.jpg', 'luiz@gmail.com', '2025-05-19 15:48:18'),
(15, 'uol', '2025-04-12', 'teessste', 'evento11.jpg', 'luiz@gmail.com', '2025-05-19 15:48:33'),
(16, 'uol', '2025-04-12', 'teessste', 'evento12.jpg', 'luiz@gmail.com', '2025-05-19 15:49:13'),
(17, 'uol', '2025-04-12', 'teessste', 'evento13.jpg', 'luiz@gmail.com', '2025-05-19 15:50:27'),
(18, 'uol', '2025-04-12', 'teessste', 'evento14.jpg', 'luiz@gmail.com', '2025-05-19 15:50:31'),
(19, 'Virada Cultural sp', '2025-05-25', 'Zona Leste', 'img_682b5ec1ef456.jpg', 'clodoaldo@gmail.com', '2025-05-19 16:39:06'),
(20, 'Virada Cultural Zona Leste', '2025-05-24', 'Regiao de Guaianases', 'evento15.png', 'luciano@uol.com.br', '2025-05-19 16:48:28'),
(21, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento16.png', 'emanoel@uol.com.br', '2025-05-19 20:20:18'),
(22, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento17.png', 'emanoel@uol.com.br', '2025-05-19 20:20:39'),
(23, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento18.png', 'emanoel@uol.com.br', '2025-05-19 20:20:50'),
(24, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento19.png', 'emanoel@uol.com.br', '2025-05-19 20:21:02'),
(25, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento20.png', 'emanoel@uol.com.br', '2025-05-19 20:22:28'),
(26, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento21.png', 'emanoel@uol.com.br', '2025-05-19 20:22:31'),
(27, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento22.png', 'emanoel@uol.com.br', '2025-05-19 20:23:13'),
(28, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento23.png', 'emanoel@uol.com.br', '2025-05-19 20:24:39'),
(29, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento24.png', 'emanoel@uol.com.br', '2025-05-19 20:24:57'),
(30, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento25.png', 'emanoel@uol.com.br', '2025-05-19 20:26:05'),
(31, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento26.png', 'emanoel@uol.com.br', '2025-05-19 20:26:40'),
(32, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento27.png', 'emanoel@uol.com.br', '2025-05-19 20:27:44'),
(33, 'Semana Paulo Freire', '2025-06-10', 'etec', 'evento28.jpg', 'emanoel@uol.com.br', '2025-05-19 20:29:08'),
(34, 'Virada Cultural Zona Leste', '2025-05-25', 'teste', 'evento29.png', 'emanoel@uol.com.br', '2025-05-19 20:31:34'),
(35, 'Semana Paulo Freire', '2025-10-21', 'Etec Aprigio', 'img_682bb70a2071e.jpg', 'luiza@gmail.com', '2025-05-19 22:55:55'),
(36, 'Semana Paulo Freire', '2025-10-21', 'teste', 'evento30.jpg', 'fabio@gmail.com', '2025-05-19 23:38:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuarios` varchar(40) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `usuarios`, `senha`) VALUES
(1, 'pedro@gmail.com', '$2y$10$H1ws85R3mBgoh4fXJlFVyO6JwrftN36cn'),
(2, 'joao@uol.com.br', '$2y$10$.kxzVaKm6WjaFVKnHvtBKueE9ZGSMdDSw'),
(3, 'luan@hotmail.com', '$2y$10$nMORhzUP5l5hrjF2HcobqelqPOF2NI51B'),
(4, 'joao@uol.com.br', '$2y$10$.62XAhcKqUqn8xZ1.Rye0.o4Lr9rPf5MW'),
(5, 'pedro@gmail.com', '$2y$10$q5erQZ/a3ARP2KnekKIt3uOpqMRGMFlQx'),
(6, 'luana@gmail.com', '$2y$10$iArFTeCi/WPTIPnT.KXx5.Qrgum9EmsNI'),
(7, 'pedro@gmail.com', '$2y$10$QfGppF2MytAyJUnpq1DXh.TLAOqz.RMen'),
(8, 'joao@gmail.com', '$2y$10$Gs5yrzEMk6G8RaxCR0yDt.5q33ApqSACi'),
(9, 'joao@gmail.com', '$2y$10$ckLTc9cB7.H4OTJ.8alUHOxCYCjOoKXTt'),
(10, 'pedro@gmail.com', '$2y$10$WPQuRBIWXRq4Lr9Kxfc7zu4Y9bx.QApKZ'),
(11, 'edneia@gmail.com', '$2y$10$F/DbOSRQjghmm4M.k/RwTO5djDHuh4NQk'),
(12, 'edneia@gmail.com', '$2y$10$NjaV/nlWCmFueU9JG02OG.P7k1iSjzUZ7'),
(13, 'edneia@gmail.com', '$2y$10$hiMvU.crl1.jtxmVMH4dY.C8wGt7fiTC0'),
(14, 'carloseduardo@gmail.com', '$2y$10$VQq3R8iAGB.WOLZR.YDhzOTYovpGVxQBroj.ICn9TFxuNOisWLpFW'),
(15, 'carloseduardo@gmail.com', '$2y$10$SL7Y8Ri4RHrNKxQzQEqnD.kcWE1ISdq1AA69ED0oOR2e7ep3OTXj2'),
(16, 'carlos@gmail.com', '$2y$10$ABgJDGhn0QaEO.J3Epb0kuQ8aWwl6eH/NbwJ9IECjsP7rE.VCdAS2'),
(17, 'luiz@gmail.com', '$2y$10$bNYMjSHfCZMO3cD9rGlKGerKFTy2sQ1aE4oQUlGfNxPs9jW.8Dohe'),
(18, 'clodoaldo@gmail.com', '$2y$10$jqJCVKutER3bUwH8rbFfneLNu.pe0bS7U4MXx0LIqnosSNd5etDgi'),
(19, 'luciano@uol.com.br', '$2y$10$aqNXNpqEbqLInHmYfMVcVOFpc.n6FcRnEc64IYiYNhJdyzFzXIIT2'),
(20, 'emanoel@uol.com.br', '$2y$10$NKQjJ7SrPgaUc3z5goDIo.3gJy/LK78WixkVDatBKPb.ifimzcBQS'),
(21, 'luiza@gmail.com', '$2y$10$dKH6ygfxOQjfiZvLhnJtgeFTdtEwA8gSRnoeehvUKgzj6kIuiNaYy'),
(22, 'fabio@gmail.com', '$2y$10$TcahIbcf7wdmUQGVONMHaeojfTD14lOzq0i7/Yqqm6R4c0fhjn0Oa'),
(23, 'paulo@uol.com.br', '$2y$10$2UXNBV3YFbt6mIzm/uNnqulpj/jN2LP7qF3rwFq9fK0iTTULcEJD6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
