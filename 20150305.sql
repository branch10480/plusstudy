-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: plusstudy
-- ------------------------------------------------------
-- Server version	5.5.38

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'masaya@gmail.com','masaya','稲垣','匡哉','イナガキ','マサヤ','4',3,'ゲーム学科','0','jpg','フォー！','スペシャリスト','奇声','2014-08-11 00:00:00','masaya','なし','masaya@yahoo.co.jp',460,460),(2,'masaya2@gmail.com','masaya2','稲垣<hr>','匡哉２２<hr>','イナガキ','マサヤ','2',2,'ゲーム企画学科','0','jpg','フォー！\'<hr>','スペシャリスト<hr>','奇声\'<hr>','2014-08-11 00:00:00','masaya\'<hr>','\'なし<hr>','masaya@yahoo.co.jp<hr>',460,460),(3,'taka@gmail.com','taka','福島','孝明','フクシマ','タカアキ','4',4,'WEB開発学科','0','01','さーーーーーーーーーーーーーーーーーーーーーーーーーーっぷ！！！','色彩検定2級','お笑い','2014-08-11 00:00:00','taka','taka','taka@yahoo.co.jp',244,175),(4,'sldfkjasldkfj@sdfasd\'','aaaaaaaa','今枝','稔晴','イマエダ','トシハル','4',3,'3',NULL,NULL,'よおろしくーーー’’’\'\r\n\'','スペシャリスト','奇声',NULL,'','','',0,0),(5,'sldfkjasldkfj@sdfasd\'','aaaaaaaa','今枝','稔晴','イマエダ','トシハル','4',3,'3',NULL,NULL,'よおろしくーーー’’’\'\r\n\'','スペシャリスト','奇声',NULL,'','','',0,0),(6,'sldfkjasldkfj@sdfasd\'','aaaaaaaa','今枝','稔晴','イマエダ','トシハル','4',3,'3',NULL,NULL,'よおろしくーーー’’’\'\r\n\'','スペシャリスト','奇声',NULL,'','','',0,0),(7,'masaya4@gmail.com\'','aaaaaaaa','今枝','稔晴','イナガキ','マサヤ','4',4,'2',NULL,NULL,'asdfasdfasdf','スペシャリスト','奇声',NULL,'masaya','\'なし','masaya@yahoo.co.jp\'',0,0),(8,'sldfkjasldkfj@sdfsd\'','aaaaaaaa','稲垣','匡哉２２','イナガキ','マサヤ','2',1,'2',NULL,NULL,'asdfasdfasdf','スペシャリスト','奇声',NULL,'masaya\'','なし','masaya@yahoo.co.jp',0,0),(9,'masaya3@gmail.com\'','aaaaaaaa','稲垣','匡哉２２','イナガキ','マサヤ','4',3,'2',NULL,NULL,'sdasdfasf\'','スペシャリスト','奇声',NULL,'masaya','なし','masaya@yahoo.co.jp',0,0),(10,'ssldfkjasldkfj@sdfasd\'','aaaaaaaa','asdfasd<hr>','asdfasdf<hr>','イナガキ','マサヤ','4',4,'4',NULL,NULL,'adfasdasd\'<hr','スペシャリスト<hr>','奇声<hr>',NULL,'masaya\'<hr>','\'なし<hr>','masaya@yahoo.co.jp<hr>',0,0),(11,'masaya2@gmail.comsdfsasds','asdfasdf','稲垣','匡哉２２','イナガキ','マサヤ','2',2,'aaaaaa',NULL,NULL,'asdfasdf','aaaa','aa',NULL,'','','',0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (170,3,'あああああああああ',3,'2014-09-19 14:33:39'),(171,3,'死ねええええええええ',3,'2014-09-19 14:33:44'),(172,3,'あああああああああああ',3,'2014-09-19 14:33:52'),(173,3,'おおおおおおおお',2,'2014-09-19 14:33:59'),(174,3,'付き合ってください\n',3,'2014-09-19 14:34:18'),(175,3,'断る by 北折',2,'2014-09-19 14:34:33'),(176,3,'マックスバリュいこう',3,'2014-09-19 14:35:06'),(177,3,'いいでしょう',2,'2014-09-19 14:35:33'),(178,3,'あああああああ',2,'2014-09-19 14:36:07'),(179,3,'\n\n\n；',2,'2014-09-19 14:36:24'),(180,3,'あ\nあ\nあ\nあ\nあ\n',2,'2014-09-19 14:36:33'),(181,3,'ああああああ',2,'2014-09-19 15:59:47'),(182,3,'ああああああああ',3,'2014-09-19 15:59:54'),(183,3,'ああ',2,'2014-09-19 15:59:57'),(184,3,'お',3,'2014-09-19 16:00:06'),(185,3,'あ',2,'2014-09-19 16:00:10'),(186,3,'あ',3,'2014-09-19 16:00:29'),(187,3,'あ',2,'2014-09-19 16:00:32'),(188,4,'あああ',3,'2014-09-19 16:00:49'),(189,6,'aaaaaa',3,'2014-09-22 08:39:07'),(190,1,'aaaaaaaaaaa',1,'2014-09-23 02:37:28'),(191,1,'aaaaaaaaa',1,'2014-09-23 02:37:38'),(192,7,'aaaaaaaaaaaaa',1,'2014-09-23 02:37:53'),(193,7,'aaaaaaaaa',1,'2014-09-23 02:37:56'),(194,NULL,NULL,3,'2014-09-23 07:25:21'),(195,NULL,NULL,3,'2014-09-23 07:25:21'),(196,NULL,NULL,3,'2014-09-23 07:25:21'),(197,NULL,NULL,3,'2014-09-23 07:25:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `me_toos`
--

LOCK TABLES `me_toos` WRITE;
/*!40000 ALTER TABLE `me_toos` DISABLE KEYS */;
INSERT INTO `me_toos` VALUES (1,NULL,1,'0'),(2,1,3,'0'),(3,2,2,'0'),(4,3,2,'0'),(5,4,2,'0'),(6,5,2,'0'),(7,6,2,'0'),(8,7,2,'0'),(9,8,2,'0'),(10,9,2,'0');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newacc_tmps`
--

LOCK TABLES `newacc_tmps` WRITE;
/*!40000 ALTER TABLE `newacc_tmps` DISABLE KEYS */;
INSERT INTO `newacc_tmps` VALUES (1,'masaya3@gmail.com','986931738','2015-02-15 05:21:13'),(2,'masaya4@gmail.com','1811069829','2015-02-15 08:56:22'),(3,'masaya4@gmail.com','703437273','2015-02-15 08:56:58'),(4,'masaya3@gmail.com','777429487','2015-02-15 08:57:34'),(5,'masaya3@gmail.com','207139266','2015-02-15 08:57:42'),(6,'tekito@gmail.com','51977971','2015-02-21 06:36:07'),(7,'sldfkjasldkfj@sdfasd\'','541169777','2015-02-21 10:05:10'),(8,'masaya4@gmail.com\'','138508656','2015-02-21 10:10:53'),(9,'masaya4@gmail.com\'','291077841','2015-02-21 10:11:01'),(10,'sldfkjasldkfj@sdfsd\'','1881996897','2015-02-21 10:13:03'),(12,'<hr>@sdf.cm','16656948','2015-02-21 10:39:13'),(13,'masaya3@gmail.comlll','1387048942','2015-03-02 06:51:34'),(14,'masaya2@gmail.comsdfs','964290884','2015-03-02 08:10:49'),(15,'<hr>@sdf.cmaaa','1480835138','2015-03-02 08:16:56'),(16,'sldfkjasldkfj@sdfasd\'sdfas','344377849','2015-03-04 05:13:26'),(17,'masaya2@gmail.comsdfsasds','961537642','2015-03-04 06:39:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (6,1,2,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar_images`
--

LOCK TABLES `seminar_images` WRITE;
/*!40000 ALTER TABLE `seminar_images` DISABLE KEYS */;
INSERT INTO `seminar_images` VALUES (103,2,'','.png',2880,1800,0,2888415),(105,2,'','.jpg',2880,1800,0,2392478),(106,2,'','.jpg',1000,1000,0,211007),(107,2,'','.jpg',2880,1800,0,1697676);
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
  `suspended` tinyint(1) DEFAULT '0',
  `suspend_dsc` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminars`
--

LOCK TABLES `seminars` WRITE;
/*!40000 ALTER TABLE `seminars` DISABLE KEYS */;
INSERT INTO `seminars` VALUES (1,1,'Unity勉強会','2014-08-20 00:00:00','182教室',1,NULL,15,'2014-08-21 00:00:00','2014-08-22 00:00:00','簡単に3Dゲームが作れる！Unityを勉強しよう！',5,0,NULL),(2,3,'CakePHP勉強会','2014-08-20 00:00:00','182教室',3,NULL,2,'2014-10-21 00:00:00','2014-10-21 00:00:00','WebアプリケーションフレームワークのCakePHPを一緒に勉強しましょう！',5,0,NULL),(3,0,'さくらインターネット','2015-02-18 02:00:00','192教室',2,NULL,0,'2015-02-20 12:00:00','2015-02-20 18:00:00','さくらインターネットについて勉強します！<div>興味ある方は是非ご参加ください。</div><img src=\"http://localhost:1024/plusstudy/img/seminar/101.jpg\">',10,0,NULL),(4,103,'さくらインターネット','2015-02-27 00:00:00','192教室',2,NULL,0,'2015-03-06 00:00:00','2015-03-06 00:00:00','sdasdasd<div>asda</div>',10,0,NULL),(5,103,'ｊｇｊｈｇｊｈｇ\'','2015-02-25 00:00:00','ううううう',2,NULL,0,'2015-02-26 04:00:00','2015-02-26 15:00:00','kjhkjhkjh<div>]kjhkjh</div><div><br></div><div><br></div><br><img src=\"http://localhost:1024/plusstudy/img/seminar/105.jpg\">',50,0,NULL),(6,0,'\'さくら\'','2015-03-19 00:00:00','場所場所',2,NULL,0,'2015-02-27 00:00:00','2015-02-27 00:00:00','<div>\'\'\'</div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',19,0,NULL),(7,105,'dsfsdf\'','2015-02-13 03:00:00','sdf',2,NULL,0,'2015-03-14 03:00:00','2015-03-14 10:00:00','asdfasdf<img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',3,0,NULL),(8,0,'sdfa<hr>','2015-02-26 00:00:00','192教室<hr>',2,NULL,0,'2015-03-13 02:00:00','2015-03-13 00:00:00','sdfasdfa<img src=\"http://localhost:1024/plusstudy/img/seminar/105.jpg\">',5,0,NULL),(9,105,'ｊｇｊｈｇｊｈｇd\'','2015-02-22 00:00:00','asdf<hr>',2,NULL,0,'2015-03-05 00:00:00','2015-03-05 00:00:00','sdf<img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',4,0,NULL),(10,105,'さくらインターネット','2015-03-18 06:00:00','ううううう',2,NULL,0,'2015-03-31 06:00:00','2015-03-31 20:00:00','adfasdfasf<div>asdfasdf</div><div>asdf</div><div>asdf</div><div><br></div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',7,0,NULL),(11,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(12,107,'dsfsdf\'','2015-03-11 00:00:00','場所場所',2,NULL,0,'2015-03-25 21:00:00','2015-03-25 23:00:00','sdf<div>sdf</div><div>sdf</div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\"><div><br></div><div>asdfasdf&lt;img src=\"\" /&gt;</div>',9,0,NULL),(13,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(14,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(15,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(16,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(17,105,'さくら','2015-03-20 00:00:00','192教室',2,NULL,0,'2015-03-26 09:00:00','2015-03-26 13:00:00','dfgdf<div>sdfgsdf</div><div>sdfg</div><div><br></div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',10,0,NULL),(18,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(19,105,'さくらインターネット','2015-03-13 15:00:00','場所場所',2,NULL,0,'2015-03-26 18:00:00','2015-03-26 21:00:00','sdsdf<div>sdfs</div><div>asdf</div><div><br></div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',18,0,NULL),(20,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(21,0,NULL,'0000-00-00 00:00:00',NULL,2,NULL,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,NULL),(22,103,'さくら','2015-03-31 11:00:00','場所場所',2,NULL,0,'2015-03-24 12:00:00','2015-03-24 18:00:00','ｓふぁｓふぁｓあｓｄｆｓｄｆ<div>あｓｄｆ</div><div>ｓｄｆ</div><img src=\"http://localhost:1024/plusstudy/img/seminar/103.png\">',999,0,NULL),(23,107,'さくらインターネット','2015-03-05 05:00:00','sadasdasd',2,NULL,0,'2015-03-26 09:00:00','2015-03-26 15:00:00','asdfasdf<div>asdf</div><div><br></div><img src=\"http://localhost:1024/plusstudy/img/seminar/106.jpg\">',8,0,NULL),(24,105,'dsfsdf\'','2015-03-10 01:00:00','sdasd',2,NULL,0,'2015-03-26 11:00:00','2015-03-26 15:00:00','sdfsdfsdf<div>sdfsdf</div><div><br></div><img src=\"http://localhost:1024/plusstudy/img/seminar/106.jpg\">',7,0,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teach_mes`
--

LOCK TABLES `teach_mes` WRITE;
/*!40000 ALTER TABLE `teach_mes` DISABLE KEYS */;
INSERT INTO `teach_mes` VALUES (1,3,'aaaaaaaaaaa','aaaaaaaa'),(2,2,'bbbbbああああ','ｓｄふぁｓｄｆ'),(3,2,'234234あｓｄふぁ','あｓｄふぁｓｄｆ'),(4,2,'ｓｄふぁｓｄｆ','ｓｄｓｄｓっｄｓｄｓ'),(5,2,'llll\'','kkk'),(6,2,'s<hr>','sdfasdfasdf\''),(7,2,'asdfs<hr>','asdf<hr>'),(8,2,'<hr>','sdfasf<hr>'),(9,2,'sdfsd\'','sdfasfsdf');
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

-- Dump completed on 2015-03-05  0:05:57
