/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.8-MariaDB : Database - itsnowdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`itsnowdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `itsnowdb`;

/*Table structure for table `event_registration` */

DROP TABLE IF EXISTS `event_registration`;

CREATE TABLE `event_registration` (
  `regId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `hospital_name` varchar(150) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `payment_reference` varchar(150) DEFAULT NULL,
  `payment_screenshot` varchar(500) DEFAULT NULL,
  `dttime` datetime DEFAULT NULL,
  PRIMARY KEY (`regId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `event_registration` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
