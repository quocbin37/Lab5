/*
 Navicat Premium Data Transfer

 Source Server         : MY SQL
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : lab05

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 23/09/2024 23:49:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`categoryID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Dell');
INSERT INTO `categories` VALUES (2, 'Asus');
INSERT INTO `categories` VALUES (3, 'Acer');
INSERT INTO `categories` VALUES (4, 'Mac');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productCode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `listPrice` decimal(10, 2) NOT NULL,
  `categoryID` int NULL DEFAULT NULL,
  PRIMARY KEY (`productID`) USING BTREE,
  INDEX `categoryID`(`categoryID` ASC) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'D001', 'Dell XPS 13', 1200.00, 1);
INSERT INTO `products` VALUES (2, 'D002', 'Dell Inspiron 15', 800.00, 1);
INSERT INTO `products` VALUES (3, 'A001', 'Asus ZenBook', 1000.00, 2);
INSERT INTO `products` VALUES (4, 'A002', 'Asus ROG Strix', 1500.00, 2);
INSERT INTO `products` VALUES (5, 'AC001', 'Acer Aspire 5', 650.00, 3);
INSERT INTO `products` VALUES (6, 'AC002', 'Acer Predator', 2000.00, 3);
INSERT INTO `products` VALUES (7, 'M001', 'MacBook Air', 999.00, 4);
INSERT INTO `products` VALUES (8, 'M002', 'MacBook Pro', 2500.00, 4);

-- ----------------------------
-- View structure for v_quantity
-- ----------------------------
DROP VIEW IF EXISTS `v_quantity`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_quantity` AS SELECT 
categories.categoryName, 
Count( products.productID ) AS quantity  
FROM 
 categories 
 INNER JOIN products ON products.categoryID = categories.categoryID  
GROUP BY 
 categories.categoryID ;

-- ----------------------------
-- Procedure structure for timkiem
-- ----------------------------
DROP PROCEDURE IF EXISTS `timkiem`;
delimiter ;;
CREATE PROCEDURE `timkiem`(_param VARCHAR ( 255 ))
BEGIN  
 IF CONVERT(_param,DECIMAL) = 0 THEN  
 SELECT 
  categories.categoryName, 
  products.productCode, 
  products.productName, 
  products.listPrice  
 FROM 
  categories 
  INNER JOIN products ON products.categoryID = categories.categoryID  
 WHERE 
  categories.categoryName LIKE CONCAT('%',_param,'%') 
  OR products.productCode LIKE CONCAT('%',_param,'%') 
  OR products.productName LIKE CONCAT('%',_param,'%'); 
 ELSE 
           SELECT 
  categories.categoryName, 
  products.productCode, 
  products.productName, 
  products.listPrice  
 FROM 
  categories 
  INNER JOIN products ON products.categoryID = categories.categoryID  
 WHERE 
   products.listPrice >= CONVERT(_param,DECIMAL); 
 END IF; 
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
