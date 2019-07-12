-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Set-2015 às 23:06
-- Versão do servidor: 5.6.24-log
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aikido`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `alunoId` int(11) NOT NULL,
  `estadoID` tinyint(3) DEFAULT NULL,
  `graduacaoId` int(10) DEFAULT NULL,
  `usuarioId` int(10) DEFAULT NULL,
  `escolaId` int(10) DEFAULT NULL,
  `nomeAluno` varchar(200) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `rg` varchar(30) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(150) DEFAULT NULL,
  `complemento` varchar(250) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `dataCadAluno` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `obsAluno` longtext
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`alunoId`, `estadoID`, `graduacaoId`, `usuarioId`, `escolaId`, `nomeAluno`, `dataNascimento`, `rg`, `cpf`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `cep`, `email`, `telefone`, `celular`, `dataCadAluno`, `status`, `obsAluno`) VALUES
(30, 27, 9, 36, 6, 'Zenildo Pereira Jr', '1998-09-15', '16.165.198-1', '984.984.981-98', 'Rua Maria das Graças', '554', 'Jd.Petroleo', 'N/A', 'Piracicaba', '13.659-849', 'zenildo666@hotmail.com', '19 3454-9484', '19 94984-9849', '2015-09-02', 1, ''),
(31, 27, 6, 36, 7, 'Bruno Conchinha', '1985-09-22', '13.449.849-8', '189.198.198-19', 'Rua Alameda dos Anjos', '41', 'Campestre', 'N/A', 'Campinas', '15.519-819', 'bruno@conchinha.com.br', '19 2516-5165', '19 94849-8984', '2015-09-02', 1, ''),
(32, 27, 10, 36, 7, 'Anselmo Cristiano Filho', '1990-09-12', '19.819.849-8', '192.659.849-84', 'Rua Joao Tedesco', '584', 'Jd.Asturias', '', 'Osasco', '11.259-819', 'acfilho@gmail.com', '11 3254-6549', '11 98849-8498', '2015-09-02', 1, ''),
(33, 16, 12, 36, 7, 'Ignacio Arruda Gonçalo', '1978-09-22', '25.484.984-9', '292.597.984-98', 'Rua Lourenço Albuquerque', '541', 'Jd.Primavera', '', 'Curitiba', '21.549-849', 'arrudagoncignacio@uol.com.br', '41 2548-4785', '41 98544-5742', '2015-09-02', 0, ''),
(34, 27, 10, 37, 8, 'Getulio Teste', '1965-09-30', '98.198.498-4', '519.519.519-19', 'Rua das Pombas', '41', 'Nova Piracicaba', '', 'Piracicaba', '13.454-984', 'getulic@teste.com', '19 5495-4984', '19 99849-8498', '2015-09-02', 0, ''),
(35, 27, 2, 37, 8, 'Margarida Soares Gabriel', '1987-09-29', '48.484.894-8', '151.919.149-84', 'Rua Chavantes', '71', 'Pauliceia', '', 'Piracicaba', '13.519-181', 'soares@gabriel.com', '19 3454-5494', '19 98484-8494', '0000-00-00', 1, ''),
(36, 27, 9, 36, 6, 'Pablo Escobar', '1998-10-22', '49.849.849-5', '498.495.549-58', 'Rua Medelin', '14', 'Colombia', '', 'São Paulo', '11.546-949', 'pbescobar@uol.com.br', '19 3454-9898', '19 98799-8498', '2015-09-02', 1, ''),
(37, 27, 9, 36, 6, 'Fabio Stolf', '2000-07-15', '54.944.954-9', '542.321.652-15', 'Rua Governador Pedro de Toledo', '114', 'Centro', '', 'Piracicaba', '13.420-010', 'fabio.stolf@hotmail.com', '19 4544-9949', '19 97474-8494', '2015-09-02', 1, ''),
(38, 1, 1, 1, 6, 'joaozooasdojaso', '2080-07-05', '78', '87', '878', '789', '789', '987', '8789', '78', '78', '89', '78 97', '2015-09-02', 0, '87'),
(39, 27, 2, 36, 6, 'Joaquim Barbosa', '1990-10-17', '46.446.448-4', '654.984.984-98', 'Rua Patife', '541', 'Centro', '', 'Piracicaba', '13.549-849', 'patife@uol.com.br', '19 3454-5494', '19 98484-9849', '2015-09-03', 1, ''),
(40, 2, 2, 35, 6, 'aee', '2015-09-16', 'a', '1a', 'sad', 'asd', 'sad', 'aasd', 'sad', 'sa.dds', 'asd', 'as d', 'as dd', '2015-09-03', 1, 'asa'),
(41, 5, 4, 35, 6, 'carai', '2015-09-16', '21.312', '312.31', '212', '31', '2131', '213', '312', '31.23', '12312', '12 3', '13 231', '2015-09-03', 1, '231');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE IF NOT EXISTS `escola` (
  `escolaId` int(10) NOT NULL,
  `responsavelEscola` varchar(200) DEFAULT NULL,
  `estadoID` int(10) DEFAULT NULL,
  `nomeEscola` varchar(100) DEFAULT NULL,
  `enderecoEscola` varchar(100) DEFAULT NULL,
  `numeroEscola` varchar(10) DEFAULT NULL,
  `bairroEscola` varchar(100) DEFAULT NULL,
  `cidadeEscola` varchar(100) DEFAULT NULL,
  `telefoneEscola` varchar(30) DEFAULT NULL,
  `statusEscola` int(2) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`escolaId`, `responsavelEscola`, `estadoID`, `nomeEscola`, `enderecoEscola`, `numeroEscola`, `bairroEscola`, `cidadeEscola`, `telefoneEscola`, `statusEscola`) VALUES
(6, 'Dilma Rouseff', 27, 'Dojo Kun', 'Rua Floriano Peixoto', '1492', 'Centro', 'Piracicaba', '19 3454-8475', 1),
(7, 'Fabricio Costa', 27, 'Aikikaizen Dojono', 'Rua das Luzes', '542', 'Centro', 'Americana', '19 3421-5415', 1),
(8, 'Jaime Filho', 27, 'Dojito Aikidoti', 'Rua das Almondegas', '474', 'Centro', 'Paulinia', '19 3454-8545', 1),
(9, 'Felipo Nashimotto', 27, 'Kakido Mashipa', 'Rua Manoel Conceição', '415', 'Bairro Alto', 'Piracicaba', '19 3424-8545', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `estadoID` tinyint(3) unsigned NOT NULL,
  `nome` char(20) DEFAULT '0',
  `sigla` char(2) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`estadoID`, `nome`, `sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amapá', 'AP'),
