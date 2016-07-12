CREATE DATABASE  IF NOT EXISTS `db_project_quiver` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_project_quiver`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_project_quiver
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
  `review` varchar(512) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL,
  `forJudging` tinyint(1) NOT NULL DEFAULT '1',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pq_projectfk_1` (`reviewer`),
  KEY `pq_projectidx_1` (`name`),
  CONSTRAINT `pq_projectfk_1` FOREIGN KEY (`reviewer`) REFERENCES `pq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project`
--

LOCK TABLES `pq_project` WRITE;
/*!40000 ALTER TABLE `pq_project` DISABLE KEYS */;
INSERT INTO `pq_project` VALUES (1,'ShareZone','Mobile Application','ShareZone allows you to share and transfer files from multiple different devices with each other with just a web browser and your smartphone.','Simpatico is a text simplification system that makes us of lexical and syntactic simplification methods in order to simplify legalese to plain English in which a majority of the Philippine population can understand. It makes use of various existing NLP tools in order to carry out tasks like multiword extraction and word sense disambiguation.',NULL,NULL,0,'2016-02-13 02:13:07',1),(2,'HackerCup','Web Application','This amazing website is more than just a registration page, it\'s a piece of modern art. With flying particles in the background, eye-catching color palette, and useless once the event is finished, the site is still a reminder of what can be achieved through highly practiced procrastination techniques from one of the nation\'s best procrastinators.',NULL,NULL,NULL,0,'2016-02-13 02:13:08',1),(3,'Optimus Prime','Robotics Hardware','Optimus Prime is consistently depicted as having strong moral character, excellent leadership, and sound decision-making skills, and possesses brilliant military tactics, powerful martial arts, and advanced alien weaponry. Optimus Prime has a strong sense of honor and justice, being dedicated to building peaceful and mutually beneficial co-existence with humans, the protection of life and liberty of all sentient species.',NULL,NULL,NULL,0,'2016-02-13 02:14:37',1),(4,'ShareZone v2','Mobile Application','ShareZone allows you to share and transfer files from multiple different devices with each other with just a web browser and your smartphone.','Simpatico is a text simplification system that makes us of lexical and syntactic simplification methods in order to simplify legalese to plain English in which a majority of the Philippine population can understand. It makes use of various existing NLP tools in order to carry out tasks like multiword extraction and word sense disambiguation.',NULL,NULL,1,'2016-02-13 07:30:07',1),(5,'Quiver','Web Application','weqr','qwer','Beri Gud project',1,1,'2016-03-03 09:47:26',0),(6,'Shuffle','Mobile Application',NULL,NULL,NULL,NULL,1,'2016-06-11 05:57:26',0),(7,'Loot','Mobile Application',NULL,NULL,NULL,NULL,1,'2016-06-11 05:59:00',0),(8,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:00:12',0),(9,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:00:47',0),(10,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:01:36',0),(11,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:02:14',0),(12,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:05:01',0),(13,'Loot','Mobile Application','Loot','Looooot',NULL,NULL,1,'2016-06-11 06:06:15',1),(14,'Borrowise','Mobile Application','Borrowise','Booorroowiiise',NULL,NULL,1,'2016-06-11 06:07:29',1),(15,'Tap Tap Eat','Mobile Application','Kain','KAAIN',NULL,NULL,1,'2016-06-11 06:08:14',1),(16,'The Multimedia Terminal','Web Application','Blah','Blaah',NULL,NULL,1,'2016-06-11 06:10:55',1),(17,'The Multimedia Terminal','Web Application','Blah','Blaah',NULL,NULL,1,'2016-06-11 06:12:46',0),(18,'Project Aegis','Web Application','Sample','Lorem ipsum',NULL,NULL,1,'2016-06-11 09:05:07',1),(19,'Test','Desktop Application','Test','Test',NULL,NULL,1,'2016-06-11 09:11:13',1),(20,'Project Quiver','Web Application','Lorem Ipsum','Lorem Ipsum',NULL,NULL,1,'2016-06-21 16:02:04',1),(21,'Shuffle','Mobile Application','Shuffle is a mobile game wherein the user guesses certain details about songs such as artist, album, or title (depending on the game difficulty) within a restriction such as time limit or until the album is over. The general objective is to provide a fun outlet for users to test their knowledge on their favorite music. Specifically, it is to provide the user with a way to guess certain details of certain songs within a set time limit or to do the same for a certain finite amount of songs.','The process begins with the user selecting a game difficulty, which could be changed at any time in the settings. Afterwards, the user selects a selection of songs, whether it be an artist, a playlist, an album, or their entire music library. The user then selects a game mode, either Time Attack, where they are given 135 seconds, or Song Rush, where they must guess as many songs in the selected playlist. After the game, they may record their stats under a name.',NULL,NULL,1,'2016-06-21 16:04:56',1),(22,'Wheel of Fortune','Desktop Application','Wheel','Wheel',NULL,NULL,1,'2016-06-21 16:11:33',1),(23,'Pussy Slayer','Web Application','Pussy','Slayer',NULL,NULL,1,'2016-06-21 17:40:06',1);
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
INSERT INTO `pq_project_grades` VALUES (1,0,9,'2016-02-13 02:13:07',1),(1,1,9,'2016-02-13 02:13:07',1),(1,2,6,'2016-02-13 02:13:07',1),(1,3,9,'2016-02-13 02:13:07',1),(2,0,10,'2016-02-13 02:13:08',1),(2,1,10,'2016-02-13 02:13:08',1),(2,2,5,'2016-02-13 02:13:08',1),(2,3,10,'2016-02-13 02:13:08',1),(3,0,8,'2016-02-13 02:14:37',1),(3,1,9,'2016-02-13 02:14:37',1),(3,2,10,'2016-02-13 02:14:37',1),(3,3,9,'2016-02-13 02:14:37',1),(4,0,10,'2016-02-13 07:30:07',1),(4,1,9,'2016-02-13 07:30:07',1),(4,2,6,'2016-02-13 07:30:07',1),(4,3,9,'2016-02-13 07:30:07',1),(5,0,10,'2016-03-03 10:43:26',1),(5,1,9,'2016-03-03 10:43:26',1),(5,2,8,'2016-03-03 10:43:26',1),(5,3,8,'2016-03-03 10:43:26',1);
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
INSERT INTO `pq_project_images` VALUES (15,'uploads/15/1.jpg','2016-06-11 06:08:14',1),(15,'uploads/15/2.jpg','2016-06-11 06:08:14',1),(16,'uploads/16/1.jpg','2016-06-11 06:10:55',1),(16,'uploads/16/2.jpg','2016-06-11 06:10:55',1),(16,'uploads/16/3.jpg','2016-06-11 06:10:55',1),(16,'uploads/16/4.jpg','2016-06-11 06:10:55',1),(16,'uploads/16/5.jpg','2016-06-11 06:10:55',1),(17,'uploads/17/1.jpg','2016-06-11 06:12:46',1),(17,'uploads/17/2.jpg','2016-06-11 06:12:46',1),(17,'uploads/17/3.jpg','2016-06-11 06:12:46',1),(17,'uploads/17/4.jpg','2016-06-11 06:12:46',1),(17,'uploads/17/5.jpg','2016-06-11 06:12:46',1),(18,'uploads/18/1.jpg','2016-06-11 09:05:07',1),(18,'uploads/18/2.jpg','2016-06-11 09:05:07',1),(18,'uploads/18/3.jpg','2016-06-11 09:05:07',1),(19,'uploads/19/1.jpg','2016-06-11 09:11:13',1),(19,'uploads/19/2.jpg','2016-06-11 09:11:13',1),(19,'uploads/19/3.jpg','2016-06-11 09:11:13',1),(20,'uploads/20/1.png','2016-06-21 16:02:05',1),(21,'uploads/21/1.jpg','2016-06-21 16:04:57',1),(23,'uploads/23/1.jpg','2016-06-21 17:40:07',1);
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
INSERT INTO `pq_project_recogs` VALUES (1,'Best in Mobile','2016-02-13 02:13:08',1),(2,'Best in Category','2016-02-13 02:13:08',1),(3,'Best in Robotics','2016-02-13 02:14:38',1),(4,'Best in Mobile','2016-02-13 07:30:08',1);
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
INSERT INTO `pq_project_students` VALUES (1,1,'2016-02-13 02:13:08',1),(1,2,'2016-02-13 02:13:08',1),(1,3,'2016-02-13 02:13:08',1),(1,4,'2016-02-13 02:13:08',1),(2,1,'2016-02-13 02:13:08',1),(2,2,'2016-02-13 02:13:08',1),(2,3,'2016-02-13 02:13:08',1),(2,4,'2016-02-13 02:13:08',1),(3,1,'2016-02-13 02:14:38',1),(3,2,'2016-02-13 02:14:38',1),(3,3,'2016-02-13 02:14:38',1),(3,4,'2016-02-13 02:14:38',1),(4,1,'2016-02-13 07:30:08',1),(4,2,'2016-02-13 07:30:08',1),(4,3,'2016-02-13 07:30:08',1),(4,4,'2016-02-13 07:30:08',1),(20,5,'2016-06-21 16:02:05',1),(20,6,'2016-06-21 16:02:05',1),(20,7,'2016-06-21 16:02:05',1),(21,5,'2016-06-21 16:04:57',1),(21,8,'2016-06-21 16:04:57',1),(21,9,'2016-06-21 16:04:57',1),(22,5,'2016-06-21 16:11:33',1),(23,10,'2016-06-21 17:40:07',1);
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
INSERT INTO `pq_project_tags` VALUES (1,'CS-ST','2016-02-13 02:13:08',1),(1,'Lexical Simplification','2016-02-13 02:13:08',1),(1,'NLP','2016-02-13 02:13:08',1),(1,'Standford NLP','2016-02-13 02:13:08',1),(1,'Text Simplification','2016-02-13 02:13:08',1),(1,'Thesis','2016-02-13 02:13:08',1),(2,'CS-ST','2016-02-13 02:13:08',1),(2,'Lexical Simplification','2016-02-13 02:13:08',1),(2,'NLP','2016-02-13 02:13:08',1),(2,'Standford NLP','2016-02-13 02:13:08',1),(2,'Text Simplification','2016-02-13 02:13:08',1),(2,'Thesis','2016-02-13 02:13:08',1),(3,'CS-ST','2016-02-13 02:14:38',1),(3,'Lexical Simplification','2016-02-13 02:14:38',1),(3,'NLP','2016-02-13 02:14:38',1),(3,'Standford NLP','2016-02-13 02:14:38',1),(3,'Text Simplification','2016-02-13 02:14:38',1),(3,'Thesis','2016-02-13 02:14:38',1),(4,'CS-ST','2016-02-13 07:30:08',1),(4,'Lexical Simplification','2016-02-13 07:30:08',1),(4,'NLP','2016-02-13 07:30:08',1),(4,'Standford NLP','2016-02-13 07:30:08',1),(4,'Text Simplification','2016-02-13 07:30:08',1),(4,'Thesis','2016-02-13 07:30:08',1),(6,'Longest Common Subsequence','2016-06-11 05:57:26',1),(6,'Music','2016-06-11 05:57:26',1),(7,'Mobile App','2016-06-11 05:59:00',1),(8,'Mobile App','2016-06-11 06:00:12',1),(9,'Mobile App','2016-06-11 06:00:47',1),(10,'Other Stuff','2016-06-11 06:01:36',1),(10,'Stuff','2016-06-11 06:01:36',1),(11,'Other Stuff','2016-06-11 06:02:14',1),(11,'Stuff','2016-06-11 06:02:14',1),(14,'Debt','2016-06-11 06:07:29',1),(15,'Food','2016-06-11 06:08:14',1),(16,'Association','2016-06-11 06:10:55',1),(16,'Media','2016-06-11 06:10:55',1),(17,'Association','2016-06-11 06:12:46',1),(17,'Media','2016-06-11 06:12:46',1),(18,'Flood','2016-06-11 09:05:07',1),(18,'Weather','2016-06-11 09:05:07',1),(18,'Web','2016-06-11 09:05:07',1),(19,'Test','2016-06-11 09:11:13',1),(19,'Test 2','2016-06-11 09:11:13',1),(20,'Machine Projects','2016-06-21 16:02:05',1),(20,'PHP','2016-06-21 16:02:05',1),(20,'Project Showcase','2016-06-21 16:02:05',1),(20,'Web','2016-06-21 16:02:05',1),(21,'Longest Common Subsequence','2016-06-21 16:04:57',1),(21,'Mobile','2016-06-21 16:04:57',1),(21,'Music','2016-06-21 16:04:57',1),(21,'Playlist','2016-06-21 16:04:57',1),(22,'C','2016-06-21 16:11:33',1),(22,'COMPRO2','2016-06-21 16:11:33',1),(23,'NLP','2016-06-21 17:40:07',1),(23,'Pussy Slaying','2016-06-21 17:40:07',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_student`
--

LOCK TABLES `pq_student` WRITE;
/*!40000 ALTER TABLE `pq_student` DISABLE KEYS */;
INSERT INTO `pq_student` VALUES (1,'11312121','John','Collantes','johncollantes@dlsu.edu.ph','2016-02-13 02:13:08',1),(2,'11312122','John','Hipe','johnHipe@dlsu.edu.ph','2016-02-13 02:13:08',1),(3,'11312123','John','Sorilla','johnSorilla@dlsu.edu.ph','2016-02-13 02:13:08',1),(4,'11312124','John','Tolentino','johnTolentino@dlsu.edu.ph','2016-02-13 02:13:08',1),(5,'11323604','Ryan Austin','Fernandez','ryan_fernandez@dlsu.edu.ph','2016-06-21 15:58:03',0),(6,'11335459','Victoria Angela','Acorda','victoria_acorda@dlsu.edu.ph','2016-06-21 16:02:05',1),(7,'11334223','Angelo John','Amadora','angelo_amadora@dlsu.edu.ph','2016-06-21 16:02:05',1),(8,'11327278','Alden Luc','Hade','alden_hade@dlsu.edu.ph','2016-06-21 16:04:57',1),(9,'11336579','Jonah','Syfu','jonah_syfu@dlsu.edu.ph','2016-06-21 16:04:57',1),(10,'11336617','Marc Dominic','San Pedro','marc_sanpedro@dlsu.edu.ph','2016-06-21 17:40:06',1);
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
  `email` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `userType` int(11) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `userfk_1_idx` (`userType`),
  CONSTRAINT `userfk_1` FOREIGN KEY (`userType`) REFERENCES `pq_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user`
--

LOCK TABLES `pq_user` WRITE;
/*!40000 ALTER TABLE `pq_user` DISABLE KEYS */;
INSERT INTO `pq_user` VALUES (1,'admin@dlsu.edu.ph','$2y$10$aNCro/Z9jEiXgYqdsytOou2Oca.cVyw8zRLTP/Mylot5BLqlxMO.i','Admin','Admin',1,'2016-03-03 10:33:34',1);
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

-- Dump completed on 2016-07-05 11:47:27
