-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: volunteer
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_10_16_033539_create_volunteers_table',1),(4,'2016_10_16_173426_create_timetable_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shift_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `volunteerID1` int(10) unsigned DEFAULT NULL,
  `volunteerID2` int(10) unsigned DEFAULT NULL,
  `volunteerID3` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `timetable_volunteerid1_foreign` (`volunteerID1`),
  KEY `timetable_volunteerid2_foreign` (`volunteerID2`),
  KEY `timetable_volunteerid3_foreign` (`volunteerID3`),
  CONSTRAINT `timetable_volunteerid1_foreign` FOREIGN KEY (`volunteerID1`) REFERENCES `volunteers` (`id`),
  CONSTRAINT `timetable_volunteerid2_foreign` FOREIGN KEY (`volunteerID2`) REFERENCES `volunteers` (`id`),
  CONSTRAINT `timetable_volunteerid3_foreign` FOREIGN KEY (`volunteerID3`) REFERENCES `volunteers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (1,'Monday','9:30 AM',NULL,NULL,NULL),(2,'Monday','10:30 AM',NULL,NULL,NULL),(3,'Monday','11:30 AM',NULL,NULL,NULL),(4,'Monday','12:30 PM',NULL,NULL,NULL),(5,'Monday','1:30 PM',NULL,NULL,NULL),(6,'Monday','2:30 PM',NULL,NULL,NULL),(7,'Monday','3:30 PM',NULL,NULL,NULL),(8,'Monday','4:30 PM',NULL,NULL,NULL),(9,'Tuesday','9:30 AM',NULL,NULL,NULL),(10,'Tuesday','10:30 AM',NULL,NULL,NULL),(11,'Tuesday','11:30 AM',NULL,NULL,NULL),(12,'Tuesday','12:30 PM',NULL,NULL,NULL),(13,'Tuesday','1:30 PM',NULL,NULL,NULL),(14,'Tuesday','2:30 PM',NULL,NULL,NULL),(15,'Tuesday','3:30 PM',NULL,NULL,NULL),(16,'Tuesday','4:30 PM',NULL,NULL,NULL),(17,'Wednesday','9:30 AM',NULL,NULL,NULL),(18,'Wednesday','10:30 AM',NULL,NULL,NULL),(19,'Wednesday','11:30 AM',NULL,NULL,NULL),(20,'Wednesday','12:30 PM',NULL,NULL,NULL),(21,'Wednesday','1:30 PM',NULL,NULL,NULL),(22,'Wednesday','2:30 PM',NULL,NULL,NULL),(23,'Wednesday','3:30 PM',NULL,NULL,NULL),(24,'Wednesday','4:30 PM',NULL,NULL,NULL),(25,'Thursday','9:30 AM',NULL,NULL,NULL),(26,'Thursday','10:30 AM',NULL,NULL,NULL),(27,'Thursday','11:30 AM',NULL,NULL,NULL),(28,'Thursday','12:30 PM',NULL,NULL,NULL),(29,'Thursday','1:30 PM',NULL,NULL,NULL),(30,'Thursday','2:30 PM',NULL,NULL,NULL),(31,'Thursday','3:30 PM',NULL,NULL,NULL),(32,'Thursday','4:30 PM',NULL,NULL,NULL),(33,'Friday','9:30 AM',NULL,NULL,NULL),(34,'Friday','10:30 AM',NULL,NULL,NULL),(35,'Friday','11:30 AM',NULL,NULL,NULL),(36,'Friday','12:30 PM',NULL,NULL,NULL),(37,'Friday','1:30 PM',NULL,NULL,NULL),(38,'Friday','2:30 PM',NULL,NULL,NULL),(39,'Friday','3:30 PM',NULL,NULL,NULL),(40,'Friday','4:30 PM',NULL,NULL,NULL);
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteers`
--

DROP TABLE IF EXISTS `volunteers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `volunteers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteers`
--

LOCK TABLES `volunteers` WRITE;
/*!40000 ALTER TABLE `volunteers` DISABLE KEYS */;
/*!40000 ALTER TABLE `volunteers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-18  1:21:17
