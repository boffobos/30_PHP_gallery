-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: gallery
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.19-MariaDB

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `refered_to` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_FK` (`user_id`),
  KEY `comments_FK_1` (`refered_to`),
  CONSTRAINT `comments_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_FK_1` FOREIGN KEY (`refered_to`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,1,'lorem','It is nice picture of album Depeche mode. Like! Subscribe and so on.','2021-09-11 15:06:46',3),(3,1,'Second comment to this image','Hi! Nice comment! I agree with all this words.','2021-09-11 15:55:59',3),(4,2,'Second user&#39;s posts','Hello! I am newbie here. It is my hello world!','2021-09-11 16:08:53',3),(11,1,'test comments','I am adding comments','2021-09-11 16:24:36',3),(13,1,'test2','aaaaaa','2021-09-11 17:16:46',2),(14,1,'Comment 1','Beatles forever!','2021-09-11 17:39:51',5),(15,2,'Lumen','Hi here! Is lumen still cool band?','2021-09-11 20:02:03',8),(16,2,'lumen','I know this album!','2021-09-11 20:14:48',7),(17,2,'Test post hidden input','message for post method','2021-09-11 20:17:53',2),(18,2,'Don&#39;t redirect me please','Added code for no redirection. Trying...','2021-09-11 20:21:02',6),(23,2,'Hello!','World, Hello!','2021-09-11 20:37:46',15),(24,2,'Finally','I have just done adding comment from main page!!!','2021-09-11 20:39:32',16);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `images_FK` (`user_id`),
  CONSTRAINT `images_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (2,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/Western_Dream.jpg','2021-09-10 00:41:54','Western_Dream.jpg'),(3,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/DM-PersonalJesus.jpg','2021-09-10 00:42:05','DM-PersonalJesus.jpg'),(5,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/cover.jpg','2021-09-10 01:24:17','cover.jpg'),(6,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/2004 - Три пути (Full).jpg','2021-09-10 09:36:03','2004 - Три пути (Full).jpg'),(7,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/2009 - Мир.jpg','2021-09-11 13:31:57','2009 - Мир.jpg'),(8,1,'C:\\xampp\\htdocs\\30_PHP_gallery/public/img/2007 - Буря.jpg','2021-09-11 13:37:09','2007 - Буря.jpg'),(15,2,'C:\\xampp\\htdocs\\30_PHP_gallery\\public\\img\\Freestyler.jpg','2021-09-11 18:44:08','Freestyler.jpg'),(16,2,'C:\\xampp\\htdocs\\30_PHP_gallery\\public\\img\\Баста_2.jpg','2021-09-11 18:45:02','Баста_2.jpg'),(18,2,'C:\\xampp\\htdocs\\30_PHP_gallery\\public\\img\\cover2.jpg','2021-09-11 20:07:22','cover2.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Denis Zhurov','test@examle.com','$2y$10$GbJ/MM/LlAbMuJ9oYpuTBuzS3jDM2UVOr1NmUvRl4zBJLQpEqZjSe','2021-09-09 20:44:08'),(2,'John Doe','jdoe@example.com','$2y$10$va4.KYHfpOP1n8dL6EoVMulS/Ji1So2calsA6VVtL5gGGfzQBEl0i','2021-09-11 16:07:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gallery'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-11 21:22:00
