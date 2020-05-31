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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `Usuario` varchar(5) NOT NULL,
  `Contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('Admin','KBBdmW7e$tfq54Of5FlPN2pUOVeuISiZJCwFDCPT');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `alimento` VALUES (1,'Acidulados',69,1,'Acidulados.jpg\r'),(2,'Agua 1 Lt',18,12,'Agua_1lt.jpg\r'),(3,'Agua 600ml',18,7,'Agua_600ml.jpg\r'),(4,'Barritas Fresa',11,10,'Barritas_Fresa.jpg\r'),(6,'Boing Fresa 500ml',9,10,'BoingFresa.jpg\r'),(7,'Boing Mango 500ml',0,10,'BoingMango.jpg\r'),(8,'Boing Manzana 500ml',0,10,'BoingManzana.jpg\r'),(9,'Boing Naranja 500ml',4,10,'BoingNaranja.jpg\r'),(10,'Boing Uva 500ml',0,10,'BoingUva.jpg\r'),(11,'Cafe 450ml',20,15,'Cafe450.png\r'),(12,'Canelitas',10,12,'Canelitas.jpg\r'),(13,'Chetos Colmillos',10,10,'C_Colmillos.jpg\r'),(14,'Chetos Flaming Hot',9,10,'C_Flaming_Hot.jpg\r'),(15,'Chetos Nacho',10,10,'C_Nacho.png\r'),(16,'Chetos Poffs',10,10,'C_Puffs.jpg\r'),(17,'Chetos Torciditos',10,10,'C_Torcidos.jpg\r'),(18,'Chips Fuego',10,12,'Chs_Fuego.jpg\r'),(19,'Chips Jalapeño',50,12,'Chs_Jalapeño.jpg\r'),(20,'Chips Sal del mar',10,12,'Chs_Saldemar.jpg\r'),(21,'Coca Cola 600ml',23,12,'Coca600.jpg\r'),(22,'Cuernito de jamon con queso',12,20,'Cuernito.jpg\r'),(23,'Dona',15,15,'Dona.jpg\r'),(24,'Doritos Flaming Hot',10,12,'D_FH.png\r'),(26,'Doritos Nacho',8,12,'Doritos_Nacho.jpeg\r'),(28,'Fritos sal y limon',9,10,'Fritos.jpg\r'),(29,'Gatorade limalimon 1 Lt',12,28,'G_limalimon1.jpg\r'),(30,'Gatorade limalimon 600ml',12,16,'G_limalimon600.png\r'),(31,'Gatorade naranja 1 Lt',12,28,'G_naranja1.jpg\r'),(32,'Gatorade naranja 600ml',12,16,'G_naranja600.jpg\r'),(33,'Gatorade ponche de frutas 1 Lt',11,28,'G_PdeF1.jpg\r'),(34,'Gatorade ponche de frutas 600ml',11,16,'G_PdeF600.png\r'),(35,'Gatorade uva 600ml',12,28,'G_uva1.jpg\r'),(36,'Gatorade uva1 Lt',12,16,'G_uva600.jpg\r'),(37,'Jumex Durazno 600ml',5,15,'Jumex_d600.png\r'),(38,'Jumex Mango600ml',5,15,'Jumex_Mango600.jpg\r'),(39,'Jumex Manzana 600ml',5,15,'Jumex_Manzana600.jpg\r'),(40,'Maruchan',30,20,'Maruchan.jpg\r'),(41,'Oreos',15,12,'Oreo.jpg\r'),(42,'Panditas',30,10,'Panditas.jpg\r'),(43,'Pelon pelo rico',30,5,'Pelon_pelo.jpg\r'),(44,'Picafresa',200,0.5,'Picafresa.jpg\r'),(45,'Principe chocolate',10,12,'P_Chocolate.jpg\r'),(46,'Principe limon',10,12,'P_limon.png\r'),(47,'Pulparindo',30,3,'Pulparindo.jpg\r'),(48,'Rancheritos',10,10,'Rancheritos.jpg\r'),(49,'Rockaleta',50,8,'Rocaleta.jpg\r'),(50,'Ruffles queso',10,10,'Ruffles_queso.jpg\r'),(51,'Sabritas Adobadas',10,12,'Sabritas_AD.jpg\r'),(52,'Sabritas Flaming Hot',10,12,'Sabritas_FH.jpg\r'),(53,'Sabritas Limon',9,12,'Sabritas_Limon.jpg\r'),(54,'Sabritas Original',10,12,'Sabritas_Original.jpg\r'),(55,'Sandwich de pollo',10,25,'Sandwich_pollo.jpg\r'),(56,'Takis Fuego',10,12,'Takis_Fuego.jpg\r'),(57,'Tamborcitos',200,0.5,'Tamborcitos.jpg\r'),(59,'Wninis',79,8,'Winis.jpg'),(60,'Churrumais',10,10,'Churrumais.jpg');
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_alim`
--

DROP TABLE IF EXISTS `carrito_alim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_alim` (
  `id_pedido` int(6) NOT NULL,
  `id_alimento` int(3) NOT NULL,
  `cantidad` int(2) NOT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_alimento` (`id_alimento`),
  CONSTRAINT `carrito_alim_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidoos` (`id_pedido`),
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
INSERT INTO `cliente` VALUES ('123456',124,'Bentio','FPbQAEFZmGBqvl2M5yOTsUU026RsL7c+syVI3lsv3ug=','Rios','Lopez'),('319019566',37,'Carlos Iván','eJw+W6//0+sheXSv20ha7sDtdd/0caddfxvU5vR45Lo=','Villafranca ','HernándEZ');
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
-- Table structure for table `lista_negra`
--

DROP TABLE IF EXISTS `lista_negra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lista_negra` (
  `id_cliente` varchar(13) NOT NULL,
  `Hasta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `lista_negra_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lista_negra`
--

LOCK TABLES `lista_negra` WRITE;
/*!40000 ALTER TABLE `lista_negra` DISABLE KEYS */;
/*!40000 ALTER TABLE `lista_negra` ENABLE KEYS */;
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
INSERT INTO `lugar_entrega` VALUES (1,'Cafeteria',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidoos`
--

LOCK TABLES `pedidoos` WRITE;
/*!40000 ALTER TABLE `pedidoos` DISABLE KEYS */;
INSERT INTO `pedidoos` VALUES (65,'319019566',3,1,'2020-05-31 01:44:06'),(66,'319019566',2,1,'2020-05-31 08:49:26');
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
INSERT INTO `tipo_entrega` VALUES (1,'recoger'),(2,'enviar');
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

-- Dump completed on 2020-05-30 23:18:57
