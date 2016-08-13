CREATE DATABASE  IF NOT EXISTS `db_project_quiver` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_project_quiver`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: db_project_quiver
-- ------------------------------------------------------
-- Server version	5.7.13-log

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
-- Table structure for table `pq_audit`
--

DROP TABLE IF EXISTS `pq_audit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_audit`
--

LOCK TABLES `pq_audit` WRITE;
/*!40000 ALTER TABLE `pq_audit` DISABLE KEYS */;
INSERT INTO `pq_audit` VALUES (1,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 08:40:17'),(2,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 08:40:33'),(3,'User 11 - Briane Paul Samson with IP Address ::1 added project Shuffle.',1,'2016-08-10 08:47:26'),(4,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 08:47:32'),(5,'User 3 - Courtney Anne Ngo with IP Address ::1 logged in.',1,'2016-08-10 08:47:39'),(6,'User 3 - Courtney Anne Ngo with IP Address ::1 reviewed project 10.',1,'2016-08-10 08:47:48'),(7,'User 3 - Courtney Anne Ngo with IP Address ::1 logged out.',1,'2016-08-10 08:47:51'),(8,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 08:47:56'),(9,'User 11 - Briane Paul Samson with IP Address ::1 created account for stanley.tan@dlsu.edu.ph.',1,'2016-08-10 08:48:22'),(10,'User 11 - Briane Paul Samson with IP Address ::1 added project Test.',1,'2016-08-10 09:18:11'),(11,'User 11 - Briane Paul Samson with IP Address ::1 ran into image adding errors in add project.',1,'2016-08-10 09:21:37'),(12,'User 11 - Briane Paul Samson with IP Address ::1 added project Shuffle.',1,'2016-08-10 09:25:23'),(13,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 09:25:32'),(14,'User 3 - Courtney Anne Ngo with IP Address ::1 logged in.',1,'2016-08-10 09:25:37'),(15,'User 3 - Courtney Anne Ngo with IP Address ::1 reviewed project 10.',1,'2016-08-10 09:25:45'),(16,'User 3 - Courtney Anne Ngo with IP Address ::1 logged out.',1,'2016-08-10 14:23:02'),(17,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 14:23:07'),(18,'User 11 - Briane Paul Samson with IP Address ::1 failed to verify their identity.',1,'2016-08-10 14:23:34'),(19,'User 11 - Briane Paul Samson with IP Address ::1 failed to verify their identity.',1,'2016-08-10 14:23:44'),(20,'Anonymous user with IP Address ::1 had an invalid token on login.',1,'2016-08-10 14:24:35'),(21,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:24:53'),(22,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:24:59'),(23,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:25:14'),(24,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:25:32'),(25,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:25:47'),(26,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-10 14:25:59'),(27,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 14:26:31'),(28,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 14:26:40'),(29,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 14:26:48'),(30,'User 11 - Briane Paul Samson with IP Address ::1 failed to verify their identity.',1,'2016-08-10 14:26:57'),(31,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 14:27:14'),(32,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 14:27:22'),(33,'User 11 - Briane Paul Samson with IP Address ::1 failed to verify their identity.',1,'2016-08-10 14:28:46'),(34,'User 11 - Briane Paul Samson with IP Address ::1 verified their identity.',1,'2016-08-10 14:30:49'),(35,'User 11 - Briane Paul Samson with IP Address ::1 verified their identity.',1,'2016-08-10 14:33:00'),(36,'User 11 - Briane Paul Samson with IP Address ::1 created account for laurenz_tolentino@dlsu.edu.ph.',1,'2016-08-10 14:33:01'),(37,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-10 14:34:04'),(38,'User 15 - Laurenz Tolentino with IP Address ::1 logged in.',1,'2016-08-10 14:34:11'),(39,'User 15 - Laurenz Tolentino with IP Address ::1 ran into data validation errors on create account',1,'2016-08-10 14:41:36'),(40,'User 15 - Laurenz Tolentino with IP Address ::1 ran into data validation errors on create account',1,'2016-08-10 14:41:52'),(41,'User 15 - Laurenz Tolentino with IP Address ::1 ran into data validation errors on create account',1,'2016-08-10 14:42:31'),(42,'User 15 - Laurenz Tolentino with IP Address ::1 verified their identity.',1,'2016-08-10 14:44:06'),(43,'User 15 - Laurenz Tolentino with IP Address ::1 created account for clarisse_poblete@dlsu.edu.ph.',1,'2016-08-10 14:44:06'),(44,'User 15 - Laurenz Tolentino with IP Address ::1 ran into data validation errors on create account',1,'2016-08-10 14:46:29'),(45,'User 15 - Laurenz Tolentino with IP Address ::1 ran into data validation errors on create account',1,'2016-08-10 15:53:08'),(46,'User 15 - Laurenz Tolentino with IP Address ::1 created account for teresita.limoanco@dlsu.edu.ph.',1,'2016-08-10 15:54:27'),(47,'User 15 - Laurenz Tolentino with IP Address ::1 logged out.',1,'2016-08-10 15:54:34'),(48,'User 17 - Teresita Chan with IP Address ::1 logged in.',1,'2016-08-10 15:54:45'),(49,'User 17 - Teresita Chan with IP Address ::1 logged out.',1,'2016-08-10 15:54:47'),(50,'User 15 - Laurenz Tolentino with IP Address ::1 logged in.',1,'2016-08-10 15:54:56'),(51,'User 15 - Laurenz Tolentino with IP Address ::1 logged out.',1,'2016-08-10 15:54:58'),(52,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-10 15:55:04'),(53,'User 11 - Briane Paul Samson with IP Address ::1 was idle for too long.',1,'2016-08-12 16:14:31'),(54,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-12 16:14:31'),(55,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-12 16:15:37'),(56,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-12 16:19:31'),(57,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-12 16:19:38'),(58,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-12 16:20:34'),(59,'User 3 - Courtney Anne Ngo with IP Address ::1 logged in.',1,'2016-08-12 16:20:46'),(60,'User 3 - Courtney Anne Ngo with IP Address ::1 logged out.',1,'2016-08-13 11:46:11'),(61,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:48:10'),(62,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:48:19'),(63,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:48:43'),(64,'Anonymous user with IP Address ::1 failed to log in as courtney.ngo@dlsu.edu.ph.',1,'2016-08-13 11:48:50'),(65,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:51:03'),(66,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:51:51'),(67,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-13 11:55:40'),(68,'User 11 - Briane Paul Samson with IP Address ::1 logged out.',1,'2016-08-13 11:55:44'),(69,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 11:55:50'),(70,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:06:50'),(71,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:07:38'),(72,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:09:01'),(73,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:09:44'),(74,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:10:00'),(75,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:10:43'),(76,'Anonymous user with IP Address ::1 had an invalid token on login.',1,'2016-08-13 12:12:35'),(77,'Anonymous user with IP Address ::1 had an invalid token on login.',1,'2016-08-13 12:13:37'),(78,'Anonymous user with IP Address ::1 ran into the error Locked for 6 minutes.',1,'2016-08-13 12:19:20'),(79,'Anonymous user with IP Address ::1 ran into the error Locked for 5 minutes.',1,'2016-08-13 12:20:09'),(80,'Anonymous user with IP Address ::1 ran into the error Locked for 5 minutes.',1,'2016-08-13 12:20:10'),(81,'Anonymous user with IP Address ::1 ran into the error Locked for 5 minutes.',1,'2016-08-13 12:20:31'),(82,'Anonymous user with IP Address ::1 ran into the error Locked for 4 minutes.',1,'2016-08-13 12:21:18'),(83,'Anonymous user with IP Address ::1 ran into the error Locked for 3 minutes.',1,'2016-08-13 12:21:44'),(84,'Anonymous user with IP Address ::1 ran into the error Locked for 3 minutes.',1,'2016-08-13 12:22:06'),(85,'Anonymous user with IP Address ::1 ran into the error Locked for 2 minutes.',1,'2016-08-13 12:22:52'),(86,'Anonymous user with IP Address ::1 ran into the error Locked for 1 minutes.',1,'2016-08-13 12:23:49'),(87,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:25:47'),(88,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:25:52'),(89,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:25:57'),(90,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:26:03'),(91,'Anonymous user with IP Address ::1 ran into the error Locked out for 15 minutes.',1,'2016-08-13 12:26:39'),(92,'Anonymous user with IP Address ::1 ran into the error Locked for 14 minutes.',1,'2016-08-13 12:26:45'),(93,'Anonymous user with IP Address ::1 ran into the error Account is expired.',1,'2016-08-13 12:27:34'),(94,'Anonymous user with IP Address ::1 failed to log in as briane.samson@dlsu.edu.ph.',1,'2016-08-13 12:27:49'),(95,'Anonymous user with IP Address ::1 ran into the error Account is expired.',1,'2016-08-13 12:28:29'),(96,'Anonymous user with IP Address ::1 ran into the error Locked for 12 minutes.',1,'2016-08-13 12:28:50'),(97,'User 11 - Briane Paul Samson with IP Address ::1 logged in.',1,'2016-08-13 12:29:21');
/*!40000 ALTER TABLE `pq_audit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project`
--

DROP TABLE IF EXISTS `pq_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `class` varchar(45) NOT NULL,
  `abstract` text,
  `description` text,
  `review` text,
  `reviewer` int(11) DEFAULT NULL,
  `forJudging` tinyint(1) NOT NULL DEFAULT '1',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pq_projectfk_1` (`reviewer`),
  KEY `pq_projectidx_1` (`name`),
  CONSTRAINT `pq_projectfk_1` FOREIGN KEY (`reviewer`) REFERENCES `pq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project`
--

LOCK TABLES `pq_project` WRITE;
/*!40000 ALTER TABLE `pq_project` DISABLE KEYS */;
INSERT INTO `pq_project` VALUES (1,'Wheel of Fortune','Desktop Application','Wheel of Fortune simulation for COMPRO2','Wheel of Fortune simulation for COMPRO2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',4,0,'2016-08-03 11:22:11',1),(2,'Animon','Desktop Application','ANIMON','ANIMON','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',4,0,'2016-08-03 11:31:22',1),(3,'Expert System for Dizziness','Desktop Application','An Expert System which diagnoses what kind of dizziness you have.','An Expert System which diagnoses what kind of dizziness you have using PROLOG.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',2,0,'2016-08-03 11:34:54',1),(4,'Custom P2P App','Desktop Application','Network app for NETWORK.','Network app for NETWORK.',NULL,NULL,1,'2016-08-03 11:53:04',0),(5,'Custom P2P App','Desktop Application','Network app for NETWORK.','Network app for NETWORK.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',1,0,'2016-08-03 11:54:40',1),(6,'Yahtzee Statistical Adviser','Desktop Application','Statistical Adviser for Yahtzee','Statistical Adviser for Yahtzee','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',2,0,'2016-08-03 12:03:01',1),(7,'Graphics Manipulator','Desktop Application','Using matrices to work with graphics','Using matrices to work with graphics','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',1,0,'2016-08-03 12:08:37',1),(8,'Sheep Simulator','Web Application','Simulates Sheep','Simulates Sheep','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',6,0,'2016-08-03 12:10:28',1),(9,'Maestro','Desktop Application','A language for compiling music','A language for compiling music','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras pharetra auctor diam sed blandit. Fusce porttitor justo at sapien commodo, in lacinia nisl rhoncus. Sed ullamcorper imperdiet ex eget condimentum. Nunc orci justo, blandit vel ligula consequat, venenatis tincidunt felis. Aenean at elit malesuada, ullamcorper metus ac, fermentum sem. Nullam tristique at est sit amet pretium. Phasellus dignissim, mauris at pellentesque vulputate, tortor odio facilisis ante, in placerat odio eros in velit. Etiam eu faucibus erat.',6,0,'2016-08-03 12:12:41',1),(10,'Shuffle','Mobile Application','A song guessing game for Android','A song guessing game for Android','This is a great app.',2,0,'2016-08-10 17:25:23',1);
/*!40000 ALTER TABLE `pq_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project_grades`
--

DROP TABLE IF EXISTS `pq_project_grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project_grades` (
  `id` int(11) NOT NULL,
  `criteriaNo` int(11) NOT NULL,
  `grade` float NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`criteriaNo`),
  CONSTRAINT `pq_project_gradesfk_1` FOREIGN KEY (`id`) REFERENCES `pq_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project_grades`
--

LOCK TABLES `pq_project_grades` WRITE;
/*!40000 ALTER TABLE `pq_project_grades` DISABLE KEYS */;
INSERT INTO `pq_project_grades` VALUES (1,0,10,'2016-08-03 12:17:22',1),(1,1,10,'2016-08-03 12:17:22',1),(1,2,10,'2016-08-03 12:17:22',1),(1,3,10,'2016-08-03 12:17:22',1),(2,0,10,'2016-08-03 12:17:18',1),(2,1,10,'2016-08-03 12:17:18',1),(2,2,10,'2016-08-03 12:17:18',1),(2,3,10,'2016-08-03 12:17:18',1),(3,0,10,'2016-08-03 12:16:59',1),(3,1,10,'2016-08-03 12:16:59',1),(3,2,10,'2016-08-03 12:16:59',1),(3,3,10,'2016-08-03 12:16:59',1),(5,0,10,'2016-08-03 12:17:43',1),(5,1,10,'2016-08-03 12:17:43',1),(5,2,10,'2016-08-03 12:17:43',1),(5,3,10,'2016-08-03 12:17:43',1),(6,0,10,'2016-08-03 12:16:54',1),(6,1,10,'2016-08-03 12:16:54',1),(6,2,10,'2016-08-03 12:16:54',1),(6,3,10,'2016-08-03 12:16:54',1),(7,0,10,'2016-08-03 12:17:39',1),(7,1,10,'2016-08-03 12:17:39',1),(7,2,10,'2016-08-03 12:17:39',1),(7,3,10,'2016-08-03 12:17:39',1),(8,0,10,'2016-08-03 12:16:31',1),(8,1,10,'2016-08-03 12:16:31',1),(8,2,10,'2016-08-03 12:16:31',1),(8,3,10,'2016-08-03 12:16:31',1),(9,0,10,'2016-08-03 12:16:27',1),(9,1,10,'2016-08-03 12:16:27',1),(9,2,10,'2016-08-03 12:16:27',1),(9,3,10,'2016-08-03 12:16:27',1),(10,0,10,'2016-08-10 17:25:45',1),(10,1,10,'2016-08-10 17:25:45',1),(10,2,10,'2016-08-10 17:25:45',1),(10,3,10,'2016-08-10 17:25:45',1);
/*!40000 ALTER TABLE `pq_project_grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project_images`
--

DROP TABLE IF EXISTS `pq_project_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project_images` (
  `id` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`image`),
  CONSTRAINT `pq_project_imagesfk_1` FOREIGN KEY (`id`) REFERENCES `pq_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project_images`
--

LOCK TABLES `pq_project_images` WRITE;
/*!40000 ALTER TABLE `pq_project_images` DISABLE KEYS */;
INSERT INTO `pq_project_images` VALUES (1,'uploads/1/1.png','2016-08-03 11:22:12',1),(1,'uploads/1/2.png','2016-08-03 11:22:12',1),(1,'uploads/1/3.png','2016-08-03 11:22:12',1),(1,'uploads/1/4.png','2016-08-03 11:22:12',1),(1,'uploads/1/5.png','2016-08-03 11:22:12',1),(2,'uploads/2/1.png','2016-08-03 11:31:23',1),(2,'uploads/2/2.png','2016-08-03 11:31:23',1),(2,'uploads/2/3.png','2016-08-03 11:31:23',1),(2,'uploads/2/4.png','2016-08-03 11:31:23',1),(2,'uploads/2/5.png','2016-08-03 11:31:23',1),(2,'uploads/2/6.png','2016-08-03 11:31:23',1),(2,'uploads/2/7.png','2016-08-03 11:31:23',1),(2,'uploads/2/8.png','2016-08-03 11:31:23',1),(3,'uploads/3/1.png','2016-08-03 11:34:54',1),(3,'uploads/3/10.png','2016-08-03 11:34:54',1),(3,'uploads/3/11.png','2016-08-03 11:34:54',1),(3,'uploads/3/2.png','2016-08-03 11:34:54',1),(3,'uploads/3/3.png','2016-08-03 11:34:54',1),(3,'uploads/3/4.png','2016-08-03 11:34:54',1),(3,'uploads/3/5.png','2016-08-03 11:34:54',1),(3,'uploads/3/6.png','2016-08-03 11:34:54',1),(3,'uploads/3/7.png','2016-08-03 11:34:54',1),(3,'uploads/3/8.png','2016-08-03 11:34:54',1),(3,'uploads/3/9.png','2016-08-03 11:34:54',1),(5,'uploads/5/1.png','2016-08-03 11:54:40',1),(5,'uploads/5/2.png','2016-08-03 11:54:40',1),(6,'uploads/6/1.png','2016-08-03 12:03:01',1),(6,'uploads/6/2.png','2016-08-03 12:03:01',1),(6,'uploads/6/3.png','2016-08-03 12:03:01',1),(6,'uploads/6/4.png','2016-08-03 12:03:01',1),(6,'uploads/6/5.png','2016-08-03 12:03:01',1),(6,'uploads/6/6.png','2016-08-03 12:03:01',1),(7,'uploads/7/1.png','2016-08-03 12:08:37',1),(7,'uploads/7/2.png','2016-08-03 12:08:37',1),(7,'uploads/7/3.png','2016-08-03 12:08:37',1),(8,'uploads/8/1.png','2016-08-03 12:10:29',1),(8,'uploads/8/2.png','2016-08-03 12:10:29',1),(8,'uploads/8/3.png','2016-08-03 12:10:29',1),(8,'uploads/8/4.png','2016-08-03 12:10:29',1),(8,'uploads/8/5.png','2016-08-03 12:10:29',1),(8,'uploads/8/6.png','2016-08-03 12:10:29',1),(8,'uploads/8/7.png','2016-08-03 12:10:29',1),(8,'uploads/8/8.png','2016-08-03 12:10:29',1),(9,'uploads/9/1.png','2016-08-03 12:12:41',1),(10,'uploads/10/1.png','2016-08-10 17:25:23',1),(10,'uploads/10/10.png','2016-08-10 17:25:23',1),(10,'uploads/10/11.png','2016-08-10 17:25:23',1),(10,'uploads/10/12.jpg','2016-08-10 17:25:23',1),(10,'uploads/10/2.png','2016-08-10 17:25:23',1),(10,'uploads/10/3.png','2016-08-10 17:25:23',1),(10,'uploads/10/4.png','2016-08-10 17:25:23',1),(10,'uploads/10/5.png','2016-08-10 17:25:23',1),(10,'uploads/10/6.png','2016-08-10 17:25:23',1),(10,'uploads/10/7.png','2016-08-10 17:25:23',1),(10,'uploads/10/8.png','2016-08-10 17:25:23',1),(10,'uploads/10/9.png','2016-08-10 17:25:23',1);
/*!40000 ALTER TABLE `pq_project_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project_recogs`
--

DROP TABLE IF EXISTS `pq_project_recogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project_recogs` (
  `id` int(11) NOT NULL,
  `recog` varchar(45) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`recog`),
  CONSTRAINT `pq_project_recogsfk_1` FOREIGN KEY (`id`) REFERENCES `pq_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project_recogs`
--

LOCK TABLES `pq_project_recogs` WRITE;
/*!40000 ALTER TABLE `pq_project_recogs` DISABLE KEYS */;
/*!40000 ALTER TABLE `pq_project_recogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project_students`
--

DROP TABLE IF EXISTS `pq_project_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project_students` (
  `projectId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`projectId`,`studentId`),
  KEY `pq_project_studentsfk_2` (`studentId`),
  CONSTRAINT `pq_project_studentsfk_1` FOREIGN KEY (`projectId`) REFERENCES `pq_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pq_project_studentsfk_2` FOREIGN KEY (`studentId`) REFERENCES `pq_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project_students`
