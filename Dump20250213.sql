-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria_produto`
--

DROP TABLE IF EXISTS `categoria_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria_produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria_id` int NOT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categoria_id` (`categoria_id`,`produto_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `categoria_produto_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `tb_categorias` (`idCategorias`) ON DELETE CASCADE,
  CONSTRAINT `categoria_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `tb_produtos` (`idProdutos`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `marca_produto`
--

DROP TABLE IF EXISTS `marca_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `marca_produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marca_id` int NOT NULL,
  `produto_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marca_id` (`marca_id`,`produto_id`),
  KEY `produto_id` (`produto_id`),
  CONSTRAINT `marca_produto_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `tb_marca` (`idMarca`) ON DELETE CASCADE,
  CONSTRAINT `marca_produto_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `tb_produtos` (`idProdutos`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_categorias` (
  `idCategorias` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_entradas`
--

DROP TABLE IF EXISTS `tb_entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_entradas` (
  `idEntradas` int NOT NULL AUTO_INCREMENT,
  `dataEntrada` datetime NOT NULL,
  `qtdEntrada` int NOT NULL,
  `precoProduto` decimal(10,2) DEFAULT NULL,
  `idProdutosFK` int NOT NULL,
  `idFornecedorFK` int NOT NULL,
  `numeroNotaFiscal` int NOT NULL,
  `dataProdutoValidade` date NOT NULL,
  PRIMARY KEY (`idEntradas`),
  KEY `fk_tb_entradas_tb_produtos1_idx` (`idProdutosFK`),
  KEY `fk_tb_entradas_tb_fornecedor1_idx` (`idFornecedorFK`),
  CONSTRAINT `fk_tb_entradas_tb_fornecedor1` FOREIGN KEY (`idFornecedorFK`) REFERENCES `tb_fornecedor` (`idFornecedor`),
  CONSTRAINT `fk_tb_entradas_tb_produtos1` FOREIGN KEY (`idProdutosFK`) REFERENCES `tb_produtos` (`idProdutos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fornecedor` (
  `idFornecedor` int NOT NULL AUTO_INCREMENT,
  `nomeFornecedor` varchar(70) NOT NULL,
  `cnpj` char(14) NOT NULL,
  `email` varchar(150) NOT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `NUM_Empenho` varchar(100) NOT NULL,
  PRIMARY KEY (`idFornecedor`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_marca`
--

DROP TABLE IF EXISTS `tb_marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_marca` (
  `idMarca` int NOT NULL AUTO_INCREMENT,
  `nomeMarca` varchar(45) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produtos` (
  `idProdutos` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(70) NOT NULL,
  `qtdEstoque` int NOT NULL,
  `UnidadeMedida` varchar(45) NOT NULL,
  `tamanho` int DEFAULT NULL,
  `ativoCategoria` int DEFAULT NULL,
  `ativoMarca` int DEFAULT NULL,
  PRIMARY KEY (`idProdutos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_saidas`
--

DROP TABLE IF EXISTS `tb_saidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_saidas` (
  `idSaidas` int NOT NULL AUTO_INCREMENT,
  `dataSaida` datetime NOT NULL,
  `qtdSaida` int DEFAULT NULL,
  `destino` char(1) DEFAULT NULL,
  `idProdutosFK` int NOT NULL,
  PRIMARY KEY (`idSaidas`),
  KEY `fk_tb_saidas_tb_produtos1_idx` (`idProdutosFK`),
  CONSTRAINT `fk_tb_saidas_tb_produtos1` FOREIGN KEY (`idProdutosFK`) REFERENCES `tb_produtos` (`idProdutos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuarios` (
  `idUsuarios` int NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(75) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nivelAcesso` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-13 23:04:46
