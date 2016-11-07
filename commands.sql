-- MySQL dump 10.13  Distrib 5.7.16, for Linux (i686)
--
-- Host: localhost    Database: MusicStore
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `Catalog`
--

DROP TABLE IF EXISTS `Catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Catalog` (
  `songID` int(11) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `pictureLink` varchar(120) DEFAULT NULL,
  KEY `songID` (`songID`),
  CONSTRAINT `Catalog_ibfk_1` FOREIGN KEY (`songID`) REFERENCES `Songs` (`songID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Catalog`
--

LOCK TABLES `Catalog` WRITE;
/*!40000 ALTER TABLE `Catalog` DISABLE KEYS */;
INSERT INTO `Catalog` VALUES (1,'2.99','http://www.billboard.com/files/styles/top_cover/public/media/bb28-Philanthropy-2016-3-billboard-pio-225.jpg'),(2,'3.99','http://www.billboard.com/images/pref_images/q56523k8p5q.jpg'),(3,'4.99','http://www.billboard.com/images/pref_images/q58043g71qu.jpg'),(4,'2.99','http://www.billboard.com/images/pref_images/q59697htfhi.jpg'),(5,'3.99','http://www.billboard.com/images/pref_images/q55963rka7z.jpg'),(6,'3.99','http://www.billboard.com/images/pref_images/q59123tine7.jpg'),(7,'4.99','http://www.billboard.com/images/pref_images/q39056czrzc.jpg'),(8,'1.99','http://www.billboard.com/images/pref_images/q58635xjm0i.jpg'),(9,'2.99','http://www.billboard.com/images/pref_images/q58396y87pz.jpg'),(10,'4.99','http://www.billboard.com/images/pref_images/q59725qvpol.jpg'),(11,'2.99','http://www.billboard.com/images/pref_images/yyyy8029153055372258969.jpg'),(12,'4.99','http://www.billboard.com/images/pref_images/q37570nx70w.jpg'),(13,'1.99','http://www.billboard.com/images/pref_images/q45858cetff.jpg'),(14,'3.99','http://www.billboard.com/images/pref_images/q54451rbcic.jpg'),(15,'1.99','http://www.billboard.com/images/pref_images/q48642a2jvd.jpg'),(16,'4.99','http://www.billboard.com/images/pref_images/q59697htfhi.jpg'),(17,'3.99','http://www.billboard.com/images/pref_images/q58043g71qu.jpg'),(18,'4.99','http://www.billboard.com/images/pref_images/q50462hj2sc.jpg'),(19,'3.99','http://www.billboard.com/images/pref_images/yyyy2384373149827834455.jpg'),(20,'1.99','http://www.billboard.com/images/pref_images/q56523k8p5q.jpg'),(21,'2.99','http://www.billboard.com/images/pref_images/q37000tpld3.jpg'),(22,'1.99','http://www.billboard.com/images/pref_images/q48642a2jvd.jpg'),(23,'1.99','http://www.billboard.com/images/pref_images/q39056czrzc.jpg'),(24,'4.99','http://www.billboard.com/images/pref_images/q34327sud67.jpg'),(25,'3.99','http://www.billboard.com/images/pref_images/q55963rka7z.jpg'),(26,'1.99','http://www.billboard.com/images/pref_images/q55963rka7z.jpg'),(27,'4.99','http://www.billboard.com/images/pref_images/yyyy7891934543737803251.jpg'),(28,'4.99','http://www.billboard.com/images/pref_images/q42396myajr.jpg'),(29,'4.99','http://www.billboard.com/images/pref_images/q37409dqics.jpg'),(30,'3.99','http://www.billboard.com/images/pref_images/q55103nkulw.jpg'),(31,'4.99','http://www.billboard.com/images/pref_images/q56666jbafk.jpg'),(32,'3.99','http://www.billboard.com/images/pref_images/q58048p3kyi.jpg'),(33,'3.99','http://www.billboard.com/images/pref_images/q52102onwz2.jpg'),(34,'4.99','http://www.billboard.com/images/pref_images/q59089kzfpe.jpg'),(35,'2.99','http://www.billboard.com/images/pref_images/q55963rka7z.jpg'),(36,'4.99','http://www.billboard.com/images/pref_images/q59494clmoj.jpg'),(37,'3.99','http://www.billboard.com/images/pref_images/q46483ubdhf.jpg'),(38,'1.99','http://www.billboard.com/images/pref_images/q44977u7wlb.jpg'),(39,'1.99','http://www.billboard.com/images/pref_images/q58027oq2us.jpg'),(40,'3.99','http://www.billboard.com/images/pref_images/q55963rka7z.jpg');
/*!40000 ALTER TABLE `Catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Genres`
--

DROP TABLE IF EXISTS `Genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Genres` (
  `genreID` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`genreID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genres`
--

LOCK TABLES `Genres` WRITE;
/*!40000 ALTER TABLE `Genres` DISABLE KEYS */;
INSERT INTO `Genres` VALUES (1,'Hip-Hop'),(2,'Rock'),(3,'Pop'),(4,'Country'),(5,'Acoustic Folk'),(6,'Acoustic General'),(7,'Acoustic Guitar'),(8,'Acoustic Piano'),(9,'Acoustic Rock'),(10,'Acoustic Vocals'),(11,'Cover Songs'),(12,'Folk'),(13,'Acid Jazz'),(14,'Bebop'),(15,'Dixieland'),(16,'Free Jazz'),(17,'Jazz Fusion'),(18,'Jazz General'),(19,'Jazz Vocals'),(20,'Alternative Metal'),(21,'Death/Black Metal'),(22,'Doom Metal'),(23,'Goth Metal'),(24,'Heavy Metal'),(25,'Industrial Metal'),(26,'Metal Riffs and Licks'),(27,'Power Metal'),(28,'Progressive Metal'),(29,'Rap-Metal'),(30,'Thrash Metal'),(31,'Christian Rock'),(32,'Classic Rock'),(33,'Folk Rock'),(34,'Garage Rock'),(35,'Goth Rock'),(36,'Guitar Rock'),(37,'Indie'),(38,'Baroque'),(39,'Chamber Music'),(40,'Choral');
/*!40000 ALTER TABLE `Genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Songs`
--

DROP TABLE IF EXISTS `Songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Songs` (
  `songID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `artist` varchar(50) DEFAULT NULL,
  `length` varchar(10) DEFAULT NULL,
  `genreID` int(11) DEFAULT NULL,
  PRIMARY KEY (`songID`),
  KEY `genreID` (`genreID`),
  CONSTRAINT `Songs_ibfk_1` FOREIGN KEY (`genreID`) REFERENCES `Genres` (`genreID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Songs`
--

LOCK TABLES `Songs` WRITE;
/*!40000 ALTER TABLE `Songs` DISABLE KEYS */;
INSERT INTO `Songs` VALUES (1,'Closer','The Chainsmokers ','2:49',3),(2,'Starboy','Zay Hilfigerrr ','4:22',3),(3,'Heathens','Hailee Steinfeld ','2:23',2),(4,'Let Me Love You','Maroon 5 ','4:41',4),(5,'Broccoli','Drake','2:35',3),(6,'24K Magic','Weeknd','5:56',4),(7,'Side To Side','Twenty One Pilots ','4:25',4),(8,'Cold Water','Dj Snake ','3:57',2),(9,'Juju On That Beat (TZ Anthem)','Dram','2:42',1),(10,'I Hate U I Love U','Bruno Mars ','4:36',4),(11,'Treat You Better','Ariana Grande ','4:13',1),(12,'Cheap Thrills','Major Lazer ','2:52',2),(13,'Don&#039;t Wanna Know','Zay Hilfigerrr ','3:12',3),(14,'Starving','Gnash','5:52',3),(15,'Gold','Shawn Mendes ','2:53',3),(16,'Black Beatles','Sia','5:22',1),(17,'Don&#039;t Let Me Down','Maroon 5 ','4:42',3),(18,'This Is What You Came For','Hailee Steinfeld ','5:24',1),(19,'The Greatest','Kiiara','2:38',2),(20,'Ride','Rae Sremmurd ','5:12',1),(21,'Can&#039;t Stop The Feeling!','The Chainsmokers ','4:33',3),(22,'OOOUUU','Calvin Harris ','2:59',1),(23,'One Dance','Sia','2:56',2),(24,'Fake Love','Twenty One Pilots ','3:14',4),(25,'Caroline','Justin Timberlake ','2:24',2),(26,'Send My Love (To Your New Lover)','Young M ','3:37',3),(27,'Unsteady','Drake','5:15',1),(28,'Needed Me','Drake','4:40',1),(29,'Luv','Amine','3:59',1),(30,'Scars To Your Beautiful','Adele','3:14',2),(31,'Sucker For Pain','X Ambassadors ','3:23',2),(32,'Hallelujah','Rihanna','5:35',3),(33,'Too Good','Tory Lanez ','3:41',1),(34,'Sit Still, Look Pretty','Alessia Cara ','4:36',2),(35,'We Don&#039;t Talk Anymore','Lil Wayne ','4:31',1),(36,'Hymn For The Weekend','Pentatonix','4:22',1),(37,'Tiimmy Turner','Drake','5:50',2),(38,'Sneakin&#039;','Daya','2:30',2),(39,'Setting The World On Fire','Charlie Puth ','3:52',3),(40,'Chill Bill','Coldplay','4:48',2);
/*!40000 ALTER TABLE `Songs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-07  5:32:24
