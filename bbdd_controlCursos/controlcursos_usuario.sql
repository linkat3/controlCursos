-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: controlcursos
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL DEFAULT 'Alumno',
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nIdentidad` varchar(10) DEFAULT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) DEFAULT NULL,
  `cial` varchar(10) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telef` varchar(10) DEFAULT NULL,
  `foto` longtext,
  PRIMARY KEY (`id`,`tipo`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `nIdentidad` (`nIdentidad`),
  UNIQUE KEY `cial` (`cial`),
  CONSTRAINT `nIdentidad` CHECK (regexp_like(`nIdentidad`,_utf8mb4'[0-9]{8}[A-Z]$|[XYZ][0-9]{7}[A-Z]$')),
  CONSTRAINT `telef` CHECK (regexp_like(`telef`,_utf8mb4'^[6-9]{1}?[0-9]{8}$'))
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (3,'Profesor','prof01','prof01@gmail.com','22222','2020-05-10 00:00:00','56673382L','Mario','Johns','Joe','22222','C Hill 25','600600601','https://img.freepik.com/vector-gratis/paquete-maestro_23-2148527524.jpg?w=740&t=st=1716554085~exp=1716554685~hmac=17d4c386ee155b061e22401f2effaec6d943393c21b7500502f66de2430a62d7'),(15,'Alumno','link','link@gmail.com','12345','2024-06-01 00:00:00','Y1137484X','Linda','Lovera','Fernandez','123456789','Calle Sabina 25','630630630','https://cdn.pixabay.com/photo/2024/05/19/19/31/ai-generated-8773215_640.jpg'),(17,'Alumno','andreaf','andre@gmail.com','12345','2024-06-03 00:00:00','12345678A','Andrea','Lovera','Fernandez','12345678','Calle 23 N 13','630630630',''),(18,'Alumno','natabef','naty@gmail.com','12345','2024-06-03 00:00:00','Y1137484Z','Natalia','Becerra','','456789','Av. Sinatra N 1','600650650',''),(19,'Alumno','daritaf','darasremon@gmail.com','123456','2024-06-03 00:00:00','12345678E','Dara','Santana','Remon','999999','616616616','616616616','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-03 13:08:07
