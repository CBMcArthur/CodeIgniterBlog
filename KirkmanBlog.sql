/*
SQLyog Community v11.11 (64 bit)
MySQL - 5.0.51b : Database - codeigniter_blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter_blog` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codeigniter_blog`;

/*Table structure for table `accountTypes` */

DROP TABLE IF EXISTS `accountTypes`;

CREATE TABLE `accountTypes` (
  `id` int(11) NOT NULL auto_increment,
  `accountType` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `accountTypes` */

insert  into `accountTypes`(`id`,`accountType`) values (1,'anonymous'),(2,'poster'),(3,'commenter');

/*Table structure for table `blogEntries` */

DROP TABLE IF EXISTS `blogEntries`;

CREATE TABLE `blogEntries` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `author_to_user` (`author`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `blogEntries` */

insert  into `blogEntries`(`id`,`author`,`title`,`body`) values (1,1,'The Inaugral Posting','This is the first ever posting in Kirkman\'s Blog.  Yay me!');

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `blogId` int(11) NOT NULL,
  `commenter` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `comment_to_blog` (`blogId`),
  KEY `commenter_to_user` (`commenter`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`blogId`,`commenter`,`comment`) values (1,1,2,'Congrats!!  To me!'),(3,1,2,'Another comment, because I didn\'t like the final URL after making the last posting.');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accountType` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `unique_usernames` (`username`),
  UNIQUE KEY `unique_emails` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`accountType`) values (1,'christian','chrisp4$$','christian@christian.com',2),(2,'kirkman','kirkmanp4$$','kirkman@kirkman.com',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
