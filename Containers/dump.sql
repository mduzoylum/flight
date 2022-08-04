-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: flights
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `captains`
--

DROP TABLE IF EXISTS `captains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captains`
--

LOCK TABLES `captains` WRITE;
/*!40000 ALTER TABLE `captains` DISABLE KEYS */;
INSERT INTO `captains` VALUES (1,'Aylin'),(2,'Bünyamin'),(3,'Berkay'),(4,'Ethem'),(5,'Rıza'),(6,'Ali Osman'),(7,'Mustafa'),(8,'Furkan'),(9,'Gökhan');
/*!40000 ALTER TABLE `captains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight_logs`
--

DROP TABLE IF EXISTS `flight_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight_logs` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `schedule_date` datetime NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `captain_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight_logs`
--

LOCK TABLES `flight_logs` WRITE;
/*!40000 ALTER TABLE `flight_logs` DISABLE KEYS */;
INSERT INTO `flight_logs` VALUES (2335,'PGS','2022-07-10 10:30:00','IST','AMS',1,0),(2554,'FHY','2021-12-20 10:30:00','IST','PAR',2,1),(3393,'FHY','2022-11-25 10:30:00','IST','IZM',3,0),(3445,'FHY','2022-06-10 10:30:00','BER','IST',4,0),(3448,'FHY','2022-06-09 10:30:00','IST','BER',5,0),(4566,'FHY','2021-04-10 09:45:00','IZM','IST',6,1),(6788,'THY','2022-07-08 08:30:00','IST','PAR',7,0),(9987,'FHY','2022-07-08 08:30:00','TOK','HAM',8,0),(9988,'PGS','2021-12-20 10:30:00','AMS','IST',9,1);
/*!40000 ALTER TABLE `flight_logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-04 10:24:50
