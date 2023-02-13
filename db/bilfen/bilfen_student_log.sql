-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bilfen
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `student_log`
--

DROP TABLE IF EXISTS `student_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_log` (
  `student_id` bigint NOT NULL,
  `old_data` json DEFAULT NULL,
  `new_data` json DEFAULT NULL,
  `type` enum('INSERT','UPDATE','DELETE') COLLATE utf8mb4_general_ci NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY (`student_id`,`type`,`log_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_log`
--

LOCK TABLES `student_log` WRITE;
/*!40000 ALTER TABLE `student_log` DISABLE KEYS */;
INSERT INTO `student_log` VALUES (1,NULL,'{\"name\": \"Ahmet\", \"school\": \"Bilfen Anadolu Lisesi\", \"surname\": \"Şen\", \"schoolNumber\": 1234, \"trIdentityNumber\": 82490811328}','INSERT','2023-02-13 18:13:15'),(2,NULL,'{\"name\": \"Sena\", \"school\": \"Bilfen Bursa Anadolu Lisesi\", \"surname\": \"Tanış\", \"schoolNumber\": 1335, \"trIdentityNumber\": 12292749130}','INSERT','2023-02-13 18:13:15'),(3,NULL,'{\"name\": \"Ferhat\", \"school\": \"Bilfen İzmir Fen Lisesi\", \"surname\": \"Çam\", \"schoolNumber\": 1436, \"trIdentityNumber\": 94857704914}','INSERT','2023-02-13 18:13:15'),(3,'{\"name\": \"Ferhat\", \"school\": \"Bilfen İzmir Fen Lisesi\", \"surname\": \"Çam\", \"schoolNumber\": 1436, \"trIdentityNumber\": 94857704914}','{\"name\": \"Ferhat\", \"school\": \"Bilfen İzmir Fen Lisesi\", \"surname\": \"Şan\", \"schoolNumber\": 1436, \"trIdentityNumber\": 94857704914}','UPDATE','2023-02-13 18:14:32'),(4,NULL,'{\"name\": \"Ercan\", \"school\": \"Bilfen Üsküdar Fen Lisesi\", \"surname\": \"Demir\", \"schoolNumber\": 1537, \"trIdentityNumber\": 39373180026}','INSERT','2023-02-13 18:13:15');
/*!40000 ALTER TABLE `student_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-13 18:16:32
