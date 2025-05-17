-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: ecco_intranet
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `support_subjects`
--

DROP TABLE IF EXISTS `support_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '1',
  `department_id` bigint unsigned NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `support_subjects_name_unique` (`name`),
  KEY `support_subjects_department_id_foreign` (`department_id`),
  CONSTRAINT `support_subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `support_departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_subjects`
--

LOCK TABLES `support_subjects` WRITE;
/*!40000 ALTER TABLE `support_subjects` DISABLE KEYS */;
INSERT INTO `support_subjects` VALUES (1,'Add Downtimes',2,1,NULL,'2023-05-22 23:28:41','2023-05-23 12:48:49'),(2,'Dispute Payrolls',3,1,NULL,'2023-05-23 12:49:20','2023-05-23 12:49:20'),(3,'Confirm Hours',1,1,NULL,'2023-05-23 12:50:35','2023-05-23 12:50:35'),(4,'Computer Not Working',2,7,NULL,'2023-05-23 12:50:52','2023-05-23 12:50:52'),(5,'Internet Not Working',2,7,NULL,'2023-05-23 12:51:06','2023-09-11 15:11:01'),(6,'Move Agents',1,7,NULL,'2023-05-23 12:56:23','2023-07-14 17:01:02'),(7,'Meeting',1,6,NULL,'2023-05-23 13:39:05','2023-05-23 13:39:05'),(8,'Absence - NCNS',2,6,NULL,'2023-05-23 13:39:28','2023-05-23 13:39:28'),(9,'Employee Is Late',2,6,NULL,'2023-05-23 13:39:48','2023-05-23 13:39:48'),(10,'Letter of Employment',1,6,NULL,'2023-05-23 13:40:19','2023-05-23 13:40:19'),(11,'Collect Payment',2,6,NULL,'2023-05-23 13:40:44','2023-05-23 13:40:44'),(12,'Permission',1,6,NULL,'2023-05-23 13:41:17','2023-05-23 13:41:17'),(13,'Employee Not Feeling Well',3,6,NULL,'2023-05-23 13:41:43','2023-05-23 13:41:43'),(14,'Perform Audit',3,5,NULL,'2023-05-23 13:42:12','2023-05-23 13:42:12'),(15,'Watch Agent',1,5,NULL,'2023-05-23 13:42:30','2023-05-29 22:25:15'),(16,'Class Needed',1,6,NULL,'2023-05-23 13:42:51','2023-05-23 19:38:42'),(17,'Re-Training',2,8,NULL,'2023-05-23 13:43:36','2023-05-23 13:43:36'),(18,'Meeting Urgent',3,4,NULL,'2023-05-23 16:03:07','2023-05-23 16:03:07'),(19,'Coach Agent',4,4,NULL,'2023-05-23 16:03:47','2023-05-23 16:03:47'),(20,'Loans',1,6,NULL,'2023-05-23 19:37:26','2023-05-23 19:37:26'),(21,'Terminations Request ',2,6,NULL,'2023-05-23 19:37:50','2023-05-23 19:37:50'),(22,'Train New Class',1,8,NULL,'2023-05-29 22:27:28','2023-05-29 22:27:28'),(23,'Documentation or Contract Needed',2,8,NULL,'2023-05-29 22:27:57','2023-05-29 22:27:57'),(24,'Domain User Blocked',2,7,NULL,'2023-05-30 17:40:04','2023-09-11 15:11:24'),(25,'Building Updates',2,6,NULL,'2023-05-30 18:21:22','2023-05-30 18:21:22'),(26,'Access Key',1,7,NULL,'2023-05-31 19:17:01','2023-05-31 19:17:01'),(27,'Training Room',2,6,'Request usage of training room','2023-06-09 14:26:04','2023-06-09 14:26:04'),(28,'System Issue',2,7,NULL,'2023-06-15 13:05:51','2023-09-11 15:11:19'),(29,'User Access',2,1,NULL,'2023-07-07 13:09:01','2023-07-07 13:09:01'),(30,'Replace Computer',2,7,NULL,'2023-07-14 16:59:22','2023-09-11 15:11:12'),(31,'Create New Domain User',1,7,NULL,'2023-07-14 17:02:10','2023-07-14 17:02:15'),(32,'White List URL',2,7,NULL,'2023-07-14 17:03:14','2023-07-14 17:03:14'),(33,'Install Application',1,7,NULL,'2023-08-09 13:43:39','2023-08-09 13:43:39'),(34,'Headset',2,7,NULL,'2023-08-29 12:02:36','2023-08-29 12:02:36'),(35,'Other',2,7,NULL,'2025-03-19 14:01:07','2025-03-19 14:01:07');
/*!40000 ALTER TABLE `support_subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-15 22:58:25
