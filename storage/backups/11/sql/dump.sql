
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
DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fields` json DEFAULT NULL,
  `template_id` bigint unsigned NOT NULL,
  `block_id` bigint unsigned DEFAULT NULL,
  `blockable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blockable_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '1',
  `is_general` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `blocks_template_id_foreign` (`template_id`),
  KEY `blocks_block_id_foreign` (`block_id`),
  KEY `blocks_blockable_type_blockable_id_index` (`blockable_type`,`blockable_id`),
  CONSTRAINT `blocks_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blocks_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'{\"Image\": \"blocks/1/pexels-eprism-studio-108171-335257.jpg\", \"Title\": \"Top block title\", \"Button\": {\"link\": \"1\", \"name\": null}, \"Description\": null}',2,NULL,'App\\Models\\Page',1,'2024-09-22 11:03:44','2024-10-24 20:07:09',1,0,0),(2,'{\"Image\": \"blocks/2/pexels-laryssa-suaid-798122-1667071.jpg\", \"Title\": \"AboutUs block title\", \"Button\": {\"link\": \"1\", \"name\": \"Go to about us\"}, \"Description\": \"qwertyuiopasdfghjk\"}',4,NULL,'App\\Models\\Page',1,'2024-09-22 11:11:52','2024-10-24 20:07:09',1,1,0),(4,'{\"Image\": \"blocks/4/ProductAdi.jpg\", \"Title\": \"Kurwa Bober\", \"Button\": {\"link\": \"/about-us\", \"name\": \"Perdolone\"}, \"Description\": \"Kurwa Bober Kurwa Bober Kurwa Bober Kurwa Bober Kurwa Bober Kurwa Bober\"}',2,NULL,'App\\Models\\Page',2,'2024-10-01 05:57:34','2024-10-07 12:40:09',1,0,0),(6,'{\"Image\": \"blocks/6/leather-shoes-2661249_640.jpg\", \"Title\": \"Veritas Wow\", \"Button\": {\"link\": \"/\", \"name\": \"Start now!\"}, \"Description\": \"Any Class/Any Race: Choose from a unique array of races tailored for an immersive World of Warcraft experience on this private server.\\r\\n5x XP Rates: Level up faster with increased experience rates on our WotLK private server.\\r\\nConfigurable Racials: Pick your own racial abilities to personalize your character like never before in Wrath of the Lich King.\\r\\nScaling Raids:  All raids scale to accommodate smaller groups (Naxx scales 10M to 5M and 25M to 10M), ensuring a true WoW experience.\\r\\nImproved Graphics and Spell Effects: Dive into a visually stunning Warcraft world with enhanced visuals and spell animations.\\r\\nOptional Hardcore Mode: Face the ultimate challenge with unique rewards for those who triumph in this WotLK private server.\\r\\nSolo-able Dungeons: Tackle dungeons on your own without the need for a group, perfect for solo World of Warcraft adventurers.\\r\\nEasy to Use Launcher and Updater: Seamlessly launch and update your game with our user-friendly tools, making your Wrath of the Lich King experience smoother than ever.\"}',4,NULL,'App\\Models\\Page',2,'2024-10-01 06:03:17','2024-10-07 12:40:09',1,12,0),(8,'{\"Title\": \"World of Warcraft\", \"Description\": \"World of Warcraft® and Blizzard Entertainment® are all trademarks or registered trademarks of Blizzard Entertainment in the United States and/or other countries. These terms and all related materials, logos, and images are copyright © Blizzard Entertainment. This site is in no way associated with or endorsed by Blizzard Entertainment®.\"}',18,NULL,'App\\Models\\Page',2,'2024-10-02 12:36:37','2024-10-07 12:40:09',1,1,0),(9,'{\"Icon\": \"blocks/9/wow3.jpg\", \"Title\": \"Blizzard\", \"Description\": \"World of Warcraft® and Blizzard Entertainment®\"}',19,NULL,'App\\Models\\Block',8,NULL,'2024-10-07 12:40:09',1,3,0),(10,'{\"Icon\": \"blocks/10/wow3.jpg\", \"Title\": \"Veritas Gaming\", \"Description\": \"Veritas Gaming uses an easy-to-use launcher to deploy our custom clients and content. Follow these simple steps to start a WoW adventure like never before.\"}',19,NULL,'App\\Models\\Block',8,NULL,'2024-10-07 12:40:09',1,2,0),(11,'{\"Icon\": \"blocks/11/wow3.jpg\", \"Title\": \"Shaman guide for WoW WotLK\", \"Description\": \"Welcome to our PVE Enhancement Shaman guide for WoW WotLK. This guide will show you what you need to know to play the Shaman class as Enhancement. If you follow this build you should be at the top of the DPS chart in no time!\"}',19,NULL,'App\\Models\\Block',8,NULL,'2024-10-07 12:40:09',1,4,0),(14,NULL,20,NULL,'App\\Models\\Page',2,'2024-10-03 05:29:25','2024-10-05 21:18:13',1,5,0),(15,'{\"Logos\": \"blocks/15/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,6,0),(16,'{\"Logos\": \"blocks/16/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,7,0),(17,'{\"Logos\": \"blocks/17/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,8,0),(18,'{\"Logos\": \"blocks/18/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,9,0),(19,'{\"Logos\": \"blocks/19/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,10,0),(20,'{\"Logos\": \"blocks/20/wow3.jpg\"}',21,NULL,'App\\Models\\Block',14,NULL,'2024-10-07 12:40:09',1,11,0),(21,'{\"Link\": \"/\", \"Name\": \"Home\"}',22,NULL,'App\\Models\\Menu',1,'2024-10-05 08:11:36','2024-10-06 07:26:07',1,1,0),(22,'{\"Link\": \"/about-us\", \"Name\": \"About us\"}',22,NULL,'App\\Models\\Menu',2,'2024-10-05 08:56:01','2024-10-06 07:26:14',1,1,0),(23,'{\"Name\": \"Other\"}',24,NULL,'App\\Models\\Menu',3,'2024-10-05 09:58:52','2024-10-06 07:26:28',1,1,0),(24,'{\"Link\": \"/\", \"Name\": \"About us\"}',25,NULL,'App\\Models\\Block',23,NULL,'2024-10-06 07:26:28',1,1,0),(25,'{\"Link\": \"/\", \"Name\": \"Find us\"}',25,NULL,'App\\Models\\Block',23,NULL,'2024-10-06 07:26:28',1,1,0),(26,'{\"Link\": \"/\", \"Name\": \"Kick ass\"}',25,NULL,'App\\Models\\Block',23,NULL,'2024-10-06 07:26:28',1,1,0),(27,'{\"Link\": \"/\", \"Name\": \"Shake ass\"}',25,NULL,'App\\Models\\Block',23,NULL,'2024-10-06 07:26:28',1,1,0),(28,'{\"Tag\": \"1\", \"Title\": \"Akama da kill\", \"Description\": \"Akama da kill Akama da kill Akama da kill Akama da kill Akama da kill Akama da kill Akama da kill\"}',26,NULL,'App\\Models\\Page',4,'2024-10-07 07:43:03','2024-10-25 05:33:33',1,1,0),(29,'{\"Link\": \"/blog\", \"Name\": \"Blog\"}',22,NULL,'App\\Models\\Menu',4,'2024-10-07 08:07:43','2024-10-07 08:08:00',1,1,0),(30,'{\"Logo\": \"blocks/30/wow3.jpg\"}',27,NULL,'App\\Models\\Setting',1,'2024-10-10 20:51:35','2024-10-14 15:47:59',1,1,0),(31,NULL,28,NULL,'App\\Models\\Setting',4,'2024-10-14 16:13:10','2024-10-14 16:13:24',1,1,0),(32,'{\"Icon\": \"fa-brands fa-wizards-of-the-coast\", \"Link\": \"https://thewarwithin.blizzard.com/ru-ru/\"}',29,NULL,'App\\Models\\Block',31,NULL,'2024-10-14 16:26:35',1,1,0),(33,'{\"Icon\": \"fa-brands fa-fantasy-flight-games\", \"Link\": \"https://www.veritas-wow.com/\"}',29,NULL,'App\\Models\\Block',31,NULL,'2024-10-14 16:26:35',1,1,0),(34,'{\"Icon\": \"fa-brands fa-youtube\", \"Link\": \"https://www.youtube.com/\"}',29,NULL,'App\\Models\\Block',31,NULL,'2024-10-14 16:26:35',1,1,0),(41,'{\"Email\": \"nfridphp@ukr.net\", \"Phone\": \"+380960776498\", \"Title\": \"Wizards\", \"Address\": \"Cher\", \"Delivery\": \"Monday to Sunday\", \"Description\": \"You can learn the TBC Alchemy skill from the Master Alchemy trainers at Outland. (Requires level 50)\", \"Delivery Title\": \"WORKING HOURS\"}',36,NULL,'App\\Models\\Template',36,'2024-10-23 16:10:12','2024-10-24 16:29:09',0,0,1),(42,NULL,36,NULL,'App\\Models\\Page',2,'2024-10-23 16:12:59','2024-10-23 19:24:48',1,13,0),(43,NULL,36,NULL,'App\\Models\\Page',1,'2024-10-24 05:49:07','2024-10-24 05:49:10',1,2,0),(44,'{\"Title\": \"Wrath of the Lich King private server\", \"Button\": {\"link\": \"/\", \"name\": \"WOTLK\"}, \"Description\": \"Aequitas will be a progressive World of Warcraft adventure packed with a plethora of exciting features, including.\\r\\nPrepare yourself for an adventure that will redefine your Wrath of the Lich King experience. Join us in Aequitas, the ultimate WoW private server, and embark on the journey of a lifetime!\"}',37,NULL,'App\\Models\\Template',37,'2024-10-24 15:38:58','2024-10-24 16:29:09',0,1,1),(45,'{\"Answer\": \"You can learn the TBC Alchemy skill from the Master Alchemy trainers at Outland\", \"Question\": \"Master Alchemy\"}',38,NULL,'App\\Models\\Block',44,NULL,'2024-10-24 16:29:09',1,2,0),(46,'{\"Answer\": \"Once you reach Alchemy skill 325 and level 68, you may begin a quest to learn one of three specializations: Potion, Elixir, or Transmutation\", \"Question\": \"Alchemy Specializations\"}',38,NULL,'App\\Models\\Block',44,NULL,'2024-10-24 16:29:09',1,3,0),(47,'{\"Answer\": \"You can learn the new WotLK Classic Alchemy skill from the NPCs below. (Requires level 65)\\r\\nBoth factions can learn it from Linzy Blackbolt at Dalaran.\", \"Question\": \"WotLK Classic Alchemy\"}',38,NULL,'App\\Models\\Block',44,NULL,'2024-10-24 16:29:09',1,4,0),(48,NULL,37,NULL,'App\\Models\\Page',1,'2024-10-24 16:10:41','2024-10-24 16:10:47',1,3,0);
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `taggables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taggables` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag_id` bigint unsigned NOT NULL,
  `taggable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taggables_tag_id_foreign` (`tag_id`),
  KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`),
  CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `taggables` WRITE;
/*!40000 ALTER TABLE `taggables` DISABLE KEYS */;
INSERT INTO `taggables` VALUES (1,1,'App\\Models\\Page',1,NULL,NULL),(3,1,'App\\Models\\Page',2,NULL,NULL),(5,3,'App\\Models\\Page',6,NULL,NULL),(7,1,'App\\Models\\Page',6,NULL,NULL);
/*!40000 ALTER TABLE `taggables` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_path_unique` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'About us','/about-us',NULL,'dasdadas','fafafasfasdfdsfsadf','laravel',NULL,'2024-09-19 15:48:30','2024-10-22 16:40:24',1,1),(2,'index','/',NULL,'Getsuga Tenshou','This build is for people with almost BiS gear. This build has less Mana regeneration, which is part of why you need the better gear. Your totems are also new better than a Death Knight’s Horn of winter at the cost of a little intellect.','laravel, site, wow, bleach','pages/dropdown.png','2024-10-01 05:57:15','2024-10-07 12:40:09',1,1),(4,'Blog','/blog',NULL,'MUKA BUKA','BLEACH','laravel',NULL,'2024-10-07 07:41:07','2024-10-25 05:33:33',1,1),(5,'PHP news','/blog/php-news',NULL,'PVE WotLK Enhancement Shaman DPS','Gems can change based on your build, equipment and caps. You may need to adjust your gems to account for your gear.','laravel, site, wow, bleach','pages/pexels-eprism-studio-108171-335257.jpg','2024-10-07 08:36:52','2024-10-25 05:31:31',1,1),(6,'Bleach','/blog/bleach',NULL,'Kurasaki','Ichigo matafaka','laravel, site, wow, bleach','pages/pexels-apasaric-3323694.jpg','2024-10-07 08:38:03','2024-10-25 05:31:32',1,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Home','2024-10-03 06:23:39','2024-10-06 07:17:56',1),(2,'About us','2024-10-05 08:55:58','2024-10-06 07:19:37',1),(3,'Other','2024-10-05 09:58:49','2024-10-06 07:18:01',1),(4,'Blog','2024-10-07 08:07:29','2024-10-07 08:08:27',1);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'Header','2024-10-09 20:52:47','2024-10-09 20:52:47'),(4,'Social','2024-10-14 16:13:02','2024-10-14 16:13:02');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'kurwa','2024-09-19 15:48:40','2024-09-19 15:48:40',0,1),(2,'Sport','2024-09-19 15:50:46','2024-09-19 15:50:46',0,1),(3,'Blog','2024-09-19 15:50:51','2024-10-09 19:40:54',0,1),(6,'Anime','2024-10-07 14:22:53','2024-10-07 14:22:53',0,1),(7,'Ukraine','2024-10-09 18:56:42','2024-10-09 18:56:42',0,1);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` json DEFAULT NULL,
  `template_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '1',
  `type` tinyint NOT NULL DEFAULT '1',
  `is_general` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `templates_slug_unique` (`slug`),
  KEY `templates_template_id_foreign` (`template_id`),
  CONSTRAINT `templates_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (2,'Top','top','templates/test.png','[{\"name\": \"Title\", \"type\": \"input\"}, {\"name\": \"Description\", \"type\": \"textarea\"}, {\"name\": \"Button\", \"type\": \"button\"}, {\"name\": \"Image\", \"type\": \"image\"}]',NULL,'2024-09-20 18:09:00','2024-09-21 07:44:54',0,1,1,0),(4,'About Us','about-us','templates/about-us.png','[{\"name\": \"Title\", \"type\": \"input\"}, {\"name\": \"Description\", \"type\": \"textarea\"}, {\"name\": \"Button\", \"type\": \"button\"}, {\"name\": \"Image\", \"type\": \"image\"}]',NULL,'2024-09-21 08:17:36','2024-09-22 11:53:55',0,1,1,0),(18,'Power','power','templates/power.png','{\"1\": {\"name\": \"Title\", \"type\": \"input\"}, \"581\": {\"name\": \"Description\", \"type\": \"textarea\"}}',NULL,'2024-10-01 12:59:10','2024-10-02 12:28:30',0,1,1,0),(19,'Power','sub-power','cover','{\"197\": {\"name\": \"Icon\", \"type\": \"image\"}, \"553\": {\"name\": \"Description\", \"type\": \"textarea\"}, \"945\": {\"name\": \"Title\", \"type\": \"input\"}}',18,'2024-10-01 13:00:42','2024-10-02 12:28:30',0,1,1,0),(20,'Logos','logos','templates/logos.png','[]',NULL,'2024-10-03 05:27:37','2024-10-03 05:28:23',0,1,1,0),(21,'Logos','sub-logos','cover','{\"1\": {\"name\": \"Logos\", \"type\": \"image\"}}',20,'2024-10-03 05:28:04','2024-10-03 05:28:23',0,1,1,0),(22,'Simple','simple','templates/simple.png','{\"592\": {\"name\": \"Link\", \"type\": \"input\"}, \"733\": {\"name\": \"Name\", \"type\": \"input\"}}',NULL,'2024-10-05 07:18:54','2024-10-05 07:19:34',0,1,2,0),(24,'Dropdown','dropdown','templates/dropdown.png','{\"1\": {\"name\": \"Name\", \"type\": \"input\"}}',NULL,'2024-10-05 09:55:53','2024-10-05 09:58:27',0,1,2,0),(25,'Dropdown','sub-dropdown','cover','{\"456\": {\"name\": \"Link\", \"type\": \"input\"}, \"527\": {\"name\": \"Name\", \"type\": \"input\"}}',24,'2024-10-05 09:57:57','2024-10-05 09:58:27',0,1,1,0),(26,'Blog','blog','templates/blog.png','{\"1\": {\"name\": \"Title\", \"type\": \"input\"}, \"2\": {\"name\": \"Description\", \"type\": \"textarea\"}, \"3\": {\"name\": \"Tag\", \"type\": \"tag\"}}',NULL,'2024-10-07 07:34:32','2024-10-07 07:39:09',0,1,1,0),(27,'Header Icon','header-icon','templates/header-icon.png','{\"389\": {\"name\": \"Logo\", \"type\": \"image\"}}',NULL,'2024-10-10 20:48:41','2024-10-10 20:48:54',0,1,3,0),(28,'Social','social','templates/social.png','[]',NULL,'2024-10-14 16:12:13','2024-10-14 16:12:45',0,1,3,0),(29,'Social','sub-social','cover','{\"958\": {\"name\": \"Icon\", \"type\": \"input\"}, \"962\": {\"name\": \"Link\", \"type\": \"input\"}}',28,'2024-10-14 16:12:20','2024-10-14 16:12:45',0,1,1,0),(36,'Contact Us','contact-us','templates/contact-us.png','{\"1\": {\"name\": \"Delivery\", \"type\": \"input\"}, \"2\": {\"name\": \"Phone\", \"type\": \"input\"}, \"3\": {\"name\": \"Title\", \"type\": \"input\"}, \"4\": {\"name\": \"Address\", \"type\": \"input\"}, \"5\": {\"name\": \"Description\", \"type\": \"textarea\"}, \"6\": {\"name\": \"Email\", \"type\": \"input\"}, \"7\": {\"name\": \"Delivery Title\", \"type\": \"input\"}}',NULL,'2024-10-23 16:10:12','2024-10-24 05:47:09',0,1,1,1),(37,'FAQ','faq','templates/faq.png','{\"1\": {\"name\": \"Button\", \"type\": \"button\"}, \"2\": {\"name\": \"Title\", \"type\": \"input\"}, \"3\": {\"name\": \"Description\", \"type\": \"textarea\"}}',NULL,'2024-10-24 15:38:58','2024-10-24 15:53:08',0,1,1,1),(38,'FAQ','sub-faq','cover','{\"406\": {\"name\": \"Question\", \"type\": \"input\"}, \"456\": {\"name\": \"Answer\", \"type\": \"textarea\"}}',37,'2024-10-24 15:52:12','2024-10-24 15:53:08',0,1,1,0);
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

