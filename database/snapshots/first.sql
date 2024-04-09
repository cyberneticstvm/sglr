
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
DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_04_06_103528_create_questions_table',2),(5,'2024_04_06_111304_create_question_details_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `question_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint(20) unsigned NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_details_question_id_foreign` (`question_id`),
  CONSTRAINT `question_details_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `question_details` WRITE;
/*!40000 ALTER TABLE `question_details` DISABLE KEYS */;
INSERT INTO `question_details` VALUES (1,8,'Adequacy and design of septic tank should conform to IS:2470(BIS) Checklist for Septic Tank',NULL,NULL),(2,8,'Is the Septic tank completely watertight?',NULL,NULL),(3,8,'Are the risers watertight with no visible leaks?',NULL,NULL),(4,8,'Are the risers free of cracks or visible damage?',NULL,NULL),(5,8,'Is the tank free of strong, overpowering odour?',NULL,NULL),(6,8,'Where is the liquid level in the tank?\r\n<ul>\r\n<li>At the base of the outlet pipe</li>\r\n<li>Above</li>\r\n<li>Below</li>\r\n</ul>',NULL,NULL),(7,8,'Can you clearly see the baffles above the scum layer?',NULL,NULL),(8,8,'Is the scum layer well below lid opening?',NULL,NULL),(9,8,'Are baffles free of clogs and leaks around the seals?',NULL,NULL),(10,8,'Is it connected to a dedicated soak pit?',NULL,NULL),(11,10,'Adequacy and design of Sewage treatment plant should conform to IS:2470(BIS)',NULL,NULL),(12,10,'The sewerage system should be at a safe distance away from drinking water supply utilities.',NULL,NULL),(13,12,'Periodic cleaning of clogs, drains etc. of septic tank and sewer lins to ensure functionality',NULL,NULL),(14,12,'Regular maintenance of STP',NULL,NULL),(15,12,'Visual cleanliness of toilets',NULL,NULL),(16,13,'Proper construction of STP and properly designed septic tank (i.e., the tank is watertight and with baffles – partition walls, its outlet is connected to a dedicated soak pit)',NULL,NULL),(17,13,'Periodic cleaning and desludging of septic tanks through mechanical means',NULL,NULL),(18,13,'Visual cleanliness of the entity (interiors/campus)',NULL,NULL),(19,14,'Any innovative toilet construction method adopted with safely managed sludge',NULL,NULL),(20,14,'Innovation in septic tank construction to combat space constraint, etc.',NULL,NULL),(21,14,'Innovation in the maintenance of toilet and septic tank/ on-site decentralised STP',NULL,NULL),(22,14,'Any innovation to make toilet unit disaster resilient including flood proofing measures , use of limited water in flushing etc.',NULL,NULL),(23,15,'In all rooms, public spaces, common areas like garages, parking, staff quarters, etc.',NULL,NULL),(24,16,'For biodegradable waste natural / mechanical composting infrastructure such as drum composters or Narayan Devrao\r\nPandripande method (NADEP), etc. available as per the quantity of the waste OR a biogas unit',NULL,NULL),(25,16,'Disposal of garden waste especially leaves waste',NULL,NULL),(26,19,'Linkage with large waste processing unit for disposal of such wastes',NULL,NULL),(27,19,'Linkage with e-waste processing unit for disposal of e-waste',NULL,NULL),(28,21,'No indiscriminate dumping/ pilling/ littering of waste outside',NULL,NULL),(29,21,'Complete prohibition of burning of any kind of waste (except for sanitary waste in incinerator)',NULL,NULL),(30,24,'Discourage use of single-use plastics',NULL,NULL),(31,24,'Proper segregation of waste',NULL,NULL),(32,24,'No indiscriminate dumping/ piling or burning of waste',NULL,NULL),(33,24,'Safe menstruation hygiene practices',NULL,NULL),(34,24,'Cleanliness of surroundings (interior/campus)',NULL,NULL),(35,30,'Reduce laundry loads by encouraging multiple use of towels',NULL,NULL),(36,30,'Promote reuse and recharge of water',NULL,NULL),(37,30,'Promote water conservation and avoid water logging conditions',NULL,NULL),(38,25,'Promotion of alternatives of single-use plastic',NULL,NULL),(39,31,'Any innovative method displayed in the facility for management of greywater (wastewater from bathroom etc.)',NULL,NULL),(40,31,'Innovation in the reuse of treated greywater within the facility',NULL,NULL),(41,31,'Promotion of zero liquid discharge (ZLD) measures',NULL,NULL);
/*!40000 ALTER TABLE `question_details` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `management` varchar(255) DEFAULT NULL,
  `infrastructure` varchar(255) DEFAULT NULL,
  `facility` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `indicator` text DEFAULT NULL,
  `question_group` smallint(6) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `mark` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-active, 0-inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Faecal Sludge Management','Infrastructure','Toilet Facility','Improved sanitation facilities, i.e., toilets for human excreta management','Functional flush /pour flush type toilets available in the premises/facility',1,'Adequacy (every room, common areas, servants quarter etc.)',4,1,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,'Functional flush /pour flush type toilets available in the premises/facility',2,'Quality standards (ambience or settings)',4,1,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,'Functionality of toilets',3,'Functional toilets facility is available for men, women and differently abled persons as per the need (Functional refers to regular cleaning, odourless etc.)',8,1,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,3,'Toilets facility is available for men, women and differently abled but not regularly/properly maintained',6,1,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,3,'Toilet facility is available for men, women and differently abled persons but not functional',0,1,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,3,'Functional toilet facility is available for men and women but not for differently abled persons',4,1,NULL,NULL,NULL),(7,NULL,NULL,NULL,'Containment Type','Type of containment unit and how excreta are treated and disposed of in situ or off-site.',4,'Single-pit type toilets available in the premises/ facility',-8,1,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,4,'Properly designed septic tank, i.e., the tank is watertight and with baffles (partition walls) is available in the premises/facility. Its outlet is connected to a dedicated soak pit.',22,1,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,4,'Mechanical desludging of septic tank is done regularly, and sludge treatment is ensured as per standards/guidelines',10,1,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,4,'Excreta transported through a sewer and then treated off-site (through STP)',32,1,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,4,'Properly designed and maintained decentralised STP in the premises of the facility',32,1,NULL,NULL,NULL),(12,NULL,'Practices',NULL,NULL,'Maintenance and pollution control measures of containment units',5,'The effluent from the septic tank is NOT connected to open/storm water drains and not discharged in open or storm water drains.\r\n',8,1,NULL,NULL,NULL),(13,NULL,'Awareness generation',NULL,NULL,'Type of toilets',6,'The entity creates awareness by way of posters/wall writing/ paintings or models',8,1,NULL,NULL,NULL),(14,NULL,'Innovations',NULL,'Innovation in Faecal Sludge Management','Innovation in toilet units and septic treatment units',7,NULL,16,1,NULL,NULL,NULL),(15,'Solid waste management','Infrastructure',NULL,'Segregation','Segregation of solid waste at source',8,'Garbage bins/ containers/ buckets (blue and green) of appropriate size for source segregation and instructions for disposal of sanitary/menstrual waste available',18,1,NULL,NULL,NULL),(16,NULL,NULL,NULL,'Treatment / disposal of waste','Treatment / disposal of solid waste',9,NULL,10,1,NULL,NULL,NULL),(17,NULL,NULL,NULL,NULL,'Treatment/disposal of other waste generated like biomedical waste, mattresses, rubber, metals, e-waste, consumables etc.',10,'Menstrual waste is handled scientifically (separate bin) and provisioning of incinerator for treatment/forward linkages with incinerator for disposal of sanitary waste',6,1,NULL,NULL,NULL),(18,NULL,NULL,NULL,NULL,NULL,11,'Plastic waste is segregated and sent to Plastic Waste Management Unit/ cement factories/any sustainable forward linkages',8,1,NULL,NULL,NULL),(19,NULL,NULL,NULL,NULL,NULL,12,NULL,6,1,NULL,NULL,NULL),(20,NULL,'Practices',NULL,'Treatment / disposal of waste','Treatment / disposal of waste',13,'The waste other than wet/dry waste like biomedical medical waste and e-waste should be segregated and handled separately as per the norms',2,1,NULL,NULL,NULL),(21,NULL,NULL,NULL,NULL,NULL,14,NULL,2,1,NULL,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL,15,'Promotion of alternatives to single-use plastic like glass bottles',2,1,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL,16,'Payment of user charges imposed by Gram Panchayat/private entity, regularly (payment by the hotel)',2,1,NULL,NULL,NULL),(24,NULL,'Awareness generation',NULL,'Awareness generation','Environmental concern',17,'The entity creates awareness by way of posters/ wall writing / paintings or models',8,1,NULL,NULL,NULL),(25,NULL,'Innovations',NULL,'Innovations','Innovation in solid waste management',18,'Any unique practices that improve management of either biodegradable waste or nonbiodegradable waste and sanitary waste.',16,1,NULL,NULL,NULL),(26,'Greywater management','Infrastructure',NULL,'Treatment / disposal of greywater (In areas without sewer system)','On-site management of greywater',19,'Space is available and structures like soak pit, leach pit, kitchen garden, etc. are constructed based on the quantity of the greywater',16,1,NULL,NULL,NULL),(27,NULL,NULL,NULL,NULL,NULL,20,'Measures to avoid water stagnation/ logging if required through drainage system/rainwater harvesting/pump set/soak pit etc.',8,1,NULL,NULL,NULL),(28,NULL,'Practices',NULL,'Separation','Separation of black and greywater',21,'Greywater is not mixed with blackwater (water containing human excreta) except in the case of piped sewer systems',2,1,NULL,NULL,NULL),(29,NULL,NULL,NULL,'Recycling','Recycling of treated water',22,'Recycling of wastewater from washing/ cleaning for use in nonpotable purpose, i.e., landscaping and flushing',2,1,NULL,NULL,NULL),(30,NULL,'Awareness generation','','Awareness generation','Environmental conservation',23,'The entity creates awareness by way of posters/wall writing/paintings or models.',4,1,NULL,NULL,NULL),(31,NULL,'Innovations',NULL,'Innovations','Innovations in greywater management',24,NULL,8,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('g0nc87IMzcacA7jAjngw6OblfBd30rVD0Nn96D7s',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiemkzeThaeXB0WFYzTUZveVhST1ExUVFMNUY1aktIS3hDSWhBUEtPOSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=',1712395875);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-active, 0-inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin','mail@cybernetics.me','9188848860','2024-04-06 03:32:44','$2y$12$Xp49GZIvfp4PGZ6kCcokhu58uXCej5i.Hu3RiKeYQOCOdb3icQG2u','Administrator',1,'WxZqhhpy7peaWPFyaiFC9vf7qdPBQW8v7BrMiBu0Nl2rqYHSJLTxskntjxcg','2024-04-06 03:32:44','2024-04-06 03:32:44',NULL);
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

