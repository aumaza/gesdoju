-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gesdoju
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

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
-- Table structure for table `adicional_grado_ur`
--

DROP TABLE IF EXISTS `adicional_grado_ur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adicional_grado_ur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(1) NOT NULL,
  `grado` varchar(2) NOT NULL,
  `cant_ur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adicional_grado_ur`
--

LOCK TABLES `adicional_grado_ur` WRITE;
/*!40000 ALTER TABLE `adicional_grado_ur` DISABLE KEYS */;
INSERT INTO `adicional_grado_ur` VALUES (1,'A','1',85),(2,'A','2',167),(3,'A','3',239),(4,'A','4',314),(5,'A','5',394),(6,'A','6',478),(7,'A','7',567),(8,'A','8',661),(9,'A','9',761),(10,'A','10',867),(11,'B','1',58),(12,'B','2',120),(13,'B','3',185),(14,'B','4',239),(15,'B','5',295),(16,'B','6',355),(17,'B','7',418),(18,'B','8',484),(19,'B','9',554),(20,'B','10',628),(22,'B','0',0),(23,'C','0',0),(24,'C','1',27),(25,'C','2',61),(26,'C','3',109),(27,'C','4',134),(28,'C','5',170),(29,'C','6',209),(30,'C','7',250),(31,'C','8',293),(32,'C','9',338),(33,'C','10',386),(34,'D','0',0),(35,'D','1',18),(36,'D','2',40),(37,'D','3',63),(38,'D','4',87),(39,'D','5',115),(40,'D','6',144),(41,'D','7',175),(42,'D','8',207),(43,'D','9',241),(44,'D','10',277),(45,'E','0',0),(46,'E','1',11),(47,'E','2',25),(48,'E','3',43),(49,'E','4',62),(50,'E','5',82),(51,'E','6',103),(52,'E','7',127),(53,'E','8',152),(54,'E','9',179),(55,'E','10',207),(56,'F','0',0),(57,'F','1',9),(58,'F','2',18),(59,'F','3',27),(60,'F','4',41),(61,'F','5',55),(62,'F','6',70),(63,'F','7',85),(64,'F','8',106),(65,'F','9',127),(66,'F','10',149),(67,'A','0',0);
/*!40000 ALTER TABLE `adicional_grado_ur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autoridades_superiores`
--

DROP TABLE IF EXISTS `autoridades_superiores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autoridades_superiores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anio` varchar(4) NOT NULL,
  `mes` varchar(10) NOT NULL,
  `jurisdiccion` varchar(120) NOT NULL,
  `apellido_nombre` varchar(100) NOT NULL,
  `cargo` varchar(90) NOT NULL,
  `asignacion_mensual` float(8,2) NOT NULL,
  `desarraigo` float(8,2) DEFAULT NULL,
  `sac` float(8,2) DEFAULT NULL,
  `otros_conceptos` float(8,2) DEFAULT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autoridades_superiores`
--

