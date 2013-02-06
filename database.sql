SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

insert into `products` values('1','Tea Cups','kids tea cup set','1360091913'),
 ('2','Brownie Mix','','1360091913'),
 ('3','Chair','single desk chair','1360091913'),
 ('4','Desk','desk','1360091913'),
 ('5','Table','foldable picnic table','1360091913');

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `date` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

insert into `admins` values('1','0','admin','Passw0rd1','1360091913'),
 ('2','1','yourboss','rainbows','1360091913'),
 ('3','1','superadmin','N0TP@$$word1','1360091913');

DROP TABLE IF EXISTS `admins_secure`;

CREATE TABLE `admins_secure` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(20) NOT NULL,
  `pass` varchar(90) NOT NULL,
  `date` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

insert into `admins_secure` values('1','0','admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','1360091913'),
 ('2','1','yourboss','36ecc92208f30789ad0e952d74cabc0fd71f9e74','1360091913'),
 ('3','1','superadmin','1','1360091913');

SET FOREIGN_KEY_CHECKS = 1;
