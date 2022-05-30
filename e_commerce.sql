-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: e_commerce
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_type` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (2,'ahmad','ahmadabotoimah@gmail.com','Aa123456','uploads/admin_image/61b116331d0c9avatar.png',1),(3,'farah','mango@gmail.com','1234','uploads/admin_image/61b1163a1abefavatar.png',0);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_f_id` int(11) NOT NULL,
  `product_f_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` decimal(4,0) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_main_image` text NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `product_f_id` (`product_f_id`),
  KEY `user_f_id` (`user_f_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_f_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_f_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (16,'Dogs','dogs','images/h6YDsLH6/image444.jpg'),(17,'Cats','different cats families.','images/LT4MMNZQ/cat2.jpg'),(18,'Rabbits','mini rabbits available too','images/daNVnwvR/rabbit8.png');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `comment_image` varchar(255) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_product_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_rate` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_user` (`comment_user_id`),
  KEY `comment_product` (`comment_product_id`),
  CONSTRAINT `comment_product` FOREIGN KEY (`comment_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_user` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `name_visitor` varchar(255) NOT NULL,
  `email_visitor` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cont`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (12,'Tasneem','farah@gmail.com','ssss','dsfacdzvfrwsd'),(13,'Ayman','salam@gmail.com','help','sf/lkdjvn  dklvna sdz sdljzv sdjlzv ds jed c eionc cv jksdcasd jdsv zm,cv lsdjsd jc sdcjwecsdvcjlsdnv nsdbm, sdzkbjesd zxjvbsd cwen sdmiowenc,dMC JSED JL');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_text` varchar(255) NOT NULL,
  `coupon_percent` varchar(255) NOT NULL,
  `coupon_status` varchar(255) NOT NULL DEFAULT 'enable',
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (36,'ahmad123','50','enable');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_details` varchar(255) NOT NULL,
  `order_location` varchar(255) NOT NULL,
  `order_mobile` varchar(255) NOT NULL,
  `order_user_name` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_total` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'preparing',
  `order_user_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_user_id` (`order_user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (88,'114,1','irbid','7785416','ayman','2022-05-28 20:21:06','100','Checking',73),(89,'114,1,113,2','irbid','7785416','ayman','2022-05-28 20:22:20','544','Checking',73),(90,'114,1,113,2','irbid','7785416','ayman','2022-05-28 20:22:38','544','Checking',73),(91,'114,1','irbid','7785416','ayman','2022-05-28 20:23:54','100','Checking',73),(92,'114,1','irbid','7785416','ayman','2022-05-28 20:24:56','100','Checking',73);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `inventory` int(11) NOT NULL,
  `product_rate` int(11) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_desc_image_1` varchar(255) DEFAULT NULL,
  `product_desc_image_2` varchar(255) DEFAULT NULL,
  `product_desc_image_3` varchar(255) DEFAULT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_categorie_id` int(11) NOT NULL,
  `product_nd_color_image` varchar(255) DEFAULT NULL,
  `product_thd_color_image` varchar(255) DEFAULT NULL,
  `product_fourth_color_image` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_quantity` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `product_category` (`product_categorie_id`),
  CONSTRAINT `product_category` FOREIGN KEY (`product_categorie_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (113,'Samoyed Dogs','The big fluffy white dog with the big smile is unmistakable for any other breed. The Samoyed, or \"Sammie,\" is loved for their friendly, loving personalities and bountiful white coat.\r\n\r\n','222',0,NULL,'images/JR3f3hH3/dog34.jpg','images/aKHBsxOM/dog32.jpg','images/8rosYCO2/dog33.jfif','images/mEH8wI97/dog3.jpg','',16,NULL,NULL,NULL,NULL,''),(114,'british shorthair','The British Shorthair is the pedigreed version of the traditional British domestic cat, with a distinctively stocky body, dense coat, and broad face. The most familiar colour variant is the \"British Blue\", with a solid grey-blue coat, orange eyes, and a m','100',0,NULL,'images/jFz53BVl/cat11.w.jpg','images/zMwBubkS/cat43.jfif','images/ZJ9dQsrL/cat44.jpg','images/Rsebhw4w/cat31.avif','',17,NULL,NULL,NULL,NULL,''),(115,'Ragamuffin cat','The Ragamuffin is a breed of domestic cat. It was once considered to be a variant of the Ragdoll cat but was established as a separate breed in 1994. Ragamuffins are notable for their friendly personalities and thick, rabbit-like fur.','100',0,NULL,'images/Esy2MTdy/cat21.jpg','images/WQynIYQ2/cat24.jfif','images/2sHGKrnL/cat22.jfif','images/GnpphIHR/cat23.jfif','',17,NULL,NULL,NULL,NULL,''),(116,'chow chow','The Chow Chow is a sturdily built dog, square in profile, with a broad skull and small, triangular, erect ears with rounded tips. The breed is known for a very dense double coat that is either smooth or rough.','150',0,NULL,'images/rHBWRHp4/dog21.jpg','images/CCHQILJy/dog22.jpg','images/uuiMdFqd/dog24.jfif','images/1dDElVSQ/dog23.jpg','',16,NULL,NULL,NULL,NULL,''),(117,'Domestic rabbit','A domestic or domesticated rabbit —more commonly known as a pet rabbit, bunny, bun, or bunny rabbit—is a subspecies of European rabbit, a member of the lagomorph family. ','20',0,NULL,'images/acibQH5q/rabbit16.jfif','images/rGE9ZM4K/rabbit15.jfif','images/IwRgPZsu/rabbit12.jfif','images/JCpoWIo3/rabbit8.png','',18,NULL,NULL,NULL,NULL,'');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unique_visitors`
--

DROP TABLE IF EXISTS `unique_visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unique_visitors` (
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `visitor_ip` varchar(255) NOT NULL,
  `visittor_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`visittor_id`),
  UNIQUE KEY `visitor_ip` (`visitor_ip`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unique_visitors`
--

LOCK TABLES `unique_visitors` WRITE;
/*!40000 ALTER TABLE `unique_visitors` DISABLE KEYS */;
INSERT INTO `unique_visitors` VALUES ('2021-12-05 23:52:41','::1',1),('2021-12-05 23:59:22','::2',4);
/*!40000 ALTER TABLE `unique_visitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` int(14) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'admin\\uploads\\user_image\\61b1067643199avatar.png',
  `user_gender` varchar(255) NOT NULL,
  `user_creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (73,'ayman','ayman@gmail.com','Ayman123*',7785416,'irbid','','admin\\uploads\\user_image\\61b1067643199avatar.png','','2022-05-28 20:01:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-28 23:50:43
