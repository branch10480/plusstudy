-- MySQL dump 10.13  Distrib 5.5.29, for osx10.6 (i386)
--
-- Host: localhost    Database: plusstudy
-- ------------------------------------------------------
-- Server version	5.5.29

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `accounts` VALUES (1,'masaya@gmail.com','masaya','稲垣','匡哉','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp'),(2,'masaya2@gmail.com','masaya2','稲垣','匡哉２','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp'),(3,'taka@gmail.com','taka','福島','孝明','フクシマ','タカアキ','4',4,'WEB開発学科','0',NULL,'さーーーーーーーーーーーーーーーーーーーーーーーーーーっぷ！！！','色彩検定2級','お笑い','2014-08-11 00:00:00','taka','taka','taka@yahoo.co.jp'),(4,'nefutyisu@yahoo.co.jp','6hz1z9vs','いながき〜','まさや〜','イナガキ','マサヤ','4',3,'教えない！',NULL,NULL,'うおおおおおおおおおおおおおおおおおおおおおおおおおおおおおお','教えない！','教えない！',NULL,'教えない！','教えない！','教えない！');
=======
INSERT INTO `accounts` VALUES (1,'masaya@gmail.com','masaya','稲垣','匡哉','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp',460,460),(2,'masaya2@gmail.com','masaya2','稲垣','匡哉２','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp',0,0),(3,'taka@gmail.com','taka','福島','孝明','フクシマ','タカアキ','4',4,'WEB開発学科','0','01','さーーーーーーーーーーーーーーーーーーーーーーーーーーっぷ！！！','色彩検定2級','お笑い','2014-08-11 00:00:00','taka','taka','taka@yahoo.co.jp',244,175);
>>>>>>> upstream/develop
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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=utf8;
=======
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;
>>>>>>> upstream/develop
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `comments` VALUES (170,3,'あああああああああ',3,'2014-09-19 14:33:39'),(171,3,'死ねええええええええ',3,'2014-09-19 14:33:44'),(172,3,'あああああああああああ',3,'2014-09-19 14:33:52'),(173,3,'おおおおおおおお',2,'2014-09-19 14:33:59'),(174,3,'付き合ってください\n',3,'2014-09-19 14:34:18'),(175,3,'断る by 北折',2,'2014-09-19 14:34:33'),(176,3,'マックスバリュいこう',3,'2014-09-19 14:35:06'),(177,3,'いいでしょう',2,'2014-09-19 14:35:33'),(178,3,'あああああああ',2,'2014-09-19 14:36:07'),(179,3,'\n\n\n；',2,'2014-09-19 14:36:24'),(180,3,'あ\nあ\nあ\nあ\nあ\n',2,'2014-09-19 14:36:33'),(181,3,'ああああああ',2,'2014-09-19 15:59:47'),(182,3,'ああああああああ',3,'2014-09-19 15:59:54'),(183,3,'ああ',2,'2014-09-19 15:59:57'),(184,3,'お',3,'2014-09-19 16:00:06'),(185,3,'あ',2,'2014-09-19 16:00:10'),(186,3,'あ',3,'2014-09-19 16:00:29'),(187,3,'あ',2,'2014-09-19 16:00:32'),(188,4,'あああ',3,'2014-09-19 16:00:49'),(189,6,'aaaaaa',3,'2014-09-22 08:39:07'),(190,1,'aaaaaaaaaaa',1,'2014-09-23 02:37:28'),(191,1,'aaaaaaaaa',1,'2014-09-23 02:37:38'),(192,7,'aaaaaaaaaaaaa',1,'2014-09-23 02:37:53'),(193,7,'aaaaaaaaa',1,'2014-09-23 02:37:56'),(194,NULL,NULL,3,'2014-09-23 07:25:21'),(195,NULL,NULL,3,'2014-09-23 07:25:21'),(196,NULL,NULL,3,'2014-09-23 07:25:21'),(197,NULL,NULL,3,'2014-09-23 07:25:21'),(198,1,'ああああああああ',3,'2014-09-29 10:20:12');
=======
INSERT INTO `comments` VALUES (170,3,'あああああああああ',3,'2014-09-19 14:33:39'),(171,3,'死ねええええええええ',3,'2014-09-19 14:33:44'),(172,3,'あああああああああああ',3,'2014-09-19 14:33:52'),(173,3,'おおおおおおおお',2,'2014-09-19 14:33:59'),(174,3,'付き合ってください\n',3,'2014-09-19 14:34:18'),(175,3,'断る by 北折',2,'2014-09-19 14:34:33'),(176,3,'マックスバリュいこう',3,'2014-09-19 14:35:06'),(177,3,'いいでしょう',2,'2014-09-19 14:35:33'),(178,3,'あああああああ',2,'2014-09-19 14:36:07'),(179,3,'\n\n\n；',2,'2014-09-19 14:36:24'),(180,3,'あ\nあ\nあ\nあ\nあ\n',2,'2014-09-19 14:36:33'),(181,3,'ああああああ',2,'2014-09-19 15:59:47'),(182,3,'ああああああああ',3,'2014-09-19 15:59:54'),(183,3,'ああ',2,'2014-09-19 15:59:57'),(184,3,'お',3,'2014-09-19 16:00:06'),(185,3,'あ',2,'2014-09-19 16:00:10'),(186,3,'あ',3,'2014-09-19 16:00:29'),(187,3,'あ',2,'2014-09-19 16:00:32'),(188,4,'あああ',3,'2014-09-19 16:00:49'),(189,6,'aaaaaa',3,'2014-09-22 08:39:07'),(190,1,'aaaaaaaaaaa',1,'2014-09-23 02:37:28'),(191,1,'aaaaaaaaa',1,'2014-09-23 02:37:38'),(192,7,'aaaaaaaaaaaaa',1,'2014-09-23 02:37:53'),(193,7,'aaaaaaaaa',1,'2014-09-23 02:37:56'),(194,NULL,NULL,3,'2014-09-23 07:25:21'),(195,NULL,NULL,3,'2014-09-23 07:25:21'),(196,NULL,NULL,3,'2014-09-23 07:25:21'),(197,NULL,NULL,3,'2014-09-23 07:25:21');
>>>>>>> upstream/develop
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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
>>>>>>> upstream/develop
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_toos`
--

LOCK TABLES `me_toos` WRITE;
/*!40000 ALTER TABLE `me_toos` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `me_toos` VALUES (7,1,3,'0');
=======
INSERT INTO `me_toos` VALUES (1,NULL,1,'0'),(2,1,3,'0');
>>>>>>> upstream/develop
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newacc_tmps`
--

