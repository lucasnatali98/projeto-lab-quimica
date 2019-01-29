-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jan-2019 às 17:33
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_graduacao_quimica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipoConta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('73rjqe1bei441g71l8k7lkjjb43g4skc', '::1', 1548692069, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383639313937353b),
('9psjnjsl1nfteo0tm2hbbatq8grith87', '::1', 1548466160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436363136303b757365726c6f6761646f7c4f3a383a22737464436c617373223a323a7b733a343a2275736572223b733a383a22566f6c7574615344223b733a353a2273656e6861223b733a383a22696e6f7661727364223b7d6c6f6761646f7c623a303b),
('ach0jh3src0jatt0j8f1cl13ibavjj08', '::1', 1548466303, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436363136303b757365726c6f6761646f7c4f3a383a22737464436c617373223a323a7b733a343a2275736572223b733a383a22566f6c7574615344223b733a353a2273656e6861223b733a383a22696e6f7661727364223b7d6c6f6761646f7c623a303b),
('b7djgcivu394j93mp12nrr802g4c6s97', '::1', 1548465364, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436353336343b757365726c6f6761646f7c4f3a383a22737464436c617373223a323a7b733a343a2275736572223b733a383a22566f6c7574615344223b733a353a2273656e6861223b733a383a22696e6f7661727364223b7d6c6f6761646f7c623a313b),
('ev9fso3d2mnml3023k7t47fbgnpkra1l', '::1', 1548691975, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383639313937353b),
('hjv670himds07b526f7r0p1guqv6nci9', '::1', 1548464426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436343432363b757365726c6f6761646f7c4f3a383a22737464436c617373223a323a7b733a343a2275736572223b733a383a22566f6c7574615344223b733a353a2273656e6861223b733a383a22696e6f7661727364223b7d6c6f6761646f7c623a313b),
('k7054qnb9a04diuhstfh0mtarcv26mvm', '::1', 1548691611, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383639313631313b),
('map1dfsbinvvv3ga6m4bsi51pap9k7gl', '::1', 1548465845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436353834353b757365726c6f6761646f7c4f3a383a22737464436c617373223a323a7b733a343a2275736572223b733a383a22566f6c7574615344223b733a353a2273656e6861223b733a383a22696e6f7661727364223b7d6c6f6761646f7c623a303b),
('o7c4lkpv7dsdebe6mcehpqsfgih6ujpc', '::1', 1548518933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531383933333b),
('qbu70cagbjgj3lk66lhmc6qt6sm1k1bn', '::1', 1548518933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531383933333b),
('tcgpkmjd00d6ibun44062gfge28ovikf', '127.0.0.1', 1548688207, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383638383230373b),
('ttc8esjornr5ppa402jr4n658s5lieod', '::1', 1548464115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383436343131353b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(500) CHARACTER SET utf8 NOT NULL,
  `imagem` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='onde será postados sobre os eventos';

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `id_galeria` int(11) NOT NULL,
  `id_producao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) CHARACTER SET utf8 NOT NULL,
  `descricao` longtext CHARACTER SET utf8 NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Onde serão postadas as fotos';

-- --------------------------------------------------------

--
-- Estrutura da tabela `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `historia` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoal`
--

CREATE TABLE `pessoal` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `foto` longtext NOT NULL,
  `lattes` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoal`
--

INSERT INTO `pessoal` (`id`, `nome`, `cargo`, `foto`, `lattes`) VALUES
(1, 'Joao', 'Presidente', '', '122131233112331313313333131312312');

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) CHARACTER SET utf8 NOT NULL,
  `descricao` longtext CHARACTER SET utf8 NOT NULL,
  `data` datetime NOT NULL,
  `arquivo` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Produções científicas e papers publicados da Pós Graduação e';

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `titulo`, `descricao`) VALUES
(20, 'Primeiro projeto', 'Este é o primeiro projeto da pós graduação em química'),
(24, 'Segundo projeto', 'Este é o segundo projeto da pós graduação em química');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `user` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user`, `senha`) VALUES
('VolutaSD', 'inovarsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_session`
--
ALTER TABLE `ci_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoal`
--
ALTER TABLE `pessoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user`,`senha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoal`
--
ALTER TABLE `pessoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producao`
--
ALTER TABLE `producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
