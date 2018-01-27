# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.19)
# Base de données: oe
# Temps de génération: 2017-12-16 21:48:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,NULL,1,'Category 1','category-1','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(2,NULL,1,'Category 2','category-2','2017-12-01 14:35:12','2017-12-01 14:35:12');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table chatter_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chatter_categories`;

CREATE TABLE `chatter_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `chatter_categories` WRITE;
/*!40000 ALTER TABLE `chatter_categories` DISABLE KEYS */;

INSERT INTO `chatter_categories` (`id`, `parent_id`, `order`, `name`, `color`, `slug`, `created_at`, `updated_at`)
VALUES
	(2,0,2,'General','#000000','1',NULL,'2017-12-10 23:01:34'),
	(3,0,3,'DHCP','#52d5fc','1',NULL,'2017-12-10 23:02:34'),
	(4,NULL,4,'Random','#E67E22','random',NULL,NULL);

/*!40000 ALTER TABLE `chatter_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table chatter_discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chatter_discussion`;

CREATE TABLE `chatter_discussion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatter_category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `answered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#232629',
  PRIMARY KEY (`id`),
  UNIQUE KEY `chatter_discussion_slug_unique` (`slug`),
  KEY `chatter_discussion_chatter_category_id_foreign` (`chatter_category_id`),
  KEY `chatter_discussion_user_id_foreign` (`user_id`),
  CONSTRAINT `chatter_discussion_chatter_category_id_foreign` FOREIGN KEY (`chatter_category_id`) REFERENCES `chatter_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chatter_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `chatter_discussion` WRITE;
/*!40000 ALTER TABLE `chatter_discussion` DISABLE KEYS */;

INSERT INTO `chatter_discussion` (`id`, `chatter_category_id`, `title`, `user_id`, `sticky`, `views`, `answered`, `created_at`, `updated_at`, `slug`, `color`)
VALUES
	(6,2,'Login Information for Chatter',1,0,0,0,'2016-08-18 14:39:36','2016-08-18 14:39:36','login-information-for-chatter','#1a1067'),
	(7,3,'Leaving Feedback',1,0,0,0,'2016-08-18 14:42:29','2016-08-18 14:42:29','leaving-feedback','#8e1869'),
	(8,4,'Just a random post',1,0,0,0,'2016-08-18 14:46:38','2016-08-18 14:46:38','just-a-random-post',''),
	(10,2,'Jamai',2,0,0,0,'2017-12-02 12:09:49','2017-12-02 12:09:49','jamai',NULL),
	(11,3,'dvlksdfnvlksdfnvsdv',1,0,0,0,'2017-12-15 13:47:39','2017-12-15 13:47:39','dvlksdfnvlksdfnvsdv',NULL);

/*!40000 ALTER TABLE `chatter_discussion` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table chatter_post
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chatter_post`;

CREATE TABLE `chatter_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatter_discussion_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `markdown` tinyint(1) NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `chatter_post_chatter_discussion_id_foreign` (`chatter_discussion_id`),
  KEY `chatter_post_user_id_foreign` (`user_id`),
  CONSTRAINT `chatter_post_chatter_discussion_id_foreign` FOREIGN KEY (`chatter_discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chatter_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `chatter_post` WRITE;
/*!40000 ALTER TABLE `chatter_post` DISABLE KEYS */;

