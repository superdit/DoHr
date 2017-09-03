CREATE DATABASE  IF NOT EXISTS `code_hris` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `code_hris`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: code_hris
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(100) NOT NULL,
  `long_name` varchar(100) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(10) DEFAULT NULL,
  `un_member` varchar(10) DEFAULT NULL,
  `calling_code` varchar(10) DEFAULT NULL,
  `cctld` varchar(7) DEFAULT NULL,
  `currency_name` varchar(45) DEFAULT NULL,
  `currency_code` varchar(45) DEFAULT NULL,
  `currency_symbol` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan','Islamic Republic of Afghanistan','AFG','004','yes','93','.af','Afghani','AFN','؋',NULL,NULL,NULL,NULL),(2,'AX','Aland Islands','&Aring;land Islands','ALA','248','no','358','.ax','','',NULL,NULL,NULL,NULL,NULL),(3,'AL','Albania','Republic of Albania','ALB','008','yes','355','.al','Lek','ALL','Lek',NULL,NULL,NULL,NULL),(4,'DZ','Algeria','People\'s Democratic Republic of Algeria','DZA','012','yes','213','.dz','Algerian Dinar','DZD','',NULL,NULL,NULL,NULL),(5,'AS','American Samoa','American Samoa','ASM','016','no','1+684','.as','US Dollar','USD','$',NULL,NULL,NULL,NULL),(6,'AD','Andorra','Principality of Andorra','AND','020','yes','376','.ad','Euro','EUR',NULL,NULL,NULL,NULL,NULL),(7,'AO','Angola','Republic of Angola','AGO','024','yes','244','.ao','Angolan Kwanza','AOA',NULL,NULL,NULL,NULL,NULL),(8,'AI','Anguilla','Anguilla','AIA','660','no','1+264','.ai','East Caribbean Dollar','XCD',NULL,NULL,NULL,NULL,NULL),(9,'AQ','Antarctica','Antarctica','ATA','010','no','672','.aq','East Caribbean Dollar','XCD',NULL,NULL,NULL,NULL,NULL),(10,'AG','Antigua and Barbuda','Antigua and Barbuda','ATG','028','yes','1+268','.ag','East Caribbean Dollar','XCD',NULL,NULL,NULL,NULL,NULL),(11,'AR','Argentina','Argentine Republic','ARG','032','yes','54','.ar','Argentine Peso','ARS','$',NULL,NULL,NULL,NULL),(12,'AM','Armenia','Republic of Armenia','ARM','051','yes','374','.am','Armenian Dram','AMD',NULL,NULL,NULL,NULL,NULL),(13,'AW','Aruba','Aruba','ABW','533','no','297','.aw','Aruban Guilder','AWG','ƒ',NULL,NULL,NULL,NULL),(14,'AU','Australia','Commonwealth of Australia','AUS','036','yes','61','.au','Australian Dollar','AUD','$',NULL,NULL,NULL,NULL),(15,'AT','Austria','Republic of Austria','AUT','040','yes','43','.at','Euro','EUR',NULL,NULL,NULL,NULL,NULL),(16,'AZ','Azerbaijan','Republic of Azerbaijan','AZE','031','yes','994','.az','New Manat','AZN','ман',NULL,NULL,NULL,NULL),(17,'BS','Bahamas','Commonwealth of The Bahamas','BHS','044','yes','1+242','.bs','Bahamian Dollar','BSD','$',NULL,NULL,NULL,NULL),(18,'BH','Bahrain','Kingdom of Bahrain','BHR','048','yes','973','.bh','Bahraini Dinar','BSD',NULL,NULL,NULL,NULL,NULL),(19,'BD','Bangladesh','People\'s Republic of Bangladesh','BGD','050','yes','880','.bd','Bangladeshi Taka','BDT',NULL,NULL,NULL,NULL,NULL),(20,'BB','Barbados','Barbados','BRB','052','yes','1+246','.bb','Barbados Dollar','BBD','$',NULL,NULL,NULL,NULL),(21,'BY','Belarus','Republic of Belarus','BLR','112','yes','375','.by','BelarussianRuble','BYR','p.',NULL,NULL,NULL,NULL),(22,'BE','Belgium','Kingdom of Belgium','BEL','056','yes','32','.be','Euro','EUR',NULL,NULL,NULL,NULL,NULL),(23,'BZ','Belize','Belize','BLZ','084','yes','501','.bz','Dollar','BZD','BZ$',NULL,NULL,NULL,NULL),(24,'BJ','Benin','Republic of Benin','BEN','204','yes','229','.bj','CFA Franc BCEAO','XOF',NULL,NULL,NULL,NULL,NULL),(25,'BM','Bermuda','Bermuda Islands','BMU','060','no','1+441','.bm','Bermudian Dollar','BMD','$',NULL,NULL,NULL,NULL),(26,'BT','Bhutan','Kingdom of Bhutan','BTN','064','yes','975','.bt','Bhutan Ngultrum','BTN',NULL,NULL,NULL,NULL,NULL),(27,'BO','Bolivia','Plurinational State of Bolivia','BOL','068','yes','591','.bo','Boliviano','BOB','$b',NULL,NULL,NULL,NULL),(28,'BQ','Bonaire, Sint Eustatius and Saba','Bonaire, Sint Eustatius and Saba','BES','535','no','599','.bq',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'BA','Bosnia and Herzegovina','Bosnia and Herzegovina','BIH','070','yes','387','.ba','Convertible Marka','BAM','KM',NULL,NULL,NULL,NULL),(30,'BW','Botswana','Republic of Botswana','BWA','072','yes','267','.bw','Pula','BWP','P',NULL,NULL,NULL,NULL),(31,'BV','Bouvet Island','Bouvet Island','BVT','074','no','NONE','.bv','Norwegian Krone','NOK',NULL,NULL,NULL,NULL,NULL),(32,'BR','Brazil','Federative Republic of Brazil','BRA','076','yes','55','.br','Brazilian Real','BRL','R$',NULL,NULL,NULL,NULL),(33,'IO','British Indian Ocean Territory','British Indian Ocean Territory','IOT','086','no','246','.io','US Dollar','USD','$',NULL,NULL,NULL,NULL),(34,'BN','Brunei','Brunei Darussalam','BRN','096','yes','673','.bn','Brunei Dollar','BND','$',NULL,NULL,NULL,NULL),(35,'BG','Bulgaria','Republic of Bulgaria','BGR','100','yes','359','.bg','Bulgarian Lev','BGN','лв',NULL,NULL,NULL,NULL),(36,'BF','Burkina Faso','Burkina Faso','BFA','854','yes','226','.bf','CFA Franc BCEAO','XOF',NULL,NULL,NULL,NULL,NULL),(37,'BI','Burundi','Republic of Burundi','BDI','108','yes','257','.bi','Burundi Franc','BIF',NULL,NULL,NULL,NULL,NULL),(38,'KH','Cambodia','Kingdom of Cambodia','KHM','116','yes','855','.kh','Riel','KHR','៛',NULL,NULL,NULL,NULL),(39,'CM','Cameroon','Republic of Cameroon','CMR','120','yes','237','.cm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'CA','Canada','Canada','CAN','124','yes','1','.ca','Dollar','CAD','$',NULL,NULL,NULL,NULL),(41,'CV','Cape Verde','Republic of Cape Verde','CPV','132','yes','238','.cv',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,'KY','Cayman Islands','The Cayman Islands','CYM','136','no','1+345','.ky','Dollar','KYD','$',NULL,NULL,NULL,NULL),(43,'CF','Central African Republic','Central African Republic','CAF','140','yes','236','.cf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,'TD','Chad','Republic of Chad','TCD','148','yes','235','.td',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,'CL','Chile','Republic of Chile','CHL','152','yes','56','.cl','Peso','CLP','$',NULL,NULL,NULL,NULL),(46,'CN','China','People\'s Republic of China','CHN','156','yes','86','.cn','Yuan Renminbi','CNY','¥',NULL,NULL,NULL,NULL),(47,'CX','Christmas Island','Christmas Island','CXR','162','no','61','.cx',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,'CC','Cocos (Keeling) Islands','Cocos (Keeling) Islands','CCK','166','no','61','.cc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,'CO','Colombia','Republic of Colombia','COL','170','yes','57','.co','Peso','COP','$',NULL,NULL,NULL,NULL),(50,'KM','Comoros','Union of the Comoros','COM','174','yes','269','.km',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(51,'CG','Congo','Republic of the Congo','COG','178','yes','242','.cg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(52,'CK','Cook Islands','Cook Islands','COK','184','some','682','.ck',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'CR','Costa Rica','Republic of Costa Rica','CRI','188','yes','506','.cr','Colon','CRC','₡',NULL,NULL,NULL,NULL),(54,'CI','Cote d\'ivoire (Ivory Coast)','Republic of C&ocirc;te D\'Ivoire (Ivory Coast)','CIV','384','yes','225','.ci',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'HR','Croatia','Republic of Croatia','HRV','191','yes','385','.hr','Kuna','HRK','kn',NULL,NULL,NULL,NULL),(56,'CU','Cuba','Republic of Cuba','CUB','192','yes','53','.cu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(57,'CW','Curacao','Cura&ccedil;ao','CUW','531','no','599','.cw','Peso','CUP','₱',NULL,NULL,NULL,NULL),(58,'CY','Cyprus','Republic of Cyprus','CYP','196','yes','357','.cy',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(59,'CZ','Czech Republic','Czech Republic','CZE','203','yes','420','.cz','Koruna','CZK','Kč',NULL,NULL,NULL,NULL),(60,'CD','Democratic Republic of the Congo','Democratic Republic of the Congo','COD','180','yes','243','.cd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,'DK','Denmark','Kingdom of Denmark','DNK','208','yes','45','.dk','Krone','DKK','kr',NULL,NULL,NULL,NULL),(62,'DJ','Djibouti','Republic of Djibouti','DJI','262','yes','253','.dj',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,'DM','Dominica','Commonwealth of Dominica','DMA','212','yes','1+767','.dm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,'DO','Dominican Republic','Dominican Republic','DOM','214','yes','1+809, 8','.do','Peso','DOP','RD$',NULL,NULL,NULL,NULL),(65,'EC','Ecuador','Republic of Ecuador','ECU','218','yes','593','.ec',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(66,'EG','Egypt','Arab Republic of Egypt','EGY','818','yes','20','.eg','Pound','EGP','£',NULL,NULL,NULL,NULL),(67,'SV','El Salvador','Republic of El Salvador','SLV','222','yes','503','.sv','Colon','SVC','$',NULL,NULL,NULL,NULL),(68,'GQ','Equatorial Guinea','Republic of Equatorial Guinea','GNQ','226','yes','240','.gq',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(69,'ER','Eritrea','State of Eritrea','ERI','232','yes','291','.er',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(70,'EE','Estonia','Republic of Estonia','EST','233','yes','372','.ee','Kroon','EEK','kr',NULL,NULL,NULL,NULL),(71,'ET','Ethiopia','Federal Democratic Republic of Ethiopia','ETH','231','yes','251','.et',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(72,'FK','Falkland Islands (Malvinas)','The Falkland Islands (Malvinas)','FLK','238','no','500','.fk','Pound','FKP','£',NULL,NULL,NULL,NULL),(73,'FO','Faroe Islands','The Faroe Islands','FRO','234','no','298','.fo',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,'FJ','Fiji','Republic of Fiji','FJI','242','yes','679','.fj','Dollar','FJD','$',NULL,NULL,NULL,NULL),(75,'FI','Finland','Republic of Finland','FIN','246','yes','358','.fi',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,'FR','France','French Republic','FRA','250','yes','33','.fr',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,'GF','French Guiana','French Guiana','GUF','254','no','594','.gf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,'PF','French Polynesia','French Polynesia','PYF','258','no','689','.pf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(79,'TF','French Southern Territories','French Southern Territories','ATF','260','no',NULL,'.tf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(80,'GA','Gabon','Gabonese Republic','GAB','266','yes','241','.ga',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,'GM','Gambia','Republic of The Gambia','GMB','270','yes','220','.gm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,'GE','Georgia','Georgia','GEO','268','yes','995','.ge',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(83,'DE','Germany','Federal Republic of Germany','DEU','276','yes','49','.de',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(84,'GH','Ghana','Republic of Ghana','GHA','288','yes','233','.gh','Cedi','GHC','¢',NULL,NULL,NULL,NULL),(85,'GI','Gibraltar','Gibraltar','GIB','292','no','350','.gi','Pound','GIP','£',NULL,NULL,NULL,NULL),(86,'GR','Greece','Hellenic Republic','GRC','300','yes','30','.gr',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(87,'GL','Greenland','Greenland','GRL','304','no','299','.gl',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(88,'GD','Grenada','Grenada','GRD','308','yes','1+473','.gd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(89,'GP','Guadaloupe','Guadeloupe','GLP','312','no','590','.gp',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(90,'GU','Guam','Guam','GUM','316','no','1+671','.gu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(91,'GT','Guatemala','Republic of Guatemala','GTM','320','yes','502','.gt','Quetzal','GTQ','Q',NULL,NULL,NULL,NULL),(92,'GG','Guernsey','Guernsey','GGY','831','no','44','.gg','Pound','GGP','£',NULL,NULL,NULL,NULL),(93,'GN','Guinea','Republic of Guinea','GIN','324','yes','224','.gn',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(94,'GW','Guinea-Bissau','Republic of Guinea-Bissau','GNB','624','yes','245','.gw',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(95,'GY','Guyana','Co-operative Republic of Guyana','GUY','328','yes','592','.gy','Dollar','GYD','$',NULL,NULL,NULL,NULL),(96,'HT','Haiti','Republic of Haiti','HTI','332','yes','509','.ht',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(97,'HM','Heard Island and McDonald Islands','Heard Island and McDonald Islands','HMD','334','no','NONE','.hm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,'HN','Honduras','Republic of Honduras','HND','340','yes','504','.hn','Lempira','HNL','L',NULL,NULL,NULL,NULL),(99,'HK','Hong Kong','Hong Kong','HKG','344','no','852','.hk','Dollar','HKD','$',NULL,NULL,NULL,NULL),(100,'HU','Hungary','Hungary','HUN','348','yes','36','.hu','Forint','HUF','Ft',NULL,NULL,NULL,NULL),(101,'IS','Iceland','Republic of Iceland','ISL','352','yes','354','.is','Krona','ISK','kr',NULL,NULL,NULL,NULL),(102,'IN','India','Republic of India','IND','356','yes','91','.in','Rupee','INR',NULL,NULL,NULL,NULL,NULL),(103,'ID','Indonesia','Republic of Indonesia','IDN','360','yes','62','.id','Rupiah','IDR','Rp',NULL,NULL,NULL,NULL),(104,'IR','Iran','Islamic Republic of Iran','IRN','364','yes','98','.ir','Rial','IRR','﷼',NULL,NULL,NULL,NULL),(105,'IQ','Iraq','Republic of Iraq','IRQ','368','yes','964','.iq',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(106,'IE','Ireland','Ireland','IRL','372','yes','353','.ie',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(107,'IM','Isle of Man','Isle of Man','IMN','833','no','44','.im','Pound','IMP','£',NULL,NULL,NULL,NULL),(108,'IL','Israel','State of Israel','ISR','376','yes','972','.il','Shekel','ILS','₪',NULL,NULL,NULL,NULL),(109,'IT','Italy','Italian Republic','ITA','380','yes','39','.jm','',NULL,NULL,NULL,NULL,NULL,NULL),(110,'JM','Jamaica','Jamaica','JAM','388','yes','1+876','.jm','Dollar','JMD','J$',NULL,NULL,NULL,NULL),(111,'JP','Japan','Japan','JPN','392','yes','81','.jp','Yen','JPY','¥',NULL,NULL,NULL,NULL),(112,'JE','Jersey','The Bailiwick of Jersey','JEY','832','no','44','.je','Pound','JEP','£',NULL,NULL,NULL,NULL),(113,'JO','Jordan','Hashemite Kingdom of Jordan','JOR','400','yes','962','.jo',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(114,'KZ','Kazakhstan','Republic of Kazakhstan','KAZ','398','yes','7','.kz','Tenge','KZT','лв',NULL,NULL,NULL,NULL),(115,'KE','Kenya','Republic of Kenya','KEN','404','yes','254','.ke',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(116,'KI','Kiribati','Republic of Kiribati','KIR','296','yes','686','.ki',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(117,'XK','Kosovo','Republic of Kosovo','---','---','some','381','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,'KW','Kuwait','State of Kuwait','KWT','414','yes','965','.kw',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(119,'KG','Kyrgyzstan','Kyrgyz Republic','KGZ','417','yes','996','.kg','Som','KGS','лв',NULL,NULL,NULL,NULL),(120,'LA','Laos','Lao People\'s Democratic Republic','LAO','418','yes','856','.la','Kip','LAK','₭',NULL,NULL,NULL,NULL),(121,'LV','Latvia','Republic of Latvia','LVA','428','yes','371','.lv','Lat','LVL','Ls',NULL,NULL,NULL,NULL),(122,'LB','Lebanon','Republic of Lebanon','LBN','422','yes','961','.lb','Pound','LBP','£',NULL,NULL,NULL,NULL),(123,'LS','Lesotho','Kingdom of Lesotho','LSO','426','yes','266','.ls',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,'LR','Liberia','Republic of Liberia','LBR','430','yes','231','.lr','Dollar','LRD','$',NULL,NULL,NULL,NULL),(125,'LY','Libya','Libya','LBY','434','yes','218','.ly',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(126,'LI','Liechtenstein','Principality of Liechtenstein','LIE','438','yes','423','.li',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(127,'LT','Lithuania','Republic of Lithuania','LTU','440','yes','370','.lt','Litas','LTL','Lt',NULL,NULL,NULL,NULL),(128,'LU','Luxembourg','Grand Duchy of Luxembourg','LUX','442','yes','352','.lu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(129,'MO','Macao','The Macao Special Administrative Region','MAC','446','no','853','.mo',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(130,'MK','Macedonia','The Former Yugoslav Republic of Macedonia','MKD','807','yes','389','.mk','Denar','MKD','ден',NULL,NULL,NULL,NULL),(131,'MG','Madagascar','Republic of Madagascar','MDG','450','yes','261','.mg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,'MW','Malawi','Republic of Malawi','MWI','454','yes','265','.mw',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(133,'MY','Malaysia','Malaysia','MYS','458','yes','60','.my','Ringgit','MYR','RM',NULL,NULL,NULL,NULL),(134,'MV','Maldives','Republic of Maldives','MDV','462','yes','960','.mv',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(135,'ML','Mali','Republic of Mali','MLI','466','yes','223','.ml',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(136,'MT','Malta','Republic of Malta','MLT','470','yes','356','.mt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(137,'MH','Marshall Islands','Republic of the Marshall Islands','MHL','584','yes','692','.mh',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,'MQ','Martinique','Martinique','MTQ','474','no','596','.mq',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(139,'MR','Mauritania','Islamic Republic of Mauritania','MRT','478','yes','222','.mr',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(140,'MU','Mauritius','Republic of Mauritius','MUS','480','yes','230','.mu','Rupee','MUR','₨',NULL,NULL,NULL,NULL),(141,'YT','Mayotte','Mayotte','MYT','175','no','262','.yt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(142,'MX','Mexico','United Mexican States','MEX','484','yes','52','.mx','Peso','MXN','$',NULL,NULL,NULL,NULL),(143,'FM','Micronesia','Federated States of Micronesia','FSM','583','yes','691','.fm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,'MD','Moldava','Republic of Moldova','MDA','498','yes','373','.md',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(145,'MC','Monaco','Principality of Monaco','MCO','492','yes','377','.mc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(146,'MN','Mongolia','Mongolia','MNG','496','yes','976','.mn','Tughrik','MNT','₮',NULL,NULL,NULL,NULL),(147,'ME','Montenegro','Montenegro','MNE','499','yes','382','.me',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(148,'MS','Montserrat','Montserrat','MSR','500','no','1+664','.ms',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,'MA','Morocco','Kingdom of Morocco','MAR','504','yes','212','.ma',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(150,'MZ','Mozambique','Republic of Mozambique','MOZ','508','yes','258','.mz','Metical','MZN','MT',NULL,NULL,NULL,NULL),(151,'MM','Myanmar (Burma)','Republic of the Union of Myanmar','MMR','104','yes','95','.mm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(152,'NA','Namibia','Republic of Namibia','NAM','516','yes','264','.na','Dollar','NAD','$',NULL,NULL,NULL,NULL),(153,'NR','Nauru','Republic of Nauru','NRU','520','yes','674','.nr',NULL,'',NULL,NULL,NULL,NULL,NULL),(154,'NP','Nepal','Federal Democratic Republic of Nepal','NPL','524','yes','977','.np','Rupee','NPR','₨',NULL,NULL,NULL,NULL),(155,'NL','Netherlands','Kingdom of the Netherlands','NLD','528','yes','31','.nl','Antilles Guilder','ANG','ƒ',NULL,NULL,NULL,NULL),(156,'NC','New Caledonia','New Caledonia','NCL','540','no','687','.nc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(157,'NZ','New Zealand','New Zealand','NZL','554','yes','64','.nz','Dollar','NZD','$',NULL,NULL,NULL,NULL),(158,'NI','Nicaragua','Republic of Nicaragua','NIC','558','yes','505','.ni','Cordoba','NIO','C$',NULL,NULL,NULL,NULL),(159,'NE','Niger','Republic of Niger','NER','562','yes','227','.ne',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,'NG','Nigeria','Federal Republic of Nigeria','NGA','566','yes','234','.ng','Naira','NGN','₦',NULL,NULL,NULL,NULL),(161,'NU','Niue','Niue','NIU','570','some','683','.nu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,'NF','Norfolk Island','Norfolk Island','NFK','574','no','672','.nf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(163,'KP','North Korea','Democratic People\'s Republic of Korea','PRK','408','yes','850','.kp','Won','KPW','₩',NULL,NULL,NULL,NULL),(164,'MP','Northern Mariana Islands','Northern Mariana Islands','MNP','580','no','1+670','.mp',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(165,'NO','Norway','Kingdom of Norway','NOR','578','yes','47','.no','Krone','NOK','kr',NULL,NULL,NULL,NULL),(166,'OM','Oman','Sultanate of Oman','OMN','512','yes','968','.om','Rial','OMR','﷼',NULL,NULL,NULL,NULL),(167,'PK','Pakistan','Islamic Republic of Pakistan','PAK','586','yes','92','.pk','Rupee','PKR','₨',NULL,NULL,NULL,NULL),(168,'PW','Palau','Republic of Palau','PLW','585','yes','680','.pw',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(169,'PS','Palestine','State of Palestine (or Occupied Palestinian Territory)','PSE','275','some','970','.ps',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(170,'PA','Panama','Republic of Panama','PAN','591','yes','507','.pa','Balboa','PAB','B/.',NULL,NULL,NULL,NULL),(171,'PG','Papua New Guinea','Independent State of Papua New Guinea','PNG','598','yes','675','.pg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(172,'PY','Paraguay','Republic of Paraguay','PRY','600','yes','595','.py','Guarani','PYG','Gs',NULL,NULL,NULL,NULL),(173,'PE','Peru','Republic of Peru','PER','604','yes','51','.pe','Nuevo Sol','PEN','S/.',NULL,NULL,NULL,NULL),(174,'PH','Phillipines','Republic of the Philippines','PHL','608','yes','63','.ph','Peso','PHP','₱',NULL,NULL,NULL,NULL),(175,'PN','Pitcairn','Pitcairn','PCN','612','no','NONE','.pn',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(176,'PL','Poland','Republic of Poland','POL','616','yes','48','.pl','Zloty','PLN','zł',NULL,NULL,NULL,NULL),(177,'PT','Portugal','Portuguese Republic','PRT','620','yes','351','.pt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(178,'PR','Puerto Rico','Commonwealth of Puerto Rico','PRI','630','no','1+939','.pr',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(179,'QA','Qatar','State of Qatar','QAT','634','yes','974','.qa','Riyal','QAR','﷼',NULL,NULL,NULL,NULL),(180,'RE','Reunion','R&eacute;union','REU','638','no','262','.re',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(181,'RO','Romania','Romania','ROU','642','yes','40','.ro','New Leu','RON','lei',NULL,NULL,NULL,NULL),(182,'RU','Russia','Russian Federation','RUS','643','yes','7','.ru','Ruble','RUB','руб',NULL,NULL,NULL,NULL),(183,'RW','Rwanda','Republic of Rwanda','RWA','646','yes','250','.rw',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(184,'BL','Saint Barthelemy','Saint Barth&eacute;lemy','BLM','652','no','590','.bl',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(185,'SH','Saint Helena','Saint Helena, Ascension and Tristan da Cunha','SHN','654','no','290','.sh','Pound','SHP','£',NULL,NULL,NULL,NULL),(186,'KN','Saint Kitts and Nevis','Federation of Saint Christopher and Nevis','KNA','659','yes','1+869','.kn',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(187,'LC','Saint Lucia','Saint Lucia','LCA','662','yes','1+758','.lc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(188,'MF','Saint Martin','Saint Martin','MAF','663','no','590','.mf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(189,'PM','Saint Pierre and Miquelon','Saint Pierre and Miquelon','SPM','666','no','508','.pm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(190,'VC','Saint Vincent and the Grenadines','Saint Vincent and the Grenadines','VCT','670','yes','1+784','.vc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(191,'WS','Samoa','Independent State of Samoa','WSM','882','yes','685','.ws',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(192,'SM','San Marino','Republic of San Marino','SMR','674','yes','378','.sm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(193,'ST','Sao Tome and Principe','Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe','STP','678','yes','239','.st',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(194,'SA','Saudi Arabia','Kingdom of Saudi Arabia','SAU','682','yes','966','.sa','Riyal','SAR','﷼',NULL,NULL,NULL,NULL),(195,'SN','Senegal','Republic of Senegal','SEN','686','yes','221','.sn',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(196,'RS','Serbia','Republic of Serbia','SRB','688','yes','381','.rs','Dinar','RSD','Дин.',NULL,NULL,NULL,NULL),(197,'SC','Seychelles','Republic of Seychelles','SYC','690','yes','248','.sc','Rupee','SCR','₨',NULL,NULL,NULL,NULL),(198,'SL','Sierra Leone','Republic of Sierra Leone','SLE','694','yes','232','.sl',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(199,'SG','Singapore','Republic of Singapore','SGP','702','yes','65','.sg','Dollar','SGD','$',NULL,NULL,NULL,NULL),(200,'SX','Sint Maarten','Sint Maarten','SXM','534','no','1+721','.sx',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(201,'SK','Slovakia','Slovak Republic','SVK','703','yes','421','.sk',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(202,'SI','Slovenia','Republic of Slovenia','SVN','705','yes','386','.si',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(203,'SB','Solomon Islands','Solomon Islands','SLB','090','yes','677','.sb','Dollar','SBD','$',NULL,NULL,NULL,NULL),(204,'SO','Somalia','Somali Republic','SOM','706','yes','252','.so','Shilling','SOS','S',NULL,NULL,NULL,NULL),(205,'ZA','South Africa','Republic of South Africa','ZAF','710','yes','27','.za','Rand','ZAR','R',NULL,NULL,NULL,NULL),(206,'GS','South Georgia and the South Sandwich Islands','South Georgia and the South Sandwich Islands','SGS','239','no','500','.gs',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(207,'KR','South Korea','Republic of Korea','KOR','410','yes','82','.kr','Won','KRW','₩',NULL,NULL,NULL,NULL),(208,'SS','South Sudan','Republic of South Sudan','SSD','728','yes','211','.ss',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(209,'ES','Spain','Kingdom of Spain','ESP','724','yes','34','.es',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(210,'LK','Sri Lanka','Democratic Socialist Republic of Sri Lanka','LKA','144','yes','94','.lk','Rupee','LKR','₨',NULL,NULL,NULL,NULL),(211,'SD','Sudan','Republic of the Sudan','SDN','729','yes','249','.sd',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(212,'SR','Suriname','Republic of Suriname','SUR','740','yes','597','.sr','Dollar','SRD','$',NULL,NULL,NULL,NULL),(213,'SJ','Svalbard and Jan Mayen','Svalbard and Jan Mayen','SJM','744','no','47','.sj',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(214,'SZ','Swaziland','Kingdom of Swaziland','SWZ','748','yes','268','.sz',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(215,'SE','Sweden','Kingdom of Sweden','SWE','752','yes','46','.se','Krona','SEK','kr',NULL,NULL,NULL,NULL),(216,'CH','Switzerland','Swiss Confederation','CHE','756','yes','41','.ch','Franc','CHF','CHF',NULL,NULL,NULL,NULL),(217,'SY','Syria','Syrian Arab Republic','SYR','760','yes','963','.sy','Pound','SYP','£',NULL,NULL,NULL,NULL),(218,'TW','Taiwan','Republic of China (Taiwan)','TWN','158','former','886','.tw','New Dollar','TWD','NT$',NULL,NULL,NULL,NULL),(219,'TJ','Tajikistan','Republic of Tajikistan','TJK','762','yes','992','.tj',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(220,'TZ','Tanzania','United Republic of Tanzania','TZA','834','yes','255','.tz',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(221,'TH','Thailand','Kingdom of Thailand','THA','764','yes','66','.th','Baht','THB','฿',NULL,NULL,NULL,NULL),(222,'TL','Timor-Leste (East Timor)','Democratic Republic of Timor-Leste','TLS','626','yes','670','.tl',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(223,'TG','Togo','Togolese Republic','TGO','768','yes','228','.tg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(224,'TK','Tokelau','Tokelau','TKL','772','no','690','.tk',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(225,'TO','Tonga','Kingdom of Tonga','TON','776','yes','676','.to',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(226,'TT','Trinidad and Tobago','Republic of Trinidad and Tobago','TTO','780','yes','1+868','.tt','Dollar','TTD','TT$',NULL,NULL,NULL,NULL),(227,'TN','Tunisia','Republic of Tunisia','TUN','788','yes','216','.tn',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(228,'TR','Turkey','Republic of Turkey','TUR','792','yes','90','.tr','Lira','TRL','₤',NULL,NULL,NULL,NULL),(229,'TM','Turkmenistan','Turkmenistan','TKM','795','yes','993','.tm',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(230,'TC','Turks and Caicos Islands','Turks and Caicos Islands','TCA','796','no','1+649','.tc',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(231,'TV','Tuvalu','Tuvalu','TUV','798','yes','688','.tv','Dollar','TVD','$',NULL,NULL,NULL,NULL),(232,'UG','Uganda','Republic of Uganda','UGA','800','yes','256','.ug',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(233,'UA','Ukraine','Ukraine','UKR','804','yes','380','.ua','Hryvnia','UAH','₴',NULL,NULL,NULL,NULL),(234,'AE','United Arab Emirates','United Arab Emirates','ARE','784','yes','971','.ae',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(235,'GB','United Kingdom','United Kingdom of Great Britain and Nothern Ireland','GBR','826','yes','44','.uk','Pound','GBP','£',NULL,NULL,NULL,NULL),(236,'US','United States','United States of America','USA','840','yes','1','.us','Dollar','USD','$',NULL,NULL,NULL,NULL),(237,'UM','United States Minor Outlying Islands','United States Minor Outlying Islands','UMI','581','no','NONE','NONE',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(238,'UY','Uruguay','Eastern Republic of Uruguay','URY','858','yes','598','.uy','Peso','UYU','$U',NULL,NULL,NULL,NULL),(239,'UZ','Uzbekistan','Republic of Uzbekistan','UZB','860','yes','998','.uz','Som','UZS','лв',NULL,NULL,NULL,NULL),(240,'VU','Vanuatu','Republic of Vanuatu','VUT','548','yes','678','.vu',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(241,'VA','Vatican City','State of the Vatican City','VAT','336','no','39','.va',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(242,'VE','Venezuela','Bolivarian Republic of Venezuela','VEN','862','yes','58','.ve','Bolivar','VEF','Bs',NULL,NULL,NULL,NULL),(243,'VN','Vietnam','Socialist Republic of Vietnam','VNM','704','yes','84','.vn','Dong','VND','₫',NULL,NULL,NULL,NULL),(244,'VG','Virgin Islands, British','British Virgin Islands','VGB','092','no','1+284','.vg',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(245,'VI','Virgin Islands, US','Virgin Islands of the United States','VIR','850','no','1+340','.vi',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(246,'WF','Wallis and Futuna','Wallis and Futuna','WLF','876','no','681','.wf',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(247,'EH','Western Sahara','Western Sahara','ESH','732','no','212','.eh',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(248,'YE','Yemen','Republic of Yemen','YEM','887','yes','967','.ye','Yemeni Rial	','YER','﷼',NULL,NULL,NULL,NULL),(249,'ZM','Zambia','Republic of Zambia','ZMB','894','yes','260','.zm','Zambian Kwacha','ZMW','ZK',NULL,NULL,NULL,NULL),(250,'ZW','Zimbabwe','Republic of Zimbabwe','ZWE','716','yes','263','.zw','Dollar','ZWD','Z$',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `shared_to` varchar(255) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(45) DEFAULT NULL,
  `file_ext` varchar(45) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_employee_id_idx` (`employee_id`),
  CONSTRAINT `doc_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_number` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `nick_name` varchar(45) DEFAULT NULL,
  `personal_email` varchar(45) DEFAULT NULL,
  `work_email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `skype` varchar(45) DEFAULT NULL,
  `websites` varchar(255) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `about_me` text,
  `mobile_phone` varchar(25) DEFAULT NULL,
  `home_phone` varchar(45) DEFAULT NULL,
  `work_phone` varchar(45) DEFAULT NULL,
  `marital` varchar(15) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `account_role` varchar(45) DEFAULT NULL,
  `unread_notif` tinyint(4) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `bank_name` varchar(45) DEFAULT NULL,
  `bank_account_number` varchar(45) DEFAULT NULL,
  `bank_holder_name` varchar(45) DEFAULT NULL,
  `bank_branch` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_employee_number_idx` (`emp_number`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'EMP0001',' Muhammad Aditia Rahman','aditia','aditia.rahman@outlook.com','adit@admin.com','WwePGp4Y+Fder1XEuHHjwr0e+sNSmil5TMD1hy2PDZkA7xVRQznc8ZlbbakbKBtISYMHEqshbsgzjY/qmJxvCQ==','2015-02-25','Situsari Wetan st no 37A bdg','Bandung','Marakas no 9','DKI Jakarta','Bangladesh','40265','Male','Bangladesh','1970-10-21','contract','myskypw.local','http://superdit.com',NULL,'edit: Since this answer has been getting a few upvotes lately, I really want to stress the comment I made earlier about understanding that a primary key colum is not meant as a column to sort by, because MySQL does not guarantee that higher, auto incremented, values are necessarily added at a later time. If you don\'t care about this, and simply need the record with a higher (or lower) id then this will suffice. Just don\'t use this as a means to determine whether a record is actually added later (or earlier). In stead, consider using a datetime column to sort by, for instance.','08192992389','022-78930221','13123','Married','Chief Chiefan',NULL,NULL,'2015-07-27 13:04:34',1,'assets/uploads/profile/EMP0001.jpg',NULL,'Administrator',0,'2015-10-03 20:27:41','Muamalat','12098802930','Mr Bolo bolo','Buahbatu'),(36,'XSA00212','Huseain Shuraim','HuseainXSA00212','','Huseain@Shuraim.com','g4FANbUDyZ73cLz5JysRaxe35SRrtIWVuMA1IkCZZzkrBmT+rL8n9sxOTjHpmsKD+nHlczoA3ypqpNJqS7U09g==','1909-08-12','','','','','Afghanistan','','Male','Afghanistan','0000-00-00','full-time','','',NULL,'Hello my name is Huseain Shuraim, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.','','','','Single','Employee','2015-06-28 03:46:50',NULL,'2015-08-14 13:11:35',1,'assets/uploads/profile/XSA00212.jpg',NULL,'Employee',2,NULL,'','','',''),(37,'XSA001','Mehmet Shcool','Mehmet',NULL,'mehmet@school.ci.hd','+tRiRfyOxtaTRHZOWh8tkeZcx4+ZYVF5yojPc3pPcqr5nYK5Y7bU/kmDtjnE29Yoxgi1vtrlDm7l8pZXCMd81A==','0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Afghanistan',NULL,'full-time','','',NULL,'Hello my name is Mehmet Shcool, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.',NULL,NULL,'',NULL,'Employee','2015-06-28 14:31:32',1,'2015-06-28 14:32:01',1,NULL,NULL,'Employee',0,NULL,NULL,NULL,NULL,NULL),(38,'XSA004','Testing LOLOL','TestingXSA004',NULL,'testing@test.com','xxsmITkz5pMPIvS1y3Dsy9u6hyWFxLVX/ktY4ykshFWCoMDDkvOqKce0FbvW+lt4vT1TG8W3llbOA9IrQeoVCA==',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'full-time',NULL,NULL,NULL,'Hello my name is Testing LOLOL, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.',NULL,NULL,NULL,NULL,'Employee','2015-06-28 15:23:02',1,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL),(39,'XSAD00010','Fifi fufu fefe','FifiXSAD00001',NULL,'fifi@ffif.com','BQQra9M5exh2rFftioR7y6H9wKUgfTerXV/gAVkj79TSEunyjyTRN60aUULCGcoCDNjv7dUPAMjstgmxtRB86g==',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'full-time',NULL,NULL,NULL,'Hello my name is Fifi fufu fefe, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.',NULL,NULL,NULL,NULL,'Employee','2015-07-22 17:00:57',1,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(40,'XSAD00011','Fifi fufu fefe','FifiXSAD00011',NULL,'fifi4@ffif.com','Q9MdOugh3l2s3+QJjBJNAnnbUBc2fV9bfTLb0axaVobMW/BeiiufEpnYkGbqbnMWFPs9XOs2d5hPjrLd4hk3Qg==',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'full-time',NULL,NULL,NULL,'Hello my name is Fifi fufu fefe, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.',NULL,NULL,NULL,NULL,'Employee','2015-07-22 17:16:48',1,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL),(41,'HRCO0001','Kopral Jono','KopralHRCO0001',NULL,'kopral@jono.com','wadvRTP9frp4xmgcS8oG7mLmVMI9H4JoU3GxpMf4M0J8CBoWOKo1FwPsTMutUPU/oCr/QC63wsJoMISZ5C3PPg==',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'full-time',NULL,NULL,NULL,'Hello my name is Kopral Jono, call me on my contact info for any office work (project, meeting, company event), I\'m available at office work time, nice to meet you and have a nice day.',NULL,NULL,NULL,NULL,'Employee','2015-08-31 09:54:12',1,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_attendance`
--

DROP TABLE IF EXISTS `employee_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `clock_in` datetime DEFAULT NULL,
  `clock_in_note` text,
  `clock_out` datetime DEFAULT NULL,
  `clock_out_note` text,
  `total_hours` varchar(20) DEFAULT NULL,
  `work_date` date DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attend_employee_id_idx` (`employee_id`),
  CONSTRAINT `attend_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_attendance`
--

LOCK TABLES `employee_attendance` WRITE;
/*!40000 ALTER TABLE `employee_attendance` DISABLE KEYS */;
INSERT INTO `employee_attendance` VALUES (12,1,'2015-07-22 15:57:47',NULL,NULL,NULL,NULL,NULL,NULL,'2015-07-22 15:57:47','1',NULL,NULL),(13,1,'2015-07-22 15:58:09',NULL,'2015-07-22 16:06:50',NULL,NULL,NULL,NULL,'2015-07-22 15:58:09','1','2015-07-22 16:06:50','1'),(14,1,'2015-07-22 16:12:15',NULL,'2015-07-22 16:12:21',NULL,NULL,NULL,NULL,'2015-07-22 16:12:15','1','2015-07-22 16:12:21','1'),(15,1,'2015-07-22 16:12:26',NULL,'2015-07-22 16:12:39',NULL,NULL,NULL,NULL,'2015-07-22 16:12:26','1','2015-07-22 16:12:39','1'),(16,1,'2015-07-22 16:12:45',NULL,'2015-07-22 16:12:48',NULL,NULL,NULL,NULL,'2015-07-22 16:12:45','1','2015-07-22 16:12:48','1'),(17,1,'2015-07-22 16:13:43',NULL,'2015-07-22 16:13:46',NULL,NULL,NULL,NULL,'2015-07-22 16:13:43','1','2015-07-22 16:13:46','1'),(18,1,'2015-07-22 16:13:50',NULL,'2015-07-22 16:13:54',NULL,NULL,NULL,NULL,'2015-07-22 16:13:50','1','2015-07-22 16:13:54','1'),(19,1,'2015-07-22 16:17:23',NULL,'2015-07-22 16:17:26',NULL,NULL,NULL,0,'2015-07-22 16:17:23','1','2015-07-22 16:17:26','1'),(20,1,'2015-07-22 16:17:28',NULL,'2015-07-22 16:17:31',NULL,NULL,NULL,0,'2015-07-22 16:17:28','1','2015-07-22 16:17:31','1'),(21,1,'2015-07-22 16:17:40',NULL,'2015-07-22 16:17:43',NULL,NULL,NULL,0,'2015-07-22 16:17:40','1','2015-07-22 16:17:43','1'),(22,1,'2015-07-22 17:26:46',NULL,'2015-07-22 17:26:49',NULL,NULL,NULL,0,'2015-07-22 17:26:46','1','2015-07-22 17:26:49','1'),(23,1,'2015-07-22 17:26:51',NULL,NULL,NULL,NULL,NULL,0,'2015-07-22 17:26:51','1',NULL,NULL),(24,1,'2015-07-23 16:44:40',NULL,'2015-07-23 16:44:54',NULL,NULL,NULL,0,'2015-07-23 16:44:40','1','2015-07-23 16:44:54','1'),(25,1,'2015-07-23 16:45:43',NULL,'2015-07-23 16:45:49',NULL,NULL,NULL,0,'2015-07-23 16:45:43','1','2015-07-23 16:45:49','1'),(26,1,'2015-07-23 18:43:51',NULL,NULL,NULL,NULL,NULL,0,'2015-07-23 18:43:51','1',NULL,NULL),(27,1,'2015-07-27 13:11:38',NULL,'2015-07-27 13:11:49',NULL,NULL,NULL,0,'2015-07-27 13:11:38','1','2015-07-27 13:11:49','1'),(28,1,'2015-08-08 16:00:14',NULL,NULL,NULL,NULL,NULL,0,'2015-08-08 16:00:14','1',NULL,NULL),(29,1,'2015-08-23 13:14:57',NULL,NULL,NULL,NULL,NULL,0,'2015-08-23 13:14:57','1',NULL,NULL),(30,1,'2015-08-24 14:29:03',NULL,NULL,NULL,NULL,NULL,NULL,'2015-08-24 14:29:03','1',NULL,NULL),(31,1,'2015-08-27 10:36:16',NULL,NULL,NULL,NULL,NULL,NULL,'2015-08-27 10:36:16','1',NULL,NULL),(32,1,'2015-08-28 09:51:23',NULL,'2015-08-28 00:00:00',NULL,NULL,NULL,NULL,'2015-08-28 09:51:23','1','2015-08-28 00:00:00','1'),(33,1,'2015-08-28 09:52:31',NULL,'2015-08-28 00:00:00',NULL,NULL,NULL,NULL,'2015-08-28 09:52:31','1','2015-08-28 00:00:00','1'),(34,1,'2015-08-28 09:56:10',NULL,'2015-08-28 09:56:14',NULL,NULL,NULL,NULL,'2015-08-28 09:56:10','1','2015-08-28 09:56:14','1'),(35,1,'2015-08-28 10:41:34',NULL,'2015-08-28 10:41:43',NULL,NULL,NULL,NULL,'2015-08-28 10:41:34','1','2015-08-28 10:41:43','1'),(36,1,'2015-08-29 08:16:40',NULL,'2015-08-30 21:17:42',NULL,'37h 1m',NULL,NULL,'2015-08-29 08:16:40','1','2015-08-30 21:17:42','1'),(37,1,'2015-08-30 08:10:46',NULL,'2015-08-30 21:20:23',NULL,'13h 9m',NULL,NULL,'2015-08-30 21:10:46','1','2015-08-30 21:20:23','1'),(38,1,'2015-08-31 09:34:16',NULL,'2015-08-31 10:27:04',NULL,'0h 52m',NULL,NULL,'2015-08-31 09:34:16','1','2015-08-31 10:27:04','1'),(39,1,'2015-09-13 18:32:42',NULL,NULL,NULL,NULL,NULL,NULL,'2015-09-13 18:32:42','1',NULL,NULL),(40,1,'2015-10-03 20:29:35',NULL,NULL,NULL,NULL,NULL,NULL,'2015-10-03 20:29:35','1',NULL,NULL);
/*!40000 ALTER TABLE `employee_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_business_trip`
--

DROP TABLE IF EXISTS `employee_business_trip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_business_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `depart_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `vehicle` varchar(45) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `crated_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id_idx` (`employee_id`),
  CONSTRAINT `business_trip_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_business_trip`
--

LOCK TABLES `employee_business_trip` WRITE;
/*!40000 ALTER TABLE `employee_business_trip` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_business_trip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_contracts`
--

DROP TABLE IF EXISTS `employee_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_contracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `note` text,
  `hire_date` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `available_timeoff` text COMMENT 'numeric for contract, json for fulltime ex: {"2011":10, "2012":15, "2013":20}',
  `type` varchar(45) DEFAULT NULL COMMENT 'contract / full-time',
  `is_expired` bit(1) DEFAULT b'0',
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contracts_employee_id_idx` (`employee_id`),
  CONSTRAINT `contracts_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_contracts`
--

LOCK TABLES `employee_contracts` WRITE;
/*!40000 ALTER TABLE `employee_contracts` DISABLE KEYS */;
INSERT INTO `employee_contracts` VALUES (1,36,NULL,NULL,NULL,'{\"2015\":9}','full-time','\0',NULL,'2015-06-28 03:46:50',NULL,NULL,NULL),(2,37,NULL,NULL,NULL,'{\"2015\":12}','full-time','\0',NULL,'2015-06-28 14:31:32',1,NULL,NULL),(3,38,NULL,NULL,NULL,'{\"2015\":12}','full-time','\0',NULL,'2015-06-28 01:23:02',1,NULL,NULL),(4,39,NULL,NULL,NULL,'{\"2015\":12}','full-time','\0',NULL,'2015-07-22 17:00:57',1,NULL,NULL),(5,40,NULL,NULL,NULL,'{\"2015\":12}','full-time','\0',NULL,'2015-07-22 17:16:48',1,NULL,NULL),(6,41,NULL,NULL,NULL,'{\"2015\":12}','full-time','\0',NULL,'2015-08-31 09:54:12',1,NULL,NULL);
/*!40000 ALTER TABLE `employee_contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_notifications`
--

DROP TABLE IF EXISTS `employee_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `time_off_id` int(11) DEFAULT NULL,
  `is_unread` bit(1) DEFAULT b'0',
  `message` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `test` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notif_timeoff_id_idx` (`time_off_id`),
  KEY `notif_employee_id_idx` (`employee_id`),
  CONSTRAINT `notif_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `notif_timeoff_id` FOREIGN KEY (`time_off_id`) REFERENCES `employee_time_off` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_notifications`
--

LOCK TABLES `employee_notifications` WRITE;
/*!40000 ALTER TABLE `employee_notifications` DISABLE KEYS */;
INSERT INTO `employee_notifications` VALUES (1,'time off',36,1,'\0','Time off request approved','2015-06-28 03:52:41',NULL,NULL),(2,'time off',38,2,'\0','Time off request approved','2015-06-28 01:32:02',NULL,NULL),(3,'time off',36,3,'\0','Time off request approved','2015-08-31 10:26:48',NULL,NULL);
/*!40000 ALTER TABLE `employee_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_resignation`
--

DROP TABLE IF EXISTS `employee_resignation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_resignation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id_resign_idx_idx` (`employee_id`),
  CONSTRAINT `emp_id_resign_idx` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_resignation`
--

LOCK TABLES `employee_resignation` WRITE;
/*!40000 ALTER TABLE `employee_resignation` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee_resignation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_salaries`
--

DROP TABLE IF EXISTS `employee_salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `paid` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empl_salaries_idx` (`employee_id`),
  CONSTRAINT `fk_empl_salaries` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_salaries`
--

LOCK TABLES `employee_salaries` WRITE;
/*!40000 ALTER TABLE `employee_salaries` DISABLE KEYS */;
INSERT INTO `employee_salaries` VALUES (1,1,'Basic Salary','IDR (Indonesia)',8000000,'hourly','',NULL,NULL,NULL,NULL,NULL),(2,1,'Bonus','IDR (Indonesia)',90000,'monthly','',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `employee_salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_time_off`
--

DROP TABLE IF EXISTS `employee_time_off`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_time_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `from_date` datetime DEFAULT NULL,
  `to_date` datetime DEFAULT NULL,
  `total_days` tinyint(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'waiting approval',
  `reason` varchar(50) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `reject_reason` varchar(255) DEFAULT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `approval_message` text,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `leave_employee_id_idx` (`employee_id`),
  KEY `time_off_approve_or_reject_by_id_idx` (`approved_by_id`),
  CONSTRAINT `time_off_approve_or_reject_by_id` FOREIGN KEY (`approved_by_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `time_off_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_time_off`
--

LOCK TABLES `employee_time_off` WRITE;
/*!40000 ALTER TABLE `employee_time_off` DISABLE KEYS */;
INSERT INTO `employee_time_off` VALUES (1,36,'2015-06-27 00:00:00','2015-06-30 23:59:00',2,'approved','Education','Mayday',NULL,NULL,NULL,NULL,'2015-06-28 03:52:06',NULL,NULL,NULL),(2,38,'2015-06-28 00:00:00','2015-06-28 23:59:00',0,'approved','Education','fffff',NULL,NULL,NULL,NULL,'2015-06-28 01:31:56',NULL,NULL,NULL),(3,36,'2015-08-31 00:00:00','2015-08-31 23:59:00',1,'approved','Education','',NULL,NULL,NULL,NULL,'2015-08-31 10:24:45',NULL,NULL,NULL);
/*!40000 ALTER TABLE `employee_time_off` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_documents`
--

DROP TABLE IF EXISTS `hr_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hr_folder_id` int(11) DEFAULT NULL,
  `shared_to` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(45) DEFAULT NULL,
  `file_ext` varchar(45) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hr_folder_id_idx` (`hr_folder_id`),
  CONSTRAINT `hr_folder_id` FOREIGN KEY (`hr_folder_id`) REFERENCES `hr_folder` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_documents`
--

LOCK TABLES `hr_documents` WRITE;
/*!40000 ALTER TABLE `hr_documents` DISABLE KEYS */;
INSERT INTO `hr_documents` VALUES (3,NULL,NULL,'140_Mobile_App_Dev_Path_WhitePaper.pdf','140_Mobile_App_Dev_Path_WhitePaper.pdf',NULL,148,'application/pdf','.pdf','assets/uploads/documents/140_Mobile_App_Dev_Path_WhitePaper.pdf','2015-07-21 07:22:18',NULL),(4,NULL,NULL,'21995_10153180740373260_2623444021709080147_n.jpg','21995_10153180740373260_2623444021709080147_n.jpg',NULL,49,'image/jpeg','.jpg','assets/uploads/documents/21995_10153180740373260_2623444021709080147_n.jpg','2015-07-21 07:22:18',NULL);
/*!40000 ALTER TABLE `hr_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_events`
--

DROP TABLE IF EXISTS `hr_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `note` text,
  `from_datetime` datetime DEFAULT NULL,
  `to_datetime` datetime DEFAULT NULL,
  `all_day` bit(1) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_events`
--

LOCK TABLES `hr_events` WRITE;
/*!40000 ALTER TABLE `hr_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_folder`
--

DROP TABLE IF EXISTS `hr_folder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_folder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `total_file` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `shared_to` varchar(255) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_folder`
--

LOCK TABLES `hr_folder` WRITE;
/*!40000 ALTER TABLE `hr_folder` DISABLE KEYS */;
/*!40000 ALTER TABLE `hr_folder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hr_settings`
--

DROP TABLE IF EXISTS `hr_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hr_settings` (
  `hr_key` varchar(100) NOT NULL,
  `hr_value` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hr_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hr_settings`
--

LOCK TABLES `hr_settings` WRITE;
/*!40000 ALTER TABLE `hr_settings` DISABLE KEYS */;
INSERT INTO `hr_settings` VALUES ('email_notif','no',NULL,NULL,'2015-08-31 09:36:07',1),('employee_number_code','HRCO',NULL,NULL,'2015-08-31 09:36:07',1),('employee_number_digit','4',NULL,NULL,'2015-08-31 09:36:07',1),('max_file_upload','10',NULL,NULL,'2015-08-31 09:36:07',1),('smtp_host','smtp.gmail.com',NULL,NULL,'2015-08-31 09:36:07',1),('smtp_password','mysmtppass',NULL,NULL,'2015-08-31 09:36:07',1),('smtp_port','467',NULL,NULL,'2015-08-31 09:36:07',1),('smtp_username','dohrm.smtp22',NULL,NULL,'2015-08-31 09:36:07',1),('timeoff_per_year','12',NULL,NULL,'2015-08-31 09:36:07',1),('timeoff_requested','0',NULL,NULL,'2015-08-31 10:26:31',NULL),('workweek','monday,tuesday,wednesday,thursday,friday',NULL,NULL,'2015-08-31 09:36:07',NULL),('work_hour_per_day','9',NULL,NULL,'2015-08-31 09:36:07',1);
/*!40000 ALTER TABLE `hr_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-09 14:35:00
