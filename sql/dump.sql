-- MySQL dump 10.13  Distrib 5.6.21, for Linux (i686)
--
-- Host: 127.0.0.3    Database: xxxxx
-- ------------------------------------------------------
-- Server version	5.6.19-67.0-log
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abschlussanschulart`
--

DROP TABLE IF EXISTS `abschlussanschulart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abschlussanschulart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schulart` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abschlussanschulart`
--

LOCK TABLES `abschlussanschulart` WRITE;
/*!40000 ALTER TABLE `abschlussanschulart` DISABLE KEYS */;
INSERT INTO `abschlussanschulart` VALUES (1,'VS Hauptschule');
INSERT INTO `abschlussanschulart` VALUES (2,'SVS VS zur sonderpäd. Förderung');
INSERT INTO `abschlussanschulart` VALUES (3,'RS Realschule');
INSERT INTO `abschlussanschulart` VALUES (4,'RSB RS zur sonderpäd. Förderung');
INSERT INTO `abschlussanschulart` VALUES (5,'GY Gymnasium');
INSERT INTO `abschlussanschulart` VALUES (6,'WS Wirtschaftsschule');
INSERT INTO `abschlussanschulart` VALUES (7,'FOS Fachoberschule');
INSERT INTO `abschlussanschulart` VALUES (8,'BS Berufsschule');
INSERT INTO `abschlussanschulart` VALUES (9,'BS zur sonderpäd. Förderung');
INSERT INTO `abschlussanschulart` VALUES (10,'SO Sonstige Schule');
/*!40000 ALTER TABLE `abschlussanschulart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adresse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `strasse` varchar(30) NOT NULL,
  `hausnummer` varchar(10) NOT NULL,
  `postleitzahl` varchar(5) NOT NULL,
  `wohnort` varchar(30) NOT NULL,
  `telefon` varchar(25) NOT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adresse`
--

LOCK TABLES `adresse` WRITE;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
/*!40000 ALTER TABLE `adresse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ausbildungsberuf`
--

DROP TABLE IF EXISTS `ausbildungsberuf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ausbildungsberuf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `berufsbezeichnung` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausbildungsberuf`
--

LOCK TABLES `ausbildungsberuf` WRITE;
/*!40000 ALTER TABLE `ausbildungsberuf` DISABLE KEYS */;
INSERT INTO `ausbildungsberuf` VALUES (7,'Anlagenmechaniker/in für Sanitär-, Heizungs- und Klimatechnik');
INSERT INTO `ausbildungsberuf` VALUES (8,'Bankkaufmann/-frau');
INSERT INTO `ausbildungsberuf` VALUES (9,'Bürokaufmann/-frau ');
INSERT INTO `ausbildungsberuf` VALUES (10,'Elektroniker/in Fachrichtung Energie- und Gebäudetechnik');
INSERT INTO `ausbildungsberuf` VALUES (11,'Elektroniker/in für Automatisierungstechnik');
INSERT INTO `ausbildungsberuf` VALUES (12,'Elektroniker/in für Betriebstechnik');
INSERT INTO `ausbildungsberuf` VALUES (13,'Elektroniker/in für Geräte und Systeme');
INSERT INTO `ausbildungsberuf` VALUES (14,'Elektroniker/in für Geräte undSysteme(DBFH)');
INSERT INTO `ausbildungsberuf` VALUES (15,'Fachinformatiker/in für Anwendungsentwicklung');
INSERT INTO `ausbildungsberuf` VALUES (16,'Fachinformatiker/in für Systemintegration');
INSERT INTO `ausbildungsberuf` VALUES (17,'Feinmechaniker/in ');
INSERT INTO `ausbildungsberuf` VALUES (18,'Fertigungsmechaniker/in');
INSERT INTO `ausbildungsberuf` VALUES (19,'Friseur/in ');
INSERT INTO `ausbildungsberuf` VALUES (20,'Industriekaufmann/-frau');
INSERT INTO `ausbildungsberuf` VALUES (21,'Industriemechaniker/in Betriebstechnik');
INSERT INTO `ausbildungsberuf` VALUES (22,'Industriemechaniker/in Maschinen- und Systemtechnik');
INSERT INTO `ausbildungsberuf` VALUES (23,'Informations- u. Telekommunikations-Elektroniker/in ');
INSERT INTO `ausbildungsberuf` VALUES (24,'Kaufmann/-frau für Bürokommunikation ');
INSERT INTO `ausbildungsberuf` VALUES (25,'Kaufmann/-frau im Einzelhandel ');
INSERT INTO `ausbildungsberuf` VALUES (26,'Kaufmann/-frau im Gesundheitswesen');
INSERT INTO `ausbildungsberuf` VALUES (27,'Kaufmann/-frau im Groß- und Außenhandel ');
INSERT INTO `ausbildungsberuf` VALUES (28,'Kraftfahrzeug-Mechatroniker/in ');
INSERT INTO `ausbildungsberuf` VALUES (29,'Maler/in-Lackierer/in ');
INSERT INTO `ausbildungsberuf` VALUES (30,'Mechatroniker/in');
INSERT INTO `ausbildungsberuf` VALUES (31,'Medizinische Fachangestellte/r ');
INSERT INTO `ausbildungsberuf` VALUES (32,'Rechtsanwaltsfachangestellte/r ');
INSERT INTO `ausbildungsberuf` VALUES (33,'Sport- u. Fitnesskaufmann/-frau');
INSERT INTO `ausbildungsberuf` VALUES (34,'Veranstaltungskaufmann/-frau ');
INSERT INTO `ausbildungsberuf` VALUES (35,'Verkäufer/in');
INSERT INTO `ausbildungsberuf` VALUES (36,'Zahnmedizinische Fachangestellte/r');
/*!40000 ALTER TABLE `ausbildungsberuf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ausbildungsbetrieb`
--

DROP TABLE IF EXISTS `ausbildungsbetrieb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ausbildungsbetrieb` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firma` varchar(50) NOT NULL,
  `adresseId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ausbildungsbetrieb`
--

LOCK TABLES `ausbildungsbetrieb` WRITE;
/*!40000 ALTER TABLE `ausbildungsbetrieb` DISABLE KEYS */;
/*!40000 ALTER TABLE `ausbildungsbetrieb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoechsterbereitserreichterabschluss`
--

DROP TABLE IF EXISTS `hoechsterbereitserreichterabschluss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoechsterbereitserreichterabschluss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `abschluss` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoechsterbereitserreichterabschluss`
--

LOCK TABLES `hoechsterbereitserreichterabschluss` WRITE;
/*!40000 ALTER TABLE `hoechsterbereitserreichterabschluss` DISABLE KEYS */;
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (1,'VSo Schulpflicht erf. ohne Abschluss');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (2,'SVS Abschl. Schule ind. Lernf.');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (3,'HSo Hauptschule ohne Quali');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (4,'HSq Hauptschule mit Quali');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (5,'M Mittlerer Schulabschluss');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (6,'F Fachgeb. Fachhochschulreife');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (7,'H Fachhochschulreife');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (8,'FH Fachgeb. Hochschulreife');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (9,'AH Allgemeine Hochschulreife');
INSERT INTO `hoechsterbereitserreichterabschluss` VALUES (10,'SO Sonstiger Abschluss');
/*!40000 ALTER TABLE `hoechsterbereitserreichterabschluss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontaktperson`
--

DROP TABLE IF EXISTS `kontaktperson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kontaktperson` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `vorname` varchar(20) NOT NULL,
  `kontakttyp` enum('Vater','Mutter','Vormund','Sonstige') NOT NULL,
  `adresseId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontaktperson`
--

LOCK TABLES `kontaktperson` WRITE;
/*!40000 ALTER TABLE `kontaktperson` DISABLE KEYS */;
/*!40000 ALTER TABLE `kontaktperson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `land`
--

DROP TABLE IF EXISTS `land`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `land` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `land`
--

LOCK TABLES `land` WRITE;
/*!40000 ALTER TABLE `land` DISABLE KEYS */;
INSERT INTO `land` VALUES (1,'Afghanistan');
INSERT INTO `land` VALUES (2,'Ägypten');
INSERT INTO `land` VALUES (3,'Aland ');
INSERT INTO `land` VALUES (4,'Albanien');
INSERT INTO `land` VALUES (5,'Algerien');
INSERT INTO `land` VALUES (6,'Amerikanisch-Samoa ');
INSERT INTO `land` VALUES (7,'Amerikanische Jungferninseln');
INSERT INTO `land` VALUES (8,'Andorra');
INSERT INTO `land` VALUES (9,'Angola');
INSERT INTO `land` VALUES (10,'Anguilla');
INSERT INTO `land` VALUES (11,'Antarktis (Sonderstatus durch ');
INSERT INTO `land` VALUES (12,'Antarktischer Ozean');
INSERT INTO `land` VALUES (13,'Antigua und Barbuda');
INSERT INTO `land` VALUES (14,'AquatorialguineaÄquatorialguin');
INSERT INTO `land` VALUES (15,'Argentinien');
INSERT INTO `land` VALUES (16,'Arktischer Ozean');
INSERT INTO `land` VALUES (17,'Armenien');
INSERT INTO `land` VALUES (18,'Aruba');
INSERT INTO `land` VALUES (19,'Ascension');
INSERT INTO `land` VALUES (20,'Aserbaidschan');
INSERT INTO `land` VALUES (21,'Athiopien');
INSERT INTO `land` VALUES (22,'Atlantischer Ozean');
INSERT INTO `land` VALUES (23,'Australien');
INSERT INTO `land` VALUES (24,'Bahamas');
INSERT INTO `land` VALUES (25,'Bahrain');
INSERT INTO `land` VALUES (26,'Bangladesch');
INSERT INTO `land` VALUES (27,'Barbados');
INSERT INTO `land` VALUES (28,'Belarus (Weißrussland)');
INSERT INTO `land` VALUES (29,'Belgien');
INSERT INTO `land` VALUES (30,'Belize');
INSERT INTO `land` VALUES (31,'Benin');
INSERT INTO `land` VALUES (32,'Bermuda');
INSERT INTO `land` VALUES (33,'Bhutan');
INSERT INTO `land` VALUES (34,'Bolivien');
INSERT INTO `land` VALUES (35,'Bosnien und Herzegowina');
INSERT INTO `land` VALUES (36,'Botswana');
INSERT INTO `land` VALUES (37,'Bouvetinsel');
INSERT INTO `land` VALUES (38,'Brasilien');
INSERT INTO `land` VALUES (39,'Britische Jungferninseln');
INSERT INTO `land` VALUES (40,'Britisches Territorium im Indi');
INSERT INTO `land` VALUES (41,'Brunei Darussalam');
INSERT INTO `land` VALUES (42,'Bulgarien');
INSERT INTO `land` VALUES (43,'Burkina Faso');
INSERT INTO `land` VALUES (44,'Burma');
INSERT INTO `land` VALUES (45,'Burundi');
INSERT INTO `land` VALUES (46,'Ceuta');
INSERT INTO `land` VALUES (47,'Chile');
INSERT INTO `land` VALUES (48,'Volksrepublik China');
INSERT INTO `land` VALUES (49,'Clipperto');
INSERT INTO `land` VALUES (50,'Cookinseln');
INSERT INTO `land` VALUES (51,'Costa Rica');
INSERT INTO `land` VALUES (52,'Cote d\'IvoireCôte d\'Ivoire (El');
INSERT INTO `land` VALUES (53,'Dänemark');
INSERT INTO `land` VALUES (54,'Deutschland');
INSERT INTO `land` VALUES (55,'Diego Garcia');
INSERT INTO `land` VALUES (56,'Dominica');
INSERT INTO `land` VALUES (57,'Dominikanische Republik');
INSERT INTO `land` VALUES (58,'Dschibuti');
INSERT INTO `land` VALUES (59,'Ecuador');
INSERT INTO `land` VALUES (60,'El Salvador');
INSERT INTO `land` VALUES (61,'Eritrea');
INSERT INTO `land` VALUES (62,'Estland');
INSERT INTO `land` VALUES (63,'Europäische Gemeinschaft');
INSERT INTO `land` VALUES (64,'Europäische Union');
INSERT INTO `land` VALUES (65,'Falklandinseln');
INSERT INTO `land` VALUES (66,'Färöer');
INSERT INTO `land` VALUES (67,'Fidschi');
INSERT INTO `land` VALUES (68,'Finnland');
INSERT INTO `land` VALUES (69,'Frankreich');
INSERT INTO `land` VALUES (70,'Gabun');
INSERT INTO `land` VALUES (71,'Gambia');
INSERT INTO `land` VALUES (72,'Georgien');
INSERT INTO `land` VALUES (73,'Ghana');
INSERT INTO `land` VALUES (74,'Gibraltar');
INSERT INTO `land` VALUES (75,'Grenada');
INSERT INTO `land` VALUES (76,'Griechenland');
INSERT INTO `land` VALUES (77,'Grönland');
INSERT INTO `land` VALUES (78,'Guadeloupe');
INSERT INTO `land` VALUES (79,'Guam');
INSERT INTO `land` VALUES (80,'Guatemala');
INSERT INTO `land` VALUES (81,'Guinea');
INSERT INTO `land` VALUES (82,'Guinea-Bissau');
INSERT INTO `land` VALUES (83,'Guyana');
INSERT INTO `land` VALUES (84,'Haiti');
INSERT INTO `land` VALUES (85,'Heard- und McDonald-Inseln');
INSERT INTO `land` VALUES (86,'Honduras');
INSERT INTO `land` VALUES (87,'Hongkong');
INSERT INTO `land` VALUES (88,'Indien');
INSERT INTO `land` VALUES (89,'Indischer Ozean');
INSERT INTO `land` VALUES (90,'Indonesien');
INSERT INTO `land` VALUES (91,'Irak');
INSERT INTO `land` VALUES (92,'Iran');
INSERT INTO `land` VALUES (93,'Irland');
INSERT INTO `land` VALUES (94,'Island');
INSERT INTO `land` VALUES (95,'Israel');
INSERT INTO `land` VALUES (96,'Italien');
INSERT INTO `land` VALUES (97,'Jamaika');
INSERT INTO `land` VALUES (98,'Japan');
INSERT INTO `land` VALUES (99,'Jemen');
INSERT INTO `land` VALUES (100,'Jordanien');
INSERT INTO `land` VALUES (101,'Jugoslawien (ehemalig)');
INSERT INTO `land` VALUES (102,'Kaimaninseln');
INSERT INTO `land` VALUES (103,'Kambodscha');
INSERT INTO `land` VALUES (104,'Kamerun');
INSERT INTO `land` VALUES (105,'Kanada');
INSERT INTO `land` VALUES (106,'Kanarische Inseln');
INSERT INTO `land` VALUES (107,'Kap Verde');
INSERT INTO `land` VALUES (108,'Kasachstan');
INSERT INTO `land` VALUES (109,'Katar');
INSERT INTO `land` VALUES (110,'Kenia');
INSERT INTO `land` VALUES (111,'Kirgisistan');
INSERT INTO `land` VALUES (112,'Kiribati');
INSERT INTO `land` VALUES (113,'Kokosinseln');
INSERT INTO `land` VALUES (114,'Kolumbien');
INSERT INTO `land` VALUES (115,'Komoren');
INSERT INTO `land` VALUES (116,'Republik Kongo');
INSERT INTO `land` VALUES (117,'Südkorea');
INSERT INTO `land` VALUES (118,'Kosovo        ');
INSERT INTO `land` VALUES (119,'Kroatien');
INSERT INTO `land` VALUES (120,'Kuba');
INSERT INTO `land` VALUES (121,'Kuwait');
INSERT INTO `land` VALUES (122,'Laos');
INSERT INTO `land` VALUES (123,'Lesotho');
INSERT INTO `land` VALUES (124,'Lettland');
INSERT INTO `land` VALUES (125,'Libanon');
INSERT INTO `land` VALUES (126,'Liberia');
INSERT INTO `land` VALUES (127,'Libyen');
INSERT INTO `land` VALUES (128,'Liechtenstein');
INSERT INTO `land` VALUES (129,'Litauen');
INSERT INTO `land` VALUES (130,'Luxemburg');
INSERT INTO `land` VALUES (131,'Macao');
INSERT INTO `land` VALUES (132,'Madagaskar');
INSERT INTO `land` VALUES (133,'Malawi');
INSERT INTO `land` VALUES (134,'Malaysia');
INSERT INTO `land` VALUES (135,'Malediven');
INSERT INTO `land` VALUES (136,'Mali');
INSERT INTO `land` VALUES (137,'Malta');
INSERT INTO `land` VALUES (138,'Marokko');
INSERT INTO `land` VALUES (139,'Marshallinseln');
INSERT INTO `land` VALUES (140,'Martinique');
INSERT INTO `land` VALUES (141,'Mauretanien');
INSERT INTO `land` VALUES (142,'Mauritius');
INSERT INTO `land` VALUES (143,'Mayotte');
INSERT INTO `land` VALUES (144,'Mazedonien');
INSERT INTO `land` VALUES (145,'Mexiko');
INSERT INTO `land` VALUES (146,'Mikronesien');
INSERT INTO `land` VALUES (147,'Moldawiens');
INSERT INTO `land` VALUES (148,'Monaco');
INSERT INTO `land` VALUES (149,'Mongolei');
INSERT INTO `land` VALUES (150,'Montenegro');
INSERT INTO `land` VALUES (151,'Montserrat');
INSERT INTO `land` VALUES (152,'Mosambik');
INSERT INTO `land` VALUES (153,'Namibia');
INSERT INTO `land` VALUES (154,'Nauru');
INSERT INTO `land` VALUES (155,'Nepal');
INSERT INTO `land` VALUES (156,'Neukaledonien');
INSERT INTO `land` VALUES (157,'Neuseeland');
INSERT INTO `land` VALUES (158,'Nicaragua');
INSERT INTO `land` VALUES (159,'Niederlande');
INSERT INTO `land` VALUES (160,'Niger');
INSERT INTO `land` VALUES (161,'Nigeria');
INSERT INTO `land` VALUES (162,'Niue');
INSERT INTO `land` VALUES (163,'Norfolkinsel');
INSERT INTO `land` VALUES (164,'Norwegen');
INSERT INTO `land` VALUES (165,'Oman');
INSERT INTO `land` VALUES (166,'Orbit');
INSERT INTO `land` VALUES (167,'Österreich');
INSERT INTO `land` VALUES (168,'Pakistan');
INSERT INTO `land` VALUES (169,'Palau');
INSERT INTO `land` VALUES (170,'Panama');
INSERT INTO `land` VALUES (171,'Papua-Neuguinea');
INSERT INTO `land` VALUES (172,'Paraguay');
INSERT INTO `land` VALUES (173,'Pazifischer Ozean');
INSERT INTO `land` VALUES (174,'Peru');
INSERT INTO `land` VALUES (175,'Philippinen');
INSERT INTO `land` VALUES (176,'Pitcairninseln');
INSERT INTO `land` VALUES (177,'Polen');
INSERT INTO `land` VALUES (178,'Portugal');
INSERT INTO `land` VALUES (179,'Puerto Rico');
INSERT INTO `land` VALUES (180,'Ruanda');
INSERT INTO `land` VALUES (181,'Rumänien');
INSERT INTO `land` VALUES (182,'Russische Föderation');
INSERT INTO `land` VALUES (183,'Salomonen');
INSERT INTO `land` VALUES (184,'Saint-Barthélemy');
INSERT INTO `land` VALUES (185,'Sambia');
INSERT INTO `land` VALUES (186,'Samoa');
INSERT INTO `land` VALUES (187,'San Marino');
INSERT INTO `land` VALUES (188,'Saudi-Arabien');
INSERT INTO `land` VALUES (189,'Schweden');
INSERT INTO `land` VALUES (190,'Schweiz');
INSERT INTO `land` VALUES (191,'Senegal');
INSERT INTO `land` VALUES (192,'Serbien');
INSERT INTO `land` VALUES (193,'Serbien und Montenegro');
INSERT INTO `land` VALUES (194,'Seychellen');
INSERT INTO `land` VALUES (195,'Sierra Leone');
INSERT INTO `land` VALUES (196,'Simbabwe');
INSERT INTO `land` VALUES (197,'Singapur');
INSERT INTO `land` VALUES (198,'Slowakei');
INSERT INTO `land` VALUES (199,'Slowenien');
INSERT INTO `land` VALUES (200,'Somalia');
INSERT INTO `land` VALUES (201,'Spanien');
INSERT INTO `land` VALUES (202,'Sri Lanka');
INSERT INTO `land` VALUES (203,'Südafrika');
INSERT INTO `land` VALUES (204,'Sudan');
INSERT INTO `land` VALUES (205,'Suriname');
INSERT INTO `land` VALUES (206,'Swasiland');
INSERT INTO `land` VALUES (207,'Syrien');
INSERT INTO `land` VALUES (208,'Tadschikistan');
INSERT INTO `land` VALUES (209,'Taiwan');
INSERT INTO `land` VALUES (210,'Thailand');
INSERT INTO `land` VALUES (211,'Togo');
INSERT INTO `land` VALUES (212,'Tokelau');
INSERT INTO `land` VALUES (213,'Tonga');
INSERT INTO `land` VALUES (214,'Trinidad und Tobago');
INSERT INTO `land` VALUES (215,'Tschad');
INSERT INTO `land` VALUES (216,'Tschechische Republik');
INSERT INTO `land` VALUES (217,'Tschechoslowakei');
INSERT INTO `land` VALUES (218,'Tunesien');
INSERT INTO `land` VALUES (219,'Türkei');
INSERT INTO `land` VALUES (220,'Turkmenistan');
INSERT INTO `land` VALUES (221,'Tuvalu');
INSERT INTO `land` VALUES (222,'Uganda');
INSERT INTO `land` VALUES (223,'Ukraine');
INSERT INTO `land` VALUES (224,'Ungarn');
INSERT INTO `land` VALUES (225,'Uruguay');
INSERT INTO `land` VALUES (226,'Usbekistan');
INSERT INTO `land` VALUES (227,'Vanuatu');
INSERT INTO `land` VALUES (228,'Vatikanstadt');
INSERT INTO `land` VALUES (229,'Venezuela');
INSERT INTO `land` VALUES (230,'Vereinigte Staaten von Amerika');
INSERT INTO `land` VALUES (231,'Vereinigtes Königreich Großbri');
INSERT INTO `land` VALUES (232,'Vietnam');
INSERT INTO `land` VALUES (233,'Weihnachtsinsel');
INSERT INTO `land` VALUES (234,'Westsahara');
INSERT INTO `land` VALUES (235,'Zaire  ');
INSERT INTO `land` VALUES (236,'Zentralafrikanische Republik');
INSERT INTO `land` VALUES (237,'Zypern');
/*!40000 ALTER TABLE `land` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schueler`
--

DROP TABLE IF EXISTS `schueler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schueler` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `letzteSchuleName` varchar(50) NOT NULL,
  `letzteSchuleOrt` varchar(50) NOT NULL,
  `nachname` varchar(40) NOT NULL,
  `vorname` varchar(40) NOT NULL,
  `geburtslandId` int(10) unsigned NOT NULL,
  `staatsangehoerigkeitId` int(10) NOT NULL,
  `bekenntnisfreiText` varchar(40) DEFAULT NULL,
  `wohnhaftBei` enum('Eltern','Vormund','eigene Wohnung') NOT NULL,
  `leseSchreibStoerung` tinyint(1) DEFAULT NULL,
  `leseSchreibSchwaeche` tinyint(1) DEFAULT NULL,
  `zugangInBrd` enum('Aussiedler','Kriegsflüchtling','Asylant','Asylbewerber','sonstiger Zuzug') DEFAULT NULL,
  `grundFuerEthik` enum('Austritt','Religionslosigkeit','kein Religionsunterricht') DEFAULT NULL,
  `ausbildungsberufId` int(10) unsigned DEFAULT NULL,
  `umschueler` tinyint(1) DEFAULT NULL,
  `ausbildungsbetriebId` int(10) DEFAULT NULL,
  `zuletztBesuchteSchulartId` int(10) unsigned NOT NULL,
  `hoechsterBereitsErreichterAbschlussId` int(10) unsigned NOT NULL,
  `adresseId` int(10) unsigned NOT NULL,
  `herkunftslandId` int(10) unsigned DEFAULT '54',
  `klassenstufe` enum('10','11','12') NOT NULL,
  `abschlussAnSchulartId` int(10) unsigned NOT NULL,
  `geburtsdatum` date NOT NULL,
  `geschlecht` enum('männlich','weiblich') NOT NULL,
  `zugangInBrdAm` date DEFAULT NULL,
  `eintrittBs` date NOT NULL,
  `geburtsStadt` varchar(50) NOT NULL,
  `familienstand` enum('ledig','verheiratet','geschieden','getrennt lebend') NOT NULL,
  `religionsunterricht` enum('rk','ev','Ethik') NOT NULL,
  `beginnDerAusbildung` date NOT NULL,
  `endeDerAusbildung` date NOT NULL,
  `bekenntnis` enum('rk','ev','sonstige') NOT NULL,
  `artDesVertrags` enum('Ausbildungsvertrag','BVJ','ohne Beruf/arbeitslos','ungelernte Arbeitskraft','Umschüler','Teilnehmer an Lehrgang der Arbeitsverwaltung') NOT NULL,
  `kontaktperson1Id` int(10) unsigned NOT NULL,
  `kontaktperson2Id` int(10) unsigned DEFAULT NULL,
  `hinzugefügtAm` datetime DEFAULT NULL,
  `bearbeitetAm` datetime DEFAULT NULL,
  `exportiert` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schueler`
--

LOCK TABLES `schueler` WRITE;
/*!40000 ALTER TABLE `schueler` DISABLE KEYS */;
/*!40000 ALTER TABLE `schueler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schueler_seq`
--

DROP TABLE IF EXISTS `schueler_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schueler_seq` (
  `sequence` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sequence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schueler_seq`
--

LOCK TABLES `schueler_seq` WRITE;
/*!40000 ALTER TABLE `schueler_seq` DISABLE KEYS */;
/*!40000 ALTER TABLE `schueler_seq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `sid` varchar(32) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `captcha` varchar(32) NOT NULL,
  `time` datetime NOT NULL,
  `valid` tinyint(1) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `view_schueler`
--

DROP TABLE IF EXISTS `view_schueler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `view_schueler` (
  `id` int(10) unsigned DEFAULT NULL,
  `letzteSchuleName` varchar(50) DEFAULT NULL,
  `letzteSchuleOrt` varchar(50) DEFAULT NULL,
  `nachname` varchar(40) DEFAULT NULL,
  `vorname` varchar(40) DEFAULT NULL,
  `geburtslandId` int(10) unsigned DEFAULT NULL,
  `staatsangehoerigkeitId` int(10) DEFAULT NULL,
  `bekenntnisfreiText` varchar(40) DEFAULT NULL,
  `wohnhaftBei` enum('Eltern','Vormund','eigene Wohnung') DEFAULT NULL,
  `leseSchreibStoerung` tinyint(1) DEFAULT NULL,
  `leseSchreibSchwaeche` tinyint(1) DEFAULT NULL,
  `zugangInBrd` enum('Aussiedler','Kriegsflüchtling','Asylant','Asylbewerber','sonstiger Zuzug') DEFAULT NULL,
  `grundFuerEthik` enum('Austritt','Religionslosigkeit','kein Religionsunterricht') DEFAULT NULL,
  `ausbildungsberufId` int(10) unsigned DEFAULT NULL,
  `umschueler` tinyint(1) DEFAULT NULL,
  `ausbildungsbetriebId` int(10) DEFAULT NULL,
  `zuletztBesuchteSchulartId` int(10) unsigned DEFAULT NULL,
  `hoechsterBereitsErreichterAbschlussId` int(10) unsigned DEFAULT NULL,
  `adresseId` int(10) unsigned DEFAULT NULL,
  `herkunftslandId` int(10) unsigned DEFAULT NULL,
  `klassenstufe` enum('10','11','12') DEFAULT NULL,
  `abschlussAnSchulartId` int(10) unsigned DEFAULT NULL,
  `geburtsdatum` date DEFAULT NULL,
  `geschlecht` enum('männlich','weiblich') DEFAULT NULL,
  `zugangInBrdAm` date DEFAULT NULL,
  `eintrittBs` date DEFAULT NULL,
  `geburtsStadt` varchar(50) DEFAULT NULL,
  `familienstand` enum('ledig','verheiratet','geschieden','getrennt lebend') DEFAULT NULL,
  `religionsunterricht` enum('rk','ev','Ethik') DEFAULT NULL,
  `beginnDerAusbildung` date DEFAULT NULL,
  `endeDerAusbildung` date DEFAULT NULL,
  `bekenntnis` enum('rk','ev','sonstige') DEFAULT NULL,
  `artDesVertrags` enum('Ausbildungsvertrag','BVJ','ohne Beruf/arbeitslos','ungelernte Arbeitskraft','Umschüler','Teilnehmer an Lehrgang der Arbeitsverwaltung') DEFAULT NULL,
  `kontaktperson1Id` int(10) unsigned DEFAULT NULL,
  `kontaktperson2Id` int(10) unsigned DEFAULT NULL,
  `hinzugefügtAm` datetime DEFAULT NULL,
  `bearbeitetAm` datetime DEFAULT NULL,
  `exportiert` tinyint(1) DEFAULT NULL,
  `geburtsland` varchar(30) DEFAULT NULL,
  `staatsangehoerigkeit` varchar(30) DEFAULT NULL,
  `herkunftsland` varchar(30) DEFAULT NULL,
  `firma` varchar(50) DEFAULT NULL,
  `strasse` varchar(30) DEFAULT NULL,
  `hausnummer` varchar(10) DEFAULT NULL,
  `postleitzahl` varchar(5) DEFAULT NULL,
  `wohnort` varchar(30) DEFAULT NULL,
  `telefon` varchar(25) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ab_strasse` varchar(30) DEFAULT NULL,
  `ab_hausnummer` varchar(10) DEFAULT NULL,
  `ab_plz` varchar(5) DEFAULT NULL,
  `ab_ort` varchar(30) DEFAULT NULL,
  `ab_telefon` varchar(25) DEFAULT NULL,
  `ab_fax` varchar(25) DEFAULT NULL,
  `ab_email` varchar(50) DEFAULT NULL,
  `ausbildungsberuf_bezeichnung` varchar(80) DEFAULT NULL,
  `abschlussSchulart` varchar(50) DEFAULT NULL,
  `zuletztBesuchteSchulart` varchar(50) DEFAULT NULL,
  `hoechsterAbschluss` varchar(50) DEFAULT NULL,
  `kp1_name` varchar(30) DEFAULT NULL,
  `kp1_vorname` varchar(20) DEFAULT NULL,
  `kp1_kontakttyp` enum('Vater','Mutter','Vormund','Sonstige') DEFAULT NULL,
  `kpa1_strasse` varchar(30) DEFAULT NULL,
  `kpa1_hausnummer` varchar(10) DEFAULT NULL,
  `kpa1_plz` varchar(5) DEFAULT NULL,
  `kpa1_ort` varchar(30) DEFAULT NULL,
  `kpa1_telefon` varchar(25) DEFAULT NULL,
  `kpa1_fax` varchar(25) DEFAULT NULL,
  `kpa1_email` varchar(50) DEFAULT NULL,
  `kp2_name` varchar(30) DEFAULT NULL,
  `kp2_vorname` varchar(20) DEFAULT NULL,
  `kp2_kontakttyp` enum('Vater','Mutter','Vormund','Sonstige') DEFAULT NULL,
  `kpa2_strasse` varchar(30) DEFAULT NULL,
  `kpa2_hausnummer` varchar(10) DEFAULT NULL,
  `kpa2_plz` varchar(5) DEFAULT NULL,
  `kpa2_ort` varchar(30) DEFAULT NULL,
  `kpa2_telefon` varchar(25) DEFAULT NULL,
  `kpa2_fax` varchar(25) DEFAULT NULL,
  `kpa2_email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `view_schueler`
--

LOCK TABLES `view_schueler` WRITE;
/*!40000 ALTER TABLE `view_schueler` DISABLE KEYS */;
/*!40000 ALTER TABLE `view_schueler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zuletztbesuchteschulart`
--

DROP TABLE IF EXISTS `zuletztbesuchteschulart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zuletztbesuchteschulart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `schulart` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zuletztbesuchteschulart`
--

LOCK TABLES `zuletztbesuchteschulart` WRITE;
/*!40000 ALTER TABLE `zuletztbesuchteschulart` DISABLE KEYS */;
INSERT INTO `zuletztbesuchteschulart` VALUES (1,'allgemein bild. Schule');
INSERT INTO `zuletztbesuchteschulart` VALUES (2,'Wirtschaftsschule');
INSERT INTO `zuletztbesuchteschulart` VALUES (3,'Fachoberschule');
INSERT INTO `zuletztbesuchteschulart` VALUES (4,'BS (Ausbildungsvertrag)');
INSERT INTO `zuletztbesuchteschulart` VALUES (5,'Ausbildung an anderer BS');
INSERT INTO `zuletztbesuchteschulart` VALUES (6,'BVJ der BS');
INSERT INTO `zuletztbesuchteschulart` VALUES (7,'BVJ an anderer BS');
INSERT INTO `zuletztbesuchteschulart` VALUES (8,'BGJ an anderer BS');
INSERT INTO `zuletztbesuchteschulart` VALUES (9,'BS und Maßnahme der AV');
INSERT INTO `zuletztbesuchteschulart` VALUES (10,'Maßnahme der AV an anderer BS');
INSERT INTO `zuletztbesuchteschulart` VALUES (11,'BFS Berufsfachschule');
INSERT INTO `zuletztbesuchteschulart` VALUES (12,'BFS Gesundheitswesen');
INSERT INTO `zuletztbesuchteschulart` VALUES (13,'sonstige Schule');
INSERT INTO `zuletztbesuchteschulart` VALUES (14,'keine Schule');
/*!40000 ALTER TABLE `zuletztbesuchteschulart` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-17 19:34:49
