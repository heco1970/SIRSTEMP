CREATE DATABASE  IF NOT EXISTS `c3acl` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `c3acl`;
-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: c3acl
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `accesses`
--

DROP TABLE IF EXISTS `accesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `browser_version` varchar(10) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  `os_version` varchar(10) DEFAULT NULL,
  `device` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesses`
--

LOCK TABLES `accesses` WRITE;
/*!40000 ALTER TABLE `accesses` DISABLE KEYS */;
INSERT INTO `accesses` VALUES (1,1,'Firefox','70.0','Ubuntu','','','2019-11-19 12:26:53'),(2,1,'Firefox','75.0','Ubuntu','','','2020-04-29 21:05:04'),(3,1,'Firefox','75.0','Ubuntu','','','2020-05-04 11:48:30'),(4,1,'Firefox','75.0','Ubuntu','','','2020-05-04 11:48:50'),(5,1,'Firefox','75.0','Ubuntu','','','2020-05-06 09:46:33'),(6,1,'Firefox','75.0','Ubuntu','','','2020-05-06 10:02:07'),(7,1,'Firefox','75.0','Ubuntu','','','2020-05-06 10:02:22'),(8,1,'Firefox','75.0','Ubuntu','','','2020-05-06 11:01:33'),(9,1,'Firefox','75.0','Ubuntu','','','2020-05-06 11:58:30'),(10,1,'Firefox','75.0','Ubuntu','','','2020-05-11 09:08:22'),(11,1,'Firefox','75.0','Ubuntu','','','2020-05-11 09:49:50'),(12,1,'Firefox','75.0','Ubuntu','','','2020-05-11 12:17:14'),(13,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:37:16'),(14,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:37:52'),(15,1,'Firefox','75.0','Ubuntu','','','2020-05-11 12:38:43'),(16,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:38:56'),(17,1,'Firefox','75.0','Ubuntu','','','2020-05-11 12:41:22'),(18,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:42:21'),(19,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:45:17'),(20,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:46:10'),(21,1,'Firefox','75.0','Ubuntu','','','2020-05-11 12:46:25'),(22,2,'Firefox','75.0','Ubuntu','','','2020-05-11 12:55:32'),(23,1,'Firefox','75.0','Ubuntu','','','2020-05-11 12:55:39'),(24,2,'Firefox','75.0','Ubuntu','','','2020-05-11 13:04:35'),(25,1,'Firefox','75.0','Ubuntu','','','2020-05-11 13:04:46'),(26,2,'Firefox','75.0','Ubuntu','','','2020-05-11 13:05:14'),(27,1,'Firefox','75.0','Ubuntu','','','2020-05-11 13:06:08'),(28,2,'Firefox','75.0','Ubuntu','','','2020-05-11 13:07:32'),(29,1,'Firefox','75.0','Ubuntu','','','2020-05-11 13:07:38'),(30,1,'Firefox','75.0','Ubuntu','','','2020-05-11 14:50:17'),(31,2,'Firefox','75.0','Ubuntu','','','2020-05-11 15:11:16'),(32,1,'Firefox','75.0','Ubuntu','','','2020-05-11 15:42:49'),(33,2,'Firefox','75.0','Ubuntu','','','2020-05-11 15:45:11'),(34,1,'Firefox','75.0','Ubuntu','','','2020-05-11 15:45:54'),(35,1,'Firefox','75.0','Ubuntu','','','2020-05-11 17:18:43'),(36,1,'Firefox','75.0','Ubuntu','','','2020-05-14 17:33:24'),(37,1,'Firefox','75.0','Ubuntu','','','2020-05-15 09:13:21'),(38,1,'Firefox','75.0','Ubuntu','','','2020-05-15 09:17:53'),(39,1,'Firefox','75.0','Ubuntu','','','2020-05-15 09:32:57'),(40,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:06:13'),(41,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:14:46'),(42,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:20:19'),(43,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:39:12'),(44,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:40:49'),(45,2,'Firefox','75.0','Ubuntu','','','2020-05-19 12:41:38'),(46,1,'Firefox','75.0','Ubuntu','','','2020-05-19 12:42:04'),(47,2,'Firefox','75.0','Ubuntu','','','2020-05-22 14:44:30'),(48,1,'Firefox','75.0','Ubuntu','','','2020-05-22 14:48:53'),(49,1,'Firefox','75.0','Ubuntu','','','2020-05-25 14:54:29'),(50,1,'Firefox','75.0','Ubuntu','','','2020-05-25 22:01:00'),(51,1,'Firefox','75.0','Ubuntu','','','2020-05-26 14:52:44'),(52,1,'Firefox','75.0','Ubuntu','','','2020-05-29 14:26:05'),(53,1,'Firefox','75.0','Ubuntu','','','2020-06-03 15:43:09'),(54,1,'Firefox','75.0','Ubuntu','','','2020-06-03 16:22:31'),(55,1,'Firefox','75.0','Ubuntu','','','2020-06-04 08:45:12'),(56,1,'Firefox','75.0','Ubuntu','','','2020-06-04 09:42:14'),(57,1,'Firefox','75.0','Ubuntu','','','2020-06-04 15:12:53'),(58,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:08:17'),(59,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:45:18'),(60,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:45:48'),(61,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:48:07'),(62,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:48:32'),(63,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:49:40'),(64,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:50:13'),(65,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:51:06'),(66,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:52:01'),(67,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:52:23'),(68,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:57:47'),(69,1,'Firefox','75.0','Ubuntu','','','2020-06-08 06:58:00'),(70,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:01:37'),(71,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:02:09'),(72,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:02:35'),(73,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:03:46'),(74,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:04:15'),(75,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:04:37'),(76,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:04:56'),(77,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:05:25'),(78,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:09:14'),(79,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:11:34'),(80,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:16:37'),(81,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:19:40'),(82,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:26:31'),(83,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:29:25'),(84,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:29:58'),(85,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:30:20'),(86,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:31:06'),(87,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:32:42'),(88,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:33:04'),(89,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:33:51'),(90,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:36:35'),(91,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:36:52'),(92,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:41:50'),(93,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:45:39'),(94,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:46:11'),(95,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:46:51'),(96,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:47:17'),(97,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:47:56'),(98,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:49:16'),(99,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:53:49'),(100,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:58:19'),(101,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:58:49'),(102,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:59:15'),(103,1,'Firefox','75.0','Ubuntu','','','2020-06-08 07:59:39'),(104,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:01:29'),(105,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:02:21'),(106,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:03:01'),(107,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:23:25'),(108,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:24:47'),(109,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:27:21'),(110,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:29:42'),(111,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:33:42'),(112,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:50:46'),(113,2,'Firefox','75.0','Ubuntu','','','2020-06-08 08:50:55'),(114,1,'Firefox','75.0','Ubuntu','','','2020-06-08 08:53:00'),(115,1,'Firefox','75.0','Ubuntu','','','2020-06-08 10:16:44'),(116,1,'Firefox','75.0','Ubuntu','','','2020-06-08 10:19:09'),(117,1,'Firefox','75.0','Ubuntu','','','2020-06-08 10:22:31'),(118,1,'Firefox','75.0','Ubuntu','','','2020-06-08 21:06:25'),(119,1,'Firefox','75.0','Ubuntu','','','2020-06-08 21:09:00'),(120,2,'Firefox','75.0','Ubuntu','','','2020-06-08 21:09:20'),(121,1,'Firefox','75.0','Ubuntu','','','2020-06-08 21:19:38'),(122,1,'Firefox','75.0','Ubuntu','','','2020-06-08 21:21:16'),(123,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:28:05'),(124,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:30:25'),(125,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:32:02'),(126,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:33:49'),(127,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:37:16'),(128,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:38:16'),(129,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:39:22'),(130,2,'Firefox','75.0','Ubuntu','','','2020-06-09 14:39:38'),(131,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:41:29'),(132,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:42:48'),(133,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:43:36'),(134,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:47:17'),(135,1,'Firefox','75.0','Ubuntu','','','2020-06-09 14:48:39');
/*!40000 ALTER TABLE `accesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_phinxlog`
--

DROP TABLE IF EXISTS `acl_phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_phinxlog`
--

LOCK TABLES `acl_phinxlog` WRITE;
/*!40000 ALTER TABLE `acl_phinxlog` DISABLE KEYS */;
INSERT INTO `acl_phinxlog` VALUES (20141229162641,'CakePhpDbAcl','2019-06-06 17:14:45','2019-06-06 17:14:45',0);
/*!40000 ALTER TABLE `acl_phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,232),(2,1,NULL,NULL,'Types',2,13),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'view',5,6),(5,2,NULL,NULL,'add',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,1,NULL,NULL,'Users',14,35),(9,8,NULL,NULL,'index',15,16),(10,8,NULL,NULL,'view',17,18),(11,8,NULL,NULL,'add',19,20),(12,8,NULL,NULL,'edit',21,22),(13,8,NULL,NULL,'delete',23,24),(14,8,NULL,NULL,'login',25,26),(15,8,NULL,NULL,'logout',27,28),(16,1,NULL,NULL,'Dummy',36,41),(17,16,NULL,NULL,'index',37,38),(18,16,NULL,NULL,'login',39,40),(19,1,NULL,NULL,'AclManager',42,59),(20,19,NULL,NULL,'Acl',43,58),(21,20,NULL,NULL,'index',44,45),(22,20,NULL,NULL,'permissions',46,47),(23,20,NULL,NULL,'updateAcos',48,49),(24,20,NULL,NULL,'updateAros',50,51),(25,20,NULL,NULL,'revokePerms',52,53),(26,20,NULL,NULL,'drop',54,55),(27,20,NULL,NULL,'defaults',56,57),(28,1,NULL,NULL,'DebugKit',60,87),(29,28,NULL,NULL,'MailPreview',61,68),(30,29,NULL,NULL,'index',62,63),(31,29,NULL,NULL,'sent',64,65),(32,29,NULL,NULL,'email',66,67),(33,28,NULL,NULL,'Toolbar',69,72),(34,33,NULL,NULL,'clearCache',70,71),(35,28,NULL,NULL,'Requests',73,76),(36,35,NULL,NULL,'view',74,75),(37,28,NULL,NULL,'Composer',77,80),(38,37,NULL,NULL,'checkDependencies',78,79),(39,28,NULL,NULL,'Panels',81,86),(40,39,NULL,NULL,'index',82,83),(41,39,NULL,NULL,'view',84,85),(42,1,NULL,NULL,'Accesses',88,101),(43,42,NULL,NULL,'index',89,90),(44,42,NULL,NULL,'view',91,92),(45,42,NULL,NULL,'add',93,94),(46,42,NULL,NULL,'edit',95,96),(47,42,NULL,NULL,'delete',97,98),(48,42,NULL,NULL,'admin',99,100),(49,8,NULL,NULL,'profile',29,30),(50,1,NULL,NULL,'Units',102,113),(51,50,NULL,NULL,'index',103,104),(52,50,NULL,NULL,'view',105,106),(53,50,NULL,NULL,'add',107,108),(54,50,NULL,NULL,'edit',109,110),(55,50,NULL,NULL,'delete',111,112),(56,8,NULL,NULL,'password',31,32),(57,8,NULL,NULL,'adminPassword',33,34),(58,1,NULL,NULL,'Josegonzalez\\Upload',114,115),(59,1,NULL,NULL,'States',116,127),(60,59,NULL,NULL,'index',117,118),(61,59,NULL,NULL,'view',119,120),(62,59,NULL,NULL,'add',121,122),(63,59,NULL,NULL,'edit',123,124),(64,59,NULL,NULL,'delete',125,126),(65,1,NULL,NULL,'Pessoas',128,141),(66,65,NULL,NULL,'index',129,130),(67,65,NULL,NULL,'view',131,132),(68,65,NULL,NULL,'add',133,134),(69,65,NULL,NULL,'edit',135,136),(70,65,NULL,NULL,'delete',137,138),(71,1,NULL,NULL,'Estados',142,153),(72,71,NULL,NULL,'index',143,144),(73,71,NULL,NULL,'view',145,146),(74,71,NULL,NULL,'add',147,148),(75,71,NULL,NULL,'edit',149,150),(76,71,NULL,NULL,'delete',151,152),(77,1,NULL,NULL,'Pais',154,165),(78,77,NULL,NULL,'index',155,156),(79,77,NULL,NULL,'view',157,158),(80,77,NULL,NULL,'add',159,160),(81,77,NULL,NULL,'edit',161,162),(82,77,NULL,NULL,'delete',163,164),(83,1,NULL,NULL,'Processos',166,179),(84,83,NULL,NULL,'index',167,168),(85,83,NULL,NULL,'view',169,170),(86,83,NULL,NULL,'add',171,172),(87,83,NULL,NULL,'edit',173,174),(88,83,NULL,NULL,'delete',175,176),(89,1,NULL,NULL,'Pedidos',180,193),(90,89,NULL,NULL,'index',181,182),(91,89,NULL,NULL,'view',183,184),(92,89,NULL,NULL,'add',185,186),(93,89,NULL,NULL,'edit',187,188),(94,89,NULL,NULL,'delete',189,190),(95,1,NULL,NULL,'Verbetes',194,207),(96,95,NULL,NULL,'index',195,196),(97,95,NULL,NULL,'view',197,198),(98,95,NULL,NULL,'add',199,200),(99,95,NULL,NULL,'edit',201,202),(100,95,NULL,NULL,'delete',203,204),(101,83,NULL,NULL,'xls',177,178),(102,1,NULL,NULL,'Attempts',208,219),(103,102,NULL,NULL,'index',209,210),(104,102,NULL,NULL,'admin',211,212),(105,102,NULL,NULL,'view',213,214),(106,102,NULL,NULL,'add',215,216),(107,102,NULL,NULL,'edit',217,218),(108,95,NULL,NULL,'xls',205,206),(109,65,NULL,NULL,'xls',139,140),(110,89,NULL,NULL,'xls',191,192),(111,1,NULL,NULL,'UserStates',220,231),(112,111,NULL,NULL,'index',221,222),(113,111,NULL,NULL,'view',223,224),(114,111,NULL,NULL,'add',225,226),(115,111,NULL,NULL,'edit',227,228),(116,111,NULL,NULL,'delete',229,230);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,NULL,'Types',1,'Administrator',1,4),(2,1,'Users',1,'administrator',2,3),(3,NULL,'Types',2,NULL,5,8),(4,3,'Users',2,'user',6,7);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,2,1,'1','1','1','1'),(2,3,16,'1','1','1','1'),(3,3,66,'1','1','1','1'),(4,3,43,'1','1','1','1'),(5,3,44,'1','1','1','1'),(6,3,65,'1','1','1','1'),(7,3,67,'1','1','1','1'),(8,3,68,'1','1','1','1'),(9,3,69,'1','1','1','1'),(10,3,70,'1','1','1','1'),(11,3,109,'1','1','1','1'),(12,3,83,'1','1','1','1'),(13,3,89,'1','1','1','1'),(14,3,95,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attempts`
--

DROP TABLE IF EXISTS `attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `count` int(1) DEFAULT NULL,
  `suspenso` datetime DEFAULT NULL,
  `user_states_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attempts`
--

LOCK TABLES `attempts` WRITE;
/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;
INSERT INTO `attempts` VALUES (1,'dave',1,'2020-03-30 13:11:25',1,'2014-11-19 12:26:53','2020-06-08 07:39:13'),(2,'Firefox',1,NULL,2,'2020-05-26 17:37:38','2020-06-08 09:49:48'),(3,'oof',2,'2020-03-30 13:11:25',2,'2020-03-27 15:53:12','2020-06-04 15:21:30'),(4,'administrator',0,NULL,2,'2020-03-30 12:36:32','2020-06-09 14:33:58'),(5,'rodas',3,'2020-03-30 13:07:08',2,'2020-03-30 12:36:56','2020-06-08 09:33:18'),(6,'marques',3,'2020-04-01 16:22:23',2,'2020-04-01 15:52:17','2020-04-01 15:52:23'),(7,'Dave1',3,'2020-04-08 03:09:31',2,'2020-04-06 21:51:21','2020-04-08 02:39:31'),(8,'dave2',NULL,NULL,2,'2020-04-08 02:41:55','2020-04-08 15:51:14'),(9,'fui',NULL,NULL,2,'2020-04-14 15:45:14','2020-06-04 12:17:48'),(10,'deu',NULL,'2020-04-08 03:09:31',3,'2020-06-04 11:30:31','2020-06-04 15:25:59'),(11,'deu2',NULL,NULL,1,'2020-06-04 11:31:16','2020-06-04 11:31:16'),(12,'deu3',NULL,NULL,2,'2020-06-04 12:18:00','2020-06-04 12:18:00'),(13,'user',1,NULL,2,'2020-06-04 12:18:00','2020-06-08 08:51:28'),(14,'ggg',NULL,NULL,2,'2020-06-08 11:00:39','2020-06-08 11:00:39'),(17,'a',NULL,'2020-06-09 15:21:02',3,'2020-06-09 14:51:02','2020-06-09 14:51:02');
/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Executado','2019-11-24 09:56:03','2019-11-24 09:56:03'),(2,'Fechado','2019-11-24 09:56:13','2019-11-24 09:56:13');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais`
--

DROP TABLE IF EXISTS `pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `paisNome` varchar(50) NOT NULL,
  `paisName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (1,'AFEGANISTÃO','AFGHANISTAN'),(2,'ACROTÍRI E DECELIA','AKROTIRI E DEKÉLIA'),(3,'ÁFRICA DO SUL','SOUTH AFRICA'),(4,'ALBÂNIA','ALBANIA'),(5,'ALEMANHA','GERMANY'),(6,'AMERICAN SAMOA','AMERICAN SAMOA'),(7,'ANDORRA','ANDORRA'),(8,'ANGOLA','ANGOLA'),(9,'ANGUILLA','ANGUILLA'),(10,'ANTÍGUA E BARBUDA','ANTIGUA AND BARBUDA'),(11,'ANTILHAS NEERLANDESAS','NETHERLANDS ANTILLES'),(12,'ARÁBIA SAUDITA','SAUDI ARABIA'),(13,'ARGÉLIA','ALGERIA'),(14,'ARGENTINA','ARGENTINA'),(15,'ARMÉNIA','ARMENIA'),(16,'ARUBA','ARUBA'),(17,'AUSTRÁLIA','AUSTRALIA'),(18,'ÁUSTRIA','AUSTRIA'),(19,'AZERBAIJÃO','AZERBAIJAN'),(20,'BAHAMAS','BAHAMAS, THE'),(21,'BANGLADECHE','BANGLADESH'),(22,'BARBADOS','BARBADOS'),(23,'BARÉM','BAHRAIN'),(24,'BASSAS DA ÍNDIA','BASSAS DA INDIA'),(25,'BÉLGICA','BELGIUM'),(26,'BELIZE','BELIZE'),(27,'BENIM','BENIN'),(28,'BERMUDAS','BERMUDA'),(29,'BIELORRÚSSIA','BELARUS'),(30,'BOLÍVIA','BOLIVIA'),(31,'BÓSNIA E HERZEGOVINA','BOSNIA AND HERZEGOVINA'),(32,'BOTSUANA','BOTSWANA'),(33,'BRASIL','BRAZIL'),(34,'BRUNEI DARUSSALAM','BRUNEI DARUSSALAM'),(35,'BULGÁRIA','BULGARIA'),(36,'BURQUINA FASO','BURKINA FASO'),(37,'BURUNDI','BURUNDI'),(38,'BUTÃO','BHUTAN'),(39,'CABO VERDE','CAPE VERDE'),(40,'CAMARÕES','CAMEROON'),(41,'CAMBOJA','CAMBODIA'),(42,'CANADÁ','CANADA'),(43,'CATAR','QATAR'),(44,'CAZAQUISTÃO','KAZAKHSTAN'),(45,'CENTRO-AFRICANA REPÚBLICA','CENTRAL AFRICAN REPUBLIC'),(46,'CHADE','CHAD'),(47,'CHILE','CHILE'),(48,'CHINA','CHINA'),(49,'CHIPRE','CYPRUS'),(50,'COLÔMBIA','COLOMBIA'),(51,'COMORES','COMOROS'),(52,'CONGO','CONGO'),(53,'CONGO REPÚBLICA DEMOCRÁTICA','CONGO DEMOCRATIC REPUBLIC'),(54,'COREIA DO NORTE','KOREA NORTH'),(55,'COREIA DO SUL','KOREA SOUTH'),(56,'COSTA DO MARFIM','IVORY COAST'),(57,'COSTA RICA','COSTA RICA'),(58,'CROÁCIA','CROATIA'),(59,'CUBA','CUBA'),(60,'DINAMARCA','DENMARK'),(61,'DOMÍNICA','DOMINICA'),(62,'EGIPTO','EGYPT'),(63,'EMIRADOS ÁRABES UNIDOS','UNITED ARAB EMIRATES'),(64,'EQUADOR','ECUADOR'),(65,'ERITREIA','ERITREA'),(66,'ESLOVÁQUIA','SLOVAKIA'),(67,'ESLOVÉNIA','SLOVENIA'),(68,'ESPANHA','SPAIN'),(69,'ESTADOS UNIDOS','UNITED STATES'),(70,'ESTÓNIA','ESTONIA'),(71,'ETIÓPIA','ETHIOPIA'),(72,'FAIXA DE GAZA','GAZA STRIP'),(73,'FIJI','FIJI'),(74,'FILIPINAS','PHILIPPINES'),(75,'FINLÂNDIA','FINLAND'),(76,'FRANÇA','FRANCE'),(77,'GABÃO','GABON'),(78,'GÂMBIA','GAMBIA'),(79,'GANA','GHANA'),(80,'GEÓRGIA','GEORGIA'),(81,'GIBRALTAR','GIBRALTAR'),(82,'GRANADA','GRENADA'),(83,'GRÉCIA','GREECE'),(84,'GRONELÂNDIA','GREENLAND'),(85,'GUADALUPE','GUADELOUPE'),(86,'GUAM','GUAM'),(87,'GUATEMALA','GUATEMALA'),(88,'GUERNSEY','GUERNSEY'),(89,'GUIANA','GUYANA'),(90,'GUIANA FRANCESA','FRENCH GUIANA'),(91,'GUINÉ','GUINEA'),(92,'GUINÉ EQUATORIAL','EQUATORIAL GUINEA'),(93,'GUINÉ-BISSAU','GUINEA-BISSAU'),(94,'HAITI','HAITI'),(95,'HONDURAS','HONDURAS'),(96,'HONG KONG','HONG KONG'),(97,'HUNGRIA','HUNGARY'),(98,'IÉMEN','YEMEN'),(99,'ILHA BOUVET','BOUVET ISLAND'),(100,'ILHA CHRISTMAS','CHRISTMAS ISLAND'),(101,'ILHA DE CLIPPERTON','CLIPPERTON ISLAND'),(102,'ILHA DE JOÃO DA NOVA','JUAN DE NOVA ISLAND'),(103,'ILHA DE MAN','ISLE OF MAN'),(104,'ILHA DE NAVASSA','NAVASSA ISLAND'),(105,'ILHA EUROPA','EUROPA ISLAND'),(106,'ILHA NORFOLK','NORFOLK ISLAND'),(107,'ILHA TROMELIN','TROMELIN ISLAND'),(108,'ILHAS ASHMORE E CARTIER','ASHMORE AND CARTIER ISLANDS'),(109,'ILHAS CAIMAN','CAYMAN ISLANDS'),(110,'ILHAS COCOS (KEELING)','COCOS (KEELING) ISLANDS'),(111,'ILHAS COOK','COOK ISLANDS'),(112,'ILHAS DO MAR DE CORAL','CORAL SEA ISLANDS'),(113,'ILHAS FALKLANDS (ILHAS MALVINAS)','FALKLAND ISLANDS (ISLAS MALVINAS)'),(114,'ILHAS FEROE','FAROE ISLANDS'),(115,'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),(116,'ILHAS MARIANAS DO NORTE','NORTHERN MARIANA ISLANDS'),(117,'ILHAS MARSHALL','MARSHALL ISLANDS'),(118,'ILHAS PARACEL','PARACEL ISLANDS'),(119,'ILHAS PITCAIRN','PITCAIRN ISLANDS'),(120,'ILHAS SALOMÃO','SOLOMON ISLANDS'),(121,'ILHAS SPRATLY','SPRATLY ISLANDS'),(122,'ILHAS VIRGENS AMERICANAS','UNITED STATES VIRGIN ISLANDS'),(123,'ILHAS VIRGENS BRITÂNICAS','BRITISH VIRGIN ISLANDS'),(124,'ÍNDIA','INDIA'),(125,'INDONÉSIA','INDONESIA'),(126,'IRÃO','IRAN'),(127,'IRAQUE','IRAQ'),(128,'IRLANDA','IRELAND'),(129,'ISLÂNDIA','ICELAND'),(130,'ISRAEL','ISRAEL'),(131,'ITÁLIA','ITALY'),(132,'JAMAICA','JAMAICA'),(133,'JAN MAYEN','JAN MAYEN'),(134,'JAPÃO','JAPAN'),(135,'JERSEY','JERSEY'),(136,'JIBUTI','DJIBOUTI'),(137,'JORDÂNIA','JORDAN'),(138,'KIRIBATI','KIRIBATI'),(139,'KOWEIT','KUWAIT'),(140,'LAOS','LAOS'),(141,'LESOTO','LESOTHO'),(142,'LETÓNIA','LATVIA'),(143,'LÍBANO','LEBANON'),(144,'LIBÉRIA','LIBERIA'),(145,'LÍBIA','LIBYAN ARAB JAMAHIRIYA'),(146,'LISTENSTAINE','LIECHTENSTEIN'),(147,'LITUÂNIA','LITHUANIA'),(148,'LUXEMBURGO','LUXEMBOURG'),(149,'MACAU','MACAO'),(150,'MACEDÓNIA','MACEDONIA'),(151,'MADAGÁSCAR','MADAGASCAR'),(152,'MALÁSIA','MALAYSIA'),(153,'MALAVI','MALAWI'),(154,'MALDIVAS','MALDIVES'),(155,'MALI','MALI'),(156,'MALTA','MALTA'),(157,'MARROCOS','MOROCCO'),(158,'MARTINICA','MARTINIQUE'),(159,'MAURÍCIA','MAURITIUS'),(160,'MAURITÂNIA','MAURITANIA'),(161,'MAYOTTE','MAYOTTE'),(162,'MÉXICO','MEXICO'),(163,'MIANMAR','MYANMAR BURMA'),(164,'MICRONÉSIA','MICRONESIA'),(165,'MOÇAMBIQUE','MOZAMBIQUE'),(166,'MOLDÁVIA','MOLDOVA'),(167,'MÓNACO','MONACO'),(168,'MONGÓLIA','MONGOLIA'),(169,'MONTENEGRO','MONTENEGRO'),(170,'MONTSERRAT','MONTSERRAT'),(171,'NAMÍBIA','NAMIBIA'),(172,'NAURU','NAURU'),(173,'NEPAL','NEPAL'),(174,'NICARÁGUA','NICARAGUA'),(175,'NÍGER','NIGER'),(176,'NIGÉRIA','NIGERIA'),(177,'NIUE','NIUE'),(178,'NORUEGA','NORWAY'),(179,'NOVA CALEDÓNIA','NEW CALEDONIA'),(180,'NOVA ZELÂNDIA','NEW ZEALAND'),(181,'OMÃ','OMAN'),(182,'PAÍSES BAIXOS','NETHERLANDS'),(183,'PALAU','PALAU'),(184,'PALESTINA','PALESTINE'),(185,'PANAMÁ','PANAMA'),(186,'PAPUÁSIA-NOVA GUINÉ','PAPUA NEW GUINEA'),(187,'PAQUISTÃO','PAKISTAN'),(188,'PARAGUAI','PARAGUAY'),(189,'PERU','PERU'),(190,'POLINÉSIA FRANCESA','FRENCH POLYNESIA'),(191,'POLÓNIA','POLAND'),(192,'PORTO RICO','PUERTO RICO'),(193,'PORTUGAL','PORTUGAL'),(194,'QUÉNIA','KENYA'),(195,'QUIRGUIZISTÃO','KYRGYZSTAN'),(196,'REINO UNIDO','UNITED KINGDOM'),(197,'REPÚBLICA CHECA','CZECH REPUBLIC'),(198,'REPÚBLICA DOMINICANA','DOMINICAN REPUBLIC'),(199,'ROMÉNIA','ROMANIA'),(200,'RUANDA','RWANDA'),(201,'RÚSSIA','RUSSIAN FEDERATION'),(202,'SAHARA OCCIDENTAL','WESTERN SAHARA'),(203,'SALVADOR','EL SALVADOR'),(204,'SAMOA','SAMOA'),(205,'SANTA HELENA','SAINT HELENA'),(206,'SANTA LÚCIA','SAINT LUCIA'),(207,'SANTA SÉ','HOLY SEE'),(208,'SÃO CRISTÓVÃO E NEVES','SAINT KITTS AND NEVIS'),(209,'SÃO MARINO','SAN MARINO'),(210,'SÃO PEDRO E MIQUELÃO','SAINT PIERRE AND MIQUELON'),(211,'SÃO TOMÉ E PRÍNCIPE','SAO TOME AND PRINCIPE'),(212,'SÃO VICENTE E GRANADINAS','SAINT VINCENT AND THE GRENADINES'),(213,'SEICHELES','SEYCHELLES'),(214,'SENEGAL','SENEGAL'),(215,'SERRA LEOA','SIERRA LEONE'),(216,'SÉRVIA','SERBIA'),(217,'SINGAPURA','SINGAPORE'),(218,'SÍRIA','SYRIA'),(219,'SOMÁLIA','SOMALIA'),(220,'SRI LANCA','SRI LANKA'),(221,'SUAZILÂNDIA','SWAZILAND'),(222,'SUDÃO','SUDAN'),(223,'SUÉCIA','SWEDEN'),(224,'SUÍÇA','SWITZERLAND'),(225,'SURINAME','SURINAME'),(226,'SVALBARD','SVALBARD'),(227,'TAILÂNDIA','THAILAND'),(228,'TAIWAN','TAIWAN'),(229,'TAJIQUISTÃO','TAJIKISTAN'),(230,'TANZÂNIA','TANZANIA'),(231,'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO','BRITISH INDIAN OCEAN TERRITORY'),(232,'TERRITÓRIO DAS ILHAS HEARD E MCDONALD','HEARD ISLAND AND MCDONALD ISLANDS'),(233,'TIMOR-LESTE','TIMOR-LESTE'),(234,'TOGO','TOGO'),(235,'TOKELAU','TOKELAU'),(236,'TONGA','TONGA'),(237,'TRINDADE E TOBAGO','TRINIDAD AND TOBAGO'),(238,'TUNÍSIA','TUNISIA'),(239,'TURKS E CAICOS','TURKS AND CAICOS ISLANDS'),(240,'TURQUEMENISTÃO','TURKMENISTAN'),(241,'TURQUIA','TURKEY'),(242,'TUVALU','TUVALU'),(243,'UCRÂNIA','UKRAINE'),(244,'UGANDA','UGANDA'),(245,'URUGUAI','URUGUAY'),(246,'USBEQUISTÃO','UZBEKISTAN'),(247,'VANUATU','VANUATU'),(248,'VENEZUELA','VENEZUELA'),(249,'VIETNAME','VIETNAM'),(250,'WALLIS E FUTUNA','WALLIS AND FUTUNA'),(251,'ZÂMBIA','ZAMBIA'),(252,'ZIMBABUÉ','ZIMBABWE');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `processo_id` int(10) NOT NULL,
  `pessoa_id` int(10) NOT NULL,
  `referencia` varchar(20) NOT NULL,
  `canalentrada` varchar(20) NOT NULL,
  `datarecepcao` date NOT NULL,
  `origem` varchar(20) NOT NULL,
  `descricao` varchar(20) NOT NULL,
  `equiparesponsavel` varchar(20) NOT NULL,
  `state_id` int(10) NOT NULL,
  `termino` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,1,'20466','CITIUS','2019-11-14','Externo','LC 1/2','Eq Lisboa Penal 8',1,'2019-11-22','2019-11-14 00:00:00','2019-11-14 00:00:00');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `nomepai` varchar(255) NOT NULL,
  `nomemae` varchar(255) NOT NULL,
  `id_estadocivil` int(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `pais_id` int(10) NOT NULL,
  `cc` varchar(10) NOT NULL,
  `nif` int(8) NOT NULL,
  `outroidentifica` varchar(255) NOT NULL,
  `id_unidadeopera` int(10) NOT NULL DEFAULT '1',
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `observacoes` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'João Antunes','2019-11-14','Pedro Antunes','Maria Almeida',1,1,1,'12312312',123123,'',1,1,'','2019-11-24 23:04:11','2019-11-24 23:04:11');
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processos`
--

DROP TABLE IF EXISTS `processos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `entjudicial` varchar(255) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `natureza` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `observacoes` text NOT NULL,
  `dataconclusao` date NOT NULL,
  `state_id` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processos`
--

LOCK TABLES `processos` WRITE;
/*!40000 ALTER TABLE `processos` DISABLE KEYS */;
INSERT INTO `processos` VALUES (1,'Lisboa - Tribunal de Execução de Penas',1,'Penal','1223336','Este é um campo de observações','2019-11-27',1,'2019-11-24 22:48:07','2019-11-24 22:48:07');
/*!40000 ALTER TABLE `processos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Activo',1,'2019-11-23 10:22:54','2019-11-23 10:22:54'),(2,'Suspenso',0,'2019-11-23 10:34:21','2019-11-23 10:34:21');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Administrator','2019-06-06 18:28:01','2019-06-06 18:28:01'),(2,'User','2019-06-17 10:10:19','2019-06-17 10:10:19');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `designacao` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'1º Juizo','2019-11-19 12:31:36','2019-11-19 12:31:36');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_states`
--

DROP TABLE IF EXISTS `user_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_states` (
  `id` int(1) NOT NULL,
  `descri` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_states`
--

LOCK TABLES `user_states` WRITE;
/*!40000 ALTER TABLE `user_states` DISABLE KEYS */;
INSERT INTO `user_states` VALUES (1,'Banido'),(2,'Ativo'),(3,'Suspenso');
/*!40000 ALTER TABLE `user_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'administrator','$2y$10$lk2NUyjB72MCmFNcTyavj.Q5ryGERYmy8stlXL1G9wNauOyDzlrdC','System Administrator','email@test.com','','2019-06-06 19:49:10','2019-06-06 19:49:10'),(2,2,'user','$2y$10$2Sg2VTDeIoelnVfR.8Xt8uHTMCGHYWW5z58PPJHeM1IqQ0GgfX1re','Normal User','normal@test.com','','2019-06-17 10:10:30','2019-06-17 10:10:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verbetes`
--

DROP TABLE IF EXISTS `verbetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verbetes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `datacriacao` date NOT NULL,
  `datadistribuicao` date NOT NULL,
  `datainicioefectiva` date NOT NULL,
  `dataefectivatermino` date NOT NULL,
  `datainiciop` date NOT NULL,
  `dataprevistat` date NOT NULL,
  `ep` varchar(255) NOT NULL,
  `observacoes` varchar(255) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `concluidof` text NOT NULL,
  `pedido_id` int(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verbetes`
--

LOCK TABLES `verbetes` WRITE;
/*!40000 ALTER TABLE `verbetes` DISABLE KEYS */;
INSERT INTO `verbetes` VALUES (2,1,'21213','2019-11-25','2019-11-25','2019-11-25','2019-11-25','2019-11-25','2019-11-25','Lisboa','teste',1,'teste','teste',1,'2019-11-25 12:16:42','2019-11-25 12:16:42');
/*!40000 ALTER TABLE `verbetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'c3acl'
--

--
-- Dumping routines for database 'c3acl'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-09 16:12:51
