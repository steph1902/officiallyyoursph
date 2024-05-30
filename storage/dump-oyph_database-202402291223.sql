-- MySQL dump 10.13  Distrib 5.7.43, for osx10.19 (x86_64)
--
-- Host: localhost    Database: oyph_database
-- ------------------------------------------------------
-- Server version	8.3.0

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
-- Table structure for table `color_variants`
--

DROP TABLE IF EXISTS `color_variants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color_variants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `code` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color_variants`
--

LOCK TABLES `color_variants` WRITE;
/*!40000 ALTER TABLE `color_variants` DISABLE KEYS */;
INSERT INTO `color_variants` VALUES (1,1,'Black','n/a','n/a',NULL,NULL),(2,1,'Red','n/a','n/a',NULL,NULL),(3,1,'White','n/a','n/a',NULL,NULL),(4,2,'Black','n/a','n/a',NULL,NULL),(5,2,'Blue','n/a','n/a',NULL,NULL),(6,2,'Carnation Pink','n/a','n/a',NULL,NULL),(7,2,'Coral Pink','n/a','n/a',NULL,NULL),(8,2,'Red','n/a','n/a',NULL,NULL),(9,2,'White','n/a','n/a',NULL,NULL),(10,3,'Black','n/a','n/a',NULL,NULL),(11,4,'Black/White','n/a','n/a',NULL,NULL),(12,5,'Red','n/a','n/a',NULL,NULL),(13,6,'White','n/a','n/a',NULL,NULL),(14,7,'Soft Pink','n/a','n/a',NULL,NULL),(15,8,'Pink','n/a','n/a',NULL,NULL),(16,9,'Beige','n/a','n/a',NULL,NULL),(17,10,'Pink','n/a','n/a',NULL,NULL),(18,10,'White','n/a','n/a',NULL,NULL),(19,11,'Blue','n/a','n/a',NULL,NULL),(20,11,'White','n/a','n/a',NULL,NULL);
/*!40000 ALTER TABLE `color_variants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `instagram_embeds`
--

DROP TABLE IF EXISTS `instagram_embeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instagram_embeds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `embed_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instagram_embeds`
--

LOCK TABLES `instagram_embeds` WRITE;
/*!40000 ALTER TABLE `instagram_embeds` DISABLE KEYS */;
INSERT INTO `instagram_embeds` VALUES (1,'<blockquote class=\"instagram-media\" data-instgrm-permalink=\"https://www.instagram.com/p/C3fCC0dPb7-/?utm_source=ig_embed&amp;utm_campaign=loading\" data-instgrm-version=\"14\" style=\" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);\"><div style=\"padding:16px;\"> <a href=\"https://www.instagram.com/p/C3fCC0dPb7-/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;\" target=\"_blank\"> <div style=\" display: flex; flex-direction: row; align-items: center;\"> <div style=\"background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;\"></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;\"></div></div></div><div style=\"padding: 19% 0;\"></div> <div style=\"display:block; height:50px; margin:0 auto 12px; width:50px;\"><svg width=\"50px\" height=\"50px\" viewBox=\"0 0 60 60\" version=\"1.1\" xmlns=\"https://www.w3.org/2000/svg\" xmlns:xlink=\"https://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><g transform=\"translate(-511.000000, -20.000000)\" fill=\"#000000\"><g><path d=\"M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631\"></path></g></g></g></svg></div><div style=\"padding-top: 8px;\"> <div style=\" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;\">View this post on Instagram</div></div><div style=\"padding: 12.5% 0;\"></div> <div style=\"display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;\"><div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);\"></div> <div style=\"background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;\"></div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);\"></div></div><div style=\"margin-left: 8px;\"> <div style=\" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;\"></div> <div style=\" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)\"></div></div><div style=\"margin-left: auto;\"> <div style=\" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);\"></div> <div style=\" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);\"></div> <div style=\" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);\"></div></div></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;\"></div></div></a><p style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;\"><a href=\"https://www.instagram.com/p/C3fCC0dPb7-/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;\" target=\"_blank\">A post shared by Officially Yours | Designer Dress RTW Philippines (@officiallyyours.ph)</a></p></div></blockquote> <script async src=\"//www.instagram.com/embed.js\"></script>','2024-02-28 11:47:19','2024-02-28 11:47:19'),(2,'<blockquote class=\"instagram-media\" data-instgrm-permalink=\"https://www.instagram.com/p/C3KXm2oPfZV/?utm_source=ig_embed&amp;utm_campaign=loading\" data-instgrm-version=\"14\" style=\" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);\"><div style=\"padding:16px;\"> <a href=\"https://www.instagram.com/p/C3KXm2oPfZV/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;\" target=\"_blank\"> <div style=\" display: flex; flex-direction: row; align-items: center;\"> <div style=\"background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;\"></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;\"></div></div></div><div style=\"padding: 19% 0;\"></div> <div style=\"display:block; height:50px; margin:0 auto 12px; width:50px;\"><svg width=\"50px\" height=\"50px\" viewBox=\"0 0 60 60\" version=\"1.1\" xmlns=\"https://www.w3.org/2000/svg\" xmlns:xlink=\"https://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><g transform=\"translate(-511.000000, -20.000000)\" fill=\"#000000\"><g><path d=\"M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631\"></path></g></g></g></svg></div><div style=\"padding-top: 8px;\"> <div style=\" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;\">View this post on Instagram</div></div><div style=\"padding: 12.5% 0;\"></div> <div style=\"display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;\"><div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);\"></div> <div style=\"background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;\"></div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);\"></div></div><div style=\"margin-left: 8px;\"> <div style=\" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;\"></div> <div style=\" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)\"></div></div><div style=\"margin-left: auto;\"> <div style=\" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);\"></div> <div style=\" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);\"></div> <div style=\" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);\"></div></div></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;\"></div></div></a><p style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;\"><a href=\"https://www.instagram.com/p/C3KXm2oPfZV/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;\" target=\"_blank\">A post shared by Officially Yours | Designer Dress RTW Philippines (@officiallyyours.ph)</a></p></div></blockquote> <script async src=\"//www.instagram.com/embed.js\"></script>','2024-02-28 11:48:38','2024-02-28 11:48:38'),(3,'<blockquote class=\"instagram-media\" data-instgrm-permalink=\"https://www.instagram.com/p/C3CpJY5v8J0/?utm_source=ig_embed&amp;utm_campaign=loading\" data-instgrm-version=\"14\" style=\" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);\"><div style=\"padding:16px;\"> <a href=\"https://www.instagram.com/p/C3CpJY5v8J0/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;\" target=\"_blank\"> <div style=\" display: flex; flex-direction: row; align-items: center;\"> <div style=\"background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;\"></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;\"></div></div></div><div style=\"padding: 19% 0;\"></div> <div style=\"display:block; height:50px; margin:0 auto 12px; width:50px;\"><svg width=\"50px\" height=\"50px\" viewBox=\"0 0 60 60\" version=\"1.1\" xmlns=\"https://www.w3.org/2000/svg\" xmlns:xlink=\"https://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><g transform=\"translate(-511.000000, -20.000000)\" fill=\"#000000\"><g><path d=\"M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631\"></path></g></g></g></svg></div><div style=\"padding-top: 8px;\"> <div style=\" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;\">View this post on Instagram</div></div><div style=\"padding: 12.5% 0;\"></div> <div style=\"display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;\"><div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);\"></div> <div style=\"background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;\"></div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);\"></div></div><div style=\"margin-left: 8px;\"> <div style=\" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;\"></div> <div style=\" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)\"></div></div><div style=\"margin-left: auto;\"> <div style=\" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);\"></div> <div style=\" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);\"></div> <div style=\" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);\"></div></div></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;\"></div></div></a><p style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;\"><a href=\"https://www.instagram.com/p/C3CpJY5v8J0/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;\" target=\"_blank\">A post shared by Officially Yours | Designer Dress RTW Philippines (@officiallyyours.ph)</a></p></div></blockquote> <script async src=\"//www.instagram.com/embed.js\"></script>','2024-02-28 12:09:06','2024-02-28 12:09:06'),(4,'<blockquote class=\"instagram-media\" data-instgrm-permalink=\"https://www.instagram.com/p/C2zPqsayFxX/?utm_source=ig_embed&amp;utm_campaign=loading\" data-instgrm-version=\"14\" style=\" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);\"><div style=\"padding:16px;\"> <a href=\"https://www.instagram.com/p/C2zPqsayFxX/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;\" target=\"_blank\"> <div style=\" display: flex; flex-direction: row; align-items: center;\"> <div style=\"background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;\"></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;\"></div></div></div><div style=\"padding: 19% 0;\"></div> <div style=\"display:block; height:50px; margin:0 auto 12px; width:50px;\"><svg width=\"50px\" height=\"50px\" viewBox=\"0 0 60 60\" version=\"1.1\" xmlns=\"https://www.w3.org/2000/svg\" xmlns:xlink=\"https://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><g transform=\"translate(-511.000000, -20.000000)\" fill=\"#000000\"><g><path d=\"M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631\"></path></g></g></g></svg></div><div style=\"padding-top: 8px;\"> <div style=\" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;\">View this post on Instagram</div></div><div style=\"padding: 12.5% 0;\"></div> <div style=\"display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;\"><div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);\"></div> <div style=\"background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;\"></div> <div style=\"background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);\"></div></div><div style=\"margin-left: 8px;\"> <div style=\" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;\"></div> <div style=\" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)\"></div></div><div style=\"margin-left: auto;\"> <div style=\" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);\"></div> <div style=\" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);\"></div> <div style=\" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);\"></div></div></div> <div style=\"display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;\"> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;\"></div> <div style=\" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;\"></div></div></a><p style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;\"><a href=\"https://www.instagram.com/p/C2zPqsayFxX/?utm_source=ig_embed&amp;utm_campaign=loading\" style=\" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;\" target=\"_blank\">A post shared by Officially Yours | Designer Dress RTW Philippines (@officiallyyours.ph)</a></p></div></blockquote> <script async src=\"//www.instagram.com/embed.js\"></script>','2024-02-28 12:11:05','2024-02-28 12:11:05');
/*!40000 ALTER TABLE `instagram_embeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_02_28_113850_create_instagram_embeds_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_color_variants_id` int DEFAULT NULL,
  `image_path` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'Alfe Studio/Black/image6.jpeg',NULL,NULL),(2,1,'Alfe Studio/Black/image7.jpeg',NULL,NULL),(3,1,'Alfe Studio/Black/image8.jpeg',NULL,NULL),(4,2,'Alfe Studio/Red/image0.jpeg',NULL,NULL),(5,2,'Alfe Studio/Red/image1.jpeg',NULL,NULL),(6,2,'Alfe Studio/Red/image2.jpeg',NULL,NULL),(7,3,'Alfe Studio/White/image0.jpeg',NULL,NULL),(8,3,'Alfe Studio/White/image1.jpeg',NULL,NULL),(9,3,'Alfe Studio/White/image2.jpeg',NULL,NULL),(10,4,'Kleita Official/Rose Ruffle Dress/Black/1.jpg',NULL,NULL),(11,4,'Kleita Official/Rose Ruffle Dress/Black/2.jpg',NULL,NULL),(12,4,'Kleita Official/Rose Ruffle Dress/Black/3.jpg',NULL,NULL),(13,4,'Kleita Official/Rose Ruffle Dress/Black/4.jpg',NULL,NULL),(14,4,'Kleita Official/Rose Ruffle Dress/Black/5.jpg',NULL,NULL),(15,4,'Kleita Official/Rose Ruffle Dress/Black/6.jpg',NULL,NULL),(16,4,'Kleita Official/Rose Ruffle Dress/Black/7.jpg',NULL,NULL),(17,4,'Kleita Official/Rose Ruffle Dress/Black/8.jpg',NULL,NULL),(18,5,'Kleita Official/Rose Ruffle Dress/Blue/1.jpg',NULL,NULL),(19,5,'Kleita Official/Rose Ruffle Dress/Blue/2.jpg',NULL,NULL),(20,5,'Kleita Official/Rose Ruffle Dress/Blue/3.jpg',NULL,NULL),(21,5,'Kleita Official/Rose Ruffle Dress/Blue/4.jpg',NULL,NULL),(22,5,'Kleita Official/Rose Ruffle Dress/Blue/5.jpg',NULL,NULL),(23,5,'Kleita Official/Rose Ruffle Dress/Blue/6.jpg',NULL,NULL),(24,5,'Kleita Official/Rose Ruffle Dress/Blue/7.jpg',NULL,NULL),(25,5,'Kleita Official/Rose Ruffle Dress/Blue/8.jpg',NULL,NULL),(26,5,'Kleita Official/Rose Ruffle Dress/Blue/9.jpg',NULL,NULL),(27,5,'Kleita Official/Rose Ruffle Dress/Blue/10.jpg',NULL,NULL),(28,6,'Kleita Official/Rose Ruffle Dress/Carnation Pink/1.jpg',NULL,NULL),(29,6,'Kleita Official/Rose Ruffle Dress/Carnation Pink/2.jpg',NULL,NULL),(30,7,'Kleita Official/Rose Ruffle Dress/Coral Pink/1.jpg',NULL,NULL),(31,8,'Kleita Official/Rose Ruffle Dress/Red/1.jpg',NULL,NULL),(32,8,'Kleita Official/Rose Ruffle Dress/Red/2.jpg',NULL,NULL),(33,8,'Kleita Official/Rose Ruffle Dress/Red/3.jpg',NULL,NULL),(34,8,'Kleita Official/Rose Ruffle Dress/Red/4.jpg',NULL,NULL),(35,8,'Kleita Official/Rose Ruffle Dress/Red/5.jpg',NULL,NULL),(36,8,'Kleita Official/Rose Ruffle Dress/Red/6.jpg',NULL,NULL),(37,8,'Kleita Official/Rose Ruffle Dress/Red/7.jpg',NULL,NULL),(38,9,'Kleita Official/Rose Ruffle Dress/White/1.jpg',NULL,NULL),(39,9,'Kleita Official/Rose Ruffle Dress/White/2.jpg',NULL,NULL),(40,10,'Kleita Official/Sasha Dress/Photo/1.jpg',NULL,NULL),(41,10,'Kleita Official/Sasha Dress/Photo/2.jpg',NULL,NULL),(42,10,'Kleita Official/Sasha Dress/Photo/3.jpg',NULL,NULL),(43,10,'Kleita Official/Sasha Dress/Photo/4.jpg',NULL,NULL),(44,10,'Kleita Official/Sasha Dress/Photo/5.jpg',NULL,NULL),(45,10,'Kleita Official/Sasha Dress/Photo/6.jpg',NULL,NULL),(46,10,'Kleita Official/Sasha Dress/Photo/7.jpg',NULL,NULL),(47,10,'Kleita Official/Sasha Dress/Photo/8.jpg',NULL,NULL),(48,10,'Kleita Official/Sasha Dress/Photo/9.jpg',NULL,NULL),(49,10,'Kleita Official/Sasha Dress/Photo/10.jpg',NULL,NULL),(50,10,'Kleita Official/Sasha Dress/Photo/11.jpg',NULL,NULL),(51,10,'Kleita Official/Sasha Dress/Photo/12.jpg',NULL,NULL),(52,10,'Kleita Official/Sasha Dress/Photo/13.jpg',NULL,NULL),(53,10,'Kleita Official/Sasha Dress/Photo/14.jpg',NULL,NULL),(54,10,'Kleita Official/Sasha Dress/Photo/15.jpg',NULL,NULL),(55,10,'Kleita Official/Sasha Dress/Photo/16.jpg',NULL,NULL),(56,10,'Kleita Official/Sasha Dress/Photo/17.jpg',NULL,NULL),(57,10,'Kleita Official/Sasha Dress/Photo/18.jpg',NULL,NULL),(58,10,'Kleita Official/Sasha Dress/Photo/19.jpg',NULL,NULL),(59,10,'Kleita Official/Sasha Dress/Photo/20.jpg',NULL,NULL),(60,11,'Kleita Official/Moet Dress/Photo/1.jpg',NULL,NULL),(61,11,'Kleita Official/Moet Dress/Photo/2.jpg',NULL,NULL),(62,11,'Kleita Official/Moet Dress/Photo/3.jpg',NULL,NULL),(63,11,'Kleita Official/Moet Dress/Photo/4.jpg',NULL,NULL),(64,11,'Kleita Official/Moet Dress/Photo/5.jpg',NULL,NULL),(65,11,'Kleita Official/Moet Dress/Photo/6.jpg',NULL,NULL),(66,12,'Cara Woman/ALAIA DRESS/1.jpg',NULL,NULL),(67,12,'Cara Woman/ALAIA DRESS/2.jpg',NULL,NULL),(68,12,'Cara Woman/ALAIA DRESS/3.jpg',NULL,NULL),(69,12,'Cara Woman/ALAIA DRESS/4.jpg',NULL,NULL),(70,13,'Cara Woman/AUBREY DRESS/1.jpg',NULL,NULL),(71,13,'Cara Woman/AUBREY DRESS/2.jpg',NULL,NULL),(72,13,'Cara Woman/AUBREY DRESS/3.jpg',NULL,NULL),(73,13,'Cara Woman/AUBREY DRESS/4.jpg',NULL,NULL),(74,13,'Cara Woman/AUBREY DRESS/5.jpg',NULL,NULL),(75,14,'Cara Woman/AUBREY DRESS/6.jpg',NULL,NULL),(76,14,'Cara Woman/CARRIE DRESS/1.jpg',NULL,NULL),(77,14,'Cara Woman/CARRIE DRESS/2.jpg',NULL,NULL),(78,14,'Cara Woman/CARRIE DRESS/3.jpg',NULL,NULL),(79,15,'Cara Woman/KLARA DRESS/Pink/1.jpg',NULL,NULL),(80,15,'Cara Woman/KLARA DRESS/Pink/2.jpg',NULL,NULL),(81,15,'Cara Woman/KLARA DRESS/Pink/3.jpg',NULL,NULL),(82,16,'Cara Woman/LIBI DRESS/1.jpg',NULL,NULL),(83,16,'Cara Woman/LIBI DRESS/2.jpg',NULL,NULL),(84,16,'Cara Woman/LIBI DRESS/3.jpg',NULL,NULL),(85,17,'Cara Woman/MILAN DRESS/Pink/1.jpg',NULL,NULL),(86,17,'Cara Woman/MILAN DRESS/Pink/2.jpg',NULL,NULL),(87,17,'Cara Woman/MILAN DRESS/Pink/3.jpg',NULL,NULL),(88,18,'Cara Woman/MILAN DRESS/White/1.jpg',NULL,NULL),(89,18,'Cara Woman/MILAN DRESS/White/2.jpg',NULL,NULL),(90,18,'Cara Woman/MILAN DRESS/White/3.jpg',NULL,NULL),(91,18,'Cara Woman/MILAN DRESS/White/4.jpg',NULL,NULL),(92,18,'Cara Woman/MILAN DRESS/White/5.jpg',NULL,NULL),(93,18,'Cara Woman/MILAN DRESS/White/6.jpg',NULL,NULL),(94,18,'Cara Woman/MILAN DRESS/White/7.jpg',NULL,NULL),(95,18,'Cara Woman/MILAN DRESS/White/8.jpg',NULL,NULL),(96,19,'Cara Woman/ZURICH DRESS/Blue/1.jpg',NULL,NULL),(97,19,'Cara Woman/ZURICH DRESS/Blue/2.jpg',NULL,NULL),(98,19,'Cara Woman/ZURICH DRESS/Blue/3.jpg',NULL,NULL),(99,20,'Cara Woman/ZURICH DRESS/White/1.jpg',NULL,NULL),(100,20,'Cara Woman/ZURICH DRESS/White/2.jpg',NULL,NULL),(101,20,'Cara Woman/ZURICH DRESS/White/3.jpg',NULL,NULL),(102,20,'Cara Woman/ZURICH DRESS/White/4.jpg',NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `price` int DEFAULT NULL,
  `product_image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `category` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `brand` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Adeline Dress','n/a',3900,'Alfe Studio/White/1.jpeg','Dress','Alfe Studio','Active',NULL,NULL),(2,'Rose Ruffle Dress','Introducing our Limited Edition dress, a brand new addition to our collection. Crafted from high-quality Chiffon, this timeless piece features delicate flare and rose-like flower details, adding a touch of romance to any occasion. With a modest slit on the skirt\'s side, it strikes the perfect balance between sophistication and allure. Made with non-see-through material, this dress combines elegance with practicality, making it ideal for various events.',4000,'Kleita Official/Rose Ruffle Dress/Black/1.jpg','Dress','Kleita Official','Active',NULL,NULL),(3,'Sasha Dress','Introducing our latest Limited Edition dress - a stylish and versatile addition to our collection. This elegant piece features a sophisticated slit on the right thigh and delicate tulle ruching from the chest to the waist, adding a touch of timeless charm. Complete with a zipper opening at the back and elastic detailing on the back waistband, this jet black dress offers both style and comfort. Crafted from high-quality material, it ensures durability and exceptional quality. Don\'t miss out - order yours today!',3750,'Kleita Official/Sasha Dress/Photo/1.jpg','Dress','Kleita Official','Active',NULL,NULL),(4,'Moet Dress','Introducing our latest Limited Edition dress - the Moet One Shoulder Dress, a luxurious and timeless addition to our collection. Perfect for party events, this exquisite piece features puffy sleeves and dramatic organza detailing on the shoulders, making it the focal point of attention. With elastic on the back shoulder for a tailored fit and a zipper opening, this dress offers both style and comfort. Complete with slit details on the sides for ease of movement, it is crafted from high-quality jet black and organza material, ensuring durability and exceptional quality. Don\'t miss out on this stunning piece - order now before it\'s gone!',3500,'Kleita Official/Moet Dress/Photo/1.jpg','Dress','Kleita Official','Active',NULL,NULL),(5,'Alaia Dress','Composition & Care:\nCrafted from soft Tulle and Moscrepe fabrics, this dress offers both elegance and comfort. For best results, dry cleaning is recommended. Alternatively, if hand washing is necessary, please use a gentle detergent with similar colors and handle with care. Steam ironing at low heat is advised to maintain the fabric\'s integrity and smooth appearance.',3750,'Cara Woman/ALAIA DRESS/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(6,'Aubrey Dress','Composition & Care:\nCrafted from organza fabric, this garment requires delicate care. We recommend gentle hand washing using a mild detergent with similar colors. To maintain the fabric\'s integrity and smoothness, steam ironing at normal heat is advised.',3300,'Cara Woman/AUBREY DRESS/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(7,'Carrie Dress','Composition & Care:\nMade from chiffon fabric, this garment requires gentle care. We recommend hand washing with a delicate detergent using similar colors. To preserve the fabric\'s quality and appearance, steam ironing at normal heat is recommended.',3450,'Cara Woman/CARRIE DRESS/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(8,'Klara Dress','Bring out your sweet romantic side in the Klara Dress. This dress features a one-shoulder silhouette adorned with charming bow details on the shoulder and a subtle side slit. Designed for a slim fit, it comes with a convenient zip closure on the side.\n\nComposition & Care:\nCrafted from scuba fabric, this dress requires gentle care to maintain its quality. We recommend hand washing with a delicate detergent and similar colors. For best results, steam iron at normal heat to keep the fabric looking fresh and elegant.',3100,'Cara Woman/KLARA DRESS/Pink/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(9,'Libi Dress','Composition & Care:\nCrafted from organza fabric, this garment requires delicate care. We recommend gentle hand washing using a mild detergent with similar colors. To maintain the fabric\'s integrity and smoothness, steam ironing at normal heat is advised.',3450,'Cara Woman/LIBI DRESS/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(10,'Milan Dress','Composition & Care:\nCrafted from soft tulle fabric, this garment requires delicate care. We recommend gentle hand washing using a mild detergent with similar colors. To maintain the fabric\'s integrity and smoothness, steam ironing at normal heat is advised.',3800,'Cara Woman/MILAN DRESS/White/1.jpg','Dress','Cara Woman','Active',NULL,NULL),(11,'Zurich Dress','Composition & Care:\n\nCrafted from organza fabric, this garment requires delicate care. We recommend gentle hand washing using a mild detergent with similar colors. To maintain the fabric\'s integrity and smoothness, steam ironing at normal heat is advised.\n\nFor the Duchess Ivory material, dry cleaning is recommended to preserve its quality. However, if necessary, a gentle hand wash with delicate detergent and similar colors is acceptable. Steam ironing at low heat is advisable to ensure the fabric retains its elegance.',3350,'Cara Woman/ZURICH DRESS/White/1.jpg','Dress','Cara Woman','Active',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_chart`
--

DROP TABLE IF EXISTS `size_chart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size_chart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `size_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_chart`
--

LOCK TABLES `size_chart` WRITE;
/*!40000 ALTER TABLE `size_chart` DISABLE KEYS */;
INSERT INTO `size_chart` VALUES (1,1,'S'),(2,1,'M'),(3,1,'L'),(4,2,'XS'),(5,2,'S'),(6,2,'M'),(7,2,'L'),(8,3,'XS'),(9,3,'S'),(10,3,'M'),(11,3,'L'),(12,4,'XS'),(13,4,'S'),(14,4,'M'),(15,4,'L'),(16,5,'XS-S'),(17,5,'M-L'),(18,6,'S'),(19,6,'M'),(20,6,'L'),(21,7,'S'),(22,7,'M'),(23,7,'L'),(24,8,'S'),(25,8,'M'),(26,8,'L'),(27,9,'S'),(28,9,'M'),(29,9,'L'),(30,10,'XS'),(31,10,'S'),(32,10,'M'),(33,10,'L'),(34,11,'S'),(35,11,'M'),(36,11,'L');
/*!40000 ALTER TABLE `size_chart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_details`
--

DROP TABLE IF EXISTS `size_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_size_chart` int DEFAULT NULL,
  `bust` varchar(200) DEFAULT NULL,
  `waist` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hips` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `length` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `side_slit_length` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_details`
--

LOCK TABLES `size_details` WRITE;
/*!40000 ALTER TABLE `size_details` DISABLE KEYS */;
INSERT INTO `size_details` VALUES (1,1,'84','68','94','105','n/a'),(2,2,'88','72','98','106','n/a'),(3,3,'92','76','102','107','n/a'),(4,4,'82','64','92','70/129','n/a'),(5,5,'86','68','96','70/129','n/a'),(6,6,'90','72','100','70/129','n/a'),(7,7,'96','78','106','70/129','n/a'),(8,8,'82','64','92','122','n/a'),(9,9,'86','68','96','122','n/a'),(10,10,'90','72','100','122','n/a'),(11,11,'96','78','106','122','n/a'),(12,12,'82','64','92','105','n/a'),(13,13,'86','68','96','105','n/a'),(14,14,'90','72','100','105','n/a'),(15,15,'96','78','106','105','n/a'),(16,16,'88','n/a','n/a','100','n/a'),(17,17,'100','n/a','n/a','120','n/a'),(18,18,'84','70','90','105','n/a'),(19,19,'88','74','94','105','n/a'),(20,20,'92','78','100','105','n/a'),(21,21,'84','70','90','128','n/a'),(22,22,'88','74','94','128','n/a'),(23,23,'92','78','100','128','n/a'),(24,24,'84','70','90','128','n/a'),(25,25,'88','74','94','128','n/a'),(26,26,'92','78','100','128','n/a'),(27,27,'84','n/a','n/a','120','n/a'),(28,28,'88','n/a','n/a','120','n/a'),(29,29,'92','n/a','n/a','120','n/a'),(30,30,'80','66','86','100','n/a'),(31,31,'84','70','90','100','n/a'),(32,32,'88','74','94','100','n/a'),(33,33,'92','78','100','100','n/a'),(34,34,'84','70','90','105','n/a'),(35,35,'88','74','94','105','n/a'),(36,36,'92','78','100','105','n/a');
/*!40000 ALTER TABLE `size_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'oyph_database'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-29 12:23:57