LOCK TABLES `autoridades_superiores` WRITE;
/*!40000 ALTER TABLE `autoridades_superiores` DISABLE KEYS */;
INSERT INTO `autoridades_superiores` VALUES (1,'2018','Enero','PRESIDENCIA DE LA NACION','Macri Mauricio','Presidente de la Nacion',208207.19,0.00,0.00,0.00,'Ninguna'),(3,'2018','Enero','PRESIDENCIA DE LA NACION','Michetti Gabriela','Vice Presidente de la Nacion',192783.89,0.00,0.00,0.00,'Ninguna'),(4,'2018','Enero','MINISTERIO DE AGROINDUSTRIA','Etchevere Luis Miguel','Ministro',183524.78,0.00,0.00,0.00,'Ninguna'),(5,'2018','Enero','MINISTERIO DE AMBIENTE Y DESARROLLO SUSTENTABLE','Bergman Sergio Alejandro','Ministro',183524.77,0.00,0.00,0.00,'Ninguna'),(6,'2018','Enero','MINISTERIO DE CIENCIA TECNOLOGIA E INNOVACION PRODUCTIVA','Barañao Jose Lino','Ministro',183490.80,0.00,0.00,0.00,'Ninguna'),(7,'2018','Enero','MINISTERIO DE DEFENSA','Aguad Oscar Raul','Ministro',183524.78,0.00,0.00,0.00,'Ninguna'),(8,'2018','Enero','MINISTERIO DE CULTURA','Avelluto Alejandro Pablo','Ministro',183524.77,0.00,0.00,0.00,'Ninguna'),(9,'2018','Enero','MINISTERIO DE DESARROLLO SOCIAL','Stanley Carolina','Ministro',183524.77,0.00,0.00,0.00,'Ninguna'),(10,'2018','Enero','MINISTERIO DE EDUCACION','Finocchiaro Alejandro Oscar','Ministro',183524.78,0.00,0.00,0.00,'Ninguna\r\n'),(11,'2018','Enero','MINISTERIO DE ENERGIA','Aranguren Juan Jose','Ministro',183524.78,0.00,0.00,0.00,'Ninguna'),(12,'2018','Enero','MINISTERIO DE HACIENDA','Dujovne Nicolas','Ministro',183490.05,0.00,0.00,0.00,'Ninguna'),(13,'2018','Enero','MINISTERIO DE FINANZAS','Caputo Luis Andres','Ministro',183490.05,0.00,0.00,0.00,'Ninguna');
/*!40000 ALTER TABLE `autoridades_superiores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escalas_sinep_pp`
--

DROP TABLE IF EXISTS `escalas_sinep_pp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `escalas_sinep_pp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `norma_reguladora` varchar(100) NOT NULL,
  `f_vigencia` date NOT NULL,
  `mes` varchar(10) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `valor_ur` float(8,2) NOT NULL,
  `nivel` varchar(1) NOT NULL,
  `grado` varchar(2) NOT NULL,
  `agrupamiento` varchar(18) NOT NULL,
  `sueldo_ur` int(11) NOT NULL,
  `sueldo_monto` float(8,2) NOT NULL,
  `dedicacion_funcional_ur` int(11) NOT NULL,
  `dedicacion_funcional_monto` float(8,2) NOT NULL,
  `asignacion_basica_ur` int(11) NOT NULL,
  `asignacion_basica_monto` float(8,2) NOT NULL,
  `basico_conformado_ur` int(11) NOT NULL,
  `basico_conformado_monto` float(8,2) NOT NULL,
  `adicional_grado_ur` int(11) NOT NULL,
  `adicional_grado_monto` float(8,2) NOT NULL,
  `suplemento_agrup_porcentaje` int(11) NOT NULL,
  `suplemento_agrup_monto` float(8,2) NOT NULL,
  `tramo_porcentaje` int(11) NOT NULL,
  `tramo_suma` float(8,2) NOT NULL,
  `monto_total` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escalas_sinep_pp`
--

LOCK TABLES `escalas_sinep_pp` WRITE;
/*!40000 ALTER TABLE `escalas_sinep_pp` DISABLE KEYS */;
/*!40000 ALTER TABLE `escalas_sinep_pp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funciones_ejecutivas`
--

DROP TABLE IF EXISTS `funciones_ejecutivas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funciones_ejecutivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(1) NOT NULL,
  `cant_ur` int(11) NOT NULL,
  `valor_ur` float(8,2) NOT NULL,
  `monto` float(8,2) NOT NULL,
  `norma_regulatoria` varchar(100) NOT NULL,
  `f_entrada_vigencia` date NOT NULL,
  `mes` varchar(10) NOT NULL,
  `anio` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funciones_ejecutivas`
--

LOCK TABLES `funciones_ejecutivas` WRITE;
/*!40000 ALTER TABLE `funciones_ejecutivas` DISABLE KEYS */;
INSERT INTO `funciones_ejecutivas` VALUES (1,'1',1895,4.75,9001.25,'Decreto 2098/08','2008-12-01','Diciembre','2008'),(2,'2',1684,4.75,7999.00,'Decreto 2098/08','2008-12-01','Diciembre','2008'),(3,'3',1474,4.75,7001.50,'Decreto 2098/08','2008-12-01','Diciembre','2008'),(5,'4',1263,4.75,5999.25,'Decreto 2098/08','2008-12-01','Diciembre','2008'),(6,'1',1895,5.13,9721.35,'Decreto 2098/08','2009-06-01','Junio','2009'),(7,'2',1684,5.13,8638.92,'Decreto 2098/08','2009-06-01','Junio','2009'),(8,'3',1474,5.13,7561.62,'Decreto 2098/08','2009-06-01','Junio','2009'),(9,'4',1263,5.13,6479.19,'Decreto 2098/08','2009-06-01','Junio','2009'),(10,'1',1895,5.49,10403.55,'Decreto 2098/08','2009-08-01','Agosto','2009'),(11,'2',1684,5.49,9245.16,'Decreto 2098/08','2009-08-01','Agosto','2009'),(12,'3',1474,5.49,8092.26,'Decreto 2098/08','2009-08-01','Agosto','2009'),(13,'4',1263,5.49,6933.87,'Decreto 2098/08','2009-08-01','Agosto','2009'),(14,'1',1895,6.04,11445.80,'Decreto 2098/08','2010-06-01','Junio','2010'),(15,'2',1684,6.04,10171.36,'Decreto 2098/08','2010-06-01','Junio','2010'),(16,'3',1474,6.04,8902.96,'Decreto 2098/08','2010-06-01','Junio','2010'),(17,'4',1263,6.04,7628.52,'Decreto 2098/08','2010-06-01','Junio','2010'),(18,'1',1895,6.64,12582.80,'Decreto 2098/08','2010-08-01','Agosto','2010'),(19,'2',1684,6.64,11181.76,'Decreto 2098/08','2010-08-01','Agosto','2010'),(20,'3',1474,6.64,9787.36,'Decreto 2098/08','2010-08-01','Agosto','2010'),(21,'4',1263,6.64,8386.32,'Decreto 2098/08','2010-08-01','Agosto','2010'),(22,'1',1895,7.30,13833.50,'Decreto 2098/08','2011-06-01','Junio','2011'),(23,'2',1684,7.30,12293.20,'Decreto 2098/08','2011-06-01','Junio','2011'),(24,'3',1474,7.30,10760.20,'Decreto 2098/08','2011-06-01','Junio','2011'),(25,'4',1263,7.30,9219.90,'Decreto 2098/08','2011-06-01','Junio','2011'),(26,'1',1895,7.97,15103.15,'Decreto 2098/08','2011-08-01','Agosto','2011'),(27,'2',1684,7.97,13421.48,'Decreto 2098/08','2011-08-01','Agosto','2011'),(28,'3',1474,7.97,11747.78,'Decreto 2098/08','2011-08-01','Agosto','2011'),(29,'4',1263,7.97,10066.11,'Decreto 2098/08','2011-08-01','Agosto','2011'),(30,'1',1895,8.23,15595.85,'Decreto 2098/08','2011-12-01','Diciembre','2011'),(31,'2',1684,8.23,13859.32,'Decreto 2098/08','2011-12-01','Diciembre','2011'),(32,'3',1474,8.23,12131.02,'Decreto 2098/08','2011-12-01','Diciembre','2011'),(33,'4',1263,8.23,10394.49,'Decreto 2098/08','2011-12-01','Diciembre','2011'),(34,'1',1895,9.05,17149.75,'Decreto 2098/08','2012-06-01','Junio','2012'),(35,'2',1684,9.05,15240.20,'Decreto 2098/08','2012-06-01','Junio','2012'),(36,'3',1474,9.05,13339.70,'Decreto 2098/08','2012-06-01','Junio','2012'),(37,'4',1263,9.05,11430.15,'Decreto 2098/08','2012-06-01','Junio','2012'),(38,'1',1895,9.96,18874.20,'Decreto 2098/08','2012-08-01','Agosto','2012'),(39,'2',1684,9.96,16772.64,'Decreto 2098/08','2012-08-01','Agosto','2012'),(40,'3',1474,9.96,14681.04,'Decreto 2098/08','2012-08-01','Agosto','2012'),(41,'4',1263,9.96,12579.48,'Decreto 2098/08','2012-08-01','Agosto','2012'),(42,'1',1895,11.16,21148.20,'Decreto 2098/08','2013-06-01','Junio','2013'),(43,'2',1684,11.16,18793.44,'Decreto 2098/08','2013-06-01','Junio','2013'),(44,'3',1474,11.16,16449.84,'Decreto 2098/08','2013-06-01','Junio','2013'),(45,'4',1263,11.16,14095.08,'Decreto 2098/08','2013-06-01','Junio','2013'),(46,'1',1895,12.35,23403.25,'Decreto 2098/08','2013-08-01','Agosto','2013'),(47,'2',1684,12.35,20797.40,'Decreto 2098/08','2013-08-01','Agosto','2013'),(48,'3',1474,12.35,18203.90,'Decreto 2098/08','2013-08-01','Agosto','2013'),(49,'4',1263,12.35,15598.05,'Decreto 2098/08','2013-08-01','Agosto','2013'),(50,'1',1895,14.34,27174.30,'Decreto 2098/08','2014-06-01','Junio','2014'),(51,'2',1684,14.34,24148.56,'Decreto 2098/08','2014-06-01','Junio','2014'),(52,'3',1474,14.34,21137.16,'Decreto 2098/08','2014-06-01','Junio','2014'),(53,'4',1263,14.34,18111.42,'Decreto 2098/08','2014-06-01','Junio','2014'),(54,'1',1895,15.87,30073.65,'Decreto 2098/08','2014-08-01','Agosto','2014'),(55,'2',1684,15.87,26725.08,'Decreto 2098/08','2014-08-01','Agosto','2014'),(56,'3',1474,15.87,23392.38,'Decreto 2098/08','2014-08-01','Agosto','2014'),(57,'4',1263,15.87,20043.81,'Decreto 2098/08','2014-08-01','Agosto','2014'),(58,'1',1895,20.17,38222.15,'Decreto 2098/08','2015-08-01','Agosto','2015'),(59,'2',1684,20.17,33966.28,'Decreto 2098/08','2015-08-01','Agosto','2015'),(60,'3',1474,20.17,29730.58,'Decreto 2098/08','2015-08-01','Agosto','2015'),(61,'4',1263,20.17,25474.71,'Decreto 2098/08','2015-08-01','Agosto','2015'),(62,'1',1895,21.58,40894.10,'Decreto 2098/08','2016-06-01','Junio','2016'),(63,'2',1684,21.58,36340.72,'Decreto 2098/08','2016-06-01','Junio','2016'),(64,'3',1474,21.58,31808.92,'Decreto 2098/08','2016-06-01','Junio','2016'),(65,'4',1263,21.58,27255.54,'Decreto 2098/08','2016-06-01','Junio','2016'),(66,'1',1895,23.60,44722.00,'Decreto 2098/08','2016-07-01','Julio','2016'),(67,'2',1684,23.60,39742.40,'Decreto 2098/08','2016-07-01','Julio','2016'),(68,'3',1474,23.60,34786.40,'Decreto 2098/08','2016-07-01','Julio','2016'),(69,'4',1263,23.60,29806.80,'Decreto 2098/08','2016-07-01','Julio','2016'),(70,'1',1895,27.74,52567.30,'Decreto 2098/08','2017-06-01','Junio','2017'),(71,'2',1684,27.74,46714.16,'Decreto 2098/08','2017-06-01','Junio','2017'),(72,'3',1474,27.74,40888.76,'Decreto 2098/08','2017-06-01','Junio','2017'),(73,'4',1263,27.74,35035.62,'Decreto 2098/08','2017-06-01','Junio','2017'),(74,'1',1895,29.06,55068.70,'Decreto 2098/08','2017-07-01','Julio','2017'),(75,'2',1684,29.06,48937.04,'Decreto 2098/08','2017-07-01','Julio','2017'),(76,'3',1474,29.06,42834.44,'Decreto 2098/08','2017-07-01','Julio','2017'),(77,'4',1263,29.06,36702.78,'Decreto 2098/08','2017-07-01','Julio','2017'),(78,'1',1895,31.71,60090.45,'Decreto 2098/08','2017-08-01','Agosto','2017'),(79,'2',1684,31.71,53399.64,'Decreto 2098/08','2017-08-01','Agosto','2017'),(80,'3',1474,31.71,46740.54,'Decreto 2098/08','2017-08-01','Agosto','2017'),(81,'4',1263,31.71,40049.73,'Decreto 2098/08','2017-08-01','Agosto','2017'),(82,'1',1895,32.97,62478.15,'Decreto 2098/08','2018-06-01','Junio','2018'),(83,'2',1684,32.97,55521.48,'Decreto 2098/08','2018-06-01','Junio','2018'),(84,'3',1474,32.97,48597.78,'Decreto 2098/08','2018-06-01','Junio','2018'),(85,'4',1263,32.97,41641.11,'Decreto 2098/08','2018-06-01','Junio','2018'),(86,'1',1895,39.56,74966.20,'Decreto 2098/08','2019-01-01','Enero','2019'),(87,'2',1684,39.56,66619.04,'Decreto 2098/08','2019-01-01','Enero','2019'),(88,'3',1474,39.56,58311.44,'Decreto 2098/08','2019-01-01','Enero','2019'),(89,'4',1263,39.56,49964.28,'Decreto 2098/08','2019-01-01','Enero','2019'),(90,'1',1895,41.21,78092.95,'Decreto 2098/08','2019-02-01','Febrero','2019'),(91,'2',1684,41.21,69397.64,'Decreto 2098/08','2019-02-01','Febrero','2019'),(92,'3',1474,41.21,60743.54,'Decreto 2098/08','2019-02-01','Febrero','2019'),(93,'4',1263,41.21,52048.23,'Decreto 2098/08','2019-02-01','Febrero','2019'),(94,'1',1895,42.20,79969.00,'Decreto 2098/08','2019-05-01','Mayo','2019'),(95,'2',1684,42.20,71064.80,'Decreto 2098/08','2019-05-01','Mayo','2019'),(96,'3',1474,42.20,62202.80,'Decreto 2098/08','2019-05-01','Mayo','2019'),(97,'4',1263,42.20,53298.60,'Decreto 2098/08','2019-05-01','Mayo','2019'),(98,'1',1895,43.89,83171.55,'Decreto 2098/08','2019-06-01','Junio','2019'),(99,'2',1684,43.89,73910.76,'Decreto 2098/08','2019-06-01','Junio','2019'),(100,'3',1474,43.89,64693.86,'Decreto 2098/08','2019-06-01','Junio','2019'),(101,'4',1263,43.89,55433.07,'Decreto 2098/08','2019-06-01','Junio','2019'),(102,'1',1895,46.84,88761.80,'Decreto 2098/08','2019-07-01','Julio','2019'),(103,'2',1684,46.84,78878.56,'Decreto 2098/08','2019-07-01','Julio','2019'),(104,'3',1474,46.84,69042.16,'Decreto 2098/08','2019-07-01','Julio','2019'),(105,'4',1263,46.84,59158.92,'Decreto 2098/08','2019-07-01','Julio','2019'),(106,'1',1895,49.80,94371.00,'Decreto 2098/08','2019-08-01','Agosto','2019'),(107,'2',1684,49.80,83863.20,'Decreto 2098/08','2019-08-01','Agosto','2019'),(108,'3',1474,49.80,73405.20,'Decreto 2098/08','2019-08-01','Agosto','2019'),(109,'4',1263,49.80,62897.40,'Decreto 2098/08','2019-08-01','Agosto','2019'),(110,'1',1895,51.91,98369.45,'Decreto 2098/08','2020-01-01','Enero','2020'),(111,'2',1684,51.91,87416.44,'Decreto 2098/08','2020-01-01','Enero','2020'),(112,'3',1474,51.91,76515.34,'Decreto 2098/08','2020-01-01','Enero','2020'),(113,'4',1263,51.91,65562.33,'Decreto 2098/08','2020-01-01','Enero','2020'),(114,'1',1895,54.02,102367.90,'Decreto 2098/08','2020-02-01','Febrero','2020'),(115,'2',1684,54.02,90969.68,'Decreto 2098/08','2020-02-01','Febrero','2020'),(116,'3',1474,54.02,79625.48,'Decreto 2098/08','2020-02-01','Febrero','2020'),(117,'4',1263,54.02,68227.26,'Decreto 2098/08','2020-02-01','Febrero','2020'),(118,'1',1895,57.80,109531.00,'Decreto 2098/08','2020-10-01','Octubre','2020'),(119,'2',1684,57.80,97335.20,'Decreto 2098/08','2020-10-01','Octubre','2020'),(120,'3',1474,57.80,85197.20,'Decreto 2098/08','2020-10-01','Octubre','2020'),(121,'4',1263,57.80,73001.40,'Decreto 2098/08','2020-10-01','Octubre','2020');
/*!40000 ALTER TABLE `funciones_ejecutivas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurisdicciones`
--

DROP TABLE IF EXISTS `jurisdicciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jurisdicciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_jur` varchar(2) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurisdicciones`
--

LOCK TABLES `jurisdicciones` WRITE;
/*!40000 ALTER TABLE `jurisdicciones` DISABLE KEYS */;
INSERT INTO `jurisdicciones` VALUES (1,'01','PODER LEGISLATIVO NACIONAL'),(2,'05','PODER JUDICIAL DE LA NACION'),(3,'10','MINISTERIO PUBLICO'),(4,'20','PRESIDENCIA DE LA NACION'),(5,'25','JEFATURA DE GABINETE DE MINISTROS'),(6,'26','MINISTERIO DE MODERNIZACION'),(7,'30','MINISTERIO DEL INTERIOR OBRAS PUBLICAS Y VIVIENDA'),(8,'35','MINISTERIO DE RELACIONES EXTERIORES Y CULTO'),(9,'40','MINISTERIO DE JUSTICIA Y DERECHOS HUMANOS'),(10,'41','MINISTERIO DE SEGURIDAD'),(11,'45','MINISTERIO DE DEFENSA'),(12,'50','MINISTERIO DE HACIENDA'),(13,'51','MINISTERIO DE PRODUCCION'),(14,'52','MINISTERIO DE AGROINDUSTRIA'),(15,'53','MINISTERIO DE TURISMO'),(16,'57','MINISTERIO DE TRANSPORTE'),(17,'58','MINISTERIO DE ENERGIA'),(18,'60','MINISTERIO DE FINANZAS'),(19,'70','MINISTERIO DE EDUCACION'),(20,'71','MINISTERIO DE CIENCIA TECNOLOGIA E INNOVACION PRODUCTIVA'),(21,'72','MINISTERIO DE CULTURA'),(22,'75','MINISTERIO DE TRABAJO EMPLEO Y SEGURIDAD SOCIAL'),(23,'80','MINISTERIO DE SALUD'),(24,'81','MINISTERIO DE AMBIENTE Y DESARROLLO SUSTENTABLE'),(25,'85','MINISTERIO DE DESARROLLO SOCIAL'),(26,'91','OBLIGACIONES A CARGO DEL TESORO');
/*!40000 ALTER TABLE `jurisdicciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `normas`
--

DROP TABLE IF EXISTS `normas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `normas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_norma` varchar(140) NOT NULL,
  `n_norma` varchar(100) NOT NULL,
  `tipo_norma` varchar(11) NOT NULL,
  `f_norma` varchar(60) NOT NULL,
  `f_pub` date NOT NULL,
  `anio_pub` varchar(4) NOT NULL,
  `jurisdiccion` varchar(100) DEFAULT NULL,
  `organismo` varchar(100) DEFAULT NULL,
  `unidad_fisica` varchar(10) NOT NULL,
  `observaciones` varchar(300) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `normas`
--

LOCK TABLES `normas` WRITE;
/*!40000 ALTER TABLE `normas` DISABLE KEYS */;
INSERT INTO `normas` VALUES (2,'Ley de Contrato de Trabajo','20744','Ley','Laboral','1974-09-11','1974','01','CS','BL001','Ley de Contrato de Trabajo','ley contrato trabajo.pdf','../../uploads/ley contrato trabajo.pdf'),(3,'Ley de Ministerios','22520','Ley','Estructura','1981-12-21','1981','20','PN','BL001','Modifica y complementa 3 normas, Ley 60, Ley 21801/78, 22450/81 y es modificada y/o complementada por 190 normas.','ley 22520.pdf','../../uploads/ley 22520.pdf');
/*!40000 ALTER TABLE `normas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organismos`
--

DROP TABLE IF EXISTS `organismos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organismos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_org` varchar(2) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organismos`
--

LOCK TABLES `organismos` WRITE;
/*!40000 ALTER TABLE `organismos` DISABLE KEYS */;
INSERT INTO `organismos` VALUES (1,'CS','CORTE SUPREMA DE JUSTICIA DE LA NACION'),(2,'CM','CONSEJO DE LA MAGISTRATURA'),(3,'PG','PROCURACION GENERAL DE LA NACION (PGN)'),(4,'PN','SECRETARIA GENERAL DE LA PRESIDENCIA DE LA NACION'),(5,'SL','SECRETARIA LEGAL Y TECNICA'),(6,'PO','CONSEJO NACIONAL DE COORDINACION DE POLITICAS SOCIALES  (CNCPS)'),(7,'SN','SINDICATURA GENERAL DE LA NACION (SIGEN)'),(8,'EN','AUTORIDAD REGULATORIA NUCLEAR (ARN)'),(9,'DI','AGENCIA NACIONAL DE DISCAPACIDAD (ANADIS)'),(10,'JG','JEFATURA DE GABINETE DE MINISTROS (JGM)'),(11,'MM','SECRETARIA DE INNOVACION PUBLICA'),(12,'AA','SECRETARIA DE MEDIOS Y COMUNICACION PUBLICA'),(13,'SR','SECRETARIA DE PROGRAMACION PARA LA PREVENCION DE LA DROGADICCION Y LUCHA CONTRA EL NARCOTR'),(14,'CF','ENTE NACIONAL DE COMUNICACIONES (ENACOM)'),(15,'BF','AGENCIA DE ADMINISTRACION DE BIENES DEL ESTADO (AABE)'),(16,'AF','AGENCIA DE ACCESO A LA INFORMACION PUBLICA (AAIP)'),(17,'MI','MINISTERIO DEL INTERIOR'),(18,'RP','REGISTRO NACIONAL DE LAS PERSONAS (RENAPER)'),(19,'DM','DIRECCION NACIONAL DE MIGRACIONES (DNM)'),(20,'MR','MINISTERIO DE RELACIONES EXTERIORES'),(21,'JU','MINISTERIO DE JUSTICIA Y DERECHOS HUMANO'),(22,'SP','SERVICIO PENITENCIARIO FEDERAL (SPF)'),(23,'CP','ENTE DE COOPERACION TECNICA Y FINANCIERA DEL SERVICIO PENITENCIARIO FEDERAL (ENCOPE)'),(24,'PT','PROCURACION DEL TESORO DE LA NACION (PTN)'),(25,'AI','INSTITUTO NACIONAL DE ASUNTOS INDIGENAS (INAI)'),(26,'XR','INSTITUTO NACIONAL CONTRA LA DISCRIMINACION'),(27,'JV','CENTRO INTERNACIONAL PARA LA PROMOCION DE LOS DERECHOS HUMANOS (CIPDH)'),(28,'AB','AGENCIA NACIONAL DE MATERIALES CONTROLADOS (ANMAC)'),(29,'SG','MINISTERIO DE SEGURIDAD'),(30,'PF','POLICIA FEDERAL ARGENTINA (PFA)'),(31,'GN','GENDARMERIA NACIONAL (GNA)'),(32,'PR','PREFECTURA NAVAL ARGENTINA (PNA)'),(33,'SA','POLICIA DE SEGURIDAD AEROPORTUARIA (PSA)'),(34,'FF','CAJA DE RETIROS'),(35,'MD','MINISTERIO DE DEFENSA'),(36,'EC','ESTADO MAYOR CONJUNTO DE LAS FUERZAS ARMADAS (EMCFFAA)'),(37,'CA','INSTITUTO DE INVESTIGACIONES CIENTIFICAS Y TECNICAS DE LAS FUERZAS ARMADAS (CITEDEF)'),(38,'CE','ESTADO MAYOR GENERAL DEL EJERCITO (EMGE)'),(39,'CN','ESTADO MAYOR GENERAL DE LA ARMADA (EMGA)'),(40,'FA','ESTADO MAYOR GENERAL DE LA FUERZA AEREA (EMFA)'),(41,'IG','INSTITUTO GEOGRAFICO NACIONAL (IGN)'),(42,'SM','SERVICIO METEOROLOGICO NACIONAL (SMN)'),(43,'IA','INSTITUTO DE AYUDA FINANCIERA PARA PAGO DE RETIROS Y PENSIONES MILITARES (IAFPRPM)'),(44,'ME','MINISTERIO DE ECONOMIA'),(45,'ID','INSTITUTO NACIONAL DE ESTADISTICA Y CENSOS (INDEC)'),(46,'CV','COMISION NACIONAL DE VALORES (CNV)'),(47,'IU','UNIDAD DE INFORMACION FINANCIERA (UIF)'),(48,'SS','SUPERINTENDENCIA DE SEGUROS DE LA NACION (SSN)'),(49,'TF','TRIBUNAL FISCAL DE LA NACION (TFN)'),(50,'MP','MINISTERIO DE DESARROLLO PRODUCTIVO'),(51,'TE','SECRETARIA DE ENERGIA'),(52,'EX','COMISION NACIONAL DE COMERCIO EXTERIOR (CNC)'),(53,'EA','COMISION NACIONAL DE ENERGIA ATOMICA (CNEA)'),(54,'GA','ENTE NACIONAL REGULADOR DEL GAS (ENARGAS)'),(55,'EE','ENTE NACIONAL REGULADOR DE LA ELECTRICIDAD (ENRE)'),(56,'NT','INSTITUTO NACIONAL DE TECNOLOGIA INDUSTRIAL (INTI)'),(57,'IP','INSTITUTO NACIONAL DE LA PROPIEDAD INDUSTRIAL (INPI)'),(58,'CG','SERVICIO GEOLOGICO MINERO ARGENTINO (SEGEMAR)'),(59,'AM','MINISTERIO DE AGRICULTURA'),(60,'TA','INSTITUTO NACIONAL DE TECNOLOGIA AGROPECUARIA (INTA)'),(61,'VL','SERVICIO NACIONAL DE SANIDAD Y CALIDAD AGROALIMENTARIA (SENASA)'),(62,'DP','INSTITUTO NACIONAL DE INVESTIGACION Y DESARROLLO PESQUERO (INIDEP)'),(63,'VI','INSTITUTO NACIONAL DE VITIVINICULTURA (INV)'),(64,'IN','INSTITUTO NACIONAL DE SEMILLAS (INASE)'),(65,'ST','MINISTERIO DE TURISMO Y DEPORTES'),(66,'TU','INSTITUTO NACIONAL DE PROMOCION TURISTICA (INPROTUR)'),(67,'TS','MINISTERIO DE TRANSPORTE'),(68,'NA','ADMINISTRACION NACIONAL DE AVIACION CIVIL (ANAC)'),(69,'RA','ORGANISMO REGULADOR DEL SISTEMA NACIONAL DE AEROPUERTOS (ORSNA)'),(70,'RT','COMISION NACIONAL DE REGULACION DEL TRANSPORTE (CNRT)'),(71,'AS','AGENCIA NACIONAL DE SEGURIDAD VIAL (ANSV)'),(72,'JA','JUNTA DE INVESTIGACION DE ACCIDENTES DE AVIACION CIVIL (JIAAC)'),(73,'PU','MINISTERIO DE OBRAS PUBLICAS'),(74,'DV','DIRECCION NACIONAL DE VIALIDAD (DNV)'),(75,'SC','ORGANISMO REGULADOR DE SEGURIDAD DE PRESAS (ORSEP)'),(76,'PS','ENTE NACIONAL DE OBRAS HIDRICAS DE SANEAMIENTO (ENOHSA)'),(77,'TH','INSTITUTO NACIONAL DEL AGUA (INA)'),(78,'TT','TRIBUNAL DE TASACIONES DE LA NACION (TTN)'),(79,'IV','MINISTERIO DE DESARROLLO TERRITORIAL Y HABITAT'),(80,'MC','MINISTERIO DE EDUCACION'),(81,'AU','COMISION NACIONAL DE EVALUACION Y ACREDITACION UNIVERSITARIA (CONEAU)'),(82,'ML','FUNDACION MIGUEL LILLO (LILLO)'),(83,'CT','MINISTERIO DE CIENCIA'),(84,'CO','CONSEJO NACIONAL DE INVESTIGACIONES CIENTIFICAS Y TECNICAS (CONICET)'),(85,'AE','COMISION NACIONAL DE ACTIVIDADES ESPACIALES (CONAE)'),(86,'AH','BANCO NACIONAL DE DATOS GENETICOS (BNDG)'),(87,'SE','MINISTERIO DE CULTURA'),(88,'TC','TEATRO NACIONAL CERVANTES (TNC)'),(89,'BN','BIBLIOTECA NACIONAL DR. MARIANO MORENO (BNMM)'),(90,'IT','INSTITUTO NACIONAL DEL TEATRO (INT)'),(91,'AR','FONDO NACIONAL DE LAS ARTES (FNA)'),(92,'MT','MINISTERIO DE TRABAJO'),(93,'SU','SUPERINTENDENCIA DE RIESGOS DEL TRABAJO (SRT)'),(94,'AN','ADMINISTRACION NACIONAL DE LA SEGURIDAD SOCIAL (ANSES)'),(95,'MS','MINISTERIO DE SALUD'),(96,'SO','HOSPITAL NACIONAL EN RED ESPECIALIZADO EN SALUD MENTAL Y ADICCIONES LICENCIADA LAURA BONAP'),(97,'HS','HOSPITAL NACIONAL DR. BALDOMERO SOMMER (H.SOMMER)'),(98,'MA','ADMINISTRACION NACIONAL DE MEDICAMENTOS'),(99,'CU','INSTITUTO NACIONAL CENTRAL UNICO COORDINADOR DE ABLACION E IMPLANTE (INCUCAI)'),(100,'IM','ADMINISTRACION NACIONAL DE LABORATORIOS E INSTITUTOS DE SALUD DR. CARLOS G. MALBRAN (ANLIS'),(101,'HP','HOSPITAL NACIONAL PROFESOR ALEJANDRO POSADAS (H.POSADAS)'),(102,'MO','COLONIA NACIONAL DR. MANUEL A. MONTES DE OCA (M.OCA)'),(103,'IR','INSTITUTO NACIONAL DE REHABILITACION PSICOFISICA DEL SUR DR. JUAN OTIMIO TESONE (INAREPS)'),(104,'NS','SUPERINTENDENCIA DE SERVICIOS DE SALUD (SSSALUD)'),(105,'IC','INSTITUTO NACIONAL DEL CANCER (INC)'),(106,'AL','AGENCIA NACIONAL DE LABORATORIOS PUBLICOS (ANLAP)'),(107,'RN','MINISTERIO DE AMBIENTE Y DESARROLLO SOSTENIBLE'),(108,'PQ','ADMINISTRACION DE PARQUES NACIONALES (APN)'),(109,'DS','MINISTERIO DE DESARROLLO SOCIAL'),(110,'MF','SECRETARIA NACIONAL DE NIÑEZ'),(111,'AC','INSTITUTO NACIONAL DE ASOCIATIVISMO Y ECONOMIA SOCIAL (INAES)'),(112,'MU','MINISTERIO DE LAS MUJERES');
/*!40000 ALTER TABLE `organismos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','root','proteo601','root@mecon.gov.ar',1),(2,'Augusto Maza','aumaza_mecon','slack142','aumaza@mecon.gov.ar',1),(3,'Sonia Boiarov','sboiarov_mecon','sboiarov1234','sboiarov@mecon.gov.ar',1),(4,'Marina Pelloni','mpello_mecon','mpello1234','mpello@mecon.gov.ar',1),(5,'Alejandra Marcelli','amarcel_mecon','amarcel1234','amarcel@mecon.gov.ar',1),(6,'Alejandro Glavic','aglavic_mecon','aglavic1234','aglavic@mecon.gov.ar',1),(7,'Alejandro Ronald Krebs','akrebs_mecon','akrebs1234','akrebs@mecon.gov.ar',1),(8,'Carlos Traverso','ctrave_mecon','ctrave1234','ctrave@mecon.gov.ar',1),(9,'Ezequiel Greco','egreco_mecon','egreco1234','egreco@mecon.gov.ar',1),(10,'Gabriela Keienberg','gkeien_mecon','gkeien1234','gkeien@mecon.gov.ar',1),(11,'Gustavo Flores','gflore_mecon','gflore1234','gflore@mecon.gov.ar',1),(12,'Jorge Arguello','jargue_mecon','jargue1234','jargue@mecon.gov.ar',1),(13,'Jorge Caruso','jcarus_mecon','jcarus1234','jcarus@mecon.gov.ar',1),(14,'Maria Angeles Cuquejo','mcuque_mecon','mcuque1234','mcuque@mecon.gov.ar',1),(15,'Maria de la Paz Cerutti','mdlpaz_mecon','mdlpaz1234','mdlpaz@mecon.gov.ar',1),(16,'Patricia Gomez','pgomez_mecon','pgomez1234','pgomez@mecon.gov.ar',1),(17,'Paula Varela','pvarel_mecon','pvarel1234','pvarel@mecon.gov.ar',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-10 12:05:15