--

LOCK TABLES `pq_project_students` WRITE;
/*!40000 ALTER TABLE `pq_project_students` DISABLE KEYS */;
INSERT INTO `pq_project_students` VALUES (1,5,'2016-08-03 11:22:12',1),(2,5,'2016-08-03 11:31:22',1),(2,8,'2016-08-03 11:31:22',1),(3,5,'2016-08-03 11:34:54',1),(3,10,'2016-08-03 11:34:54',1),(3,12,'2016-08-03 11:34:54',1),(4,5,'2016-08-03 11:53:04',1),(4,9,'2016-08-03 11:53:04',1),(5,5,'2016-08-03 11:54:40',1),(5,9,'2016-08-03 11:54:40',1),(6,5,'2016-08-03 12:03:01',1),(6,10,'2016-08-03 12:03:01',1),(6,14,'2016-08-03 12:03:01',1),(7,5,'2016-08-03 12:08:37',1),(7,7,'2016-08-03 12:08:37',1),(7,9,'2016-08-03 12:08:37',1),(7,15,'2016-08-03 12:08:37',1),(8,5,'2016-08-03 12:10:29',1),(8,10,'2016-08-03 12:10:29',1),(8,12,'2016-08-03 12:10:29',1),(8,16,'2016-08-03 12:10:29',1),(9,5,'2016-08-03 12:12:41',1),(9,10,'2016-08-03 12:12:41',1),(9,12,'2016-08-03 12:12:41',1),(9,16,'2016-08-03 12:12:41',1),(10,5,'2016-08-10 17:25:23',1),(10,8,'2016-08-10 17:25:23',1);
/*!40000 ALTER TABLE `pq_project_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_project_tags`
--

DROP TABLE IF EXISTS `pq_project_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_project_tags` (
  `id` int(11) NOT NULL,
  `tag` varchar(45) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`tag`),
  CONSTRAINT `pq_project_tagsfk_1` FOREIGN KEY (`id`) REFERENCES `pq_project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project_tags`
--

LOCK TABLES `pq_project_tags` WRITE;
/*!40000 ALTER TABLE `pq_project_tags` DISABLE KEYS */;
INSERT INTO `pq_project_tags` VALUES (1,'C','2016-08-03 11:22:12',1),(1,'Linked Lists','2016-08-03 11:22:12',1),(2,'OOP','2016-08-03 11:31:22',1),(2,'Pokemon Simulation','2016-08-03 11:31:22',1),(3,'Expert System','2016-08-03 11:34:54',1),(3,'Prolog','2016-08-03 11:34:54',1),(4,'Application Layer','2016-08-03 11:53:04',1),(4,'Socket Programming','2016-08-03 11:53:04',1),(5,'Application Layer','2016-08-03 11:54:40',1),(5,'Socket Programming','2016-08-03 11:54:40',1),(6,'Probability','2016-08-03 12:03:01',1),(6,'Statistics','2016-08-03 12:03:01',1),(6,'Yahtzee','2016-08-03 12:03:01',1),(7,'Conic Sections','2016-08-03 12:08:37',1),(7,'Linear Algebra','2016-08-03 12:08:37',1),(8,'Distributed Systems','2016-08-03 12:10:29',1),(8,'Sheep','2016-08-03 12:10:29',1),(9,'Compiler Theory','2016-08-03 12:12:41',1),(9,'LR Parser','2016-08-03 12:12:41',1),(9,'Music','2016-08-03 12:12:41',1),(10,'Android','2016-08-10 17:25:23',1),(10,'Music','2016-08-10 17:25:23',1);
/*!40000 ALTER TABLE `pq_project_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_student`
--

DROP TABLE IF EXISTS `pq_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idNo` char(8) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idNo` (`idNo`),
  KEY `pq_studentsidx_1` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_student`
--

LOCK TABLES `pq_student` WRITE;
/*!40000 ALTER TABLE `pq_student` DISABLE KEYS */;
INSERT INTO `pq_student` VALUES (1,'11312121','John','Collantes','johncollantes@dlsu.edu.ph','2016-02-13 02:13:08',1),(2,'11312122','John','Hipe','johnHipe@dlsu.edu.ph','2016-02-13 02:13:08',1),(3,'11312123','John','Sorilla','johnSorilla@dlsu.edu.ph','2016-02-13 02:13:08',1),(4,'11312124','John','Tolentino','johnTolentino@dlsu.edu.ph','2016-02-13 02:13:08',1),(5,'11323604','Ryan Austin','Fernandez','ryan_fernandez@dlsu.edu.ph','2016-06-21 15:58:03',1),(6,'11335459','Victoria Angela','Acorda','victoria_acorda@dlsu.edu.ph','2016-06-21 16:02:05',1),(7,'11334223','Angelo John','Amadora','angelo_amadora@dlsu.edu.ph','2016-06-21 16:02:05',1),(8,'11327278','Alden Luc','Hade','alden_hade@dlsu.edu.ph','2016-06-21 16:04:57',1),(9,'11336579','Jonah','Syfu','jonah_syfu@dlsu.edu.ph','2016-06-21 16:04:57',1),(10,'11336617','Marc Dominic','San Pedro','marc_sanpedro@dlsu.edu.ph','2016-06-21 17:40:06',1),(11,'11238374','Kanga','Kanga','kanga@dlsu.edu.ph','2016-07-07 11:03:07',1),(12,'11321792','Clarisse','Poblete','clarisse_poblete@dlsu.edu.ph','2016-07-23 01:49:40',1),(13,'11314320','Johansson','Tan','johansson_tan@dlsu.edu.ph','2016-07-23 01:49:40',1),(14,'11311061','Kenneth','Wang','kenneth_wang@dlsu.edu.ph','2016-08-03 12:03:01',1),(15,'11330236','Joseph John','Andres','joseph_andres@dlsu.edu.ph','2016-08-03 12:08:37',1),(16,'11314230','Johansson','Tan','johansson_tan@dlsu.edu.ph','2016-08-03 12:10:28',1),(17,'11312604','ini','oj','i@dlsu.edu.ph','2016-08-10 13:42:43',1);
/*!40000 ALTER TABLE `pq_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_user`
--

DROP TABLE IF EXISTS `pq_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userType` int(11) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `loginAttempts` int(11) NOT NULL DEFAULT '0',
  `endLock` datetime DEFAULT NULL,
  `expiresOn` datetime DEFAULT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `userfk_1_idx` (`userType`),
  CONSTRAINT `userfk_1` FOREIGN KEY (`userType`) REFERENCES `pq_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user`
--

LOCK TABLES `pq_user` WRITE;
/*!40000 ALTER TABLE `pq_user` DISABLE KEYS */;
INSERT INTO `pq_user` VALUES (1,2,'thomas.tiamlee@dlsu.edu.ph','$2y$10$aNCro/Z9jEiXgYqdsytOou2Oca.cVyw8zRLTP/Mylot5BLqlxMO.i','Thomas James','Tiam-Lee',0,NULL,'2017-08-13 19:43:32','2016-07-12 21:55:49',1),(2,2,'courtney.ngo@dlsu.edu.ph','$2y$10$Wa5b1vaABYjiI6dRYHCdpebpAjLs6JqqGrFINUUzTN.iBv4J0tJnK','Courtney Anne','Ngo',0,NULL,'2017-08-13 19:48:50','2016-07-19 16:20:58',1),(3,2,'angelo_amadora@dlsu.edu.ph','$2y$10$HYjhIWVuHJEBNV/xAZH3ZeN23aRAXJR5QT4Oei24twl87mfqc0F2W','Angelo','Amadora',0,NULL,'2017-08-13 19:43:32','2016-07-19 16:34:57',1),(4,1,'briane.samson@dlsu.edu.ph','$2y$10$2oeCIp.o0EQ3.1K33YS4cOWQ4BTEntwmHurf1AxgLWCeJIZ7k7cz6','Briane Paul','Samson',0,NULL,'2017-08-13 20:29:21','2016-07-22 22:13:02',1),(5,1,'matthew_allen_go@dlsu.edu.ph','$2y$10$Y1d5zPPCe1eeGk98Q6g/K.Rn/J4Qo55Al0x4JydxO0M.Ci1dRR/Zu','Matthew','Go',0,NULL,'2017-08-13 19:43:32','2016-07-23 01:29:21',1),(6,2,'solomon.see@delasalle.ph','$2y$10$RqPfLa2lB2ezS1/sXj9QKedoJsVsPsdPDDrtN2xPimB4S1h.CkpvC','Solomon','See',0,NULL,'2017-08-13 19:43:32','2016-07-23 01:50:12',1),(7,2,'stanley.tan@dlsu.edu.ph','$2y$10$nGue1sw6B0b/X7r1CTgpNuH/UujPTk6it2wyRQshhI4pcJ/y0P4CS','Daniel Stanley','Tan',0,NULL,'2017-08-13 19:43:32','2016-08-10 16:48:22',1),(8,1,'laurenz_tolentino@dlsu.edu.ph','$2y$10$HxwwZLYFPxaZPMmhWaaHbOOXA9hxKN7rc4HiSFJnoVoT66LIAuODK','Laurenz','Tolentino',0,NULL,'2017-08-13 19:43:32','2016-08-10 22:33:00',1),(9,1,'clarisse_poblete@dlsu.edu.ph','$2y$10$v3yU7OIbMHqlMuOnPoE.puwqOvy6rFn2NYJSfE8rnf68AqqmpVXB.','Clarisse Felicia','Poblete',0,NULL,'2017-08-13 19:43:32','2016-08-10 22:44:06',1),(10,2,'teresita.limoanco@dlsu.edu.ph','$2y$10$BgSMWppZbEszVniTThNRfOfKVN4lkouRxpvtK69PCyx8ZHX0sdmAS','Teresita','Chan',0,NULL,'2017-08-13 19:43:32','2016-08-10 23:54:27',1);
/*!40000 ALTER TABLE `pq_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pq_user_type`
--

DROP TABLE IF EXISTS `pq_user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `addProject` tinyint(1) NOT NULL DEFAULT '0',
  `judgeProject` tinyint(1) NOT NULL DEFAULT '0',
  `createUser` tinyint(1) NOT NULL DEFAULT '0',
  `deleteUser` tinyint(1) NOT NULL DEFAULT '0',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user_type`
--

LOCK TABLES `pq_user_type` WRITE;
/*!40000 ALTER TABLE `pq_user_type` DISABLE KEYS */;
INSERT INTO `pq_user_type` VALUES (1,'admin',1,1,1,1,'2016-03-03 10:03:47',1),(2,'faculty',1,1,0,0,'2016-03-03 10:03:47',1);
/*!40000 ALTER TABLE `pq_user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-13 20:31:13
