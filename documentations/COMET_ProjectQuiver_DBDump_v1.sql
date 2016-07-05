CREATE DATABASE  IF NOT EXISTS `db_project_quiver` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_project_quiver`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_project_quiver
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project`
--

LOCK TABLES `pq_project` WRITE;
/*!40000 ALTER TABLE `pq_project` DISABLE KEYS */;
INSERT INTO `pq_project` VALUES (1,'ShareZone','Mobile Application','ShareZone allows you to share and transfer files from multiple different devices with each other with just a web browser and your smartphone.','Simpatico is a text simplification system that makes us of lexical and syntactic simplification methods in order to simplify legalese to plain English in which a majority of the Philippine population can understand. It makes use of various existing NLP tools in order to carry out tasks like multiword extraction and word sense disambiguation.',NULL,NULL,0,'2016-02-13 02:13:07',1),(2,'HackerCup','Web Application','This amazing website is more than just a registration page, it\'s a piece of modern art. With flying particles in the background, eye-catching color palette, and useless once the event is finished, the site is still a reminder of what can be achieved through highly practiced procrastination techniques from one of the nation\'s best procrastinators.',NULL,NULL,NULL,0,'2016-02-13 02:13:08',1),(3,'Optimus Prime','Robotics Hardware','Optimus Prime is consistently depicted as having strong moral character, excellent leadership, and sound decision-making skills, and possesses brilliant military tactics, powerful martial arts, and advanced alien weaponry. Optimus Prime has a strong sense of honor and justice, being dedicated to building peaceful and mutually beneficial co-existence with humans, the protection of life and liberty of all sentient species.',NULL,NULL,NULL,0,'2016-02-13 02:14:37',1),(4,'ShareZone v2','Mobile Application','ShareZone allows you to share and transfer files from multiple different devices with each other with just a web browser and your smartphone.','Simpatico is a text simplification system that makes us of lexical and syntactic simplification methods in order to simplify legalese to plain English in which a majority of the Philippine population can understand. It makes use of various existing NLP tools in order to carry out tasks like multiword extraction and word sense disambiguation.',NULL,NULL,0,'2016-02-13 07:30:07',1),(5,'Quiver','web','weqr','qwer','Beri Gud project',1,0,'2016-03-03 09:47:26',1);
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
INSERT INTO `pq_project_students` VALUES (1,1,'2016-02-13 02:13:08',1),(1,2,'2016-02-13 02:13:08',1),(1,3,'2016-02-13 02:13:08',1),(1,4,'2016-02-13 02:13:08',1),(2,1,'2016-02-13 02:13:08',1),(2,2,'2016-02-13 02:13:08',1),(2,3,'2016-02-13 02:13:08',1),(2,4,'2016-02-13 02:13:08',1),(3,1,'2016-02-13 02:14:38',1),(3,2,'2016-02-13 02:14:38',1),(3,3,'2016-02-13 02:14:38',1),(3,4,'2016-02-13 02:14:38',1),(4,1,'2016-02-13 07:30:08',1),(4,2,'2016-02-13 07:30:08',1),(4,3,'2016-02-13 07:30:08',1),(4,4,'2016-02-13 07:30:08',1);
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
INSERT INTO `pq_project_tags` VALUES (1,'CS-ST','2016-02-13 02:13:08',1),(1,'Lexical Simplification','2016-02-13 02:13:08',1),(1,'NLP','2016-02-13 02:13:08',1),(1,'Standford NLP','2016-02-13 02:13:08',1),(1,'Text Simplification','2016-02-13 02:13:08',1),(1,'Thesis','2016-02-13 02:13:08',1),(2,'CS-ST','2016-02-13 02:13:08',1),(2,'Lexical Simplification','2016-02-13 02:13:08',1),(2,'NLP','2016-02-13 02:13:08',1),(2,'Standford NLP','2016-02-13 02:13:08',1),(2,'Text Simplification','2016-02-13 02:13:08',1),(2,'Thesis','2016-02-13 02:13:08',1),(3,'CS-ST','2016-02-13 02:14:38',1),(3,'Lexical Simplification','2016-02-13 02:14:38',1),(3,'NLP','2016-02-13 02:14:38',1),(3,'Standford NLP','2016-02-13 02:14:38',1),(3,'Text Simplification','2016-02-13 02:14:38',1),(3,'Thesis','2016-02-13 02:14:38',1),(4,'CS-ST','2016-02-13 07:30:08',1),(4,'Lexical Simplification','2016-02-13 07:30:08',1),(4,'NLP','2016-02-13 07:30:08',1),(4,'Standford NLP','2016-02-13 07:30:08',1),(4,'Text Simplification','2016-02-13 07:30:08',1),(4,'Thesis','2016-02-13 07:30:08',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_student`
--

LOCK TABLES `pq_student` WRITE;
/*!40000 ALTER TABLE `pq_student` DISABLE KEYS */;
INSERT INTO `pq_student` VALUES (1,'11312121','John','Collantes','johncollantes@dlsu.edu.ph','2016-02-13 02:13:08',1),(2,'11312122','John','Hipe','johnHipe@dlsu.edu.ph','2016-02-13 02:13:08',1),(3,'11312123','John','Sorilla','johnSorilla@dlsu.edu.ph','2016-02-13 02:13:08',1),(4,'11312124','John','Tolentino','johnTolentino@dlsu.edu.ph','2016-02-13 02:13:08',1);
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
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `pq_userfk_1` (`userType`),
  CONSTRAINT `pq_userfk_1` FOREIGN KEY (`userType`) REFERENCES `pq_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user`
--

LOCK TABLES `pq_user` WRITE;
/*!40000 ALTER TABLE `pq_user` DISABLE KEYS */;
INSERT INTO `pq_user` VALUES (1,'admin@dlsu.edu.ph','$2y$10$aNCro/Z9jEiXgYqdsytOou2Oca.cVyw8zRLTP/Mylot5BLqlxMO.i','Admin','Admin',1,0,'2016-03-03 10:33:34',1);
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
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user_type`
--

LOCK TABLES `pq_user_type` WRITE;
/*!40000 ALTER TABLE `pq_user_type` DISABLE KEYS */;
INSERT INTO `pq_user_type` VALUES (1,'admin','2016-03-03 10:03:47',1),(2,'faculty','2016-03-03 10:03:47',1),(3,'judge','2016-03-03 10:03:47',1);
/*!40000 ALTER TABLE `pq_user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl`
--

DROP TABLE IF EXISTS `tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl`
--

LOCK TABLES `tbl` WRITE;
/*!40000 ALTER TABLE `tbl` DISABLE KEYS */;
INSERT INTO `tbl` VALUES (1,10);
/*!40000 ALTER TABLE `tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-13 17:48:31
