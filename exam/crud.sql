/*
MySQL Data Transfer
Source Host: localhost
Source Database: crud
Target Host: localhost
Target Database: crud
Date: 1/26/2024 2:48:29 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for paintjobs
-- ----------------------------
DROP TABLE IF EXISTS `paintjobs`;
CREATE TABLE `paintjobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PlateNo` varchar(255) NOT NULL,
  `Current_Color` varchar(255) NOT NULL,
  `Target_Color` varchar(255) NOT NULL,
  `Action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `paintjobs` VALUES ('1', '1', 'Red', 'Green', 'Complete$sqlPaintQueue = \"SELECT * FROM paintjobs WHERE Action IS NULL ORDER BY id ASC\";\r\n$sqlPaintQueue = \"SELECT * FROM paintjobs WHERE Action IS NULL ORDER BY id ASC\";\r\nMark as Completed');
INSERT INTO `paintjobs` VALUES ('2', '2', 'Green', 'Red', 'Complete');
INSERT INTO `paintjobs` VALUES ('3', '3', 'Blue', 'Red', 'Complete');
INSERT INTO `paintjobs` VALUES ('4', '4', 'Green', 'Blue', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('5', '5', 'Red', 'Green', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('6', '6', 'Green', 'Blue', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('7', '12', 'Red', 'Green', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('8', '125', 'Blue', 'Red', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('9', '64', 'Blue', 'Green', 'Mark as Completed');
INSERT INTO `paintjobs` VALUES ('10', '75', 'Red', 'Green', 'Mark as Completed');
