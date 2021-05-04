-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcarometro
-- ------------------------------------------------------
-- Server version	5.7.30-log

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(70) COLLATE utf8_bin NOT NULL,
  `nascimento` date NOT NULL,
  `pai` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `mae` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `fone_aluno` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `email_aluno` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `fone_mae` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `fone_pai` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `turma` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `termo` int(1) DEFAULT NULL,
  `turno` enum('Manhã','Tarde','Noite') COLLATE utf8_bin DEFAULT NULL,
  `foto` varchar(150) COLLATE utf8_bin NOT NULL,
  `turma_id` int(11) NOT NULL,
  `pne` tinyint(4) NOT NULL,
  `obs` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`matricula`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (12346,'ELLIOT ALDERSON','1986-09-17','EDWARD ALDERSON','MAGDA ALDERSON','(11) 999999999','alderson','(11) 888888888','(11) 777777777','1CN',1,'Noite','12346.jpg',65,1,'sofre de transtorno de ansiedade social, depressão clínica, delírios e','2022-01-03 00:00:00','2021-05-04 13:07:38'),(12347,'DARLENE ALDERSON','1990-11-05','EDWARD ALDERSON','MAGDA ALDERSON','(11)98181-0909','darlenea@gmail.com','(11)98181-0909','(11)98181-0909','1CN',1,'Noite','12347.jpg',65,0,'','2022-01-03 00:00:00','2021-05-04 13:05:11'),(12348,'Matthew Farrell','1981-06-02','NÃO DECLAROADO','NÃO DECLARADO','(11) 912345678','farrell@link.com',NULL,NULL,'1CN',1,'Noite','12348.jpg',65,0,NULL,'2022-01-03 00:00:00','2022-01-03 00:00:00'),(12349,'Frederick Kaludis','1980-08-02','não declarado','não declarado',NULL,'worlock@link.com',NULL,NULL,'1CB',1,'Noite','12349.jpg',65,0,NULL,'2022-01-03 00:00:00','2022-01-03 00:00:00');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_curso` varchar(150) COLLATE utf8_bin NOT NULL,
  `tipo` enum('fic','Curso Técnico','Superior - Formação de Tecnólogo','cai','Especialização Profissional','Aperfeiçoamento Profissional','Qualificação Profissional','Iniciação Profissional','Aprendizagem Industrial','Qualificação Profissional Técnica de Nível Médio') COLLATE utf8_bin NOT NULL,
  `cor_curso` varchar(7) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (18,'Cibersegurança','Curso Técnico','#636363','2021-02-26 09:25:28','2021-02-26 09:25:28');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocorrencia`
--

DROP TABLE IF EXISTS `ocorrencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `anexo` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocorrencia`
--

LOCK TABLES `ocorrencia` WRITE;
/*!40000 ALTER TABLE `ocorrencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ocorrencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trashocorrencia`
--

DROP TABLE IF EXISTS `trashocorrencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trashocorrencia` (
  `id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `descricao` text COLLATE latin1_bin,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `excluido_at` datetime DEFAULT NULL,
  `excluido_por` varchar(45) COLLATE latin1_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trashocorrencia`
--

LOCK TABLES `trashocorrencia` WRITE;
/*!40000 ALTER TABLE `trashocorrencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `trashocorrencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(50) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(150) COLLATE utf8_bin NOT NULL,
  `data_inicio` date NOT NULL,
  `curso_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (65,'2022-1S-1CN','Primeiro Termo do Curso de Cibersegurança Noite','2022-01-02',18,'2022-01-02 19:11:11','2022-01-02 19:11:11');
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `ni` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `senha` varchar(50) COLLATE utf8_bin NOT NULL,
  `acesso` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`ni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (11111,'Professor','827ccb0eea8a706c4c34a16891f84e7b',1,'2021-02-15 12:42:19','2021-02-23 16:27:00'),(12345,'Administrador','827ccb0eea8a706c4c34a16891f84e7b',9,'2021-03-03 09:09:09','2021-05-04 13:01:04'),(33333,'Coordenador','827ccb0eea8a706c4c34a16891f84e7b',3,'2021-02-23 16:27:00','2021-03-27 15:48:55');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbcarometro'
--

--
-- Dumping routines for database 'dbcarometro'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-04 13:20:04