INSERT INTO `chatter_post` (`id`, `chatter_discussion_id`, `user_id`, `body`, `created_at`, `updated_at`, `markdown`, `locked`)
VALUES
	(5,6,1,'<p>Hey!</p>\n        <p>Thanks again for checking out chatter. If you want to login with the default user you can login with the following credentials:</p>\n        <p><strong>email address</strong>: tony@hello.com</p>\n        <p><strong>password</strong>: password</p>\n        <p>You\'ll probably want to delete this user, but if for some reason you want to keep it... Go ahead :)</p>','2016-08-18 14:39:36','2016-08-18 14:39:36',0,0),
	(6,7,1,'<p>If you would like to leave some feedback or have any issues be sure to visit the github page here: <a href=\"https://github.com/thedevdojo/chatter\" target=\"_blank\">https://github.com/thedevdojo/chatter</a>&nbsp;and I\'m sure I can help out.</p>\n        <p>Let\'s make this package the go to Laravel Forum package. Feel free to contribute and share your ideas :)</p>','2016-08-18 14:42:29','2016-08-18 14:42:29',0,0),
	(7,8,1,'<p>This is just a random post to show you some of the formatting that you can do in the WYSIWYG editor. You can make your text <strong>bold</strong>, <em>italic</em>, or <span style=\"text-decoration:underline;\">underlined</span>.</p>\n<p style=\"text-align:center;\">Additionally, you can center align text.</p>\n<p style=\"text-align:right;\">You can align the text to the right!</p>\n<p>Or by default it will be aligned to the left.</p>\n<ul>\n<li>We can also</li>\n<li>add a bulleted</li>\n<li>list</li>\n</ul>\n<ol>\n<li><span>or we can</span></li>\n<li><span>add a numbered list</span></li>\n</ol>\n<p style=\"padding-left:30px;\"><span>We can choose to indent our text</span></p>\n<p><span>Post links: <a href=\"https://devdojo.com\">https://devdojo.com</a></span></p>\n<p><span>and add images:</span></p>\n<p><span><img src=\"https://media.giphy.com/media/o0vwzuFwCGAFO/giphy.gif\" alt=\"\" width=\"300\" height=\"300\"></span></p>','2016-08-18 14:46:38','2017-12-02 14:15:35',0,0),
	(8,8,1,'<p>Haha :) Cats!</p>\n        <p><img src=\"https://media.giphy.com/media/5Vy3WpDbXXMze/giphy.gif\" alt=\"\" width=\"250\" height=\"141\" /></p>\n        <p><img src=\"https://media.giphy.com/media/XNdoIMwndQfqE/200.gif\" alt=\"\" width=\"200\" height=\"200\" /></p>','2016-08-18 14:55:42','2016-08-18 15:45:13',0,0),
	(11,10,2,'<p>Jow jami is dcacaca &nbsp;fvsdv</p>','2017-12-02 12:09:49','2017-12-02 12:09:49',0,0),
	(12,11,1,'<p>s&ntilde;vsfm&ntilde;sfmvnslvnsdvnlsdkvnsdnvlsdnvsldk</p>','2017-12-15 13:47:39','2017-12-15 13:47:39',0,0);

/*!40000 ALTER TABLE `chatter_post` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table chatter_user_discussion
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chatter_user_discussion`;

CREATE TABLE `chatter_user_discussion` (
  `user_id` int(10) unsigned NOT NULL,
  `discussion_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`discussion_id`),
  KEY `chatter_user_discussion_user_id_index` (`user_id`),
  KEY `chatter_user_discussion_discussion_id_index` (`discussion_id`),
  CONSTRAINT `chatter_user_discussion_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chatter_user_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `chatter_user_discussion` WRITE;
/*!40000 ALTER TABLE `chatter_user_discussion` DISABLE KEYS */;

INSERT INTO `chatter_user_discussion` (`user_id`, `discussion_id`)
VALUES
	(1,11),
	(2,10);

