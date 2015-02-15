-- MySQL dump 10.13  Distrib 5.5.34, for osx10.6 (i386)
--
-- Host: localhost    Database: plusstudy
-- ------------------------------------------------------
-- Server version	5.5.34-log

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailaddress` varchar(100) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_ruby` varchar(100) DEFAULT NULL,
  `first_ruby` varchar(100) DEFAULT NULL,
  `course` char(1) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `isteacher` char(1) DEFAULT NULL,
  `img_ext` varchar(8) DEFAULT NULL,
  `description` text,
  `licenses` text,
  `skill` text,
  `last_login` datetime DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `pub_mailaddress` varchar(100) DEFAULT NULL,
  `img_w` int(11) DEFAULT '0',
  `img_h` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'masaya@gmail.com','masaya','稲垣','匡哉','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp',0,0),(2,'masaya2@gmail.com','masaya2','稲垣','匡哉２','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp',0,0),(3,'taka@gmail.com','taka','福島','孝明','フクシマ','タカアキ','4',4,'WEB開発学科','0','jpg','ファー！','色彩検定2級','お笑い','2014-08-11 00:00:00','taka','taka','taka@yahoo.co.jp',1500,1500);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `content` text,
  `account_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (40,10,'あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ',3,'2014-12-08 14:06:58'),(41,12,'ああああああ',1,'2015-01-12 06:27:04'),(42,12,'いいいいいいい',1,'2015-01-12 06:27:19'),(43,13,'aaa\n',1,'2015-01-12 06:36:20'),(44,15,'aaaaaaa',1,'2015-01-12 07:42:07'),(45,15,'aaaa',1,'2015-01-12 07:44:53'),(46,15,'aaaaaa',1,'2015-01-12 08:34:14'),(47,15,'aaaa',1,'2015-01-12 08:34:20'),(48,15,'aaaa',1,'2015-01-12 08:36:00'),(49,15,'aaaaa',1,'2015-01-12 08:36:04'),(50,15,'aaaaaaa',1,'2015-01-12 08:36:10');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licenses`
--

DROP TABLE IF EXISTS `licenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licenses`
--

