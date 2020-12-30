/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - asif_vai_bd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`asif_vai_bd` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `asif_vai_bd`;

/*Table structure for table `sm_add_expenses` */

DROP TABLE IF EXISTS `sm_add_expenses`;

CREATE TABLE `sm_add_expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expense_head_id` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `payment_method_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT 1,
  `updated_by` int(10) unsigned DEFAULT 1,
  `school_id` int(10) unsigned DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `sm_add_expenses_expense_head_id_foreign` (`expense_head_id`),
  KEY `sm_add_expenses_account_id_foreign` (`account_id`),
  KEY `sm_add_expenses_payment_method_id_foreign` (`payment_method_id`),
  KEY `sm_add_expenses_created_by_foreign` (`created_by`),
  KEY `sm_add_expenses_updated_by_foreign` (`updated_by`),
  KEY `sm_add_expenses_school_id_foreign` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sm_add_expenses` */

insert  into `sm_add_expenses`(`id`,`name`,`date`,`amount`,`file`,`description`,`active_status`,`created_at`,`updated_at`,`expense_head_id`,`account_id`,`payment_method_id`,`created_by`,`updated_by`,`school_id`) values 
(1,'Utility Bills','2019-01-05',7296.00,NULL,'Sample Data 1',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(2,'Utility Bills','2019-02-05',4428.00,NULL,'Sample Data 2',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(3,'Utility Bills','2019-03-05',7601.00,NULL,'Sample Data 3',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(4,'Utility Bills','2019-04-05',2751.00,NULL,'Sample Data 4',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(5,'Utility Bills','2019-05-05',3060.00,NULL,'Sample Data 5',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(6,'Utility Bills','2019-06-05',2274.00,NULL,'Sample Data 6',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(7,'Utility Bills','2019-07-05',1802.00,NULL,'Sample Data 7',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(8,'Utility Bills','2019-08-05',7809.00,NULL,'Sample Data 8',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(9,'Utility Bills','2019-09-05',5058.00,NULL,'Sample Data 9',1,'2019-09-15 00:10:41','2019-09-15 00:10:41',4,NULL,1,1,1,1),
(10,'sdfgsdgf','2020-02-07',3244.00,'','fdw',1,'2020-02-07 16:34:50','2020-02-07 16:34:50',4,NULL,1,1,1,1),
(11,'werwer','2020-02-07',2324.00,'','fdsfsda',1,'2020-02-07 16:35:01','2020-02-07 16:35:01',4,NULL,1,1,1,1);

/*Table structure for table `sm_add_incomes` */

DROP TABLE IF EXISTS `sm_add_incomes`;

CREATE TABLE `sm_add_incomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `income_head_id` int(10) unsigned DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL,
  `payment_method_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT 1,
  `updated_by` int(10) unsigned DEFAULT 1,
  `school_id` int(10) unsigned DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `sm_add_incomes_income_head_id_foreign` (`income_head_id`),
  KEY `sm_add_incomes_account_id_foreign` (`account_id`),
  KEY `sm_add_incomes_payment_method_id_foreign` (`payment_method_id`),
  KEY `sm_add_incomes_created_by_foreign` (`created_by`),
  KEY `sm_add_incomes_updated_by_foreign` (`updated_by`),
  KEY `sm_add_incomes_school_id_foreign` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sm_add_incomes` */

insert  into `sm_add_incomes`(`id`,`name`,`date`,`amount`,`file`,`description`,`active_status`,`created_at`,`updated_at`,`income_head_id`,`account_id`,`payment_method_id`,`created_by`,`updated_by`,`school_id`) values 
(1,'Office Rent','2019-01-05',3282.00,NULL,NULL,1,'2019-09-15 00:10:41','2019-09-15 00:10:41',1,NULL,1,1,1,1),
(2,'Office Rent','2019-02-05',7848.00,NULL,NULL,1,'2019-09-15 00:10:41','2019-09-15 00:10:41',1,NULL,1,1,1,1),
(3,'Office Rent','2019-03-05',6373.00,NULL,NULL,1,'2019-09-15 00:10:41','2019-09-15 00:10:41',1,NULL,1,1,1,1),
(4,'fgvfdsg','2020-02-06',45345.00,'','erew',1,'2020-02-07 16:29:47','2020-02-07 16:29:47',3,NULL,1,1,1,1),
(5,'werw','2020-02-07',4543.00,'','rwer',1,'2020-02-07 16:29:58','2020-02-07 16:29:58',3,NULL,2,1,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
