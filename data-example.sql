-- MySQL dump 10.13  Distrib 8.0.39, for Win64 (x86_64)
--
-- Host: localhost    Database: lokalaundry
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booking_machines`
--

DROP TABLE IF EXISTS `booking_machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking_machines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint unsigned NOT NULL,
  `machine_id` bigint unsigned NOT NULL,
  `price` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_machines_booking_id_foreign` (`booking_id`),
  KEY `booking_machines_machine_id_foreign` (`machine_id`),
  CONSTRAINT `booking_machines_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE,
  CONSTRAINT `booking_machines_machine_id_foreign` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_machines`
--

LOCK TABLES `booking_machines` WRITE;
/*!40000 ALTER TABLE `booking_machines` DISABLE KEYS */;
INSERT INTO `booking_machines` VALUES (17,11,1,8000,'2025-06-28 09:33:23','2025-06-28 09:33:23'),(18,11,4,20000,'2025-06-28 09:33:23','2025-06-28 09:33:23'),(19,12,1,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(20,12,4,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(21,13,7,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(22,13,9,14000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(23,14,11,14000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(24,14,12,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(25,15,5,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(26,15,6,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(27,16,8,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(28,16,10,14000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(29,17,13,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(30,18,15,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(31,18,16,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(32,19,19,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(33,19,20,14000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(34,20,17,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(35,20,18,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(36,21,2,8000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(37,21,3,14000,'2025-06-28 09:36:19','2025-06-28 09:36:19'),(38,21,4,20000,'2025-06-28 09:36:19','2025-06-28 09:36:19');
/*!40000 ALTER TABLE `booking_machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `outlet_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `session_start` time NOT NULL,
  `session_end` time NOT NULL,
  `subtotal` bigint unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookings_code_unique` (`code`),
  KEY `bookings_user_id_foreign` (`user_id`),
  KEY `bookings_outlet_id_foreign` (`outlet_id`),
  CONSTRAINT `bookings_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (11,1,1,'2025-06-28','16:00:00','16:55:00',28000,'B1-685fb6e3ba521','2025-06-28 09:33:23','2025-06-28 09:33:23'),(12,2,1,'2025-06-27','10:00:00','10:55:00',28000,'B1-685fb7e1a001','2025-06-28 09:35:53','2025-06-28 09:35:53'),(13,3,2,'2025-06-26','14:00:00','14:55:00',22000,'B2-685fb7e1a002','2025-06-28 09:35:53','2025-06-28 09:35:53'),(14,4,3,'2025-06-25','09:00:00','09:55:00',34000,'B3-685fb7e1a003','2025-06-28 09:35:53','2025-06-28 09:35:53'),(15,5,4,'2025-06-24','16:00:00','16:55:00',28000,'B4-685fb7e1a004','2025-06-28 09:35:53','2025-06-28 09:35:53'),(16,6,5,'2025-06-23','11:00:00','11:55:00',34000,'B5-685fb7e1a005','2025-06-28 09:35:53','2025-06-28 09:35:53'),(17,7,6,'2025-06-22','13:00:00','13:55:00',20000,'B6-685fb7e1a006','2025-06-28 09:35:53','2025-06-28 09:35:53'),(18,8,7,'2025-06-21','17:00:00','17:55:00',28000,'B7-685fb7e1a007','2025-06-28 09:35:53','2025-06-28 09:35:53'),(19,9,8,'2025-06-20','15:00:00','15:55:00',22000,'B8-685fb7e1a008','2025-06-28 09:35:53','2025-06-28 09:35:53'),(20,10,9,'2025-06-19','12:00:00','12:55:00',28000,'B9-685fb7e1a009','2025-06-28 09:35:53','2025-06-28 09:35:53'),(21,11,1,'2025-06-18','18:00:00','18:55:00',34000,'B1-685fb7e1a010','2025-06-28 09:35:53','2025-06-28 09:35:53');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('lokalaundry_cache_356a192b7913b04c54574d18c28d46e6395428ab','i:2;',1751100653),('lokalaundry_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1751100653;',1751100653),('lokalaundry_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3','i:1;',1751100161),('lokalaundry_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1751100161;',1751100161);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_product_id_foreign` (`product_id`),
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedbacks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedbacks_user_id_foreign` (`user_id`),
  CONSTRAINT `feedbacks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,2,'Pelayanannya cepat dan mesinnya bersih banget, mantap!','2025-06-28 09:26:12','2025-06-28 09:26:12'),(2,3,'Aplikasi mudah digunakan, cuma tolong tambah metode pembayaran.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(3,4,'Mesinnya bagus tapi tempatnya agak panas.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(4,5,'Fitur booking mesinnya keren, sangat membantu!','2025-06-28 09:26:12','2025-06-28 09:26:12'),(5,6,'Customer service-nya ramah banget, top deh.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(6,7,'Tolong ditambah mesin pengering ya, kadang antri lama.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(7,8,'Harga cucinya terjangkau, cocok buat anak kos.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(8,9,'Kualitas cuciannya bersih dan wangi, recommended!','2025-06-28 09:26:12','2025-06-28 09:26:12'),(9,10,'Saran aja, bikin fitur notifikasi kalo mesin udah selesai.','2025-06-28 09:26:12','2025-06-28 09:26:12'),(10,11,'Bagus, tapi kadang aplikasinya agak lemot.','2025-06-28 09:26:12','2025-06-28 09:26:12');
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_types`
--

DROP TABLE IF EXISTS `machine_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('w','d') COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int DEFAULT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_types`
--

LOCK TABLES `machine_types` WRITE;
/*!40000 ALTER TABLE `machine_types` DISABLE KEYS */;
INSERT INTO `machine_types` VALUES (1,'Mesin Cuci Maks. 10kg','w',10,8000,'2025-06-28 05:39:20','2025-06-28 05:39:20'),(2,'Mesin Cuci Maks. 16kg','w',16,14000,'2025-06-28 05:39:20','2025-06-28 05:39:20'),(3,'Mesin Cuci Maks. 33kg','w',33,20000,'2025-06-28 05:39:20','2025-06-28 05:39:20'),(4,'Pengering','d',NULL,20000,'2025-06-28 05:39:20','2025-06-28 05:39:20');
/*!40000 ALTER TABLE `machine_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `outlet_id` bigint unsigned NOT NULL,
  `machine_type_id` bigint unsigned NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('available','maintenance') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `machines_outlet_id_foreign` (`outlet_id`),
  KEY `machines_machine_type_id_foreign` (`machine_type_id`),
  CONSTRAINT `machines_machine_type_id_foreign` FOREIGN KEY (`machine_type_id`) REFERENCES `machine_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `machines_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machines`
--

LOCK TABLES `machines` WRITE;
/*!40000 ALTER TABLE `machines` DISABLE KEYS */;
INSERT INTO `machines` VALUES (1,1,1,'W-01','available','2025-06-28 09:00:34','2025-06-28 09:00:34'),(2,1,1,'W-02','available','2025-06-28 09:00:46','2025-06-28 09:00:46'),(3,1,2,'W-03','available','2025-06-28 09:00:57','2025-06-28 09:00:57'),(4,1,4,'D-01','available','2025-06-28 09:01:10','2025-06-28 09:01:10'),(5,1,4,'D-02','available','2025-06-28 09:01:20','2025-06-28 09:01:20'),(6,1,4,'D-03','available','2025-06-28 09:03:54','2025-06-28 09:03:54'),(7,2,1,'W-01','available','2025-06-28 09:05:08','2025-06-28 09:05:08'),(8,2,1,'W-02','available','2025-06-28 09:05:20','2025-06-28 09:05:20'),(9,2,2,'W-03','available','2025-06-28 09:05:32','2025-06-28 09:05:32'),(10,2,2,'W-04','available','2025-06-28 09:05:45','2025-06-28 09:05:45'),(11,2,4,'D-01','available','2025-06-28 09:06:04','2025-06-28 09:06:04'),(12,2,4,'D-02','available','2025-06-28 09:06:13','2025-06-28 09:06:13'),(13,1,1,'W-04','available','2025-06-28 09:10:56','2025-06-28 09:10:56'),(14,1,1,'W-05','available','2025-06-28 09:10:56','2025-06-28 09:10:56'),(15,1,2,'W-06','available','2025-06-28 09:10:56','2025-06-28 09:10:56'),(16,1,4,'D-04','available','2025-06-28 09:10:56','2025-06-28 09:10:56'),(17,2,3,'W-05','available','2025-06-28 09:11:40','2025-06-28 09:11:40'),(18,2,4,'D-03','available','2025-06-28 09:11:40','2025-06-28 09:11:40'),(19,3,1,'W-01','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(20,3,1,'W-02','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(21,3,1,'W-03','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(22,3,2,'W-04','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(23,3,2,'W-05','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(24,3,3,'W-06','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(25,3,4,'D-01','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(26,3,4,'D-02','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(27,3,4,'D-03','available','2025-06-28 09:11:47','2025-06-28 09:11:47'),(28,4,1,'W-01','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(29,4,1,'W-02','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(30,4,2,'W-03','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(31,4,3,'W-04','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(32,4,4,'D-01','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(33,4,4,'D-02','available','2025-06-28 09:11:53','2025-06-28 09:11:53'),(34,5,1,'W-01','available','2025-06-28 09:12:02','2025-06-28 09:12:02'),(35,5,2,'W-02','available','2025-06-28 09:12:02','2025-06-28 09:12:02'),(36,5,4,'D-01','available','2025-06-28 09:12:02','2025-06-28 09:12:02'),(37,6,1,'W-01','available','2025-06-28 09:12:07','2025-06-28 09:12:07'),(38,6,1,'W-02','available','2025-06-28 09:12:07','2025-06-28 09:12:07'),(39,6,2,'W-03','available','2025-06-28 09:12:07','2025-06-28 09:12:07'),(40,6,4,'D-01','available','2025-06-28 09:12:07','2025-06-28 09:12:07'),(41,6,4,'D-02','available','2025-06-28 09:12:07','2025-06-28 09:12:07'),(42,7,1,'W-01','available','2025-06-28 09:12:17','2025-06-28 09:12:17'),(43,7,2,'W-02','available','2025-06-28 09:12:17','2025-06-28 09:12:17'),(44,7,4,'D-01','available','2025-06-28 09:12:17','2025-06-28 09:12:17'),(45,8,1,'W-01','available','2025-06-28 09:12:21','2025-06-28 09:12:21'),(46,8,1,'W-02','available','2025-06-28 09:12:21','2025-06-28 09:12:21'),(47,8,1,'W-03','available','2025-06-28 09:12:21','2025-06-28 09:12:21'),(48,8,2,'W-04','available','2025-06-28 09:12:21','2025-06-28 09:12:21'),(49,8,2,'W-05','available','2025-06-28 09:12:21','2025-06-28 09:12:21'),(50,8,3,'W-06','available','2025-06-28 09:12:22','2025-06-28 09:12:22'),(51,8,4,'D-01','available','2025-06-28 09:12:22','2025-06-28 09:12:22'),(52,8,4,'D-02','available','2025-06-28 09:12:22','2025-06-28 09:12:22'),(53,8,4,'D-03','available','2025-06-28 09:12:22','2025-06-28 09:12:22'),(54,9,1,'W-01','available','2025-06-28 09:12:26','2025-06-28 09:12:26'),(55,9,1,'W-02','available','2025-06-28 09:12:26','2025-06-28 09:12:26'),(56,9,2,'W-03','available','2025-06-28 09:12:26','2025-06-28 09:12:26'),(57,9,3,'W-04','available','2025-06-28 09:12:26','2025-06-28 09:12:26'),(58,9,4,'D-01','available','2025-06-28 09:12:26','2025-06-28 09:12:26'),(59,9,4,'D-02','available','2025-06-28 09:12:26','2025-06-28 09:12:26');
/*!40000 ALTER TABLE `machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_06_22_010428_create_feedbacks_table',1),(5,'2025_06_22_113949_create_outlets_table',1),(6,'2025_06_22_182119_create_products_table',1),(7,'2025_06_22_185100_create_carts_table',1),(8,'2025_06_22_222519_create_wallets_table',1),(9,'2025_06_24_174100_create_machine_types_table',1),(10,'2025_06_24_174213_create_machines_table',1),(11,'2025_06_24_174714_create_bookings_table',1),(12,'2025_06_24_175036_create_booking_machines_table',1),(13,'2025_06_25_161312_create_product_transactions_table',1),(14,'2025_06_25_161516_create_product_transaction_items_table',1),(15,'2025_06_26_113106_create_top_ups_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outlets`
--

DROP TABLE IF EXISTS `outlets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outlets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_duration` int NOT NULL DEFAULT '55',
  `session_gap` int NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `outlets_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outlets`
--

LOCK TABLES `outlets` WRITE;
/*!40000 ALTER TABLE `outlets` DISABLE KEYS */;
INSERT INTO `outlets` VALUES (1,'lokaLaundry Ciputat','Jl. Ir. H. Juanda No. 50, Ciputat, Tangerang Selatan','Tangerang Selatan','81234567890',55,5,'2025-06-28 08:54:09','2025-06-28 09:00:14'),(2,'lokaLaundry Depok','Jl. Margonda Raya No. 101','Depok','85799991234',55,5,'2025-06-28 08:55:21','2025-06-28 08:55:21'),(3,'lokaLaundry Kemang','Jl. Kemang Raya No. 15','Jakarta','81235467890',55,5,'2025-06-28 08:55:56','2025-06-28 08:55:56'),(4,'lokaLaundry Tebet','Jl. Tebet Barat IV No. 22','Jakarta','82155667788',55,5,'2025-06-28 08:56:42','2025-06-28 08:56:42'),(5,'lokaLaundry margonda','Jl. Margonda Raya No. 200','Depok','81312345678',25,5,'2025-06-28 08:57:22','2025-06-28 08:57:22'),(6,'lokaLaundry Bandung Timur','Jl. Soekarno-Hatta No. 88','Bandung','89655554444',55,5,'2025-06-28 08:57:54','2025-06-28 08:57:54'),(7,'lokaLaundry Dago','Jl. Ir. H. Juanda No. 45','Bandung','82233337777',25,5,'2025-06-28 08:58:25','2025-06-28 08:58:25'),(8,'lokaLaundry BSD','Jl. BSD Boulevard No. 55','Tangerang Selatan','85678901234',55,5,'2025-06-28 08:59:07','2025-06-28 08:59:07'),(9,'lokaLaundry Serpong','Jl. Pahlawan Seribu No. 77','Tangerang Selatan','87712345678',55,5,'2025-06-28 08:59:32','2025-06-28 08:59:32');
/*!40000 ALTER TABLE `outlets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_transaction_items`
--

DROP TABLE IF EXISTS `product_transaction_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_transaction_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_transaction_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_transaction_items_product_transaction_id_foreign` (`product_transaction_id`),
  KEY `product_transaction_items_product_id_foreign` (`product_id`),
  CONSTRAINT `product_transaction_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_transaction_items_product_transaction_id_foreign` FOREIGN KEY (`product_transaction_id`) REFERENCES `product_transactions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_transaction_items`
--

LOCK TABLES `product_transaction_items` WRITE;
/*!40000 ALTER TABLE `product_transaction_items` DISABLE KEYS */;
INSERT INTO `product_transaction_items` VALUES (1,1,1,1,3000,'2025-06-28 09:37:27','2025-06-28 09:37:27'),(2,1,2,1,1000,'2025-06-28 09:37:27','2025-06-28 09:37:27'),(21,2,1,1,3000,'2025-06-27 09:44:29','2025-06-27 09:44:29'),(22,2,2,2,1000,'2025-06-27 09:44:29','2025-06-27 09:44:29'),(23,3,3,1,5000,'2025-06-26 09:44:29','2025-06-26 09:44:29'),(24,3,4,1,3000,'2025-06-26 09:44:29','2025-06-26 09:44:29'),(25,4,1,2,3000,'2025-06-25 09:44:29','2025-06-25 09:44:29'),(26,4,2,4,1000,'2025-06-25 09:44:29','2025-06-25 09:44:29'),(27,5,4,1,3000,'2025-06-24 09:44:29','2025-06-24 09:44:29'),(28,6,3,1,5000,'2025-06-23 09:44:29','2025-06-23 09:44:29'),(29,6,1,2,3000,'2025-06-23 09:44:29','2025-06-23 09:44:29'),(30,7,2,3,1000,'2025-06-22 09:44:29','2025-06-22 09:44:29'),(31,7,4,1,3000,'2025-06-22 09:44:29','2025-06-22 09:44:29'),(32,8,1,1,3000,'2025-06-21 09:44:29','2025-06-21 09:44:29'),(33,8,2,1,1000,'2025-06-21 09:44:29','2025-06-21 09:44:29'),(34,9,3,1,5000,'2025-06-20 09:44:29','2025-06-20 09:44:29'),(35,9,4,2,1000,'2025-06-20 09:44:29','2025-06-20 09:44:29'),(36,10,4,1,3000,'2025-06-19 09:44:29','2025-06-19 09:44:29'),(37,11,1,1,3000,'2025-06-18 09:44:29','2025-06-18 09:44:29'),(38,11,3,1,5000,'2025-06-18 09:44:29','2025-06-18 09:44:29');
/*!40000 ALTER TABLE `product_transaction_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_transactions`
--

DROP TABLE IF EXISTS `product_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `subtotal` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_transactions_code_unique` (`code`),
  KEY `product_transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `product_transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_transactions`
--

LOCK TABLES `product_transactions` WRITE;
/*!40000 ALTER TABLE `product_transactions` DISABLE KEYS */;
INSERT INTO `product_transactions` VALUES (1,'685fb7d70857c',1,4000,0,'2025-06-28 09:37:27','2025-06-28 09:37:27'),(2,'685fb8e1a001',2,5000,1,'2025-06-27 09:44:26','2025-06-27 09:44:26'),(3,'685fb8e1a002',3,8000,1,'2025-06-26 09:44:26','2025-06-26 09:44:26'),(4,'685fb8e1a003',4,10000,1,'2025-06-25 09:44:26','2025-06-28 09:44:52'),(5,'685fb8e1a004',5,3000,1,'2025-06-24 09:44:26','2025-06-24 09:44:26'),(6,'685fb8e1a005',6,9000,0,'2025-06-23 09:44:26','2025-06-23 09:44:26'),(7,'685fb8e1a006',7,6000,1,'2025-06-22 09:44:26','2025-06-22 09:44:26'),(8,'685fb8e1a007',8,4000,1,'2025-06-21 09:44:26','2025-06-21 09:44:26'),(9,'685fb8e1a008',9,7000,0,'2025-06-20 09:44:26','2025-06-20 09:44:26'),(10,'685fb8e1a009',10,3000,1,'2025-06-19 09:44:26','2025-06-19 09:44:26'),(11,'685fb8e1a010',11,8000,1,'2025-06-18 09:44:26','2025-06-18 09:44:26');
/*!40000 ALTER TABLE `product_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Molto Sachet 40ml',3000,'product_image/01JYTVJQPWP15SYG7YPJ7N3605.png','2025-06-28 08:48:34','2025-06-28 08:48:34'),(2,'Pewangi Rinso 40ml',1000,'product_image/01JYTVKY4RVYRHX0EV8V7EPJ8G.png','2025-06-28 08:49:13','2025-06-28 08:49:13'),(3,'Tas Tenteng',5000,'product_image/01JYTVN9T0AWNW18C313ERM4NT.png','2025-06-28 08:49:58','2025-06-28 08:49:58'),(4,'Tas Plastik',3000,'product_image/01JYTVNWYGGKPZC6QC7GM0SFZX.png','2025-06-28 08:50:17','2025-06-28 08:50:17');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('S8J563iiVJz3ugkGP0NmLbNhIju1YtFN1NYm3Tmq',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMXJiYkluWnhhZ3VreFhOSFRpa1pLT2xjdmo5U0Vma25FczhxZ1ViYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0LXRyYW5zYWN0aW9ucy80Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJDRyS2pTdFVKSjFILmZTMDNMTy5KSGV3dlpMNnl1Tlh4ZXRYYVRsaEVVMjVuZXliZjlCRDh5IjtzOjg6ImZpbGFtZW50IjthOjA6e319',1751103897);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top_ups`
--

DROP TABLE IF EXISTS `top_ups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `top_ups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `amount` bigint unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `top_ups_order_id_unique` (`order_id`),
  KEY `top_ups_user_id_foreign` (`user_id`),
  CONSTRAINT `top_ups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top_ups`
--

LOCK TABLES `top_ups` WRITE;
/*!40000 ALTER TABLE `top_ups` DISABLE KEYS */;
/*!40000 ALTER TABLE `top_ups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@lokalaundry.com','Admin lokaLaundry','81234567890',NULL,'$2y$12$4rKjStUJJ1H.fS03LO.JHewvZL6yuNXxetXaTlhEU25neybf9BD8y','2025-06-28 05:39:20',1,NULL,'2025-06-28 05:39:20','2025-06-28 05:39:20'),(2,'rafi@example.com','Rafi Hidayat','82134567890',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(3,'salsa@example.com','Salsa Putri','81298765432',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(4,'ilham@example.com','Ilham Ramadhan','82112233445',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(5,'aisyah@example.com','Aisyah Nurul','82199988877',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(6,'bima@example.com','Bima Pratama','83812345678',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(7,'nina@example.com','Nina Amelia','81278945612',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(8,'dimas@example.com','Dimas Saputra','83867894561',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(9,'linda@example.com','Linda Marlina','82234567891',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(10,'yusuf@example.com','Yusuf Maulana','81212345678',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(11,'farah@example.com','Farah Nabila','82334567890',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(12,'reza@example.com','Reza Firmansyah','83823456789',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(13,'tari@example.com','Tari Ayu','81334567891',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(14,'adit@example.com','Adit Permana','82345678912',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(15,'fiona@example.com','Fiona Syifa','81245678912',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6','2025-06-28 09:22:31',0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31'),(16,'zaki@example.com','Zaki Maulana','82356789123',NULL,'$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9aHjX1K1H1G/k7l99Kf3C6',NULL,0,NULL,'2025-06-28 09:22:31','2025-06-28 09:22:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `balance` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallets_user_id_foreign` (`user_id`),
  CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES (1,1,968000,'2025-06-28 05:39:20','2025-06-28 09:37:27'),(17,2,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(18,3,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(19,4,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(20,5,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(21,6,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(22,7,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(23,8,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(24,9,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(25,10,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(26,11,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(27,12,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(28,13,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(29,14,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(30,15,0,'2025-06-28 09:22:36','2025-06-28 09:22:36'),(31,16,0,'2025-06-28 09:22:36','2025-06-28 09:22:36');
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-28 16:47:22
