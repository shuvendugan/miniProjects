/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.8-MariaDB : Database - nist
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nist` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nist`;

/*Table structure for table `branches` */

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `branchId` bigint(11) NOT NULL AUTO_INCREMENT,
  `branchName` varchar(200) DEFAULT NULL,
  `branchStatus` enum('Active','InActive') DEFAULT NULL,
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `branches` */

insert  into `branches`(`branchId`,`branchName`,`branchStatus`) values (1,'School of Computer Science','Active'),(2,'Mechanical Engineering','Active'),(3,'Civil Engineering','Active'),(4,'ECE','Active');

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `facultyID` bigint(11) NOT NULL AUTO_INCREMENT,
  `facultyName` varchar(200) DEFAULT NULL,
  `branchID` bigint(11) DEFAULT NULL,
  `isHOD` enum('no','yes') DEFAULT 'no',
  `image` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`facultyID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `faculty` */

insert  into `faculty`(`facultyID`,`facultyName`,`branchID`,`isHOD`,`image`,`email`,`phone`) values (1,'Dr. Brojo Kishore Mishra',1,'yes','./images/faculty/1.jpg','brojomishra@nist.edu','0680392523'),(2,'Dr Souren Mishra',2,'yes','./images/faculty/2.jpg','email@nist.edu','5268495652'),(3,'Dr Barada Prasad Sethy',3,'yes','./images/faculty/3.jpg','barada.sethy@nist.edu','8596655665'),(4,'Dr. Sudhakar Das',4,'yes','./images/faculty/4.jpg','sudhakar.dash@nist.edu','5685974646'),(5,'Other faculty 1',1,'no','./images/faculty/placeholder.png','Otherfaculty1@nist.edu','5685995231'),(6,'Other faculty 2',1,'no','./images/faculty/placeholder.png','Otherfaculty2@nist.edu','5685996852'),(7,'Other faculty 3',2,'no','./images/faculty/placeholder.png','Otherfaculty3@nist.edu','5685769135'),(8,'Other faculty 4',3,'no','./images/faculty/placeholder.png','Otherfaculty4@nist.edu','5685978469'),(9,'Other faculty 5',4,'no','./images/faculty/placeholder.png','Otherfaculty5@nist.edu','5685978562'),(10,'Other faculty 6',4,'no','./images/faculty/placeholder.png','Otherfaculty6@nist.edu','5685974646'),(11,'Other faculty 7',3,'no','./images/faculty/placeholder.png','Otherfaculty7@nist.edu','5685978964'),(12,'Other faculty 8',2,'no','./images/faculty/placeholder.png','Otherfaculty8@nist.edu','7895645988'),(13,'Other faculty 9',3,'no','./images/faculty/placeholder.png','Otherfaculty9@nist.edu','3256585488'),(14,'Other faculty 10',2,'no','./images/faculty/placeholder.png','Otherfaculty10@nist.edu','8564665454'),(15,'Other faculty 11',1,'no','./images/faculty/placeholder.png','Otherfaculty11@nist.edu','5645644654'),(16,'Other faculty 12',4,'no','./images/faculty/placeholder.png','Otherfaculty12@nist.edu','8998898989');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
