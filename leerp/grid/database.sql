/*
SQLyog Community Edition- MySQL GUI v8.12 
MySQL - 5.1.30-community-log : Database - griddemo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`griddemo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `griddemo`;

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(120) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`client_id`,`name`,`gender`,`company`) values (1,'Client 1','male','Client 1 Company');
insert  into `clients`(`client_id`,`name`,`gender`,`company`) values (2,'Client 2','male','Client 2 Company 11');
insert  into `clients`(`client_id`,`name`,`gender`,`company`) values (3,'Client 3','female','Client 3 Company');
insert  into `clients`(`client_id`,`name`,`gender`,`company`) values (4,'Afnan','male','My Comp');
insert  into `clients`(`client_id`,`name`,`gender`,`company`) values (5,'123','123','123');

/*Table structure for table `invheader` */

DROP TABLE IF EXISTS `invheader`;

CREATE TABLE `invheader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invdate` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `note` char(100) DEFAULT NULL,
  `closed` char(3) DEFAULT 'No',
  `ship_via` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `invheader` */

insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (1,'2007-10-01',1,'100.00','20.00','120.00','note 1','No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (2,'2007-10-03',1,'200.00','40.00','240.00','note 2','No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (3,'2007-10-02',2,'300.00','60.00','360.00','note for invoice 3','yes','');
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (4,'2007-10-04',3,'150.00','0.00','150.00','no tax','No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (5,'2007-10-05',3,'100.00','0.00','100.00','no tax','No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (6,'2007-10-05',1,'50.00','10.00','60.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (7,'2007-10-05',2,'120.00','12.00','134.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (8,'2007-10-06',3,'200.00','0.00','200.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (9,'2007-10-06',1,'200.00','40.00','240.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (10,'2007-10-06',2,'100.00','20.00','120.00','','No3','');
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (11,'2007-10-06',1,'600.00','120.00','720.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (12,'2007-10-06',2,'700.00','140.00','840.00',NULL,'No',NULL);
insert  into `invheader`(`id`,`invdate`,`client_id`,`amount`,`tax`,`total`,`note`,`closed`,`ship_via`) values (13,'2007-10-06',3,'1000.00','0.00','1000.00',NULL,'No',NULL);

/*Table structure for table `invlines` */

DROP TABLE IF EXISTS `invlines`;

CREATE TABLE `invlines` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `item` char(20) DEFAULT NULL,
  `qty` decimal(8,2) NOT NULL DEFAULT '0.00',
  `unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`,`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `invlines` */

insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (1,1,'item 1','1.00','20.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (1,2,'item 2','2.00','40.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (2,1,'item 1','2.00','20.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (2,2,'item 2','4.00','40.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (3,1,'item 3','1.00','100.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (3,2,'item 4','1.00','200.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (4,1,'item 1','1.00','100.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (4,2,'item 2','1.00','50.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (5,1,'item 3','1.00','100.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (6,1,'item 4','1.00','50.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (7,1,'item 5','2.00','10.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (7,2,'item 1','1.00','100.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (8,1,'item 3','1.00','50.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (8,2,'item 2','1.00','120.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (8,3,'item 3','1.00','30.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (9,1,'item 6','1.00','140.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (9,2,'item 3','1.00','60.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (10,1,'item 5','3.00','10.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (10,2,'item 4','1.00','70.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (11,1,'item 1','2.00','100.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (11,2,'item 2','3.00','50.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (11,3,'item 3','1.00','50.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (11,4,'item 4','1.00','200.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (12,1,'item 4','1.00','300.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (12,2,'item 2','1.00','400.00');
insert  into `invlines`(`id`,`num`,`item`,`qty`,`unit`) values (13,1,'item 13','1.00','1000.00');

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(200) DEFAULT NULL,
  `item_cd` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `items` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
