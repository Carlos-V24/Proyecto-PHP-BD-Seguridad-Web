-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: coyocafe
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `alimento`
--

DROP TABLE IF EXISTS `alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimento` (
  `id_alimento` int(3) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Stock` int(3) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `url_img` varchar(60) NOT NULL,
  PRIMARY KEY (`id_alimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimento`
--

LOCK TABLES `alimento` WRITE;
/*!40000 ALTER TABLE `alimento` DISABLE KEYS */;
INSERT INTO `alimento` VALUES (1,'Acidulados',100,1,''),(2,'Agua 1 Lt',20,12,''),(3,'Agua 600ml',20,7,''),(4,'Barritas Fresa',15,10,''),(5,'Barritas Piña',15,10,''),(6,'Boing Fresa 500ml',10,10,''),(7,'Boing Mango 500ml',10,10,''),(8,'Boing Manzana 500ml',10,10,''),(9,'Boing Naranja 500ml',10,10,''),(10,'Boing Uva 500ml',10,10,''),(11,'Cafe 450ml',250,15,''),(12,'Canelitas',10,12,''),(13,'Chetos Colmillos',10,10,''),(14,'Chetos Flaming Hot',10,10,''),(15,'Chetos Nacho',10,10,''),(16,'Chetos Poffs',10,10,''),(17,'Chetos Torciditos',10,10,''),(18,'Chetos Torciditos',10,10,''),(19,'Chips Fuego',10,12,''),(20,'Chips Jalapeño',10,12,''),(21,'Chips Sal del mar',10,12,''),(22,'Coca Cola 600ml',25,12,''),(23,'Cuernito de jamon con queso',20,20,''),(24,'Dona',15,15,''),(25,'Doritos Flaming Hot',10,12,''),(26,'Doritos Incognita',10,12,''),(27,'Doritos Nacho',10,12,''),(28,'Emperador Chocolate',10,12,''),(29,'Fritos sal y limon',10,10,''),(30,'Gatorade limalimon 1 Lt',12,28,''),(31,'Gatorade limalimon 600ml',12,16,''),(32,'Gatorade naranja 1 Lt',12,28,''),(33,'Gatorade naranja 600ml',12,16,''),(34,'Gatorade ponche de frutas 1 Lt',12,28,''),(35,'Gatorade ponche de frutas 600ml',12,16,''),(36,'Gatorade uva 600ml',12,28,''),(37,'Gatorade uva1 Lt',12,16,''),(38,'Jumex Durazno 600ml',5,15,''),(39,'Jumex Mango600ml',5,15,''),(40,'Jumex Manzana 600ml',5,15,''),(41,'Maruchan',30,20,''),(42,'Oreos',15,12,''),(43,'Panditas',30,10,''),(44,'Pelon pelo rico',30,5,''),(45,'Picafresa',200,0.5,''),(46,'Principe chocolate',10,12,''),(47,'Principe limon',10,12,''),(48,'Pulparindo',30,3,''),(49,'Rancheritos',10,10,''),(50,'Rockaleta',50,8,''),(51,'Ruffles queso',10,10,''),(52,'Sabritas Adobadas',10,12,''),(53,'Sabritas Flaming Hot',10,12,''),(54,'Sabritas Limon',10,12,''),(55,'Sabritas Original',10,12,''),(56,'Sandwich de pollo',10,25,''),(57,'Takis Fuego',10,12,''),(58,'Tamborcitos',200,0.5,''),(59,'Triki Trakes',10,10,''),(60,'Wninis',80,5,'');
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_alim`
--

DROP TABLE IF EXISTS `carrito_alim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_alim` (
  `id_pedido` int(6) DEFAULT NULL,
  `id_alimento` int(3) DEFAULT NULL,
  `cantidad` int(2) DEFAULT NULL,
  KEY `id_alimento` (`id_alimento`),
  CONSTRAINT `carrito_alim_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `carrito_alim_ibfk_2` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id_alimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_alim`
--

LOCK TABLES `carrito_alim` WRITE;
/*!40000 ALTER TABLE `carrito_alim` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_alim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` varchar(13) NOT NULL,
  `id_extra_clie` int(3) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Contraseña` varchar(44) NOT NULL,
  `ApellidoP` varchar(30) NOT NULL,
  `ApellidoM` varchar(30) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_extra_clie` (`id_extra_clie`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_extra_clie`) REFERENCES `extra_cliente` (`id_extra_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_entrega`
--

DROP TABLE IF EXISTS `estado_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_entrega` (
  `id_estado_ent` int(1) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_entrega`
--

LOCK TABLES `estado_entrega` WRITE;
/*!40000 ALTER TABLE `estado_entrega` DISABLE KEYS */;
INSERT INTO `estado_entrega` VALUES (1,'Sin Enviar'),(2,'Enviado'),(3,'Recogido'),(4,'No Recogido');
/*!40000 ALTER TABLE `estado_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_cliente`
--

DROP TABLE IF EXISTS `extra_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_cliente` (
  `id_extra_clie` int(3) NOT NULL,
  `id_tipo_clie` int(1) NOT NULL,
  `Extra` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_extra_clie`),
  KEY `id_tipo_clie` (`id_tipo_clie`),
  CONSTRAINT `extra_cliente_ibfk_1` FOREIGN KEY (`id_tipo_clie`) REFERENCES `tipo_cliente` (`id_tipo_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_cliente`
--

LOCK TABLES `extra_cliente` WRITE;
/*!40000 ALTER TABLE `extra_cliente` DISABLE KEYS */;
INSERT INTO `extra_cliente` VALUES (1,1,'401\r'),(2,1,'402\r'),(3,1,'403\r'),(4,1,'404\r'),(5,1,'405\r'),(6,1,'406\r'),(7,1,'407\r'),(8,1,'408\r'),(9,1,'409\r'),(10,1,'410\r'),(11,1,'411\r'),(12,1,'412\r'),(13,1,'413\r'),(14,1,'414\r'),(15,1,'415\r'),(16,1,'416\r'),(17,1,'417\r'),(18,1,'451\r'),(19,1,'452\r'),(20,1,'453\r'),(21,1,'454\r'),(22,1,'455\r'),(23,1,'456\r'),(24,1,'457\r'),(25,1,'458\r'),(26,1,'459\r'),(27,1,'460\r'),(28,1,'461\r'),(29,1,'462\r'),(30,1,'463\r'),(31,1,'464\r'),(32,1,'465\r'),(33,1,'466\r'),(34,1,'501\r'),(35,1,'502\r'),(36,1,'503\r'),(37,1,'504\r'),(38,1,'505\r'),(39,1,'506\r'),(40,1,'507\r'),(41,1,'508\r'),(42,1,'509\r'),(43,1,'510\r'),(44,1,'511\r'),(45,1,'512\r'),(46,1,'513\r'),(47,1,'514\r'),(48,1,'515\r'),(49,1,'516\r'),(50,1,'517\r'),(51,1,'518\r'),(52,1,'551\r'),(53,1,'552\r'),(54,1,'553\r'),(55,1,'554\r'),(56,1,'555\r'),(57,1,'556\r'),(58,1,'557\r'),(59,1,'558\r'),(60,1,'559\r'),(61,1,'560\r'),(62,1,'561\r'),(63,1,'562\r'),(64,1,'563\r'),(65,1,'564\r'),(66,1,'601\r'),(67,1,'602\r'),(68,1,'603\r'),(69,1,'604\r'),(70,1,'605\r'),(71,1,'606\r'),(72,1,'607\r'),(73,1,'608\r'),(74,1,'609\r'),(75,1,'610\r'),(76,1,'611\r'),(77,1,'612\r'),(78,1,'613\r'),(79,1,'614\r'),(80,1,'615\r'),(81,1,'616\r'),(82,1,'617\r'),(83,1,'618\r'),(84,1,'619\r'),(85,1,'651\r'),(86,1,'652\r'),(87,1,'653\r'),(88,1,'654\r'),(89,1,'655\r'),(90,1,'656\r'),(91,1,'657\r'),(92,1,'658\r'),(93,1,'659\r'),(94,1,'660\r'),(95,1,'661\r'),(96,1,'662\r'),(97,1,'663\r'),(98,1,'664\r'),(99,2,'Física\r'),(100,2,'Informática\r'),(101,2,'Matemáticas\r'),(102,2,'Biología\r'),(103,2,'Educación Física\r'),(104,2,'\"Morfología, Fisiología y Salud\"\r\n105,2,'),(105,2,'Orientación Educativa\r'),(106,2,'Psicologia e Higiene Mental\r'),(107,2,'Química\r'),(108,2,'Ciencias Sociales\r'),(109,2,'Geografía\r'),(110,2,'Historia\r'),(111,2,'Alemán\r'),(112,2,'Artes Plásticas\r'),(113,2,'Danza\r'),(114,2,'Dibujo y Modelado\r'),(115,2,'Filosofía\r'),(116,2,'Francés\r'),(117,2,'Inglés\r'),(118,2,'Italiano\r'),(119,2,'Letras Clásicas\r'),(120,2,'Literatura\r'),(121,2,'Música\r'),(122,2,'Teatro\r'),(123,2,'ETE'),(124,4,NULL),(125,3,NULL);
/*!40000 ALTER TABLE `extra_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hola`
--

DROP TABLE IF EXISTS `hola`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hola` (
  `hola` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hola`
--

LOCK TABLES `hola` WRITE;
/*!40000 ALTER TABLE `hola` DISABLE KEYS */;
/*!40000 ALTER TABLE `hola` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar_entrega`
--

DROP TABLE IF EXISTS `lugar_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar_entrega` (
  `id_lugar_entrega` int(2) NOT NULL,
  `Lugar` varchar(20) NOT NULL,
  `id_tipo_ent` int(1) NOT NULL,
  PRIMARY KEY (`id_lugar_entrega`),
  KEY `id_tipo_ent` (`id_tipo_ent`),
  CONSTRAINT `lugar_entrega_ibfk_1` FOREIGN KEY (`id_tipo_ent`) REFERENCES `tipo_entrega` (`id_tipo_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar_entrega`
--

LOCK TABLES `lugar_entrega` WRITE;
/*!40000 ALTER TABLE `lugar_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugar_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidoos`
--

DROP TABLE IF EXISTS `pedidoos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidoos` (
  `id_pedido` int(6) NOT NULL AUTO_INCREMENT,
  `id_cliente` varchar(13) NOT NULL,
  `id_estado_ent` int(1) NOT NULL,
  `id_lugar_entrega` int(2) DEFAULT NULL,
  `Max_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_pedido`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_estado_ent` (`id_estado_ent`),
  KEY `id_lugar_entrega` (`id_lugar_entrega`),
  CONSTRAINT `pedidoos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `pedidoos_ibfk_2` FOREIGN KEY (`id_estado_ent`) REFERENCES `estado_entrega` (`id_estado_ent`),
  CONSTRAINT `pedidoos_ibfk_3` FOREIGN KEY (`id_lugar_entrega`) REFERENCES `lugar_entrega` (`id_lugar_entrega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidoos`
--

LOCK TABLES `pedidoos` WRITE;
/*!40000 ALTER TABLE `pedidoos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidoos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_cliente` (
  `id_tipo_clie` int(3) NOT NULL,
  `Tipo_cliente` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_clie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cliente`
--

LOCK TABLES `tipo_cliente` WRITE;
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` VALUES (1,'Alumno'),(2,'Profesor'),(3,'Funcionario'),(4,'Trabajador');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_entrega`
--

DROP TABLE IF EXISTS `tipo_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_entrega` (
  `id_tipo_ent` int(1) NOT NULL,
  `Tipo_entrega` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_entrega`
--

LOCK TABLES `tipo_entrega` WRITE;
/*!40000 ALTER TABLE `tipo_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_entrega` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-28 18:30:03