LOCK TABLES `licenses` WRITE;
/*!40000 ALTER TABLE `licenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `licenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `me_toos`
--

DROP TABLE IF EXISTS `me_toos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `me_toos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teach_me_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `resolved` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_toos`
--

LOCK TABLES `me_toos` WRITE;
/*!40000 ALTER TABLE `me_toos` DISABLE KEYS */;
INSERT INTO `me_toos` VALUES (30,15,3,'0'),(37,13,2,NULL),(38,16,2,NULL),(39,13,3,NULL),(40,16,3,NULL),(41,16,1,NULL),(42,17,1,'0'),(43,18,1,'0'),(44,19,1,'0'),(45,19,3,NULL),(46,20,3,'0');
/*!40000 ALTER TABLE `me_toos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newacc_tmps`
--

DROP TABLE IF EXISTS `newacc_tmps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newacc_tmps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailaddress` varchar(100) DEFAULT NULL,
  `passwd` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newacc_tmps`
--

LOCK TABLES `newacc_tmps` WRITE;
/*!40000 ALTER TABLE `newacc_tmps` DISABLE KEYS */;
INSERT INTO `newacc_tmps` VALUES (1,'aaaaa@.a.a','98587213','2014-10-04 05:07:46'),(2,'aaa@a.a.c','944477551','2015-01-12 08:57:49');
/*!40000 ALTER TABLE `newacc_tmps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seminar_id` int(11) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `feedbacked` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (31,1,3,'1'),(32,4,2,'1'),(33,4,1,'1'),(35,10,3,'1'),(36,8,1,'1'),(38,5,1,'1'),(40,19,1,'1'),(41,21,1,'0'),(42,22,2,'0'),(43,21,2,'0');
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seminar_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (8,1,'持ち物について','持ってくるものは何かありますか?','2014-10-05 15:24:09',3),(9,8,'a','aaa','2014-11-19 03:55:55',1),(10,9,'aaaaaaaaaaaa','aaaaaaaaa','2014-11-29 03:24:26',1),(11,10,'教えてええええええ','あああああああああああああああ','2014-11-29 06:47:12',3),(12,19,'あああ','あああ','2015-01-12 06:26:55',1),(13,19,'aaaa','aaaa','2015-01-12 06:35:46',1),(14,20,'あああああああああ','いいいいいいいいい','2015-01-12 07:20:33',3),(15,20,'あああああああああああああああああああああああああああああああああああああああああああああああああああああああああ','あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ','2015-01-12 07:40:26',3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar_images`
--

DROP TABLE IF EXISTS `seminar_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `ext` varchar(8) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `tmpid` int(11) DEFAULT '0',
  `size` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_images`
--

LOCK TABLES `seminar_images` WRITE;
/*!40000 ALTER TABLE `seminar_images` DISABLE KEYS */;
INSERT INTO `seminar_images` VALUES (1,2,'1番目','.jpg',1600,1200,0,71948),(2,2,'2番目','.jpg',1200,675,0,235746),(3,2,'3番目','.jpg',170,127,0,4168),(4,1,'4番目','.jpg',400,331,0,36157),(5,NULL,NULL,NULL,NULL,NULL,1483769611,0),(6,3,'','.45',2068,1212,0,758425),(7,3,'','.45',1154,611,0,451112),(8,3,'','.45',1154,611,0,451112),(9,3,'','.jpeg',144,170,0,4199),(10,3,'','.jpeg',144,170,0,4199),(12,3,'','.jpeg',1000,170,0,20580),(13,3,'','.jpeg',1000,170,0,20580),(14,3,'','.jpeg',1000,170,0,20580),(15,3,'','.jpeg',1000,170,0,20580),(16,3,'','.jpeg',1000,170,0,20580),(18,3,'','.jpeg',1000,170,0,20580),(19,3,'','.png',1178,2760,0,91931);
/*!40000 ALTER TABLE `seminar_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminars`
--

DROP TABLE IF EXISTS `seminars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seminar_image_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `reservation_limit` datetime DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `teach_me_id` int(11) DEFAULT NULL,
  `gj` int(11) DEFAULT '0',
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `description` text,
  `upper_limit` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminars`
--

LOCK TABLES `seminars` WRITE;
/*!40000 ALTER TABLE `seminars` DISABLE KEYS */;
INSERT INTO `seminars` VALUES (21,0,'Ruby on Rails勉強会','2015-02-19 00:00:00','HAL名古屋4Fホール',3,NULL,0,'2015-02-20 00:00:00','2015-02-20 00:00:00','Ruby on Rails',10),(22,0,'Unity2D入門','2015-02-27 00:00:00','HAL名古屋4Fホール',1,NULL,0,'2015-02-28 00:00:00','2015-02-28 00:00:00','Unity',20),(23,0,'CakePHP入門','2015-02-24 00:00:00','HAL名古屋4Fホール',1,NULL,0,'2015-02-25 10:00:00','2015-02-25 12:00:00','CakePHP',10);
/*!40000 ALTER TABLE `seminars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teach_mes`
--

DROP TABLE IF EXISTS `teach_mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teach_mes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teach_mes`
--

LOCK TABLES `teach_mes` WRITE;
/*!40000 ALTER TABLE `teach_mes` DISABLE KEYS */;
INSERT INTO `teach_mes` VALUES (13,1,'Androidアプリ開発','Androidアプリの作り方を教えて下さい!'),(16,3,'PHP入門','PHPを勉強しましょう！'),(17,1,'Python','知りたいです！！'),(18,1,'Unreal Engine 4','やってみたいです！！'),(19,1,'Swift','やってみたい！'),(20,3,'MySQL','教えて！');
/*!40000 ALTER TABLE `teach_mes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-13 11:07:28