LOCK TABLES `newacc_tmps` WRITE;
/*!40000 ALTER TABLE `newacc_tmps` DISABLE KEYS */;
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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
>>>>>>> upstream/develop
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `participants` VALUES (26,1,3,'1');
=======
INSERT INTO `participants` VALUES (1,2,1,NULL),(4,2,3,NULL);
>>>>>>> upstream/develop
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'あ！！','え？！！','2014-09-01 12:51:23',1),(2,1,'aaaaaaa','aaaaaaaa','0000-00-00 00:00:00',1),(3,1,'福島だよーん','あっはっはっは','0000-00-00 00:00:00',3),(4,1,'ああああああああ','ううううううううううう','0000-00-00 00:00:00',3),(5,1,'うほおおおおおおおお','あああああああああああああぁぁ','2014-09-05 10:52:03',3),(6,2,'aaaaa','aaaaaaa','2014-09-15 16:41:58',1),(7,2,'あああああああ','ああああああああああああああ','2014-09-16 14:16:35',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_images`
--

LOCK TABLES `seminar_images` WRITE;
/*!40000 ALTER TABLE `seminar_images` DISABLE KEYS */;
INSERT INTO `seminar_images` VALUES (1,2,'1番目','.jpg',1600,1200,0,71948),(2,2,'2番目','.jpg',1200,675,0,235746),(3,2,'3番目','.jpg',170,127,0,4168),(4,1,'4番目','.jpg',400,331,0,36157);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminars`
--

LOCK TABLES `seminars` WRITE;
/*!40000 ALTER TABLE `seminars` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `seminars` VALUES (1,1,'Unity勉強会','2014-08-20 00:00:00','182教室',1,1,20,'2014-08-21 00:00:00','2014-08-22 00:00:00','簡単に3Dゲームが作れる！Unityを勉強しよう！',5),(2,3,'CakePHP勉強会','2014-08-20 00:00:00','182教室',3,NULL,0,'2014-10-21 00:00:00','2014-10-21 00:00:00','WebアプリケーションフレームワークのCakePHPを一緒に勉強しましょう！',5);
=======
INSERT INTO `seminars` VALUES (1,1,'Unity勉強会','2014-08-20 00:00:00','182教室',1,NULL,14,'2014-08-21 00:00:00','2014-08-22 00:00:00','簡単に3Dゲームが作れる！Unityを勉強しよう！',5),(2,3,'CakePHP勉強会','2014-08-20 00:00:00','182教室',3,NULL,0,'2014-10-21 00:00:00','2014-10-21 00:00:00','WebアプリケーションフレームワークのCakePHPを一緒に勉強しましょう！',5);
>>>>>>> upstream/develop
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teach_mes`
--

LOCK TABLES `teach_mes` WRITE;
/*!40000 ALTER TABLE `teach_mes` DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO `teach_mes` VALUES (1,3,'PHPが知りたい！','あああああああああ');
=======
INSERT INTO `teach_mes` VALUES (1,3,'aaaaaaaaaaa','aaaaaaaa');
>>>>>>> upstream/develop
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

<<<<<<< HEAD
-- Dump completed on 2014-09-29 20:44:19
=======
-- Dump completed on 2014-10-04 20:14:53
>>>>>>> upstream/develop
