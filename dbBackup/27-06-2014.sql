-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sunglasses
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

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
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'test: testValue\n'),(2,'test: testValue\n'),(3,'test: testValue\n'),(4,'test: testValue\n');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people_wearing_glasses`
--

DROP TABLE IF EXISTS `people_wearing_glasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people_wearing_glasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(200) DEFAULT NULL,
  `sunglasses_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_wearing_glasses`
--

LOCK TABLES `people_wearing_glasses` WRITE;
/*!40000 ALTER TABLE `people_wearing_glasses` DISABLE KEYS */;
INSERT INTO `people_wearing_glasses` VALUES (32,'peoplePhotos/9994.jpg',NULL),(36,'peoplePhotos/parks-binding-stickers.jpg',NULL),(38,'peoplePhotos/900.jpg',NULL),(39,'peoplePhotos/dEnHk4_Dm4M.jpg',NULL),(42,'peoplePhotos/Bob2_707x5721.jpg',NULL),(44,'peoplePhotos/4D0Xu5KVOQU2.jpg',NULL),(45,'peoplePhotos/Bob-Soven-Spy1.jpg',NULL),(46,'peoplePhotos/lentes-spy-ken-block-100-originales-caja-funda-pano--8390-MLV20003850295_112013-O1.jpg',NULL),(47,'peoplePhotos/tdIAbuq0zfI1.jpg',NULL);
/*!40000 ALTER TABLE `people_wearing_glasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sunglasses`
--

DROP TABLE IF EXISTS `sunglasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sunglasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `mini_img_path` varchar(200) DEFAULT NULL,
  `price` int(4) DEFAULT NULL,
  `thumbnail_img_path` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sunglasses`
--

LOCK TABLES `sunglasses` WRITE;
/*!40000 ALTER TABLE `sunglasses` DISABLE KEYS */;
INSERT INTO `sunglasses` VALUES (27,'Ken Block Helm','green','kenBlockHelm/1167917391_103.jpg','kenBlockHelm/h200/1167917391_103.jpg',150,'kenBlockHelm/h30/1167917391_103.jpg'),(28,'Ken Block Helm','grey spider','kenBlockHelm/1167381755_063.jpg','kenBlockHelm/h200/1167381755_063.jpg',150,'kenBlockHelm/h30/1167381755_063.jpg'),(29,'Ken Block Helm','green grey spider','kenBlockHelm/1167917400_410.jpg','kenBlockHelm/h200/1167917400_410.jpg',150,'kenBlockHelm/h30/1167917400_410.jpg'),(30,'Ken Block Helm','green spider','kenBlockHelm/1167917392_031.jpg','kenBlockHelm/h200/1167917392_031.jpg',150,'kenBlockHelm/h30/1167917392_031.jpg'),(31,'Ken Block Helm','orange','kenBlockHelm/1167381745_205.jpg','kenBlockHelm/h200/1167381745_205.jpg',150,'kenBlockHelm/h30/1167381745_205.jpg'),(32,'Ken Block Helm','purple','kenBlockHelm/1167917397_168.jpg','kenBlockHelm/h200/1167917397_168.jpg',150,'kenBlockHelm/h30/1167917397_168.jpg'),(33,'Ken Block Helm','black','kenBlockHelm/1167381742_765.jpg','kenBlockHelm/h200/1167381742_765.jpg',120,'kenBlockHelm/h30/1167381742_765.jpg'),(34,'Ken Block Helm','orange-blue','kenBlockHelm/1167381740_183.jpg','kenBlockHelm/h200/1167381740_183.jpg',150,'kenBlockHelm/h30/1167381740_183.jpg'),(35,'Ken Block Helm','leopard','kenBlockHelm/1167381743_476.jpg','kenBlockHelm/h200/1167381743_476.jpg',120,'kenBlockHelm/h30/1167381743_476.jpg'),(36,'Ken Block Helm','yellow','kenBlockHelm/1167381752_141.jpg','kenBlockHelm/h200/1167381752_141.jpg',150,'kenBlockHelm/h30/1167381752_141.jpg'),(37,'Flynn','white-purple','flynn/3.jpg','flynn/h200/3.jpg',280,'flynn/h30/3.jpg'),(38,'Flynn','green','flynn/7.jpg','flynn/h200/7.jpg',280,'flynn/h30/7.jpg'),(39,'Flynn','military 2','flynn/9.jpg','flynn/h200/9.jpg',250,'flynn/h30/9.jpg'),(42,'Flynn','purple-green','flynn/4.jpg','flynn/h200/4.jpg',280,'flynn/h30/4.jpg'),(43,'Flynn','white','flynn/5.jpg','flynn/h200/5.jpg',280,'flynn/h30/5.jpg'),(45,'Flynn','red','flynn/6.jpg','flynn/h200/6.jpg',280,'flynn/h30/6.jpg'),(49,'Flynn','purple','flynn/1.jpg','flynn/h200/1.jpg',280,'flynn/h30/1.jpg'),(50,'Flynn','black','flynn/2.jpg','flynn/h200/2.jpg',280,'flynn/h30/2.jpg'),(53,'Flynn','military 1','flynn/8.jpg','flynn/h200/8.jpg',250,'flynn/h30/8.jpg'),(134,'Ken Block Helm','black_white','kenBlockHelm2/black_white.jpg','kenBlockHelm2/mini/black_white.jpg',150,'kenBlockHelm2/thumbnail/black_white.jpg'),(135,'Ken Block Helm','blue_silver','kenBlockHelm2/blue_silver.jpg','kenBlockHelm2/mini/blue_silver.jpg',150,'kenBlockHelm2/thumbnail/blue_silver.jpg'),(136,'Ken Block Helm','black-orange','kenBlockHelm2/black-orange.jpg','kenBlockHelm2/mini/black-orange.jpg',130,'kenBlockHelm2/thumbnail/black-orange.jpg'),(137,'Ken Block Helm','white_frame','kenBlockHelm2/white_frame.jpg','kenBlockHelm2/mini/white_frame.jpg',130,'kenBlockHelm2/thumbnail/white_frame.jpg'),(138,'Ken Block Helm','grey_spider','kenBlockHelm2/grey_spider.jpg','kenBlockHelm2/mini/grey_spider.jpg',150,'kenBlockHelm2/thumbnail/grey_spider.jpg'),(139,'Ken Block Helm','purple_blue','kenBlockHelm2/purple_blue.jpg','kenBlockHelm2/mini/purple_blue.jpg',150,'kenBlockHelm2/thumbnail/purple_blue.jpg'),(140,'Ken Block Helm','purple_black','kenBlockHelm2/purple_black.jpg','kenBlockHelm2/mini/purple_black.jpg',150,'kenBlockHelm2/thumbnail/purple_black.jpg'),(141,'Ken Block Helm','white','kenBlockHelm2/white.jpg','kenBlockHelm2/mini/white.jpg',150,'kenBlockHelm2/thumbnail/white.jpg'),(142,'Ken Block Helm','orange_blue_(black)','kenBlockHelm2/orange_blue_(black).jpg','kenBlockHelm2/mini/orange_blue_(black).jpg',150,'kenBlockHelm2/thumbnail/orange_blue_(black).jpg'),(143,'Ken Block Helm','purple_grey','kenBlockHelm2/purple_grey.jpg','kenBlockHelm2/mini/purple_grey.jpg',150,'kenBlockHelm2/thumbnail/purple_grey.jpg'),(144,'Ken Block Helm','purple_white','kenBlockHelm2/purple_white.jpg','kenBlockHelm2/mini/purple_white.jpg',150,'kenBlockHelm2/thumbnail/purple_white.jpg');
/*!40000 ALTER TABLE `sunglasses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-27 17:22:38
