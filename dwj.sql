-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Set-2017 às 04:02
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwj`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cid_id` int(11) NOT NULL,
  `cid_nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cid_id`, `cid_nome`) VALUES
(1, 'Muzambinho'),
(2, 'Guaxupé'),
(3, 'Monte Belo'),
(4, 'Nova Resende'),
(5, 'Caconde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_nome` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `cli_endereco` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_num` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_cidade` int(11) DEFAULT NULL,
  `cli_email` varchar(85) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_cel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_descricao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_cpf` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_rg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_cnpj` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cli_ie` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nome`, `cli_endereco`, `cli_num`, `cli_cidade`, `cli_email`, `cli_cel`, `cli_tel`, `cli_descricao`, `cli_cpf`, `cli_rg`, `cli_cnpj`, `cli_ie`) VALUES
(221, 'Perses De Vilhena', 'endereco', 'numer', 1, 'persesvilhena01@gmail.com', 'cel', 'tel', 'descricao', 'cpf', 'rgf', 'cnpj', 'ir'),
(222, 'teste', 'teste', '', 1, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_ferramenta`
--

CREATE TABLE `estado_ferramenta` (
  `est_id` int(11) NOT NULL,
  `est_nome` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estado_ferramenta`
--

INSERT INTO `estado_ferramenta` (`est_id`, `est_nome`) VALUES
(1, 'Alugado'),
(2, 'Danificado'),
(3, 'Em manutenção'),
(4, 'Disponível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramenta`
--

CREATE TABLE `ferramenta` (
  `fer_id` int(11) NOT NULL,
  `fer_codigo` tinytext NOT NULL,
  `fer_marca` tinytext NOT NULL,
  `fer_modelo` tinytext NOT NULL,
  `fer_preco` double NOT NULL,
  `fer_preco_aluguel` double NOT NULL,
  `fer_tipo` int(11) NOT NULL,
  `fer_estado` int(11) NOT NULL,
  `fer_descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ferramenta`
--

INSERT INTO `ferramenta` (`fer_id`, `fer_codigo`, `fer_marca`, `fer_modelo`, `fer_preco`, `fer_preco_aluguel`, `fer_tipo`, `fer_estado`, `fer_descricao`) VALUES
(1, '001', 'makita', 'mk01', 350, 35, 1, 1, 'furadeira amarela com risco lateral'),
(2, 'dw12', 'DeWalt', 'dw12', 50, 5, 3, 4, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `loc_id` int(11) NOT NULL,
  `loc_cliente` int(11) NOT NULL,
  `loc_ferramenta` int(11) NOT NULL,
  `loc_data_locacao` date NOT NULL,
  `loc_data_devolucao` date DEFAULT NULL,
  `loc_valor` double NOT NULL,
  `loc_acressimo` double NOT NULL,
  `loc_desconto` double NOT NULL,
  `loc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`loc_id`, `loc_cliente`, `loc_ferramenta`, `loc_data_locacao`, `loc_data_devolucao`, `loc_valor`, `loc_acressimo`, `loc_desconto`, `loc_status`) VALUES
(2, 222, 1, '2017-07-27', NULL, 100, 10, 10, 2),
(3, 221, 2, '2017-07-26', NULL, 150, 10, 15, 2),
(4, 221, 2, '2017-09-11', '2017-09-11', 100, 10, 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ferramenta`
--

CREATE TABLE `tipo_ferramenta` (
  `tip_id` int(11) NOT NULL,
  `tip_nome` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_ferramenta`
--

INSERT INTO `tipo_ferramenta` (`tip_id`, `tip_nome`) VALUES
(1, 'Furadeira'),
(2, 'Escada'),
(3, 'Martelo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nome` varchar(85) COLLATE utf8_unicode_ci NOT NULL,
  `usu_login` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usu_senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `usu_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_nome`, `usu_login`, `usu_senha`, `usu_adm`) VALUES
(221, 'Perses De Vilhena', 'perses', 'teste', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cid_id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `fk_cc_pessoa_cc_cidade1_idx` (`cli_cidade`);

--
-- Indexes for table `estado_ferramenta`
--
ALTER TABLE `estado_ferramenta`
  ADD PRIMARY KEY (`est_id`);

--
-- Indexes for table `ferramenta`
--
ALTER TABLE `ferramenta`
  ADD PRIMARY KEY (`fer_id`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `tipo_ferramenta`
--
ALTER TABLE `tipo_ferramenta`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `estado_ferramenta`
--
ALTER TABLE `estado_ferramenta`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ferramenta`
--
ALTER TABLE `ferramenta`
  MODIFY `fer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tipo_ferramenta`
--
ALTER TABLE `tipo_ferramenta`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
