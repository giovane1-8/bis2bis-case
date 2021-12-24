-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_blog
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_post`
--

DROP TABLE IF EXISTS `tb_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `nm_titulo` varchar(100) NOT NULL,
  `nm_corpo` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_post` date NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_tb_post_tb_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_tb_post_tb_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_post`
--

LOCK TABLES `tb_post` WRITE;
/*!40000 ALTER TABLE `tb_post` DISABLE KEYS */;
INSERT INTO `tb_post` VALUES (10,'Como usar pdo com PHP','<h2 style=\"margin-left: 0px;\"><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/invert()#syntax\">Syntax</a></h2><pre><code><span class=\"token function\" style=\"color: rgb(219, 0, 14);\">invert</span><span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">(</span>amount<span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">)</span>\r\n</code></pre><p>Copy to Clipboard</p><h3 style=\"margin-left: 0px;\"><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/invert()#parameters\">Parameters</a></h3><p><code>amount</code></p><p style=\"margin-left: 0px;\">The amount of the conversion, specified as a&nbsp;<a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/number\"><code>&lt;number&gt;</code></a>&nbsp;or a&nbsp;<a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/percentage\"><code>&lt;percentage&gt;</code></a>. A value of&nbsp;<code>100%</code>&nbsp;is completely inverted, while a value of&nbsp;<code>0%</code>&nbsp;leaves the input unchanged. Values between&nbsp;<code>0%</code>&nbsp;and&nbsp;<code>100%</code>&nbsp;are linear multipliers on the effect. The lacuna value for interpolation is&nbsp;<code>0</code>.</p><h2 style=\"margin-left: 0px;\"><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/invert()#examples\">Examples</a></h2><h3 style=\"margin-left: 0px;\"><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/invert()#examples_of_correct_values_for_invert\">Examples of correct values for invert()</a></h3><pre><code><span class=\"token function\" style=\"color: rgb(219, 0, 14);\">invert</span><span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">(</span>0<span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">)</span>     <span class=\"token comment\" style=\"color: rgb(109, 109, 109);\">/* No effect */</span>\r\n<span class=\"token function\" style=\"color: rgb(219, 0, 14);\">invert</span><span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">(</span>.6<span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">)</span>    <span class=\"token comment\" style=\"color: rgb(109, 109, 109);\">/* 60% inversion */</span>\r\n<span class=\"token function\" style=\"color: rgb(219, 0, 14);\">invert</span><span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">(</span>100%<span class=\"token punctuation\" style=\"color: rgb(109, 109, 109);\">)</span>  <span class=\"token comment\" style=\"color: rgb(109, 109, 109);\">/* Completely inverted */</span>\r\n</code></pre><p>Copy to Clipboard</p><h2 style=\"margin-left: 0px;\"><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/invert()#specifications\">Specifications</a></h2>',26,'2021-12-23');
/*!40000 ALTER TABLE `tb_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(45) NOT NULL,
  `nm_email` varchar(100) NOT NULL,
  `nm_senha` varchar(100) NOT NULL,
  `nm_privilegio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (26,'Giovane de Lima','giovane.gi2012@hotmail.com','MTIz','gm');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-23 18:55:18
