-- MySQL dump 10.17  Distrib 10.3.20-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: dados
-- ------------------------------------------------------
-- Server version	10.3.20-MariaDB-0ubuntu0.19.10.1

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accesses`
--

LOCK TABLES `accesses` WRITE;
/*!40000 ALTER TABLE `accesses` DISABLE KEYS */;
INSERT INTO `accesses` VALUES (1,1,'Firefox','70.0','Ubuntu','','','2019-11-19 12:26:53');
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
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,200),(2,1,NULL,NULL,'Types',2,13),(3,2,NULL,NULL,'index',3,4),(4,2,NULL,NULL,'view',5,6),(5,2,NULL,NULL,'add',7,8),(6,2,NULL,NULL,'edit',9,10),(7,2,NULL,NULL,'delete',11,12),(8,1,NULL,NULL,'Users',14,35),(9,8,NULL,NULL,'index',15,16),(10,8,NULL,NULL,'view',17,18),(11,8,NULL,NULL,'add',19,20),(12,8,NULL,NULL,'edit',21,22),(13,8,NULL,NULL,'delete',23,24),(14,8,NULL,NULL,'login',25,26),(15,8,NULL,NULL,'logout',27,28),(16,1,NULL,NULL,'Dummy',36,41),(17,16,NULL,NULL,'index',37,38),(18,16,NULL,NULL,'login',39,40),(19,1,NULL,NULL,'AclManager',42,59),(20,19,NULL,NULL,'Acl',43,58),(21,20,NULL,NULL,'index',44,45),(22,20,NULL,NULL,'permissions',46,47),(23,20,NULL,NULL,'updateAcos',48,49),(24,20,NULL,NULL,'updateAros',50,51),(25,20,NULL,NULL,'revokePerms',52,53),(26,20,NULL,NULL,'drop',54,55),(27,20,NULL,NULL,'defaults',56,57),(28,1,NULL,NULL,'DebugKit',60,87),(29,28,NULL,NULL,'MailPreview',61,68),(30,29,NULL,NULL,'index',62,63),(31,29,NULL,NULL,'sent',64,65),(32,29,NULL,NULL,'email',66,67),(33,28,NULL,NULL,'Toolbar',69,72),(34,33,NULL,NULL,'clearCache',70,71),(35,28,NULL,NULL,'Requests',73,76),(36,35,NULL,NULL,'view',74,75),(37,28,NULL,NULL,'Composer',77,80),(38,37,NULL,NULL,'checkDependencies',78,79),(39,28,NULL,NULL,'Panels',81,86),(40,39,NULL,NULL,'index',82,83),(41,39,NULL,NULL,'view',84,85),(42,1,NULL,NULL,'Accesses',88,101),(43,42,NULL,NULL,'index',89,90),(44,42,NULL,NULL,'view',91,92),(45,42,NULL,NULL,'add',93,94),(46,42,NULL,NULL,'edit',95,96),(47,42,NULL,NULL,'delete',97,98),(48,42,NULL,NULL,'admin',99,100),(49,8,NULL,NULL,'profile',29,30),(50,1,NULL,NULL,'Units',102,113),(51,50,NULL,NULL,'index',103,104),(52,50,NULL,NULL,'view',105,106),(53,50,NULL,NULL,'add',107,108),(54,50,NULL,NULL,'edit',109,110),(55,50,NULL,NULL,'delete',111,112),(56,8,NULL,NULL,'password',31,32),(57,8,NULL,NULL,'adminPassword',33,34),(58,1,NULL,NULL,'Josegonzalez\\Upload',114,115),(59,1,NULL,NULL,'States',116,127),(60,59,NULL,NULL,'index',117,118),(61,59,NULL,NULL,'view',119,120),(62,59,NULL,NULL,'add',121,122),(63,59,NULL,NULL,'edit',123,124),(64,59,NULL,NULL,'delete',125,126),(65,1,NULL,NULL,'Pessoas',128,139),(66,65,NULL,NULL,'index',129,130),(67,65,NULL,NULL,'view',131,132),(68,65,NULL,NULL,'add',133,134),(69,65,NULL,NULL,'edit',135,136),(70,65,NULL,NULL,'delete',137,138),(71,1,NULL,NULL,'Estados',140,151),(72,71,NULL,NULL,'index',141,142),(73,71,NULL,NULL,'view',143,144),(74,71,NULL,NULL,'add',145,146),(75,71,NULL,NULL,'edit',147,148),(76,71,NULL,NULL,'delete',149,150),(77,1,NULL,NULL,'Pais',152,163),(78,77,NULL,NULL,'index',153,154),(79,77,NULL,NULL,'view',155,156),(80,77,NULL,NULL,'add',157,158),(81,77,NULL,NULL,'edit',159,160),(82,77,NULL,NULL,'delete',161,162),(83,1,NULL,NULL,'Processos',164,175),(84,83,NULL,NULL,'index',165,166),(85,83,NULL,NULL,'view',167,168),(86,83,NULL,NULL,'add',169,170),(87,83,NULL,NULL,'edit',171,172),(88,83,NULL,NULL,'delete',173,174),(89,1,NULL,NULL,'Pedidos',176,187),(90,89,NULL,NULL,'index',177,178),(91,89,NULL,NULL,'view',179,180),(92,89,NULL,NULL,'add',181,182),(93,89,NULL,NULL,'edit',183,184),(94,89,NULL,NULL,'delete',185,186),(95,1,NULL,NULL,'Verbetes',188,199),(96,95,NULL,NULL,'index',189,190),(97,95,NULL,NULL,'view',191,192),(98,95,NULL,NULL,'add',193,194),(99,95,NULL,NULL,'edit',195,196),(100,95,NULL,NULL,'delete',197,198);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,2,1,'1','1','1','1'),(2,3,16,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_unidadeopera` int(10) NOT NULL DEFAULT 1,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `observacoes` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-28 17:21:19