/*!40000 ALTER TABLE `chatter_user_discussion` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `posts_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `comment`, `user_id`, `posts_id`, `created_at`, `updated_at`)
VALUES
	(1,'snvlsnvsdvlkv',2,2,'2017-12-16 16:24:15','2017-12-16 16:24:15');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `duree` double(8,2) NOT NULL,
  `author` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `title`, `duree`, `author`, `seo_title`, `meta_description`, `meta_keywords`, `image`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'SysAd',3.00,'Mohamed Jamai','0','0','0','courses/December2017/arbrRH7aoD6u4RyXjPxC.png','SysAd','2017-12-16 12:18:00','2017-12-16 13:07:10'),
	(4,'DBA',3.00,'Mjamai','0','0','0','courses/December2017/g2apg0LqGkkMqgr7cWDe.png','dba','2017-12-16 13:06:22','2017-12-16 13:06:22');

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table data_rows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_rows`;

CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`)
VALUES
	(1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),
	(2,1,'author_id','text','Author',1,0,1,1,0,1,NULL,2),
	(3,1,'category_id','text','Category',0,0,1,1,1,0,NULL,3),
	(4,1,'title','text','Title',1,1,1,1,1,1,NULL,4),
	(5,1,'excerpt','text_area','excerpt',0,0,1,1,1,1,NULL,5),
	(6,1,'body','rich_text_box','Body',1,0,1,1,1,1,NULL,6),
	(7,1,'image','image','Post Image',0,1,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}',7),
	(8,1,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',8),
	(9,1,'meta_description','text_area','meta_description',0,0,1,1,1,1,NULL,9),
	(10,1,'meta_keywords','text_area','meta_keywords',0,0,1,1,1,1,NULL,10),
	(11,1,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}',11),
	(12,1,'created_at','timestamp','created_at',0,1,1,0,0,0,NULL,12),
	(13,1,'updated_at','timestamp','updated_at',0,0,0,0,0,0,NULL,13),
	(14,2,'id','number','id',1,0,0,0,0,0,'',1),
	(15,2,'author_id','text','author_id',1,0,0,0,0,0,'',2),
	(16,2,'title','text','title',1,1,1,1,1,1,'',3),
	(17,2,'excerpt','text_area','excerpt',1,0,1,1,1,1,'',4),
	(18,2,'body','rich_text_box','body',1,0,1,1,1,1,'',5),
	(19,2,'slug','text','slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\"}}',6),
	(20,2,'meta_description','text','meta_description',1,0,1,1,1,1,'',7),
	(21,2,'meta_keywords','text','meta_keywords',1,0,1,1,1,1,'',8),
	(22,2,'status','select_dropdown','status',1,1,1,1,1,1,'{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}',9),
	(23,2,'created_at','timestamp','created_at',1,1,1,0,0,0,'',10),
	(24,2,'updated_at','timestamp','updated_at',1,0,0,0,0,0,'',11),
	(25,2,'image','image','image',0,1,1,1,1,1,'',12),
	(26,3,'id','number','id',1,0,0,0,0,0,'',1),
	(27,3,'name','text','name',1,1,1,1,1,1,'',2),
	(28,3,'email','text','email',1,1,1,1,1,1,'',3),
	(29,3,'password','password','password',0,0,0,1,1,0,'',4),
	(30,3,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"roles\",\"pivot\":\"0\"}',10),
	(31,3,'remember_token','text','remember_token',0,0,0,0,0,0,'',5),
	(32,3,'created_at','timestamp','created_at',0,1,1,0,0,0,'',6),
	(33,3,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),
	(34,3,'avatar','image','avatar',0,1,1,1,1,1,'',8),
	(35,5,'id','number','id',1,0,0,0,0,0,'',1),
	(36,5,'name','text','name',1,1,1,1,1,1,'',2),
	(37,5,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),
	(38,5,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),
	(39,4,'id','number','id',1,0,0,0,0,0,'',1),
	(40,4,'parent_id','select_dropdown','parent_id',0,0,1,1,1,1,'{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}',2),
	(41,4,'order','text','order',1,1,1,1,1,1,'{\"default\":1}',3),
	(42,4,'name','text','name',1,1,1,1,1,1,'',4),
	(43,4,'slug','text','slug',1,1,1,1,1,1,'{\"slugify\":{\"origin\":\"name\"}}',5),
	(44,4,'created_at','timestamp','created_at',0,0,1,0,0,0,'',6),
	(45,4,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',7),
	(46,6,'id','number','id',1,0,0,0,0,0,'',1),
	(47,6,'name','text','Name',1,1,1,1,1,1,'',2),
	(48,6,'created_at','timestamp','created_at',0,0,0,0,0,0,'',3),
	(49,6,'updated_at','timestamp','updated_at',0,0,0,0,0,0,'',4),
	(50,6,'display_name','text','Display Name',1,1,1,1,1,1,'',5),
	(51,1,'seo_title','text','seo_title',0,1,1,1,1,1,NULL,14),
	(52,1,'featured','checkbox','featured',1,1,1,1,1,1,NULL,15),
	(53,3,'role_id','text','role_id',1,1,1,1,1,1,'',9),
	(54,8,'id','hidden','Id',1,0,0,0,0,0,NULL,1),
	(55,8,'parent_id','checkbox','Parent Id',0,1,1,1,1,1,NULL,2),
	(56,8,'order','checkbox','Order',1,1,1,1,1,1,NULL,3),
	(57,8,'name','checkbox','Name',1,1,1,1,1,1,NULL,4),
	(58,8,'color','checkbox','Color',1,1,1,1,1,1,NULL,5),
	(59,8,'slug','checkbox','Slug',1,1,1,1,1,1,NULL,6),
	(60,8,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,7),
	(61,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,8),
	(62,9,'id','hidden','Id',1,0,0,0,0,0,NULL,1),
	(63,9,'chatter_category_id','checkbox','Chatter Category Id',1,1,1,1,1,1,NULL,2),
	(64,9,'title','checkbox','Title',1,1,1,1,1,1,NULL,4),
	(65,9,'user_id','checkbox','User Id',1,1,1,1,1,1,NULL,3),
	(66,9,'sticky','checkbox','Sticky',1,1,1,1,1,1,NULL,5),
	(67,9,'views','checkbox','Views',1,1,1,1,1,1,NULL,6),
	(68,9,'answered','checkbox','Answered',1,1,1,1,1,1,NULL,7),
	(69,9,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,8),
	(70,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,9),
	(71,9,'slug','checkbox','Slug',1,1,1,1,1,1,NULL,10),
	(72,9,'color','checkbox','Color',0,1,1,1,1,1,NULL,11),
	(73,10,'id','checkbox','Id',1,0,0,0,0,0,NULL,1),
	(74,10,'chatter_discussion_id','checkbox','Chatter Discussion Id',1,1,1,1,1,1,NULL,2),
	(75,10,'user_id','checkbox','User Id',1,1,1,1,1,1,NULL,3),
	(76,10,'body','checkbox','Body',1,1,1,1,1,1,NULL,4),
	(77,10,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,5),
	(78,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,6),
	(79,10,'markdown','checkbox','Markdown',1,1,1,1,1,1,NULL,7),
	(80,10,'locked','checkbox','Locked',1,1,1,1,1,1,NULL,8),
	(81,11,'user_id','checkbox','User Id',1,1,1,1,1,1,NULL,1),
	(82,11,'discussion_id','checkbox','Discussion Id',1,1,1,1,1,1,NULL,2),
	(83,12,'id','checkbox','Id',1,0,0,0,0,0,NULL,1),
	(84,12,'title','text','Title',1,1,1,1,1,1,NULL,2),
	(85,12,'duree','number','Duree',1,1,1,1,1,1,NULL,3),
	(86,12,'author','text','Author',1,1,1,1,1,1,NULL,4),
	(87,12,'seo_title','checkbox','Seo Title',0,1,1,1,1,1,NULL,5),
	(88,12,'meta_description','checkbox','Meta Description',1,1,1,1,1,1,NULL,6),
	(89,12,'meta_keywords','checkbox','Meta Keywords',1,1,1,1,1,1,NULL,7),
	(90,12,'image','image','Image',0,1,1,1,1,1,NULL,8),
	(91,12,'slug','text','Slug',1,0,1,1,1,1,'{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true}}',9),
	(92,12,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,10),
	(93,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,11),
	(94,12,'course_hasmany_post_relationship','relationship','posts',0,1,1,1,1,1,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Post\",\"table\":\"courses\",\"type\":\"hasMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}',12),
	(95,1,'course_id','checkbox','Course Id',1,1,1,1,1,1,NULL,16),
	(96,1,'post_belongsto_course_relationship','relationship','courses',0,1,1,1,1,1,'{\"model\":\"App\\\\Course\",\"table\":\"courses\",\"type\":\"belongsTo\",\"column\":\"course_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}',17),
	(97,13,'id','hidden','Id',1,0,0,0,0,0,NULL,1),
	(98,13,'comment','text','Comment',1,1,1,1,1,1,NULL,2),
	(99,13,'user_id','text','User Id',1,1,1,1,1,1,NULL,3),
	(100,13,'posts_id','text','Posts Id',1,1,1,1,1,1,NULL,4),
	(101,13,'created_at','timestamp','Created At',0,1,1,1,0,1,NULL,5),
	(102,13,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,6),
	(103,13,'comment_belongsto_post_relationship','relationship','posts',0,1,1,1,1,1,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Post\",\"table\":\"posts\",\"type\":\"belongsTo\",\"column\":\"posts_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}',7),
	(104,13,'comment_belongsto_user_relationship','relationship','users',0,1,1,1,1,1,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\"}',8);

/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table data_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_types`;

CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `created_at`, `updated_at`)
VALUES
	(1,'posts','posts','Post','Posts','voyager-news','TCG\\Voyager\\Models\\Post','TCG\\Voyager\\Policies\\PostPolicy',NULL,NULL,1,0,'2017-12-01 14:35:12','2017-12-16 11:46:29'),
	(2,'pages','pages','Page','Pages','voyager-file-text','TCG\\Voyager\\Models\\Page',NULL,'','',1,0,'2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(3,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','','',1,0,'2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(4,'categories','categories','Category','Categories','voyager-categories','TCG\\Voyager\\Models\\Category',NULL,'','',1,0,'2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(5,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,'2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(6,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'','',1,0,'2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(8,'chatter_categories','chatter-categories','Chatter Category','Chatter Categories',NULL,'App\\ChatterCategory',NULL,NULL,NULL,1,0,'2017-12-10 22:32:19','2017-12-10 22:32:19'),
	(9,'chatter_discussion','chatter-discussion','Chatter Discussion','Chatter Discussion',NULL,'App\\ChatterDiscussion',NULL,NULL,NULL,1,0,'2017-12-10 22:32:47','2017-12-10 23:50:54'),
	(10,'chatter_post','chatter-post','Chatter Post','Chatter Posts',NULL,'App\\ChatterPost',NULL,NULL,NULL,1,0,'2017-12-10 22:33:04','2017-12-10 22:33:04'),
	(11,'chatter_user_discussion','chatter-user-discussion','Chatter User Discussion','Chatter User Discussions',NULL,'App\\ChatterUserDiscussion',NULL,NULL,NULL,1,0,'2017-12-10 22:33:22','2017-12-10 22:33:22'),
	(12,'courses','courses','Course','Courses',NULL,'App\\Course',NULL,NULL,NULL,1,0,'2017-12-16 11:40:43','2017-12-16 11:40:43'),
	(13,'comments','comments','Comment','Comments',NULL,'App\\Comment',NULL,NULL,NULL,1,0,'2017-12-16 14:53:33','2017-12-16 14:53:33');

/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table menu_items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu_items`;

CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`)
VALUES
	(1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.dashboard',NULL),
	(2,1,'Media','','_self','voyager-images',NULL,NULL,5,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.media.index',NULL),
	(3,1,'Posts','','_self','voyager-news',NULL,NULL,6,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.posts.index',NULL),
	(4,1,'Users','','_self','voyager-person',NULL,NULL,3,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.users.index',NULL),
	(5,1,'Categories','','_self','voyager-categories',NULL,NULL,8,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.categories.index',NULL),
	(6,1,'Pages','','_self','voyager-file-text',NULL,NULL,7,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.pages.index',NULL),
	(7,1,'Roles','','_self','voyager-lock',NULL,NULL,2,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.roles.index',NULL),
	(8,1,'Tools','','_self','voyager-tools',NULL,NULL,9,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL,NULL),
	(9,1,'Menu Builder','','_self','voyager-list',NULL,8,10,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.menus.index',NULL),
	(10,1,'Database','','_self','voyager-data',NULL,8,11,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.database.index',NULL),
	(11,1,'Compass','/admin/compass','_self','voyager-compass',NULL,8,12,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL,NULL),
	(12,1,'Hooks','/admin/hooks','_self','voyager-hook',NULL,8,13,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL,NULL),
	(13,1,'Settings','','_self','voyager-settings',NULL,NULL,14,'2017-12-01 14:35:12','2017-12-01 14:35:12','voyager.settings.index',NULL),
	(14,1,'Chatter Categories','/admin/chatter-categories','_self',NULL,NULL,NULL,15,'2017-12-10 22:32:19','2017-12-10 22:32:19',NULL,NULL),
	(15,1,'Chatter Discussions','/admin/chatter-discussion','_self',NULL,NULL,NULL,16,'2017-12-10 22:32:47','2017-12-10 22:32:47',NULL,NULL),
	(16,1,'Chatter Posts','/admin/chatter-post','_self',NULL,NULL,NULL,17,'2017-12-10 22:33:05','2017-12-10 22:33:05',NULL,NULL),
	(17,1,'Chatter User Discussions','/admin/chatter-user-discussion','_self',NULL,NULL,NULL,18,'2017-12-10 22:33:22','2017-12-10 22:33:22',NULL,NULL),
	(18,1,'Courses','/admin/courses','_self',NULL,NULL,NULL,19,'2017-12-16 11:40:43','2017-12-16 11:40:43',NULL,NULL),
	(19,1,'Comments','/admin/comments','_self',NULL,NULL,NULL,20,'2017-12-16 14:53:33','2017-12-16 14:53:33',NULL,NULL);

/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2017-12-01 14:35:12','2017-12-01 14:35:12');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2016_01_01_000000_add_voyager_user_fields',1),
	(4,'2016_01_01_000000_create_data_types_table',1),
	(5,'2016_01_01_000000_create_pages_table',1),
	(6,'2016_01_01_000000_create_posts_table',1),
	(7,'2016_02_15_204651_create_categories_table',1),
	(8,'2016_05_19_173453_create_menu_table',1),
	(9,'2016_10_21_190000_create_roles_table',1),
	(10,'2016_10_21_190000_create_settings_table',1),
	(11,'2016_11_30_135954_create_permission_table',1),
	(12,'2016_11_30_141208_create_permission_role_table',1),
	(13,'2016_12_26_201236_data_types__add__server_side',1),
	(14,'2017_01_13_000000_add_route_to_menu_items_table',1),
	(15,'2017_01_14_005015_create_translations_table',1),
	(16,'2017_01_15_000000_add_permission_group_id_to_permissions_table',1),
	(17,'2017_01_15_000000_create_permission_groups_table',1),
	(18,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),
	(19,'2017_03_06_000000_add_controller_to_data_types_table',1),
	(20,'2017_04_11_000000_alter_post_nullable_fields_table',1),
	(21,'2017_04_21_000000_add_order_to_data_rows_table',1),
	(22,'2017_07_05_210000_add_policyname_to_data_types_table',1),
	(23,'2017_08_05_000000_add_group_to_settings_table',1),
	(24,'2016_07_29_171118_create_chatter_categories_table',2),
	(25,'2016_07_29_171118_create_chatter_discussion_table',2),
	(26,'2016_07_29_171118_create_chatter_post_table',2),
	(27,'2016_07_29_171128_create_foreign_keys',2),
	(28,'2016_08_02_183143_add_slug_field_for_discussions',2),
	(29,'2016_08_03_121747_add_color_row_to_chatter_discussions',2),
	(30,'2017_01_16_121747_add_markdown_and_lock_to_chatter_posts',2),
	(31,'2017_01_16_121747_create_chatter_user_discussion_pivot_table',2),
	(32,'2017_12_16_104020_AddCourseID',3),
	(33,'2017_12_16_112515_create_courses_table',4),
	(34,'2017_12_16_113201_AddCoursID',5),
	(35,'2017_12_16_144451_create_comments_table',6);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,'Hello World','Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.','<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','pages/December2017/o7F9UP2CNE9C32ltJm1R.jpg','hello-world','Yar Meta Description','Keyword1, Keyword2','ACTIVE','2017-12-01 14:35:12','2017-12-16 21:42:17');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;

INSERT INTO `password_resets` (`email`, `token`, `created_at`)
VALUES
	('admin@admin.com','$2y$10$qapZEewYq5hYI15eiDlEIOY27fgoYK4o/Wb7IXuj4Q7LzwWCx5Mf.','2017-12-16 12:04:36');

/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table permission_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_groups`;

CREATE TABLE `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permission_groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Affichage de la table permission_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;

INSERT INTO `permission_role` (`permission_id`, `role_id`)
VALUES
	(1,1),
	(2,1),
	(3,1),
	(4,1),
	(5,1),
	(6,1),
	(7,1),
	(8,1),
	(9,1),
	(10,1),
	(11,1),
	(12,1),
	(13,1),
	(14,1),
	(15,1),
	(16,1),
	(17,1),
	(18,1),
	(19,1),
	(20,1),
	(21,1),
	(22,1),
	(23,1),
	(24,1),
	(25,1),
	(25,3),
	(26,1),
	(26,3),
	(27,1),
	(27,3),
	(28,1),
	(28,3),
	(29,1),
	(29,3),
	(30,1),
	(31,1),
	(32,1),
	(33,1),
	(34,1),
	(35,1),
	(36,1),
	(37,1),
	(38,1),
	(39,1),
	(40,1),
	(41,1),
	(42,1),
	(43,1),
	(44,1),
	(45,1),
	(46,1),
	(47,1),
	(48,1),
	(49,1),
	(50,1),
	(51,1),
	(52,1),
	(53,1),
	(54,1),
	(55,1),
	(56,1),
	(57,1),
	(58,1),
	(59,1),
	(60,1),
	(61,1),
	(62,1),
	(63,1),
	(64,1),
	(65,1),
	(66,1),
	(67,1),
	(68,1),
	(69,1);

/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`, `permission_group_id`)
VALUES
	(1,'browse_admin',NULL,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(2,'browse_database',NULL,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(3,'browse_media',NULL,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(4,'browse_compass',NULL,'2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(5,'browse_menus','menus','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(6,'read_menus','menus','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(7,'edit_menus','menus','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(8,'add_menus','menus','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(9,'delete_menus','menus','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(10,'browse_pages','pages','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(11,'read_pages','pages','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(12,'edit_pages','pages','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(13,'add_pages','pages','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(14,'delete_pages','pages','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(15,'browse_roles','roles','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(16,'read_roles','roles','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(17,'edit_roles','roles','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(18,'add_roles','roles','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(19,'delete_roles','roles','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(20,'browse_users','users','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(21,'read_users','users','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(22,'edit_users','users','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(23,'add_users','users','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(24,'delete_users','users','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(25,'browse_posts','posts','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(26,'read_posts','posts','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(27,'edit_posts','posts','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(28,'add_posts','posts','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(29,'delete_posts','posts','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(30,'browse_categories','categories','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(31,'read_categories','categories','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(32,'edit_categories','categories','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(33,'add_categories','categories','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(34,'delete_categories','categories','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(35,'browse_settings','settings','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(36,'read_settings','settings','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(37,'edit_settings','settings','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(38,'add_settings','settings','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(39,'delete_settings','settings','2017-12-01 14:35:12','2017-12-01 14:35:12',NULL),
	(40,'browse_chatter_categories','chatter_categories','2017-12-10 22:32:19','2017-12-10 22:32:19',NULL),
	(41,'read_chatter_categories','chatter_categories','2017-12-10 22:32:19','2017-12-10 22:32:19',NULL),
	(42,'edit_chatter_categories','chatter_categories','2017-12-10 22:32:19','2017-12-10 22:32:19',NULL),
	(43,'add_chatter_categories','chatter_categories','2017-12-10 22:32:19','2017-12-10 22:32:19',NULL),
	(44,'delete_chatter_categories','chatter_categories','2017-12-10 22:32:19','2017-12-10 22:32:19',NULL),
	(45,'browse_chatter_discussion','chatter_discussion','2017-12-10 22:32:47','2017-12-10 22:32:47',NULL),
	(46,'read_chatter_discussion','chatter_discussion','2017-12-10 22:32:47','2017-12-10 22:32:47',NULL),
	(47,'edit_chatter_discussion','chatter_discussion','2017-12-10 22:32:47','2017-12-10 22:32:47',NULL),
	(48,'add_chatter_discussion','chatter_discussion','2017-12-10 22:32:47','2017-12-10 22:32:47',NULL),
	(49,'delete_chatter_discussion','chatter_discussion','2017-12-10 22:32:47','2017-12-10 22:32:47',NULL),
	(50,'browse_chatter_post','chatter_post','2017-12-10 22:33:05','2017-12-10 22:33:05',NULL),
	(51,'read_chatter_post','chatter_post','2017-12-10 22:33:05','2017-12-10 22:33:05',NULL),
	(52,'edit_chatter_post','chatter_post','2017-12-10 22:33:05','2017-12-10 22:33:05',NULL),
	(53,'add_chatter_post','chatter_post','2017-12-10 22:33:05','2017-12-10 22:33:05',NULL),
	(54,'delete_chatter_post','chatter_post','2017-12-10 22:33:05','2017-12-10 22:33:05',NULL),
	(55,'browse_chatter_user_discussion','chatter_user_discussion','2017-12-10 22:33:22','2017-12-10 22:33:22',NULL),
	(56,'read_chatter_user_discussion','chatter_user_discussion','2017-12-10 22:33:22','2017-12-10 22:33:22',NULL),
	(57,'edit_chatter_user_discussion','chatter_user_discussion','2017-12-10 22:33:22','2017-12-10 22:33:22',NULL),
	(58,'add_chatter_user_discussion','chatter_user_discussion','2017-12-10 22:33:22','2017-12-10 22:33:22',NULL),
	(59,'delete_chatter_user_discussion','chatter_user_discussion','2017-12-10 22:33:22','2017-12-10 22:33:22',NULL),
	(60,'browse_courses','courses','2017-12-16 11:40:43','2017-12-16 11:40:43',NULL),
	(61,'read_courses','courses','2017-12-16 11:40:43','2017-12-16 11:40:43',NULL),
	(62,'edit_courses','courses','2017-12-16 11:40:43','2017-12-16 11:40:43',NULL),
	(63,'add_courses','courses','2017-12-16 11:40:43','2017-12-16 11:40:43',NULL),
	(64,'delete_courses','courses','2017-12-16 11:40:43','2017-12-16 11:40:43',NULL),
	(65,'browse_comments','comments','2017-12-16 14:53:33','2017-12-16 14:53:33',NULL),
	(66,'read_comments','comments','2017-12-16 14:53:33','2017-12-16 14:53:33',NULL),
	(67,'edit_comments','comments','2017-12-16 14:53:33','2017-12-16 14:53:33',NULL),
	(68,'add_comments','comments','2017-12-16 14:53:33','2017-12-16 14:53:33',NULL),
	(69,'delete_comments','comments','2017-12-16 14:53:33','2017-12-16 14:53:33',NULL);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `course_id`)
VALUES
	(1,1,1,'user png',NULL,'This is the excerpt for the Lorem Ipsum Post','<p>This is the body of the lorem ipsum post</p>','posts/December2017/N84WQLEm8eIoTICr2mk2.png','user-png','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-01 14:35:12','2017-12-16 21:45:57',1),
	(2,1,1,'My Sample Post',NULL,'This is the excerpt for the sample Post','<p>This is the body for the sample post, which includes the body.</p>\r\n<h2>We can use all kinds of format!</h2>\r\n<p>And include a bunch of other stuff.</p>','posts/post2.jpg','my-sample-post','Meta Description for sample post','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-01 14:35:12','2017-12-16 13:52:40',4),
	(3,1,1,'Latest Post',NULL,'This is the excerpt for the latest post','<p>This is the body for the latest post</p>','posts/post3.jpg','latest-post','This is the meta description','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-01 14:35:12','2017-12-16 13:53:20',4),
	(4,0,NULL,'Yarr Post',NULL,'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.','<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>','posts/post4.jpg','yarr-post','this be a meta descript','keyword1, keyword2, keyword3','PUBLISHED',0,'2017-12-01 14:35:12','2017-12-01 14:35:12',0);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;



/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`)
VALUES
	(1,'site.title','Site Title','Site Title','','text',1,'Site'),
	(2,'site.description','Site Description','Site Description','','text',2,'Site'),
	(3,'site.logo','Site Logo','','','image',3,'Site'),
	(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID','','','text',4,'Site'),
	(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),
	(6,'admin.title','Admin Title','Voyager','','text',1,'Admin'),
	(7,'admin.description','Admin Description','Welcome to Voyager. The Missing Admin for Laravel','','text',2,'Admin'),
	(8,'admin.loader','Admin Loader','','','image',3,'Admin'),
	(9,'admin.icon_image','Admin Icon Image','','','image',4,'Admin'),
	(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)','','','text',1,'Admin');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table translations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `translations`;

CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`)
VALUES
	(1,'data_types','display_name_singular',1,'pt','Post','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(2,'data_types','display_name_singular',2,'pt','Página','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(3,'data_types','display_name_singular',3,'pt','Utilizador','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(4,'data_types','display_name_singular',4,'pt','Categoria','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(5,'data_types','display_name_singular',5,'pt','Menu','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(6,'data_types','display_name_singular',6,'pt','Função','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(7,'data_types','display_name_plural',1,'pt','Posts','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(8,'data_types','display_name_plural',2,'pt','Páginas','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(9,'data_types','display_name_plural',3,'pt','Utilizadores','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(10,'data_types','display_name_plural',4,'pt','Categorias','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(11,'data_types','display_name_plural',5,'pt','Menus','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(12,'data_types','display_name_plural',6,'pt','Funções','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(13,'categories','slug',1,'pt','categoria-1','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(14,'categories','name',1,'pt','Categoria 1','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(15,'categories','slug',2,'pt','categoria-2','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(16,'categories','name',2,'pt','Categoria 2','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(17,'pages','title',1,'pt','Olá Mundo','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(18,'pages','slug',1,'pt','ola-mundo','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(19,'pages','body',1,'pt','<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(20,'menu_items','title',1,'pt','Painel de Controle','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(21,'menu_items','title',2,'pt','Media','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(22,'menu_items','title',3,'pt','Publicações','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(23,'menu_items','title',4,'pt','Utilizadores','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(24,'menu_items','title',5,'pt','Categorias','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(25,'menu_items','title',6,'pt','Páginas','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(26,'menu_items','title',7,'pt','Funções','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(27,'menu_items','title',8,'pt','Ferramentas','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(28,'menu_items','title',9,'pt','Menus','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(29,'menu_items','title',10,'pt','Base de dados','2017-12-01 14:35:12','2017-12-01 14:35:12'),
	(30,'menu_items','title',13,'pt','Configurações','2017-12-01 14:35:12','2017-12-01 14:35:12');

/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,1,'Admin','admin@admin.com','users/December2017/54CJ1eipIadU2p6zTPdo.jpg','$2y$10$rp8oxmlwgMW8.MwnbQ6qHe7asCAYjsmJYLgTXoLkRUvT3VeTx3IOW','C08zkS9coqTrHa6OwDZw4XEVnoXMUvOcOjnevh08rXbBxPhvBrWSj7ikyW3x','2017-12-01 14:35:12','2017-12-16 21:39:16'),
	(2,2,'cool','mjf.php@gmail.com','users/December2017/YMz37wsW1Y15LeASItYA.png','$2y$10$ptKR9Uq/qDMfspBrTthIoevahH3iaxpGIvQyNv.fQs1RxU.ObcZFa','KIQx6iBDg7C1iwWmsgaZ90NOoQpPwdA6UxOPcxKe4znMoClSOmeWAjuy1Nbo','2017-12-01 16:28:51','2017-12-16 16:35:40'),
	(3,3,'mjf','php@php.com','users/December2017/bYDIxehaCS0sWBNnGzlu.png','$2y$10$.p.taofh41yZBTJRaD47K.dRnMpLBl.uLgu75kn40YRNSdJqkNXo6','iuF2aDmODu6FxCy3kUsPBfJNN6k55PlLAsJ6Htxo8QgTKOHA0aSwFTe1urJU','2017-12-02 13:02:27','2017-12-06 23:25:23');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
