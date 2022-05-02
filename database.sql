-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ci_db
-- ------------------------------------------------------
-- Server version	5.7.37

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `b_movie_id` int(11) DEFAULT NULL,
  `b_movie_title` varchar(50) DEFAULT NULL,
  `b_slot_id` int(11) DEFAULT NULL,
  `b_slot_title` varchar(50) DEFAULT NULL,
  `b_slot_date` date DEFAULT NULL,
  `b_slot_time` varchar(50) DEFAULT NULL,
  `b_seat_id` varchar(50) DEFAULT NULL,
  `b_booked_date` datetime DEFAULT NULL,
  `b_paid_amount` int(11) DEFAULT NULL,
  `b_status` varchar(50) DEFAULT NULL,
  `b_created_at` datetime DEFAULT NULL,
  `b_updated_at` datetime DEFAULT NULL,
  `b_deleted_at` datetime DEFAULT NULL,
  `b_slot_seat_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `b_slot_seat_id_UNIQUE` (`b_slot_seat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,1,'Kabaddi 4',2,'kabaddhi 4 night show','2022-05-06','9:00 pm','seat_10','2022-04-22 00:00:00',50,'sold',NULL,NULL,NULL,'2_seat_10'),(2,1,'Kabaddi 4',2,'kabaddhi 4 night show','2022-05-06','9:00 pm','seat_21','2022-04-22 00:00:00',50,'sold',NULL,NULL,NULL,'2_seat_21'),(3,1,'Kabaddi 4',2,'kabaddhi 4 night show','2022-05-06','9:00 pm','seat_49','2022-04-22 00:00:00',50,'sold',NULL,NULL,NULL,'2_seat_49'),(4,1,'Kgf 2',3,'Kgf 2 day show','2022-04-04','9:00 pm','seat_50','2022-04-22 00:00:00',50,'sold',NULL,NULL,NULL,'3_seat_50'),(72,2,'Kgf 2',3,'kgf 2 day show','2022-04-04','12:00 pm','seat_1','2022-04-29 03:25:09',350,'sold','2022-04-29 03:25:09',NULL,NULL,'3_seat_1'),(73,2,'Kgf 2',3,'kgf 2 day show','2022-04-04','12:00 pm','seat_2','2022-04-29 03:25:09',350,'sold','2022-04-29 03:25:09',NULL,NULL,'3_seat_2'),(74,2,'Kgf 2',3,'kgf 2 day show','2022-04-04','12:00 pm','seat_3','2022-04-29 03:25:09',350,'sold','2022-04-29 03:25:09',NULL,NULL,'3_seat_3'),(75,2,'Kgf 2',3,'kgf 2 day show','2022-04-04','12:00 pm','seat_4','2022-04-29 03:25:09',350,'sold','2022-04-29 03:25:09',NULL,NULL,'3_seat_4'),(77,2,'Kgf 2',3,'kgf 2 day show','2022-04-04','12:00 pm','seat_6','2022-04-29 03:27:19',350,'sold','2022-04-29 03:27:19',NULL,NULL,'3_seat_6');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_event_name` varchar(50) DEFAULT NULL,
  `e_event_description` text,
  `e_event_date` date DEFAULT NULL,
  `e_event_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (20,'ram','hkifdd','2022-04-26','10:00 AM'),(21,'new event','hjk','2022-04-06','12:00 PM'),(22,'new event','test','2022-04-06','2:00 PM'),(24,'new events','another event','2022-04-02','1:00 PM');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_title` varchar(50) DEFAULT NULL,
  `m_short_description` varchar(255) DEFAULT NULL,
  `m_description` text,
  `m_duration` varchar(45) DEFAULT NULL,
  `m_thumbnail` varchar(255) DEFAULT NULL,
  `m_trailer` varchar(255) DEFAULT NULL,
  `m_release_date` date DEFAULT NULL,
  `m_status` int(11) DEFAULT '1',
  `m_created_at` datetime DEFAULT NULL,
  `m_updated_at` datetime DEFAULT NULL,
  `m_deleted_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (1,'Kabaddi 4','Nepali romamtic comedy movie.','Featuring Dayahang rai, saugat malla, wilson bikram rai','2hrs 30min','https://english.nepalpress.com/wp-content/uploads/2021/02/kabaddi4-home.jpg','https://www.youtube.com/embed/3GJMp1y57YA','2022-05-06',1,NULL,NULL,NULL),(2,'Kgf 2','Hindi movie','','3hrs','https://i.ytimg.com/vi/c0ROVoje6HQ/maxresdefault.jpg','https://www.youtube.com/embed/JKa05nyUmuQ','2022-04-04',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `slots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_movie_id` int(11) DEFAULT NULL,
  `s_title` varchar(100) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `s_time` varchar(50) DEFAULT NULL,
  `s_total_seats` int(11) DEFAULT NULL,
  `s_seat_price` int(11) DEFAULT NULL,
  `s_status` int(11) DEFAULT NULL,
  `s_created_at` datetime DEFAULT NULL,
  `s_updated_at` datetime DEFAULT NULL,
  `s_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slots`
--

LOCK TABLES `slots` WRITE;
/*!40000 ALTER TABLE `slots` DISABLE KEYS */;
INSERT INTO `slots` VALUES (1,1,'kabaddi 4 morning show','2022-05-06','8:00 am',50,350,1,NULL,NULL,NULL),(2,1,'kabaddhi 4 night show','2022-05-06','9:00 pm',50,350,1,NULL,NULL,NULL),(3,2,'kgf 2 day show','2022-04-04','12:00 pm',50,350,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `slots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-29 15:29:00
