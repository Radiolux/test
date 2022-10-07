-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_UNIQUE` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Монітори'),(3,'Ноутбуки'),(4,'Пральні машини'),(1,'Телевізори'),(5,'Холодильники');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `prod_id` int NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `prod_name_UNIQUE` (`prod_name`),
  UNIQUE KEY `prod_id_UNIQUE` (`prod_id`),
  KEY `fk_cat_id_idx` (`cat_id`),
  CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Телевізор Panasonic NV-21',6500.00,'2022-10-04',1),(2,'Монітор Samsung T5110',12000.00,'2022-08-14',2),(3,'Холодильник BEKO BQ-35',21000.00,'2021-12-10',5),(4,'Холодильник LG 1200',18000.00,'2021-06-06',5),(5,'Пральна машина LG ZX10',16500.00,'2022-08-29',4),(6,'Ноутбук HP NG7110S',32500.00,'2022-05-01',3),(7,'Ноутбук ACER DUO 777',40200.00,'2022-03-22',3),(8,'Ноутбук ASUS QT S15',25999.00,'2022-09-11',3),(9,'Пральна машина SAMSUNG NVM-700',6500.00,'2021-01-30',4),(10,'Монітор DELL TV-T50',11600.00,'2022-04-04',2),(11,'Холодильник BOSCH M150W',30800.00,'2021-11-18',5),(12,'Монітор Samsung T5520',13800.00,'2021-10-07',2),(13,'Ноутбук ASUS GEN S880',36599.00,'2022-07-18',3),(14,'Пральна машина SAMSUNG NVS-510',12000.00,'2022-07-18',4),(15,'Пральна машина CANDY S-6500',9900.00,'2022-10-04',4),(16,'Телевізор JVC T7000',32999.00,'2020-12-15',1),(17,'Телевізор LG Gold S1 42\'\'',45000.00,'2022-06-20',1),(18,'Телевізор Panasonic QQ 64\'\'',68900.00,'2022-07-28',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-07 22:24:36
