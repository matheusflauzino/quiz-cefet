-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2017 às 20:37
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_jogadores`
--

CREATE TABLE `tbl_jogadores` (
  `cd_jogador` int(11) NOT NULL COMMENT 'Chave Primária do Jogador',
  `ds_nome_jogador` varchar(100) NOT NULL COMMENT 'Nome do Jogador',
  `ds_email_jogador` varchar(100) NOT NULL COMMENT 'Email do Jogador para o Janai mandar Spam',
  `vl_pontuacao` decimal(10,0) DEFAULT '0' COMMENT 'Pontuaçao Geral',
  `vl_quantidade_partidas` int(11) DEFAULT '0' COMMENT 'Quantidade de partidas que o usuário jogou (para desempate)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_jogadores`
--

INSERT INTO `tbl_jogadores` (`cd_jogador`, `ds_nome_jogador`, `ds_email_jogador`, `vl_pontuacao`, `vl_quantidade_partidas`) VALUES
(1, 'Julio Verissimo', 'juliocor7@hotmail.com', '0', 1),
(2, 'Julio Verissimo', 'f@gmail.com', '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_questoes`
--

CREATE TABLE `tbl_questoes` (
  `cd_questao` int(11) NOT NULL COMMENT 'Chave primaria da Questao',
  `ds_questao_pergunta` varchar(45) NOT NULL COMMENT 'Cabeçalho da Questao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_questoes`
--

INSERT INTO `tbl_questoes` (`cd_questao`, `ds_questao_pergunta`) VALUES
(1, 'Sobre o Matheus ele:'),
(2, 'Opção que Descreve o Matheus'),
(3, 'Matheus Beija:'),
(4, 'Qual item abaixo matheus prefere');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_questoes_alternativas`
--

CREATE TABLE `tbl_questoes_alternativas` (
  `cd_alternativa` int(11) NOT NULL COMMENT 'Código da Alternativa',
  `cd_questao` int(11) NOT NULL COMMENT 'Chave estrangeira da Questao',
  `ds_alternativa` varchar(45) NOT NULL,
  `x_correta` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_questoes_alternativas`
--

INSERT INTO `tbl_questoes_alternativas` (`cd_alternativa`, `cd_questao`, `ds_alternativa`, `x_correta`) VALUES
(1, 1, 'É gay', 'C'),
(2, 1, 'Não gosta da Fruta', ''),
(3, 1, 'Joga pros Dois Lados', ''),
(4, 1, 'Gosta de Rapazes', ''),
(5, 2, 'Bicha Louca', 'C'),
(6, 2, 'Bicha Enrustida', ''),
(7, 2, 'Bicha Pão com Ovo', ''),
(8, 2, 'Jóvem Purpurinado', ''),
(9, 3, 'Rapazes', 'C'),
(10, 3, 'Travecos', ''),
(11, 3, 'Qualquer coisa menos Moças', ''),
(12, 3, 'Principalmente Homens', ''),
(13, 4, 'Moças', ''),
(14, 4, 'Rapazes', 'C'),
(15, 4, 'Transex', ''),
(16, 5, 'Animais', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_respostas_jogador`
--

CREATE TABLE `tbl_respostas_jogador` (
  `cd_resposta` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cd_questao` int(5) NOT NULL,
  `cd_alternativa` int(5) NOT NULL,
  `flg_acertou` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jogadores`
--
ALTER TABLE `tbl_jogadores`
  ADD PRIMARY KEY (`cd_jogador`);

--
-- Indexes for table `tbl_questoes`
--
ALTER TABLE `tbl_questoes`
  ADD PRIMARY KEY (`cd_questao`);

--
-- Indexes for table `tbl_questoes_alternativas`
--
ALTER TABLE `tbl_questoes_alternativas`
  ADD PRIMARY KEY (`cd_alternativa`);

--
-- Indexes for table `tbl_respostas_jogador`
--
ALTER TABLE `tbl_respostas_jogador`
  ADD PRIMARY KEY (`cd_resposta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jogadores`
--
ALTER TABLE `tbl_jogadores`
  MODIFY `cd_jogador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave Primária do Jogador', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_questoes`
--
ALTER TABLE `tbl_questoes`
  MODIFY `cd_questao` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Chave primaria da Questao', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_questoes_alternativas`
--
ALTER TABLE `tbl_questoes_alternativas`
  MODIFY `cd_alternativa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código da Alternativa', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_respostas_jogador`
--
ALTER TABLE `tbl_respostas_jogador`
  MODIFY `cd_resposta` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