(4, 'Amazonas', 'AM'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Mato Grosso', 'MT'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Minas Gerais', 'MG'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Paraná', 'PR'),
(17, 'Pernambuco', 'PE'),
(19, 'Piauí', 'PI'),
(20, 'RG do Norte', 'RN'),
(21, 'RG do Sul', 'RS'),
(22, 'Rio de Janeiro', 'RJ'),
(24, 'Rondônia', 'RO'),
(25, 'Roraima', 'RA'),
(26, 'Santa Catarina', 'SC'),
(27, 'São Paulo', 'SP'),
(29, 'Sergipe', 'SE'),
(30, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacao`
--

CREATE TABLE IF NOT EXISTS `graduacao` (
  `graduacaoId` int(10) NOT NULL,
  `graduacaoNome` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `graduacao`
--

INSERT INTO `graduacao` (`graduacaoId`, `graduacaoNome`) VALUES
(1, '6º kyu'),
(2, '5º kyu'),
(3, '4º kyu'),
(4, '3º kyu'),
(5, '2º kyu'),
(6, '1º kyu'),
(7, 'shodan'),
(8, 'nidan'),
(9, 'sanda'),
(10, 'yondan'),
(11, 'godan'),
(12, 'rokudan');

-- --------------------------------------------------------

--
-- Estrutura da tabela `graduacaoaluno`
--

CREATE TABLE IF NOT EXISTS `graduacaoaluno` (
  `graduacaoAlunoId` int(10) NOT NULL,
  `graduacaoId` int(10) DEFAULT NULL,
  `alunoId` int(10) DEFAULT NULL,
  `dataGraduacao` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `graduacaoaluno`
--

INSERT INTO `graduacaoaluno` (`graduacaoAlunoId`, `graduacaoId`, `alunoId`, `dataGraduacao`) VALUES
(1, 8, 20, '2015-08-27'),
(2, 10, 20, '2015-08-27'),
(3, 12, 20, '2015-08-27'),
(4, 5, 20, '2015-08-27'),
(5, 5, 20, '2015-08-27'),
(6, 7, 20, '2015-08-27'),
(7, 12, 20, '2015-08-27'),
(8, 10, 20, '2015-08-31'),
(9, 11, 20, '2015-10-20'),
(10, 11, 20, '2015-08-21'),
(11, 8, 22, '0000-00-00'),
(12, 7, 23, '0000-00-00'),
(13, 7, 21, '2015-08-29'),
(14, 6, 26, '0000-00-00'),
(15, 8, 26, '2015-09-25'),
(16, 6, 31, '2015-09-17'),
(17, 10, 32, '2015-09-30'),
(18, 10, 34, '2015-09-23'),
(19, 9, 30, '2015-09-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `nivelId` int(10) NOT NULL,
  `nomeNivel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`nivelId`, `nomeNivel`) VALUES
(1, 'Professor'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioId` int(11) NOT NULL,
  `escolaId` int(10) DEFAULT NULL,
  `usuarioLogin` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `usuarioNome` varchar(100) DEFAULT NULL,
  `nivelId` int(10) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `statusUsuario` tinyint(1) NOT NULL DEFAULT '1',
  `qtdAcesso` int(11) DEFAULT '0',
  `resetaSenha` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `escolaId`, `usuarioLogin`, `senha`, `usuarioNome`, `nivelId`, `dataCadastro`, `statusUsuario`, `qtdAcesso`, `resetaSenha`) VALUES
(1, 6, 'master', 'master', 'Soluticom', 2, '2015-08-17', 1, 72, 1),
(35, 6, 'fefu', 'fefu', 'Fernando Gabriel', 2, '2015-09-02', 1, 3, 1),
(36, 7, 'fabian', 'fabian', 'Fabian Ribeiro', 2, '2015-09-02', 1, 2, 1),
(37, 8, 'teste', 'teste', 'Usuario Teste', 1, '2015-09-02', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`alunoId`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`escolaId`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`estadoID`);

--
-- Indexes for table `graduacao`
--
ALTER TABLE `graduacao`
  ADD PRIMARY KEY (`graduacaoId`);

--
-- Indexes for table `graduacaoaluno`
--
ALTER TABLE `graduacaoaluno`
  ADD PRIMARY KEY (`graduacaoAlunoId`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`nivelId`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `alunoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `escolaId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `estadoID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `graduacao`
--
ALTER TABLE `graduacao`
  MODIFY `graduacaoId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `graduacaoaluno`
--
ALTER TABLE `graduacaoaluno`
  MODIFY `graduacaoAlunoId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `nivelId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
