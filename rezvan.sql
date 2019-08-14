/*
Navicat MariaDB Data Transfer

Source Server         : MyMaria
Source Server Version : 100312
Source Host           : localhost:3307
Source Database       : rezvan

Target Server Type    : MariaDB
Target Server Version : 100312
File Encoding         : 65001

Date: 2019-08-14 10:04:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL COMMENT 'User uploaded the file.\r\nNULL is system files.',
  `dyna` blob DEFAULT NULL COMMENT 'ItemID\r\nPath\r\nFilename\r\nType',
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '-1: Deleted\r\n0: Suspended\r\n1: Active',
  PRIMARY KEY (`id`),
  KEY `Created` (`created`) USING BTREE,
  KEY `Status` (`status`) USING BTREE,
  KEY `UserID` (`userID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='All files uploaded to system are logged here';

-- ----------------------------
-- Records of attachment
-- ----------------------------

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '9', '1554365919');
INSERT INTO `auth_assignment` VALUES ('operator', '7', '1552897543');
INSERT INTO `auth_assignment` VALUES ('superAdmin', '1', '1508416990');
INSERT INTO `auth_assignment` VALUES ('superAdmin', '8', '1508416990');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`) USING BTREE,
  KEY `idx-auth_item-type` (`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin', '1', 'مدیر', null, null, '1507555215', '1515502636');
INSERT INTO `auth_item` VALUES ('clinicAddDoctor', '2', null, null, null, '1557905416', '1557905416');
INSERT INTO `auth_item` VALUES ('clinicCreate', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('clinicDelete', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('clinicImportCsvProgram', '2', null, null, null, '1557905416', '1557905416');
INSERT INTO `auth_item` VALUES ('clinicImportExcelProgram', '2', null, null, null, '1557905416', '1557905416');
INSERT INTO `auth_item` VALUES ('clinicIndex', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('clinicUpdate', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('clinicView', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('operator', '1', 'اپراتور', null, null, '1552897506', '1557906709');
INSERT INTO `auth_item` VALUES ('personCreate', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('personDelete', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('personIndex', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('personList', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('personUpdate', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('personView', '2', null, null, null, '1552897506', '1552897506');
INSERT INTO `auth_item` VALUES ('receptionClinicRequest', '2', null, null, null, '1557906701', '1557906701');
INSERT INTO `auth_item` VALUES ('receptionHospitalization', '2', null, null, null, '1557906701', '1557906701');
INSERT INTO `auth_item` VALUES ('receptionParaClinic', '2', null, null, null, '1557906702', '1557906702');
INSERT INTO `auth_item` VALUES ('superAdmin', '1', 'مدیر کل', null, null, '1507643138', '1507643138');
INSERT INTO `auth_item` VALUES ('user', '1', 'کاربر', null, null, '1507555215', '1515502636');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicAddDoctor');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicCreate');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicDelete');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicImportCsvProgram');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicImportExcelProgram');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicIndex');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicUpdate');
INSERT INTO `auth_item_child` VALUES ('operator', 'clinicView');
INSERT INTO `auth_item_child` VALUES ('operator', 'personCreate');
INSERT INTO `auth_item_child` VALUES ('operator', 'personDelete');
INSERT INTO `auth_item_child` VALUES ('operator', 'personIndex');
INSERT INTO `auth_item_child` VALUES ('operator', 'personUpdate');
INSERT INTO `auth_item_child` VALUES ('operator', 'personView');
INSERT INTO `auth_item_child` VALUES ('operator', 'receptionClinicRequest');
INSERT INTO `auth_item_child` VALUES ('operator', 'receptionHospitalization');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parentID` int(10) DEFAULT NULL,
  `type` enum('cat','tag','lst','mnu','dep') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL,
  `dyna` blob DEFAULT NULL,
  `extra` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '-1: Suspended\r\n0: Unpublished\r\n1: Published',
  `left` int(11) NOT NULL,
  `right` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `tree` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `ParentID` (`parentID`) USING BTREE,
  KEY `Type` (`type`) USING BTREE,
  KEY `Name` (`name`(255)) USING BTREE,
  KEY `Created` (`created`) USING BTREE,
  KEY `Status` (`status`) USING BTREE,
  KEY `lft` (`left`,`right`) USING BTREE,
  FULLTEXT KEY `name_2` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nested records to store tree structures.\r\nIt includes categories, tags, persons.\r\n! This table is based on what Yii has designed.\r\nIf nothing exists, we will use "Nested sets" structure.';

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for catitem
-- ----------------------------
DROP TABLE IF EXISTS `catitem`;
CREATE TABLE `catitem` (
  `itemID` int(10) NOT NULL,
  `catID` int(10) NOT NULL,
  `type` enum('cat','tax') COLLATE utf8_unicode_ci NOT NULL COMMENT 'Some types are defined in list like: ''cat'', ''tax''',
  `status` tinyint(1) NOT NULL COMMENT '-1: Suspended\r\n0: Unpublished\r\n1: Published',
  PRIMARY KEY (`itemID`,`catID`,`type`),
  KEY `CatID` (`catID`) USING BTREE,
  KEY `Type` (`type`) USING BTREE,
  KEY `Status` (`status`) USING BTREE,
  KEY `ItemID` (`itemID`) USING BTREE,
  CONSTRAINT `catitem_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `catitem_ibfk_2` FOREIGN KEY (`catID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of catitem
-- ----------------------------

-- ----------------------------
-- Table structure for item
-- ----------------------------
DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL COMMENT 'Book creator',
  `modelID` int(11) NOT NULL,
  `type` decimal(1,0) DEFAULT NULL,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL COMMENT 'عنوان',
  `dyna` blob DEFAULT NULL COMMENT 'All fields',
  `extra` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'JSON array keeps all other options',
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '-1: Deleted\r\n0: Disabled\r\n1: Published\r\n5: Suggestion',
  PRIMARY KEY (`id`),
  KEY `UserID` (`userID`) USING BTREE,
  KEY `Created` (`created`) USING BTREE,
  KEY `Status` (`status`) USING BTREE,
  KEY `Name` (`name`(255)) USING BTREE,
  KEY `modelID` (`modelID`) USING BTREE,
  FULLTEXT KEY `name_2` (`name`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`modelID`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Stores list of items.';

-- ----------------------------
-- Records of item
-- ----------------------------

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL COMMENT 'User who did the action.\r\nNull is system actions',
  `code` smallint(5) NOT NULL COMMENT 'Action code.\r\nCodes are defined in excel file',
  `action` tinyint(1) NOT NULL COMMENT '\n1: Insert\r\n2: Update\r\n3: Delete',
  `model` char(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Table of item.\r\nNULL is reserved.',
  `modelID` int(10) DEFAULT NULL COMMENT 'Item ID\r\nNULL is reserved for system activities.',
  `values` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'JSON decoded values of old and new values.\r\n{''old'':[], ''new'':[]}',
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `UserID` (`userID`) USING BTREE,
  KEY `Code` (`code`) USING BTREE,
  KEY `Action` (`action`) USING BTREE,
  KEY `Model` (`model`) USING BTREE,
  KEY `ModelID` (`modelID`) USING BTREE,
  KEY `Date` (`date`) USING BTREE,
  KEY `Time` (`time`) USING BTREE,
  KEY `FKLog440613` (`userID`) USING BTREE,
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Audit table.\r\n! This is only about actions are done by operators or auto-system, it is not the search log.';

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(511) COLLATE utf8_unicode_ci NOT NULL COMMENT 'نام و نام خانوادگی',
  `type` enum('cnt','sgn','cmp') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cnt' COMMENT 'Enum: cnt: contact us, sgn: suggestions, cmp: complaints',
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'شماره تماس',
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'متن',
  `dyna` blob DEFAULT NULL COMMENT 'All fields',
  `created` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'JSON array to store fields, order of fields and aliases\r\n\r\nStores fields options as JSON:\r\n{\r\n  [\r\n    fieldID: 5,\r\n    name: //Field name in language (ISO 639-1). Overrides default value in "Field" table\r\n      [\r\n        ''ar'':''myField'',\r\n        ''fa'':''yourField''\r\n      ],\r\n    width:15\r\n  ],\r\n  [\r\n    fieldID: 7,\r\n    name:\r\n      [\r\n        ''ar'':''...'',...\r\n      ]\r\n  ]\r\n}',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Alias` (`alias`) USING BTREE,
  KEY `Name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('1', 'slide', 'اسلاید', null);
INSERT INTO `model` VALUES ('2', 'post', 'مطلب', null);
INSERT INTO `model` VALUES ('3', 'page', 'صفحات', null);
INSERT INTO `model` VALUES ('4', 'gallery', 'گالری', null);
INSERT INTO `model` VALUES ('5', 'project', 'پروژه', null);

-- ----------------------------
-- Table structure for ugroup
-- ----------------------------
DROP TABLE IF EXISTS `ugroup`;
CREATE TABLE `ugroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `members` blob DEFAULT NULL COMMENT 'JSON array:\r\nU[userID] => [Status:0,1]',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE,
  KEY `created` (`created`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User groups';

-- ----------------------------
-- Records of ugroup
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hashed\r\nIt maybe 512',
  `roleID` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dyna` blob DEFAULT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '-1: Suspended\r\n0: Inactive\r\n1: Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Username` (`username`) USING BTREE,
  KEY `Name` (`name`) USING BTREE,
  KEY `Status` (`status`) USING BTREE,
  KEY `ruleID` (`roleID`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `auth_item` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table of users';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Admin', 'admin', '$2y$13$zIo/.6Xu4BulBKKE5lg12.zIUV5piyNB2Fujx6Qpk4Sv0gW45472K', 'superAdmin', 0x0401000700000003007570646174656421323031392D30342D31352031353A34373A3230, '2018-02-13 21:46:22', '1');
INSERT INTO `user` VALUES ('8', 'Rahbod', 'rahbod', '$2y$13$LzbDws024iCbvece6kIsSOuoiVQj.6cETL7bgrRuKgZpa.Dul/dqW', 'superAdmin', null, '2018-02-13 21:46:22', '1');

-- ----------------------------
-- Table structure for userugroup
-- ----------------------------
DROP TABLE IF EXISTS `userugroup`;
CREATE TABLE `userugroup` (
  `userID` int(11) NOT NULL,
  `ugroupID` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`ugroupID`),
  KEY `ugroupID` (`ugroupID`) USING BTREE,
  CONSTRAINT `userugroup_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `userugroup_ibfk_2` FOREIGN KEY (`ugroupID`) REFERENCES `ugroup` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of userugroup
-- ----------------------------
