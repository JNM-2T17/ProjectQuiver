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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_project`
--

LOCK TABLES `pq_project` WRITE;
/*!40000 ALTER TABLE `pq_project` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_student`
--

LOCK TABLES `pq_student` WRITE;
/*!40000 ALTER TABLE `pq_student` DISABLE KEYS */;
INSERT INTO `pq_student` VALUES (1,'11312121','John','Collantes','johncollantes@dlsu.edu.ph','2016-02-13 02:13:08',1),(2,'11312122','John','Hipe','johnHipe@dlsu.edu.ph','2016-02-13 02:13:08',1),(3,'11312123','John','Sorilla','johnSorilla@dlsu.edu.ph','2016-02-13 02:13:08',1),(4,'11312124','John','Tolentino','johnTolentino@dlsu.edu.ph','2016-02-13 02:13:08',1),(5,'11323604','Ryan Austin','Fernandez','ryan_fernandez@dlsu.edu.ph','2016-06-21 15:58:03',1),(6,'11335459','Victoria Angela','Acorda','victoria_acorda@dlsu.edu.ph','2016-06-21 16:02:05',1),(7,'11334223','Angelo John','Amadora','angelo_amadora@dlsu.edu.ph','2016-06-21 16:02:05',1),(8,'11327278','Alden Luc','Hade','alden_hade@dlsu.edu.ph','2016-06-21 16:04:57',1),(9,'11336579','Jonah','Syfu','jonah_syfu@dlsu.edu.ph','2016-06-21 16:04:57',1),(10,'11336617','Marc Dominic','San Pedro','marc_sanpedro@dlsu.edu.ph','2016-06-21 17:40:06',1),(11,'11238374','Kanga','Kanga','kanga@dlsu.edu.ph','2016-07-07 11:03:07',1),(12,'11321792','Clarisse','Poblete','clarisse_poblete@dlsu.edu.ph','2016-07-23 01:49:40',1),(13,'11314320','Johansson','Tan','johansson_tan@dlsu.edu.ph','2016-07-23 01:49:40',1);
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
  KEY `userfk_1_idx` (`userType`),
  CONSTRAINT `userfk_1` FOREIGN KEY (`userType`) REFERENCES `pq_user_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_user`
--

LOCK TABLES `pq_user` WRITE;
/*!40000 ALTER TABLE `pq_user` DISABLE KEYS */;
INSERT INTO `pq_user` VALUES (1,'admin@dlsu.edu.ph','$2y$10$aNCro/Z9jEiXgYqdsytOou2Oca.cVyw8zRLTP/Mylot5BLqlxMO.i','Admin','Admin',1,'2016-03-03 10:33:34',0),(2,'thomas.tiamlee@dlsu.edu.ph','$2y$10$aNCro/Z9jEiXgYqdsytOou2Oca.cVyw8zRLTP/Mylot5BLqlxMO.i','Thomas James','Tiam-Lee',2,'2016-07-12 21:55:49',1),(3,'courtney.ngo@dlsu.edu.ph','$2y$10$Wa5b1vaABYjiI6dRYHCdpebpAjLs6JqqGrFINUUzTN.iBv4J0tJnK','Courtney Anne','Ngo',2,'2016-07-19 16:20:58',1),(4,'remedios.bulos@dlsu.edu.ph','$2y$10$l4kF7LUQAU/vmXIz8nxDKu9lIkK5mWzEsVesjw6Dg.2Hg.KY/Spou','Remedios','Bulos',2,'2016-07-19 16:22:39',1),(5,'angelo_amadora@dlsu.edu.ph','$2y$10$HYjhIWVuHJEBNV/xAZH3ZeN23aRAXJR5QT4Oei24twl87mfqc0F2W','Angelo','Amadora',2,'2016-07-19 16:34:57',1),(8,'angelo_amadodwasra@dlsu.edu.ph','$2y$10$gu0Z1s.Q1xETuvzo6ztwfe8CZimVu3VK0VTICQrzGrQzPlf1eVcb.','Angeloo','Amadoraa',1,'2016-07-19 16:41:57',0),(9,'briane.samson@dlsu.edu.ph','$2y$10$tSEce2CRuBByX0ibDdr3lOpF6sqYqFALLwCOYkKRSTtFb4hf.xdjm','Briane Paul','Samson',1,'2016-07-22 21:44:40',0),(11,'briane.samson@dlsu.edu.ph','$2y$10$2oeCIp.o0EQ3.1K33YS4cOWQ4BTEntwmHurf1AxgLWCeJIZ7k7cz6','Briane Paul','Samson',1,'2016-07-22 22:13:02',1),(12,'matthew_allen_go@dlsu.edu.ph','$2y$10$Y1d5zPPCe1eeGk98Q6g/K.Rn/J4Qo55Al0x4JydxO0M.Ci1dRR/Zu','Matthew','Go',1,'2016-07-23 01:29:21',1),(13,'solomon.see@delasalle.ph','$2y$10$RqPfLa2lB2ezS1/sXj9QKedoJsVsPsdPDDrtN2xPimB4S1h.CkpvC','Solomon','See',2,'2016-07-23 01:50:12',1);
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

-- Dump completed on 2016-07-26 16:20:54
